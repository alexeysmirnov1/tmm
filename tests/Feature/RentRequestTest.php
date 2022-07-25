<?php

namespace Tests\Feature;

use App\Events\CreatedNewRentRequestEvent;
use App\Jobs\ProcessingCreatedRentRequestJob;
use App\Mail\NotifyModeratorAboutNewRentRequestMail;
use App\Models\User;
use App\Services\OneSClient;
use Database\Seeders\RequestSeeder;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\AssertableJson;
use Mockery\MockInterface;
use Tests\TestCase;
use TiMacDonald\Log\LogFake;

class RentRequestTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()
            ->create([
                'password' => bcrypt(12345)
            ]);

        $this->seed(RequestSeeder::class);

        Http::fake();
        Event::fake();
        Bus::fake();
        Mail::fake();
    }

    public function testGuestNotSeeRequestList()
    {
        $this->assertGuest();

        $this->get(route('rent.requests.index'))
            ->assertStatus(302);
    }

    public function testAdminSeeRequestList()
    {
        $this->signIn($this->user);

        $this->get(route('rent.requests.index'))
            ->assertStatus(200)
            ->assertViewIs('rent.requests.index')
            ->assertViewHas('requests');
    }

    public function testAdminGetRequestListFromSecondPage()
    {
        $this->signIn($this->user);

        $this->getJson(route('rent.requests.index', ['page' => 2]))
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data' => [
                    'requests',
                    'current_page',
                    'last_page',
                ],
            ])
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->has('status')
                    ->has('data', 3)
                    ->has('data.requests', 10)
                    ->has('data.current_page')
                    ->has('data.last_page')
                    ->where('data.current_page', 2)
                    ->where('data.last_page', 3)
                    ->etc()
            );
    }

    /**
     * @dataProvider createRequestProvider
     */
    public function testClientSentRentRequestValidation(array $request, int $status)
    {
        $this->mock(OneSClient::class, function (MockInterface $mock) {
            $mock->shouldReceive('sendNewRequest')
                ->andReturn([
                    'Error' => 0,
                    'ErrorMessage' => '',
                ]);
        });

        $this->assertGuest();

        $this->postJson(route('rent.requests.store'), $request)
            ->assertStatus($status);
    }

    public function testClientSentRentRequest()
    {
        $this->mockOnesSuccess();

        $this->assertGuest();

        $request = [
            'title' => 'Flag studio',
            'description' => 'Очень хотим арендовать!',
            'email' => 'real@email.ru',
        ];

        $this->assertDatabaseMissing('requests', $request);

        $this->postJson(route('rent.requests.store'), $request)
            ->assertCreated()
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->has('status')
                    ->has('data')
                    ->has('data.id')
                    ->etc()
            );

        $this->assertDatabaseHas('requests', $request);

        Http::assertSent(
            fn (Request $httpRequest) =>
                $httpRequest->url() === 'https://ones.project.ru/create/new/request'
                && $httpRequest['Title'] === $request['title']
        );

        Event::assertDispatched(
            CreatedNewRentRequestEvent::class,
            fn ($event) =>
                $event->message === 'request created'
        );

        Bus::assertDispatched(ProcessingCreatedRentRequestJob::class);

        Mail::assertSent(NotifyModeratorAboutNewRentRequestMail::class);
    }

    public function testFailedCreated()
    {
        $this->mockOnesFailed();

        Log::swap(new LogFake);

        $request = [
            'title' => 'Flag studio',
            'description' => 'Очень хотим арендовать!',
            'email' => 'real@mail.ru',
        ];

        $this->postJson(route('rent.requests.store'), $request)
            ->assertStatus(500)
            ->withException(new \Exception());

        Log::assertLogged(
            'error',
            function ($message) {
                return Str::contains($message, 'Произошла ошибка.');
            }
        );
    }

    private function createRequestProvider(): array
    {
        return [
            'success' => [
                [
                    'title' => 'Flag studio',
                    'description' => 'Очень хотим арендовать!',
                    'email' => 'real@email.ru',
                ],
                201,
            ],
            'failed' => [
                [],
                422,
            ],
        ];
    }

    private function mockOnesSuccess(): void
    {
        $this->mock(OneSClient::class, function (MockInterface $mock) {
            $mock->shouldReceive('sendNewRequest')
                ->once()
                ->andReturn([
                    'Error' => 0,
                    'ErrorMessage' => '',
                ]);
        });
    }

    private function mockOnesFailed(): void
    {
        $this->mock(OneSClient::class, function (MockInterface $mock) {
            $mock->shouldReceive('sendNewRequest')
                ->once()
                ->andReturn([
                    'Error' => 1,
                    'ErrorMessage' => 'Error',
                ]);
        });
    }
}

<?php

namespace App\Http\Controllers;


use App\Containers\GiveMeMyMoney\Mails\ElectronicCertificateMail;
use App\Http\Requests\StoreRequest;
use App\Jobs\ProcessingCreatedRentRequestJob;
use App\Mail\NotifyModeratorAboutNewRentRequestMail;
use App\Models\Request;
use App\Services\OneSClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RentRequestController extends Controller
{
    public function __construct(
        private OneSClient $onesClient,
    ) {}

    public function index()
    {
        $requests = Request::paginate(10);

        if(request()->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'requests' => $requests->items(),
                    'current_page' => $requests->currentPage(),
                    'last_page' => $requests->lastPage(),
                ],
            ]);
        }

        return view(
            'rent.requests.index',
            compact(
                'requests',
            ),
        );
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $data['status'] = 'moderation';

            $rentRequest = Request::create($data);

            Http::post('https://ones.project.ru/create/new/request', [
                'Title' => $data['title'],
            ]);

            $response = $this->onesClient->sendNewRequest($rentRequest);

            if($response['Error'] !== 0) {
                throw new \Exception();
            }

            CreatedNewRentRequetEvent::dispatch('request created');

            ProcessingCreatedRentRequestJob::dispatch();

            Mail::to('moderator@email.ru')
                ->send(
                    new NotifyModeratorAboutNewRentRequestMail()
                );

            DB::commit();

            return response()->json([
                'status' => 'success',
                'data' => [
                    'id' => $rentRequest->id
                ],
            ], 201);
        } catch (\Exception) {
            DB::rollback();

            Log::error('Произошла ошибка.');

            throw new \Exception();
        }
    }
}

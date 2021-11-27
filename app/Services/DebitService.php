<?php

namespace App\Services;

use App\DTO\CreateDebitData;
use App\Aggregates\Debit\Debit;
use App\Exceptions\Action\ActionNotFound;
use App\Exceptions\Customer\CustomerNotFound;
use App\Exceptions\Debit\DebitNotFound;
use App\Exceptions\Source\SourceNotFound;
use App\Repositories\ActionRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\DebitRepository;
use App\Repositories\SourceRepository;
use App\Values\DateTime;
use App\Values\Id;
use App\Values\Status;
use App\Values\Text;
use App\Values\Title;

class DebitService
{
    public function __construct(
        private DebitRepository $debitRepository,
        private CustomerRepository $customerRepository,
        private SourceRepository $sourceRepository,
        private ActionRepository $actionRepository,
    ) {
    }

    public function create(CreateDebitData $data): void
    {
        if(!$customer = $this->customerRepository->find($data->customerId)) {
            throw new CustomerNotFound;
        }

        if(!$source = $this->sourceRepository->find($data->sourceId)) {
            throw new SourceNotFound;
        }

        $action = null;
        if($data->actionId && !$action = $this->actionRepository->find($data->actionId)) {
            throw new ActionNotFound;
        }

        $this->debitRepository->add(
            new Debit(
                id: Id::next(),
                title: new Title($data->title),
                description: new Text($data->description),
                dateTime: new DateTime(
                    $data->date,
                    $data->time,
                ),
                customer: $customer,
                source: $source,
                status: new Status($data->status),
                action: $action,
            )
        );
    }

    public function cancel(Id $id): void
    {
        if(!$debit = $this->debitRepository->find($id)) {
            throw new DebitNotFound;
        }

        $debit->changeStatus(new Status(Status::CANCEL));
        $this->debitRepository->update($debit);
    }

    public function changeTitle(Id $id, Title $title): void
    {
        if(!$debit = $this->debitRepository->find($id)) {
            throw new DebitNotFound;
        }

        $debit->changeTitle($title);
        $this->debitRepository->update($debit);
    }

    public function changeDescription(): void
    {

    }

    public function move(): void
    {

    }

    public function changeCustomer(): void
    {

    }

    public function changeSource(): void
    {

    }

    public function changeStatus(): void
    {

    }

    public function applyAction(): void
    {

    }
}

<?php

namespace App\Aggregates\Debit;

use App\Aggregates\AbstractAggregateRoot;
use App\Aggregates\Action\Action;
use App\Aggregates\Customer\Customer;
use App\Aggregates\Source\Source;
use App\Events\Debit\DebitActionApplied;
use App\Events\Debit\DebitDescriptionChanged;
use App\Events\Debit\DebitMoved;
use App\Events\Debit\DebitStatusChanged;
use App\Events\Debit\DebitTitleChanged;
use App\Exceptions\Debit\DebitCanNotTransitionStatusException;
use App\Exceptions\Debit\DebitDateTimeException;
use App\Values\DateTime;
use App\Values\Id;
use App\Values\Status;
use App\Values\Text;
use App\Values\Title;

class Debit extends AbstractAggregateRoot
{
    public function __construct(
        private Id $id,
        private Title $title,
        private Text $description,
        private DateTime $dateTime,
        private Customer $customer,
        private Source $source,
        private Status $status,
        private ?Action $action = null,
    ) {
    }

    public function changeTitle(Title $title): void
    {
        $this->title = $title;
        $this->sendEvent(
            new DebitTitleChanged($this->getId(), $title)
        );
    }

    public function changeDescription(Text $description): void
    {
        $this->description = $description;
        $this->sendEvent(
            new DebitDescriptionChanged($this->getId(), $description)
        );
    }

    public function move(DateTime $dateTime): void
    {
        if($this->getDateTime()->equal($dateTime)) {
            throw new DebitDateTimeException;
        }

        $this->dateTime = $dateTime;
        $this->sendEvent(
            new DebitMoved($this->getId(), $dateTime)
        );
    }

    public function changeCustomer(Customer $customer): void
    {
        $this->customer = $customer;
        $this->sendEvent(
            new DebitCustomerChanged($this->getId(), $customer)
        );
    }

    public function changeSource(Source $source): void
    {
        $this->source = $source;
        $this->sendEvent(
            new DebitSourceChanged($this->getId(), $source)
        );
    }

    public function changeStatus(Status $status): void
    {
        if(!$this->getStatus()->canTransiteTo($status)) {
            throw new DebitCanNotTransitionStatusException;
        }

        $this->status = $status;
        $this->sendEvent(
            new DebitStatusChanged($this->getId(), $status)
        );
    }

    public function applyAction(Action $action): void
    {
        $this->action = $action;
        $this->sendEvent(
            new DebitActionApplied($this->getId(), $action)
        );
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function getDescription(): Text
    {
        return $this->description;
    }

    public function getDateTime(): DateTime
    {
        return $this->dateTime;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getSource(): Source
    {
        return $this->source;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getAction(): ?Action
    {
        return $this->action;
    }

    public function getPrice(): float
    {
        $sourcePrice = $this->getSource()->getPrice();

        if(!$this->getAction()) {
            return $sourcePrice;
        }

        if($this->getAction()->inPercent()) {
            return $sourcePrice * $this->getAction()->getValue();
        }

        return $sourcePrice - $this->getAction()->getValue();
    }
}

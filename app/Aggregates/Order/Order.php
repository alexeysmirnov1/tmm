<?php

namespace App\Aggregates\Order;

use App\Aggregates\AbstractAggregateRoot;
use App\Aggregates\Action\Action;
use App\Aggregates\Customer\Customer;
use App\Events\Order\OrderActionApplied;
use App\Events\Order\OrderDescriptionChanged;
use App\Events\Order\OrderMoved;
use App\Events\Order\OrderStatusChanged;
use App\Events\Order\OrderTitleChanged;
use App\Exceptions\Order\OrderCanNotTransitionStatusException;
use App\Exceptions\Order\OrderDateTimeException;
use App\Values\DateTime;
use App\Values\Id;
use App\Values\Status;
use App\Values\Text;
use App\Values\Title;

class Order extends AbstractAggregateRoot
{
    public function __construct(
        private Id $id,
        private Title $title,
        private Text $description,
        private DateTime $dateTime,
        private Customer $customer,
        private Status $status,
        private ?Action $action = null,
    ) {
    }

    public function changeTitle(Title $title): void
    {
        $this->title = $title;
        $this->sendEvent(
            new OrderTitleChanged($this->getId(), $title)
        );
    }

    public function changeDescription(Text $description): void
    {
        $this->description = $description;
        $this->sendEvent(
            new OrderDescriptionChanged($this->getId(), $description)
        );
    }

    public function move(DateTime $dateTime): void
    {
        if($this->getDateTime()->equal($dateTime)) {
            throw new OrderDateTimeException;
        }

        $this->dateTime = $dateTime;
        $this->sendEvent(
            new OrderMoved($this->getId(), $dateTime)
        );
    }

    public function changeCustomer(Customer $customer): void
    {
        $this->customer = $customer;
        $this->sendEvent(
            new OrderCustomerChanged($this->getId(), $customer)
        );
    }

    public function changeStatus(Status $status): void
    {
        if(!$this->getStatus()->canTransiteTo($status)) {
            throw new OrderCanNotTransitionStatusException;
        }

        $this->status = $status;
        $this->sendEvent(
            new OrderStatusChanged($this->getId(), $status)
        );
    }

    public function applyAction(Action $action): void
    {
        $this->action = $action;
        $this->sendEvent(
            new OrderActionApplied($this->getId(), $action)
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
        return 0;
    }
}

<?php

namespace App\Aggregates\Source;

use App\Aggregates\AbstractAggregateRoot;
use App\Values\Color;
use App\Values\Id;
use App\Values\Price;
use App\Values\Status;
use App\Values\Text;
use App\Values\Title;

class Source extends AbstractAggregateRoot
{
    public function __construct(
        private Id $id,
        private Title $title,
        private Text $description,
        private Status $status,
        private Color $color,
        private Price $price,
    ) {
    }

    public function changeTitle(Title $title): void
    {
        $this->title = $title;
        $this->sendEvent(
            new SourceTitleChanged($this->getId(), $title)
        );
    }

    public function changeDescription(Text $description): void
    {
        $this->description = $description;
        $this->sendEvent(
            new SourceDescriptionChanged($this->getId(), $description)
        );
    }

    public function changeStatus(Status $status): void
    {
        if(!$this->getStatus()->canTransiteTo($status)) {
            throw new SourceCanNotTransitionStatusException;
        }

        $this->status = $status;
        $this->sendEvent(
            new SourceSatusChanged($this->getId(), $status)
        );
    }

    public function changeColor(Color $color): void
    {
        $this->color = $color;
        $this->sendEvent(
            new SourceColorChanged($this->getId(), $color)
        );
    }

    public function changePrice(Price $price): void
    {
        $this->price = $price;
        $this->sendEvent(
            new SourcePriceChanged($this->getId(), $price)
        );
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title->getValue();
    }

    public function getDescription(): string
    {
        return $this->description->getValue();
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getColor(): string
    {
        return $this->color->value;
    }

    public function getPrice(): float
    {
        return $this->price->getValue();
    }
}

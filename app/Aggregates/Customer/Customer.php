<?php

namespace App\Aggregates\Customer;

use App\Aggregates\AbstractAggregateRoot;
use App\Values\Birthday;
use App\Values\Group;
use App\Values\Groups;
use App\Values\Id;
use App\Values\Instagram;
use App\Values\Name;
use App\Values\Phone;
use App\Values\Sex;

class Customer extends AbstractAggregateRoot
{
    public function __construct(
        private Id $id,
        private Name $name,
        private Phone $phone,
        private Instagram $instagram,
        private Sex $sex,
        private Birthday $birthday,
        private Groups $groups,
        private bool $blacklist,
    ) {
    }

    public function rename(Name $name): void
    {
        $this->name = $name;
        $this->sendEvent(
            new CustomerRenamed($this->getId(), $name)
        );
    }

    public function changePhone(Phone $phone): void
    {
        $this->phone = $phone;
        $this->sendEvent(
            new CustomerPhoneChanged($this->getId(), $phone)
        );
    }

    public function changeInstagram(Instagram $instagram): void
    {
        $this->instagram = $instagram;
        $this->sendEvent(
            new CustomerInstagramChanged($this->getId(), $instagram)
        );
    }

    public function changeSex(Sex $sex): void
    {
        $this->sex = $sex;
        $this->sendEvent(
            new CustomerSexChanged($this->getId(), $sex)
        );
    }

    public function changeBirthday(Birthday $birthday): void
    {
        $this->birthday = $birthday;
        $this->sendEvent(
            new CustomerBirthdayChanged($this->getId(), $birthday)
        );
    }

    public function addToGroup(Group $group): void
    {
        $this->groups = $group;
        $this->sendEvent(
            new CustomerAddedToTheGroup($this->getId(), $group->getId())
        );
    }

    public function removeFromGroup(Group $group): void
    {
        $this->groups = $group;
        $this->sendEvent(
            new CustomerRemoveFromTheGroup($this->getId(), $group->getId())
        );
    }

    public function moveToBlacklist(): void
    {
        if($this->inBlacklist()) {
            throw new SuctomerAlreadyInBlacklistException;
        }

        $this->blacklist = true;
        $this->sendEvent(
            new CustomerAddedToBlacklist($this->getId())
        );
    }

    public function moveFromBlacklist(): void
    {
        if(!$this->inBlacklist()) {
            throw new SuctomerNotInBlacklistException;
        }

        $this->blacklist = false;
        $this->sendEvent(
            new CustomerRemoveFromBlacklist($this->getId())
        );
    }

    public function inBlacklist(): bool
    {
        return $this->blacklist;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function getInstagram(): Instagram
    {
        return $this->instagram;
    }

    public function getSex(): Sex
    {
        return $this->sex;
    }

    public function getBirthday(): Birthday
    {
        return $this->birthday;
    }

    public function getGroup(): Groups
    {
        return $this->groups;
    }
}

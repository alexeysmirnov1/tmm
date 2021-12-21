<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Buyer extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        parent::boot();

        static::addGlobalScope('role', function (Builder $builder) {
            $builder->whereRole('buyer');
        });

        static::creating(function ($podcast) {
            $podcast->forceFill([
                'role' => 'buyer',
            ]);
        });
    }
}

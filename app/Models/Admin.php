<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Admin extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(
            'role',
            fn (Builder $builder) => $builder->whereRole('admin'),
        );

        static::creating(function ($model) {
            $model->forceFill([
                'role' => 'admin',
            ]);
        });
    }
}

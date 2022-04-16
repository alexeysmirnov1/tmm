<?php

namespace App\Models;

use App\Scopes\NotDeletedScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Moderator extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(
            'role',
            fn (Builder $builder) => $builder->whereRole('moderator'),
        );

        static::creating(function ($model) {
            $model->forceFill([
                'role' => 'moderator',
            ]);
        });
    }
}

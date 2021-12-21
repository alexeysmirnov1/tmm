<?php

namespace App\Models;

use App\Scopes\NotDeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return true; //TODO
    }

    protected static function booted()
    {
        parent::boot();

        static::addGlobalScope(new NotDeletedScope);
    }

    public function getFullNameAttribute(): string
    {
        return "$this->second_name $this->first_name $this->middle_name";
    }

    public function setFullNameAttribute(string $fullName): string
    {
        $name = explode(' ', $fullName);

        return $this->attributes['first_name'] = $name[1];
    }

    public function scopeNotDeleted(Builder $query): Builder
    {
        return $query->where('deleted', false);
    }
}

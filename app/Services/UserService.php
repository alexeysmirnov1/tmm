<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function user()
    {
        $user = User::find(1);

//        User::create([
//            'name' => 'Name',
//        ]);
//
//        $user->update([
//            'name' => 'Name 1',
//        ]);
//
//        $user->delete();

        $fullName = $user->full_name;

        $user->full_name = 'Фамилия Имя Отчество';

//        $notDeletedUsers = User::where('deleted', false)->get();
//        $notDeletedUsers = User::notDeleted()->get();

        $allUsers = User::all(); // executed with global scope
    }
}

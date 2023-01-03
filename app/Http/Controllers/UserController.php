<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public static function getEmails()
   {
    $users = (object) User::all();
    $emails = [];
    $i = 0;
    foreach ($users as $user)
    {
        $emails[$i] = $user->email;
        $i ++;
    }
    return $emails;
   }
}

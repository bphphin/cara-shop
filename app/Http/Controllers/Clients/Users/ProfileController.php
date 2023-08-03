<?php

namespace App\Http\Controllers\Clients\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        return view('clients.pages.users.profile');
    }
}

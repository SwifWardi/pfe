<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
class ProfileController extends Controller
{
    public function index($id)
    {
        $profile = User::find($id);
        return view('auth.profile', compact('profile'));
    }
}

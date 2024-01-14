<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function index()
    {
        $authUser = Auth::user();

        if ($authUser->isModerator()){
            return redirect('moderator/dashboard');
        }

        if ($authUser->isUser()){
            return redirect('user/dashboard');
        }

        if ($authUser->isOwner()){
            return redirect('owner/dashboard');
        }
    }
}

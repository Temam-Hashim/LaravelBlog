<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $posts = Auth::user()->posts;

        return view("admin.dashboard",['posts' => $posts]);
    }

    
}

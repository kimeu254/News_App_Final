<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return News::all();
    }

    public function getUsers()
    {
        return User::all();
    }

}

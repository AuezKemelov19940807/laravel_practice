<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.php');
    }

    public function  redirectAdminIndex()
    {
        return redirect()->route('admin.posts.index');
    }
}

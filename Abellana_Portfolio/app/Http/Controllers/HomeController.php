<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function index() {
        // only one profile record should drive the home page
        $profile = Home::first();
        return view('pages.home', compact('profile'));
    }
}

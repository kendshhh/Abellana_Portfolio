<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function index() {
        $profiles = Home::all();
        return view('pages.home', compact('profiles'));
    }
}

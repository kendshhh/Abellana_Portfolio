<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index() {
        $experiences = Experience::all();
        return view('pages.experiences', compact('experiences'));
    }
}

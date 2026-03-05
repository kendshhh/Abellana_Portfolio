<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index() {
        // remove duplicates by combining role + organization + year
        $experiences = Experience::all()->unique(function($item) {
            return $item->role . '|' . $item->organization . '|' . $item->year;
        });
        return view('pages.experiences', compact('experiences'));
    }
}

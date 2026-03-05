<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        // order by sort_order then start_year desc
        $educations = Education::orderBy('sort_order')
            ->orderByDesc('start_year')
            ->get()
            ->unique('id');

        return view('pages.educations', compact('educations'));
    }
}

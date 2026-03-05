<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        // fetch and deduplicate by title (same content may have different ids)
        $projects = Project::all()->unique('title');
        return view('pages.projects', compact('projects'));
    }
}

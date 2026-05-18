<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinalProject;

class FinalProjectController extends Controller
{
    public function index()
    {
        $projects = FinalProject::all();
        return view('projects.index', compact('projects'));
    }
}

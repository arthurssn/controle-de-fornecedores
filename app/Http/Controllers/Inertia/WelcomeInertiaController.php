<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class WelcomeInertiaController extends Controller
{

    public function index()
    {
        return Inertia::render('Welcome');
    }
}

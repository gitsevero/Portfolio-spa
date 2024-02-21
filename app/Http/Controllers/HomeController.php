<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class HomeController extends Controller
{
    public function index(Request $request)
    {


        $lastButton = $request->input('lastButton');

        return Inertia::render('Home', [
            'name' => 'Thierry',

            'lastButton' => $lastButton
        ]);
    }

    public function Youtube(Request $request)
    {


        $lastButton = $request->input('lastButton');

        return Inertia::render('Youtube', [
            'name' => 'Thierry',

            'lastButton' => $lastButton
        ]);
    }
    public function Portfolio(Request $request)
    {


        $lastButton = $request->input('lastButton');

        return Inertia::render('Portfolio', [
            'name' => 'Thierry',

            'lastButton' => $lastButton
        ]);
    }
    public function about(Request $request)
    {

        $lastButton = $request->input('lastButton');


        return Inertia::render('About', [
            'name' => 'Thierry',

            'lastButton' => $lastButton
        ]);
    }
}

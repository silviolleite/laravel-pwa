<?php

namespace LaravelPWA\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use LaravelPWA\Services\LaucherIconService;
use LaravelPWA\Services\ManifestService;

class LaravelPWAController extends Controller
{
    public function manifestJson()
    {
        $output = (new ManifestService)->generate();
        return response()->json($output);
    }

    public function offline(){
        return view('laravelpwa::offline');
    }
}

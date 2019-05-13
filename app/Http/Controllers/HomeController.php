<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Assets;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companiescount = Companies::count();
        $assetcount = Assets::count();

        $newcompony = Companies::orderBy('id', 'desc')->take(5)->get();
        $newassets = Assets::orderBy('id', 'desc')->take(5)->get();

        $data['newcompony'] = $newcompony;
        $data['newassets'] = $newassets;
        $data['companiescount'] = $companiescount;
        $data['assetcount'] = $assetcount;
        return view('home')->with($data);
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Race;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*   public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $sponsor = Sponsor::paginate();
        $races = Race::paginate();
        $request->session()->put('key', 'value');
        return view('home', compact('races'))
            ->with('i', (request()->input('page', 1) - 1) * $races->perPage())
            ->with('diaActual',$date)
            ->with('sponsorImage',$sponsor);

    }

    public function homeAdmin()
    {
        return view('admin/home-admin');
    }
}

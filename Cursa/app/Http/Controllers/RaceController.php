<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use App\Models\RacetrackRecord;
use App\Models\Runner;
use App\Models\RaceSponsor;
use App\Models\Sponsor;
use App\Models\raceImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
/**
 * Class RaceController
 * @package App\Http\Controllers
 */
class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $races = Race::paginate();
        $request->session()->put('key', 'value');
        return view('race.index', compact('races'))
            ->with('i', (request()->input('page', 1) - 1) * $races->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $race = new Race();
        return view('race.create', compact('race'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Race::$rules);

        $input = $request->all();

        if ($image = $request->file('maps_image')) {
            $destinationPath = 'mapsImages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['maps_image'] = "$profileImage";
        }

        if ($image = $request->file('promotional_poster')) {
            $destinationPath = 'promotionalPosters/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['promotional_poster'] = "$profileImage";
        }
        $race = Race::create($input);

        return redirect()->route('races.index')
            ->with('success', 'Race created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $runners = RacetrackRecord::with('race')->where('race_id','=',$id)->get();
        return view('race.show', compact('runners','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $race = Race::find($id);
        return view('race.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Race $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Race $race)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
		    'ramp' => 'required',
		    'max_participants' => 'required',
            'race_price' => 'required',
		    'km' => 'required',
		    'date' => 'required',
		    'hour' => 'required',
		    'starting_point' => 'required',
		    'sponsor_price' => 'required'
        ]);

        $race->update($request->all());

        return redirect()->route('races.index')
            ->with('success', 'Race updated successfully');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if(Race::find($id)->active == "0"){
            $race = Race::find($id)->update(['active' => "1"]);
        }else{
            $race = Race::find($id)->update(['active' => "0"]);
        }
        //$race = Race::find($id)->delete();
        return redirect()->route('races.index')
            ->with('success', 'Race status edit successfully');
    }

    public function runnerForm(Request $request){
        $race = Race::with('raceInsurer')->where('id','=',$request->id)->get();
        return view('race.runnerForm', compact('race'));
    }

    public function racePage(Request $request)
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $race = Race::find($request->id);
        $raceImage = raceImage::with('race')->where('race_id','=',$request->id)->get();
        $sql ="SELECT sponsors.logo FROM `sponsors` INNER JOIN `race_sponsors` ON sponsors.cif = race_sponsors.sponsor_cif WHERE race_sponsors.race_id = '".$request->id."'";
        $sponsorImage = DB::select($sql);
        return view('race.racePage', compact('race','sponsorImage','raceImage','date'));
    }

    public function allRace(Request $request)
    {

        $races = Race::paginate();
        $request->session()->put('key', 'value');
        return view('race.allRaces', compact('races'))
            ->with('i', (request()->input('page', 1) - 1) * $races->perPage());


    }

    public function raceSearch(Request $request)
    {
        $busqueda = $request->race;
        $races = Race::where('description','LIKE','%'.$request->race.'%')->get();
        return view('race.search', compact('races','busqueda'));
    }

    public function gallery()
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $races = Race::with('raceimage')->where('date','<',$date)->orderBy('date', 'desc')->get();
        //dd(intval(ceil(count($races[2]['raceimage'])/3)));
        return view('race.gallery', compact('races'));
    }

}

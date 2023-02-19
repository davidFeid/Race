<?php

namespace App\Http\Controllers;

use App\Models\RacetrackRecord;
use Illuminate\Http\Request;
use App\Models\Race;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Class RacetrackRecordController
 * @package App\Http\Controllers
 */
class RacetrackRecordController extends Controller
{
    public function index(Request $request)
    {
        if(Race::find($request->id)){
            $race = Race::with('raceInsurer')->where('id','=',$request->id)->get();
            $countRunners = RacetrackRecord::select('*')->where('race_id','=',$request->id)->count();
            /*if($countRunners < $race[0]->max_participants){
                dump('hola bien');
            }else{
                dump("lleno");
            }*/
            return view('race.runnerForm', compact('race','countRunners'));
        }else{
            dd('holi');
        }
    }
}

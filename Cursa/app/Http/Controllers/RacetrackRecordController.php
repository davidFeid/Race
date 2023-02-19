<?php

namespace App\Http\Controllers;

use App\Models\RacetrackRecord;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Runner;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Class RacetrackRecordController
 * @package App\Http\Controllers
 */
class RacetrackRecordController extends Controller
{
    public function runnerForm(Request $request)
    {
        if(Race::find($request->id)){
            $race = Race::with('raceInsurer')->where('id','=',$request->id)->get();
            $countRunners = RacetrackRecord::select('*')->where('race_id','=',$request->id)->count();
            if($countRunners < $race[0]->max_participants){
                dump('hola bien');
                $dorsal = $countRunners + 1;
                $id = $request->id;
            }else{
                dump("lleno");
            }
            $runner = new Runner();
            return view('race.runnerForm', compact('race','dorsal','id','runner'));
        }else{
            dd('holi');
        }
    }

    public function storeRunnerForm(Request $request){
        if(Runner::find($request->runner_dni)){
            if(RacetrackRecord::select('*')->where('runner_dni','=',$request->runner_dni)->where('race_id','=',$request->race_id)){
                dd("Ya estas registrado en esta carrera");
            }else{
                request()->validate([
                    'runner_dni' => 'required',
    		        'insurer_cif' => 'required',
	    	        'dorsal' => 'required',
		            'race_id' => 'required'
                ]);

                $input = $request->all();
                $name = $request->runner_dni.'_'.$request->race_id.'_qr.svg';
                QrCode::generate('http://127.0.0.1:8000/racetrack-record/'.$request->race_id.'/'.$request->runner_id, '../public/qrcodes/'.$name);
                $input['qr'] = $name;

                RacetrackRecord::create($input);

                return redirect('http://127.0.0.1:8000/runnerForm/'.$request->race_id);
            }
        }else{
            dd('no esta registrado');
        }
    }

    public function storeRunnerRegister(Request $request){
        request()->validate(Runner::$rules);
        if(!(Runner::find($request->dni))){
            Runner::create($request->all());

            request()->validate([
                'dni' => 'required',
                'insurer_cif' => 'required',
                'dorsal' => 'required',
                'race_id' => 'required'
            ]);
            $input = $request->all();
            $name = $request->dni.'_'.$request->race_id.'_qr.svg';
            QrCode::generate('http://127.0.0.1:8000/racetrack-record/'.$request->race_id.'/'.$request->runner_id, '../public/qrcodes/'.$name);
            $input['qr'] = $name;
            $input['runner_dni'] = $request->dni;
            RacetrackRecord::create($input);
            return redirect('http://127.0.0.1:8000/runnerForm/'.$request->race_id);
        }else{
            dd("Registro ya existente");
        }
    }
}

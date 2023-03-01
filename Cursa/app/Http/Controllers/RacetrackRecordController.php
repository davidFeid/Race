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
                $dorsal = $countRunners + 1;
                $id = $request->id;
                $race_price = $race[0]->race_price;
                $lleno = false;
            }else{
                $dorsal = NULL;
                $id = NULL;
                $race_price = NULL;
                $lleno = true;
            }
            $runner = new Runner();
            return view('race.runnerForm', compact('race','dorsal','id','runner','race_price','lleno'));
        }else{
            return redirect('http://127.0.0.1:8000');
        }
    }

    public function checkRunnerForm(Request $request){
        if(Runner::find($request->runner_dni)){
            if(RacetrackRecord::select('*')->where('runner_dni','=',$request->runner_dni)->where('race_id','=',$request->race_id)->count() > 0){
                return redirect()
                    ->back()
                    ->with('error', 'Ya estas registrado como corredor.');
            }else{
                $request->session()->put('array', $request->all());
                dump($request->amount);
                return view('paypal.index', ['amount' => $request->amount]);
            }
        }else{
            return redirect()
                ->back()
                ->with('error', 'No estas registrado como corredor.');
        }
    }

    public function storeRunnerForm(Request $request){
        $runner = $request->session()->all()['array'];
        $insurer = explode(",",$runner['insurer_cif']);
        $runner['insurer_cif'] = $insurer[0];
        $name = $runner['runner_dni'].'_'.$runner['race_id'].'_qr.svg';
        QrCode::generate('http://127.0.0.1:8000/racetrack-record/'.$runner['race_id'].'/'.$runner['runner_dni'], '../public/qrcodes/'.$name);
        $runner['qr'] = $name;
        RacetrackRecord::create($runner);
        $request->session()->forget('array');
        return redirect('http://127.0.0.1:8000/runnerForm/'.$runner['race_id']);
    }

    public function checkRunnerRegister(Request $request){
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
            QrCode::generate('http://127.0.0.1:8000/racetrack-record/'.$request->race_id.'/'.$request->dni, '../public/qrcodes/'.$name);
            $input['qr'] = $name;
            $input['runner_dni'] = $request->dni;
            RacetrackRecord::create($input);
            return redirect('http://127.0.0.1:8000/runnerForm/'.$request->race_id);
        }else{
            return redirect()
                ->back()
                ->with('error', 'Ya estas registrado en nuestro sistema.');
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
            QrCode::generate('http://127.0.0.1:8000/racetrack-record/'.$request->race_id.'/'.$request->dni, '../public/qrcodes/'.$name);
            $input['qr'] = $name;
            $input['runner_dni'] = $request->dni;
            RacetrackRecord::create($input);
            return redirect('http://127.0.0.1:8000/runnerForm/'.$request->race_id);
        }else{
            dd("Registro ya existente");
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\RacetrackRecord;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Runner;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;


/**
 * Class RacetrackRecordController
 * @package App\Http\Controllers
 */
class RacetrackRecordController extends Controller
{
    public function runnerForm(Request $request)
    {

        $response=($request->session()->get('response'));


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
            return view('race.runnerForm', compact('race','dorsal','id','runner','race_price','lleno','response'));
        }else{
            return redirect('http://127.0.0.1:8000');
        }
    }

    public function checkRunnerForm(Request $request){
        //dd($request->all());

        if(Runner::find($request->runner_dni)){
            if(RacetrackRecord::select('*')->where('runner_dni','=',$request->runner_dni)->where('race_id','=',$request->race_id)->count() > 0){
                return redirect()
                    ->back()
                    ->with('error', 'Ya estas registrado como corredor.');
            }else{
                if(isset($request->insurer_cif)){
                    $request->session()->put('array', $request->all());
                    return view('paypal.index', ['amount' => $request->amount]);

                }else{
                    $runner = Runner::find($request->runner_dni);

                    if($runner->federation == 1){
                        $request->session()->put('array', $request->all());
                        return view('paypal.index', ['amount' => $request->amount]);
                    }else{
                        return redirect()
                            ->back()
                            ->with('error', 'No estas registrado como corredor federado');
                    }
                }
            }
        }else{
            return redirect()
                ->back()
                ->with('error', 'No estas registrado como corredor.');
        }
    }

    public function storeRunnerForm(Request $request){

        $runner = $request->session()->all()['array'];
        if(isset($runner['insurer_cif'])){
            $insurer = explode(",",$runner['insurer_cif']);
            $runner['insurer_cif'] = $insurer[0];

        }else{
            $runner['insurer_cif'] = NULL;
        }
        $name = $runner['runner_dni'].'_'.$runner['race_id'].'_qr.svg';
        QrCode::generate('http://127.0.0.1:8000/racetrack-record/'.$runner['race_id'].'/'.$runner['runner_dni'], '../public/qrcodes/'.$name);
        $runner['qr'] = $name;
        RacetrackRecord::create($runner);
        $request->session()->forget('array');
        //return redirect('http://127.0.0.1:8000/runnerForm/'.$runner['race_id']);

        return redirect('http://127.0.0.1:8000/runnerForm/'.$runner['race_id'])
                ->with('success', $response['message'] ?? 'Transaction approved.')
                ->with('response', $request->session()->get('response'));
    }

    public function checkRunnerRegister(Request $request){
        request()->validate(Runner::$rules);
        if(!(Runner::find($request->dni))){
            $request->session()->put('array', $request->all());
            return view('paypal.index', ['amount' => $request->amount]);
        }else{
            return redirect()
                ->back()
                ->with('error', 'Ya estas registrado en nuestro sistema.');
        }
    }

    public function storeRunnerRegister(Request $request){

        $runner = $request->session()->all()['array'];
        if($runner['federation'] == 1){
            $runner['insurer_cif'] = NULL;
        }else{
            $insurer = explode(",",$runner['insurer_cif']);
            $runner['insurer_cif'] = $insurer[0];
        }
        $name = $runner['dni'].'_'.$runner['race_id'].'_qr.svg';
        QrCode::generate('http://127.0.0.1:8000/racetrackRecord/'.$runner['race_id'].'/'.$runner['dni'], '../public/qrcodes/'.$name);
        $runner['qr'] = $name;
        $runner['runner_dni'] = $runner['dni'];
        RacetrackRecord::create($runner);
        $request->session()->forget('array');

        //return redirect('http://127.0.0.1:8000/runnerForm/'.$runner['race_id']);
        return redirect('http://127.0.0.1:8000/runnerForm/'.$runner['race_id'])

                ->with('success', $response['message'] ?? 'Transaction approved.');
    }


    public function racetrackRecord(Request $request){
        /* 25 puntos al primer, 18 al segundo, 15 al tercero, 12 al cuarto, 10 al quinto, 8 al sexto, 6 al séptimo, 4 al octavo, 2 al noveno y 1 al décimo.*/
        $arrayPoitns = [1=>25, 2=>18, 3=>15, 4=>12, 5=>10, 6=>8, 7=>6, 8=>4, 9=>2, 10=>1];

        $race = Race::find($request->id);

        $date = Carbon::now();
        $dateDais = $date->format('Y-m-d');
        $dateHours = $date->format('h:i:s');

        if( $race->date == $dateDais && $race->hour < $dateHours ){

            $count = RacetrackRecord::where('race_id','=',$request->id)->where('points','!=',NULL)->count();
            //if($count < 10){
                $racetrackRecord = RacetrackRecord::where('race_id','=',$request->id)->where('runner_dni','=',$request->dni)->first();
                $racetrackRecord->points = $arrayPoitns[$count+1] ?? 0;
                $racetrackRecord->time = $date->diff($race->hour )->format('%H:%I:%S');
                $racetrackRecord->save();
            /*}else{
                $race = RacetrackRecord::where('race_id','=',$request->id)->where('runner_dni','=',$request->dni)->update(['points' =>  0, 'time' =>   $date->diff($race->hour )->format('%H:%I:%S')]);
            }*/

        }else{
            dd('fuera del rango de fechas');
        }

   }
}

<?php

namespace App\Http\Controllers;

use App\Models\RacetrackRecord;
use Illuminate\Http\Request;

/**
 * Class RacetrackRecordController
 * @package App\Http\Controllers
 */
class RacetrackRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $racetrackRecords = RacetrackRecord::paginate();

        return view('racetrack-record.index', compact('racetrackRecords'))
            ->with('i', (request()->input('page', 1) - 1) * $racetrackRecords->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $racetrackRecord = new RacetrackRecord();
        return view('racetrack-record.create', compact('racetrackRecord'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RacetrackRecord::$rules);

        $racetrackRecord = RacetrackRecord::create($request->all());

        return redirect()->route('racetrack-records.index')
            ->with('success', 'RacetrackRecord created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $racetrackRecord = RacetrackRecord::find($id);

        return view('racetrack-record.show', compact('racetrackRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $racetrackRecord = RacetrackRecord::find($id);

        return view('racetrack-record.edit', compact('racetrackRecord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RacetrackRecord $racetrackRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RacetrackRecord $racetrackRecord)
    {
        request()->validate(RacetrackRecord::$rules);

        $racetrackRecord->update($request->all());

        return redirect()->route('racetrack-records.index')
            ->with('success', 'RacetrackRecord updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $racetrackRecord = RacetrackRecord::find($id)->delete();

        return redirect()->route('racetrack-records.index')
            ->with('success', 'RacetrackRecord deleted successfully');
    }
}

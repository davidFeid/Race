<?php

namespace App\Http\Controllers;

use App\Models\Insurer;
use Illuminate\Http\Request;

/**
 * Class InsurerController
 * @package App\Http\Controllers
 */
class InsurerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $insurers = Insurer::paginate();
        $request->session()->put('key', 'value');
        return view('insurer.index', compact('insurers'))
            ->with('i', (request()->input('page', 1) - 1) * $insurers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insurer = new Insurer();
        return view('insurer.create', compact('insurer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Insurer::$rules);

        $insurer = Insurer::create($request->all());

        return redirect()->route('insurers.index')
            ->with('success', 'Insurer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insurer = Insurer::find($id);

        return view('insurer.show', compact('insurer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insurer = Insurer::find($id);

        return view('insurer.edit', compact('insurer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Insurer $insurer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insurer $insurer)
    {
        request()->validate(Insurer::$rules);

        $insurer->update($request->all());

        return redirect()->route('insurers.index')
            ->with('success', 'Insurer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if(Insurer::find($id)->active == "0"){
            $insurer = Insurer::find($id)->update(['active' => "1"]);
        }else{
            $insurer = Insurer::find($id)->update(['active' => "0"]);
        }
        // $insurer = Insurer::find($id)->delete();

        return redirect()->route('insurers.index')
            ->with('success', 'Insurer deleted successfully');
    }
}

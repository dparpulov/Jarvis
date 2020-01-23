<?php

namespace App\Http\Controllers;

use App\Entity\State;
use App\Entity\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::paginate(10);
        //$states->toJson();
        return view('stateFolder/state')->with(compact('states'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stateFolder/stateNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countryId = $request->input('countryId');

        $countryExists = Country::where('id', $countryId)->first(); 

        if ($countryExists){
            $state = new State([
                'id' => $request->input('id'),                
                'countryId' => $countryId,
                'name' => $request->input('stateName'),
                'stateCode' => $request->input('stateCode'),
            ]);

            $state->save();
            return redirect('stateFolder/state')->with('success', 'Successfuly added state');
        }
        else {
            return redirect('stateFolder/state/create')->with('error', 'Country doesn\'t exist');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        return view('stateFolder/stateShow')->with('state', $state);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('stateFolder/stateEdit')->with('state', $state);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $countryId = $request->input('countryId');

        $countryExists = Country::where('id', $countryId)->first(); 

        if ($countryExists){
            $state->id = $request->input('id');
            $state->countryId = $request->input('countryId');
            $state->name = $request->input('name');
            $state->stateCode = $request->input('stateCode');

            $state->save();

            return redirect('stateFolder/state')->with('success', 'State Updated');
        }
        else {
            return redirect('stateFolder/state/edit')->with('error', 'Country doesn\'t exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect('stateFolder/state')->with('success', 'State Deleted');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DependentRequest;
use App\Models\People;
use App\Models\Dependent;

class DependentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $peopleID)
    {

        $person = People::with(['dependents'])->find($peopleID);
        // dd($person);

        return view('platform.dependents.form', compact('person'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DependentRequest $request, $peopleID)
    {

        // dd($request->all());

        $data = [
            'nome' => $request->input('nome'),
            'pessoa_id' => $request->input('pessoa_id'),
            'data_nascimento' => $request->input('data_nascimento'),
        ];

        Dependent::create($data);

        return redirect( route('people.dependents.create', [$peopleID]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DependentRequest $request, $peopleID, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $peopleID, $id)
    {
        Dependent::find($id)->delete();
        
        return redirect( route('people.dependents.create', [$peopleID]) );
    }
}

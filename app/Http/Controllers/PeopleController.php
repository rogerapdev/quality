<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PeopleRequest;
use App\Models\People;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $people = People::paginate(2);

        return view('platform.people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platform.people.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeopleRequest $request)
    {

        // $timestamp = str_replace('/', '-', $request->input('data_nascimento'));
        // $data_nascimento = date('Y-m-d', strtotime($timestamp));
        $data = [
            'nome' => $request->input('nome'),
            'data_nascimento' => $request->input('data_nascimento'),
            'email' => $request->input('email'),
        ];

        People::create($data);

        return redirect(route('people.index'));
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
        $person = People::find($id);

        return view('platform.people.form', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeopleRequest $request, $id)
    {

        $data = $request->all();
        if ($request->hasFile('foto')) {
            // dd($request->foto->path());

            $data['foto_base64'] = base64_encode(file_get_contents($request->foto->path()));
            $data['nome_arquivo_foto'] = $request->foto->getClientOriginalName();
            $data['foto_tipo'] = $request->foto->extension();

            // $data['foto_base64'] = base64_decode($request->input('foto'));
        }
        // dd($data);

        People::find($id)->update($data);

        return redirect(route('people.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect(route('people.index'));
    }

    /**
     * Remove all resources from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {

        if($request->has('selected')) {
            foreach ($request->input('selected') as $key => $value) {
                People::find($value)->delete();
            }
        }
        return redirect(route('people.index'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request, $id)
    {
        $person = People::find($id);
        $person->update(['status' => $person->status == 'ativo' ? 'inativo' : 'ativo']);

        return redirect(route('people.index'));
    }

}

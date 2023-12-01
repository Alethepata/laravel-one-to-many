<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tecnology;
use App\Http\Requests\TecnologyRequest;


class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologies = Tecnology::all();
        return view('admin.tecnologies.index', compact('tecnologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TecnologyRequest $request)
    {
        $exist = Tecnology::where('name', $request->name)->first();

        if ($exist) {
            return redirect()->route('admin.tecnologies.index')->with('error', "$request->name esiste");
        }else{

            $form_data = $request->all();
            $form_data['slug'] = Tecnology::generateSlug($form_data['name']);

            $new_category = new Tecnology;
            $new_category->fill($form_data);

            $new_category->save();

            return redirect()->route('admin.tecnologies.index')->with('success', 'Aggiunto correttamente');

        }


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
    public function update(TecnologyRequest $request, Tecnology $tecnology )
    {
        $exist = Tecnology::where('name', $request->name)->first();

        if ($exist) {
            return redirect()->route('admin.tecnologies.index');
        }else{

            $form_data = $request->all();

            $form_data['slug'] = Tecnology::generateSlug($form_data['name']);


            $tecnology->update($form_data);

            return redirect()->route('admin.tecnologies.index')->with('success', 'Aggiornato correttamente');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnology $tecnology )
    {
        $tecnology->delete();
        return redirect()->route('admin.tecnologies.index')->with('success', 'Eliminato correttamente');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Type;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function typeProject(){
        $types= Type::all();
        return view('admin.types.type-project', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $exist = Type::where('name', $request->name)->first();

        if ($exist) {
            return redirect()->route('admin.types.index')->with('error', "$request->name esiste");
        }else{

            $form_data = $request->all();
            $form_data['slug'] = Type::generateSlug($form_data['name']);

            $new_type = new Type;
            $new_type->fill($form_data);

            $new_type->save();

            return redirect()->route('admin.types.index')->with('success', 'Aggiunto correttamente');

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
    public function update(TypeRequest $request,Type $type)
    {
        $exist = Type::where('name', $request->name)->first();

        if ($exist) {
            return redirect()->route('admin.types.index');
        }else{

            $form_data = $request->all();

            $form_data['slug'] = Type::generateSlug($form_data['name']);


            $type->update($form_data);

            return redirect()->route('admin.types.index')->with('success', 'Aggiornato correttamente');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', 'Eliminato correttamente');
    }
}

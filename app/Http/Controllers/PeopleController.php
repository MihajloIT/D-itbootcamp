<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $date = People::all();

        return view('people.index', ['data' => $date]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       
        return view('people.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:genres,name_en',
            'surname' => 'required|unique:genres,name_sr',
            'b_date' => 'nullable|unique:genres,name_sr'
        ]);
      
        People::create($request->all()); 
        return redirect()->route('people.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(People $people)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(People $people)
    {
        //
        return view('people.edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, People $people)
    {
        //
        $request->validate
        ([
            'name' => ['required', 
            //'unique:genres,name_en' -- izmenili smo ovo ovim dole tekstom
            Rule::unique('people', 'name')->ignore($people->id),
            'alpha'],
            'surname' => ['nullable',
            Rule::unique('people', 'surname')->ignore($people->id),
            'alpha']
        ]);

        $people->update($request->all()); // ovo kad sam ubacio poceo je da cuva podatke u bazi koje su izmenjene

        return redirect()->route('people.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $people)
    {
        //
    }
}

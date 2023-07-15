<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
                // $id = 3;
                // $aModel = Genre::find($id );
                // $aModel -> id; // izvlacenje podataka 
                // $aModel ->name_en;
                // $aModel -> name_sr;

        //Dobavljanje sve podatke iz tabele

        $locale = App::currentLocale(); // ili en ili sr
        // en -> sort po name_en
        // sr -> sort po name_sr

        if($locale == 'en')
        {
            $data = Genre::orderBy('name_en')->paginate(5);
        }elseif($locale == 'sr')
        {
            $data = Genre::orderBy('name_sr')->paginate(5);
        }else
        {
        //$data = Genre::all();
        $data = Genre::paginate(6); // ovo smo izmenili
        }

        // Sad zovemo view kojom prosledjujemo info
        return view('genre.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        //Ne pozivamo bazu zato ide samo return view
        return view('genre.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate
        ([
            'name_en' => 'required|unique:genres,name_en|alpha',
            'name_sr' => 'nullable|unique:genres,name_sr|alpha'
        ]); // nema upisano return back isl , jer automatski ako nije validno on ce sam izbaciti returnback false itd,a kod se ne izvrsava na dalje. Ako je validacija ispravna kod se nastavlja na Genre::creat...
        //Ovo 'name_en' i name_sr se poklapa sa inputovim NAME elementom

         //1. Create , mora da je podrzanu u modelu 
            //Genre::create(['id'=>'5', 'name_en'=>'mistery', 'name_sr'=>'misterija']);
        //2. Istanca klase
            // $g = new Genre;
            // $g ->name_en = 'mistery';
            // $g ->name_sr = 'misterija';
            // $g -> save();
        // Ove dve gore opcije su teze od ove dole kad je u pitanju pozivanje svih kolona iz tabele
      
        Genre::create($request->all()); 

        $request->session()->flash('alertType', 'success');
        $request->session()->flash('alertMsg', 'You have added successfully');


        return redirect()->route('genre.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //funkcion edit odradi ovo $genre= Genre::find($request->input('id))
    public function edit(Genre $genre)
    {
        // koristi compact da bi izvukao fajlove kojima ce posle ispuniti formu za edit

        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
        $request->validate
        ([
            'name_en' => ['required', 
            //'unique:genres,name_en' -- izmenili smo ovo ovim dole tekstom
            Rule::unique('genres', 'name_en')->ignore($genre->id),
            'alpha'],
            'name_sr' => ['nullable',
            Rule::unique('genres', 'name_sr')->ignore($genre->id),
            'alpha']
        ]);

        $genre->update($request->all()); // ovo kad sam ubacio poceo je da cuva podatke u bazi koje su izmenjene

        $request->session()->flash('alertType', 'success');
        $request->session()->flash('alertMsg', 'Successfuly edited');

        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
        $genre -> delete();

        session()->flash('alertType', 'success');
        session()->flash('alertMsg', 'Successfuly deleted');

        return redirect()->route('genre.index'); // nakon brisanja redirektujemo korisnika na stranicu
    }
}

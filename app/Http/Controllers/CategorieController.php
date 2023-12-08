<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categorie::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
        ]);

        $categorie = new categorie;
        $categorie->nom = $request->nom;
        $categorie->user_id = auth()->user()->id; 
        $categorie->save();

        event(new Registered($categorie));

        return back()->with('message', "Le categorie a bien été créée !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $categorie = categorie::find($id);
        
        return view('categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)  //(Request $request)
    {
        //$categorie = categorie::find($request->route('id'));
        $categorie = categorie::find($id);

        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nom' => 'required|max:100',
        ]);
        
        $categorie = categorie::find($id);
        $categorie->nom = $request->nom;
        $categorie->user_id = auth()->user()->id; 
        $categorie->save();
        return back()->with('message', "Le categorie a bien été modifié !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = categorie::find($id);
        $categorie->delete();
        $categories = categorie::all();
        return view('categories.index', compact('categories'));
    }
}

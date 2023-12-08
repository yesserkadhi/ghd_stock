<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        $categories = Categorie::orderBy('nom')->get();
        return view('produits.index', compact('categories'), compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::orderBy('nom')->get();
        return view('produits.create', compact('categories'));
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
            'categorie_id' =>['required'],
            'libelle' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:1'],
        ]);

        //$produit = Produit::create($request->all());
        $produit = new Produit;
        $produit->categorie_id = $request->categorie_id;
        $produit->user_id = Auth::user()->id;
        $produit->libelle = $request->libelle;
        $produit->stock = $request->stock;
        $produit->save();

        event(new Registered($produit));

        return back()->with('message', "Le produit a bien été créée !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::orderBy('nom')->get();
        return view('produits.show', compact('categories'), compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::orderBy('nom')->get();
        return view('produits.edit', compact('categories'), compact('produit'));
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
            'categorie_id' =>['required'],
            'libelle' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:1'],
        ]);
        $produit = Produit::find($id);
        $produit->categorie_id = $request->categorie_id;
        $produit->user_id = Auth::user()->id;
        $produit->libelle = $request->libelle;
        $produit->stock = $request->stock;
        $produit->save();
        return back()->with('message', "Le produit a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);
        //si j'avais laissé en parametre la classe (produit $produit) j'aurais juste pas eu besoin de la ligne au dessus.
        $produit->delete();
        $produits = Produit::all();
        $categories = Categorie::orderBy('nom')->get();
        return view('produits.index', compact('categories'), compact('produits'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ligne;
use App\Models\Entree;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class LigneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($entree_id)
    {
        $user = Auth::user();
        $produits = Produit::orderBy('libelle')->get();
        $BE = Entree::where('id', $entree_id)->get()->first();
       //dd($BE);
        // Retrieve the lines for the authenticated user and the specified entry
        $lignes = Ligne::where('user_id', $user->id)
            ->where('entree_id', $entree_id)
            ->get();
    
        return view('lignes.index', compact('produits','entree_id','lignes','BE'));
    }
    
    public function show($id)
    {
        $ligne = Ligne::find($id);
        $produits = Produit::orderBy('libelle')->get();
        return view('lignes.show', compact('produits'), compact('ligne'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($entree_id)
    {
        $produits = Produit::orderBy('libelle')->get();

        return view('lignes.create', compact('entree_id', 'produits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $entree_id)
    {
        $request->validate([
            'produit_id' => 'required',
            'quantite' => 'required|integer|min:1',
            'prix' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $user = Auth::user();
        $ligne = Ligne::create([
            'produit_id' => $request->input('produit_id'),
            'quantite' => $request->input('quantite'),
            'prix' => $request->input('prix'),
            'date' => $request->input('date'),
            'user_id' => $user->id,
            'entree_id' => $entree_id,
        ]);

        $produit = Produit::find($request->input('produit_id'));
        $produit->stock += $request->input('quantite');
        $produit->save();

        event(new Registered($ligne));

        return redirect()->route('lignes.index', ['entree_id' => $entree_id])
            ->with('message', 'Ligne ajoutée avec succès.');
    }

    // Add methods for editing and updating here

    public function destroy($entree_id, $ligne_id)
    {
        $ligne = Ligne::find($ligne_id);
        $produitId = $ligne->produit_id;

        //dd($produitId);
        $produit = Produit::where('id',$produitId)->first();
        //dd($produit->stock);
        $produit->stock -= $ligne->quantite;
        $produit->save();
        $ligne->delete();
        return redirect()->route('lignes.index', ['entree_id' => $entree_id])
            ->with('message', 'Ligne supprimée avec succès.');
    }

 
}

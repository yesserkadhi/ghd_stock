<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class EntreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $entrees = Entree::where('user_id', $user->id)->get();
        return view('entrees.index', compact('entrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $latestId = Entree::max('id') + 1;
        $request->validate([
        ]);

        $user = Auth::user();
        $entree = Entree::create([
            'num_be' => 'BE_' . $latestId,
            
            'user_id' => $user->id,  
        ]);

        event(new Registered($entree));

        return back()->with('message', "Entrée enregistrée !");
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $entree = Entree::find($id);
       return view('entrees.show', compact('entree'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entree = Entree::find($id);
        return view('entrees.edit', compact('entree'));
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
            'num_be' => ['unique:entrees,num_be'],
        ]);
        $entree = Entree::find($id);
        $entree->produit_id = $request->categorie_id;
        return back()->with('message', "L'entrée a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entree = Entree::find($id);
        $entree->delete();
        $entrees = Entree::all();
        return view('entrees.index',compact('entrees'));
    }
}

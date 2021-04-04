<?php

namespace App\Http\Controllers;

use App\Models\Favorite;

use Illuminate\Http\Request;

use Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('favorites.index');
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
    public function store(Request $request)
    {
        if($request->pokemonId > 0){
            
           $row = Favorite::where('user_id', Auth::user()->id)
                           ->where('pokemon_id', $request->pokemonId)
                           ->count();
             if($row == 0){
                $favorito = Favorite::create([
                    'user_id'    => Auth::user()->id,
                    'pokemon_id' => $request->pokemonId,        
                ]);

                return response()->json([
                    'Estado' => 'success'
                ]);
            }

            return response()->json([
                'Estado' => 'failure'
            ],404);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pokemons = Favorite::where('user_id', Auth::user()->id)
                              ->get();

        return response()->json([
            'pokemons' => $pokemons
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    public function checked(Request $request)
    {
        if($request->pokemonId > 0){
            $row = Favorite::where('user_id', Auth::user()->id)
                           ->where('pokemon_id', $request->pokemonId)
                           ->count();
            if($row > 0){
                return response()->json([
                    'checked' => true
                ]);
            }else{
                return response()->json([
                    'checked' => false
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->pokemonId > 0){

            $row = Favorite::where('user_id', Auth::user()->id)
                            ->where('pokemon_id', $request->pokemonId)
                            ->count();
            if($row > 0){
                
                $favs =Favorite::where('user_id', Auth::user()->id)
                                ->where('pokemon_id', $request->pokemonId)
                                ->delete();
                
                return response()->json([
                    'prueba' => 'borrar a'.$request->pokemonId
                ]);
            }

        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Utilities\FilteringHelper;

define( 'PER_PAGE', 50 );

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $content = Pokemon::where(function($query) use($request) {
            // Search for "name"
            $name = $request->query('name');

            return $name
                ? $query->where('name', 'LIKE', '%'.$name.'%')
                : $query;
        })
            ->where(function($query) use($request) {
                // Define filters
                $clauses = FilteringHelper::create(
                    array('hp', 'defense', 'attack', 'total', 'sp_atk', 'sp_def', 'speed', 'generation'),
                    $request->query()
                );

                // Apply filter clauses to content
                foreach ($clauses as $clause) {
                    $query = $query->where($clause['field'], $clause['operator'], $clause['value']);
                }

                return $query;
            })
            ->paginate($request->query('perPage', PER_PAGE));

        // Create Response and return JSON content type
        $response = new Response($content->toJson(), 200);
        $response->header('Content-Type', 'application/json');
        return $response;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photographer;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photographer = Photographer::all();
        return response()->json($photographer); //test pour tester l'autosave

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>"integer",
            'bio'=>"string|max:256",
            'portfolio_url'=>"required",
            'contact'=>'required',
        ]);

        try {
            $photographer = Photographer::create($request->all());
            return response()->json($photographer,200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $photographer=Photographer::findOrFail($id);
        try {
            return response()->json($photographer,200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(),500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'bio'=>"string|max:256",
                'portfolio_url'=>"required",
                'contact'=>'required',
            ]
            );
        try {
            $photographer = Photographer::findOrFail($id);
            $photographer->update($request->all());
            return response()->json($photographer,200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(),500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $photographer=Photographer::findOrFail($id);
        try {
            $photographer->delete();
            return response()->json([],200);
        }

        catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(),500);
        }

    }
}

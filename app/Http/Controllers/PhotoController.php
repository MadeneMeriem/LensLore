<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Photo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'title'=>'string|required|max:256',
                'description'=>'required|string',
                'file_path'=>'required|string',
            ]
        );
        $photo = Photo::create($request->all());
        return response()->json($photo,201);
    }

    /**
     * Display the specified resource.
     */
    public function show ($id)
    {
        //
        $photo=Photo::findOrFail($id);
        return response()->json($photo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'title'=>'string|required|max:255;',
                'description'=>'required|string',
            ]
        );
        $photo=Photo::findOrFail($id);
        $photo->update($request->all());
        return response()->json($photo,201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Photo::destroy($id);
        return response()->json(null,204);
    }
}

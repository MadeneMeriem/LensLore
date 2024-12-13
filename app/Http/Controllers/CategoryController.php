<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return response()->json($categories , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

        $request ->validate([
            'name'=>'string|required|max:200',
            'description'=>'string|required',
        ]);
        $category =Category::create($request->all());
        return response()->json($category ,200);
        }
        catch (\Throwable $th) {
            return response($th->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

        $category = Category::findOrFail($id);
        return response()->json($category,200);
        }
        catch (Throwable $th){
            return response($th->getMessage(),500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

        $request ->validate([
            'name'=> 'string|required|max:256',
            'description'=> 'string|max:500',
        ]);
        $category=Category::findOrFail($id);
        $category->update($request->all('name','description'));
        return response()->json($category,200);
        } catch (Throwable $th) {
            return response($th->getMessage(),500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {

        //
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([],200);

        }
        catch (\Throwable $th) {
            return response($th->getMessage(),500);
            //throw $th;
        }
    }
}

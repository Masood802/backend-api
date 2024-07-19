<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipie;
use Illuminate\Support\Facades\Auth;

class RecipiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipies=Recipie::get();
    return response()->json([
        'recipies'=> $recipies
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData=$request->validate([
            'name'=>'required|max:255',
            'instruction'=>'required',
            'category'=>'required',
            'ingredients'=>'required',
            'link'=>'required'  

        ]);
        if($request->hasFile('picture')){
            $formData['picture']=$request->file('picture')->store('images','public');
            
        }
        Recipie::create($formData);
        return response()->json([
            'message'=> 'Recipie added successfully',
            'status'=>200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipie=Recipie::find($id);
        return response()->json([
            'recipie'=> $recipie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produit;
use App\Models\Categorie;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        $produits=Produit::paginate(5);
        return view('Admin.dashboard',compact('users','produits'));
    }
    public function AfficherUtilisateurs()
    {
        $users=User::all();
        return view('Admin.layouts.AfficherUtilisateur',compact('users'));
    }
    public function AjouteProduit()
    {
        $categories=Categorie::all();
        return view('Admin.AjouteProduit',compact('categories'));
    }
    public function StoreProduit(Request $request)
{
    // Validate the incoming request data

    $validatedData = $request->validate([
        'nom' => 'required',
        'image' => 'required|image', // You may want to add image validation rules
        'description' => 'required',
        'prix' => 'required|numeric', // Ensure the price is a number
        'idCategorie' => 'required', // Ensure the category ID exists
    ]);
    // Handle the image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Create the product
    Produit::create($validatedData);

    // Redirect to the success route
    return redirect()->route('DashboardAdmin');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

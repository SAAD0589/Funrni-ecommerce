<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::take(3)->get();
        return view('Utilisateur.index',compact('produits'));
    }
    public function AfficherProduit()
    {
        $produits = Produit::paginate(10); // Display 10 products per page
        return view('Utilisateur.Shop', compact('produits'));
    }
    public function DetailProduits($id)
    {
        $produit=Produit::find($id);
        return view('Utilisateur.DetailsProduit',compact('produit'));
    }
    public function AboutUs()
    {
        $produits=Produit::all();
        return view('Utilisateur.AboutUs',compact('produits'));
    }
    public function AffichageContact()
    {
        return view('Utilisateur.Contact');
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
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}

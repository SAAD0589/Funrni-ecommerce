<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Commande;
class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paniers = DB::table('paniers')
            ->join('produits', 'produits.id', '=', 'paniers.id_produit')
            ->select(
                'paniers.id',
                'produits.nom',
                'produits.image',
                DB::raw('SUM(produits.prix * paniers.quantite) AS total_prix'),
                DB::raw('SUM(paniers.quantite) AS total_quantite')
            )
            ->where('paniers.isCommanded', 0)
            ->groupBy('paniers.id', 'produits.nom', 'produits.id', 'produits.image')
            ->get();

        $totalPrixProduit = $paniers->sum('total_prix');

        // Return the view with the cart items
        return view('Utilisateur.Panier', compact('paniers', 'totalPrixProduit'));
    }
    public function AjouteProduitAuPannier(Request $request, $id)
    {
        $id_user = Auth::id();
        // Check if the product is already in the user's cart
        $panier = Panier::where('id_user', $id_user)
            ->where('id_produit', $id)
            ->first();

        if ($panier) {
            // If the product is already in the cart, increment the quantity
            $panier->quantite += 1;
            $panier->save();
        } else {
            // If the product is not in the cart, create a new entry
            $panier = Panier::create([
                'date' => now(),
                'id_user' => $id_user,
                'id_produit' => $id,
                'quantite' => 1
            ]);
        }

        // Retrieve the updated cart items for the user
        return redirect()->route('Panier');


    }
    /**
     * Show the form for creating a new resource.
     */
    public function DeleteProduitAuPanier($id)
    {
        $panier = Panier::find($id);
        $panier->delete();


        return redirect()->route('Panier');


    }
    public function AjoutePanierAuCommande()
    {
        $id_user = Auth::id();
$paniers = Panier::where('id_user', $id_user)->get(); 

foreach ($paniers as $panier) {
    $panier->isCommanded = 1;
    $panier->save();
    
    $commande = new Commande();
    $commande->id_Pannier = $panier->id; 
    $commande->PrixTotal = 1; 
    $commande->save();
}

return redirect()->route('Panier');




    }
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
    public function show(Panier $panier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panier $panier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panier $panier)
    {
        //
    }
}

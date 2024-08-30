@extends('Utilisateur.layouts.Interphace')

@section('content')


<div class="untree_co-section product-section before-footer-section my-5">
    <div class="container">
        <div class="row justify-content-between">
            
            <div class="col-6">
                <img src="{{$produit->image}}" class="img-fluid product-thumbnail w-100 h-100">
            </div>
            <div class="col-5">
                <div class="row flex-column justify-content-between">
                    <h2>{{$produit->nom}}</h2>
                    <p class="infoProducts"> Prix : {{$produit->prix}} DH</p>
                    <p class="infoProducts mb-5">{{$produit->description}}</p>
                    <a href="{{route('AjouteProduiAuPanier',$produit->id)}}" class="btn btn-primary mt-5">Ajoute Au Pnnier</a>
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection


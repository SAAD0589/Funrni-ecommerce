@extends('Utilisateur.layouts.Interphace')

@section('content')

<!-- Start Hero Section -->
<div class="hero" style="background-image: url('{{ asset('assets/images/backgroundShop.jpg') }}')">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            @foreach ($produits as $produit)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="{{route('DetailProduits',$produit->id)}}">
                    <img src="{{$produit->image}}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{$produit->nom}}</h3>
                    <strong class="product-price">{{$produit->prix}} DH</strong>

                    <span class="icon-cross">
                        {{-- <a href="{{route('DetailProduits',$produit->id)}}" > --}}
                            <img src={{ asset('assets/images/cross.svg') }} class="img-fluid">
                        {{-- </a> --}}
                    </span>
                </a>
            </div>
            @endforeach
            <div class="pagination">
                {{ $produits->links() }}
            </div>
        </div>
    </div>
</div>

@endsection


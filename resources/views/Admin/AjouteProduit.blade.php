@extends('Admin.layouts.ParentPage')

@section('content')
    <!-- CONTENT -->
    <section id="content">
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Ajout Produit</a>
                        </li>
                    </ul>
                </div>

            </div>

            <form action="{{ route('StoreProduit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nom Produit</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom Produit" name="nom" value="{{ old('nom') }}">
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                     name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Prix</label>
                    <input type="text" class="form-control @error('prix') is-invalid @enderror" placeholder="Prix" name="prix" value="{{ old('prix') }}">
                    @error('prix')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label>Categorie</label>
                    <select class="form-control @error('idCategorie') is-invalid @enderror" name="idCategorie">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ old('idCategorie') == $categorie->id ? 'selected' : '' }}>{{ $categorie->NomCategorie }}</option>
                        @endforeach
                    </select>
                    @error('idCategorie')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Ajout Produit</button>
            </form>
            
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
@endsection

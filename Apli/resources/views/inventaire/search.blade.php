<?php $titre = 'Recherche Produit'; ?>
@extends('inventaire.default')

@section('content')
    <div class="container text-center">
        <h1>Bienvenue sur la gestion des stocks</h1>
    </div>
    <div class="container mt-2 d-flex">
        <a class="btn btn-primary" href="{{ url('/') }}">Retour</a>
    </div>
    <div class="container mt-3 text-center shadow min-vh-100 py-4" style="background-color: white; border-radius: 30px;">
        <div class="row mb-3">
            <div class="col-6">
                <a class="btn btn-success" href="{{ route('inventaire.create') }}">Ajouter un produit</a>
            </div>
            <div class="col-6">
                <div class="form-group container">
                    <form action="{{ route('inventaire.search') }}" method="get">
                        <input class="form-control border rounded-pill" type="search" name="q" value="rechercher"
                            id="example-search-input">
                    </form>
                </div>
            </div>
            
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th scope="col">Id</th> --}}
                    <th scope="col">Produits</th>
                    <th scope="col">Quantitées</th>
                    <th scope="col">Dates</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        {{-- <th scope="row">{{ $item->id }}</th> --}}
                        <td>{{ $item->produits }}</td>
                        <td>{{ $item->quantites }}</td>
                        <td>{{ $item->dates }}</td>
                        <td>
                            <form action="{{route('inventaire.destroy',$item->id)}}" method="POST">
                                @csrf
                                <a class="btn btn-info" href="{{ route('inventaire.edit', $item->id) }}">Editer</a>

                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <h1>Aucun résultats</h1>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- {{ $item->links('inventaire.pagination.bootstrap-5') }} --}}
    </div>
@endsection

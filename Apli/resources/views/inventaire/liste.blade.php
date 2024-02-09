<?php $titre = 'Liste Course'; ?>
@extends('inventaire.default')

@section('content')
    <div class="container text-center">
        <h1>Bienvenue sur la gestion des stocks</h1>
    </div>
    <div class="container mt-2 d-flex">
        <a class="btn btn-primary" href="{{ url('/') }}">Retour</a>
    </div>
    <div class="container  mt-3 text-center shadow min-vh-100 py-4" style="background-color: white; border-radius: 30px;">
        <div class="row mb-3">
            <div class="col-4">
                <a class="btn btn-success" href="{{ route('inventaire.create') }}">Ajouter un produit</a>
            </div>
            <div class="col-4">
                <div class="form-group container">
                    <form action="{{ route('inventaire.search') }}" method="get">
                        <input class="form-control border rounded-pill" type="search" name="q" value="rechercher"
                            id="example-search-input">
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group container">
                    <a class="btn btn-warning" href="{{ route('inventaire.liste') }}">Liste de course</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Produits</th>
                    <th scope="col">Quantitées</th>
                    <th scope="col">Dates</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($item as $items)
                    <tr>
                        <th scope="row">{{ $items->id }}</th>
                        <td>{{ $items->produits }}</td>
                        <td>{{ $items->quantites }}</td>
                        <td>{{ $items->dates }}</td>
                        <td>
                            <form action="{{ route('inventaire.destroy', $items->id) }}" method="POST">
                                @csrf
                                <a class="btn btn-info" href="{{ route('inventaire.edit', $items->id) }}">Editer</a>
                                <button class="btn btn-danger">Supprimer</button>

                                {{-- <a class="btn btn-danger" href="{{route('inventaire.destroy',$item->id)}}">Supprimer</a> --}}
                            </form>
                        </td>
                    </tr>
                @empty
                    <h1>Aucun produit dans la liste</h1>
                @endforelse

            </tbody>
        </table>
        {{-- {{ $item->links('inventaire.pagination.bootstrap-5') }} --}}
    </div>
@endsection

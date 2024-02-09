<?php $titre = 'Stock'; ?>
@extends('inventaire.default')

@section('content')
    <div class="container text-center">
        <h1>Bienvenue sur la gestion des stocks</h1>
    </div>
    @if ($message = Session::get('success'))
        <div class="container w-50 text-center alert alert-success" id="alert">
            <h1>{{ $message }}</h1>
        </div>
    @endif
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
                    <a id="liste" class="btn btn-warning" href="{{ route('export.inventaire') }}">Liste de course</a>
                </div>
            </div>
        </div>
        <div >
            <h2 id="info" >Il y a <span id="nombre">{{$items->count()}}</span> produit(s) qui perime(s) au mois de  <span id= 'date'></span></h2>
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
                @foreach($items as $inventaire)
                    <tr>
                        {{-- <th scope="row">{{ $inventaire->id }}</th> --}}
                        <td>{{ $inventaire->produits }}</td>
                        <td>{{ $inventaire->quantites }}</td>
                        <td>{{ $inventaire->dates }}</td>
                        <td>
                            <form action="{{ route('inventaire.destroy', $inventaire->id) }}" method="POST">
                                @csrf
                                <a class="btn btn-info" href="{{ route('inventaire.edit', $inventaire->id) }}">Editer</a>
                                <button class="btn btn-danger">Supprimer</button>

                                {{-- <a class="btn btn-danger" href="{{route('inventaire.destroy',$item->id)}}">Supprimer</a> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $items->links('inventaire.pagination.bootstrap-5') }}
    </div>
@endsection

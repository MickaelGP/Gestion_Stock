@extends('inventaire.default')


@section('content')
    <div class="container text-center">
        <h1>Ajouter un produit</h1>
    </div>
    <div class="container mt-2 d-flex">
        <a class="btn btn-primary" href="{{ url('/') }}">Retour</a>
    </div>
    <div class="container w-50 mt-5">
        <form action="{{ route('inventaire.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="produit" class="form-label">Produit</label>
                <input type="text" class="form-control @error('produit') is-invalid @enderror" id="produit"
                    name="produit" aria-describedby="Produit" value="{{old('produit')}}">
                @error('produit')
                    <div class="alert mt-2 alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantitée</label>
                <input type="text" class="form-control @error('quantite') is-invalid @enderror" id="quantite"
                    name="quantite" aria-describedby="Quantitée" value="{{old('quantite')}}">
                @error('quantite')
                    <div class="alert mt-2 alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                    aria-describedby="date" value="{{old('date')}}">
                @error('date')
                    <div class="mt-2 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        @if ($message = Session::get('error'))
            <div class="container alert alert-danger mt-2 text-center" id="alert">
                <h1>{{ $message }}</h1>
            </div>
        @endif
    </div>
@endsection

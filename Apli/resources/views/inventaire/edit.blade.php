@extends('inventaire.default')


@section('content')
    <div class="container text-center">
        <h1>Modifier un produit</h1>
    </div>
    <div class="container mt-2 d-flex">
        <a class="btn btn-primary" href="{{ url('/') }}">Retour</a>
    </div>
    <div class="container w-50 mt-5">
        <form action="{{ route('inventaire.update', $inventaire->id) }}" method="post">
            @csrf
           
            <div class="mb-3">
                <label for="produit" class="form-label">Produit</label>
                    <input type="text" class="form-control @error('produit') is-invalid @enderror"
                        id="produit" name="produit" aria-describedby="Produit" value="{{ $inventaire->produits }}">
                        @error('produit')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantitée</label>
                <input type="text" class="form-control @error('quantitées') is-invalid @enderror" id="quantite"
                    name="quantitées" aria-describedby="Quantitée" value="{{ $inventaire->quantites }}">
                @error('quantitées')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                    aria-describedby="Produit" value="{{ $inventaire->dates }}">
                @error('date')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        @if ($message = Session::get('error'))
            <div class="container w-50 text-center alert alert-success" id="alert">
                <h1>{{ $message }}</h1>
            </div>
        @endif
    </div>
@endsection

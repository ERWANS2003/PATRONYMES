@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Patronyme</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('patronymes.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>
        <div class="mb-3">
            <label>Région</label>
            <select name="region_id" class="form-control" required>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Département</label>
            <select name="departement_id" class="form-control" required>
                @foreach($departements as $departement)
                    <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('patronymes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

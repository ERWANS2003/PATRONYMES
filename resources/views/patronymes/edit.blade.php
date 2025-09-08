@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier Patronyme</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('patronymes.update', $patronyme) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $patronyme->nom) }}" required>
        </div>
        <div class="mb-3">
            <label>Région</label>
            <select name="region_id" class="form-control" required>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" @if($patronyme->region_id==$region->id) selected @endif>{{ $region->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Département</label>
            <select name="departement_id" class="form-control" required>
                @foreach($departements as $departement)
                    <option value="{{ $departement->id }}" @if($patronyme->departement_id==$departement->id) selected @endif>{{ $departement->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('patronymes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

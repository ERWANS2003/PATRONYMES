@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patronymes</h1>

    <form method="GET" action="{{ route('patronymes.index') }}" class="mb-3">
        <input type="text" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Rechercher</button>
        <a href="{{ route('patronymes.create') }}" class="btn btn-success">Ajouter</a>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Région</th>
                <th>Département</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patronymes as $patronyme)
            <tr>
                <td>{{ $patronyme->id }}</td>
                <td>{{ $patronyme->nom }}</td>
                <td>{{ $patronyme->region?->nom ?? 'Non défini' }}</td>
                <td>{{ $patronyme->departement?->nom ?? 'Non défini' }}</td>
                <td>
                    <a href="{{ route('patronymes.edit', $patronyme) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('patronymes.destroy', $patronyme) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce patronyme ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Aucun patronyme trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $patronymes->links() }}
</div>
@endsection

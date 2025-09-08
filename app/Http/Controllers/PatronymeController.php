<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patronyme;
use App\Models\Region;
use App\Models\Departement;

class PatronymeController extends Controller
{
   public function index(Request $request)
{
    $query = Patronyme::with(['region', 'departement']); // charge les relations

    if ($request->has('search') && $request->search != '') {
        $query->where('nom', 'like', '%'.$request->search.'%');
    }

    $patronymes = $query->orderBy('id', 'desc')->paginate(10); // <- paginate ici

    return view('patronymes.index', compact('patronymes'));
}


    public function create()
    {
        $regions = Region::all();
        $departements = Departement::all();
        return view('patronymes.create', compact('regions', 'departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'departement_id' => 'required|exists:departements,id',
        ]);

        Patronyme::create($request->all());

        return redirect()->route('patronymes.index')
                         ->with('success', 'Patronyme ajouté avec succès.');
    }

    public function edit(Patronyme $patronyme)
    {
        $regions = Region::all();
        $departements = Departement::all();
        return view('patronymes.edit', compact('patronyme', 'regions', 'departements'));
    }

    public function update(Request $request, Patronyme $patronyme)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'departement_id' => 'required|exists:departements,id',
        ]);

        $patronyme->update($request->all());

        return redirect()->route('patronymes.index')
                         ->with('success', 'Patronyme mis à jour avec succès.');
    }

    public function destroy(Patronyme $patronyme)
    {
        $patronyme->delete();

        return redirect()->route('patronymes.index')
                         ->with('success', 'Patronyme supprimé avec succès.');
    }
}

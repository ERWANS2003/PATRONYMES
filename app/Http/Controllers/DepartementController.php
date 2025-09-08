<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Region;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index() {
        $departements = Departement::with('region')->paginate(10);
        return view('departements.index', compact('departements'));
    }

    public function create()
    {
        $regions = Region::all();
        return view('departements.create', compact('regions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]);
        Departement::create($request->all());
        return redirect()->route('departements.index')->with('success', 'Département ajouté !');
    }

    public function edit(Departement $departement)
    {
        $regions = Region::all();
        return view('departements.edit', compact('departement', 'regions'));
    }

    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            'nom' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]);
        $departement->update($request->all());
        return redirect()->route('departements.index')->with('success', 'Département mis à jour !');
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')->with('success', 'Département supprimé !');
    }
}

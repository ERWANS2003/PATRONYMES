<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index() { return view('regions.index', ['regions' => Region::paginate(10)]); }
    public function create() { return view('regions.create'); }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|unique:regions']);
        Region::create($request->all());
        return redirect()->route('regions.index')->with('success', 'Région ajoutée !');
    }

    public function edit(Region $region) { return view('regions.edit', compact('region')); }

    public function update(Request $request, Region $region)
    {
        $request->validate(['nom' => 'required|unique:regions,nom,'.$region->id]);
        $region->update($request->all());
        return redirect()->route('regions.index')->with('success', 'Région mise à jour !');
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')->with('success', 'Région supprimée !');
    }
}

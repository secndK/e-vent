<?php
namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    public function index()
    {
        $equipements = Equipement::all();
        return view('equipements.index', compact('equipements'));
    }

    public function create()
    {
        return view('equipements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Equipement::create($validated);

        return redirect()->route('equipements.index')->with('success', 'Équipement ajouté avec succès.');
    }

    public function edit(Equipement $equipement)
    {
        return view('equipements.edit', compact('equipement'));
    }

    public function update(Request $request, Equipement $equipement)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $equipement->update($validated);

        return redirect()->route('equipements.index')->with('success', 'Équipement mis à jour.');
    }

    public function destroy(Equipement $equipement)
    {
        $equipement->delete();

        return redirect()->route('equipements.index')->with('success', 'Équipement supprimé.');
    }
}
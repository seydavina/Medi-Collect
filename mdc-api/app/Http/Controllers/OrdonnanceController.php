<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdonnanceController extends Controller
{
    public function index()
    {
        $ordonnances = Ordonnance::all();
        return response()->json($ordonnances);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string',
            'datePrescription' => 'required|date',
        ]);

        $ordonnance = Ordonnance::create($request->all());

        return response()->json(['message' => 'Ordonnance créée avec succès', 'data' => $ordonnance], 201);
    }

    public function show($id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        return response()->json($ordonnance);
    }

    public function update(Request $request, $id)
    {
        $ordonnance = Ordonnance::findOrFail($id);

        $request->validate([
            'numero' => 'required|string',
            'datePrescription' => 'required|date',
        ]);

        $ordonnance->update($request->all());

        return response()->json(['message' => 'Ordonnance mise à jour avec succès', 'data' => $ordonnance]);
    }

    public function destroy($id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        $ordonnance->delete();

        return response()->json(['message' => 'Ordonnance supprimée avec succès']);
    }
}


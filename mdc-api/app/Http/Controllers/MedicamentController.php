<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicamentController extends Controller
{
    public function index()
    {
        $medicaments = Medicament::all();
        return response()->json($medicaments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ref' => 'required|string',
            'nom' => 'required|string',
            'type' => 'required|string',
            'posologie' => 'required|string',
        ]);

        $medicament = Medicament::create($request->all());

        return response()->json(['message' => 'Médicament créé avec succès', 'data' => $medicament], 201);
    }

    public function show($id)
    {
        $medicament = Medicament::findOrFail($id);
        return response()->json($medicament);
    }

    public function update(Request $request, $id)
    {
        $medicament = Medicament::findOrFail($id);

        $request->validate([
            'ref' => 'required|string',
            'nom' => 'required|string',
            'type' => 'required|string',
            'posologie' => 'required|string',
        ]);

        $medicament->update($request->all());

        return response()->json(['message' => 'Médicament mis à jour avec succès', 'data' => $medicament]);
    }

    public function destroy($id)
    {
        $medicament = Medicament::findOrFail($id);
        $medicament->delete();

        return response()->json(['message' => 'Médicament supprimé avec succès']);
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    // Afficher tous les patients
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    // Afficher un patient spécifique
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json($patient);
    }

    // Créer un nouveau patient
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:patients',
            'infoSocio' => 'required',
            'antecedent' => 'required',
            'signesCliniques' => 'required',
            'signesPara' => 'required',
            'traitement' => 'required',
            'evolutionApresSortie' => 'required',
        ]);

        $patient = Patient::create($request->all());
        return response()->json(['message' => 'Patient créé avec succès', 'data' => $patient], 201);
    }

    // Mettre à jour un patient existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'infoSocio' => 'required',
            'antecedent' => 'required',
            'signesCliniques' => 'required',
            'signesPara' => 'required',
            'traitement' => 'required',
            'evolutionApresSortie' => 'required',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return response()->json(['message' => 'Patient mis à jour avec succès', 'data' => $patient]);
    }

    // Supprimer un patient
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return response()->json(['message' => 'Patient supprimé avec succès']);
    }

    // Rechercher un patient par numéro ou autres critères
    public function search(Request $request)
    {
        $request->validate([
            'search_term' => 'required',
        ]);

        $patients = Patient::where('numero', 'like', '%' . $request->search_term . '%')
            ->get();

        return response()->json($patients);
    }
}

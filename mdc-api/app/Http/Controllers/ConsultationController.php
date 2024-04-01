<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::all();
        return response()->json($consultations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numPatient' => 'required|string',
            'matMedecin' => 'required|string',
        ]);

        $consultation = Consultation::create($request->all());

        return response()->json(['message' => 'Consultation créée avec succès', 'data' => $consultation], 201);
    }

    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        return response()->json($consultation);
    }

    public function update(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);

        $request->validate([
            'numPatient' => 'required|string',
            'matMedecin' => 'required|string',
        ]);

        $consultation->update($request->all());

        return response()->json(['message' => 'Consultation mise à jour avec succès', 'data' => $consultation]);
    }

    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        return response()->json(['message' => 'Consultation supprimée avec succès']);
    }
}


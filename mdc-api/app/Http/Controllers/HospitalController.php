<?php

namespace App\Http\Controllers;

use App\Models\Hopital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    // Ajouter un hôpital
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'service' => 'required',
        ]);

        $hospital = Hopital::create($request->all());

        return response()->json(['message' => 'Hôpital ajouté avec succès', 'data' => $hospital], 201);
    }

    // Mettre à jour un hôpital
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'service' => 'required',
        ]);

        $hospital = Hopital::findOrFail($id);
        $hospital->update($request->all());

        return response()->json(['message' => 'Hôpital mis à jour avec succès', 'data' => $hospital]);
    }

    // Supprimer un hôpital
    public function destroy($id)
    {
        $hospital = Hopital::findOrFail($id);
        $hospital->delete();

        return response()->json(['message' => 'Hôpital supprimé avec succès']);
    }
}


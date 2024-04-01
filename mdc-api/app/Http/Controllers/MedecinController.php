<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedecinController extends Controller
{
    // Définir la disponibilité du médecin
    public function setAvailability(Request $request)
    {
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
            'day' => 'required|in:lundi,mardi,mercredi,jeudi,vendredi,samedi,dimanche',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $medecin = Medecin::findOrFail($request->medecin_id);
        $medecin->availability()->updateOrCreate(
            ['day' => $request->day],
            ['start_time' => $request->start_time, 'end_time' => $request->end_time]
        );

        return response()->json(['message' => 'Disponibilité du médecin mise à jour avec succès']);
    }

    // Prescrire une ordonnance
    public function prescribe(Request $request)
    {
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
            'patient_id' => 'required|exists:patients,id',
            'medicament_id' => 'required|exists:medicaments,id',
            'description' => 'required',
        ]);

        // Logique pour prescrire une ordonnance

        return response()->json(['message' => 'Ordonnance prescrite avec succès']);
    }

    // Ajouter un assistant au médecin
    public function addAssistant(Request $request)
    {
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
            'infirmier_id' => 'required|exists:infirmiers,id',
        ]);

        $medecin = Medecin::findOrFail($request->medecin_id);
        $medecin->assistants()->attach($request->infirmier_id);

        return response()->json(['message' => 'Infirmier ajouté avec succès au médecin']);
    }
}


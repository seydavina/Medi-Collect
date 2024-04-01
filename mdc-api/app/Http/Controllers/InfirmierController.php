<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfirmierController extends Controller
{
    // Planifier un rendez-vous
    public function scheduleAppointment(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $consultation = new Consultation();
        $consultation->patient_id = $request->patient_id;
        $consultation->medecin_id = $request->medecin_id;
        $consultation->scheduled_at = Carbon::parse($request->date . ' ' . $request->time);
        $consultation->save();

        return response()->json(['message' => 'Rendez-vous planifié avec succès', 'data' => $consultation], 201);
    }

    // Annuler un rendez-vous
    public function cancelAppointment($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        return response()->json(['message' => 'Rendez-vous annulé avec succès']);
    }

    // Afficher le calendrier des rendez-vous
    public function showCalendar()
    {
        $today = Carbon::today();
        $consultations = Consultation::whereDate('scheduled_at', '>=', $today)
                                    ->orderBy('scheduled_at')
                                    ->get();

        return response()->json($consultations);
    }
}


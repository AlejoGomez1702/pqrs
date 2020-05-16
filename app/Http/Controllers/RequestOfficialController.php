<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Pqrs;
use App\Answer;

class RequestOfficialController extends Controller
{
    /**
     * Muestra el formulario para dar respuesta a una PQRS.
     */
    public function giveAnswer(Request $request)
    {
        $pqr = Pqrs::findOrFail($request->pqr);

        return view('admin.pqrs.giveAnswer', ['pqr' => $pqr]);
    }

    /**
     * Registra una respuesta dada a una PQRS
     * por parte de un funcionario.
     */
    public function reply(Request $request)
    {
        $request->validate([
            'pqr_id' => 'required',
            'description' => 'required'        
        ]);

        $answer = new Answer();
        $answer->description = $request->description;
        $answer->request_id = $request->pqr_id;
        $answer->save();

        //Cambiando el estado de la pqrs a antes de aprobar.
        $pqr = Pqrs::findOrFail($request->pqr_id);
        $pqr->state = 'wait';
        $pqr->save();

        //Si la respuesta del funcionario lleva adjunto archivos.
        if($request->file('files') != null)
        {
            $answer->addMedia($request->file('files'))->toMediaCollection();
        }

        return redirect()->route('requests.index');
    }

    /**
     * Permite aprobar o rechazar una pqrs.
     */
    public function validatePqrs(Request $request)
    {
        $pqr = Pqrs::findOrFail($request->pqr);

        if($request->yes)
        {
            $pqr->state = 'completed';
        }
        else
        {
            $pqr->state = 'rejected';
        }

        $pqr->save();

        return redirect()->route('requests.index');        
    }

}

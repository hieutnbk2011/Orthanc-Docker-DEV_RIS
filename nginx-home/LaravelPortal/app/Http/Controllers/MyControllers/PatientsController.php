<?php

namespace App\Http\Controllers\MyControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patients\Patients;
use Illuminate\Support\Facades\Log;

class PatientsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    protected function patient_list(Request $request) {

        return view('patients/patients', ["patients" => Patients::paginate(2)]);
    }

    protected function patient_search (Request $request) {


        return view('patients/search', ["patients" => Patients::paginate(2)]);
    }

    protected function patient_history (Request $request) {

        $patient = Patients::where("mrn", $request->input('id'))->first();
        return view('patients.history', ["patient" => $patient]);
    }


}

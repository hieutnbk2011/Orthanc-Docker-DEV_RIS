<?php

namespace App\Http\Controllers\MyControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patients\Patients;

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

        return view('patients/patients', ["patients" => Patients::all()]);
    }

}

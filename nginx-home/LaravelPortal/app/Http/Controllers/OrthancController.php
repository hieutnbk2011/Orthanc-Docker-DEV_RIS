<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Actions\Orthanc;
use \DB;
use \Debugbar;
use App\Actions\Orthanc\UtilityFunctions;
use Illuminate\Support\Facades\Auth;
use ReallySimpleJWT\Token;
use App\MyModels\DatabaseFactory;

class PagesController extends Controller
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

    public function readersindex $request)

    {
        $user = Auth::user();
        Debugbar::error($user);
        Debugbar::error($user->patientid);
        return view('readers');
    }
}

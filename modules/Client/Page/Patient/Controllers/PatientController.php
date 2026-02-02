<?php

namespace Modules\Client\Page\Patient\Controllers;

use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function index()
    {
        return view('client.Patients.index');
    }
}
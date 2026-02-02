<?php

namespace Modules\Client\Page\Role\Controllers;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        return view('client.Role.index');
    }
}
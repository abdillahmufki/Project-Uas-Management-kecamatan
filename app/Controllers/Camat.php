<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Camat extends BaseController
{
    public function index()
    {
        return view('admin/camat/index');
    }
}

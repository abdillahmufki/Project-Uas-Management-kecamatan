<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['kecamatan'] = 'arjasari';
        return view('welcome_message');
    }
}

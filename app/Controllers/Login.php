<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('template/login');
    }
    public function process()
    {
        $users = new UserModel();
        $username = $this->request->getVar('login');
        $password = $this->request->getVar('password');

        $dataUser = $users->where([
            'username' => $username,
        ])->first();

        if ($dataUser) {
            var_dump($dataUser->password_hash);
            if (password_verify($password, $dataUser->password_hash)) {
                session()->set([
                    'username' => $dataUser->username,
                    'name' => $dataUser->name,
                ]);
                //return redirect()->to(base_url('/'));
            } else {
                //session()->setFlashdata('error', 'Username & Password Salah');
                //return redirect()->back();
            }
        } else {
            //session()->setFlashdata('error', 'Username & Password Salah');
            //return redirect()->back();
        }
    }
}

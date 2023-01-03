<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AparatModel;

class Dashboard extends BaseController
{
    public function index()
    {
      $db = \Config\Database::connect();
      $countAparat = $db->table("aparats")->countAllResults();
      $data = [
        'countAparat' => $countAparat
      ];

      return view('admin/dashboard/index',$data);
    }
}

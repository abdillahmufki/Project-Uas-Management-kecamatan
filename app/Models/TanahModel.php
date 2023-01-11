<?php

namespace App\Models;

use CodeIgniter\Model;

class TanahModel extends Model
{
  protected $table            = 'tanah';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $useTimestamps    = true;
  protected $allowedFields    = ['id','nama_pemilik','luas_tanah','status_tanah','status_sertifikat','penggunaan_tanah','keterangan','kecamatan','kelurahan','tahun'];
}

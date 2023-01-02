<?php

namespace App\Models;

use CodeIgniter\Model;

class AparatModel extends Model
{
    protected $table            = 'aparats';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_lengkap','NIAP','NIP','jenis_kelamin','tempat_lahir','tanggal_lahir','agama','pangkat_golongan','jabatan',

                                    'pendidikan_terakhir','tanggal_pengangkatan','nomor_pengangkatan','tanggal_pemberhentian','nomor_pemberhentian','keterangan',
                                    'kecamatan_id','kelurahan_id','tahun'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class KeputusanCamatModel extends Model
{
    protected $table      = 'KeputusanCamat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'tanggal_keputusan', 'nomor', 'tentang', 'uraian_singkat',
        'tanggal_laporan', 'nomor_laporan', 'keterangan', 'kecamatan_id',
        'kelurahan_id', 'keterangan', 'tahun', 'createdAt', 'updatedAt'
    ];
    protected $useTimesTamps = true;
    protected $dateFormat = 'datetime';
}

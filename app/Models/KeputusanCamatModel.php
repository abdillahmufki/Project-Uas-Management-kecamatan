<?php

namespace App\Models;

use CodeIgniter\Model;
//Model
class KeputusanCamatModel extends Model
{
    protected $table      = 'KeputusanCamat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'tanggal_keputusan', 'nomor', 'tentang', 'uraian_singkat',
        'tanggal_laporan', 'nomor_laporan', 'keterangan', 'kecamatan',
        'kelurahan', 'keterangan', 'tahun', 'createdAt', 'updatedAt'
    ];
    protected $useTimesTamps = true;
    protected $dateFormat = 'datetime';
}

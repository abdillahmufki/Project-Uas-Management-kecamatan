<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table            = 'inventariss';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id', 'jenis_barang_bangunan', 'jml_brg_dibelisendiri', 'jml_brg_bantuanpemerintah', 'jml_brg_sumbangan', 'keadaan_baik_awal', 'keadaan_rusak_awal', 'hapus_rusak', 'hapus_dijual', 'hapus_disumbangkan', 'tanggal_penghapusan', 'keadaan_baik_akhir', 'keadaan_rusak_akhir', 'keterangan', 'tahun', 'kecamatan', 'kelurahan'];
}

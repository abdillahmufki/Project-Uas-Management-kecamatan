<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

//1.tanggal_keputusan 	=> date
// 2.nomor 					  	=> smallInt
// 3.tentang 					=> varchar
// 4.uraian_singkat		=> text
// 5.tanggal_laporan	  	=> date
// 6.nomor_laporan			=> smallInt
// 7.keterangan				=> text
// 8.kecamatan_id			=> Integer
// 9.kelurahan_id			=> Integer
// 10.tahun 						=> Year 

class KeputusanCamat extends Seeder
{
    public function run()
    {
        // membuat data
        $data_keputusanCamat = [
            [
                'tanggal_keputusan' => date('d F Y, h:i:s A'),
                'nomor'  => 1,
                'tentang' => 'Penyuluhan anti Narkoba',
                'uraian_singkat' => 'Kunjungan ke warga malang',
                'tanggal_laporan' => date('d F Y, h:i:s A'),
                'nomor_laporan' => 1,
                'keterangan' => 'Keluhan warga',
                'kecamatan_id' => 1,
                'kelurahan_id' => 1,
                'tahun' => date('Y')

            ]
        ];

        foreach ($data_keputusanCamat as $data) {
            // insert semua data ke tabel
            $this->db->table('KeputusanCamat')->insert($data);
        }
    }
}

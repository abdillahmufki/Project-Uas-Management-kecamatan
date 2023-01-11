<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aparat extends Migration
{
    public function up()
    {
      // Membuat kolom/field untuk tabel aparat
      $this->forge->addField([
        'id'          => [
          'type'           => 'INT',
          'constraint'     => 11,
          'unsigned'       => true,
          'auto_increment' => true
        ],
        'nama_lengkap'       => [
          'type'           => 'VARCHAR',
          'constraint'     => 60,
          'null'           => false
        ],
        'NIAP'      => [
          'type'           => 'VARCHAR',
          'constraint'     => 18,
          'null'           => false
        ],
        'NIP'      => [
          'type'           => 'VARCHAR',
          'constraint'     => 18,
          'null'           => false
        ],
        'jenis_kelamin' => [
          'type'         => "ENUM",
          'constraint'   =>  array('Laki - laki','Perempuan'),
          'null'         => false
        ],
        'tempat_lahir'      => [
          'type'           => 'VARCHAR',
          'constraint'     => 40,
          'null'           => false
        ],
        'tanggal_lahir'    => [
          'type'           => 'DATE',
          'null'           => false
        ],
        'agama' => [
          'type'         => 'ENUM',
          'constraint'   => "'Islam','Kristen','Hindu','Buddha','Katolik','Kong Hu Chu'",
          'null'           => false
        ],
        'pangkat_golongan' => [
          'type'           => 'VARCHAR',
          'constraint'     => 100,
          'null'           => true
        ],
        'jabatan' => [
          'type'           => 'VARCHAR',
          'constraint'     => 80,
          'null'           => true
        ],
        'pendidikan_terakhir' => [
          'type'         => 'ENUM',
          'constraint'   => "'SD','SMP','SMA/SMK','D3','S1','S2','S3'",
          'null'           => true
        ],
        'tanggal_pengangkatan'    => [
          'type'           => 'DATE',
          'null'           => true
        ],
        'nomor_pengangkatan'    => [
          'type'           => 'VARCHAR',
          'constraint'     => 60,
          'null'           => true
        ],
        'tanggal_pemberhentian'    => [
          'type'           => 'DATE',
          'null'           => true
        ],
        'nomor_pemberhentian'    => [
          'type'           => 'VARCHAR',
          'constraint'     => 60,
          'null'           => true
        ],
        'keterangan'    => [
          'type'           => 'TEXT',
          'null'           => true
        ],
        'kecamatan'    => [
          'type'           => 'TEXT',
          'constraint'     => 255,
          'null'      => false
        ],
        'kelurahan'    => [
          'type'           => 'TEXT',
          'constraint'     => 255,
          'null'      => false
        ],
        'tahun'    => [
          'type'           => 'YEAR',
          'null'           => false
        ],
        'created_at'    => [
          'type'           => 'DATETIME',
          'null'      => true
        ],
        'updated_at'    => [
          'type'           => 'DATETIME',
          'null'      => true
        ],
      ]);

      $this->forge->addKey('id', TRUE);
      $this->forge->createTable('aparats');
    }

    public function down()
    {
      // menghapus tabel aparat
		  $this->forge->dropTable('aparats');
    }
}

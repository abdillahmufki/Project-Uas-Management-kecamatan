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
          'constraint'     => '60',
          'null'           => false
        ],
        'NIAP'      => [
          'type'           => 'VARCHAR',
          'constraint'     => 18
        ],
        'NIP'      => [
          'type'           => 'VARCHAR',
          'constraint'     => 18
        ],
        'jenis_kelamin' => [
          'type'         => "ENUM",
          'constraint'   =>  array('Laki - laki','Perempuan'),
          'null'         => false
        ],
        'tempat_lahir'      => [
          'type'           => 'VARCHAR',
          'constraint'     => 40
        ],
        'tanggal_lahir'    => [
          'type'           => 'DATE'
        ],
        'agama' => [
          'type'         => 'ENUM',
          'constraint'   => "'Islam','Kristen','Hindu','Buddha','Katolik','Kong Hu Chu'"
        ],
        'pangkat_golongan' => [
          'type'           => 'VARCHAR',
          'constraint'     => 255
        ],
        'jabatan' => [
          'type'           => 'VARCHAR',
          'constraint'     => 40
        ],
        'pendidikan_terakhir' => [
          'type'         => 'ENUM',
          'constraint'   => "'SD','SMP','SMA/SMK','D3','S1','S2','S3'"
        ],
        'tanggal_pengangkatan'    => [
          'type'           => 'DATE'
        ],
        'nomor_pengangkatan'    => [
          'type'           => 'VARCHAR',
          'constraint'     => 60
        ],
        'tanggal_pemberhentian'    => [
          'type'           => 'DATE'
        ],
        'nomor_pemberhentian'    => [
          'type'           => 'VARCHAR',
          'constraint'     => 60
        ],
        'keterangan'    => [
          'type'           => 'TEXT'
        ],
        'kecamatan_id'    => [
          'type'           => 'INT',
          'constraint'     => 255,
          'null'      => false
        ],
        'kelurahan_id'    => [
          'type'           => 'INT',
          'constraint'     => 255,
          'null'      => false
        ],
        'tahun'    => [
          'type'           => 'YEAR'
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

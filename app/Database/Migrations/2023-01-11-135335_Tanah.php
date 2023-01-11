<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tanah extends Migration
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
        'nama_pemilik'       => [
          'type'           => 'VARCHAR',
          'constraint'     => 60,
          'null'           => false
        ],
        'luas_tanah'      => [
          'type'           => 'INT',
          'constraint'     => 18,
          'null'           => false
        ],
        'status_tanah'      => [
          'type'           => 'ENUM',
          'constraint'     => array('HM','HGB','HP','HGU','HPL','MA','VP','TN'),
          'null'           => false
        ],
        'status_sertifikat' => [
          'type'         => "ENUM",
          'constraint'   =>  array('Sudah','Belum'),
          'null'         => false
        ],
        'penggunaan_tanah'      => [
          'type'           => 'VARCHAR',
          'constraint'     => 40,
          'null'           => false
        ],
        'keterangan'    => [
          'type'           => 'TEXT',
          'null'           => false
        ],
        'kecamatan' => [
          'type'         => 'VARCHAR',
          'constraint'   => 60,
          'null'           => false
        ],
        'kelurahan' => [
          'type'           => 'VARCHAR',
          'constraint'     => 60,
          'null'           => false
        ],
        'tahun' => [
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
      $this->forge->createTable('tanah');
    }

    public function down()
    {
      $this->forge->dropTable('tanah');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventaris extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel inventaris
        $this->forge->addField([
          'id'          => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true
          ],
          'jenis_barang_bangunan'  => [
            'type'           => 'VARCHAR',
            'constraint'     => 255,
            'null'           => false
          ],
          'jml_brg_dibelisendiri'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'jml_brg_bantuanpemerintah'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'jml_brg_sumbangan'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'keadaan_baik_awal'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'keadaan_rusak_awal'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'hapus_rusak'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'hapus_dijual'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'hapus_disumbangkan'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'tanggal_penghapusan'    => [
            'type'           => 'DATE',
            'null'           => true
          ],
          'keadaan_baik_akhir'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'keadaan_rusak_akhir'      => [
            'type'           => 'INT',
            'constraint'     => 20,
            'null'           => true
          ],
          'keterangan'    => [
            'type'           => 'TEXT',
            'null'           => true
          ],
          'kecamatan'    => [
            'type'           => 'VARCHAR',
            'constraint'     => 255,
            'null'      => false
          ],
          'kelurahan'    => [
            'type'           => 'VARCHAR',
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
        $this->forge->createTable('inventariss');
      }
  
      public function down()
      {
        // hapus tabel inventaris
            $this->forge->dropTable('inventariss');
      }
}

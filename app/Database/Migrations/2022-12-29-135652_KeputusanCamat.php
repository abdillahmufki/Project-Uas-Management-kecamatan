<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class KeputusanCamat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'tanggal_keputusan' => [
                'type' => 'date',
                'null'  => false
            ],
            'nomor' => [
                'type' => 'smallInt',
                'null'  => false
            ],
            'tentang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null'  => false
            ],
            'uraian_singkat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tanggal_laporan' => [
                'type' => 'date',
                'null'  => false
            ],
            'nomor_laporan' => [
                'type' => 'smallInt',
                'null'  => false
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'kecamatan_id' => [
                'type' => 'INT',
                'null'  => false
            ],
            'kelurahan_id' => [
                'type' => 'INT',
                'null'  => false
            ],
            'tahun' => [
                'type' => 'year',
                'null'  => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        // Membuat primary key
        $this->forge->addKey('id', true);

        // Membuat tabel news
        $this->forge->createTable('KeputusanCamat', true);
    }

    public function down()
    {
        // menghapus tabel news
        $this->forge->dropTable('KeputusanCamat');
    }
}

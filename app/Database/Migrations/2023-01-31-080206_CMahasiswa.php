<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CMahasiswa extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel akademis
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'nim'      => [
                'type'           => 'INT',
                'constraint'     => 255,
            ],
            'umur'      => [
                'type'           => 'INT',
                'constraint'     => 255,
            ]
        ]);
 
        // Membuat primary key
        $this->forge->addKey('id', TRUE);
    }

    public function down()
    {
        // menghapus tabel karyawan
        $this->forge->dropTable('akademis');
    }
}

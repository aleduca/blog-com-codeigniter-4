<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Reply extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => true,
        'auto_increment' => true,
      ],
      'user_id' => [
        'type' => 'INT',
        'unsigned' => true,
        'null' => false,
      ],
      'comment_id' => [
        'type' => 'INT',
        'unsigned' => true,
        'null' => false,
      ],
      'comment' => [
        'type' => 'TEXT',
        'null' => false,
      ],
      'created_at' => [
        'type' => 'TIMESTAMP',
        'default' => new RawSql('CURRENT_TIMESTAMP'),
      ],
      'updated_at' => [
        'type' => 'TIMESTAMP',
        'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
      ],
    ]);

    $this->forge->addPrimaryKey('id');
    $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
    $this->forge->addForeignKey('comment_id', 'comments', 'id', '', 'CASCADE');
    $this->forge->createTable('replies');
  }

  public function down()
  {
    $this->forge->dropTable('replies');
  }
}

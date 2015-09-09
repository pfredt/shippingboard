<?php

  use yii\db\Schema;
  use yii\db\Migration;

  class m150829_120417_new_column extends Migration {
    public function up() {
      $this->addColumn( 'swim_spas_to_trailer_loads', 'serial_number', 'TEXT' );
      $this->addColumn( 'hot_tubs_to_trailer_loads', 'serial_number', 'TEXT' );
    }

    public function down() {
      echo "m150829_120417_new_column cannot be reverted.\n";

      return FALSE;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
  }

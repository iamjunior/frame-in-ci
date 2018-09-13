<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_table2 extends CI_Migration {
public function __construct(){
    $this->load->dbforge();
}
	public function up()
        {
                $this->dbforge->add_field(array(
                        'id_hakakses' => array(
                                'type'          => 'INT',
                                'constraint'    => 11,
                                'unsigned'      => TRUE,
                                'auto_increment'=> TRUE
                        ),
                        'id_user' => array(
                                'type'          => 'INT',
                                'constraint'    => 11,
                        ),
                        'aks_user' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '10',
                                'null'          => TRUE,
                                'default'       => '1,,,,',
                        ),
                        'aks_home' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '10',
                                'null'          => TRUE,
                                'default'       => '1,1,1,1,1',
                        ),
                        'aks_log' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '10',
                                'null'          => TRUE,
                                'default'       => ',,,,',
                        ),
                        'creator_akses' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '6',
                                'null'          => TRUE,
                        ),
                        'editor_akses' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '6',
                                'null'          => TRUE,
                        ),
                        'tgl_edit_akses' => array(
                                'type'          => 'DATETIME',
                                'null'          => TRUE,
                        ),
                        'his_akses' => array(
                                'type'          => 'TEXT',
                        ),
                ));
                $this->dbforge->add_field("`tgl_create_akses` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
                $this->dbforge->add_key('id_hakakses', TRUE);
                $this->dbforge->create_table('tb_hakakses');
        }

    public function down()
        {
                $this->dbforge->drop_table('tb_hakakses');
        }
}

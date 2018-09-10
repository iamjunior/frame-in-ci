<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_table extends CI_Migration {
public function __construct(){
    $this->load->dbforge();
}
	public function up()
        {
                $this->dbforge->add_field(array(
                        'id_user' => array(
                                'type'          => 'INT',
                                'constraint'    => 11,
                                'unsigned'      => TRUE,
                                'auto_increment'=> TRUE
                        ),
                        'kd_user' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '7',
                                'null'          => TRUE,
                        ),
                        'nama_lengkap' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '35',
                                'null'          => TRUE,
                        ),
                        'username' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '15',
                                'null'          => TRUE,
                        ),
                        'password_user' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '36',
                                'null'          => TRUE,
                        ),
                        'foto' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '36',
                                'null'          => TRUE,
                        ),
                        'status_user' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '2',
                                'null'          => TRUE,
                        ),
                        'kd_atasan' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '7',
                                'null'          => TRUE,
                        ),
                        'kd_departemen' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '4',
                                'null'          => TRUE,
                        ),
                        'kd_cabang' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '4',
                                'null'          => TRUE,
                        ),
                        'level_user' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '4',
                                'null'          => TRUE,
                        ),
                        'creator_user' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '6',
                                'null'          => TRUE,
                        ),
                        'editor_user' => array(
                                'type'          => 'VARCHAR',
                                'constraint'    => '6',
                                'null'          => TRUE,
                        ),
                        'tgl_edit_user' => array(
                                'type'          => 'DATETIME',
                                'null'          => TRUE,
                        ),
                        'lastlogin_akses' => array(
                                'type'          => 'DATETIME',
                                'null'          => TRUE,
                        ),
                        'his_user' => array(
                                'type'          => 'TEXT',
                        ),
                ));
                $this->dbforge->add_field("`tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
                $this->dbforge->add_key('id_user', TRUE);
                $this->dbforge->create_table('tb_user');
        }

    public function down()
        {
                $this->dbforge->drop_table('tb_user');
        }
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


 class Migration_Departments_table extends Migration
 {
 	/******************************************************************
 	 * Table Name
 	 */
 	/**
 	 * @var string The name of the Departments table
	 */
 	private $departments_table = 'departments';

 	/*******************************************************************
 	 * Table Fields Definition
 	 */
 	/**
 	 * @var array Fields for the Departments Table
 	 */
 	private $department_fields = array(
 		'id' => array(
 			'type' 				=> 'INT',
 			'constraint'		=> 11,
 			'unsigned'			=> TRUE,
 			'auto_increment'	=> TRUE
 		),
 		'department_title' => array(
 			'type'			=> 'VARCHAR',
 			'constraint'	=> 200
 		),
		'created_on' => array(
			'type' 			=> 'DATETIME'
		),
		'created_by' => array(
			'type' 			=> 'INT',
			'constraint' 	=> 11,
			'unsigned' 		=> TRUE
		),
		'modified_on' => array(
			'type' 			=> 'DATETIME',
			'null' 			=> TRUE
		),
		'modified_by' => array(
			'type'			=> 'INT',
			'constraint' 	=> 11,
			'unsigned'		=> TRUE,
			'null' 			=> TRUE
		),
		'deleted'	=> array(
			'type'			=> 'TINYINT',
			'constraint'	=> 1,
			'default'		=> 0
		),
		'deleted_by' => array(
			'type'			=> 'INT',
			'constraint' 	=> 11,
			'unsigned'		=> TRUE,
			'null' 			=> TRUE
		)
 	);

 	/****************************************************
 	 * Migration Methods
 	 */
 	/*
 	 * Install the migration
 	 */
 	public function up()
 	{
 		// fees
 		if ( ! $this->db->table_exists($this->departments_table) )
 		{
 			$this->dbforge->add_field($this->department_fields);
 			$this->dbforge->add_key('id', TRUE);

 			$this->dbforge->create_table($this->departments_table);
 		}  
 	}

 	// Uninstall this migration
 	public function down()
 	{
 		$this->dbforge->drop_table($this->departments_table);
 	}

 }
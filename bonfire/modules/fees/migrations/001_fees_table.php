<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


 class Migration_Fees_table extends Migration
 {
 	/******************************************************************
 	 * Table Name
 	 */
 	/**
 	 * @var string The name of the Fees table
	 */
 	private $fees_table = 'fees';

 	/*******************************************************************
 	 * Table Fields Definition
 	 */
 	/**
 	 * @var array Fields for the Fees Table
 	 */
 	private $fee_fields = array(
 		'id' => array(
 			'type' 				=> 'INT',
 			'constraint'		=> 11,
 			'unsigned'			=> TRUE,
 			'auto_increment'	=> TRUE
 		),
 		'programmes' => array(
 			'type'			=> 'VARCHAR',
 			'constraint'	=> 200
 		),
 		'admission' => array(
 			'type'			=> 'VARCHAR',
 			'constraint'	=> 200
 		),
 		'duration' => array(
 			'type'			=> 'VARCHAR',
 			'constraint'	=> 200
 		),
 		'fees' => array(
 			'type'			=> 'VARCHAR',
 			'constraint'	=> 200
 		),
 		'department_id' => array(
			'type' 			=> 'INT',
			'constraint' 	=> 11,
			'unsigned' 		=> TRUE
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
 		if ( ! $this->db->table_exists($this->fees_table) )
 		{
 			$this->dbforge->add_field($this->fee_fields);
 			$this->dbforge->add_key('id', TRUE);
 			$this->dbforge->add_key('department_id');

 			$this->dbforge->create_table($this->fees_table);
 		}  
 	}

 	// Uninstall this migration
 	public function down()
 	{
 		$this->dbforge->drop_table($this->fees_table);
 	}

 }
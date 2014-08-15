<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fee_model extends BF_Model
{

	/**
	 * Name of the table
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $table_name	= 'fees';

	/**
	 * Name of the primary key
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $key			= 'id';

	/**
	 * Use soft deletes or not
	 *
	 * @access protected
	 *
	 * @var bool
	 */
	protected $soft_deletes	= TRUE;

	/**
	 * The date format to use
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $date_format = 'datetime';

	/**
	 * Set the created time automatically on a new record
	 *
	 * @access protected
	 *
	 * @var bool
	 */
	protected $set_created = TRUE;

	/**
	 * Set the modified time automatically on editing a record
	 *
	 * @access protected
	 *
	 * @var bool
	 */
	protected $set_modified = TRUE;
	protected $log_user		= TRUE;

	//--------------------------------------------------------------------

	protected $validation_rules = array(
        array(
            'field' => 'programmes',
            'label' => 'Programmes',
            'rules' => 'strip_tags|xss_clean|required',
        ),
        array(
            'field' => 'admission',
            'label' => 'Admission',
            'rules' => 'strip_tags|xss_clean|required',
        ),
        array(
            'field' => 'duration',
            'label' => 'Duration',
            'rules' => 'strip_tags|xss_clean|required',
        ),
        array(
            'field' => 'fees',
            'label' => 'Fees',
            'rules' => 'strip_tags|xss_clean|required',
        ),
        array(
            'field' => 'department',
            'label' => 'Department',
            'rules' => 'strip_tags|xss_clean|required',
        )
    );

}//end Fee_model
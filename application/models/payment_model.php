<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends BF_Model
{

	/**
	 * Name of the table
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $table_name	= 'payments';

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
            'field' => 'payment_mode',
            'label' => 'Payment Mode',
            'rules' => 'strip_tags|xss_clean|required',
        ),
        array(
            'field' => 'amount',
            'label' => 'Amount',
            'rules' => 'strip_tags|xss_clean|required|integer',
        ),
        array(
            'field' => 'code',
            'label' => 'Code',
            'rules' => 'strip_tags|xss_clean|required|min_length[4]|max_length[10]',
        )
    );

}//end Payment_model
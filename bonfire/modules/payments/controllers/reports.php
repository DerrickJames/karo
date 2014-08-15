<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Displays the reports of school fees payments.
 *
 * @package    Bonfire
 * @subpackage Modules_Payments
 * @category   Controllers
 *
 */
class Reports extends Admin_Controller
{
	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('payment_model');

		Template::set_block('sub_nav', 'reports/_sub_nav');
	}//end __construct()

	//--------------------------------------------------------------------

	/**
	 * Displays a list of all payments
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function index()
	{
		$payments = $this->payment_model->select('programme, payment_mode, amount, code, payments.created_on, username')
										->join('users', 'users.id = payments.user_id')->find_all_by('payments.deleted', 0);

		Template::set('payments', $payments);
		Template::set('toolbar_title', 'School Prospectus');
		Template::render();

	}//end index()

	//--------------------------------------------------------------------

}//end Reports
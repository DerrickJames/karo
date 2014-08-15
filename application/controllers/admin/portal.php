<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Portal context controller
 *
 * The controller which displays the homepage of the Portal context in Karo System.
 *
 * @package    Bonfire
 * @subpackage Controllers
 * @category   Controllers
 *
 */
class Portal extends Admin_Controller
{
	/**
	 * Controller constructor sets the Title and Permissions
	 *
	 */
	public function __construct()
	{
		parent::__construct();

		Template::set('toolbar_title', 'Content');

		$this->load->model('fees/fee_model');
		$this->load->model('fees/department_model');
		$this->load->model('payment_model');

		$this->auth->restrict('Site.Portal.View');

	}//end __construct()

	//--------------------------------------------------------------------

	/**
	 * Displays the initial page of the Content context
	 *
	 * @return void
	 */
	public function index()
	{
		log_activity($this->current_user->id, 'Accessed the prospectus configurations book!', 'fees');

		$fees = $this->fee_model->select('fees.id, programmes, admission, duration, fees, departments.department_title')
								->join('departments', 'departments.id = fees.department_id', 'left')
								->as_array()
								->find_all_by('fees.deleted', 0);
		$departments = $this->department_model->select('department_title')->find_all_by('deleted', 0);

		Template::set(compact("departments", "fees"));
		Template::set('toolbar_title', 'School Prospectus');
		Template::set_view('admin/portal/index');
		Template::render();

	}//end index()

	//--------------------------------------------------------------------

	/**
	 * Create a payment
	 *
	 * @return void
	 * @author 
	 **/
	public function create()
	{	
		if ($this->input->post('submit'))
		{
			$data = [
				'payment_mode'	=> $this->input->post('payment_mode'),
				'amount'		=> $this->input->post('amount'),
				'code'			=> $this->input->post('code'),
				'programme'		=> $this->input->post('programme'),
				'user_id'		=> $this->current_user->id
			];

			if ($this->payment_model->insert($data))
			{
				log_activity($this->current_user->id, 'Submitted a payment', 'portal');

				Template::set_message('Payment successfully submitted!', 'success');
				redirect(SITE_AREA . '/portal');
			}
		}  

		Template::set('toolbar_title', 'Students Portal');
		Template::set_view('admin/portal/create_form');
		Template::render();

	}// end create()


}//end class
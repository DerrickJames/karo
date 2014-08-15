<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Allows the management of the School Prospectus.
 *
 * @package    Bonfire
 * @subpackage Modules_Fees
 * @category   Controllers
 *
 */
class Settings extends Admin_Controller
{

	//--------------------------------------------------------------------

	/**
	 * Sets up the fee structure
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('fee_model');
		$this->load->model('department_model');

		Template::set_block('sub_nav', 'settings/_sub_nav');

	}//end __construct()

	//--------------------------------------------------------------------

	/**
	 * Displays the prospectus
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function index()
	{
		// Check for any actions
		if (isset($_POST['delete'])) $action = '_destroy';

		if (isset($action))
		{
			$checked = $this->input->post('checked');

			if (! empty($checked))
			{
				foreach ($checked as $fee_id) {
					$this->_destroy($fee_id);
				}
			} else {
				Template::set_message('Select a row to delete!', 'error');
			}
		} 

		log_activity($this->current_user->id, 'Accessed the prospectus configurations book!', 'fees');

		$fees = $this->fee_model->select('fees.id, programmes, admission, duration, fees, departments.department_title')
								->join('departments', 'departments.id = fees.department_id', 'left')
								->as_array()
								->find_all_by('fees.deleted', 0);
		$departments = $this->department_model->select('department_title')->find_all_by('deleted', 0);

		Template::set(compact("departments", "fees"));
		Template::set('toolbar_title', 'School Prospectus');
		Template::render();

	}//end index()

	//--------------------------------------------------------------------

	/**
	 * Create a new fees structure
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function create()
	{
		if ($this->input->post('submit'))
		{
			$fee = [
				'programmes'	=> $this->input->post('programme'),
				'admission'		=> $this->input->post('admission'),
				'duration'		=> $this->input->post('duration'),
				'fees'			=> $this->input->post('fees'),
				'department_id'	=> $this->input->post('department')
			];

			if ($this->fee_model->insert($fee))
			{
				log_activity($this->current_user->id, 'Added a new fee structure', 'fees');

				Template::set_message('Record saved successfully!', 'success');
				redirect(SITE_AREA . '/settings/fees');
			}  
		}

		Template::set('departments', $this->department_model->find_all_by('deleted', 0));
        Template::set('toolbar_title', 'Create New Fee Structure');
		Template::set_view('settings/fee_form');
		Template::render();

	}//end create()

	//--------------------------------------------------------------------

	/**
	 * Edit a role record
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function update($id=null)
	{
		if ($this->input->post('submit'))
		{
			$fee = [
				'programmes'	=> $this->input->post('programme'),
				'admission'		=> $this->input->post('admission'),
				'duration'		=> $this->input->post('duration'),
				'fees'			=> $this->input->post('fees'),
				'department_id'	=> $this->input->post('department')
			];

			if ($this->fee_model->update($id, $fee))
			{
				log_activity($this->current_user->id, 'Updated a fee structure', 'fees');

				Template::set_message('Updated a fee structure', 'success');
				redirect(SITE_AREA . '/settings/fees');
			} 

		}

		Template::set('departments', $this->department_model->find_all_by('deleted', 0));
		Template::set('fee', $this->fee_model->find_by(['id' => $id, 'deleted' => 0]));
		Template::set('toolbar_title', 'Update A Fee Structure');
		Template::set_view('settings/fee_form');
		Template::render();

	}//end update()

	//----------------------------------------------------------------------------------

	/**
	 * Display a list of departments
	 *
	 * @return void
	 * @access public
	 **/
	public function departments()
	{
		// Check for any actions
		if (isset($_POST['delete'])) $action = '_destroy_department';

		if (isset($action))
		{
			$checked = $this->input->post('checked');

			if (! empty($checked))
			{
				foreach ($checked as $department_id) 
				{
					$this->_destroy_department($department_id);
				}
			} else {
				Template::set_message('Select a department to delete', 'error');
				redirect(SITE_AREA . '/settings/fees/departments');
			}
		}  

		log_activity($this->current_user->id, 'Accessed the departments records!', 'fees');

		Template::set('departments', $this->department_model->find_all_by('deleted', 0));
		Template::set('toolbar_title', 'Departments');
		Template::set_block('sub_nav', 'departments_sub_nav');
		Template::set_view('settings/departments');
		Template::render();
	
	}// end departments()

	//------------------------------------------------------------------------------------

	/**
	 * Create a new department
	 *
	 * @return void
	 * @access public 
	 **/
	public function create_department()
	{
		if ($this->input->post('submit'))
		{
			$department = [
				'department_title' => $this->input->post('department')
			];

			if ($this->department_model->insert($department))
			{
				log_activity($this->current_user->id, 'Created a new department', 'fees');

				Template::set_message('New department created!', 'success');
				redirect(SITE_AREA . '/settings/fees/departments');
			}  
		}  

		// Template::set('department', $this->department_model->find_all_by('deleted', 0));
		Template::set('toolbar_title', 'Create New Department');
		Template::set_block('sub_nav', 'departments_sub_nav');
		Template::set_view('settings/department_form');
		Template::render();
	
	}// end create_department()

	//---------------------------------------------------------------------------------------

	/**
	 * Update a department
	 *
	 * @return void
	 * @access public
	 * @param INT $id department_id
	 **/
	public function update_department($id=null)
	{
		if ($this->input->post('submit'))
		{
			$department = [
				'department_title'	=> $this->input->post('department')
			];

			if ($this->department_model->update($id, $department))
			{
				log_activity($this->current_user->id, 'Updated a department', 'fees');

				Template::set_message('Updated a department', 'success');
				redirect(SITE_AREA . '/settings/fees/departments');
			}  
		}

		Template::set('department', $this->department_model->find_by(['id' => $id, 'deleted' => 0]));
		Template::set('toolbar_title', 'Update Department');
		Template::set_view('settings/department_form');
		Template::set_block('sub_nav', 'departments_sub_nav');
		Template::render();

	}// end update_department()

	//---------------------------------------------------------------------------------------------

	/**
	 * Delete a fee structure
	 *
	 * @return void
	 * @access private
	 **/
	private function _destroy($id=null)
	{
		if ($this->fee_model->delete($id))
		{
			log_activity($this->current_user->id, 'Deleted a fee structue', 'fees');

			Template::set_message('Record successfully deleted', 'success');
			redirect(SITE_AREA . '/settings/fees');
		} else {
			Template::set_message('Unable to delete record' . $this->fee_model->error, 'error');
			redirect(SITE_AREA . '/settings/fees');
		}

	}// end _destroy()

	//----------------------------------------------------------------------------------------------

	/**
	 * Delete a department
	 *
	 * @return void
	 * @access private
	 **/
	private function _destroy_department($id=null)
	{
		if ($this->department_model->delete($id))
		{
			log_activity($this->current_user->id, 'Deleted a department', 'fees');

			Template::set_message('Record successfully deleted!', 'success');
			redirect(SITE_AREA . '/settings/fees/departments');
		} else {
			Template::set_message('Unable to delete' . $this->department_model->error, 'error');
			redirect(SITE_AREA . '/settings/fees/departments');
		}
	
	}// end _destroy_department()

}//end Settings
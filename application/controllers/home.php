<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Home controller
 *
 * The base controller.
 *
 * @package    Bonfire
 * @subpackage Controllers
 * @category   Controllers
 *
 */
class Home extends Authenticated_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('users/auth');
		$this->set_current_user();
		$this->load->helper('form');
	}

	//--------------------------------------------------------------------

	/**
	 * Displays the homepage of the Bonfire app
	 *
	 * @return void
	 */
	public function index()
	{
		if ($this->auth->is_logged_in())
		{
			redirect(SITE_AREA . '/portal');
		}  

		Modules::run('users/login');

	}//end index()

	//--------------------------------------------------------------------

	/**
	 * If the Auth lib is loaded, it will set the current user, since users
	 * will never be needed if the Auth library is not loaded. By not requiring
	 * this to be executed and loaded for every command, we can speed up calls
	 * that don't need users at all, or rely on a different type of auth, like
	 * an API or cronjob.
	 *
	 * Copied from Base_Controller
	 */
	protected function set_current_user()
	{
		if (class_exists('Auth'))
		{
			// Load our current logged in user for convenience
			if ($this->auth->is_logged_in())
			{
				$this->current_user = clone $this->auth->user();

				$this->current_user->user_img = gravatar_link($this->current_user->email, 22, $this->current_user->email, "{$this->current_user->email} Profile");

				// if the user has a language setting then use it
				if (isset($this->current_user->language))
				{
					$this->config->set_item('language', $this->current_user->language);
				}
			}
			else
			{
				$this->current_user = null;
			}

			// Make the current user available in the views
			if (!class_exists('Template'))
			{
				$this->load->library('Template');
			}
			Template::set('current_user', $this->current_user);
		}
	}

	//--------------------------------------------------------------------
}//end Home
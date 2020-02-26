<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends MY_Model {

	protected $_table_name = 'users';
	public $rules = array(
		'email' => array(
			'field' => 'email',
			'rules' => 'trim|required|valid_email'
		),
		'password' => array(
			'field' => 'password',
			'rules' => 'trim|required'
		)
	);
	public $rules_admin = array(
		'first_name' => array(
			'field' => 'first_name',
			'rules' => 'trim|required'
		),
		'last_name' => array(
			'field' => 'last_name',
			'rules' => 'trim|required'
		),
		'birthday' => array(
			'field' => 'birthday',
			'rules' => 'trim|required'
		),
		'email' => array(
			'field' => 'email',
			'rules' => 'trim|required|valid_email'
		),
		'password' => array(
			'field' => 'password',
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'rules' => 'trim|matches[password]'
		),

	);

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password'))
		), TRUE);
		
		if (null !== $user) {
			// log in user
			$data = array(
				'first_name' => $user->first_name,
				'role' => $user->role,
				'id' => $user->id,
				'loggedin' => TRUE,
			);

			$this->session->set_userdata($data);	

			return TRUE;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function hash($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */
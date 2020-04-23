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
    array(
      'field' => 'first_name',
      'label' => 'nombre(s)',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'last_name',
      'label' => 'apellido(s)',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'birthday',
      'label' => 'fecha nac.',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'email',
      'label' => 'correo',
      'rules' => 'trim|required|valid_email|callback__unique_email'
    ),
    array(
      'field' => 'password',
      'label' => 'contraseña',
      'rules' => 'trim|matches[password_confirm]'
    ),
    array(
      'field' => 'password_confirm',
      'label' => 'confirmar contraseña',
      'rules' => 'trim|matches[password]'
    )
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
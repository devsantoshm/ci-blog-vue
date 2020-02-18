<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		//echo hash('sha512', 'admin' . config_item('encryption_key'));
		$dashboard = 'admin/dashboard';

		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);

		if($this->input->post('enviar') == 1){
			if ($this->form_validation->run() == TRUE) {
				
				// Podemos logearnos
				if ($this->user_m->login() == TRUE) {
					redirect($dashboard);
				} else {
					$this->session->set_flashdata('error', 'correo y/o password incorrectos');
					redirect('admin/user/login');
				}
				
			} else {
				$this->data['error'] = 'error';
			}

		}

		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_login_layout', $this->data);
	}

	public function logout(){
		$this->user_m->logout();
		redirect('admin/user/login');
	}

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */
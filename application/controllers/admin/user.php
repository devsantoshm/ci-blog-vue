<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

  public function index()
  {
    $this->data['users'] = $this->user_m->get();
    $this->data['subview'] = 'admin/user/index';
    $this->data['js'] = 'assets/theme/js/userJS.js';
    $this->load->view('admin/_admin_layout', $this->data);
  }

  public function ajax_add($id = NULL)
  {
    $data = array('success' => FALSE, 'messages' => array());

    $rules = $this->user_m->rules_admin;
    //print_r($rules[4]['rules']);
    //exit();
    $id || $rules[4]['rules'] .= '|required'; // si hay un $id no asigno la reglas password
    $id || $rules[5]['rules'] .= '|required';
    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

    if($this->form_validation->run() == TRUE){
      $data = $this->user_m->array_from_post(array('first_name', 'last_name', 'birthday', 'email', 'password', 'role'));
      $data['password'] = $this->user_m->hash($data['password']);
      $this->user_m->save($data, $id);

      if ($id) {
        $data['msg'] = 'Registro editado correctamente.';
        $data['success'] = TRUE;
      } else {
        $data['msg'] = 'Registro insertado correctamente.';
        $data['success'] = TRUE;
      }
    }
    else{
      foreach ($_POST as $key => $value) {
        //if ($value == '') {
          $data['messages'][$key] = form_error($key);
       // }
      }
    }

    echo json_encode($data);
  }

  public function ajax_edit($id)
  {
    $data = $this->user_m->get($id);
    echo json_encode($data);
  }

  public function ajax_delete($id)
  {
    $data = $this->user_m->delete($id);
    echo json_encode(array("success" => TRUE));
  }

	public function login()
	{
		//echo hash('sha512', 'admin' . config_item('encryption_key'));
		// Redirect a user if he's already logged in
		$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);

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

  public function _unique_email($str)
  {
    $id = $this->input->post('id');
    
    $this->db->where('email', $this->input->post('email')); 
    !$id || $this->db->where('id !=', $id);//sirve para ingresar el mismo email del usuario a editar

    $user = $this->user_m->get();

    if(count($user)){
      $this->form_validation->set_message('_unique_email', 'Ya existe el %s en la bd');
      return FALSE;
    }

    return TRUE;
  }

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */
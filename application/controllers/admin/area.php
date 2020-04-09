<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('area_m');
	}

	public function index()
	{
		$this->data['areas'] = $this->area_m->get();
		$this->data['subview'] = 'admin/area/index';
		$this->load->view('admin/_admin_layout', $this->data);
	}

  public function ajax_add($id = NULL)
  {
    $data = array('success' => FALSE, 'messages' => array());

    $rules = $this->area_m->rules;
    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

    if($this->form_validation->run() == TRUE){
      $data = $this->area_m->array_from_post(array('name'));
      $this->area_m->save($data, $id);
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
        $data['messages'][$key] = form_error($key);
      }
    }

    echo json_encode($data);
  }

  public function ajax_edit($id)
  {
    $data = $this->area_m->get($id);
    echo json_encode($data);
  }

  /*public function edit($id = NULL)
  {
    if($id){
      $this->data['area'] = $this->area_m->get($id);
      $this->data['form_action'] = 'admin/area/edit/'.$id;
      $this->load->view('admin/area/area_modal', $this->data);
      //count($this->data['area']) || $this->data['errors'][] = 'area could not be found';
    }
    else{
      $this->data['area'] = $this->area_m->get_new();
      $this->data['form_action'] = 'admin/area/edit';
      $this->load->view('admin/area/area_modal', $this->data);
    }

    //Set up the form
    $rules = $this->area_m->rules;
    //$b = 'hola' -> $b .= "ahí!" -> $b = $b . "ahí!" -> $b = "hola ahi!"
    $this->form_validation->set_rules($rules);

    if($this->input->post('enviar') == 1){
      // Process the form
      if($this->form_validation->run() == TRUE){
        $data = $this->area_m->array_from_post(array('area'));
        $this->area_m->save($data, $id);
        if ($id) {
          $this->session->set_flashdata('message', "Area Actualizada.");
        } else {
          $this->session->set_flashdata('message', "Area Creada.");
        }
        redirect('area');
        //echo $this->db->last_query();
      }
      else{
        $this->session->set_flashdata('message', "Debe ingresar todos los campos del formulario");
        //redirect('area');
      }
    }
  }*/

}

/* End of file area.php */
/* Location: ./application/controllers/admin/area.php */
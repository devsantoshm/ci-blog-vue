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

}

/* End of file area.php */
/* Location: ./application/controllers/admin/area.php */
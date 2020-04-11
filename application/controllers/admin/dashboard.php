<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
    $this->data['subview'] = 'admin/index';
		$this->load->view('admin/_admin_layout', $this->data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
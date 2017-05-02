<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Activity extends My_Controller {
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'activity_model' );
	
	}	
	public function index($id = 0)
	{
		$data = $this->activity_model->one(array('where'=>array('id'=>$id)));
		$data['headerCss'] = array('slide.css');
		$this->template->display('activity/detail.html',$data);
	}
}

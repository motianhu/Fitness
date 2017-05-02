<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Store extends My_Controller {
	
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'store_model' );
		$this->load->model ( 'activity_model' );
	}
	
	public function index()
	{
		$data['headerCss'] = array('slide.css');
			
		$data['list'] = $this->store_model->get(array('disable'=>'0'));
		$data['activity'] = $this->activity_model->one(array('where'=>array('disable'=>'0')),1);
		$this->template->display('store/list.html',$data);
	}
	
	public function detail($id = 0)
	{
		$data = $this->store_model->one(array('where'=>array('id'=>$id)));
		$data['headerCss'] = array('slide.css');
		$this->template->display('store/detail.html',$data);
	}
}

<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Card extends My_Controller {
	
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'user_model' );
	}
	
	public function index()
	{
		$data = $this->user_model->one(array('where'=>array('openid'=>$this->openid)));
		$data['headerCss'] = array('slide.css');
		$this->template->display('card/detail.html',$data);		
	}
	

}

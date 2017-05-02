<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class User extends My_Controller
{
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'user_model' );
	}
	
	public function index($page = 1)
	{
		$page < 1 && $page = 1;
		$page = pageSize * ($page - 1);
			
		$data ['list'] = $this->user_model->get(NULL,pageSize,$page);
		// 分页
		$config ['base_url'] = site_url ( 'shop/user/index' );
		$config ['total_rows'] = $data ['list'] ['totalNum'];
		$this->pagination->initialize ( $config );
		$data ['pages'] = $this->pagination->create_links ();		
		
		$this->template->display ( 'shop/user/list.html', $data );
	}
	
	public function detail($id = '')
	{
		$data = array ();
		
		if ($id)
		{
			$whereArr = array (
					'user_id' => $id 
			);
			$result = $this->user_model->one ( array (
					'where' => $whereArr 
			) );
			$data ['result'] = $result;
		}else{
			show_error("没有该用户.");
		}
		$this->template->display ( 'shop/user/detail.html', $data );
	}
	
	public function save($id = '')
	{
		$data = $this->input->post ();
		$this->user_model->save ( $data, $id );
		redirect ( base_url () . 'shop/user' );
	}
}
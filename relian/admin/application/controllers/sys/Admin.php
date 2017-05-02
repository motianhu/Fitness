<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Admin extends My_Controller
{
	
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'admin_model' );
		$this->load->model ( 'admin_role_model' );
// 		$this->load->model ( 'admin_role_priv_model' );
	}
	
	public function index($page = 1)
	{
		$data['role_id'] = $role_id = $this->input->post('role');
		$data['uname'] = $uname = $this->input->post('uname');
		
		$where = $like_where = array();
		$role_id && $where['role_id'] = $role_id;
		$uname && $like_where['uname'] = $uname;
		
		$page < 1 && $page = 1;
		$page = pageSize * ($page - 1);
		
		$data['list'] = $this->admin_model->get($where,pageSize,$page,$like_where);
		// 分页
		$config ['base_url'] = site_url ( 'sys/admin/index' );
		$config ['total_rows'] = $data ['list'] ['totalNum'];
		$this->pagination->initialize ( $config );
		$data ['pages'] = $this->pagination->create_links ();
		
		$data['admin_role'] = $this->admin_role_model->get_role();
		$data['footerJs'] = array('DatePicker/WdatePicker.js');
		$this->template->display ( 'sys/admin/list.html', $data );
	}
	
	public function detail($id = '')
	{
		$data = array ();
		if ($id)
		{
			$whereArr = array (
					'admin_id' => $id 
			);
			$result = $this->admin_model->one ( array (
					'where' => $whereArr 
			) );
			$data ['result'] = $result;
		}
		$data['admin_role'] = $this->admin_role_model->get_role(3);
		$this->template->display ( 'sys/admin/detail.html', $data );
	}
	
	public function save($id = '')
	{
		$data = $this->input->post ();
		
		$this->admin_model->save ( $data, $id );

		redirect ( base_url () . 'sys/admin' );
	}
	

	public function del($id)
	{
		$this->admin_model->del ( array (
				'admin_id' => $id 
		) );
		
		redirect ( base_url () . 'sys/admin' );
	}

}
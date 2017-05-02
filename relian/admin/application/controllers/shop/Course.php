<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Course extends My_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'course_model' );
		$this->load->model ( 'store_model' );
	}
	public function index($page = 1) {
		$page < 1 && $page = 1;
		$page = pageSize * ($page - 1);
		
		//显示通用及分店自定义课程
		$in_where = NULL;
		if($this->_user['store_id']){
			$in_where = array('under'=>array('0',$this->_user['store_id']));
		}
		
		$data ['list'] = $this->course_model->get ( NULL, pageSize, $page, NULL, $in_where );
		// 分页
		$config ['base_url'] = site_url ( 'shop/course/index' );
		$config ['total_rows'] = $data ['list'] ['totalNum'];
		$this->pagination->initialize ( $config );
		$data ['pages'] = $this->pagination->create_links ();
		
		$this->template->display ( 'shop/course/list.html', $data );
	}
	public function detail($id = '') {
		
		$data = array ();		
		if ($id) {

			$sql = "select * from w_course where id = $id";
			$store_id = $this->_user['store_id'];
			if($store_id){
				$sql .= " and under in(0,$store_id)";
			}
			$data ['result'] = $this->course_model->get_one($sql);
			if(empty($data ['result'])){
				show_error ( '权限不足');
			}
		}
		$this->template->display ( 'shop/course/detail.html', $data );
	}
	public function save($id = '') {
		
		$data ['course_name'] = trim ( $this->input->post ( 'name' ) );
		if ($data ['course_name'] != '') {
			// 管理员加的为通用课程、分店加的为分店课程
			$data ['under'] = $this->_user ['store_id'];
			$this->course_model->save ( $data, $id );
		}
		redirect ( base_url () . 'shop/course' );
	}
	public function del($id) {
		
		$this->course_model->del ( array (
				'id' 	=> 	$id,
				'under'	=>	$this->_user ['store_id'] 
		) );
		redirect ( base_url () . 'shop/course' );
	}
}
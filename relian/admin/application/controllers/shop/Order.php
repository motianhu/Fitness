<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Order extends My_Controller {
	private $status_arr = array (
			'未支付',
			'已支付',
			'已取消',
			'已完成',
			'已退款' 
	);
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'course_model' );
		$this->load->model ( 'store_model' );
		$this->load->model ( 'order_model' );
	}
	public function index($page = 1) {
		$where_str = 'WHERE 1';
		
		$data ['store_id'] = $store_id = $this->input->post ( 'store_id' );		
		$data ['coach_name'] = $coach_name = $this->input->post ( 'coach_name' );
		$data ['cstatus'] = $status = $this->input->post ( 'status' );
		$data ['date'] = $date = $this->input->post ( 'date' );
		$data ['time'] = $time = $this->input->post ( 'time' );
		
		$data ['store'] = $this->store_model->get_store_list ();		
		
		$store_id && $where_str .= " and a.store_id = {$store_id}";
		$status !== NULL && $status !== '' && $where_str .= " and a.status = '{$status}'";
		$date && $where_str .= " and a.date = '{$date}'";
		$time && $where_str .= " and a.time = '{$time}'";
		$coach_name && $where_str .= " and c.name like '%{$coach_name}'%";
		
		if ($this->_user['role_id'] != 1){
			$where_str .= " and a.store_id = {$this->_user['store_id']}";
		}
		if ($this->_user['role_id'] == 3){ //教练
			$where_str .= " and a.coach_id = {$this->_user['uid']}";
		}
		
		$page < 1 && $page = 1;
		$page = pageSize * ($page - 1);
		
		$sql_arr ['data_sql'] = "SELECT
			  a.order_id,a.order_sn,a.num,a.date,a.time,a.payment,a.status,
			  b.name AS store_name,c.name AS coach_name,f.nickname,
			  GROUP_CONCAT(e.name) AS course_name
			FROM w_order a
			  LEFT JOIN w_store b
			    ON a.store_id = b.id
			  LEFT JOIN w_admin c
			    ON a.coach_id = c.admin_id
			  LEFT JOIN w_coach_relate_course d
			    ON c.admin_id = d.coach_id
			  LEFT JOIN w_course e
			    ON e.id = d.course_id
			  LEFT JOIN w_user f 
			  	ON a.user_id = f.user_id  
			  	$where_str
			GROUP BY a.order_id
			ORDER BY a.order_id desc limit $page," . pageSize;
		
		$sql_arr ['count_sql'] = "SELECT count(order_id) AS cnt FROM (SELECT
			  a.order_id
			FROM w_order a
			  LEFT JOIN w_store b
			    ON a.store_id = b.id
			  LEFT JOIN w_admin c
			    ON a.coach_id = c.admin_id
			  LEFT JOIN w_coach_relate_course d
			    ON c.admin_id = d.coach_id
			  LEFT JOIN w_course e
			    ON e.id = d.course_id
			  LEFT JOIN w_user f 
			  	ON a.user_id = f.user_id  
			  	$where_str
			GROUP BY a.order_id) t";
		//数据
		$data ['list'] = $this->order_model->get_page_list_by_sql ( $sql_arr );
		// 分页
		$config ['base_url'] = site_url ( 'shop/order/index' );
		$config ['total_rows'] = $data ['list'] ['totalNum'];
		$this->pagination->initialize ( $config );
		$data ['pages'] = $this->pagination->create_links ();
		
		$data ['status'] = $this->status_arr;
		$data ['footerJs'] = array (
				'DatePicker/WdatePicker.js' 
		);
		$this->template->display ( 'shop/order/list.html', $data );
	}
	public function detail($id = '') {
		$data = array ();
		
		if ($id) {
			$result = $this->order_model->get_order ( $id );
			$data ['result'] = $result;
		}
		$data ['status'] = $this->status_arr;
		$this->template->display ( 'shop/order/detail.html', $data );
	}
}
<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Order extends My_Controller {
	
	private $week = array('周日','周一','周二','周三','周四','周五','周六');
	private $ltime = array(
		'1'	=>	'8:00',
		'2'	=>	'9:00',			
		'3'	=>	'10:00',
		'4'	=>	'11:00',
		'5'	=>	'12:00',
		'6'	=>	'13:00',
		'7'	=>	'14:00',
		'8'	=>	'15:00',
		'9'	=>	'16:00',
		'10'=>	'17:00',
		'11'=>	'18:00',
		'12'=>	'19:00',
		'13'=>	'20:00',
		'14'=>	'21:00',
		'15'=>	'22:00',
		'16'=>	'23:00'
	); 
	private $status_arr = array('未支付','已支付','已取消','已完成','已退款');
	private $cur_date = '';
	private $range_arr = array();
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'store_model' );
		$this->load->model ( 'course_model' );
		$this->load->model ( 'admin_model' );
		$this->load->model ( 'schedule_model' );
		$this->load->model ( 'order_model' );
	
		$this->cur_date = date('Y-m-d');
		$this->range_arr = range(0, 6);
	}
	
	public function index(){
		
		$data['status_arr'] = $this->status_arr;//状态
		$data['order'] = $this->order_model->get_order($this->openid,0,pageSize);
		
		$data['train_cnt'] = 0;//累计训练次数
		$data['train_minute'] = 0;//累计训练时长(分)
		$data['train_day'] = 0; //累计天数
		$tmp_train_day = array();
		foreach ($data['order'] as $val){
			if ($val['status'] == '3'){
				$data['train_cnt']++;
				$data['train_minute'] += 60;
				$tmp_train_day[] = $val['date'];
			}
		}
		$data['train_day'] = count(array_flip(array_flip($tmp_train_day)));
		
		$data['headerCss'] = array('slide.css');
		$data['footerJs'] = array('order.js');
		$this->template->display('order/my_order.html',$data);
	}
	
	//订单详情
	public function detail($order_id = 0){
		$order_id = intval($order_id);
		if($order_id){
			$data = $this->order_model->get_order($this->openid,$order_id);
			
			$data['headerCss'] = array('slide.css','weui.css');
			$this->template->display('order/detail.html', $data);
		}else{
			show_error('非法参数.');
		}
	}
	
	public function date($coach_id = 0, $choose_date = NULL)
	{
		$data['coach_id'] = $coach_id = intval($coach_id);
// 		$data['course_id'] = $course_id = intval($course_id);
		$choose_date = empty($choose_date) ? array(date('Y-m-d')) : $choose_date;
		
		if($coach_id && $coach_id && count($choose_date) == 1 && is_date($choose_date[0])){
			
			//号
			$data['date_num'] = array(
				date('m.d'),
				date('m.d',strtotime(date("Y-m-d",strtotime("+1 day")))),
				date('m.d',strtotime(date("Y-m-d",strtotime("+2 day")))),
				date('m.d',strtotime(date("Y-m-d",strtotime("+3 day")))),
				date('m.d',strtotime(date("Y-m-d",strtotime("+4 day")))),
				date('m.d',strtotime(date("Y-m-d",strtotime("+5 day")))),
				date('m.d',strtotime(date("Y-m-d",strtotime("+6 day"))))
			);
			//星期
			$data['date_zn'] = array(
				$this->week[date('w',strtotime(date("Y-m-d",strtotime("+2 day"))))],
				$this->week[date('w',strtotime(date("Y-m-d",strtotime("+3 day"))))],
				$this->week[date('w',strtotime(date("Y-m-d",strtotime("+4 day"))))],
				$this->week[date('w',strtotime(date("Y-m-d",strtotime("+5 day"))))],
				$this->week[date('w',strtotime(date("Y-m-d",strtotime("+6 day"))))]
			);
			//开课时间
			$data['ltime'] = $this->ltime;
			//教练上课时间
			$res = $this->schedule_model->get_choose_schedule($coach_id, $choose_date);
			$data['schedule_time'] = empty($res) ? NULL : array_column($res, 'time');
			$data['schedule_order'] = array();
			foreach ($res as $val){
				if($val['is_order'] == '1'){
					//已有订单
					$data['schedule_order'][] = $val['time'];
				}
			}
			
			$data['headerCss'] = array('slide.css');			
			$data['footerJs'] = array('order.js');
			$this->template->display('order/date.html',$data);		
		}else{
			show_error("缺少参数");
		}
	}
	
	//切换日期
	public function get_schedule_by_date(){
// 		$course_id = intval($this->input->get('course_id'));
		$coach_id = intval($this->input->get('coach_id'));
		$data['date_num'] = $data_num = intval($this->input->get('data_num'));
		
		//开课时间
		$data['ltime'] = $this->ltime;
		
		if($coach_id && in_array($data_num, $this->range_arr)){
			
			$choose_date = array(date('Y-m-d',strtotime($this->cur_date)+24*60*60*$data_num));
			
			$res = $this->schedule_model->get_choose_schedule($coach_id, $choose_date);
			$data['schedule_time'] = empty($res) ? NULL : array_column($res, 'time');
			$data['schedule_order'] = array();
			foreach ($res as $val){
				if($val['is_order'] == '1'){
					//已有订单
					$data['schedule_order'][] = $val['time'];
				}
			}
		}
		$this->template->display('order/date_schedule.html',$data);
	}
	
	
	public function confirm(){
// 		$course_id = intval($this->input->get('course_id'));
		$coach_id = intval($this->input->get('coach_id'));
		$date_num = intval($this->input->get('date_num'));
		$time_num = intval($this->input->get('time_num'));
		
		
		if($coach_id && $coach_id && in_array($date_num, $this->range_arr) && isset($this->ltime[$time_num])){
		
			//获取确认订单基本信息
			$data = $this->admin_model->get_pre_order($coach_id);
			if(empty($data)){
				show_error('未找到该课程.');
			}
			
			//时间
			$data['date_num'] = $date_num;
			$data['time_num'] = $time_num;
			$data['str_date'] = date('m月d日',strtotime(date('Y-m-d',strtotime($this->cur_date)+24*60*60*$date_num)));
			
			$ltime_end = array_merge($this->ltime,array('17'=>'24:00'));	
			$data['str_time'] = $this->ltime[$time_num].'~'.$ltime_end[$time_num];
			
			$data['headerCss'] = array('slide.css');			
			$data['footerJs'] = array('order.js');
			$this->template->display('order/confirm.html',$data);
		}else{
			show_error('参数错误.');
		}
	}
	
	public function complate(){
		$coach_id = intval($this->input->post('coach_id'));
		$date_num = intval($this->input->post('date_num'));
		$time_num = intval($this->input->post('time_num'));
		$people_num = intval($this->input->post('people_num')); 
		if($coach_id && in_array($date_num, $this->range_arr) && isset($this->ltime[$time_num])){
			//订单信息
			$pre_order = $this->admin_model->get_pre_order($coach_id);
			$date = date('Y-m-d',strtotime($this->cur_date)+24*60*60*$date_num);
			$insert_data = array(
				'order_sn'	=>	date('YmdHis').uniqid(),
				'openid'	=>	$this->openid,
				'store_id'	=>	$pre_order['store_id'],
				'course_name'	=>	$pre_order['course_name'],
				'coach_id'	=>	$coach_id,
				'num'		=>	$people_num,
				'date'		=>	$date,
				'time'		=>	$this->ltime[$time_num],
				'total'		=>	$pre_order['price']*$people_num,
				'discount'	=>	0,
				'coupon_id'	=>	0,
				'payment'	=>	$pre_order['price']*$people_num,
				'status'	=>	'0'									
			);
			//更新课程安排表
			$where_arr = array(
				'store_id'	=>	$pre_order['store_id'],
				'coach_id'	=>	$coach_id,
				'date'		=>	$date,
				'time'		=>	$this->ltime[$time_num]
			);
			$table = 'schedule_'.date('Y',strtotime($date));
			$this->schedule_model->update($where_arr,array('is_order'=>'1'),$table);
				
			$this->order_model->add($insert_data);	
		}else{
			show_error('参数错误.');
		}
		
		$data['headerCss'] = array('slide.css');			
		$data['footerJs'] = array();
		$this->template->display('order/complate.html',$data);
	}
	
	public function cancel($order_id = 0){
		$order_id = intval($order_id);
		
		$this->order_model->update(array('status'=>'2'),array('order_id'=>$order_id,'status <'=>'2'));
		
		redirect(base_url().'order');
	}
}

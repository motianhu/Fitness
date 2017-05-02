<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends My_Controller {
	
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'admin_model' );
		$this->load->model ( 'store_model' );
		$this->load->model ( 'course_model' );
		$this->load->model ( 'activity_model' );
		$this->load->model ( 'area_model' );
	}
	
	public function index($area_id = 0)
	{
		$area_id = intval($area_id);
		//分店
		$sql = "select id,name from w_store where disable = '0'";
		$area_id && $sql .= " and (city = {$area_id} or area = {$area_id})";
		$data['store'] = $this->store_model->get_all($sql);
		//通用课程标签
		$sql = "select id,name from w_course where under = '0' and disable = '0'";
		$data['course'] = $this->course_model->get_all($sql);
		//城市地区
		$sql = "select * from w_area order by pid asc";
		$area = $this->area_model->get_all($sql);
		foreach ($area as $val){
			if($val['pid'] == '0'){
				$data['area'][$val['id']]= $val;
				$area_id == $val['id'] && $data['area_title'] = $val['name'].'全城';
			}else{
				$data['area'][$val['pid']]['child'][] = $val;
				$area_id == $val['id'] && $data['area_title'] = $data['area'][$val['pid']]['name'].$val['name'];
			}
		}
		//分店教练
		$coach = array();
		$res = $this->course_model->get_all_course($area_id);
		foreach ($res as $val){
			$val['course_tag'] = explode(',', $val['course_name']);
			$coach[$val['store_id']][] = $val;
		}
		$data['coach'] = $coach;
		$data['headerCss'] = array('slide.css');
		$data['footerJs'] = array(
				'course.js'
		);
		$data['activity'] = $this->activity_model->one(array('disable'=>'0'),1);
		$this->template->display('course/list.html',$data);
	}
	
	public function detail($coach_id = 0){
		$coach_id = intval($coach_id);
		if($coach_id){
			$data = $this->course_model->get_course_detail_by_coach($coach_id);
			$data['headerCss'] = array('slide.css');
			$data['activity'] = $this->activity_model->one(array('disable'=>'0'),1);
			$this->template->display('course/detail.html', $data);
		}else{
			redirect(base_url().'error');
		}
	}
}

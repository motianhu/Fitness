<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends My_Model {

    public $model = '';

    public function __construct()
    {
        parent::__construct();

        $this->model = 'schedule_'.date('Y');
        $this->create_schedule_table();
        $this->setModel($this->model);
    }  
    
    //获取已选课程
    public function get_choose_schedule($coach_id=0,$choose_date=NULL,$field = ''){
//     	$course_id = intval($course_id);
    	$coach_id = intval($coach_id);
    	if($coach_id && ! empty($choose_date)){
    		$field = $field ? $field : 'store_id,coach_id,is_order,date,time';
    		$where_arr = array(
    			'coach_id'	=>	$coach_id
    		);
    		$year = array();
    		foreach ($choose_date as $val){
    			$year[] = date('Y',strtotime($val));
    		}
    		$year = array_unique($year);
    		
    		$table= 'schedule_'.$year[0];
    		$query = $this->db->select($field)->where($where_arr)->where_in('date',$choose_date)->get($table);
    		$result = $query->result_array();
    		
    		$result1 = array();
    		if (count($year) > 1){
    			$table1= 'schedule_'.$year[1];
    			$query = $this->db->select($field)->where($where_arr)->where_in('date',$choose_date)->get($table1);
    			$result1 = $query->result_array();
    		}	
    		return array_merge($result, $result1);
    	}
    	return NULL;
    }
    
    public function create_schedule_table(){
    	$year = date('Y');
    	$table = 'w_schedule_'.$year;
    	$table_exists = $this->db->query("show tables like '$table' ");
    	
    	$sql = "CREATE TABLE `w_schedule_$year` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `store_id` int(11) unsigned NOT NULL COMMENT '分店id',
				  `coach_id` int(11) unsigned NOT NULL COMMENT '教练id',
				  `date` char(10) NOT NULL COMMENT '日期',
				  `time` char(10) NOT NULL COMMENT '时间',
				  `opera_id` int(11) unsigned NOT NULL COMMENT '最后更新人',
				  `opera_time` char(20) NOT NULL COMMENT '最后更新时间',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8";
    	
    	if( count($table_exists->result_array()) <= 0 ){
    		$this->db->query($sql);
    	}
    }
}

/* End of file schedule_model.php */
/* Location: ./application/models/schedule_model.php */
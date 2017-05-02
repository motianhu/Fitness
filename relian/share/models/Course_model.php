<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends My_Model {

    public $model = 'course';

    public function __construct()
    {
        parent::__construct();

        $this->setModel($this->model);
    }


    public function save($data,$id = '')
    {
        $insertArr['name'] = $data['course_name'];

        if ($id) {
            $this->update($insertArr, array('id' => $id));
        }else{
            $this->add($insertArr);
        }
    }
    
    public function get_course_list($course_id = 0)
    {
    	$course_id = intval($course_id);
    	$data = array();
    	$sql = "select id,name from w_course where under=0 and disable = '0'";
    	$course_id && $sql .= " and id = {$course_id}";
    	$res = $this->get_all($sql);
    	foreach ($res as $val){
    		$data[$val['id']] = $val['name'];
    	}
    	return $data;
    }
    
    //获取通用课程标签
    public function get_public_course(){
    	$sql = "";
    }
    
    //获取教练课程
    public function get_course_by_coach($coach_id = 0){
    	$coach_id = intval($coach_id);
    	if($coach_id){
	    	$sql = "SELECT
				  id,name
				FROM w_course
				WHERE id IN(SELECT
				              course_id
				            FROM w_coach_relate_course
				            WHERE coach_id = {$coach_id})";
	    	return $this->get_all($sql);
    	}
    	return NULL;
    }
    
    //获取所有课程列表
    public function get_all_course($area_id = 0){
    	$where_str = " WHERE a.role_id = 3 AND a.disabled = '0'";
    	$area_id && $where_str .= " AND (d.city = {$area_id} or d.area = {$area_id})";
    	$sql = "SELECT
				  a.admin_id,
				  a.store_id,
				  a.name           coach_name,
				  a.price,
				  a.pic_persion,
    			  GROUP_CONCAT(c.id) AS course_id,
				  GROUP_CONCAT(c.name) AS course_name
				FROM w_admin a
    			  LEFT JOIN w_store d ON a.store_id = d.id
				  LEFT JOIN w_coach_relate_course b ON a.admin_id = b.coach_id
				  LEFT JOIN w_course c ON c.id = b.course_id
				$where_str GROUP BY a.admin_id";
    	return $this->get_all($sql);
    }
    
    //获取教练课程详情
    public function get_course_detail_by_coach($coach_id = 0){
    	$coach_id = intval($coach_id);
    	if($coach_id){
	    	$sql = "SELECT
				  a.admin_id,
				  a.profile,
				  a.store_id,
				  a.name        AS coach_name,
				  a.price,
				  a.pic_persion,
				  a.pic_detail,
				  a.introduce,
				  a.notice,
				  b.addr,
				  b.addr_link
				FROM w_admin a
				  LEFT JOIN w_store b
				    ON b.id = a.store_id
				WHERE a.admin_id = {$coach_id}
				    AND a.role_id = 3
				    AND a.disabled = '0'";
	    	return $this->get_one($sql);
    	}
    }
    
}

/* End of file store_model.php */
/* Location: ./application/models/store_model.php */
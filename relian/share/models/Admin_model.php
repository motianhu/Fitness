<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends My_Model {

    public $model = 'admin';

    public function __construct()
    {
        parent::__construct();

        $this->setModel($this->model);
    }
    
    public function save($data,$id = '')
    {
        if ($id) {
        	if( ! $data['passwd'])
        		unset($data['passwd']);
        	else
        		$data['passwd'] = get_check_pwd($data['passwd']);
        	$this->update($data, array('admin_id' => $id));
        }else{
        	$data['passwd'] = get_check_pwd($data['passwd']);
            $this->add($data);
        }
    }
    
    //获取分店教练列表
    public function get_coach_by_store($store_id = 0){
    	$store_id = intval($store_id);
    	if($store_id){
    		$sql = "select admin_id,name from w_admin where store_id = $store_id and disabled = '0' and role_id = 3";
    		return $this->get_all($sql);
    	}
    	return null;
    }
    
	//获取确认订单基本信息
	public function get_pre_order($coach_id = 0){
		if($coach_id){
			$sql = "SELECT
					  a.admin_id AS coach_id,
					  a.name     AS coach_name,
					  a.store_id,
					  a.price,
					  b.name     AS store_name,
					  b.addr,
					  GROUP_CONCAT(d.name) AS course_name  
					FROM w_admin a
					  LEFT JOIN w_store b
					    ON a.store_id = b.id
					  LEFT JOIN w_coach_relate_course c
					    ON a.admin_id = c.coach_id
					  LEFT JOIN w_course d
					    ON c.course_id = d.id
					WHERE a.admin_id = {$coach_id}
					    AND a.role_id = 3
					GROUP BY a.admin_id ";
			return $this->get_one($sql);
		}
		return NULL;
	}
	
	//根据教练查找分店id
	public function get_store_by_coach($coach_id = 0){
		$coach_id = intval($coach_id);
		if($coach_id){
			$res =  $this->get_one("SELECT store_id FROM w_admin WHERE admin_id = {$coach_id} AND role_id = 3");
			return isset($res['store_id']) ? $res['store_id'] : 0;
		}
		return 0;
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */
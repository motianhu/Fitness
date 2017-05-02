<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_role_model extends My_Model {

    public $model = 'admin_role';

    public function __construct()
    {
        parent::__construct();

        $this->setModel($this->model);
    }
    
    public function save($data,$id = '')
    {
    	if ($id) {
    		$this->update($data, array('role_id' => $id));
    	}else{
    		$this->add(array_filter($data));
    	}
    }   

    //获取除role_id外所有角色
    public function get_role($role_id = 0)
    {
    	$return = $res = array();
    	$sql = "select role_id,role_name from w_admin_role where disabled = 'false'";
    	$role_id && $sql = $sql." and role_id != {$role_id}";
    	$res = $this->get_all($sql);
    	foreach ($res as $v)
    		$return[$v['role_id']] = $v;
    	return $return;
    }

}

/* End of file admin_role_model.php */
/* Location: ./application/models/admin_role_model.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_model extends My_Model {

    public $model = 'store';

    public function __construct()
    {
        parent::__construct();

        $this->setModel($this->model);
    }


    public function save($data,$id = '')
    {
        $insertArr['name'] = $data['name'];
        $insertArr['tel'] = $data['tel'];
        $insertArr['addr'] = $data['addr'];
        $insertArr['addr_link'] = $data['addr_link'];
        $insertArr['content'] = $data['content'];
        $insertArr['notice'] = $data['notice'];
         $insertArr['img1'] = $data['img1'];

        if ($id) {
            $this->update($insertArr, array('id' => $id));
        }else{
            $this->add($insertArr);
        }
    }
    
    public function get_store_list($store_id = 0)
    {
    	$data = array();
    	$sql = "select id,name from w_store where disable = '0'";
    	$store_id && $sql .= " and id = {$store_id}";
    	
    	$res = $this->get_all($sql);
    	foreach ($res as $val){
    		$data[$val['id']] = $val['name'];
    	}
    	return $data;
    }
    
    //查询地区是否存在分店
    public function search_area_store_cnt($area_id = 0){
    	if($area_id){
    		$sql = "SELECT COUNT(id) AS cnt  FROM w_store WHERE disable='0' and (city={$area_id}  OR area={$area_id})";
    		$res = $this->get_one($sql);
    		if($res['cnt'] > 0){
    			return false;
    		}
    	}
    	return true;
    }
    
}

/* End of file store_model.php */
/* Location: ./application/models/store_model.php */
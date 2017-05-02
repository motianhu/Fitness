<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends My_Model {

    public $model = 'user';

    public function __construct()
    {
        parent::__construct();

        $this->setModel($this->model);
    }
    
    public function save($data,$id = '')
    {
    	$insertArr['height'] = $data['height'];
    	$insertArr['weight'] = $data['weight'];
    	$insertArr['fat'] = $data['fat'];
    	$insertArr['bones'] = $data['bones'];
    
    	if ($id) {
    		$this->update($insertArr, array('user_id' => $id));
    	}else{
    		show_error("没有该用户.");
    	}
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
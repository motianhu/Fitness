<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends My_Model {

    public $model = 'order';

    public function __construct()
    {
        parent::__construct();

        $this->setModel($this->model);
    }
    
    //获取订单列表  缺少用户id
    public function get_order($openid,$order_id=0,$offset=0,$pageSize=0){
    	$order_id = intval($order_id);
    	$where = "WHERE a.openid = '{$openid}'";
    	$order_id && $where .= " AND a.order_id = {$order_id}";
    	$sql = "SELECT
				  a.*,
				  b.name        AS store_name,
				  b.addr,
				  b.addr_link,
				  c.name        AS coach_name,
				  c.notice,
				  c.pic_persion,
				  f.nickname,
				  GROUP_CONCAT(e.name) AS course_name
				FROM w_order a
				  LEFT JOIN w_store b
				    ON a.store_id = b.id
				  LEFT JOIN w_admin c
				    ON a.coach_id = c.admin_id
				  LEFT JOIN w_coach_relate_course d ON c.admin_id = d.coach_id
				  LEFT JOIN w_course e ON e.id = d.course_id 
				  LEFT JOIN w_user f ON a.openid = f.openid $where
				  GROUP BY a.order_id 
				ORDER BY FIELD(a.status,'0','1','3','4','2'),a.date DESC,a.time desc";
    	if( ! empty($pageSize)){
    		$sql .= " limit $offset,$pageSize";
    	}
    	return $order_id ? $this->get_one($sql) : $this->get_all($sql);
    }
}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
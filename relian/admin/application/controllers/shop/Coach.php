<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/***
 * 教练管理
 */
class Coach extends My_Controller
{
	
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'admin_model' );
		$this->load->model ( 'store_model' );
		$this->load->model ( 'course_model' );
		$this->load->model ( 'coach_relate_course_model' );
	}
	
	public function index($page = 1)
	{
		$data['name'] = $name = $this->input->post('name');
		$data['store_id'] = $store_id = $this->input->post('store_id');
		
		$where = $like_where = array();
		$where['role_id'] = 3; //教练
		
		$name && $like_where['name'] = $name;
		
		if ($this->_user['role_id'] == 1){
			$store_id && $where['store_id'] = $store_id;
			$data['store'] = $this->store_model->get_store_list();
		}elseif($this->_user['role_id'] == 2){
			//分店管理员只可查询该分店下的教练
			$where['store_id'] = $this->_user['store_id'];
		}else{
			//只能看自己
			$where['admin_id'] = $this->_user['uid'];
		}
		
		$page < 1 && $page = 1;
		$page = pageSize * ($page - 1);
			
		$data ['list'] = $this->admin_model->get($where,pageSize,$page,$like_where);
		// 分页
		$config ['base_url'] = site_url ( 'shop/coach/index' );
		$config ['total_rows'] = $data ['list'] ['totalNum'];
		$this->pagination->initialize ( $config );
		$data ['pages'] = $this->pagination->create_links ();
		
		$this->template->display ( 'shop/coach/list.html', $data );
	}
	
	public function detail($id = '')
	{
		$data = array ();
		if ($id)
		{
			$whereArr = array (
					'admin_id' => $id 
			);
			$result = $this->admin_model->one ( array (
					'where' => $whereArr 
			) );
			//检查权限
			if($this->_user['role_id'] != 1){
				if($this->_user['role_id'] != 2){
					//教练仅可编辑自己
					if($this->_user['uid'] != $id){
						show_error ( '权限不足' );
					}
				}else{
					//分店管理员可编辑分店
					if($this->_user['store_id'] != $result['store_id']){
						show_error ( '权限不足' );
					}
				}
			}			
			$data ['result'] = $result;
		}
		//分店
		$data['store'] = $this->store_model->get_store_list();
		
		$data['footerJs'] = array(
				'../assets/ueditor/ueditor.config.js',
				'../assets/ueditor/ueditor.all.js',
				'coach.js'
		);
		$this->template->display ( 'shop/coach/detail.html', $data );
	}
	
	//教练关联课程(一对多)
	public function course($id = 0){
		$data['id'] = $id;
		$data['choosed_course'] = $this->coach_relate_course_model->get_course_by_coach($id);
		$data['course'] = $this->course_model->get_course_list();
		$this->template->display ( 'shop/coach/course.html', $data );
	}
	
	//保存教练课程
	public function save_course($id = 0){
		if( ! empty($id)){
// 			if($this->_user['role_id'] != 1 && ($this->_user['store_id'] != $result['store_id'])
			if ( $this->_user['role_id'] == 3 ){
				//教练
				if($this->_user['uid'] != $id){
					show_error('权限不足');
				}
			}elseif($this->_user['role_id'] != 1){
				//非超管，只可编辑自己分店
				$result = $this->admin_model->one ( array (
						'where' => array('admin_id'=>$id)
				) );
				if($this->_user['store_id'] != $result['store_id']){
					show_error('权限不足');
				}
			}		
					
			$new_choosed = $this->input->post ('course');
			//原已选择课程id
			$old_choosed = $this->coach_relate_course_model->get_course_by_coach($id);
			//比较数据获取需要增加和减少的课程
			$result = array_diff_assoc2_deep($new_choosed, $old_choosed);
			if(!empty($result['add'])){	//新增课程	
				$insert_data = array();	
				foreach ( $result['add'] as $val){
					$insert_data[] = array(
						'coach_id'	=>	$id,
						'course_id'	=>	$val
					);
				}
				$this->coach_relate_course_model->add_batch($insert_data);
			}
			if(!empty($result['del']))	//取消课程
			{
				foreach ($result['del'] as $v){
					$this->coach_relate_course_model->del(array('coach_id'=>$id,'course_id'=>$v));
				}
			}
			redirect ( base_url () . 'shop/coach/course/' . $id );
		}else{
			show_error("没有对应教练.");
		}
	}
	
	//保存教练
	public function save($id = '')
	{
		$data = $this->input->post ();
		
		if($_FILES['pic_persion']['error'] == 0){
			$filename = $_FILES ['pic_persion'] ['name'];
			$MAXIMUM_FILESIZE = 0.2 * 1024 * 1024; // 头像限制200KB;
			
			if ($_FILES ['pic_persion'] ['size'] > $MAXIMUM_FILESIZE) {
				show_error('头像图片过大，请处理后重新上传.');
			}
			if( ! in_array(exif_imagetype($_FILES['pic_persion']['tmp_name']),array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_GIF))){
				show_error("图片文件格式错误");
			}
			$file_name = uniqid ().'.'.substr(strrchr($_FILES['pic_persion']['name'], '.'), 1);
			$md_dir = './upload/coach/'.$file_name;
			$isMoved = @move_uploaded_file ( $_FILES ['pic_persion'] ['tmp_name'], $md_dir);
			$isMoved &&	$data['pic_persion'] = base_url().'upload/coach/'.$file_name;
		}
		
		if($_FILES['pic_detail']['error'] == 0){
			$filename = $_FILES ['pic_detail'] ['name'];
			$MAXIMUM_FILESIZE = 0.5 * 1024 * 1024; // 详情限制200KB;
				
			if ($_FILES ['pic_detail'] ['size'] > $MAXIMUM_FILESIZE) {
				show_error('详情图图片过大，请处理后重新上传.');
			}
			if( ! in_array(exif_imagetype($_FILES['pic_detail']['tmp_name']),array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_GIF))){
				show_error("图片文件格式错误");
			}
			$file_name = uniqid ().'.'.substr(strrchr($_FILES['pic_detail']['name'], '.'), 1);
			$md_dir = './upload/coach/'.$file_name;
			$isMoved = @move_uploaded_file ( $_FILES ['pic_detail'] ['tmp_name'], $md_dir);
			$isMoved &&	$data['pic_detail'] = base_url().'upload/coach/'.$file_name;
		}
		
		$data['role_id'] = '3'; //教练
		$this->admin_model->save ( $data, $id );

		redirect ( base_url () . 'shop/coach' );
	}
	

	public function del($id)
	{
		$this->admin_model->del ( array (
				'admin_id' => $id 
		) );
		
		redirect ( base_url () . 'shop/coach' );
	}

}
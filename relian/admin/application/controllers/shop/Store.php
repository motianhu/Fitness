<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Store extends My_Controller
{
	
	public function __construct()
	{
		parent::__construct ();
		$this->load->model ( 'store_model' );
		$this->load->model ( 'area_model' );
	}
	
	public function index($page = 1)
	{
		$page < 1 && $page = 1;
		$page = pageSize * ($page - 1);
		 
		$data ['list'] = $this->store_model->get(NULL,pageSize,$page);
		// 分页
		$config ['base_url'] = site_url ( 'shop/store/index' );
		$config ['total_rows'] = $data ['list'] ['totalNum'];
		$this->pagination->initialize ( $config );
		$data ['pages'] = $this->pagination->create_links ();
		
		$this->template->display ( 'shop/store/list.html', $data );
	}
	
	public function detail($id = '')
	{
		$data = array ();
		
		if ($id)
		{
			$whereArr = array (
					'id' => $id 
			);
			$result = $this->store_model->one ( array (
					'where' => $whereArr 
			) );
			$data ['result'] = $result;
			//地区
			$data['area'] = $this->area_model->one(array('where'=>array('pid'=>$result['city'])),1);
		}
		//一级城市
		$data['city'] = $this->area_model->one(array('where'=>array('pid'=>'0')),1);
		$data['footerJs'] = array(
				'../assets/ueditor/ueditor.config.js',
				'../assets/ueditor/ueditor.all.js',
				'astore.js'
		);
		$this->template->display ( 'shop/store/detail.html', $data );
	}
	
	public function save($id = '')
	{
		$data = $this->input->post ();
		if($_FILES['img1']['error'] == 0){
			$filename = $_FILES ['img1'] ['name'];
			$MAXIMUM_FILESIZE = 0.5 * 1024 * 1024; // 头像限制200KB;
			
			if ($_FILES ['img1'] ['size'] > $MAXIMUM_FILESIZE) {
				show_error('头像图片过大，请处理后重新上传.');
			}
			if( ! in_array(exif_imagetype($_FILES['img1']['tmp_name']),array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_GIF))){
				show_error("图片文件格式错误");
			}
			$file_name = uniqid ().'.'.substr(strrchr($_FILES['img1']['name'], '.'), 1);
			$md_dir = './upload/store/'.$file_name;
			$isMoved = @move_uploaded_file ( $_FILES ['img1'] ['tmp_name'], $md_dir);
			$isMoved &&	$data['img1'] = base_url().'upload/store/'.$file_name;
		}
		$this->store_model->save ( $data, $id );
		redirect ( base_url () . 'shop/store' );
	}
	
	public function del($id)
	{
		$this->param_model->del ( array (
				'set_id' => $id 
		) );
		redirect ( base_url () . 'sys/param' );
	}

}
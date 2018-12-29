<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Upload File Module
 */
class Upload extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array(
			'url',
			'form'
		));
		$this->view_template = 'upload_file';
	}

	public function index()
	{
		$data = array();
		$config['upload_path'] = './upload/'; //đường dẫn vào thư mục upload
		$config['allowed_types'] = 'gif|png'; //các định dạng ảnh cho phép
		$config['max_size'] = 2048;
		$config['max_width'] = 5000;
		$config['max_height'] = 5000;
		$this->load->library('upload', $config); //load thư viên khi đã config
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file')) {
			$result = array('error' => $this->upload->display_errors());
			echo json_encode($result);
		} else {
			$result = array('upload_data' => $this->upload->data());
			echo json_encode($result);
		}
		//$this->load->view('admin/layout', $data);

//		echo json_encode($result['upload_data']['file_name']);
	}
	public function do_upload()
	{
		$this->load->view($this->view_template);
	}
}

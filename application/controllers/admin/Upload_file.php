<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Upload File Module
 */
class Upload_file extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array(
			'url',
			'form'
		));$this->view_template = 'upload_file';

	}
	public function index()
	{
		$config['upload_path']   = './upload/';//đường dẫn đến file chứa ảnh
		$config['allowed_types'] = 'gif|jpg|png'; //các định dạng cho phép
		$config['max_size']      = 2048;
		$config['max_width']     = 5000;
		$config['max_height']    = 5000;
		$this->load->library('upload', $config);
		$test = $this->upload->initialize($config);
//		echo json_encode($_FILES);
//		echo json_encode(file_exists("./upload/".$_FILES['file']['name'])) ;
//		die;
		/*kiểm tra file tồn tại:
		nếu đã tồn tại thì đưa ra thông báo đã tồn tại
		chưa tồn tại thì kiểm tra tính hợp lệ */
		if(!file_exists("./upload/".$_FILES['file']['name'])){
			if ( ! $this->upload->do_upload('file'))
			{
				$result = array('error' => $this->upload->display_errors());
			}
			else
			{
				$result = array('upload_data' => $this->upload->data(),'status'=>'upload thành công');
			}
//			echo json_encode($result['upload_data']['file_name']); // trả về dạng chuỗi
			echo json_encode($result); // trả về dạng mảng

		}else{
			$result = array('error' => 'ảnh đã tồn tại');
			echo json_encode($result);
		}
	}
	public function do_upload()
	{
		$this->load->view($this->view_template);
	}
}

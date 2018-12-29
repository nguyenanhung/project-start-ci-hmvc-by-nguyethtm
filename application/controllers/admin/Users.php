<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('form');

	}
	function index()
	{
		$data = array();
		//lấy thông tin từ trên url xuống
		$page = $this->uri->segment(5);
		if($page == ''){ $page =1; }else{ $page = $page; }
		$num_per_page = 10;
		//lay so bai viet thuoc loại tin
		$total_row = $this->user_model->get_total();
		$num_page = ceil($total_row / $num_per_page);
		$start = ($page - 1) * $num_per_page;
		// //THanh phân trang
		$base_url_pagging = base_url("admin/users/index");
		$html_pagging = $this->user_model->create_pagging($num_page, $base_url_pagging, $page);
		$lst_users = $this->user_model->get_list_user($start,$num_per_page);
		$data['page'] = $page;
		$data['total_row'] = $total_row;
		$data['lst_users'] = $lst_users;
		$data['html_pagging'] = $html_pagging;
		$data['temp'] = 'admin/user/index';
		$this->load->view('admin/layout',$data);
	}
	function edit_users()
	{
		$data = array();
		$idUser = $this->uri->segment(4);
		$user = $this->user_model->get_infor($idUser);
		$this->form_validation->set_rules('title','Tên','required');
		$this->form_validation->set_rules('password','Mật khẩu','required');
		if($this->form_validation->run() == TRUE) {
			$username = $this->input->post('title');
			$password = $this->input->post('password');
			$passwordAgain = $this->input->post('passwordAgain');
			if ($password == $passwordAgain) {
				$password = md5($password);
			}
			$role = $this->input->post('parent-Cat');
			$status = $this->input->post('status');
			$data = array(
				'name' => $username,
				'password' => $password,
				'role' => $role,
				'status' => $status,
				'updated_at' => time()
			);
			$this->user_model->update_user($idUser,$data);
//			$this->db->where("id", $idUser);
//			$query = $this->db->update("users", $data);
		}
		$data['user'] = $user;
		$data['temp'] = 'admin/user/edit_users';
		$this->load->view('admin/layout',$data);
	}
	function delete_users()
	{
		$data = array();
		$idUser = $this->uri->segment(4);
		$data = array(
			'status' => 0,
		);
		$this->user_model->delete_user($idUser,$data);
//		$this->db->where("id",$idUser);
//		$query = $this->db->update("users",$data);
		$data['temp'] = 'admin/user/delete_users';
		$this->load->view('admin/layout',$data);
	}
	function add_user()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data = array();
		if ($this->input->post()){
            $this->form_validation->set_rules('title', 'Họ Tên', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]|matches[passwordAgain]');
            $this->form_validation->set_rules('passwordAgain', 'Nhập lại mật khẩu', 'required|min_length[6]');
            //$test = $this->form_validation->run();
            //var_dump($test);
            if($this->form_validation->run()) {
                //var_dump('ádsfhsdkjfhskd'); die();
                $username = $this->input->post('title');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $role = $this->input->post('role');
                $status = $this->input->post('status');
                $result = $this->user_model->check_email($email);
                if ($result == 0) {
                    $user = array(
                        'name'=>$username,
                        'email' =>$email,
                        'password' => md5($password),
                        'role'=> $role,
                        'status'=>$status,
                        'created_at'=> time(),
                    );
                    $this->user_model->add_user($user);
//                    $this->db->insert('users',$user); //thêm dữ liệu
                    redirect('admin/users/index'); //chuyển hướng về trang index
                }else{

                }
            }
        }
		$data['temp'] = 'admin/user/add_user';
		$this->load->view('admin/layout',$data);
	}
}

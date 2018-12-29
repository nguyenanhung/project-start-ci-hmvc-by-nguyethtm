<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }
    public function login()
    {
        $data         = array();
        $data['temp'] = 'site/users/login';
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
        if ($this->form_validation->run())
        {
            $email    = $this->input->post('email');
            $password = $this->input->post('password');
            $password = md5($password);
            $result   = $this->user_model->checklogin($email, $password);
            //var_dump($result->role);die();
            if ($result == 1 || $result == 2)
            {
                $name     = $this->user_model->get_infor_by_email($email);
                $username = $name['name'];
                $userdata = array(
                    'is_login' => 1,
                    'email' => $email,
                    'name' => $username
                );
                $this->session->set_userdata('userInfor', $userdata);
                redirect('admin/home/index');
            }
        }
        $this->load->view('site/layout', $data);
    }

    public function register()
    {
        $data = array();
        if ($this->input->post()) //kiểm tra xem đã submit hay chưa
        {
            $this->form_validation->set_rules('username', 'Họ và tên', 'required|min_length[6]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', ' Mật khẩu', 'required|min_length[6]|matches[passwordAgain]');
            $this->form_validation->set_rules('passwordAgain', 'Nhập lại mật khẩu', 'required|min_length[6]');
            if ($this->form_validation->run())
            {
                $username = $this->input->post('username');
                $email    = $this->input->post('email');
                $password = $this->input->post('password');
                $result   = $this->user_model->check_email($email);
                if ($result == 0)
                {
                    $user = array(
                        'name' => $username,
                        'email' => $email,
                        'password' => md5($password),
                        'status' => 3
                    );
                    $this->user_model->add_user($user);
//                    $this->db->insert('users', $user);
                    redirect();
                }
            }
        }
        $data['temp'] = 'site/users/register';
        $this->load->view('site/layout', $data);
    }
    public function infor()
    {
        $data         = array();
        $data['temp'] = 'site/users/infor';
        $this->load->view('site/layout', $data);
    }
    public function logout()
    {
        $this->session->unset_userdata('userInfor');
        redirect();
    }
}

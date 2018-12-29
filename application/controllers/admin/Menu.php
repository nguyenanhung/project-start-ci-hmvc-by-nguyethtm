<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Welcome
 * Date: 5/23/2018
 * Time: 9:47 AM
 */

class Menu extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	function index()
	{
		$data = array();
		$data['temp'] = 'admin/menu/index';
		$theloais = $this->menu_model->get_list_theloai();
		$data['theloais'] = $theloais;
		$this->load->view('admin/layout',$data);
	}
	function edit_theloai()
	{
		$data = array();
		//$this->load->helper('form');
		$tenkhongdau = $this->uri->segment(4);
		$theloai = $this->menu_model->get_theloai($tenkhongdau);
		$mota = $this->input->post('desc');
		$trangthai = $this->input->post('status');
		$theloai = array(
			'Mota' => $mota,
			'Trangthai' => $trangthai,
			'updated_at' => time()
		);
		$this->menu_model->update_menu($tenkhongdau,$theloai);
//		$this->db->where("TenKhongDau",$tenkhongdau);
//		$query = $this->db->update("theloai",$data);
		$data['theloai'] = $theloai;
		$data['temp'] = 'admin/menu/edit_theloai';
		$this->load->view('admin/layout',$data);


	}
	function delete_theloai()
	{
		$data = array();

		$tenkhongdau = $this->uri->segment(4);
		$data = array(
			'Trangthai' => $tenkhongdau,
		);
		$this->menu_model->delete_theloai($tenkhongdau,$data);
		$data['temp'] = 'admin/menu/delete_theloai';
		$this->load->view('admin/layout',$data);
	}
	function add_theloai()
	{
		$data = array();
		//$this->load->library('form_validation');
		//$this->load->helper('form');

		$this->form_validation->set_rules('title','Tiêu đề','required');
		$this->form_validation->set_rules('slug','Tên không dấu','required');
		if($this->form_validation->run()) {
			$title = $this->input->post('title');
			$slug = $this->input->post('slug');
			$desc = $this->input->post('desc');
			$status = $this->input->post('status');
			$result = $this->menu_model->check_theloai($title);
			if ($result == 0) {
				$theloai = array(
					'ten'=>$title,
					'TenKhongDau' =>$slug,
					'Mota' => $desc,
					'Trangthai' => $status,
					'created_at'=> time()
				);
				$this->menu_model->add_menu($theloai);
//				$this->db->insert('theloai',$theloai);
				redirect('admin/menu/index');
			}else{
				$this->form_validation->set_message(__FUNCTION__, 'Tên thể loại đã tồn tại');
			}
		}
		$data['temp'] = 'admin/menu/add_theloai';
		$this->load->view('admin/layout',$data);
	}
}

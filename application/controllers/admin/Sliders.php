<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Welcome
 * Date: 5/26/2018
 * Time: 9:18 AM
 */

class Sliders extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Slide_model');


	}

	function index()
	{
		$data = array();
		//lấy thông tin từ trên url xuống
		$page = $this->uri->segment(5);
		if ($page == '') {
			$page = 1;
		} else {
			$page = $page;
		}
		$num_per_page = 10;
		//lay so bai viet thuoc loại tin
		$total_row = $this->Slide_model->get_total();
		$num_page = ceil($total_row / $num_per_page);
		$start = ($page - 1) * $num_per_page;
		// //THanh phân trang
		$base_url_pagging = base_url("admin/sliders/index");
		$html_pagging = $this->Slide_model->create_pagging($num_page, $base_url_pagging, $page);
		$lst_slide = $this->Slide_model->get_all_slide($start, $num_per_page);
		$data['page'] = $page;
		$data['total_row'] = $total_row;
		$data['lst_slide'] = $lst_slide;
		$data['html_pagging'] = $html_pagging;
		$data['page'] = $page;
		$data['temp'] = 'admin/slider/index';
		$this->load->view('admin/layout', $data);
	}

	function delete_slide()
	{
		$data = array();
		$idSlide = $this->uri->segment(4);
		$slide = array(
			'status' => 0,
		);
		$this->slide_model->delete_slide($idSlide,$slide);
//		$this->db->where("id", $idSlide);
//		$query = $this->db->update("slide", $data);
		$data['idSlide'] = $idSlide;
		$data['temp'] = 'admin/slider/delete_slide';
		$this->load->view('admin/layout', $data);
	}

	function edit_slide()
	{
		$data = array();
		$idSlide = $this->uri->segment(4);
		$slide = $this->Slide_model->get_slide($idSlide);
		$status = $this->input->post('status');
		$slide = array(
			'status' => $status,
		);
		$this->slide_model->update_slide($idSlide,$slide);
//		$this->db->where("id", $idSlide);
//		$query = $this->db->update("slide", $data);
		$data['slide'] = $slide;

		$data['temp'] = 'admin/slider/edit_slide';
		$this->load->view('admin/layout', $data);
	}

	function add_slide()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$data = array();
		$this->form_validation->set_rules('title','Tiêu đề','required');
		$this->form_validation->set_rules('slug','Tên không dấu','required');

		if($this->form_validation->run()) {
			$title = $this->input->post('title');
			$slug = $this->input->post('slug');
			$img = $this->input->post('userfile');
			$status = $this->input->post('status');
				$slide = array(
					'Ten'=>$title,
					'link' =>$slug,
					'status' => $status,
					'Hinh' =>$img,
					'created_at'=> time(),
				);
				$this->slide_model->add_slide($slide);
//				$this->db->insert('slide',$slide);
				redirect('admin/sliders/index');
		}
		$data['temp'] = 'admin/slider/add_slide';
		$this->load->view('admin/layout',$data);
	}
}

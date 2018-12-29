<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Welcome
 * Date: 5/23/2018
 * Time: 8:40 AM
 */

class Home extends  CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
		$this->load->library('pagination');
		$this->load->library('upload');
	}

	function index()
	{
		$data = array();
		$loaitins = $this->post_model->get_all_loaitin();
		//lấy thông tin từ trên url xuống
//
		$page = $this->uri->segment(5);
		if($page == ''){ $page =1; }else{ $page = $page; }

		$num_per_page = 10;
		//lay so bai viet thuoc loại tin
		$total_row = $this->post_model->get_total_tintuc();
		//$total_row = $total_row->total;
		$num_page = ceil($total_row / $num_per_page);
		$start = ($page - 1) * $num_per_page;
		// //THanh phân trang
		$base_url_pagging = base_url("admin/home/index");
		$html_pagging = $this->post_model->create_pagging($num_page, $base_url_pagging, $page);
		//$data['title'] = $title;
		$tintucs= $this->post_model->get_all_post($start,$num_per_page); //lấy da danh sách các bài viết
		$data['total_row'] = $total_row;
		$data['tintucs'] = $tintucs;
		$data['html_pagging'] = $html_pagging;
		$data['loaitins'] = $loaitins;
		$data['temp'] = 'admin/home/index';
		$this->load->view('admin/layout',$data);
	}
	function add_post()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data = array();
		$theloai = $this->post_model->get_list_theloai();
		$data['theloais'] = $theloai;
		$this->form_validation->set_rules('title','Tiêu đề','required');
		$this->form_validation->set_rules('slug','Tên không dấu','required');
		$this->form_validation->set_rules('parent-Cat','Thể loại','required');
        $this->form_validation->set_rules('content','Nội dung','required');
		if($this->form_validation->run()) {
			$title = $this->input->post('title');
			$slug = $this->input->post('slug');
			$desc = $this->input->post('desc');
			$content = $this->input->post('content');
			$img = $this->input->post('userfile');
			$parent_id = $this->input->post('parent-Cat');
			$status = $this->input->post('status');
			$result = $this->post_model->check_loaitin($title);
			if ($result == 0) {
				$tintuc = array(
					'TieuDe'=>$title,
					'TieuDeKhongDau' =>$slug,
					'idLoaiTin' =>$parent_id,
					'Hinh'=>$img,
					'TomTat' =>$desc,
					'NoiDung' => $content,
					'Trangthai' => $status,
					'created_at'=> time(),
				);
				$this->post_model->add_post($tintuc);
//				$this->db->insert('tintuc',$tintuc);
				redirect('admin/home/index');
			}else{
				$this->form_validation->set_message(__FUNCTION__, 'Tên loại tin đã tồn tại');
			}
		}
		$data['temp'] = 'admin/home/add_post';
		$this->load->view('admin/layout',$data);
	}
	function edit_post()
	{
		$data = array();
		$this->load->helper('form');
		$tenkhongdau = $this->uri->segment(4);
		$tintuc= $this->post_model->get_tintuc($tenkhongdau);
		$parent_id = $this->input->post('parent-Cat');
		//$theloai = $this->post_model->get_all_theloai();
		$loaitin = $this->post_model->get_all_loaitin();
		$noibat = $this->input->post('famous');
		$trangthai = $this->input->post('status');
		$data = array(
			'NoiBat'=>$noibat,
			'Trangthai' => $trangthai,
			'updated_at' => time()
		);
		$this->post_model->update_post($tenkhongdau,$data);
//		$this->db->where("TieuDeKhongDau",$tenkhongdau);
//		$query = $this->db->update("tintuc",$data);
		$data['tenkhongdau'] = $tenkhongdau;
		$data['tintuc'] = $tintuc;
		$data['loaitin'] = $loaitin;
		$data['temp'] = 'admin/home/edit_post';
		$this->load->view('admin/layout',$data);
	}
	function delete_post()
	{
		$data = array();

		$tenkhongdau = $this->uri->segment(4);
		$post = array(
			'Trangthai' => $tenkhongdau,
		);
		$this->post_model->delete_post($tenkhongdau,$post);
//		$this->db->where("TieuDeKhongDau",$tenkhongdau);
//		$query = $this->db->update("tintuc",$data);
		$data['temp'] = 'admin/home/delete_post';
		$this->load->view('admin/layout',$data);
	}

	function category()
	{
		$data = array();
		$theloai = $this->post_model->get_all_theloai();
		$config['base_url'] =base_url('admin/home/category');
		$config['per_page'] = 10;
		$config['total_rows'] = $this->post_model->get_total();
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#"';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tagl_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tagl_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item disabled">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tagl_close'] = '</a></li>';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config); // model function
		$data['results'] = $this->post_model->get_current_page_records($config['per_page'], $this->uri->segment(3)); //
		$data['links'] = $this->pagination->create_links();
		$data['theloais'] = $theloai;
		$data['temp'] = 'admin/home/category';
		$this->load->view('admin/layout',$data);
	}

	function add_category()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');


		$data = array();
		$data['theloai'] = $this->post_model->get_list_theloai();

		$this->form_validation->set_rules('title','Tiêu đề','required');
		$this->form_validation->set_rules('slug','Tên không dấu','required');
		$this->form_validation->set_rules('parent-Cat','Thể loại','required');
		if($this->form_validation->run()) {
			$title = $this->input->post('title');
			$slug = $this->input->post('slug');
//			$desc = $this->input->post('desc');
			$parent_id = $this->input->post('parent-Cat');
			$status = $this->input->post('status');
			$result = $this->post_model->check_loaitin($title);
			if ($result == 0) {
				$loaitin = array(
					'ten'=>$title,
					'TenKhongDau' =>$slug,
					'Trangthai' => $status,
					'created_at'=> time(),
					'idTheLoai' =>$parent_id
				);
				$this->post_model->add_category($loaitin);
				redirect('admin/home/category');
			}else{
				$this->form_validation->set_message(__FUNCTION__, 'Tên loại tin đã tồn tại');
			}
		}
		$data['temp'] = 'admin/home/add_category';
		$this->load->view('admin/layout',$data);
	}
	function delete_category()
	{
		$data = array();

		$tenkhongdau = $this->uri->segment(4);
		$category = array(
			'Trangthai' => $tenkhongdau,
		);
		$this->post_model->delete_category($tenkhongdau,$category);
//		$this->db->where("TenKhongDau",$tenkhongdau);
//		$query = $this->db->update("loaitin",$data);
		$data['temp'] = 'admin/home/delete_category';
		$this->load->view('admin/layout',$data);
	}
	function edit_category()
	{
		$data = array();
		$this->load->helper('form');
		$tenkhongdau = $this->uri->segment(4);
		$loaitin = $this->post_model->get_loaitin($tenkhongdau);
		$parent_id = $this->input->post('parent-Cat');
		$theloai = $this->post_model->get_all_theloai();
		$trangthai = $this->input->post('status');
		$category = array(
			'Trangthai' => $trangthai,
			'updated_at' => time()
		);
		$this->post_model->update_category($tenkhongdau,$category);
//		$this->db->where("TenKhongDau",$tenkhongdau);
//		$query = $this->db->update("loaitin",$data);
		$data['loaitin'] = $loaitin;
		$data['theloai'] = $theloai;
		$data['temp'] = 'admin/home/edit_category';
		$this->load->view('admin/layout',$data);
	}

}

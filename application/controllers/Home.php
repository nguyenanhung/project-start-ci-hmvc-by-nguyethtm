<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Home_model');
        // Đáng lẽ ra phải là như thế này:
        $this->load->model('home_model');
    }
    /**
     * Trang chủ
     */
    public function index()
    {
        $data          = array();
        $data['temp']  = 'site/home/index';
        $data['slide'] = $this->home_model->get_slide(); // Có thể khai báo thẳng luôn
        $data['menu']  = $this->home_model->get_menu();
        $this->load->view('site/layout', $data);
    }
    /**
     * Trang danh mục
     */
    public function category()
    {
        $data         = array();
        // $data['temp'] = 'site/home/category';
        $data['temp'] = 'site/home/category';
        $data['menu'] = $this->home_model->get_menu();
        //lấy thông tin từ trên url xuống
        $theloai      = $this->uri->segment(3);
        $loaitin      = $this->uri->segment(4);
        $page         = $this->uri->segment(6);
        if (empty($page))
        {
            // Đoạn này nên sử dụng Empty để check
            $page = 1;
        }
        $idLoaitin            = array();
        $idLoaitin            = $this->home_model->get_id_by_name($loaitin);
        $title                = $idLoaitin->Ten;
        $idLoaitin            = $idLoaitin->id;
        //$tintuc = $this->home_model->get_tintuc_by_loaitin($idLoaitin);
        $num_per_page         = 6;
        //lay so bai viet thuoc loại tin
        $total_row            = $this->home_model->get_total($idLoaitin);
        $total_row            = $total_row->total;
        $num_page             = ceil($total_row / $num_per_page);
        $start                = ($page - 1) * $num_per_page;
        // //THanh phân trang
        $base_url_pagging     = base_url("home/category/") . $theloai . "/" . $loaitin;
        $html_pagging         = $this->home_model->create_pagging($num_page, $base_url_pagging, $page);
        $data['title']        = $title;
        $data['total_row']    = $total_row;
        $data['lst_category'] = $this->home_model->get_tintuc_by_loaitin($idLoaitin, $start, $num_per_page);
        $data['html_pagging'] = $html_pagging;
        $this->load->view('site/layout', $data);
    }
    /**
     * Trang chi tiết
     */
    public function detail()
    {
        $data                   = array();
        $data['temp']           = 'site/home/detail';
        $loaitin                = $this->uri->segment(3); // Đoạn này code tạm test thì được, chạy thực nảy sinh lỗi bảo mật do ko xử lý string truyền vào
        $tieudekhongdau         = $this->uri->segment(4);
        $idLoaitin              = $this->home_model->get_id_by_name($loaitin);
        $idLoaitin              = $idLoaitin->id; //id loai tin.
        //lấy id của bài đăng
        $idtintuc               = $this->home_model->get_idtintuc_by_name($tieudekhongdau);
        $idtintuc               = $idtintuc->id; //id tin tức
        $data['tintuc']         = $this->home_model->get_detail_by_name($tieudekhongdau);
        $data['tintucnoibat']   = $this->home_model->get_tintucnoibat($idLoaitin); //lấy các tin tức nổi bật
        $data['tintuclienquan'] = $this->home_model->get_tintuclienquan($idLoaitin); //lấy các tin tức liên quan
        $data['comment']        = $this->home_model->get_comment($idtintuc); //lấy bình luận trong bài viết
        $this->load->view('site/layout', $data);
    }
    //comment
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class Home_model
 * Nguyên tắc code OPP là phải quy định thuộc tính truy cập (public, private, protected) cho thuộc tính (method, function)
 */
class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_slide()
    {
        $sql   = "select * from slide where slide.status = '1'";
        $query = $this->db->query($sql);
        return $query->result();
        //		$this->db->select('*');
        //		$this->db->where('status',1);
        //        $this->db->limit(3);
        //        $query=$this->db->get("slide");
        //        return $query->result();
    }
    public function get_menu()
    {
        $sql   = "SELECT theloai.id as id_theloai, theloai.Ten, theloai.TenKhongDau, GROUP_CONCAT( DISTINCT loaitin.id,':',loaitin.Ten,':',loaitin.TenKhongDau)AS 'Loaitin', tintuc.id AS 'idtintuc',tintuc.TieuDe as 'tieude', tintuc.TieuDeKhongDau as 'tieudekhongdau', tintuc.TomTat as 'noidungtomtat', tintuc.Hinh as 'hinhanh' from (theloai JOIN loaitin ON theloai.id = loaitin.idTheLoai)JOIN tintuc on tintuc.idLoaiTin = loaitin.id GROUP BY theloai.id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    //lấy mã loại tin theo tên không dấu
    public function get_id_by_name($loaitin)
    {
        $sql   = "select * from loaitin where loaitin.TenKhongDau = '{$loaitin}'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    //lấy danh sách bài đăng theo loại tin
    public function get_tintuc_by_loaitin($idloaitin, $start, $limit)
    {
        $sql   = "SELECT * FROM `tintuc` INNER JOIN loaitin on tintuc.idLoaiTin = loaitin.id WHERE loaitin.id = $idloaitin LIMIT $start,$limit";
        $query = $this->db->query($sql);
        return $query->result();
    }
    //lấy tổng số bài viết theo loại tin
    public function get_total($idloaitin)
    {
        $sql   = "select count(*) as total from tintuc where tintuc.idLoaitin = {$idloaitin}";
        $query = $this->db->query($sql);
        return $query->row();
    }
    //tạo thanh phân trang
    public function create_pagging($num_page = 0, $base_url_pagging = "", $current_page)
    {
        $pagging = "<ul class=\"pagination\">" . "<li><a href='#'>&laquo;</a></li>";
        for ($i = 1; $i <= $num_page; $i++)
        {
            $class_active = "";
            if ($current_page == $i)
            {
                $class_active = "class = 'active'";
            }
            $pagging .= " <li {$class_active}><a href='{$base_url_pagging}/page/{$i}'>{$i}</a></li>";
        }
        $pagging .= " <li><a href='#''>&raquo;</a></li></ul>";
        return $pagging;
    }
    //trang chi tiết
    public function get_detail_by_name($tenkhaudau)
    {
        $sql   = "select * from tintuc where TieuDeKhongDau = '{$tenkhaudau}'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    public function get_tintucnoibat($idloaitin)
    {
        $sql   = "SELECT * FROM `tintuc` INNER JOIN loaitin on tintuc.idLoaiTin = loaitin.id WHERE loaitin.id = $idloaitin & tintuc.NoiBat = 1 LIMIT 0,4";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_tintuclienquan($idloaitin)
    {
        $sql   = "SELECT * FROM `tintuc` INNER JOIN loaitin on tintuc.idLoaiTin = loaitin.id WHERE loaitin.id = $idloaitin  LIMIT 0,4";
        $query = $this->db->query($sql);
        return $query->result();
    }
    //lấy id của tin tức theo tiêu đề không dấu
    public function get_idtintuc_by_name($tieudekhongdau)
    {
        $sql   = "select * from tintuc where tintuc.TieuDeKhongDau = {$tieudekhongdau}";
        $query = $this->db->get('tintuc');
        return $query->row();
    }
    public function get_comment($idtintuc)
    {
        $sql   = "select comment.* from comment join tintuc on comment.idTinTuc = tintuc.id where comment.idTinTuc = {$idtintuc}";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
// Với những file đơn thuần chỉ có PHP thì không cần dấu đóng tag php

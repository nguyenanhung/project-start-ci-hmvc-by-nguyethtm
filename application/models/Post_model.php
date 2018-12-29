<?php

class Post_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_list_category()
    {
        $this->db->select('*');
        $query = $this->db->get('loaitin');
        return $query->result();
    }

    public function get_total()
    {
        return $this->db->count_all("loaitin");
    }

    public function get_total_tintuc()
    {
        return $this->db->count_all("tintuc");
    }

    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("loaitin");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //lấy ra tất cả các trạng thái bao gồm cả ngưng hoạt động
    public function get_all_theloai()
    {
        $this->db->select('*');
        //$this->db->where('Trangthai','1');
        $query = $this->db->get('theloai');
        return $query->result();
    }

    //lấy ra các thể loại có trạng thái hoạt động
    public function get_list_theloai()
    {
        $this->db->select('*');
        $this->db->where('Trangthai', '1');
        $query = $this->db->get('theloai');
        return $query->result();
    }

    public function check_loaitin($loaitin)
    {
        $this->db->select('*');
        $this->db->where('Ten', $loaitin);
        $query = $this->db->get('loaitin');
        return $query->num_rows();
    }

    public function get_loaitin($tenkhongdau)
    {
        $this->db->select('*');
        $this->db->where('tenkhongdau', $tenkhongdau);
        $query = $this->db->get('loaitin');
        return $query->row();
    }

    public function get_theloai_by_id($idtheloai)
    {
        $this->db->select('*');
        $this->db->where('id', $idtheloai);
        $query = $this->db->get('theloai');
        return $query->row();
    }

    //lấy ra tất cả các bài viết
    public function get_all_post($start, $limit)
    {
        $sql = "select * from tintuc limit {$start},{$limit}";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create_pagging($num_page = 0, $base_url_pagging = "", $current_page)
    {
        $pagging = "<ul id=\"list-paging\" class=\"fl-right\">";
        for ($i = 1; $i <= $num_page; $i++) {
            $class_active = "";
            if ($current_page == $i) {
                $class_active = "class = 'active'";
            }
            $pagging .= " <li {$class_active}><a href='{$base_url_pagging}/page/{$i}'>{$i}</a></li>";
        }
        $pagging .= "</ul>";
        return $pagging;
    }

    public function get_all_loaitin()
    {
        $this->db->select('*');
        //$this->db->where('Trangthai','1');
        $query = $this->db->get('loaitin');
        return $query->result();
    }

    public function get_tintuc($tieudekhongdau)
    {
        $this->db->select('*');
        $this->db->where('TieuDeKhongDau', $tieudekhongdau);
        $query = $this->db->get('tintuc');
        return $query->row();
    }

    public function add_category($data = array())
    {
        $this->db->insert('loaitin', $data);
    }

    public function add_post($data = array())
    {
        $this->db->insert('tintuc', $data);
    }

    public function update_post($id, $data)
    {
        $this->db->where("TieuDeKhongDau", $id);
        $this->db->update("tintuc", $data);
    }

    public function update_category($slug, $data)
    {
        $this->db->where("TenKhongDau", $slug);
        $this->db->update("loaitin", $data);
    }

    public function delete_post($tieudekhongdau,$data)
    {
        $this->db->where("TieuDeKhongDau",$tieudekhongdau);
        $query = $this->db->update("tintuc",$data);
    }
    public function delete_category($slug,$data)
    {
        $this->db->where("TenKhongDau",$slug);
        $query = $this->db->update("loaitin",$data);
    }
}

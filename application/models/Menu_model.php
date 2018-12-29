<?php
/**
 * Created by PhpStorm.
 * User: Welcome
 * Date: 5/23/2018
 * Time: 10:31 AM
 */
class Menu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_list_theloai()
    {
        $this->db->select('*');
        $query = $this->db->get("theloai");
        return $query->result();
    }
    public function get_theloai($tenkhongdau)
    {
        $this->db->select('*');
        $this->db->where('TenKhongDau', $tenkhongdau);
        $query = $this->db->get('theloai');
        return $query->row();
    }
    public function check_theloai($theloai)
    {
        $this->db->select('*');
        $this->db->where('Ten', $theloai);
        $query = $this->db->get('theloai');
        return $query->num_rows();
    }
    public function update_menu($slug,$data)
    {
        $this->db->where("TenKhongDau",$slug);
        $this->db->update("theloai",$data);
    }
    public function delete_menu($slug,$data)
    {
        $this->db->where("TenKhongDau",$slug);
        $query = $this->db->update("theloai",$data);
    }
    public function add_menu($data)
    {
        $this->db->insert('theloai',$data);
    }
}

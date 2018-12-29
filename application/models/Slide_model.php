<?php
/**
 * Created by PhpStorm.
 * User: Welcome
 * Date: 5/26/2018
 * Time: 9:20 AM
 */
class Slide_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_slide($start, $limit)
    {
        $sql   = "select * from slide limit {$start},{$limit}";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_total()
    {
        return $this->db->count_all('slide');
    }
    public function create_pagging($num_page = 0, $base_url_pagging = "", $current_page)
    {
        $pagging = "<ul id=\"list-paging\" class=\"fl-right\">";
        for ($i = 1; $i <= $num_page; $i++)
        {
            $class_active = "";
            if ($current_page == $i)
            {
                $class_active = "class = 'active'";
            }
            $pagging .= " <li {$class_active}><a href='{$base_url_pagging}/page/{$i}'>{$i}</a></li>";
        }
        $pagging .= "</ul>";
        return $pagging;
    }
    public function get_slide($idSlide)
    {
        $this->db->select('*');
        $this->db->where('id', $idSlide);
        $query = $this->db->get('slide');
        return $query->row();
    }
    public function add_slide($data)
    {
        $this->db->insert($data);
    }
    public function update_slide($id,$data)
    {
        $this->db->where("id", $id);
        $this->db->update("slide", $data);
    }
    public function delete_slide($id,$data)
    {
        $this->db->where("id", $id);
        $this->db->update("slide", $data);
    }
}

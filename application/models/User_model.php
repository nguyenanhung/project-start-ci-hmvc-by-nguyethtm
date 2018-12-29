<?php
/**
 *
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_list_user($start, $limit)
    {
        //		$this->db->select('*');
        //		$this->db->limit($start,$limit);
        //        $query=$this->db->get("users");
        //        return $query->result();
        $sql   = "select * from users limit {$start},{$limit}";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function checkLogin($email, $password)
    {
        $this->db->select('*');
        $where = array(
            'email' => $email,
            'password' => $password
        );
        $this->db->where($where);
        $query = $this->db->get("users");
        return $query->row();
//        if ($query->num_rows() > 0)
//        {
//            return $query->result
//        }
//        return false;
    }
    public function get_infor_by_email($email)
    {
        $this->db->select('*');
        //$where = array('email'=>$email)
        $this->db->where("email", "$email");
        $query = $this->db->get('users');
        return $query->result();
    }
    public function get_infor($idUser)
    {
        $this->db->select('*');
        $this->db->where('id', $idUser);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function get_total()
    {
        return $this->db->count_all('users');
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
    public function check_password($password, $re_password)
    {
        if ($password == $re_password)
            return true;
        return false;
    }
    public function check_email($email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows();
    }
    public function add_user($data = array())
    {
        $this->db->insert('users',$data);
    }
    public function update_user($id,$data)
    {
        $this->db->where("id",$id);
        $query = $this->db->update("users",$data);
    }
    public function delete_user($id,$data)
    {
        $this->db->where("id",$id);
        $query = $this->db->update("users",$data);
    }


}

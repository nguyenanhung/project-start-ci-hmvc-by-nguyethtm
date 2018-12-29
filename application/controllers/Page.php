<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }
    public function about()
    {
        $data          = array();
        $data['temp']  = 'site/page/about';
        $data['slide'] = $this->home_model->get_slide();
        $data['menu']  = $this->home_model->get_menu();
        $this->load->view('site/layout', $data);
    }
    public function contact()
    {
        $data          = array();
        $data['slide'] = $this->home_model->get_slide();
        $data['menu']  = $this->home_model->get_menu();
        $data['temp']  = 'site/page/contact';
        $this->load->view('site/layout', $data);
    }
}

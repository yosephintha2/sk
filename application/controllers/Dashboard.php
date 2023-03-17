<?php

/* * ***
 * Version: 1.0.0
 *
 * Description of Auth Controller
 *
 * @author CodersMag Team
 *
 * @email  info@codersmag.com
 *
 * *** */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model('Auth_model', 'auth');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['title'] = "Registration - CodersMag";
        $this->load->view('dashboard', $data);
    }

    public function datatabel(){
        $data['title'] = "Registration - CodersMag";
        $this->load->view('tabel', $data);
    }

    public function login(){
        $data['title'] = "Registration - CodersMag";
        $this->load->view('login', $data);
    }

    public function forgot_password(){
        $data['title'] = "Registration - CodersMag";
        $this->load->view('forgot_password', $data);
    }

    public function page(){
        $data['title'] = "Registration - CodersMag";
        $this->load->view('page', $data);
    }

    public function pdf_viewer(){
        $data['title'] = "Registration - CodersMag";
        $this->load->view('pdf_viewer', $data);
    }
}
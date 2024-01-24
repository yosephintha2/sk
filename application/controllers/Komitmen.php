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

class Komitmen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model('Auth_model', 'auth');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['title'] = "";
        $data['page'] = "index";
        $this->load->view('komitmen/index', $data);
    }

    public function home(){
        $data['title'] = "";
        $data['page'] = "index";
        $this->load->view('komitmen/home', $data);
    }

    public function datatabel(){
        $data['title'] = "Registration - CodersMag";
        $data['subtitle'] = '';
        $data['page'] = '';
        $this->load->view('tabel', $data);
    }

    public function login(){
        $data['title'] = "Registration - CodersMag";
        $this->load->view('login', $data);
    }

    public function page(){
        $data['title'] = "Registration - CodersMag";
        $data['subtitle'] = "";
        $data['page'] = "";
        $this->load->view('page', $data);
    }
}
<?php
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Users_Model");
    }

    public function index()
    {
        $this->load->view("Login_v");   
    }

    public function CheckUser()
    {
        $this->load->library("session");

        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $user = $this->Users_Model->check_login($email, $password);

        if($user)
        {
            $this->session->set_userdata("user", $user);
            redirect(base_url("Users"));
        }
        else
        {
            $this->session->set_flashdata("error", "Kullanıcı Bulunamadı");
            redirect(base_url("Login"));
        }
    }








}






?>
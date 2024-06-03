<?php

class Users extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Users_Model");
    }

    public function index()
    {
        $users = $this->Users_Model->getAll();
        $viewData = new stdClass();
        $viewData->users = $users;
        $this->load->view("Users_v", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("name", "İsim", "required|trim");
        $this->form_validation->set_rules("surname", "Soyisim", "required|trim");
        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|is_unique[users.email]|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field} alanı boş kalamaz</b>",
                "is_unique" => "<b>{field} daha önce kullanılmış</b>",
                "valid_email" => "<b>{field} geçersiz formattadır</b>"
            )
        );

        $validate = $this->form_validation->run();

        if($validate)
        {
            $insert = $this->Users_Model->add(
                array(
                    "name" => $this->input->post("name"),
                    "surname" => $this->input->post("surname"),
                    "password" => md5($this->input->post("password")),
                    "email" => $this->input->post("email"),
                    "is_active" => 1
                )
            );
            if ($insert) {
                echo "Kayıt işlemi başarılı";
            }
            else
            {
                echo "Veriler veritabanına aktarılamadı";
            }
        }
        else
        {
            $users = $this->Users_Model->getAll();
            $viewData = new stdClass();
            $viewData->form_error=true;
            $viewData->users = $users;
            $this->load->view("Users_v", $viewData);
        }
    }
	
	public function delete($id){
		$data = array(
			"id" => $id
	   );
	
		$this->Users_Model->delete(
		   $data
		);
	
		redirect(base_url("Users"));
	}
}

?>

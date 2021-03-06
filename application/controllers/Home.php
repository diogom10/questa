<?php

class Home extends CI_Controller {

    public function __construct() {

        parent:: __construct();
        $this->load->library('session');
        $this->load->model('Home_model', 'model', TRUE);
        $this->load->helper('url');
    }

    public function index() {
        $user = $this->model->get_usuario($this->session->userdata('id_user'));
        $data['nome'] = $user['nome'];
        $data['email'] = $user['email'];
        $data['data_nascimento'] = $this->dataLogin($user['data_nascimento']);
        $data['title'] = "Sigere";
        $this->load->view('templates/energia_angular/home_view.php', $data);
    }

    public function sair() {

        if ($this->input->POST('login')) {
            $data = array("nome_de_usuario", "email", "logged_in");
            $this->session->unset_userdata($data);
            $retorno['sucess'] = true;
        }
        echo json_encode($retorno);
    }

    public function get_usuarios() {

        $params = $this->input->post();

        if ($params['valido'] == 1) {
            $retorno['sucess'] = true;
            $retorno["usuarios"] = $this->model->get_all_usuario();
        } else {
            $retorno['sucess'] = false;
        }

        echo json_encode($retorno);
    }

    public function dataLogin($data) {
        $datas = explode('-', $data);
        $dia = $datas[2];
        $mes = $datas[1];
        $ano = $datas[0];
        return  $dia.'/'.$mes.'/'.$ano;
       
    }

}

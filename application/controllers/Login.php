<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent:: __construct();
        $this->load->library('session');
        $this->load->model('Login_model', 'model', TRUE);
        $this->load->helper('url');
    }

    public function index() {

        $this->load->helper('form');
        $data['title'] = "Questa Teste";
        $this->load->view('templates/energia_angular/login_view.php', $data);
    }

    public function validador_cadastro() {

        $params = $this->input->post();
      
        $dados_cadastro = array(
            "nome" => $params["nome"],
            "email" => $params["email"],
            "senha" => md5($params["senha"] . HASH),
            "cpf" => $params["cpf"],
            "data_nascimento" => $params["data"],
            "foto" => "assets/images/user/default.jpg"
        );

        $retorno_cadastro = [];
        //var_dump($dados_cadastro) . die;

        $valida_email = $this->model->valida_email($dados_cadastro["email"]);
        $valida_cpf = $this->model->valida_cpf($dados_cadastro["cpf"]);
        if ($valida_email == 0 && $valida_cpf == 0) {
            $this->cadastrar($dados_cadastro);
            $retorno_cadastro['existe_erro'] = false;
        }
        if ($valida_email == 1) {
            $retorno_cadastro['existe_erro'] = true;
            $retorno_cadastro['mensagem_email'] = "*Ja Existe um usuario com Esse Email";
        }
        if ($valida_cpf == 1) {
            $retorno_cadastro['existe_erro'] = true;
            $retorno_cadastro['mensagem_cpf'] = "*Ja Existe um usuario com Esse CPF";
        }

        echo json_encode($retorno_cadastro);
    }

    public function cadastrar($dados) {

        $this->model->inserir($dados);
    }

    public function validador_login() {

        $dados_login = array(
            "email" => $this->input->Post("email_login"),
            "senha" => md5($this->input->Post("pwd_login") . HASH),
        );


        $retorno_login = [];

        $valida = $this->model->valida_login($dados_login);

        if ($valida['json'] == 0) {
            $retorno_login['existe_erro'] = "email";
            $retorno_login['mensagem'] = "*Email Não Encontrado";
        } else if ($valida['json'] == 1) {
            $retorno_login['existe_erro'] = "senha";
            $retorno_login['mensagem'] = "*Senha Incorreta";
        } else if ($valida['json'] == 2) {

            $retorno_login['existe_erro'] = "valido";
            $retorno_login['mensagem'] = $valida["nome_login"];

            $usuario = explode(' ', $valida["nome_login"]);

            $dados_sessao = array(
                'nome_de_usuario' => $usuario[0] . " " . $usuario[1],
                'email' => $dados_login['email'],
                'logged_in' => true,
                'id_user' => $valida['id_usuario']
            );
            $this->session->set_userdata($dados_sessao);
        } else {
            $dados_sessao = array(
                'nome_de_usuario' => null,
                'email' => null,
                'logged_in' => false
            );

            $this->session->set_userdata($dados_sessao);
        }
        echo json_encode($retorno_login);
    }

}

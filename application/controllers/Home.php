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
        $data['data_nascimento'] = $user['data_nascimento'];
        $data['title'] = "Sigere";
        $this->load->view('templates/energia_angular/home_view.php', $data);
    }

    public function sair() {

        if ($this->input->POST('login')) {
            $data = array("nome_de_usuario", "email", "logged_in");
            $this->session->unset_userdata($data);
            $Retorno_sair = 1;
        }

        echo json_encode($Retorno_sair);
    }

    public function upload() {

        $Retorno_upload = [];
        $validacao = 0;
        $extencao = ["jpg", "jpeg", "tiff", "png"];

        if (!empty($_FILES['file'])) {

            $foto_geral = explode(".", $_FILES['file']['name']);
            $nome = $foto_geral[0];
            $ext_arquivo = $foto_geral[1];

            foreach ($extencao as $ext) {
                if ($ext == $ext_arquivo) {
                    $validacao++;
                }

            }
            if ($validacao > 0) {
                $endereco_final = 'assets/images/user/' . $nome . uniqid() . "." . $ext_arquivo;

                move_uploaded_file($_FILES['file']['tmp_name'], './' . $endereco_final);

                $data_model = array(
                    'id' => $this->session->userdata('id_user'),
                    'foto' => $endereco_final
                );


                $this->model->upload_img($data_model);

                $Retorno_upload['valido'] = TRUE;
                $Retorno_upload['imagem'] = $endereco_final;
            } else {

                $Retorno_upload['valido'] = FALSE;
                $Retorno_upload['erro'] = "*Arquivo Invalido";
            }

            echo json_encode($Retorno_upload);
            }
     
        }
    }



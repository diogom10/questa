<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_model extends CI_Model {

    public function valida_email($dados) {

        $retorno = [];
        $where = array('email' => $dados);
        $this->db->select('email');
        $this->db->where($where);
        $query = $this->db->get('usuario')->result();
        if (count($query) > 0) {
            $retorno['email'] = 1;
        } else {
            $retorno['email'] = 0;
        }
        return $retorno['email'];
    }

    function valida_cpf($dados) {

        $retorno = [];
        $where = array('cpf' => $dados);
        $this->db->select('cpf');
        $this->db->where($where);
        $query = $this->db->get('usuario')->result();
        if (count($query) > 0) {
            $retorno['cpf'] = 1;
        } else {
            $retorno['cpf'] = 0;
        }

        return $retorno['cpf'];
    }

    public function inserir($dados) {
        $this->db->insert('usuario', $dados);
    }

    public function valida_login($dados) {
        $retorno = 0;
        $resposta = array(
            "json" => 0,
            "nome_login" => '',
            'id_usuario' => ''
        );
     
        $this->db->where('email', $dados['email']);
        $query = $this->db->get('usuario')->result();
    
        foreach ($query as $login) {

            if ($login->email == $dados['email']) {
                if ($login->senha == $dados['senha']) {
                    if ($login->permicao == 1) {

                        $resposta["json"] = 3;
                        $resposta["nome_login"] = $login->nome;
                        $resposta["id_usuario"] = $login->id;
                    } else {
                        $resposta["json"] = 2; //usuario não possui permissão
                    }
                } else {
                    $resposta["json"] = 1; //senha incorreta
                }
            } else {
                $resposta["json"] = 0; //email incorreto  
            }
        }


        return $resposta;
    }

}
?>


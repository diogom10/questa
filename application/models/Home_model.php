<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Home_model extends CI_Model {

    public function get_usuario($dados) {
        $retorno = [];
        $this->db->where('id', $dados);
        $query = $this->db->get('usuario')->result();

        foreach ($query as $result) {
            $retorno['nome'] = $result->nome;
            $retorno['email'] = $result->email;
            $retorno['data_nascimento'] = $result->data_nascimento;
        }

        return $retorno;
    }

    /*public function upload_img($data) {
        $this->db->set('foto', $data["foto"]);
        $this->db->where('id', $data["id"]);
        $this->db->update('usuario');
    }*/
     public function get_all_usuario() {
        
        $query = $this->db->get('usuario')->result();
        return $query;
    }

}

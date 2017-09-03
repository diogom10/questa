<!DOCTYPE html>
<html lang="pt-BR" ng-app="questa">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modal/modal_cadastro.css"/>
        <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/angular/angular.js"></script>
<!--        <script src="<?php echo base_url(); ?>assets/js/Back-end/login/questa_login_dados.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/js/Back-end/login/modal/questa_cadastro_dados.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    </head>
    <body ng-controller="telaDeLoginCtrl">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <?php //$this->load->view('templates/energia_angular/modal/cadastro_view.php'); ?>
            <!--            <div class="masc"  ng-click="closeModal()" ng-show="modalMascara"></div>-->
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-top:18%">
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" >
                <div class="entrada" ng-show="mostraLogin">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-left:29%">
                        <span class="txt-title">Seja Bem Vindo</span>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-left:38%">
                        <span class="txt-subtitle">Efetue o login</span>
                    </div>
                    <form name="loginForm">
                        <div class="col-md-11 col-lg-11 col-sm-12 col-xs-12"  style="padding-left:10%">
                            <input class="form-control" name="email" ng-model="login.email" placeholder="Digite seu email" ng-required="true" ng-pattern="/^[A-Za-z0-9_.-]+@[A-Za-z0-9_]+\.[a-z]{2}/" autocomplete="off"/>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"style="padding-top:2%;"></div>
                            <input class="form-control"  name="senha" type="password" ng-model="login.senha" placeholder="Digite sua senha" ng-required="true" autocomplete="off"/>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-left:10%;padding-top:2%;">
                            <button class="col-md-11  col-lg-11 col-sm-12 col-xs-12 btn btn-primary" ng-disabled="loginForm.$invalid" ng-click="validaLogin()">Entrar</button>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-top:1%;"></div>
                        <span class="col-md-5 txt-cadastro" style="padding-left:5%" ng-click="openModal();">Cadastro</span>
                        <span class="col-md-5 txt-cadastro" ng-click="openTabela();">Tabela com Usuarios</span>


                        <div class="alert alert-danger centered" ng-show="loginForm.senha.$error.required && loginForm.senha.$dirty">
                            Campo Senha Vazio
                        </div>
                        <div class="alert alert-danger centered"ng-show="loginForm.email.$error.pattern">
                            Formato de email incorreto
                        </div>
                        <div class="alert alert-danger centered" ng-show="loginForm.email.$error.required && loginForm.email.$dirty">
                            Campo Email Vazio
                        </div>

                        <div class="alert alert-danger centered" ng-show="sisLogin">
                            {{msgSenha}}
                            {{msgEmail}}
                            {{msgPermicao}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="geral_cadastro" ng-show="modalCadastro">
                    <form name="cadastroForm">

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-left:44%;">
                            <span class="txt-title">Cadastre o Usuario</span>
                        </div> 
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <input class="form-control"  name="nome" type="text" ng-model="cadastro.nome" placeholder="Digite sua Nome" ng-required="true"/>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <input class="form-control"  name="email" type="text" ng-model="cadastro.email" placeholder="Digite sua Email" ng-required="true" ng-pattern="/^[A-Za-z0-9_.-]+@[A-Za-z0-9_]+\.[a-z]{2}/"/>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <input class="form-control"  name="data" type="date" ng-model="cadastro.data" placeholder="Digite sua Data de Nascimento" ng-required="true"/>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-top: 1%">
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <input class="form-control"  name="cpf" type="text" ng-model="cadastro.cpf" placeholder="CPF" ng-required="true" ng-pattern="/^[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}/"/>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <input class="form-control"  name="senha" type="password" ng-model="cadastro.senha" placeholder="senha" ng-required="true"/>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <input class="form-control"  name="senha2" type="password" ng-model="cadastro.senha2" placeholder="Confirme a senha"ng-required="true"/>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-top: 3%"></div>
                        <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2"></div>
                        <button class="col-md-4 col-lg-4  col-sm-12 col-xs-12 btn btn-success" ng-disabled="cadastroForm.$invalid" ng-click="cadastroUsuario()">Cadastrar</button>
                        <button class="col-md-4 col-lg-4 col-sm-12 col-xs-12 btn btn-info" ng-click="closeModal()">Voltar</button>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8"  style="padding-left:31%; text-align: center;">

                            <div class="alert alert-danger centered" ng-show="cadastroForm.nome.$error.required && cadastroForm.nome.$dirty">
                                Nome esta Vazio
                            </div>
                            <div class="alert alert-danger centered"ng-show="cadastroForm.email.$error.pattern">
                                Formato de email incorreto
                            </div>
                            <div class="alert alert-danger centered" ng-show="cadastroForm.senha.$error.required && cadastroForm.senha.$dirty">
                                Campo Senha Vazio
                            </div>
                            <div ng-show="cadastroForm.senha2.$error.required && cadastroForm.senha2.$dirty">
                                Campo confirmação de senha Vazio
                            </div>
                            <div ng-show="cadastroForm.cpf.$error.pattern">
                                Formato CPF Invalido
                            </div>
                            <div class="alert alert-danger centered" ng-show="cadastroForm.cpf.$error.required && cadastroForm.cpf.$dirty">
                                Campo CPF Vazio
                            </div>
                            <div class="alert alert-danger centered" ng-show="cadastroForm.data.$error.required && cadastroForm.data.$dirty">
                                Campo data Vazio
                            </div>
                            <div class="alert alert-danger centered" ng-show="sis">
                                {{msgCpf}}
                                {{msgEmail}}
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div ng-show="mostraTabela">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <button class="btn btn-info" ng-click="closeTabela()">Voltar</button>
                    <button class="btn btn-danger"  ng-show="massa" ng-click="excluirUsuario(null)">Excluir massa</button>
                </div>
                <table style="width:100%" class="table table-bordered" >
                    <tr>
                        <th><input type="checkbox" ng-model="seleciona" ng-click="armazenaTodosID(seleciona)"></th>
                        <th>Nome</th>
                        <th>Email</th> 
                        <th>Data de Nascimento</th>
                        <th>CPF</th>
                        <th width="4%"></th>
                    </tr>
                    <tr ng-class="{'selecionado negrito': seleciona}" ng-repeat="u in usuarios">
                        <td><input type="checkbox" ng-model="seleciona" ng-click="armazenaID(u.id, seleciona)" ng-checked="allchecked"></td>
                        <td>
                            <div ng-bind="u.nome"></div>
                            <div  ng-show="id_click === u.id ? true : false">
                                <input type="text" class="form-control"  ng-model="edit.nome" ng-keyup="editNome(edit.nome)">
                            </div>
                        </td>
                        <td>
                            <div ng-bind="u.email"></div>
                            <div  ng-show="id_click === u.id ? true : false">
                                <input class="form-control"  type="text" ng-model="edit.email" ng-keyup="editEmail(edit.email)">
                            </div>
                        </td> 
                        <td>
                            <div ng-bind="u.data_nascimento"></div>
                            <div  ng-show="id_click === u.id ? true : false">
                                <input class="form-control" type="date" ng-model="edit.data_nascimento" ng-keyup="editData_nascimento(edit.data_nascimento)">
                            </div>
                        </td>
                        <td>
                            <div ng-bind="u.cpf"></div>
                            <div  ng-show="id_click === u.id ? true : false">
                                <input class="form-control" type="text" ng-model="edit.cpf" ng-keyup="editcpf(edit.cpf)">
                            </div>
                        </td>
                        <td>
                            <div ng-show="id_click === u.id ? true : false">
                                <button class="btn btn-info col-md-12" ng-click="editarUsuario(u.id)">Salvar</button>
                            </div>
                            <div ng-show="id_click === u.id ? false : true">
                                <button class="btn btn-info col-md-12" ng-click="editarClick(u.id)">Editar</button>
                            </div>
                            <div ng-show="id_click === u.id ? true : false">
                                <button class="btn btn- col-md-12" ng-click="cancelaEdit()">Cancelar</button>
                            </div>
                            <div ng-show="id_click === u.id ? false : true">
                                <button  class="btn btn-danger col-md-12" ng-click="excluirUsuario(u.id)">Excluir</button
                            </div>


                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"style="padding-bottom:20%"> </div>



    </body>
</html>



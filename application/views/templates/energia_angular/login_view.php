<!DOCTYPE html>
<html lang="pt-BR" ng-app="sigere">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modal/modal_cadastro.css"/>
        <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/angular/angular.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/angular/lib/angular-messages.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/Back-end/login/questa_login_dados.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/Back-end/login/modal/questa_cadastro_dados.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    </head>
    <body ng-controller="telaDeLoginCtrl">

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <?php $this->load->view('templates/energia_angular/modal/cadastro_view.php'); ?>
            <div class="masc"  ng-click="closeModal()" ng-show="modalMascara"></div>

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-top:18%">
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="entrada">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-left:29%">
                        <span class="txt-title">Seja Bem Vindo</span>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-left:38%">
                        <span class="txt-subtitle">Efetue o login</span>
                    </div>
                    <div class="col-md-11 col-lg-11 col-sm-12 col-xs-12"  style="padding-left:10%">
                        <input class="form-control" ng-model="login.email" placeholder="Digite seu email"/>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"style="padding-top:2%;"></div>
                        <input class="form-control" type="password" ng-model="login.senha" placeholder="Digite sua senha"/>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-left:10%;padding-top:2%;">
                        <button class="col-md-11  col-lg-11 col-sm-12 col-xs-12 btn btn-primary">Entrar</button>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"style="padding-top:4%;"></div>


                    <span class="col-md-12 txt-cadastro" ng-click="openModal();">Ainda não é cadastrado</span>

                </div>
            </div>



            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"style="padding-bottom:20%">
            </div>

        </div>


    </body>
</html>



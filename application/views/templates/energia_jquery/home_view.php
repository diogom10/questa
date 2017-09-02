<!DOCTYPE html>
<?php if ($this->session->userdata('logged_in')) {
    ?>
    <html lang="pt-BR">
        <head>
            <title><?php echo $title; ?></title>
            <meta charset="UTF-8" />

            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css"/>
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modal/modal_sair.css"/>
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home.css"/>
            <script  src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <script  src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
            <script  src="<?php echo base_url(); ?>assets/js/sigere_login.js"></script>
            <script  src="<?php echo base_url(); ?>assets/js/sigere_home.js"></script>
        </head>
        <body>
            <div class="masc"></div>
            <div class="header">
                <div class="control-icon-menu">

                    <img class="masc-icon" src="<?php echo base_url(); ?>assets/images/menu.png" />
                    <img class="icon-menu" src="<?php echo base_url(); ?>assets/images/menu.png" />
                </div>
                <div class="title">SIGERE</div>

                <div class="sair">Sair</div>
            </div>
            <?php $this->load->view('templates/energia_jquery/modal/sair_view.php'); ?>
            <div class="aside">
                <div class="control-aside">
                    <div class="header-aside">
                        <div class="control-img-aside">


                            <!--<img class="img-user-aside"  type="" src="<?php echo base_url(); ?>assets/images/user/default.jpg" />-->
                            <img class="img-user-aside" src="<?php echo base_url().$foto ?>" />
                            <div class="text-img-user">Atualizar a Foto</div>
                            <form  method="post" action="some_action" enctype="multipart/form-data">
                                <input id="file" name="file" type="file" class="file" data-show-preview="false">
                            </form>

                        

                        </div>
                        <div class="control-text-aside">
                             <div class="J-text"></div>
                            <div class="text-name-aside"> <?= $this->session->userdata('nome_de_usuario'); ?></div>
                        </div>
                    </div>
                    <div class="section-aside">
                        <div class="control-menu-aside">
                            <div class="menu-aside-geral" id="menu-aside-home">Home</div>
                            <div class="show-drop-luz">
                                <div class="menu-aside-geral" id="menu-aside-luz">Luz</div>
                                <div class="menu-aside-geral" id="menu-aside-controle">Controle</div>
                            </div>
                            <div class="show-drop-energia">
                                <div class="menu-aside-geral" id="menu-aside-energia">Energia</div>
                                <div class="menu-aside-geral" id="menu-aside-medicao">Medição</div>
                                <div class="menu-aside-geral" id="menu-aside-relatorio">Relatorio</div>
                            </div>
                            <div class="menu-aside-geral" id="menu-aside-conta">Minha Conta</div>
                        </div>
                    </div>
                    <div class="footer-aside"></div>
                </div>
            </div>
            <div class="section">
                <div class="control-section">
                    <div class="control-content">
                        <!-- <div class="text-content">Sistemas</div>-->
                        <div class="content-luz content-geral">
                            <!-- <div class="text-geral-home">Sistema de Luz</div>-->
                            <div class="control-img-lampada">
                                <img class="img-lampada" src="<?php echo base_url() ?>assets/images/lampada3.svg">
                            </div>
                        </div>

                        <div class="content-energia content-geral">
                            <div class="control-img-energia">
                                <img class="img-energia" src="<?php echo base_url() ?>assets/images/energia.svg">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="f-text">
                    <div class="f-text-geral">@2017 Sigere.com | Todos os direitos reservados</div>
                    <div class="f-text-geral">É proibida a reprodução total ou parcial de qualquer conteudo deste site</div>
                </div>
            </div><?php
        } else {
            header("Location:http://localhost/energia//"); /* Redirect browser */


            exit;
        }
        ?>

    </body>



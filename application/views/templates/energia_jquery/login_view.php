<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8" />

        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modal/modal_cadastro.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modal/modal_senha.css"/>
        <script  src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script  src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script  src="<?php echo base_url(); ?>assets/js/sigere_login.js"></script>
      





    </head>
    <body>
        <div class="masc"></div>
       

            <div class="header">
               
                <div class="title">SIGERE</div>
            </div>

            <div class="section">

                <div class="login">
                    <div class="p_corpo_inputs">
                        <div class="title_login">Bem vindo!
                            <div class="sub-title">Por favor, digite o seu email e senha.</div>
                        </div>
                        <div class="p_inputs title_inputs">
                            <!-- <label>Email: </label>-->
                            <input type="email" class="ipt-geral ipt-email" placeholder="Email" >
                            <!-- <br/><br/>-->
                            <!-- <label>Senha:</label>-->
                            <br/>
                            <input type="password" class="ipt-geral ipt-password" placeholder="Senha">
                            <br/>

                            <div class="btn-login">
                                <div class=" text-btn">Entrar</div>
                            </div>

                        </div>


                        <div class="f_login">
                            <div id="err-login-email" class="err-login-geral">*Campo Email Vazio</div>
                            <div id="err-login-email2" class="err-login-geral">*Formato de Email Invalido</div>
                            <div id="err-login-email-php" class="err-login-geral"></div>
                            <div id="err-login-senha" class="err-login-geral">*Campo Senha Vazio</div>
                            <div id="err-login-senha-php" class="err-login-geral"></div>
                            <div class="cadastro">Ainda não é cadastrado?</div>
                            <div class="senha">Esqueceu a Senha?</div>
                        </div>

                    </div>
                </div>

                <?php $this->load->view('templates/energia_jquery/modal/cadastro_view.php'); ?>
                <?php $this->load->view('templates/energia_jquery/modal/senha_view.php'); ?>


            </div>

            <div class="footer">
                <div class="f-text">
                    <div class="f-text-geral">@2017 Sigere.com | Todos os direitos reservados</div>
                    <div class="f-text-geral">É proibida a reprodução total ou parcial de qualquer conteudo deste site</div>
                </div>
            </div>

      

    </body>



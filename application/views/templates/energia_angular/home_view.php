<!DOCTYPE html>
<?php if ($this->session->userdata('logged_in')) {
    ?>
    <html lang="pt-BR">
        <head>
            <title><?php echo $title; ?></title>
            <meta charset="UTF-8" />
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css"/>
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modal/modal_cadastro.css"/>
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modal/modal_senha.css"/>
            <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/angular/angular.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/angular/lib/angular-messages.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/Back-end/login/sigere_login_dados.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/Back-end/login/modal/sigere_cadastro_dados.js"></script>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        </head>
        <body>








            <div> <?= $nome; ?></div>
            <div> <?= $email; ?></div>
            <div> <?= $data_nascimento ?></div>


            <?php
        } else {
            header("Location:http://localhost/questa//"); /* Redirect browser */


            exit;
        }
        ?>

    </body>
</html>



<!DOCTYPE html>
<?php if ($this->session->userdata('logged_in')) {
    ?>
    <html lang="pt-BR" ng-app="questaHome">
        <head>
            <title><?php echo $title; ?></title>
            <meta charset="UTF-8" />
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
            <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
             <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
            <script src="<?php echo base_url(); ?>assets/js/angular/angular.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/Back-end/home/questa_home.js"></script>

            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        </head>
        <body ng-controller="homeCtrl">
            <h3>Bem Vindo <?= $nome; ?></h3>
            <h3>Email:  <?= $email; ?></h3>
            <h3> Data de Nascimento: <?= $data_nascimento; ?></h3>

         

            <button class="btn btn-primary" ng-click="deslogar()">Deslogar</button>
            <?php
        } else {
            header("Location:http://localhost/questa//"); /* Redirect browser */
            exit;
        }
        ?>

</body>
</html>



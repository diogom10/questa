<!DOCTYPE html>
<?php if ($this->session->userdata('logged_in')) {
    ?>
    <html lang="pt-BR" ng-app="questaHome">
        <head>
            <title><?php echo $title; ?></title>
            <meta charset="UTF-8" />
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
            <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/angular/angular.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/Back-end/home/questa_home.js"></script>

            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        </head>
        <body ng-controller="homeCtrl">
            <div> <?= $nome; ?></div>
            <div> <?= $email; ?></di>
            <div> <?= $data_nascimento ?></div>

            <button ng-click="getUsuarios()">USUARIOS</button>

            <?php
        } else {
            header("Location:http://localhost/questa//"); /* Redirect browser */
            exit;
        }
        ?>

</body>
</html>



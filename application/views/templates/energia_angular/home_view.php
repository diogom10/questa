<!DOCTYPE html>
<?php if ($this->session->userdata('logged_in')) {
    ?>
    <html lang="pt-BR" ng-app="testeHome">
        <head>
            <title><?php echo $title; ?></title>
            <meta charset="UTF-8" />

            <link rel="alternate" type="application/atom+xml" href="http://tecnologia.uol.com.br/ultnot/index.xml" title="RSS feed para Minha Pagina"> 
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
            <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
            <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
            <script src="<?php echo base_url(); ?>assets/js/angular/angular.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/Back-end/home/home.js"></script>

            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        </head>
        <body ng-controller="homeCtrl">
            <h3>Bem Vindo <?= $nome; ?></h3>
            <h3>Email:  <?= $email; ?></h3>
            <h3> Data de Nascimento: <?= $data_nascimento; ?></h3>



            <button class="btn btn-primary" ng-click="deslogar()">Deslogar</button>

            <h3>Tela de noticias</h3>
            <?php
            $feed = file_get_contents('http://tecnologia.uol.com.br/ultnot/index.xml');
            $rss = new SimpleXmlElement($feed);

            foreach ($rss->channel->item as $entrada) {
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom:1%;cursor:pointer;padding-top:2% ">
                    <?php
                    echo '
          
    <a href=' . $entrada->link . '>' . $entrada->link . '</a>
               ';
                    ?>
                </div>
            <?php }
            ?>


            <?php
        } else {
            header("Location:http://localhost/teste//"); /* Redirect browser */
            exit;
        }
        ?>

    </body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>PHP E-commerce</title>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" href="<?php echo ROOT_URL; ?>public?page=homepage">PHP E-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>public?page=about">Chi Siamo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>public?page=services">Servizi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>shop?page=products-list">Prodotti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>public?page=contacts">Contatti</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>shop?page=cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-success rounded-pill bg-success">1</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Area Riservata</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul> 

    </div>
</div>
</nav>
<!-- END NAVBAR -->
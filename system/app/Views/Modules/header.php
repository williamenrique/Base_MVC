<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['page_name']?></title>
    <link rel="shortcut icon" href="<?= IMG ?>icon.png">
    <link rel="stylesheet" href="<?= PLUGINS_CSS ?>sweetalert2.css">
    <link rel="stylesheet" href="<?= PLUGINS_CSS ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= CSS ?>custom.css">
</head>
<body>
    
<span class="show">
    <i class='bx bx-chevrons-left text-primary'></i>
</span>
<div class="box-main">
    <!-- navegacion lateral -->
    <section class="section-nav">
        <div class="head-nav">
            <div class="img_user" style="background-image: url('<?= IMG ?>default.png');"></div>
            <div class="info_user">
                <h6 class="nameUser"><?= $_SESSION['userData']['user_nombres']. ' ' . $_SESSION['userData']['user_apellidos']  ?></h6>
                <h6 class="emailUSer"><?= $_SESSION['userData']['user_email'] ?></h6>
            </div>
        </div>
        <div class="nav">
            <ul class="list">
                <!-- item solo -->
                <li class="list__item item_active">
                    <div class="list__button">
                        <i class='bx bx-home list_icon'></i>
                        <a href="./index.html" class="nav__link">Inicio</a>
                    </div>
                </li>
                <!-- desplegable -->
                <li class="list__item list__item--click">
                    <div class="list__button button_click">
                        <i class='bx bx-key list_icon'></i>
                        <a href="#" class="nav__link">Autenticacion</a>
                        <i class='bx bx-chevron-right list__arrow'></i>
                    </div>
                    <!-- la lista que se desplegara -->

                    <ul class="list__show">
                        <li class="list__inside">
                            <i class='bx bx-radio-circle-marked'></i>
                            <a href="pages/login.html" target="_blank" class="nav__link nav__link--inside">Login</a>
                        </li>
                        <li class="list__inside">
                            <i class='bx bx-radio-circle-marked'></i>
                            <a href="pages/register.html" target="_blank" class="nav__link nav__link--inside">Register</a>
                        </li>
                        <li class="list__inside">
                            <i class='bx bx-radio-circle-marked'></i>
                            <a href="pages/forgotpass.html" target="_blank" class="nav__link nav__link--inside">Forgot
                                Password</a>
                        </li>

                    </ul>
                </li>
                <!-- desplegable -->
                <li class="list__item list__item--click">
                    <div class="list__button button_click">
                        <i class='bx bx-bar-chart-square list_icon'></i>
                        <a href="#" class="nav__link">Pages</a>
                        <i class='bx bx-chevron-right list__arrow'></i>
                    </div>
                    <!-- la lista que se desplegara -->
                    <ul class="list__show">
                        <li class="list__inside">
                            <i class='bx bx-radio-circle-marked'></i>
                            <a href="pages/404.html" target="_blank" class="nav__link nav__link--inside">404</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <div class="footer-nav">
            <a href="#">
                <i class='bx bx-cog'></i>
            </a>
            <a href="<?= base_url()?>logout">
                <i class='bx bx-log-out'></i>
            </a>
            <span class="show_menu">
                <i class='bx bx-chevrons-left show_menu'></i>
            </span>
        </div>
    </section>
    <!-- navegacion lateral end -->
    <!-- contenido principal -->
    <div class="main">
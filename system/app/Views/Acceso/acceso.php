<!DOCTYPE html>
<html lang="en">
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
    <div class="container p-5 my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center text-primary">Bienvenido</h1>
                        <p class="card-text text-center">Ingrese sus datos.</p>
                        <form id="formAcceso">
                            <div class="mb-3 mt-3">
                                <label for="txtUser" class="form-label">Usuario:</label>
                                <input type="text" class="form-control form-control-sm" id="txtUser" name="txtUser" autofocus placeholder="Coloque su usuario" >
                            </div>
                            <div class="mb-3">
                                <label for="txtPass" class="form-label">Password:</label>
                                <input type="password" class="form-control form-control-sm" id="txtPass" name="txtPass" placeholder="Coloque su password">
                            </div>
                            <div class="row">
                                <div class="col-6 box-button">
                                    <button type="submit" class="btn btn-primary btnIngresar">
                                        <i class='bx bx-radio-circle-marked'></i>INGRESAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>const base_url = "<?= base_url() ?>";</script>
    <script src="<?= PLUGINS_JS ?>jquery-3.7.1.js"></script>
    <script src="<?= PLUGINS_JS ?>sweetalert2@10.js"></script>
    <script src="<?= PLUGINS_JS ?>bootstrap.bundle.min.js"></script>
    <script src="<?= JS ?>function.main.js"></script>
    <script src="<?= JS.$data['page_functions'] ?>"></script>
</body>
</html>

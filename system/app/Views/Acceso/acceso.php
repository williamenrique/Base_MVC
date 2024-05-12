<?php head($data)?>
<div class="container p-5 my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center text-primary">Bienvenido</h2>
                    <p class="card-text text-center">Ingrese e inicie sesion.</p>
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
                                <button type="submit" class="btn btn-primary btnIngresar">INGRESAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php footer($data)?>
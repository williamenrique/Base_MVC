<?= head($data) ?>
    <!-- box-profile -->
    <div class="container">
        <section class="box box-profile">
            <div class="container">
                <h3 class="title-box">
                    Detalles de perfil
                </h3>
            </div>
            <span class="divider"></span>
            <div class="container">
                <section class="box-info-user">
                    <div class="box-img-head">
                        <form class="formImg">
                            <input type="file" id="file" name="file" accept="image/*">
                            <div id="preview-images">
                                <span class="search">
                                    <i class='bx bx-camera'></i>
                                </span>
                                <div class="thumbnail 0" data-id="0" style="background-image : url(../<?= $_SESSION['userData']['user_ruta'].'/'.$_SESSION['userData']['user_img']  ?>)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 box-button">
                                    <button type="button" class="btn btnUpImg">subir</button>
                                    <span class="files">Tipos de archivos permitidos: png, jpg, jpeg.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- formulario datos usuario -->
                    <form class="formProfile">
                        <input type="hidden" id="txtIdUser" name="txtIdUser" value="">
                        <div class="row">
                            <div class="box-input">
                                <label for="txtNombre">nombres</label>
                                <input type="text" id="txtNombre" name="txtNombre" value="<?= $_SESSION['userData']['user_nombres']?>">
                            </div>
                            <div class="box-input">
                                <label for="txtApellido">apellidos</label>
                                <input type="text" id="txtApellido" name="txtApellido" value="<?= $_SESSION['userData']['user_apellidos']?>">
                            </div>
                            <div class="box-input">
                                <label for="txtEmail">email</label>
                                <input type="text" id="txtEmail" name="txtEmail" value="<?= $_SESSION['userData']['user_email']?>">
                            </div>
                            <div class="box-input">
                                <label for="txtCi">Identificacion</label>
                                <input type="text" id="txtCi" name="txtCi" value="<?= $_SESSION['userData']['user_ci']?>">
                            </div>
                            <div class="box-input">
                                <label for="txtTelefono">Telefono</label>
                                <input type="text" name="txtTelefono" id="txtTelefono" value="<?= $_SESSION['userData']['user_tlf']?>">
                            </div>
                            
                        <div class="row">
                            <div class="box-button">
                                <button type="submit" class="btn btn-guardar">Guardar</button>
                                <button class="btn btn-reset">Cancelar</button>
                            </div>
                        </div>
                    </form>
                    <!-- end formulario datos usuario -->
                </section>
            </div>
        </section>
        <!-- end box profile -->
        <span class="divider-dotted"></span>
        <!-- eliminar cuenta -->
        <section class="box deletCount">
            <div class="container">
                <h3 class="title-box">
                    Eliminar cuenta
                </h3>
            </div>
            <span class="divider"></span>
            <div class="container">
                <section class="alert">
                    <span>¿Está seguro de que desea eliminar su cuenta?</span>
                    <span>Una vez que eliminas tu cuenta, no hay vuelta atrás. Por favor, esté seguro.</span>
                    <div class="box-check">
                        <input type="checkbox" name="confirmDel" id="confirmDel">
                        <label class="check" for="confirmDel">Confirmo la desactivación de mi cuenta</label>
                    </div>
                    <div class="box-button">
                        <button class="btn btn-confirm">desactivar</button>
                    </div>
                </section>
            </div>
        </section>
        <?= dep($_SESSION['userData'])?>
        <!-- end delete cuenta -->
    </div>
<?= footer($data) ?>
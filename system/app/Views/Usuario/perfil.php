<?= head($data) ?>
    <!-- box-profile -->
    <div class="container-fluid">
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
                                <div class="thumbnail 0" data-id="0" style="background-image : url(<?= $_SESSION['userData']['user_img'] ?>)">
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
                                <input type="text" id="txtNombre" name="txtNombre">
                            </div>
                            <div class="box-input">
                                <label for="txtApellido">apellidos</label>
                                <input type="text" id="txtApellido" name="txtApellido">
                            </div>
                            <div class="box-input">
                                <label for="txtEmail">email</label>
                                <input type="text" id="txtEmail" name="txtEmail">
                            </div>
                            <div class="box-input">
                                <label for="txtCi">Identificacion</label>
                                <input type="text" id="txtCi" name="txtCi">
                            </div>
                        </div>
                        <div class="row">
                            <div class="box-input">
                                <label for="txtCodPostal">Cod Postal</label>
                                <input type="text" id="txtCodPostal" name="txtCodPostal">
                            </div>
                            <div class="box-input">
                                <label for="txtTelefono">Telefono</label>
                                <input type="text" name="txtTelefono" id="txtTelefono">
                            </div>
                            <div class="box-input">
                                <label for="txtEstado">Estado</label>
                                <select name="listEstado" id="listEstado">
                                    <option value="0">Seleccione estado</option>
                                </select>
                            </div>
                            <div class="box-input">
                                <label for="txtCiudad">ciudad</label>
                                <input type="text" id="txtCiudad" name="txtCiudad">
                            </div>
                        </div>
                        <div class="row">
                            <div class="box-input">
                                <label for="txtDireccion">Direccion</label>
                                <input type="text" name="txtDireccion" id="txtDireccion">
                            </div>
                        </div>
                        <div class="row">
                            <div class="box-input">
                                <label class="content-input">
                                    <input type="checkbox" name="Vehiculo" id="autopista" value="autopista">prueba
                                    <i></i>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="box-button">
                                <button class="btn btn-guardar">Guardar</button>
                                <button class="btn btn-reset">Desechar</button>
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
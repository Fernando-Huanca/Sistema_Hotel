<?php include_once 'views/template/header-principal.php';
include_once 'views/template/portada.php'; ?>
<section class="user-area-all-style log-in-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-form-action">
                    <div class="form-heading text-center">
                        <h3 class="form-title">Login!</h3>
                    </div>
                    <form method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" placeholder="Username or Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <a class="forget" href="recover-password.html">Olvidaste tu contraseña?</a>
                            </div>
                            <div class="col-12">
                                <button class="default-btn btn-two" type="submit">
                                    Login
                                    <i class="flaticon-right"></i>
                                </button>
                            </div>
                            <div class="col-12">
                                <p class="account-desc">
                                    No tienes una cuenta?
                                    <a href="<?php echo RUTA_PRINCIPAL . 'registro'; ?>">Registrarse</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'views/template/footer-principal.php'; ?>

<script src="<?php echo RUTA_PRINCIPAL . 'assets/principal/js/pages/login.js'; ?>"></script>

</body>

</html>
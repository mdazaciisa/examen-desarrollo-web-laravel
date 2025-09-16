<!doctype html>
<html lang="es" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="horizontal-menu-template" data-style="light">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Login | VentasFix</title>
        <meta name="description" content="Login VentasFix" />
        <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="/assets/vendor/fonts/tabler-icons.css" />
        <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />
        <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="/assets/css/demo.css" />
        <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />
        <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />
        <link rel="stylesheet" href="/assets/vendor/libs/@form-validation/form-validation.css" />
        <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />
        <script src="/assets/vendor/js/helpers.js"></script>
        <script src="/assets/vendor/js/template-customizer.js"></script>
        <script src="/assets/js/config.js"></script>
    </head>
    <body>
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="app-brand justify-content-center mb-6">
                                <a href="/" class="app-brand-link">
                                    <span class="app-brand-logo demo">
                                        <!-- Logo SVG aquí -->
                                    </span>
                                    <span class="app-brand-text demo text-heading fw-bold">VentasFix</span>
                                </a>
                            </div>
                            <h4 class="mb-1">Bienvenido a VentasFix 👋</h4>
                            <p class="mb-6">Por favor, inicia sesión para continuar</p>
                            @if($errors->any())
                                <div class="alert alert-danger">{{ $errors->first() }}</div>
                            @endif
                            <form id="formAuthentication" class="mb-4" method="POST" action="/login">
                                @csrf
                                <div class="mb-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="nombre.apellido@ventasfix.cl" required autofocus />
                                </div>
                                <div class="mb-6 form-password-toggle">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="********" required />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="/assets/vendor/libs/popper/popper.js"></script>
        <script src="/assets/vendor/js/bootstrap.js"></script>
        <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
        <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/assets/vendor/libs/hammer/hammer.js"></script>
        <script src="/assets/vendor/libs/i18n/i18n.js"></script>
        <script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="/assets/vendor/js/menu.js"></script>
        <script src="/assets/vendor/libs/@form-validation/popular.js"></script>
        <script src="/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
        <script src="/assets/vendor/libs/@form-validation/auto-focus.js"></script>
        <script src="/assets/js/main.js"></script>
        <script src="/assets/js/pages-auth.js"></script>
    </body>
</html>

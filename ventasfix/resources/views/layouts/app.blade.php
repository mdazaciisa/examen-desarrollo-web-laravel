<!doctype html>
<html lang="es" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="horizontal-menu-template" data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title', 'VentasFix')</title>
    <meta name="description" content="@yield('description', 'Panel de administración VentasFix')" />
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
    <link rel="stylesheet" href="/assets/vendor/css/pages/cards-advance.css" />
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/vendor/js/template-customizer.js"></script>
    <script src="/assets/js/config.js"></script>
  </head>
  <body>
    <div class="d-flex">
      <nav class="bg-light p-3" style="min-width:200px;min-height:100vh;">
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a class="nav-link" href="/dashboard">Dashboard</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="/users">Usuarios</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="/productos">Productos</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="/clientes">Clientes</a>
          </li>
        </ul>
      </nav>
      <main class="flex-fill">
        @yield('content')
      </main>
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
    <script src="/assets/js/main.js"></script>
  </body>
</html>

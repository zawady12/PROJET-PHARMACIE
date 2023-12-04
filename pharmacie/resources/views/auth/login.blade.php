<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Pharmacie</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets5/img/favicon.png" rel="icon">
        <link href="assets5/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets5/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets5/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets5/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets5/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets5/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets5/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets5/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets5/css/style.css" rel="stylesheet">

        <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    </head>

    <body>

        <main>
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center py-4">
                                    <a href="" class="logo d-flex align-items-center w-auto">
                                    </a>
                                </div><!-- End Logo -->

                                <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1000px; height:500px; border-radius:50px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-mb-4 col-lg-7" >
                                                <div class="pt-4 pb-2">
                                                    <h5 class="card-title text-center pb-0 fs-4">Connexion</h5>
                                                </div>
                                                <form action="{{route('login')}}" method="POST">
                                                    @csrf
                                                    <div class="col-7" style="margin-left: 20%;">
                                                    <x-label for="email" :value="__('Email')" />
                                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                                    </div>
                                                <br>
                                                    <div class="col-7" style="margin-left: 20%;">
                                                    <x-label for="password" :value="__('Password')" />
                                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                                    </div>
                                                    <div class="col-5" style="margin-left: 20%;">
                                                    <br>
                                                    <label for="remember_me" class="inline-flex items-center">
                                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                        <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                                                    </label>
                                                    </div>
                                                    <br>
                                                    <div class="col" style="margin-left: 20%;">
                                                    @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                        {{ __('Mot de passe oublié ?') }}
                                                    </a>
                                                    @endif

                                                    <x-button class="ml-3">
                                                        {{ __('Se connecter') }}
                                                    </x-button>
                                                </div>
                                                <br>
                                             <center>      
                                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                             </center>
                                                </form>
                                            </div>
                                            <div class="col-mb-5 col-lg-5">
                                                <img src="assets1/img/home.svg" style="height: 160%;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="credits">
                                        <!-- All the links in the footer should remain intact. -->
                                        <!-- You can delete the links only if you purchased the pro version. -->
                                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                    </div>

                                </div>
                            </div>
                        </div>

                </section>

            </div>
        </main><!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets5/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets5/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets5/vendor/chart.js/chart.min.js"></script>
        <script src="assets5/vendor/echarts/echarts.min.js"></script>
        <script src="assets5/vendor/quill/quill.min.js"></script>
        <script src="assets5/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets5/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets5/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets5/js/main.js"></script>

    </body>

    </html>
</x-guest-layout>
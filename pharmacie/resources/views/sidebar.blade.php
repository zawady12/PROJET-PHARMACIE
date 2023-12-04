<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Pharmacie</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="DataTables/datatables.min.css" />
    <title>Pharmacie</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Favicons -->
    <link href="assets1/img/favicon.png" rel="icon">

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
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
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
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard" class="logo d-flex align-items-center">
                <img src="assets1/img/favicon.png" alt="">
                <span class="d-none d-lg-block">Pharmacie</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="GET"  action="dashboard1">
                <input type="text" name="query" placeholder="Rechercher" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">{{auth()->user()->unreadNotifications->count()}}</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            Vous avez {{auth()->user()->unreadNotifications->count()}} notifications non lues
                            <a href="notification"><span class="badge rounded-pill bg-primary p-2 ms-2">Voir tout</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @foreach(auth()->user()->unReadNotifications as $n)
                        <li class="notification-item">
                            <i class="bi bi-bell text-primary"></i>
                            <div>
                                {{$n->data['message']}}
                                <p>{{$n['created_at']}}</p>
                            </div>
                        </li>
                        @endforeach
                        <li>
                            <center><a href="markasread" style="color:green ;">Marquer tout lu</a></center>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="tabnotification">Afficher toutes les notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-envelope"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            Vous avez 3 nouveaux messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets5/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets5/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets5/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        @can('Gerant')<img src="assets1//img/doctors/doctors-1.jpg" alt="Profile" class="rounded-circle">@endcan
                        @can('vendeur')<img src="assets1/img/testimonials/testimonials-3.jpg" alt="Profile" class="rounded-circle">@endcan
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->prenom }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->prenom }} </h6>
                            <span>{{ Auth::user()->role->libelle }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profil">
                                <i class="bi bi-person"></i>
                                <span>Mon profil</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" data-toggle="modal" data-target="#logoutModal">
                                    <i class="bi bi-box-arrow-right"></i>
                                    Deconnexion
                                </a>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tabclient">
                            <i class="bi bi-circle"></i><span>Liste Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="tabligne_vente_client">
                            <i class="bi bi-circle"></i><span>Crédits Clients</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Fournisseurs</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tabfournisseur">
                            <i class="bi bi-circle"></i><span>Liste Fournisseurs</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-capsule-pill"></i><span>Produits</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tabproduit">
                            <i class="bi bi-circle"></i><span>Stock Produits</span>
                        </a>
                    </li>
                    <li>
                        <a href="tabcategorie">
                            <i class="bi bi-circle"></i><span>Catégories Produits</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cart-plus"></i><span>Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="tabligne_commande_produit">
                            <i class="bi bi-circle"></i><span>Liste Produits Commandés</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#retour-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-truck"></i><span>Livraisons</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="retour-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tabbon_livraison">
                            <i class="bi bi-circle"></i><span>Liste Bon de Livraison</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-arrow-repeat"></i><span>Retours</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tabretour">
                            <i class="bi bi-circle"></i><span>Liste retours</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Achats-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cash-coin"></i><span>Achats</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Achats-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tabvente">
                            <i class="bi bi-circle"></i><span>Liste Achats</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Profile Page Nav -->

            @can('Gerant')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Utilisateurs-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa fa-users-cog"></i><span>Utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Utilisateurs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tabpersonnel">
                            <i class="bi bi-circle"></i><span>Liste Utilisateurs</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Utilitaire-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Utilitaire</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Utilitaire-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tabrole">
                            <i class="bi bi-circle"></i><span>Rôles Utilisateurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard1">
                            <i class="bi bi-circle"></i><span>Base de données</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Historique-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-clock-history"></i><span>Historique</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Historique-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @can('Gerant')
                    <li>
                        <a href="activites">
                            <i class="bi bi-circle"></i><span>Activités utilisateurs</span>
                        </a>
                    </li>
                    <li>
                        @endcan
                        <a href="tabnotification">
                            <i class="bi bi-circle"></i><span>Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="historiquevente">
                            <i class="bi bi-circle"></i><span>Historique des ventes</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside><!-- End Sidebar-->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets5/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets5/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets5/vendor/chart.js/chart.min.js"></script>
    <script src="assets5/vendor/echarts/echarts.min.js"></script>
    <script src="assets5/vendor/quill/quill.min.js"></script>
    <script src="assets5/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets5/vendor/php-email-form/validate.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets5/js/main.js"></script>

</body>

</html>
@include('sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Base de données</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Base de données</li>
            </ol> 
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Plus</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Informations sur le nombre de clients</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Clients</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h5>{{ $client }}</h5>
                            </div>
                        </div>
                    </div>
                    <center><a href="tabclient">Voir Détails</a></center>
                </div>
            </div><!-- End Sales Card -->



            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Plus</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Informations sur le nombre de fournisseurs</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Fournisseurs</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <div class="ps-3">
                                <h5>{{ $fournisseur }}</h5>
                            </div>
                        </div>
                    </div>
                    <center><a href="tabfournisseur">Voir Détails</a></center>

                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Plus</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Informations sur le nombre de produits</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Produits</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-capsule-pill"></i>
                            </div>
                            <div class="ps-3">
                                <h5>{{ $produit }}</h5>
                            </div>
                        </div>
                    </div>
                    <center><a href="tabproduit">Voir Détails</a></center>

                </div>
            </div>

            <!-- Content Row -->
        </div>

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Plus</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Informations sur le nombre d'achats'</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Achats</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-hand-holding-usd"></i>
                            </div>
                            <div class="ps-3">
                                <h5>{{ $vente }}</h5>
                            </div>
                        </div>
                    </div>
                    <center><a href="tabvente">Voir Détails</a></center>

                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Plus</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Informations sur le nombre d'utilisateurs'</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Utilisateurs</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-users-cog"></i>
                            </div>
                            <div class="ps-3">
                                <h5>{{ $user }}</h5>
                            </div>
                        </div>
                    </div>
                    <center><a href="tabpersonnel">Voir Détails</a></center>

                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Plus</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Informations sur les produits qui sont en rupture de stock'</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">En rupture de stock</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div class="ps-3">
                                <h5>{{ $stock }}</h5>
                            </div>
                        </div>
                    </div>
                    <center><a href="tabalerte">Voir Détails</a></center>

                </div>
            </div>

            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Plus</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Informations sur les produits expirés</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Produits expirés</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar-x"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>{{ $peremption }}</h5>
                                </div>
                            </div>
                        </div>
                        <center><a href="tabperemption">Voir Détails</a></center>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Plus</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Informations sur le nombre de dettes clients</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Total Categories</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-card-list"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>{{ $categorie }}</h5>
                                </div>
                            </div>
                        </div>
                        <center><a href="tabcategorie">Voir Détails</a></center>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Plus</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Informations sur le nombre de catégories de produits existants</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Total Dettes</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-card-list"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>{{ $ligne_vente_client }}</h5>
                                </div>
                            </div>
                        </div>
                        <center><a href="tabligne_vente_client">Voir Détails</a></center>
                    </div>
                </div>
            </div>
    </section>
</main>

<!-- End of Main Content -->
@include('foot')
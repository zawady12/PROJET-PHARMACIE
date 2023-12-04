<!-- ======= Sidebar ======= -->
@include('sidebar')
<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#ex').DataTable();
    });
</script>
<!-- End Sidebar-->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Plus</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Total des produits dans la base</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Produits <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-capsule-pill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $produit }}</h6>
                                        <a href="tabproduit"><span class="text-success small pt-1 fw-bold">Details</span></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Plus</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Total produits périmés</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Péremption<span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-calendar-x"></i>
                                    </div>
                                    <div class="ps-3">
                                    @foreach($peremption as $p)
                                        <h6>{{ $p->datas }}</h6>
                                        @endforeach
                                        <a href="tabperemption"><span class="text-success small pt-1 fw-bold">Details</span></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Plus</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Total des produits en rupture de stock</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Rupture <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-exclamation-triangle"></i>
                                    </div>
                                    <div class="ps-3">
                                    @foreach($stock as $s)
                                        <h6>{{ $s->valeurs }}</h6>
                                        @endforeach
                                        <a href="tabalerte"> <span class="text-danger small pt-1 fw-bold">Details</span></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->


                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Liste des recents produits ajoutés</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recents Produits</h5>

                                <table id="ex" class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                            <th scope="col">DCI</th>
                                            <th scope="col">Nom Commercial</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $dat)
                                        <tr>
                                        <td>{{ $dat->id}}</td>
                                            <td>{{ $dat->dci}}</td>
                                            <td>{{ $dat->nom_commercial}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Ce box vous affiche la Liste </a></li>
                                    <li><a class="dropdown-item" href="#">des vendus récentes</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Recentes Ventes <span>| TOUT</span></h5>
                                <table id="ex" class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                        <th scope="col"></th>
                                            <th scope="col">Identifiant</th>
                                            <th scope="col">Numéro de vente</th>
                                            <th scope="col">Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($top as $d)
                                        <tr>
                                            <td><img src="assets1/img/statistiques.jpg"></td>
                                            <td>{{ $d->id}}</td>
                                            <td>{{ $d->num_vente}}</td>
                                            <td>{{ $d->montant}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Website Traffic -->
                <div class="card">
                    <html>
                        <head>
                        <script type="text/javascript" src="assets1/js/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load("current", {
                                packages: ["corechart"]
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Produits','Types'],
                                   <?php echo $charData ?>
                                ]); 
                                var options = {
                                    title: '',
                                    pieHole: 0.6,
                                    /*'width': 400,
                                    'height': 300,*/
                                };
                                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                                chart.draw(data, options);
                            }
                        </script>
                        </head>
                        <body>
                        <div id="donutchart" style="width: 500px; height: 400px;"></div>
                        </body>
                  </html>
                </div><!-- End Website Traffic -->

                <!-- News & Updates Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Ce box vous donne des informations</a></li>
                            <li><a class="dropdown-item" href="#">sur les services qu'offre notre pharmacie</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Services <span>| Info</span></h5>

                        <div class="news">
                        <div class="post-item clearfix">
                                <img src="assets1/img/doctors/doctors-1.jpg" alt="">
                                <h4><a href="#">Gerant</a></h4>
                                <p>La pharmacie est géree par le pharmacien titulaire, qui oeut donner aussi des conseils</p>
                            </div> 
                            <div class="post-item clearfix">
                                <img src="assets1/img/testimonials/testimonials-3.jpg" alt="">
                                <h4><a href="#">Vendeur</a></h4>
                                <p>Notre pharmacie met à sa disposition un vendeur pour vos achats </p>
                            </div>
                            <div class="post-item clearfix">
                                <img src="assets1/img/doctors/doctors-4.jpg" alt="">
                                <h4><a href="#">Conseillers</a></h4>
                                <p>Notre pharmacie offre des conseils concernant les produits que vous voulez acheter</p>
                            </div>
                            

                            <div class="post-item clearfix">
                                <img src="assets1/img/testimonials/testimonials-2.jpg" alt="">
                                <h4><a href="#">Preparateurs</a></h4>
                                <p>Notre pharmacie met à sa disposition une personne chargée d'emballer les achats</p>
                            </div>


                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->

        </div>
    </section>
</main>
<script src="assets/js/main.js"></script>
<script src="assets5/vendor/simple-datatables/simple-datatables.js"></script>
<!-- End #main -->
@include('foot')
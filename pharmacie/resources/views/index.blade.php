@include('vue')
<!-- Main Content -->
<!-- Content Row -->
<div id="content">
    <br>
    <br>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-white shadow h-90 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                Total Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4>{{ $client }}</h4>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4></h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-user fa-2x" style="color:darksalmon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-white shadow h-90 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                Total Fournisseurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4>{{ $fournisseur }}</h4>
                            </div>
                            <div class="h5 mb-0 font-weight-bold">
                                <h4></h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-book fa-2x" style="color:blueviolet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-white shadow h-90 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                Total Produits
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4>{{ $fournisseur }}</h4>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <h4></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pills fa-2x" style="color:green"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-white shadow h-90 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                Total Achats</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4>{{ $fournisseur }}</h4>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4></h4>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-hand-holding-usd fa-2x" style="color:deepskyblue"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-white shadow h-90 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                En Rupture de stock
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4>{{ $fournisseur }}</h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dolly fa-2x" style="color:red"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-white shadow h-90 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                Medecine expirée</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4>{{ $fournisseur }}</h4>
                            </div>
                        </div>

                        <div class="col-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="red" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
  <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
  <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
</svg>                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="row">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4" style='width : 98%'>
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">A PROPOS DE NOTRE LOGICIEL</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">INFORMATIONS :</div>
                            <a class="dropdown-item" href="">Ce box vous donne des informations</a>
                            <a class="dropdown-item" href="">sur ce que fait notre logiciel</a>

                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <img src="assets/img/peremption.jpg" style="width: 60%">
                        </div>
                        <div class="col-xl-4 col-lg-7">
                            <h7> Notre logiciel alerte à l'avance pour avoir information des produits qui vont perimés</h7>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <img src="assets/img/rupture.png" style="width: 60%">
                        </div>
                        <div class="col-xl-4 col-lg-7">
                            <h7> Notre logiciel alerte à l'avance lorsqu'un produit va être en rupture de stock</h7>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        &nbsp;<div class="col-xl-7 col-lg-7">
                            <img src="assets/img/vente.jpg" style="width: 69%;">
                        </div>&nbsp;&nbsp;&nbsp;
                        <div class="col-xl-4 col-lg-7">
                            <h7> Le logiciel permet également de faire un suivi des ventes</h7>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pie Chart -->
        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">SERVICES OFFERTS PAR NOTRE PHARMACIE</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">INFORMATIONS :</div>
                            <a class="dropdown-item" href="">Ce box vous donne des informations</a>
                            <a class="dropdown-item" href="">sur les services qu'offre notre pharmacie</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <img src="assets/img/vendeur.jpg" style="width: 70%; ">
                        </div>
                        <div class="col-xl-4 col-lg-7">
                            <h7> Notre pharmacie met en vente plusieurs sortes de produits</h7>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    &nbsp;&nbsp;&nbsp;&nbsp;<div class="col-xl-7 col-lg-7">
                        <img src="assets/img/conseiler2.jpg" style="width: 76%;height:70%">
                    </div>
                    <div class="col-xl-4 col-lg-7">
                        <h7> Notre pharmacie vous offre des conseils concernant les produits que vous voulez acheter</h7>
                    </div>
                </div>
                <div class="row">
                    &nbsp;&nbsp;&nbsp;&nbsp;<div class="col-xl-7 col-lg-7">
                        <img src="assets/img/emballeurs.jpg" style="width: 76%;height:80%">
                    </div>
                    <div class="col-xl-4 col-lg-7">
                        <h7> Notre pharmacie met à votre disposition une personne chargée de vous emballez vos achats</h7>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<!-- End of Main Content -->
@include('footer')
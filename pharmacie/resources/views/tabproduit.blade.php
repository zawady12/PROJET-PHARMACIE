@include('sidebar')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="DataTables/datatables.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Liste Produits</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste Produits</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="dashboard">
        <center>@if ($errors->any())
            <div class="alert alert-danger" style="width:80% ; ">
                {{ $errors }}
            </div>
            @endif
        </center>
        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-xl-3 col-md-5 mb-4">
                <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1380px;">
                    <br>
                    <div class="container" style="width: 100%; height:1000px">
                        <div class="" style="background-color:white ;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                </div>
                                <div class="text-right">
                                    <a href="" data-toggle="modal" data-target="#modalajout" class="btn btn-primary btn-sm mr-1"><i class="fas fa-plus mr-1"></i>Ajouter Produits</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom_com</th>
                                    <th>DCI</th>
                                    <th>Prix de revente</th>
                                    <th>Date de fabrication</th>
                                    <th>Date de péremption</th>
                                    <th>Quantité</th>
                                    <th>Catégorie</th>
                                    <th>Etagère</th>
                                    <th>Type</th>
                                    <th></th>
                                    @can('Gerant')<th></th>@endcan
                                    @can('Gerant')<th></th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tabproduit as $prod)
                                <tr>
                                    <td>{{ $prod['nom_commercial']}}</td>
                                    <td>{{ $prod['dci']}}</td>
                                    <td>{{ $prod['prix']}}</td>
                                    <td>{{ $prod['date_fabrication']}}</td>
                                    <td>{{ $prod['date_peremption']}}</td>
                                    <td>{{ $prod['qnté_stockée']}}</td>
                                    <td>{{ $prod->categorie['type']}}</td>
                                    <td>{{ $prod['etagere']}}</td>
                                    <td>{{ $prod['type']}}</td>
                                    <td><a href="{{'editproduit/'.$prod->id}}" data-toggle="modal" data-target="#modalproduit{{$prod->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a></td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalproduit{{$prod->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h7 class="modal-title">Edition</h7>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="/updateproduit" method="POST">
                                                    @csrf
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        @include('editproduit')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button class="btn btn-primary">Editer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @can('Gerant')
                                    <td><a href="{{'deleteproduit/'.$prod->id}}" onclick="return confirm('Etes vous sure de vouloir supprimer {{$prod->DCI}}de la liste des produits ?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg></a></td>@endcan
                                    @can('Gerant')
                                    <td>
                                        <?php
                                        if ($prod->qnté_stockée <= 10) {
                                        ?>
                                            <a href="{{'editcommande_produit/'.$prod->id}}" data-toggle="modal" data-target="#modalcommande{{$prod->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                </svg></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalcommande{{$prod->id}}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h7 class="modal-title">Commander</h7>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="{{route('post_commande_produit')}}" method="POST">
                                                            @csrf
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                @include('commande_produit')
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                <button class="btn btn-primary">Commander</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>@endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('foot')



<!-- Modal -->
<div class="modal fade" id="modalajout">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="width:100%;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h7 class="modal-title">Nouveau Produit</h7>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('postproduit')}}" method="POST">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    @include('produit')
                </div>
            </form>
        </div>
    </div>
</div>
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
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Liste Bon de livraisons</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste Bon de livraisons</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="dashboard">
        <center>@if ($errors->any())
            <div class="alert alert-danger" style="width:80% ;">
                {{ $errors }}
            </div>
            @endif
        </center>
        @if (Session::has('messages'))
        <div class="alert alert-primary">
            {{Session::get('messages')}}
        </div>
        @endif
        <div class="row">
            <div>
                <div class="container">
                    <br>
                    <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1090px;">
                        <div class="container" style="width: 90%; height:1000px">
                            <div class="card-header" style="background-color:white ;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                    </div>
                                    <div class="text-right">
                                        <a href="" data-toggle="modal" data-target="#modalajoutliv" class="btn btn-primary btn-sm mr-1"><i class="fas fa-plus mr-1"></i>Ajouter Livraisons</a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Numéro de livraison</th>
                                        <th>Fournisseur</th>
                                        <th>Date de livraison</th>
                                        <th>Heure de livraison</th>
                                        <th>Quantité livrée</th>
                                        <th>Prix fournisseur</th>
                                        <th>Montant</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tabbon_livraison as $p)
                                    <tr>
                                        <td>{{ $p->produit['nom_commercial']}}</td>
                                        <td>{{ $p['num_livraison']}}</td>
                                        <td>{{ $p->fournisseur['nom']}}</td>
                                        <td>{{ $p['date_liv']}}</td>
                                        <td>{{ $p['heure_liv']}}</td>
                                        <td>{{ $p['qté_liv']}}</td>
                                        <td>{{ $p['prix_fournisseur']}}</td>
                                        <td>{{ $p['montant_initial']}}</td>
                                        <td><a href="{{'editbon_livraison/'.$p->id}}" data-toggle="modal" data-target="#modalbon_livraison{{$p->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a></td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalbon_livraison{{$p->id}}">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edition</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="/updatebon_livraison" method="POST">
                                                        @csrf
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            @include('editbon_livraison')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button class="btn btn-primary">Editer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <td><a href="{{'deletebon_livraison/'.$p['id']}}" onclick="return confirm('Etes vous sure de vouloir supprimer {{$p->name}} {{$p->prenom}} de la liste des bon_livraisons ?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg></a></td>
                                        <td>
                                            <?php
                                            $date = "09000000";
                                            $data = "09000000";
                                            if (
                                                strtotime($p['date_liv']) - strtotime($currentTime) <= $date
                                                && strtotime($p->produit['date_peremption']) - strtotime($currentTime) <= $data
                                            ) {
                                            ?>
                                                <a href="{{'retourbon_livraison/'.$p->id}}" data-toggle="modal" data-target="#modalretour{{$p->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                                    </svg></a>
                                                    
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalretour{{$p->id}}">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Retour chez le fournisseur</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="{{route('postretour')}}" method="POST">
                                                        @csrf
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            @include('retour')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button class="btn btn-primary">Retour au fournisseur</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <td><span class="text" style="color:darkblue; " ;>TOTAL</span></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <?php
                                        $total = 0.00;
                                        foreach ($tabbon_livraison as $p) {
                                            $total += $p->montant_initial;
                                        }
                                        print $total . " " . "FC";
                                        ?>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>
</main>
@include('foot')
<!-- Modal -->
<div class="modal fade" id="modalajoutliv">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="height:560px; width:700px;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h7 class="modal-title">Nouvelle Livraison</h7>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('postbon_livraison')}}" method="POST">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    @include('bon_livraison')
                </div>
                <div class="modal-footer">
                    <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
        <h1>Liste Achats</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste Achats</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="dashboard">
    <center>@if ($errors->any())
            <div class="alert alert-danger" style="width:80% ; color:red;">
                {{ $errors }}
            </div>
            @endif
        </center>
    @if (Session::has('messages'))
        <div class="alert alert-primary">
            {{Session::get('messages')}}
        </div>
    @endif
    @if (Session::has('message'))
        <div class="alert alert-danger">
            {{Session::get('message')}}
        </div>
    @endif
        <div class="row">
            <div>
                <div class="container">
                    <br>
                    <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1100px;">
                        <div class="container" style="width: 90%; height:1000px">
                            <div class="card-header" style="background-color:white ;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                    </div>
                                    <div class="text-right">
                                        <a href="" data-toggle="modal" data-target="#modalajoutachat" class="btn btn-primary btn-sm mr-1"><i class="fas fa-plus mr-1"></i>Ajouter Achats</a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Numéro de vente</th>
                                        <th>Produit</th>
                                        <th>Prix unitaire</th>
                                        <th>Quantité vendue</th>
                                        <th>Date vente</th>
                                        <th>Libelle</th>
                                        <th>Transactionnaire</th>
                                        <th>Montant</th>
                                        <th></th>
                                        <th></th>
                                        @can('Gerant')<th></th>@endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tabvente as $v)
                                    <tr>
                                        <td>{{ $v['num_vente']}}</td>
                                        <td>{{ $v->produit['nom_commercial']}}</td>
                                        <td>{{ $v['prix_vente']}}</td>
                                        <td>{{ $v['qnté_vendu']}}</td>
                                        <td>{{ $v['date_vente']}}</td>
                                        <td>{{ $v['libelle']}}</td>
                                        <td>{{ $v->user['name']}}</td>
                                        <td>{{ $v['montant']}}</td>
                                        <td>
                                            <a href="{{'ligne_vente_client/'.$v->id}}" data-toggle="modal" data-target="#modalclient{{$v->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                                </svg></a>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalclient{{$v->id}}">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Affecter à un client</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="{{route('postligne_vente_client')}}" method="POST">
                                                        @csrf
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            @include('ligne_vente_client')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button class="btn btn-primary">Affecter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <td><a href="{{'viewvente/'.$v->id}}" data-toggle="modal" data-target="#modalvente{{$v->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg>
                                            </a></td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalvente{{$v->id}}">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <strong>
                                                            <h4 class="modal-title" style="color:darkblue ;">FACTURE NUMÉRO {{ $v->num_vente }}</h4>
                                                        </strong>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- <form action="" method="POST">
                                                        @csrf -->
                                                    <!-- Modal body -->
                                                    <div class="modal-body" id="view">
                                                        @include('viewvente')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button onclick="$('#modalvente{{$v->id}}').print();" class="btn btn-primary">Imprimer</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @can('Gerant')
                                        <td><a href="{{'deletevente/'.$v->id}}" onclick="return confirm('Etes vous sure de vouloir supprimer la vente numéro {{$v->num_vente}} de la liste des ventes ?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg></a></td>@endcan
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
                                        foreach ($tabvente as $v) {
                                            $total += $v->montant;
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
<div class="modal fade" id="modalajoutachat">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="height:560px; width:700px;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h7 class="modal-title">Nouvelle Vente</h7>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('postvente')}}" method="POST">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    @include('vente')
                </div>
                <div class="modal-footer">
                    <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary">Vendre</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $.fn.extend({
        print: function() {
            var frameName = 'printIframe';
            var doc = window.frames[frameName];
            if (!doc) {
                $('<iframe>').hide().attr('name', frameName).appendTo(document.body);
                doc = window.frames[frameName];
            }
            doc.document.body.innerHTML = this.html();
            doc.window.print();
            return this;
        }
    });
</script>
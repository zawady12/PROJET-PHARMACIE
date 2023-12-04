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
        <h1>Liste Dettes Clients</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste dette clients</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="dashboard">
        <div class="row">
            <div>
                <div class="container">
                    <br>
                    <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1000px;">
                        <div class="container" style="width: 90%; height:400px">
                            <br>
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Numéro de vente</th>
                                        <th>Client</th>
                                        <th>Montant dû</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tabligne_vente_client as $v)
                                    <tr>
                                        <td>{{ $v->vente['num_vente'] }}</td>
                                        <td>{{ $v->client['nom'] }}</td>
                                        <td>{{ $v->vente['montant'] }}</td>
                                        <td><a href="{{'viewligne_vente_client/'.$v->id}}" data-toggle="modal" data-target="#modalligne_vente_client{{$v->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg>
                                            </a></td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalligne_vente_client{{$v->id}}">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <strong>
                                                            <h4 class="modal-title" style="color:darkblue ;">FACTURE NUMÉRO {{ $v->vente['num_vente'] }}</h4>
                                                        </strong>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- <form action="" method="POST">
                                                        @csrf -->
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        @include('viewligne_vente_client')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button onclick="$('#modalligne_vente_client{{$v->id}}').print();" class="btn btn-primary">Imprimer</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <td><span class="text" style="color:darkblue; " ;>TOTAL DETTES</span></td>
                                    <td></td>
                                    <td> <?php
                                            $total = 0.00;
                                            foreach ($tabligne_vente_client as $v) {
                                                $total += $v->vente['montant'];
                                            }
                                            print $total . " " . "FC";
                                            ?></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <center>@if ($errors->any())
            <div class="alert alert-white" style="width:80% ; color:red;">
                {{ $errors }}
            </div>
            @endif
        </center>
    </section>
</main>
@include('foot')
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
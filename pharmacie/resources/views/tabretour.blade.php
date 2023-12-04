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
        <h1>Liste des retours</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste des retours</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="dashboard">
        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-xl-3 col-md-5 mb-4">
                <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1300px;">
                    <br>
                    <div class="container" style="width: 100%; height:500px">
                        <br>
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Num livraison</th>
                                    <th>Fournisseur</th>
                                    <th>Date livraison</th>
                                    <th>Motif</th>
                                    <th>Prix fournisseur</th>
                                    <th>Quantité livrée</th>
                                    <th>Quantité retour</th>
                                    <th>Montant Initial</th>
                                    <th>Montant retour</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($retour as $p)
                                <tr>
                                    <td>{{ $p['num_livraison']}}</td>
                                    <td>{{ $p->fournisseur['nom']}}</td>
                                    <td>{{ $p['date_liv']}}</td>
                                    <td>{{ $p['motif']}}</td>
                                    <td>{{ $p['prix_fournisseur']}}</td>
                                    <td>{{ $p['qté_liv']}}</td>
                                    <td>{{ $p['qté_retour']}}</td>
                                    <td>{{ $p['montant_initial']}}</td>
                                    <td>{{ $p['montant_retour']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                    <td><span class="text" style="color:darkblue; " ;>TOTAL RETOUR</span></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <?php 
                                        $total = 0.00;
                                        foreach($retour as $p)
                                        {
                                        $total +=$p->montant_retour ;
                                        }
                                        Print $total." "."FC";     
                                        ?>
                                    </td>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('foot')
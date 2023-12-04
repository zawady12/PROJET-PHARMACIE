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
        <h1>Historique ventes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste Historique ventes</li>
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
                                        <th>Identifiant</th>
                                        <th>Quantité</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ventes as $vent)
                                    @foreach($vent as $v)
                                    @php
                                    $some = json_decode($v);
                                    $nom = $some->nom;
                                    $id = $some->prenom;
                                    $message = $some->message;
                                    @endphp
                                    <tr>
                                        <td>{{$nom}}</td> 
                                        <td>{{$id}} FC</td> 
                                        <td>{{$message}}</td> 
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('foot')

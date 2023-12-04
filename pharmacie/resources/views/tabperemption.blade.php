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
        <h1>Liste péremptions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste péremptions</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="dashboard">
        <div class="row">
            <div>
                <div class="container">
                    <br>
                    <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1000px;">
                        <div class="container" style="width: 90%; height:600px">
                            <br>
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sujet</th>
                                        <th>Date de péremption</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($peremption as $peremp)
                                    @foreach($peremp as $p)
                                    @php
                                    $some = json_decode($p);
                                    $nom = $some->nom;
                                    $id = $some->id;
                                    $message = $some->message;
                                    @endphp
                                    <tr>
                                        <td>{{$nom}}</td>
                                        <td>{{$id}}</td>
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
        <br>
        <center>@if ($errors->any())
            <div class="alert alert-white" style="width:80% ; color:red;">
                {{ $errors }}
            </div>
            @endif
        </center>


    </section>
</main>
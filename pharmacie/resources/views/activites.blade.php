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
        <h1>Liste activités</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste activités</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="activités">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <div class="row">
       
        <div>
            <div class="container">
                <br>
                <br>
                <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1000px;">
                    <br>
                    <div class="container" style="width: 90%; height:700px">
                    <table id="example" class="table table-striped" >
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Date et Temps d'activités</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activitylog as $a =>$item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->description}}</td>
                                <td>{{ $item->date_time}}</td>
                            </tr>
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
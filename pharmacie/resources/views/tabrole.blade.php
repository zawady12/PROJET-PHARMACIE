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
        <h1>Liste Rôles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste Rôles</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="dashboard">
    <link rel="stylesheet" role="text/css" href="DataTables/datatables.min.css" />
    <script role="text/javascript" src="DataTables/datatables.min.js"></script>
    <div class="row">
        <div>
            <div class="container">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1000px;">
                    <br>
                    <div class="container" style="width: 90%; height:400px">
                    <table id="example" class="table table-striped" >
                        @if(session('success'))
                        <div class="alert alert-danger">
                            {{ session('success') }}
                        </div>
                        @endif
                        <thead>
                            <tr>
                                <th>Rôle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($role as $ro)
                            <tr>
                                <td>{{ $ro['libelle']}}</td>
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

@include('footer')
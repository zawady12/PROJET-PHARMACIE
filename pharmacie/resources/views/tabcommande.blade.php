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
        <h1>Liste Commandes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste Commandes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="Commandes">
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div>
                <div class="container">
                    <div class="card o-hidden border-0 shadow-lg my-1" style="width: 1000px;">
                        <br>
                        <div class="container" style="width: 90%; height:400px">
                            <table id="example" class="table table-striped">
                                @if(session('success'))
                                <div class="alert alert-danger">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <thead>
                                    <tr>
                                        <th>Numéro Commande</th>
                                        <th>Description</th>
                                        <th>Responsable de la commande</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tabcommande as $c)
                                    <tr>
                                        <td>{{ $c['num_commande']}}</td>
                                        <td>{{ $c['description']}}</td>
                                        <td>{{ $c->user['prenom']}}</td>
                                        <td>@can('Gerant')<a href="{{'editcommande/'.$c['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a>@endcan</td>
                                        <td>@can('Gerant')<a href="{{'deletecommande/'.$c['id']}}" onclick="return confirm('Etes vous sure de vouloir supprimer {{$c->num_commande}} {{$c->prenum_commande}} de la liste des commandes ?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg></a>@endcan</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>@if ($errors->any())
            <div class="alert alert-white" style="width:80% ; color:red;">
                {{ $errors }}
            </div>
            @endif
        </center>
    </section>
</main>

        @include('foot')
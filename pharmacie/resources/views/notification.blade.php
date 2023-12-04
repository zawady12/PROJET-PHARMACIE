@include('sidebar')
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
        <h1>Notifications</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Notifications</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <br>
        <br>
        <div class="row">
            <table id="example" class="table table-striped">
                <br>
                <thead>
                    <tr>
                        <th>identifiant</th>
                        <th>Sujet</th>
                        <th>Action</th>
                        <th>Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach(auth()->user()->unReadNotifications as $n)
                    <tr>
                        <td>{{$n->data['id']}}</td>
                        <td> {{$n->data['nom']}}</td>
                        <td>{{$n->data['message']}}</td>
                        <td>{{$n->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>
@include('foot')
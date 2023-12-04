@include('sidebar')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="DataTables/datatables.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="DataTables/datatables.min.js"></script>
<main id="main" class="main">
    <div class="pagetitle">
        <h1> Commandes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                <li class="breadcrumb-item active"> Commandes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="Commandes">
        <x-guest-layout>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="card o-hidden border-0 shadow-lg my-1" style="width: 800px;">
                    <div class="card-header" style="background-color:white ;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                            </div>
                            <div class="text-right">
                                <a href="tabligne_commande_produit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-eye mr-1"></i>Liste commande</a>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('postcommande') }}">
                        @csrf
                        <br>
                        <div class="container" style="width: 70%; height:500px">
                            <br>
                            <br>
                            @if(session('success'))
                            <div class="alert alert-primary">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if(session('fail'))
                            <div class="alert alert-success">
                                {{ session('fail') }}
                            </div>
                            @endif
                            <!-- num_commande -->
                            <x-label for="num_commande" :value="__('Numéro commande')" />
                            <x-input id="num_commande" class="block mt-1 w-full" type="number" name="num_commande" :value="old('num_commande')" required autofocus />
                            <br>
                            <!-- description -->
                            <x-label for="description" :value="__('Description')" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                            <br>
                            <!-- Role -->
                            <x-label for="user_id" :value="__('Responsable de la commande')" />
                            <select name="user_id" id="" class="form-control"><br>
                                @foreach($user as $u)
                                <option value="{{ $u->id }}">{{ $u->prenom}}</option>
                                @endforeach
                            </select>
                            <div class="flex items-center justify-end mt-4">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-guest-layout>
    </section>
</main>
@include('foot')
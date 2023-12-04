<x-guest-layout>
    <style>
        .c {
            margin-left: 40%;
        }

        .p {
            margin-left: 90%;
        }
        .info{
            margin-left: 60%;
            margin-top: -75px;
        }
    </style>


    <div class="c">
        <div class="row"><strong>
                <h1 style="color:darkblue;">Pharmacie</h1>
            </strong></div>
    </div>
    <br>
<strong>FACTURE</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{ $v->vente['date_vente']}}

    <hr style="background-color:darkblue;" width="100%;" height="1000px">
    <br>
    <div class="infos">
        <h5 style="color:darkblue;">Entreprise</h5>
        <h5>Pharmacie Mame Fatou Diop Yoro</h5>
        <h5>Senegal, Dakar</h5>
        <h5>Médina Rue 12x11</h5>
    </div>
    <div class="info">
    <h5 style="color:darkblue;">Destinataire</h5>
    <h5>{{ $v->client['nom']}} {{ $v->client['prenom']}}</h5>
        <h5>{{ $v->client['tel']}}</h5>
        <h5>{{ $v->client['adresse']}}</h5>
    </div>
    <br>
    <div class="infoz">
    <h5 style="color:darkblue;">Infos</h5>
    <h5>Dr. Pharmacien</h5>
    <h5>DCI : {{ $v->vente->produit['dci']}}</h5>
    <h5>{{ $v->vente->produit->categorie['type']}}</h5>
    </div>
    <br>
    <hr style="background-color:dark-blue;" width="100%;" height="50%">
    <br>
    Produit :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    {{ $v->vente->produit['nom_commercial']}}
    <br>
    Prix : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{ $v->vente['prix_vente'] }} x {{ $v->vente['qnté_vendu']}}
    <br>
    --------------------------------------------------------------------
    <br>
    Total : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;
    {{ $v->vente['montant']}}
</x-guest-layout>
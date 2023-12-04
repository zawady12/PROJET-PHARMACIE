
->retour
<?php
$date = "09000000";
$data = "09000000";
$lien = 'retourbon_livraison/' . $p->id;
$route = route('postretour');
if (strtotime($p['date_liv']) - strtotime($currentTime) <= $date && strtotime($p->produit['date_peremption']) - strtotime($currentTime) <= $data) {
    echo '<a href="{{$lien}}" data-toggle="modal" data-target="#modalretour{{$p->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                        </svg></a>
                                        <div class="modal fade" id="modalretour{{$p->id}}">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Retour chez le fournisseur</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="{{$route}}" method="POST">
                                                        @csrf
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                        @include("retour")
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button class="btn btn-primary">Retour au fournisseur</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>';
} ?>
@endcan
->commande


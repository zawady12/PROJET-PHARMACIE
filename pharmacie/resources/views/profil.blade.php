
@include('sidebar')

<style>
    .avatar {
        margin-top: -50px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Mon profil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @can('Gerant')<img src="assets1/img/doctors/doctors-1.jpg" alt="Profile" class="rounded-circle" style="width:60%;">@endcan
                    @can('vendeur')<img src="assets1/img/testimonials/testimonials-3.jpg" alt="Profile" class="rounded-circle" style="width:60%;">@endcan

                        <h7> {{ Auth::user()->prenom }} {{ Auth::user()->name }} </h7>
                        <h8>{{ Auth::user()->role->libelle }}</h8>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="role"><i class="bi bi-role"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer profil</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer
                                    Mot de passe</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Details du profil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nom entier</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->prenom }} {{ Auth::user()->name }}</div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Grade</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->role->libelle }}</div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telephone</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->tel }}</div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">adressee</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->adresse }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="/updatepersonnel" method="POST">

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="prenom" class="col-md-4 col-lg-3 col-form-label">Prenom</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="prenom" type="text" class="form-control" id="prenom" value="{{ Auth::user()->prenom }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="tel" class="col-md-4 col-lg-3 col-form-label">Telephone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="tel" type="text" class="form-control" id="tel" value="{{ Auth::user()->tel }}">
                                        </div>
                                    </div>
    

                                    <div class="row mb-3">
                                        <label for="adresse" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="adresse" type="text" class="form-control" id="adresse" value="{{ Auth::user()->adresse }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Enregistrer modifications</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">



                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

        @include('foot')
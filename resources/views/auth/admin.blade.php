@extends('base')

@section('login')
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../assets/img/home.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route('proseslogin') }}">
                    @csrf
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Login</p>
                    </div>


                    <!-- Username input -->
                    <!-- <div class="form-outline mb-4">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control form-control" placeholder="Masukkan Nama Lengkap Anda" />
                    </div> -->


                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control" placeholder="Masukkan Alamat Email Anda" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control form-control" placeholder="Masukkan Password Anda" />
                    </div>


                    <div class="text-center text-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    </div>


                </form>
            </div>
        </div>
    </div>

</section>
@endsection('login')
@extends('base')

@section('regis')
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../assets/img/home.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route('prosesregister') }}">
                    @csrf
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Pendaftaran</p>
                    </div>


                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control form-control" placeholder="Masukkan Nama Lengkap Anda" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control form-control" placeholder="Masukkan Alamat Email Anda" />
                    </div>

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="address" class="form-control form-control" placeholder="Masukkan Alamat Anda" />
                    </div>

                    <div class="text-center text-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn" style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-5 mb-0">Or</p>
                    </div>


                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Daftar dengan</p>
                        <a href="{{ route('google.login') }}" class="btn btn-primary">
                            <i class="fa fa-google mr-2"></i>
                        </a>

                    </div>



                </form>
            </div>
        </div>
    </div>

</section>
@endsection('regis')
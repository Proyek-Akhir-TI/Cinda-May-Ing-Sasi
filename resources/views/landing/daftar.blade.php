<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bengkel Mobil Online - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('template/landing/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<style>
    body {
        background-image: url("../template/img/bgbg.jpg");
        background-size: cover;
    }
    </style>
<body>

    <div class="d-flex justify-content-center container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Mendafar Akun!</h1>
                                    </div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>	
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Cek kembali username atau password</strong>
                                    </div>
                                    @endif
                                    <form action="{{ route('landing.daftar-post') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}" name="nama" id="nama" required>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}" name="alamat" id="alamat" required>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telp">No Telepon</label>
                                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{old('no_telp')}}" name="no_telp" id="no_telp" required>
                                            @error('no_telp')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" name="username" id="username" required>
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" id="email" required>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" name="password" id="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </button >
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
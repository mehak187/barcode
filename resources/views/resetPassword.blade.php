<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin-4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- ============================= Start ================================  -->
    <section class="description-sec px-sm-0 px-2">
        <div class="container">
            <div class="row des-shadow2">
                <div
                    class="col-md-6 bg-zinc px-sm-5 px-4 py-3 des-shadow des-bor d-flex flex-column justify-content-center">
                    <div class="text-center login-img">
                        <img src="{{ asset('/img/logo.png') }}" alt="" class="img-fluid">
                    </div>
                    <h2 class="des-cl fw-bold">Description Heading</h2>
                    <p class="des-cl">Quisque sit amet sagittis erat. Duis pharetra ornare venenatis. Nulla maximus
                        porta velit ut
                        molestie. Proin quis convallis mauris. In facilisis justo at mi pharetra lobortis. s.</p>
                    <!-- --------------------------------- slider --------------------------  -->
                    <div class="main-slide">
                        <div class="box d-flex flex-column justify-content-center py-3 mx-3">
                            <div class="box-img">
                                <img src="{{ asset('/img/Group 42046.png') }}" alt="barcode"
                                    class="w-100 h-100 img-bar">
                            </div>
                        </div>
                        <div class="box d-flex flex-column justify-content-center py-3 mx-3">
                            <div class="box-img">
                                <img src="{{ asset('/img/Group 42046.png') }}" alt="barcode"
                                    class="w-100 h-100 img-bar">
                            </div>
                        </div>
                        <div class="box d-flex flex-column justify-content-center py-3 mx-3">
                            <div class="box-img">
                                <img src="{{ asset('/img/Group 42046.png') }}" alt="barcode"
                                    class="w-100 h-100 img-bar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 py-4 px-sm-5 px-4 des-bor2 ">
                    <div class="text-center login-img">
                        <img src="{{ asset('/img/logo.png') }}" alt="" class="img-fluid">
                    </div>
                    <h2 class="text-center">Welcome to Our System</h2>
                    <p class="text-center">In publishing and graphic design, Lorem ipsum is a placeholder text commonly
                        used to
                        demonstrate the visual form of a document or a typeface without</p>
                    <div class="row">
                        <div class="col-sm-10 m-auto">

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <h3>Reset Password</h3>
                                    <div class="mt-3 for-des">
                                        <input type="email"
                                            class="form-control border-0 text-secondary py-3 shadow-none @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="btn border rounded-pill px-5 py-2 pri-btn text-white">Submit</button>

                                        {{-- <input type="submit" value="submit" class="btn border rounded-pill px-5 py-2 pri-btn text-white"
                    data-bs-toggle="modal" data-bs-target="#myModal"> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="modal" id="myModal">
        <div class="modal-dialog d-flex align-items-center h-100">
            <div class="modal-content">

                <!-- ============================= Start ================================  -->

                <div class="bg-white shadow rounded-3 position-relative px-4 py-5">
                    <div class="pb-a">
                        <i class="fa-solid fa-xmark blue-bg rounded-circle p-2 text-white fs-6"
                            data-bs-dismiss="modal"></i>
                    </div>
                    <div class="text-center">
                        <i class="fa-solid fa-check bg-warning rounded-circle text-white fs-5 p-3"></i>
                    </div>
                    <h3 class="blue-cl fs-4 fw-bold text-center mt-2">Reset Password</h3>
                    <p class="blue-cl fs-6 text-center">A Password Reset Email is sent to your Email address. Please
                        open the link
                        and reset password.</p>
                    <div>
                        <a href="newPassword" class="text-decoration-none">
                            <button
                                class="btn btn-warning w-100 rounded-pill text-white fs-5 mt-3 py-2 px-3 d-block">Got
                                it</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>

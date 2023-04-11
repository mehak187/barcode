<!doctype html>
<html lang="en">

<head>
    @include('layouts.adminLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Enter New Customer</title>
</head>

<body>
    <header>
        <div class="mx-3 my-2 rounded-4 shadow d-flex align-items-center py-2 px-4 justify-content-between bg-warning">
            <a href="dashboard" class="bar-logo">
                <img src="{{ asset('/img/logo.png') }}" alt="">
            </a>
            <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">Enter New Customer</h1>
            <div class="d-flex align-items-center">
                <div class="me-4">
                    <a class="" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off text-white"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <a href="#" class="d-block p-img">
                    <img src="{{ asset('/img/member.png') }}" class="rounded-circle w-100" alt="">
                </a>
            </div>
        </div>
    </header>
    <!-- ============================= Start ================================  -->
    <div class="container">
        <a href="customersList" class="text-decoration-none py-3 d-flex align-items-center">
            <i class="fa-solid fa-chevron-left text-warning border border-warning p-2 rounded-3"></i>
        </a>
        <div class="row shadow bg-fd px-3 py-4 rounded-3">
            <div class="col px-2">

                {{-- ----------form------ --}}
                <form method="POST" action="/saveGym" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative position-rel">
                        <img src="{{ asset('/img/member.png') }}"
                            class="border border-3 rounded-circle w-100 h-100 mem-img2" id="blah" alt="">
                        <div class="position-img d-flex flex-column justify-content-end pb-4">
                            <label for="upload"><i class="fa-solid fa-camera text-white"></i></label>
                            <input type="file" id="upload" class="d-none" name="gymImg"
                                onchange="readURL(this);">
                        </div>
                    </div>
                    @error('gymImg')
                        <span class="error text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="row">
                        <input type="hidden" class="form-control shadow-none text-secondary" name="role"
                            placeholder="role" value="1">

                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" name="name"
                                    value="{{ old('name') }}" id="m-name" placeholder="Gym Name">
                                @error('name')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" name="fname"
                                    value="{{ old('fname') }}" id="m-name" placeholder="First Name">
                                @error('fname')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" name="lname"
                                    value="{{ old('lname') }}" id="m-name" placeholder="Last Name">
                                @error('lname')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="tel" class="form-control shadow-none text-secondary" name="contact"
                                    value="{{ old('contact') }}" id="m-email" placeholder="Phone number">
                                @error('contact')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="email" class="form-control shadow-none text-secondary" name="email"
                                    value="" id="m-email" placeholder="Email">
                                @error('email')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="password" class="form-control shadow-none text-secondary"
                                    name="password" id="m-contact" placeholder="Password">
                                @error('password')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                 
                   
                    <div class="row mt-5">
                        <h2 class="blue-cl fw-bold fs-2">Location</h2>
                    
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <label for="address-1" class="form-label blue-cl fw-bold px-1 fs-5">Address Line
                                    1:</label>
                                <input type="text" class="form-control shadow-none text-secondary" id="address-1"
                                    placeholder="Address Line 1" name="address1" value="{{ old('address1') }}">
                                @error('address1')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <label for="address-2" class="form-label blue-cl fw-bold px-1 fs-5">Address Line
                                    2:</label>
                                <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="Address Line 2" name="address2" value="{{ old('address2') }}">
                                @error('address2')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="City" name="city" value="{{ old('city') }}">
                                @error('city')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="State" name="state" value="{{ old('state') }}">
                                @error('state')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="Zip" name="zip" value="{{ old('zip') }}">
                                @error('zip')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-3">
                                    <button type="submit" name="submit"
                                        class="btn btn-warning border px-5 py-2 rounded-pill text-white">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="copyright pt-3 mb-2 mx-3">
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Powered and generated by <b>KeyTag</b>. Maintained and developed by <b> Fabtechsol</b></p>
    </section>
</body>
{{-- ------------------------- --}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/js/main.js') }}"></script>

</html>

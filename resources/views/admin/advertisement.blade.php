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
    <title>Advertisement</title>
</head>

<body>
    <header>
        <div class="mx-3 my-2 rounded-4 shadow d-flex align-items-center py-2 px-4 justify-content-between bg-warning">
            <a href="dashboard" class="bar-logo">
                <img src="{{ asset('/img/logo.png') }}" alt="">
            </a>
            <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">Advertisement</h1>
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
    <div class="container mt-5">
        <div class="row shadow bg-fd px-3 py-4 rounded-3">
            <div class="col px-2">

                {{-- ----------form------ --}}
                <form method="post" action="/saveAd" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative position-rel">
                        <img src="{{ asset('/img/Group 42046.png') }}"
                            class="border border-3 w-100 h-100 mem-img2" id="blah" alt="">
                        <div class="position-img d-flex flex-column justify-content-end pb-4">
                            <label for="upload"><i class="fa-solid fa-camera text-white"></i></label>
                            <input type="file" id="upload" class="d-none" name="image"
                                onchange="readURL(this);" required="">
                        </div>
                    </div>
                    {{-- @error('gymImg')
                        <span class="error text-danger">
                            {{ $message }}
                        </span>
                    @enderror --}}
                    <div class="row">
                        <input type="hidden" class="form-control shadow-none text-secondary" name="role"
                            placeholder="role" value="1">

                            <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" required="" class="form-control shadow-none text-secondary" name="title"
                                    value="{{ old('title') }}" id="m-name" placeholder="Advertisement">
                                    {{-- @error('name')
                                        <span class="error text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror --}}
                            </div>
                        </div>
                    </div>
                 
                   
                        <div class="row mt-2">
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
    @if(count($ads)>0) 
        <section class="mt-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row bg-white shadow px-4 px-xxl-5 py-3 mt-4 rounded-4 det-box">
                            <div class="col-12" id="customer-list">
                                    <!-- --all customers---- -->
                                    <div class="customer-all-main">
                                        <h6 class="fw-bold fs-4 text-uppercase blue-txt">All Ads</h6>
                                        @foreach ($ads as $ad)
                                            <div class="bg-grey row px-3 align-items-center py-3 rounded-3 my-3 customer-all service-box">
                                                <div class="col-md-2 col-12">
                                                    <img src="{{$ad['image']}}" style="height:150px; width:150px; max-width:100%; border-radius:10px"
                                                        alt="">
                                                </div>
                                                <div class="col-md-9 col-11">
                                                    <h6 class="mb-0 fs-6 searchable">{{ $ad['title'] }}</h6>
                                                </div>
                                                <div class="col-md-1 d-flex justify-content-end align-items-center">
                                                    <a href="/deleteAds/{{$ad['id']}}"
                                                        class="bg-blue-g bs-opacity rounded-circle px-2 py-1 d-inline-block">
                                                    <i class="fas fa-trash text-light fs-5"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="copyright pt-3 mb-2 mx-3">
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Powered and generated by <b>KeyTag</b>. Maintained and developed by <b> Fabtechsol</b></p>
    </section>
    <style>
        .mem-img2 {
            border-radius: 10px;
            max-width: 100%;
        }
        .position-rel {
    max-width: 200px;
    height: 200px;
        }

        .position-img {
            border-radius: 10px
        }
    </style>
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.userLinks')
    <title>Update Member</title>
</head>
  <body >
    <header>
      <div class="row mx-3 my-2 rounded-4 shadow d-flex align-items-center py-2 px-4 justify-content-between bg-warning">
          <div class="col-lg-6 mt-2 mt-xl-0 col-xl-5 d-flex align-items-center justify-content-center justify-content-lg-start justify-content-xl-between">
            <a href="/member" class="bar-logo me-4">
                <img src="{{asset('/img/logo.png')}}" alt="">
            </a>
            <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">{{$name}}'s gym</h1>
          </div>
          <div class="col-lg-6 mt-2 mt-xl-0 col-xl-5 d-sm-flex flex-wrap align-items-center justify-content-xl-between justify-content-center justify-content-lg-end">
              <div class="d-flex align-items-center justify-content-center me-3">
                  <a href="/member" class="text-light text-center d-block text-decoration-none bg-blue-g bs-opacity px-3 py-2 rounded-3 mt-sm-0 me-3 " >
                      <i class="fas fa-home text-light  me-2"></i>Members</a>
                  <a href="/gymsTiming" class="blue-txt text-center d-block text-decoration-none bg-yellow bs-opacity px-3 py-2 rounded-3 mt-sm-0" >
                      <i class="fas fa-clock blue-txt me-2"></i>Schedule</a>
              </div>
              <!-- ------profile---- -->
              <div class="d-flex align-items-center justify-content-center mt-3 mt-sm-0">
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
                  <img src="<?php echo asset("myimgs/" .$photo) ?>" class="rounded-circle w-100" alt="">
                </a>
              </div>
          </div>
      </div> 
</header>
    <!-- ============================= Start ================================  -->
      <div class="container">
        <div class="py-3 d-flex align-items-center"> 
          <a href="/member">
            <i class="fa-solid fa-chevron-left text-warning border border-warning p-2 rounded-3"></i>
          </a>
          <h2 class="blue-cl fw-bold ps-3 m-0 fs-3">Update Member</h2>
        </div>
        <div class="row shadow bg-fd px-3 py-4 rounded-3">
           <div class="col-12 px-2">
              <form method="POST" action="/editmember" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-sm-6">
                  <input type="hidden" class="form-control shadow-none text-secondary" id="m-name" value="{{$upmembers->id}}" name="id">
                  <div class="mt-3">
                    <label for="m-name" class="form-label blue-cl fw-bold px-1 fs-5">Member Name:</label>
                    <input type="text" class="form-control shadow-none text-secondary" id="m-name" value="{{$upmembers->name}}" name="name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mt-3">
                    <label for="m-email" class="form-label blue-cl fw-bold px-1 fs-5">Member Email:</label>
                    <input type="email" class="form-control shadow-none text-secondary" id="m-email" value="{{$upmembers->email}}" name="email">
                  </div>
                </div>
                </div>
                <div class="row mt-5">
                  <h2 class="blue-cl fw-bold fs-2">Location</h2>
                  <div class="col-sm-6">
                    <div class="mt-3">
                      <label for="address-1" class="form-label blue-cl fw-bold px-1 fs-5">Address Line 1:</label>
                      <input type="text" class="form-control shadow-none text-secondary" id="address-1" value="{{$upmembers->address1}}" name="address1">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-3">
                      <label for="address-2" class="form-label blue-cl fw-bold px-1 fs-5">Address Line 2:</label>
                      <input type="text" class="form-control shadow-none text-secondary" id="address-2" value="{{$upmembers->address2}}" name="address2">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-3">
                      <input type="text" class="form-control shadow-none text-secondary" id="address-2" value="{{$upmembers->city}}" name="city">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-3">
                      <input type="text" class="form-control shadow-none text-secondary" id="address-2" value="{{$upmembers->state}}" name="state">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-3">
                      <input type="text" class="form-control shadow-none text-secondary" id="address-2" value="{{$upmembers->zip}}" name="zip">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mt-3">
                      <label for="m-contact" class="form-label blue-cl fw-bold px-1 fs-5">Contact</label>
                      <input type="tel" class="form-control shadow-none text-secondary" id="m-contact" value="{{$upmembers->contact}}" name="contact">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-3">
                      <label for="m-bar" class="form-label blue-cl fw-bold px-1 fs-5">Bar Codes</label>
                      <select name="barcode" id="" class="form-control shadow-none text-secondary">
                        <option value="{{str_pad($upmembers->barcode, 10, '0', STR_PAD_LEFT) }}">{{str_pad($upmembers->barcode, 10, '0', STR_PAD_LEFT) }}</option>
                        @foreach ($results as $barnmbr)
                          <option  value="{{ str_pad($barnmbr, 10, '0', STR_PAD_LEFT) }}">{{ str_pad($barnmbr, 10, '0', STR_PAD_LEFT) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-3">
                      <label for="m-contact" class="form-label blue-cl fw-bold px-1 fs-5">Password</label>
                      <input type="tel" class="form-control shadow-none text-secondary" id="m-contact" value="{{$upmembers->show_password}}" name="password">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-5">
                      <button type="submit" class="bg-transparent border-0">
                      <a class="btn btn-warning text-decoration-none rounded-pill text-white px-4 py-2">Update Barcode</a>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
           </div>
        </div>
      </div>
  </body>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('/js/main.js')}}"></script>
</html>
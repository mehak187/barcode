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
        <div class="mx-3 my-2 rounded-4 shadow d-flex align-items-center py-2 px-4 justify-content-between bg-warning">
            <a href="dashboard" class="bar-logo">
                <img src="{{ asset('/img/logo.png') }}" alt="">
            </a>
            <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">Customers List</h1>
            <div class="d-flex align-items-center">
                <div class="me-4">
                    <a class="" href="{{route('logout')}}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off text-white"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
                <a href="#" class="d-block p-img">
                    <img src="{{ asset('/img/dev-2.png') }}" class="rounded-circle w-100" alt="">
                </a>
            </div>
        </div>
    </header>
    <!-- ============================= Start ================================  -->
      <div class="container">
        <div class="py-3 d-flex align-items-center"> 
          <a href="/member">
            <i class="fa-solid fa-chevron-left text-warning border border-warning p-2 rounded-3"></i>
          </a>
          <h2 class="blue-cl fw-bold ps-3 m-0 fs-3">Update Gym</h2>
        </div>
        <div class="row shadow bg-fd px-3 py-4 rounded-3">
           <div class="col-12 px-2">
              <form method="POST" action="/editGym" id="form" enctype="multipart/form-data">
                @csrf
                  <div class="position-relative position-rel">
                        <img src="<?php echo asset('/myimgs/' .$upGym->photo) ?>"
                            class="border border-3 rounded-circle w-100 h-100 mem-img2" id="blah" alt="">
                        <div class="position-img d-flex flex-column justify-content-end pb-4">
                            <label for="upload"><i class="fa-solid fa-camera text-white"></i></label>
                            <input type="file" id="upload" class="d-none" name="gymImg"
                                onchange="readURL(this);">
                        </div>
                    </div>
                <div class="row">
                       <input type="hidden" class="form-control shadow-none text-secondary" id="m-id" value="{{$upGym->id}}" name="id">

                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" name="name"
                                value="{{$upGym->name}}"  id="m-name" placeholder="Gym Name" required>
                               
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" name="fname"
                                value="{{$upGym->fname}}"  id="m-name" placeholder="First Name" required>
                               
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" name="lname"
                                value="{{$upGym->lname}}" id="m-name" placeholder="Last Name" required>
                               
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="tel" class="form-control shadow-none text-secondary" name="contact"
                                value="{{$upGym->contact}}" id="m-email" placeholder="Phone number" required>
                               
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="email" class="form-control shadow-none text-secondary" name="email"
                                value="{{$upGym->email}}" id="m-email" placeholder="Email" required>
                                
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="password" class="form-control shadow-none text-secondary"
                                 name="password" value="{{$upGym->show_password}}" id="m-contact" placeholder="Password" required>
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
                                    placeholder="Address Line 1" name="address1" value="{{$upGym->address1}}" required>
                         
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <label for="address-2" class="form-label blue-cl fw-bold px-1 fs-5">Address Line
                                    2:</label>
                                <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="Address Line 2" name="address2" value="{{$upGym->address2}}" required>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="City" name="city" value="{{$upGym->city}}" required>
                              
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="State" name="state" value="{{$upGym->state}}" required>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="Zip" name="zip" value="{{$upGym->zip}}" required>
                              
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
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Developed & powered by  <b>KEYTAG1 LLC.</b></p>
    </section>
<style>
    input::placeholder {
        color: rgba(0,0,0,0.3) !important
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('/js/main.js')}}"></script>
</html>
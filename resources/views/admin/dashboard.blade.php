<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.adminLinks')
    <title>Dashboard</title>
</head>
<body>
    <header>
        <div class="mx-3 my-2 rounded-4 shadow d-flex align-items-center py-2 px-4 justify-content-between bg-warning">
            <a href="dashboard" class="bar-logo">
                <img src="{{asset('/img/logo.png')}}" alt="">
            </a>
            <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">Dashboard</h1>
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
                    <img src="{{asset('/img/dev-2.png')}}" class="rounded-circle w-100" alt="">
                </a>
            </div>
        </div>
    </header>
      <section class="mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="bg-white shadow px-5 py-4 mt-4 rounded-4">
                        <div class="row bg-grey rounded-3 my-3 p-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-9 col-lg-7 col-xl-6">
                                <h2 class="fs-5 me-lg-4 mb-0 fw-normal text-uppercase text-center text-lg-end blue-txt">Number of customers</h2>
                            </div>
                            <div class="col-lg-3">
                                <p class="fs-4 mb-0 fw-bold text-center text-lg-start blue-txt">{{$totalCustomers}}</p>
                            </div>
                        </div>
                        <div class="row bg-grey rounded-3 my-3 p-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-9 col-lg-7 col-xl-6">
                                <h2 class="fs-5 me-lg-4 mb-0 fw-normal text-uppercase text-center text-lg-end blue-txt">total number of barcodes sold</h2>
                            </div>
                            <div class="col-lg-3">
                                <p class="fs-4 mb-0 fw-bold text-center text-lg-start blue-txt">{{$totalBarcode}}</p>
                            </div>
                        </div>
                        <div class="row bg-grey rounded-3 my-3 p-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-9 col-lg-7 col-xl-6">
                                <h2 class="fs-5 me-lg-4 mb-0 fw-normal text-uppercase text-center text-lg-end blue-txt">total number of barccodes used</h2>
                            </div>
                            <div class="col-lg-3">
                                <p class="fs-4 mb-0 fw-bold text-center text-lg-start blue-txt">{{$totalMembers}}</p>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-8 d-sm-flex justify-content-center">
                                <a href="customersList" class="text-light text-center d-block text-decoration-none bg-blue-g bs-opacity px-3 py-2 rounded-3 me-sm-4">View Customer List</a>
                                <a href="newCustomer" class="text-light text-center d-block text-decoration-none bg-blue-g bs-opacity px-3 py-2 rounded-3 mt-3 mt-sm-0">Add new customer</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>
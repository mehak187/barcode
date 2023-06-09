<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.adminLinks')
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>
    <title>customer details</title>
    <style>
        .my-barcode {
            font-family: 'Libre Barcode 39';
            font-size: 46px;
            transform: scaleY(2);
            letter-spacing: -2.5px;
            line-height: 0.5;
        }
    </style>
</head>
<body>
    <header>
        <div class="mx-3 my-2 rounded-4 shadow d-flex align-items-center py-2 px-4 justify-content-between bg-warning">
            <a href="dashboard" class="bar-logo">
                <img src="{{asset('/img/logo.png')}}" alt="">
            </a>
            <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">Customers List</h1>
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
      
    <!-- --------box-section------- -->
    <section class="my-4">
        <div class="container-fluid px-4 px-sm-5">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
            <!-- -----secondary-heading------ -->
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                 <a href="/customerDetails/{{$gym_id}}" class="border border-warning rounded-2 px-2 py-1 me-2">
                                     <i class="fas fa-chevron-left text-warning lh-1"></i>
                                 </a>
                                 <h3 class="mb-0 blue-txt fs-3 fw-bold">Barcodes of Gym</h3>
                                 <p>
                                   
                                 </p>
                            </div>
                         </div>
                    </div>
            <!-- -----detail boxes----- -->
                    <div class="row bg-white shadow px-2 px-sm-4 px-xxl-5 py-4 mt-4 rounded-4 det-box">
                        <!-- ----box----- -->
                        @if($mUsedBarcodes->isEmpty())
                        <div class="alert alert-danger py-2">
                            No used barcode available
                        </div>
                        @else
                        @foreach ($mUsedBarcodes as $mUsedBarcode)
                            <div class="col-md-6 col-lg-4 col-xl-3 my-3">
                                <div class="bg-grey px-4 py-2 rounded-4 pt-5 d-flex flex-column align-items-center">
                                    <div class="my-barcode mt-4">{{$gym_id}}G{{ ($mUsedBarcode) }}</div>
                                    <p>{{ $mUsedBarcode }}</p>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright pt-3 mb-2 mx-3">
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Developed & powered by  <b>KEYTAG1 LLC.</b></p>
    </section>
</body>
</html>
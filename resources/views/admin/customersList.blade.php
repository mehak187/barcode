<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminLinks')
    @include('layouts.userLinks')
    <title>Customers List</title>
    <style>
        #searcherror {
   display: none;
}
    </style>
</head>
<body>
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
    <!-- --------box-section------- --->
    <section class="mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-11 col-xxl-10">
                    <!-- -----secondary-heading------ -->
                    <div class="row flex-lg-row flex-column justify-content-between align-items-center">
                        <div class="col-lg-5">
                            <h2 class="blue-txt fw-bold fs-4 m-0 px-1 text-uppercase">customer list</h2>
                        </div>
                        <div class="col-lg-7 mt-lg-0 mt-3">
                            <div class="d-flex border border-2 rounded-pill p-2">
                                <input type="search"  id="myinput"
                                    class="form-control w-100 border-0 p-0 px-2 shadow-none rounded-pill"
                                    placeholder="Search by Customer name, gym or store" onkeyup="searchFunction()">
                                <i class="fa-solid fa-magnifying-glass bg-warning rounded-circle p-2 fs-6"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <a href="newCustomer"
                            class="text-light text-center text-decoration-none bg-blue-g bs-opacity px-3 py-2 rounded-pill mt-3 mt-sm-0">Add
                            new customer</a>
                    </div>
                   
                    {{-- ==================================
                                customers-list
                    -================================== --}}
                    <div class="row bg-white shadow px-4 px-xxl-5 py-3 mt-4 rounded-4 det-box">
                        <div class="col-10 col-sm-11" id="customer-list">
                            <!-- --search filter---- -->
                           <div class="search-fil">
                                <h6 class="fw-bold fs-4 text-uppercase blue-txt" id="filter-heading"> </h6>
                                <p class="fw-bold fs-5 text-danger blue-txt" id="error_msg"></p>
                                <p class="fw-bold fs-5 text-danger blue-txt" id="searcherror">
                                    There is no name starting with these letters
                                </p>
                                @if (session('updateSuccess'))
                    <p class="py-2 px-3 bg-success text-white my-3 rounded">
                        {{ session('updateSuccess') }}
                    </p>
                @endif
                                @if(isset($error_message))
                                <div class="alert alert-danger py-2">{{ $error_message }}</div>
                                @endif
                                @if (session('success'))
                                    <div class="row">
                                        <p class="py-2 px-3 bg-success text-white my-3 rounded">
                                            {{ session('success') }}
                                        </p>
                                    </div>
                                @endif
                                @foreach ($gyms as $gym)
                                <div class="bg-grey row px-3 align-items-center py-3 rounded-3 my-3 customer service-box">
                                    <div class="col-sm-11">
                                        <div class="row">
                                        <a href="/updateGym/{{ $gym['id'] }}" class="text-dark text-decoration-none">
                                            <div class="row">
                                            <div class="col-md-6 my-2 my-lg-0 col-xl-4 d-flex align-items-center">
                                                <div class="customer-img me-2">
                                                    <img src="<?php echo asset('myimgs/' . $gym['photo']); ?>" class="rounded-circle " alt="">
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fs-6 searchable" id="gym_name">{{ $gym['name'] }}</h6>
                                                    <p class="mb-0">{{ $gym['fname'] }} {{ $gym['lname'] }}</p>
                                                    <p class="mb-0">{{ $gym['email'] }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-2 my-lg-0 col-xl-4 d-flex align-items-center">
                                                <div class="me-2">
                                                    <i class="fas fa-share text-warning fs-4"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 blue-txt">
                                                        {{ $gym['address1'] }} / {{ $gym['address2'] }}
                                                    </h6>
                                                    <p class="mb-0 blue-txt">
                                                        {{ $gym['city'] }},{{ $gym['state'] }},{{ $gym['zip'] }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-2 my-lg-0 col-xl-2 d-flex align-items-center">
                                                <div class="me-2"><i class="fas fa-phone text-warning"></i></div>
                                                <h6 class="mb-0 text-break">{{ $gym['contact'] }}</h6>
                                            </div>
                                            <div class="col-md-6 my-2 my-lg-0 col-xl-2 d-flex align-items-center">
                                                {{-- fetch-here --}}
                                                <?php $totalBarcode = App\Models\User::join('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
                                                ->where('gym_id', $gym['id'])
                                                ->sum('branches');
                                            ?>
                                                <p class="mb-0 text-warning">{{ $totalBarcode }} Barcodes</p>
                                            </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">
                                        <a href="/customerDetails/{{$gym['id']}}" class="bg-blue-g bs-opacity rounded-circle px-2 py-1 d-inline-block"><i class="fas fa-angle-double-right text-light fs-5"></i></a>
                                    </div>
                                </div>
                            @endforeach
                            
                           </div>
                             <!-- --all customers---- -->
                            <div class="customer-all-main">
                                <h6 class="fw-bold fs-4 text-uppercase blue-txt">All customers</h6>
                                @foreach ($gyms as $gym)
                                    <div class="bg-grey row px-3 align-items-center py-3 rounded-3 my-3 customer-all service-box">
                                        <div class="col-sm-11">
                                            <div class="row ">
                                              <a href="/updateGym/{{ $gym['id'] }}" class="text-dark text-decoration-none">
                                              <div class="row">
                                              <div class="col-md-6 my-2 my-lg-0 col-xl-4 d-flex align-items-center">
                                                    <div class="customer-img me-2">
                                                        <img src="<?php echo asset('myimgs/' . $gym['photo']); ?>" class="rounded-circle "
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fs-6 searchable">{{ $gym['name'] }}</h6>
                                                        <p class="mb-0 text-break">{{ $gym['email'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 my-2 my-lg-0 col-xl-4 d-flex align-items-center">
                                                    <div class="me-2">
                                                        <i class="fas fa-share text-warning fs-4"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 blue-txt">
                                                            {{ $gym['address1'] }} / {{ $gym['address2'] }}
                                                        </h6>
                                                        <p class="mb-0 blue-txt">
                                                            {{ $gym['city'] }},{{ $gym['state'] }},{{ $gym['zip'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 my-2 my-lg-0 col-xl-2 d-flex align-items-center">
                                                    <div class="me-2"><i class="fas fa-phone text-warning"></i></div>
                                                    <h6 class="mb-0">{{ $gym['contact'] }}</h6>
                                                </div>
                                                <div class="col-md-6 my-2 my-lg-0 col-xl-2 d-flex align-items-center">
                                                     {{-- fetch-here --}}
                                                    <?php $totalBarcode = App\Models\User::join('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
                                                    ->where('gym_id', $gym['id'])
                                                    ->sum('branches');
                                                     ?>
                                                    <p class="mb-0 text-warning">{{ $totalBarcode }} Barcodes</p>
                                                </div>
                                              </div>
                                              </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 d-flex justify-content-end align-items-center">
                                            <a href="/customerDetails/{{$gym['id']}}"
                                                class="bg-blue-g bs-opacity rounded-circle px-2 py-1 d-inline-block">
                                            <i class="fas fa-angle-double-right text-light fs-5"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                  
                        <!-- ----search-by-alphabet----- -->
                        <div class="col-2 col-sm-1 d-flex flex-column align-items-center ps-lg-5 mt-3"
                            id="alphabet-buttons">
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">A</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">B</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">C</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">D</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">E</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">F</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">G</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">H</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">I</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">J</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">K</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">L</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">M</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">N</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">O</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">P</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">Q</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">R</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">S</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">T</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">U</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">V</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">W</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">X</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">Y</p>
                            <p class="grey-txt small fw-bold mb-0 alphabet-btn">Z</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright pt-3 mb-2 mx-3">
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Developed & powered by  <b>KEYTAG1 LLC.</b></p>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- -------search with alphabet------ --}}
    <script>
        $(document).ready(function() {
            $(".customer-all-main").hide();
            // --if click----
            $(".alphabet-btn").on("click", function() {
                $(".customer-all-main").show();
                $(".alphabet-btn").css("color", "#BEBEBE");
                $("#searcherror").css("display", "none");
                $("#filter-heading").css("display", "block");

                $(this).css("color", "#193365");
                $("#customer-list .customer-all").show();

                var alphabet = $(this).text();
                $(".customer").hide();
                var count = 0;
                $("#customer-list .customer").each(function() {
                    if ($(this).find("h6").text().toUpperCase().startsWith(alphabet)) {
                        $(this).show();
                        count++;
                    }
                });

                // $("#customer-list .customer-all").each(function() {
                //     if ($(this).find("h6").text().toUpperCase().startsWith(alphabet)) {
                //         $(this).hide();
                //         count++;
                //     }
                // });

                $("#filter-heading").text(alphabet);
                if (count == 0) {
                    $("#error_msg").show();
                    $("#error_msg").text("There is no customer whose name start with '" + alphabet +"'");
                } 
                else {
                    $("#error_msg").hide();
                }
            });
        });
    </script>
    {{--  -----------search input-------- --}}
    <script>
        function searchFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById('myinput');
            filter = input.value.toUpperCase();
            li=document.getElementsByClassName('service-box');

            cusall=document.getElementsByClassName('customer-all-main');
            var resultsFound = false; // initialize the flag to false
        
            for(i=0 ; i< li.length; i++){
                a = li[i].getElementsByClassName('searchable')[0];
                if(a.innerHTML.toUpperCase().startsWith(filter)){
                    li[i].style.display = "";
                    resultsFound = true; // set flag to true if a result is found
                } else {
                    li[i].style.display = 'none';
                }
            }
            
            document.getElementById('filter-heading').style.display = 'none';
            for(var j=0; j<cusall.length; j++){
                    cusall[j].style.display = 'none';
                }

            if(!resultsFound){ // if no result is found, display the error message
                document.getElementById('searcherror').style.display = 'block';
                document.getElementById('error_msg').style.display = 'none';

            } else {
                document.getElementById('searcherror').style.display = 'none'; // hide error message if result is found
            }
        }
    </script>
</body>

</html>

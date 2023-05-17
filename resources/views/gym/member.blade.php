<!doctype html>
<html lang="en">

<head>
    @include('layouts.userLinks')
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>
    <title>Member</title>
</head>

<body>
    <header>
        <div
            class="row mx-3 my-2 rounded-4 shadow d-flex align-items-center py-2 px-4 justify-content-between bg-warning">
            <div
                class="col-lg-6 mt-2 mt-xl-0 col-xl-5 d-flex align-items-center justify-content-center justify-content-lg-start justify-content-xl-between">
                <a href="/member" class="bar-logo me-4">
                    <img src="{{ asset('/img/logo.png') }}" alt="">
                </a>
                <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">{{ $name }}</h1>
            </div>
            <div
                class="col-lg-6 mt-2 mt-xl-0 col-xl-5 d-sm-flex flex-wrap align-items-center justify-content-xl-between justify-content-center justify-content-lg-end">
                <div class="d-flex align-items-center justify-content-center me-3">
                    <a href="member"
                        class="text-light text-center d-block text-decoration-none bg-blue-g bs-opacity px-3 py-2 rounded-3 mt-sm-0 me-3 ">
                        <i class="fas fa-home text-light  me-2"></i>Members</a>
                    <a href="gymsTiming"
                        class="blue-txt text-center d-block text-decoration-none bg-yellow bs-opacity px-3 py-2 rounded-3 mt-sm-0">
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
                        <img src="<?php echo asset('myimgs/' . $photo); ?>" class="rounded-circle w-100" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- ============================= Start ================================  -->
    <div class="container-fluid py-3">
        <div class="row mx-3">
            @if (session('requestError'))
                <p class="py-2 px-3 bg-danger text-white my-3 rounded">
                    {{ session('requestError') }}
                </p>
            @endif
            @if (session('alreadyrequestError'))
                <p class="py-2 px-3 bg-danger text-white my-3 rounded">
                    {{ session('alreadyrequestError') }}
                </p>
           @endif
                @if (session('alreadysendrequest'))
                <p class="py-2 px-3 bg-danger text-white my-3 rounded">
                    {{ session('alreadysendrequest') }}
                </p>
            @endif
        </div>
        <div class="row py-3">
            <div class="col-md-9 col-lg-9">
                <div class="row flex-lg-row  justify-content-between align-items-center">
                    <div class="col-md-3 col-lg-3">
                        <h2 class="blue-c fw-bold ps-3 m-0 fs-3 px-1">Members</h2>
                    </div>
                    <div class="col-md-8 col-lg-9 mt-lg-0 mt-3">
                        <div class="d-flex border border-2 rounded-pill p-2">
                            <input type="search" id="myinput"
                                class="form-control w-100 border-0 p-0 px-2 shadow-none rounded-pill"
                                placeholder="Search by Customer name, gym or store" onkeyup="searchFunction()">
                            <i class="fa-solid fa-magnifying-glass bg-warning rounded-circle p-2 fs-6"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 mt-lg-0 mt-3">
                <div class="text-end">
                    <a href="newMember" class="btn rounded-pill border pri-btn py-2 px-3 text-white">Add new
                        Member</a>
                </div>
            </div>

        </div>
        <div class="row px-3">
            <div class="col-lg-9 col-md-8 shadow bg-white px-3 rounded-4 py-4">
                @if (session('updateSuccess'))
                    <p class="py-2 px-3 bg-success text-white my-3 rounded">
                        {{ session('updateSuccess') }}
                    </p>
                @endif
                @if (isset($error_message))
                    <div class="alert alert-danger py-2">{{ $error_message }}</div>
                @endif
                <div class="row px-3 overflow-sc">
                    <?php $sr = 1; ?>
                    <p class="fw-bold fs-5 text-danger blue-txt" id="no-results-message">
                        There is no member whose name start with these letters
                    </p>
                    @foreach ($members as $member)
                        <div class="col-lg-6 mt-3 service-box">
                            <a href="/updateMember/{{ $member['id'] }}"
                                class="d-block member-bg text-decoration-none text-dark p-3 rounded-3 ">
                                <div class="border-bottom d-flex flex-sm-row flex-column justify-content-between">
                                    <div class="d-flex flex-sm-row flex-column align-items-center">
                                        <div class="me-2">
                                            <img src="{{ asset('/img/member.png') }}" alt=""
                                                class="w-100 h-100 rounded-circle mem-img">
                                        </div>
                                        <div>
                                            <h3 class="blue-cl fs-5 fw-bold m-0 text-sm-start text-center searchable">
                                                {{ $member['name'] }}</h3>
                                            <p class="fs-6 blue-cl m-0 text-sm-start text-center">
                                                {{ $member['email'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-dark fs-5">{{ $sr++ }}</span>
                                    </div>
                                </div>
                                <div class="d-xl-flex align-items-center justify-content-between">
                                    <div class="mt-3">
                                        <h6 class="blue-cl fs-5">Address:</h6>
                                        <p class="text-secondary fs-6">
                                            {{ $member['address1'] }},{{ $member['address2'] }}</p>
                                        <h6 class="blue-cl fs-5">Contact:</h6>
                                        <p class="text-secondary fs-6">{{ $member['contact'] }}</p>
                                    </div>
                                    <div class="ms-3 d-flex flex-column align-items-center">
                                        <div class="my-barcode mt-5 mt-xl-0">
                                            {{ $mid }}G{{ $member['barcode'] }}</div>
                                        <p class="text-center mb-0">{{ $member['barcode'] }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- -------right-panel--- --}}
            <div class="col-lg-3 col-md-4 mt-3 mt-lg-0">
                <div class="send-bor2 shadow">
                    <div class="blue-bg send-bor">
                        <h4 class="text-white py-3 px-3 fs-5">Total Barcodes</h4>
                    </div>
                    <div class="p-3">
                        <h2 class="blue-cl fs-5 px-1 fw-bold">Total Barcodes we have</h2>
                        <?php $remBarcodes = $totalBarcode - $usedBarcodes; ?>
                        <span class="blue-cl fs-3 fw-bold">{{ $remBarcodes }}</span>
                    </div>
                    <div class="d-flex align-items-start  p-3">
                        <div>
                            <span class="text-warning fs-6">Barcode ordered today</span>
                            <p class="text-warning fs-3 fw-bold">{{ $orderBarcodes }}</p>
                        </div>
                        <div class="ps-2">
                            <span class="blue-cl fs-6">{{ now()->setTimezone('Asia/Karachi')->format('m-d-Y') }}</span>
                        </div>
                    </div>
                    <div class="px-3 py-3 ">
                        <p class="blue-cl fs-6 fw-bold">Do you want more barcodes?</p>
                        <div>
                            <a href="#" class="btn pri-btn border rounded-pill text-white px-3"
                                data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="fas fa-share text-white me-3 fs-5"></i>Purchase Barcodes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .my-barcode {
            font-family: 'Libre Barcode 39';
            font-size: 46px;
            transform: scaleY(2);
            letter-spacing: -2.5px;
            line-height: 0.5;
        }

        #no-results-message {
            display: none
        }
    </style>
    <div class="modal" id="myModal">
        <div class="modal-dialog d-flex align-items-center h-100">
            <div class="modal-content">
                <div class="bg-white shadow rounded-3 position-relative px-4 py-5">
                    <div class="pb-a" style="top:12px;right:12px">
                        <i class="fa-solid fa-xmark blue-bg rounded-circle p-2 text-white fs-6"
                            data-bs-dismiss="modal" style="padding:10px 12px !important"></i>
                    </div>
                    <div class="text-center">
                        <i class="fa-solid fa-question bg-warning rounded-circle blue-cl fs-5 p-3"></i>
                    </div>
                    <h3 class="blue-cl fs-4 fw-bold text-center mt-2">Purchase Barcodes?</h3>
                    <p class="blue-cl fs-6 text-center">Please enter the amount of barcodes you want?</p>
                    <div>
                        <form method="POST" action="/saveRequestBarcode" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="date"
                                value="{{ now()->setTimezone('Asia/Karachi')->format('m-d-Y') }}">
                            <input type="hidden" name="gym_id" value="{{ $mid }}">
                            <div>
                                <label for="num" class="form-label blue-cl fs-5 fw-bold">Number</label>
                                <select name="barcodes" id="myRange" class="form-control" name=""
                                value="" id="myRange">'
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="1500">1500</option>
                                    <option value="2000">2000</option>
                                    <option value="2500">2500</option>
                                    <option value="5000">5000</option>
                                    <option value="10000">10,000</option>
                                </select>
                            </div>

                            <div>
                                <label for="from" class="form-label blue-cl fs-5 fw-bold">From</label>
                                <input type="text" class="form-control" name="from" id="from"
                                value="" max="9999999999"
                                step="1" maxlength="10">
                            </div>
                            <div>
                                <label for="to" class="form-label blue-cl fs-5 fw-bold">To</label>
                                <input type="text" class="form-control" name="to" id="output"
                                maxlength="10" max="" value="" readonly>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                var myRange = document.getElementById("myRange");
                                var from = document.getElementById("from");
                                from.value = from.value.toString();
                                var output = document.getElementById("output");
                            
                                myRange.addEventListener("change", function() {
                                    var rangeValue = parseFloat(myRange.value);
                                    var fromValue = parseFloat(from.value);
                                    var result = Math.round(rangeValue + fromValue -1);
                                    output.value = result.toString();
                                });
                                from.addEventListener("change", function() {
                                    var rangeValue = parseFloat(myRange.value);
                                    var fromValue = parseFloat(from.value);
                                    var result = Math.round(rangeValue + fromValue -1);
                                    output.value = result.toString();
                                });
                            </script>
                            <div>
                                <button type="submit"
                                    class="btn btn-warning border w-100 rounded-pill text-white fs-5 mt-3 py-2 px-3 d-block"
                                    data-bs-toggle="modal" data-bs-target="#myModal2">
                                    Purchase</button>
                            </div>
                            @if($Gymtotaltwo)
                            <p class="mt-2"><b>Previous Barcodes:</b>
                            @foreach($Gymtotaltwo as $available)
    {{$available->from}}-{{$available->to}},
@endforeach
</p>
@endif

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('requestSuccess'))
        <div class="modal d-block success-popop" id="myModal2">
            <div class="modal-dialog d-flex align-items-center h-100">
                <div class="modal-content">
                    <div class="bg-white shadow rounded-3 position-relative ">
                        <div class="py-2 bg-warning rounded-3">
                            <i class="close-popop fa-solid fa-xmark bg-white rounded-circle p-2  text-warning fs-6 position-absolute"
                                style="top:12px;right:12px" data-bs-dismiss="modal"></i>
                            <div class="pb-0 text-center px-3 text-white fs-4">
                                Email sent successfully
                            </div>
                        </div>
                        <!-- <div class="text-center">
                            <i class="fa-solid fa-question bg-warning rounded-circle blue-cl fs-5 p-3"></i>
                        </div> -->

                        <div class="py-5 text-center fs-5 px-4 py-5 my-4">
                            Email sent to admin for purchasing barcodes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="copyright pt-3 mb-2 mx-3">
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Developed & powered by  <b>KEYTAG1 LLC.</b></p>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function searchFunction() {
            var input, filter, serviceBoxes, serviceName, i, txtValue, displayedCount = 0;
            input = document.getElementById("myinput");
            filter = input.value.toUpperCase();
            serviceBoxes = document.getElementsByClassName("service-box");
            for (i = 0; i < serviceBoxes.length; i++) {
                serviceName = serviceBoxes[i].querySelector(".searchable");
                txtValue = serviceName.textContent || serviceName.innerText;
                if (serviceName.innerText.toUpperCase().startsWith(filter)) {
                    serviceBoxes[i].style.display = "";
                    displayedCount++;

                } else {
                    serviceBoxes[i].style.display = "none";
                }
            }
            if (displayedCount === 0) {
                document.getElementById("no-results-message").style.display = "block";
            } else {
                document.getElementById("no-results-message").style.display = "none";
            }
        }
        $(document).ready(function() {
            $(document).on('click', '.close-popop', function() {
                $('#myModal2').removeClass('d-block');
                $('#myModal2').addClass('d-none');
            });
        })
    </script>
</body>

</html>

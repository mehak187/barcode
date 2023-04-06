<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Customer Details</title>
</head>

<body>
    <header>
        <div class="mx-3 my-2 rounded-4 shadow d-flex align-items-center py-2 px-4 justify-content-between bg-warning">
            <a href="dashboard" class="bar-logo">
                <img src="{{ asset('/img/logo.png') }}" alt="">
            </a>
            <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">Customer Details</h1>
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
                    <img src="{{ asset('/img/dev-2.png') }}" class="rounded-circle w-100" alt="">
                </a>
            </div>
        </div>
    </header>
    <!-- --------box-section------- -->
    <section class="mt-3 px-4">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-11 col-xxl-10">
                @if (session('success'))
                    <p class="py-2 px-3 bg-success text-white my-3 rounded">
                        {{ session('success') }}
                    </p>
                @endif
                <!-- -----secondary-heading------ -->
                <div class="row">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="d-flex align-items-center">
                            <a href="/customersList" class="border border-warning rounded-2 px-2 py-1 me-2">
                                <i class="fas fa-chevron-left text-warning lh-1"></i>
                            </a>
                            <h3 class="mb-0 blue-txt fs-4">Customer Details</h3>
                        </div>
                        <a href="#"
                            class="text-light text-center d-block text-decoration-none bg-blue-g bs-opacity fs-6 px-4 py-2 rounded-pill mt-3 mt-sm-0"
                            data-bs-toggle="modal" data-bs-target="#myModal">Add Barcodes</a>
                    </div>
                </div>
                <!-- -----detail boxes----- -->
                <div class="row bg-white justify-content-around shadow px-4 px-xxl-3 py-4 mt-4 rounded-4 det-box">
                    <!-- ----box----- -->
                    <div class="col-sm-6 col-md-2 my-3 d-flex flex-column border-end border-warning pe-4 ps-0 py-2">
                        <h3 class="fw-normal blue-txt fs-6">
                            Total Barcodes assigned
                        </h3>
                        <p class="fw-bold blue-txt mb-3">{{$totalBarcode}}</p>
                        <a href="/barcodesOfGym/{{$gym_id}}"
                            class="mt-auto text-light text-center d-block text-decoration-none bg-blue-g bs-opacity fs-6 px-2 py-2 rounded-pill mt-4">
                            View Barcodes
                        </a>
                    </div>
                    <!-- ----box----- -->
                    <div class="col-sm-6 col-md-2 my-3 d-flex flex-column  border-end border-warning pe-4 ps-0 py-2">
                        <h3 class="fw-normal blue-txt fs-6">
                            Used Barcodes
                        </h3>
                        <p class="fw-bold blue-txt mb-3">{{$usedBarcodes}}</p>
                        <a href="/usedBarcodes/{{$gym_id}}"
                            class="mt-auto text-light text-center d-block text-decoration-none bg-blue-g bs-opacity fs-6 px-2 py-2 rounded-pill mt-4">
                            View Barcodes
                        </a>
                    </div>
                    <!-- ----box----- -->
                    <?php 
                    $remBarcodes = $totalBarcode - $usedBarcodes;
                    ?>
                    <div class="col-sm-6 col-md-2 my-3 d-flex flex-column  border-end border-warning pe-4 ps-0 py-2">
                        <h3 class="fw-normal blue-txt fs-6">
                            Remaining Barcodes
                        </h3>
                        <p class="fw-bold blue-txt mb-3">{{$remBarcodes}}</p>
                        <a href="/remBarcodes/{{$gym_id}}"
                            class="mt-auto text-light text-center d-block text-decoration-none bg-blue-g bs-opacity fs-6 px-2 py-2 rounded-pill mt-4">
                            View Barcodes
                        </a>
                    </div>
                    <!-- ----box----- -->
                    <div class="col-sm-6 col-md-2 my-3 d-flex flex-column  border-end border-warning pe-4 ps-0 py-2">
                        <h3 class="fw-normal blue-txt fs-6">
                            New Brcodes Purchased by customer
                        </h3>
                        @if($orderBarcodesTot)
                        <p class="fw-bold blue-txt mb-3">
                            {{$orderBarcodesTot}}
                        </p>
                        @else
                        <p class="fw-bold blue-txt mb-3">0</p>
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-2 my-3 d-flex flex-column  pe-4 ps-0 py-2">
                        <h3 class="fw-normal blue-txt fs-6">
                            New bar codes added by admin
                        </h3>
                        @if($lastPurchased)
                        <p class="fw-bold blue-txt mb-3">{{$lastPurchased}}</p>
                        @else
                        <p class="fw-bold blue-txt mb-3">0</p>
                        @endif
                        <a href="/addedByAdmin/{{$gym_id}}"
                            class="mt-auto text-light text-center d-block text-decoration-none bg-blue-g bs-opacity fs-6 px-2 py-2 rounded-pill mt-4">
                            View Barcodes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" id="myModal">
        <div class="modal-dialog d-flex align-items-center h-100">
            <div class="modal-content">
                <div class="bg-white shadow rounded-3 position-relative px-4 py-5">
                    <div class="pb-a" style="top:15px; right:20px; cursor:pointer">
                        <i class="fa-solid fa-xmark blue-bg rounded-circle p-2 text-white fs-6"
                            data-bs-dismiss="modal" style="10px 12px !important"></i>
                    </div>
                    <div class="text-center">
                        <i class="fa-solid fa-question bg-warning rounded-circle blue-cl fs-5 p-3"></i>
                    </div>
                    <h3 class="blue-cl fs-4 fw-bold text-center mt-2"> Generate the barcodes here?</h3>
                    <p class="blue-cl fs-6 text-center">Generate the barcodes here</p>
                    <div>
                        {{-- ====================================
                                Add barcode form
                        ==================================== --}}
                        {{-- @foreach ($lists as $detail) --}}
                        @if($orderBarcodesTot==0)
                        <div class="alert alert-danger py-2">
                            Customer does not request for any barcode
                        </div>
                        @else
                        <form action="/saveGymBarcode" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="gym_id" value="{{ $gym_id }}"
                                placeholder="01">
                            <div>
                                <label for="rangeInput" class="form-label blue-cl fs-5 fw-bold">No. of
                                    barcodes:</label>
                                <input type="number" class="form-control" name="branches" placeholder="{{$orderBarcodesTot}}"
                                    value="" id="myRange" onchange="updateValue()" max="{{$orderBarcodesTot}}">
                            </div>
                            <div class="mt-3">
                                <?php $from_value = $maxs + 1; ?>

                                <label for="num" class="form-label blue-cl fs-5 fw-bold">From:</label>
                                <input type="number" class="form-control" name="from" id="from"
                                    value="{{ $from_value }}" min="{{ $from_value }}" max="9999999999"
                                    step="1" maxlength="10" readonly>
                            </div>
                            <div class="mt-3">
                                <label for="num3" class="form-label blue-cl fs-5 fw-bold">To:</label>
                                <input type="number" class="form-control" name="to" id="output"
                                    maxlength="10" max="" value="" readonly>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    var myRange = document.getElementById("myRange");
                                    var from = document.getElementById("from");
                                    from.value = from.value.toString().padStart(10, '0');
                                    var output = document.getElementById("output");
                                
                                    myRange.addEventListener("change", function() {
                                        var rangeValue = parseFloat(myRange.value);
                                        var fromValue = parseFloat(from.value);
                                        var result = Math.round(rangeValue + fromValue -1);
                                        output.value = result.toString().padStart(10, "0");
                                    });
                                </script>
                            </div>
                            <div class="mt-5">
                                <button type="submit"
                                    class="btn btn-warning w-100 rounded-pill border text-white fs-5 mt-3 py-2 px-3 d-block">Add</button>
                            </div>
                        </form>
                        @endif
                        {{-- @endforeach --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="copyright pt-3 mb-2 mx-3">
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Powered and generated by <b>KeyTag</b>. Maintained and developed by <b> Fabtechsol</b></p>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>

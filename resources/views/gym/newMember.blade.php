<!doctype html>
<html lang="en">

<head>
    @include('layouts.userLinks')
    <title>Add New Member</title>
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

                <h1 class="text-uppercase fs-3 fw-bold blue-txt mb-0">{{$name}}</h1>
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
                        <img src="<?php echo asset("myimgs/" .$photo) ?>" class="rounded-circle w-100" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- ============================= Start ================================  -->
    <div class="container">
        <div class="py-3 d-flex align-items-center">
            <a href="member">
                <i class="fa-solid fa-chevron-left text-warning border border-warning p-2 rounded-3"></i>
            </a>
            <h2 class="blue-cl fw-bold ps-3 m-0 fs-3">Add New Member</h2>
        </div>
        <div class="row shadow bg-fd px-3 py-4 rounded-3">
            <div class="col-xl-8 col-lg-7 px-2">
                <form method="POST" action="/savemember" id="form" enctype="multipart/form-data">
                    @if (session('success'))
                        <p class="py-2 px-3 bg-success text-white my-3 rounded">
                            {{ session('success') }}
                        </p>
                    @endif
                    @if (session('mailSuccess'))
                        <p class="py-2 px-3 bg-success text-white my-3 rounded">
                            {{ session('mailSuccess') }}
                        </p>
                    @endif
                    @if (session('noMember'))
                        <p class="py-2 px-3 bg-danger text-white my-3 rounded">
                            {{ session('noMember') }}
                        </p>
                    @endif
                    @csrf
                    <input type="hidden" class="form-control shadow-none text-secondary" name="photo"
                     value="">
                     <input type="hidden" class="form-control shadow-none text-secondary" name="gym_id"
                     value="{{$gym_id}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mt-3">
                                <label for="m-name" class="form-label blue-cl fw-bold px-1 fs-5">Member Name:</label>
                                <input type="text" class="form-control shadow-none text-secondary" id="m-name"
                                    placeholder="Member Name" name="name" autocomplete="off" value="{{ old('name') }}">
                                @error('name')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-3">
                                <label for="m-email" class="form-label blue-cl fw-bold px-1 fs-5">Member Email:</label>
                                <input type="email" class="form-control shadow-none text-secondary" id="m-email"
                                    placeholder="Member@Gmail.com" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h2 class="blue-cl fw-bold fs-2">Location</h2>
                        <div class="col-sm-6">
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
                    <div class="col-sm-6">
                        <div class="mt-3">
                            <label for="address-2" class="form-label blue-cl fw-bold px-1 fs-5">Address Line
                                2:</label>
                            <input type="text" class="form-control shadow-none text-secondary" id="address-2"
                                placeholder="Address Line 2" name="address2" value="{{ old('address2') }}"
                              >
                            @error('address2')
                                <span class="error text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
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
                     <div class="col-sm-6">
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
                        <div class="col-sm-6">
                            <div class="mt-3">
                                <input type="number" class="form-control shadow-none text-secondary" id="address-2"
                                    placeholder="Zip" name="zip" value="{{ old('zip') }}">
                                @error('zip')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mt-3">
                                <label for="m-contact" class="form-label blue-cl fw-bold px-1 fs-5">Contact</label>
                                <input type="tel" class="form-control shadow-none text-secondary" id="m-contact"
                                    placeholder="+1 783 783 119 008" name="contact" value="{{ old('contact') }}">
                                @error('contact')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-3">
                                <label for="password" class="form-label blue-cl fw-bold px-1 fs-5">password</label>
                                <input type="password" class="form-control shadow-none text-secondary" id="password"
                                    placeholder="password" name="password" autocomplete="off" value="{{ old('password') }}">
                                @error('password')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-3">
                                <label for="m-bar" class="form-label blue-cl fw-bold px-1 fs-5">Bar Codes</label>
                               {{-- ----if no barcode----- --}}
                                @if(isset($Gymrecord))
                                    <span class="text-danger d-block">
                                        No barcode available. Purchase barcode first
                                    </span>
                                    {{-- <input type="text" name="barcode" value="0"> --}}
                                @else
                                    <input type="number" name="barcode" id="barcode" placeholder="0" class="form-control shadow-none text-secondary"  maxlength="10" required="">
                                    <span class="d-block text-secondary">Hint (Your Barcodes):
                                        @if(count($Gymtotal)>0)
                                            @foreach($Gymtotal as $available)
                                                {{$available->from}}-{{$available->to}},
                                            @endforeach
                                        @else
                                            No barcode Found
                                        @endif
                                    </span>    
                                    {{--<option value="">Select</option>
                                    @foreach ($results as $barnmbr)
                                        <option  value="{{ str_pad($barnmbr, 10, '0', STR_PAD_LEFT) }}">{{ str_pad($barnmbr, 10, '0', STR_PAD_LEFT) }}</option>
                                    @endforeach
                                    </select>--}}
                                    @error('barcode')
                                        <span class="error text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-5">
                              <button type="submit" id="submitBtn" class="border-0 bg-transparent">
                                <a class="btn btn-warning text-decoration-none rounded-pill text-white px-4 py-2">Save
                                        & Assign Barcode</a>
                              </button>
                                    
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
            {{-- --right-- --}}
            <div class="col-xl-4 col-lg-5 mt-5 mt-lg-0 px-2">
                <div class="send-bor2 shadow">
                    <div class="blue-bg send-bor">
                        <h4 class="text-white py-2 px-3 fs-5">Send Email & SMS</h4>
                    </div>
                    <div class="p-3">
                        {{-- <form action="/savemember" method="POST">
                            @csrf --}}
                            <label class="blue-cl fs-6 px-1 fw-bold">Email - How To Download The App</label>
                            <input type="hidden" value="{{$logid}}" name="gym_id">
                            <input type="email" class="text-secondary shadow-none border border-2 form-control"
                                placeholder="Member@Gmail.Com"  value="{{ old('email') }}" name="mailid" id="mail2" readonly required>
                                @error('mailid')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            <textarea class="text-secondary form-control shadow-none border border-2 px-3 py-2 mt-2 rounded-3"
                                name="msg" rows="4" required>@if (isset($saveSendMail)){{ $saveSendMail->msg }}@endif</textarea>
                            {{-- <div class="mt-3">
                                <button type="submit" class="btn pri-btn px-4 py-2 text-white">Send</button>
                            </div> --}}
                    </div>
                    <div class="p-3">
                        <h5 class="blue-cl fs-6">SMS - How To Download The App</h5>
                        {{-- <form action="/saveSendPhone" method="POST">
                            @csrf --}}
                            <input type="hidden" value="{{$logid}}" name="gym_id">
                            <input type="tel"
                                class="text-secondary form-control border border-2 px-3 mt-2 py-2 d-block rounded-3"
                                placeholder="+1 849 893 002 801" name="phoneid" required="">
                                @error('phoneid')
                                    <span class="error text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            <textarea class="text-secondary form-control shadow-none border border-2 px-3 py-2 mt-2 rounded-3" 
                            rows="4" name="msg" required >@if (isset($saveSendPhone)){{ $saveSendPhone->msg }}@endif</textarea>
                            {{-- <div class="mt-3">
                                <button class="btn pri-btn px-4 py-2 text-white">Send</button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="copyright pt-3 mb-2 mx-3">
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Developed & powered by  <b>KEYTAG1 LLC.</b></p>
    </section>
    <style>
        input::placeholder {
            color: rgba(128,128,128,0.7) !important
        }
    </style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
        const email1 = document.getElementById('m-email');
        const email2 = document.getElementById('mail2');
        document.getElementById("password").autocomplete = "off";
        document.getElementById("m-name").autocomplete = "off";
        email1.addEventListener('input', function() {
        email2.value = email1.value;
        email2.readOnly = true;
        });
</script>
        {{--    // $('#barcode').change(function(event) {
        //     event.preventDefault();
        //     var id=$(this).val();
        //     if (id.length != 10) {
        //         swal('Barcode must be exactly 10 digits in length.');
        //         $(this).val("");
        //     }
        //     else{
        //         $.ajax({
        //             type: 'get',
        //             url: '/checkBarcode',
        //             data: {id:id},
        //             success: function(data) {
        //                 if(data.status=="assigned"){
        //                     swal('This Barcode has been assigned');
        //                     $('#barcode').val("");
        //                 }
        //                 if(data.status=="notavailable"){
        //                     swal('This Barcode is not available');
        //                     $('#barcode').val("");
        //                 }
        //             }
        //         });
        //     }
        // });
        
        $('#submitBtn').click(function(event) {
            event.preventDefault();
            var id=$("#barcode").val();
            if (id.length != 10) {
                swal('Barcode must be exactly 10 digits in length.');
                $(this).val("");
            }
            else{
                $.ajax({
                    type: 'get',
                    url: '/checkBarcode',
                    data: {id:id},
                    success: function(data) {
                        if(data.status=="assigned"){
                            swal('This Barcode has been assigned');
                            $('#barcode').val("");
                        }
                        else if(data.status=="notavailable"){
                            swal('This Barcode is not available');
                            $('#barcode').val("");
                        }
                        else{
                            $("#form").submit();
                        }
                    }
                });
            }
   
        });
    </script> --}}
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/js/main.js') }}"></script>
{{-- ------------------------- --}}

</html>

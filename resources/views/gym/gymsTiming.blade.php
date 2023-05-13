<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gym Timings</title>
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
                        class="me-3 blue-txt text-center d-block text-decoration-none bg-yellow bs-opacity px-3 py-2 rounded-3 mt-sm-0">
                        <i class="fas fa-home blue-txt me-2"></i>Members</a>
                    <a href="gymsTiming"
                        class="text-light text-center d-block text-decoration-none bg-blue-g bs-opacity px-3 py-2 rounded-3 mt-sm-0">
                        <i class="fas fa-clock text-light me-2"></i>Schedule</a>
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
    <div class="container-fluid">
        <div class="my-3">
            <h3 class="fs-3 blue-cl fw-bold px-4">Gym Timings</h3>
        </div>
        <div class="row px-sm-4 px-2">
            <div class="col-xl-9 shadow All_border2 p-5">
                <form action="/saveTiming" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $loginid }}" name="gym_id">
                    <div class="row All_border">
                        {{-- ---------day------ --}}
                        <div class="col-lg-4 col-md-6 test ">
                            <div class="day p-sm-0 p-4 d-flex flex-column justify-content-center"
                                style="height: 13rem;">
                                <div class="d-flex align-items-center justify-content-between align-items-center">
                                    <h6 class="mb-3">Sunday</h6>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="border-0 toggle-status" id="toggle-status"
                                            value="@if(isset($schedule)){{ $schedule->sun_status }}@else{{"closed"}}@endif" readonly name="sun_status">
                                        <label class="switch">
                                            <input type="checkbox" class="checkable toggle-checkbox"
                                            @if(isset($schedule))@if ($schedule->sun_status == 'open') checked @endif @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center timings"
                                @if(isset($schedule))@if ($schedule->sun_status == 'closed') style="display: none;" 
                                @else style="display: block;" @endif @endif>

                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->sun_st_time }}@else{{"09:00"}}@endif"
                                        name="sun_st_time">
                                    <span class="pe-2">To</span>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->sun_end_time }}@else{{"17:00"}}@endif"
                                        name="sun_end_time">
                                </div>
                            </div>
                        </div>
                        {{-- ---------day------ --}}
                        <div class="col-lg-4 col-md-6 test ">
                            <div class="day p-sm-0 p-4 d-flex flex-column justify-content-center"
                                style="height: 13rem;">
                                <div class="d-flex align-items-center justify-content-between align-items-center">
                                    <h6 class="mb-3">Monday</h6>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="border-0 toggle-status" id="toggle-status"
                                        value="@if(isset($schedule)){{ $schedule->mon_status }}@else{{"closed"}}@endif"
                                         readonly name="mon_status">
                                        <label class="switch">
                                            <input type="checkbox" class="checkable toggle-checkbox"
                                            @if(isset($schedule))@if ($schedule->mon_status == 'open') checked @endif @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center timings"
                                @if(isset($schedule))@if ($schedule->mon_status == 'closed') style="display: none;" @endif @endif>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->mon_st_time }}@else{{"09:00"}}@endif"
                                        name="mon_st_time">
                                    <span class="pe-2">To</span>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->mon_end_time }}@else{{"17:00"}}@endif"
                                        name="mon_end_time">
                                </div>
                            </div>
                        </div>
                        {{-- ---------day------ --}}
                        <div class="col-lg-4 col-md-6 test ">
                            <div class="day p-sm-0 p-4 d-flex flex-column justify-content-center"
                                style="height: 13rem;">
                                <div class="d-flex align-items-center justify-content-between align-items-center">
                                    <h6 class="mb-3">Tuesday</h6>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="border-0 toggle-status" id="toggle-status"
                                        value="@if(isset($schedule)){{ $schedule->tue_status }}@else{{"closed"}}@endif" readonly name="tue_status">
                                            
                                        <label class="switch">
                                            <input type="checkbox" class="checkable toggle-checkbox"
                                            @if(isset($schedule))@if ($schedule->tue_status == 'open') checked @endif @endif >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center timings"
                                @if(isset($schedule))@if ($schedule->tue_status == 'closed') style="display: none;" @endif @endif >
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->tue_st_time }}@else{{"09:00"}}@endif"
                                        name="tue_st_time">
                                    <span class="pe-2">To</span>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->tue_end_time }}@else{{"17:00"}}@endif"
                                        name="tue_end_time">
                                </div>
                            </div>
                        </div>
                        {{-- ---------day------ --}}
                        <div class="col-lg-4 col-md-6 test ">
                            <div class="day p-sm-0 p-4 d-flex flex-column justify-content-center"
                                style="height: 13rem;">
                                <div class="d-flex align-items-center justify-content-between align-items-center">
                                    <h6 class="mb-3">Wednesday</h6>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="border-0 toggle-status" id="toggle-status"
                                        value="@if(isset($schedule)){{ $schedule->wed_status }}@else{{"closed"}}@endif" readonly name="wed_status">
                                        <label class="switch">
                                            <input type="checkbox" class="checkable toggle-checkbox"
                                            @if(isset($schedule)) @if ($schedule->wed_status == 'open') checked @endif @endif >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center timings"
                                @if(isset($schedule)) @if ($schedule->wed_status == 'closed') style="display: none;" @endif @endif>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->wed_st_time }}@else{{"09:00"}}@endif"
                                        name="wed_st_time">
                                    <span class="pe-2">To</span>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->wed_end_time }}@else{{"17:00"}}@endif"
                                        name="wed_end_time">
                                </div>
                            </div>
                        </div>
                        {{-- ---------day------ --}}
                        <div class="col-lg-4 col-md-6 test ">
                            <div class="day p-sm-0 p-4 d-flex flex-column justify-content-center"
                                style="height: 13rem;">
                                <div class="d-flex align-items-center justify-content-between align-items-center">
                                    <h6 class="mb-3">Thursday</h6>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="border-0 toggle-status" id="toggle-status"
                                        value="@if(isset($schedule)){{ $schedule->thur_status }}@else{{"closed"}}@endif" readonly name="thur_status">
                                        <label class="switch">
                                            <input type="checkbox" class="checkable toggle-checkbox"
                                            @if(isset($schedule)) @if ($schedule->thur_status == 'open') checked @endif @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center timings"
                                @if(isset($schedule)) @if ($schedule->thur_status == 'closed') style="display: none;" @endif @endif>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->thur_st_time }}@else{{"09:00"}}@endif"
                                        name="thur_st_time">
                                    <span class="pe-2">To</span>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->thur_end_time }}@else{{"17:00"}}@endif"
                                        name="thur_end_time">
                                </div>
                            </div>
                        </div>
                        {{-- ---------day------ --}}
                        <div class="col-lg-4 col-md-6 test ">
                            <div class="day p-sm-0 p-4 d-flex flex-column justify-content-center"
                                style="height: 13rem;">
                                <div class="d-flex align-items-center justify-content-between align-items-center">
                                    <h6 class="mb-3">Friday</h6>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="border-0 toggle-status" id="toggle-status"
                                        value="@if(isset($schedule)){{ $schedule->fri_status }}@else{{"closed"}}@endif" readonly name="fri_status">
                                        <label class="switch">
                                            <input type="checkbox" class="checkable toggle-checkbox"
                                            @if(isset($schedule)) @if ($schedule->fri_status == 'open') checked @endif @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center timings"
                                @if(isset($schedule)) @if ($schedule->fri_status == 'closed') style="display: none;" @endif @endif>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->fri_st_time }}@else{{"09:00"}}@endif"
                                        name="fri_st_time">
                                    <span class="pe-2">To</span>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->fri_end_time }}@else{{"17:00"}}@endif"
                                        name="fri_end_time">
                                </div>
                            </div>
                        </div>
                        {{-- ---------day------ --}}
                        <div class="col-lg-4 col-md-6 test ">
                            <div class="day p-sm-0 p-4 d-flex flex-column justify-content-center"
                                style="height: 13rem;">
                                <div class="d-flex align-items-center justify-content-between align-items-center">
                                    <h6 class="mb-3">Saturday</h6>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="border-0 toggle-status" id="toggle-status"
                                        value="@if(isset($schedule)){{ $schedule->sat_status }}@else{{"closed"}}@endif"
                                         name="sat_status" readonly >
                                        <label class="switch">
                                            <input type="checkbox" class="checkable toggle-checkbox"
                                            @if(isset($schedule)) @if ($schedule->sat_status == 'open') checked @endif @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center timings"
                                @if(isset($schedule)) @if ($schedule->sat_status == 'closed') style="display: none;" @endif @endif>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->sat_st_time }}@else{{"09:00"}}@endif"
                                        name="sat_st_time">
                                    <span class="pe-2">To</span>
                                    <input type="time" class="border_less" value="@if(isset($schedule)){{ $schedule->sat_end_time }}@else{{"17:00"}}@endif"
                                        name="sat_end_time">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-warning px-5 rounded-pill text-white mt-3">Save</button>
                    </div>
            </div>
            {{-- ====================================
                          Announcements
            ===================================== --}}
            <div class="col-xl-3 mt-3 mt-xl-0 my-4">
                <div class="send-bor2 shadow">
                    <div class="">
                        <h4 class="text-white py-3 px-3 blue-bg send-bor fs-5 text-uppercase">Announcements</h4>
                        {{-- <form action="/ann" method="POST">
                            @csrf --}}
                            <div class="px-3 py-3 mt-3 d-flex flex-column justify-content-between h-100">
                                <div class="mb-3">
                                    <input type="hidden"  id="" value="{{$loginid}}" name="gym_id">
                                    <textarea class="form-control" rows="5" name="annoucement">
@if (isset($ann))
{{ $ann->annoucement }}
@endif
</textarea>
                                </div>
                                {{-- <div>
                                    <input type="submit" value="Save"
                                        class="btn pri-btn border rounded-pill text-white mt-5 px-5">
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="copyright pt-3 mb-2 mx-3">
        <p class="text-center bg-warning rounded-3 py-2 mb-0 blue-txt small">Developed & powered by  <b>KEYTAG1 LLC.</b></p>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.checkable').on('change', function() {
                var statusInput = $(this).parent().siblings('#toggle-status');
                var timings = $(this).parent().parent().parent().siblings();
                console.log(timings);

                if (this.checked) {
                    statusInput.val('open');
                    timings.css("display", "flex")
                } else {
                    statusInput.val('closed');
                    timings.css("display", "none");
                }
            });
        ///code 2
            $('.toggle-checkbox').on('change', function() {
                var statusInput = $(this).parent().siblings('.toggle-status');
                var timings = $(this).parent().parent().siblings('.timings');

                if (this.checked) {
                    statusInput.val('open');
                    timings.css("display", "flex");
                } else {
                    statusInput.val('closed');
                    timings.css("display", "none");
                }
            });

            $('.toggle-status').each(function() {
                var status = $(this).val();
                var timings = $(this).parent().parent().siblings('.timings');
                var checkbox = $(this).siblings('.switch').find('.checkable');

                if (status == 'open') {
                    timings.css("display", "flex");
                    checkbox.prop('checked', true);
                } else {
                    timings.css("display", "none");
                    checkbox.prop('checked', false);
                }
            });
        });
    </script>

    <style>
        #toggle-status {
            width: max-content;
            max-width: 50px
        }

        .timings {
            display: flex;
        }

        /* .sunday-timing {
            display: none
        } */

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0px;
            left: 10px;
            right: 0;
            bottom: 0;
            background-color: #707070;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #F2BD3C;
        }

        input:focus+.slider {
            /* box-shadow: 0 0 1px #2196F3; */
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .test {
            border-top: 0;
            border: 1px solid #DEDEDE;
        }

        .div_border {
            border: 1px solid #DEDEDE;
        }

        /* other style */
        .border_less {
            border-style: none;
            border-bottom: 1px solid lightgray;
            color: lightgray;
        }

        .All_border {
            border: 3px solid lightgray;
            border-radius: 30px;
        }

        .All_border2 {
            border-radius: 30px;
        }

        .border_rounded {
            border-top-left-radius: 27px;
        }

        .border_rounded_bottom {
            border-bottom-left-radius: 27px;
        }

        .border_rounded_right {
            border-top-right-radius: 27px;
        }

        @media screen and (max-width: 991px) {
            .border_rounded {
                border-top-left-radius: 27px;
            }

            .border_rounded_bottom {
                border-bottom-left-radius: 27px;
            }

            .border_rounded_right {
                border-top-right-radius: 0px;
            }

            .border_rounded2 {
                border-top-right-radius: 27px;
            }
        }

        @media screen and (max-width: 575px) {
            .border_rounded {
                border-top-left-radius: 27px;
                border-top-right-radius: 27px;
            }

            .border_rounded_bottom {
                border-bottom-right-radius: 27px;
            }

            .border_rounded_right {
                border-top-right-radius: 0px;
            }

            .border_rounded2 {
                border-top-right-radius: 0px;
            }
        }
    </style>
</body>

</html>

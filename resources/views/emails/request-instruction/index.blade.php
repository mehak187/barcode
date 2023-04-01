<!DOCTYPE html>
<html>

<head>
    <title>Request Barcode Email</title>
</head>

<body>
   <div class="mail-main py-3 px-5">
        <div class="lara-img mx-auto">
            <img src="{{ asset('/img/logo.png') }}" alt="laravel" class="w-100">
        </div>
       <div class="bg-white p-3">
            <h1 class="text-dark">Hello!</h1>
            <p>{{ $requestMail['msg'] }}</p>
            <p>Your login credentials are:</p>
            <p><b>Email Id: </b>{{ $requestMail['mailid'] }}</p>
            <p><b>Password: </b>{{ $requestMail['pass'] }}</p>
            {{-- <p> Best regards,<br>
                    <b>Admin</b> --}}
            </p>
       </div>
   </div>
   <style>
    body {
        margin: 0;
        padding: 0
    }
    .lara-img {
        max-width: 150px;
        margin: 0 auto 16px
    }
    .lara-img img {
        width: 100%
    }
    .mail-main{
        background: #edf2f7;
        font-family: poppins;
        padding: 20px 30px
    }
    .mail-main p {
        color: #718096
    }

    .bg-white {
        background: #fff;
        padding: 2px 30px
    }
   </style>
</body>

</html>

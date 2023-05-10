<!DOCTYPE html>
<html>

<head>
    {{-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/088d3f36f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"> --}}
    <title>Request Barcode Email</title>
</head>

<body>
   <div class="mail-main py-3 px-5">
        <div class="lara-img mx-auto">
            <img src="{{ asset('/img/logo.png') }}" alt="laravel" class="w-100">
        </div>
       <div class="bg-white p-3">
        <h1 class="text-dark">Hello!</h1>

        <p>
            I am writing to request a set of barcodes. We require a total of
            <b>{{ $requestBarcode['barcodes'] }}</b> barcodes starting from <b>{{ $requestBarcode['from'] }}</b> to <b>{{ $requestBarcode['to'] }}</b> to be generated and delivered to us as soon as possible.<br>

            These barcodes will be used for my gym. We appreciate your assistance in this matter
            and look forward to receiving the barcodes promptly.<br>

            Thank you for your time and consideration.<br>

            Best regards,<br>
            <b>{{$requestBarcode['mname']}}</p><b>
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

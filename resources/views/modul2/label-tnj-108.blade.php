<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>
        Barcode -
        @php
            echo $barang;
        @endphp
    </title>

    <link rel="stylesheet" href="{{ asset('/assets/css/label-tnj-108.css') }}">
</head>
<body>

    <div class="container">
        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($barang, 'C128',1.5,40,array(1,1,1), true) }}">
        <h6 class="nama-barang">{{ $barang }}</h6>
    </div>

</body>
</html>
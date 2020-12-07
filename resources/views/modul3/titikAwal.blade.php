@extends('layouts/modul1/main')
@section('title', 'Input Toko')

@section('content')
    <!-- Content -->
    <div class="content ">
        <h1>Input Toko</h1>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">                           
                <br>
                <div class="col-lg-12" class="form-inline">
                    <div class="block margin-bottom-sm">

                <center><div class="title"><strong>Please Fill The BOX</strong></div></center>
                    <form class="form-horizontal" action="/LocationStore" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Nama Toko</label></div>
                        <div class="col-12 col-md-9">
                        <input type="text" id="nama_toko" name="nama_toko" placeholder="Masukkan Nama Toko" class="form-control">
                        </div>
                    </div>
                    <div class="line"></div>

                    <div class="form-group row">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Latitude</label></div>
                            <div class="col-12 col-md-9">
                            <input type="text" id="latitude" name="latitude" placeholder="Masukkan Latitude" class="form-control" readonly="">		</div>
                    </div>
                    <div class="line"></div>

                    <div class="form-group row">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Longitude</label></div>
                        <div class="col-12 col-md-9">
                        <input type="text" id="longitude" name="longitude" placeholder="Masukkan Longitude" class="form-control" readonly="">		</div>
                    </div>
                    <div class="line"></div>
                    
                    <div class="form-group row">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Accuracy</label></div>
                        <div class="col-12 col-md-9">   
                        <input type="text" id="accuracy" name="accuracy" placeholder="Masukkan Accuracy" class="form-control" readonly="">
                        </div>
                    </div>
                    <div class="line"></div>
                    <center>
                    <button type="button" class="btn btn-primary" onclick="getLocation()">Geolocation</button> 
                    <input type="submit" value="Submit" class="btn btn-primary"></center>
                    </form>
                    
                </div>
                </div>

                <script>
                var lat = document.getElementById("latitude");
                var long = document.getElementById("longitude");
                var acc = document.getElementById("accuracy");

                function getLocation() {
                    if (navigator.geolocation) {
                    navigator.geolocation.watchPosition(showPosition);
                    } else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
                    }
                }
                    
                function showPosition(position) {
                    lat.value=position.coords.latitude;
                    long.value=position.coords.longitude;
                    acc.value=position.coords.accuracy;
                }
                </script>
                            </div>
                        </div>
                    </div>

    
@endsection

@section('extra-script')
   
@endsection
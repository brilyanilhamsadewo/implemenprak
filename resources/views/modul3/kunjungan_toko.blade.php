@extends('layouts/modul1/main')
@section('title', 'Lokasi Toko')

@section('content')
    <!-- Content -->
    <div class="content ">
        <h1>Lokasi Toko</h1>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Toko</h4>
                {{-- <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Toko
                </button> --}}
                
                <!-- Modal -->
                <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="/LocationStore" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="namatoko">NAMA TOKO</label>
                                  <input type="text" class="form-control" id="namatoko">
                                </div>
                                <div class="form-group">
                                  <label for="latitude">LATITUDE</label>
                                  <input type="text" class="form-control" id="latitude" value="latitude" name="latitude">
                                </div>
                                <div class="form-group">
                                    <label for="latitude">LONGITUDE</label>
                                    <input type="text" class="form-control" id="longitude" value="longitude" name="longitude">
                                </div>
                                <div class="form-group">
                                    <label for="latitude">ACCURACY</label>
                                    <input type="text" class="form-control" id="accuracy" value="accuracy">
                                </div>
                                {{-- <button onclick="getLocation()" class="btn btn-primary">Get location</button> --}}
                                {{-- <p id="demo"></p> --}}

                                <button onclick="getLocation()" type="button">Get Location</button>
                                {{-- <button onclick="myFunction()">Try it</button>
                                <button onclick="cobalatitude()">latitude</button> --}}
                              
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class="table-responsive">
                  <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>BARCODE</th>
                                    <th>NAMA TOKO</th>
                                    <th>LATITUDE</th>
                                    <th>LONGITUDE</th>
                                    <th>ACCURACY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lokasi_toko as $lok)
                                    <tr align="center">
                                        <td><img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                            $lok->barcode, 'C128')}}" height="60" width="180">
                                            <br>{{$lok->barcode}}</td>
                                            <td>{{$lok->nama_toko }}</td>
                                            <td>{{$lok->latitude }}</td>
                                            <td>{{$lok->longitude }}</td>
                                            <td>{{$lok->accuracy }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <center>
                            <a href="CetakBarcodeLokasi"><button type="button" class="btn btn-primary">Cetak Barcode</button></a> 
                            </center>
                    </div>
                </div>
    
            </div>
        </div>
    </div>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>

     [<script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            // x.innerHTML = position.coords.latitude + 
            // "<br>Longitude: " + position.coords.longitude;
            
            // document.getElementById(latitude).setAttribute('value', position.coords.latitude);

            var current_latitude = position.coords.latitude;
            var current_longitude = position.coords.longitude;
            var current_accuracy = position.coords.accuracy;

            console.log('Latitude: '+ current_latitude);
            console.log('Longitude: '+ current_longitude);
            console.log('Accuracy: '+ current_accuracy);

            $('#latitude').val(current_latitude);
            $('#longitude').val(current_longitude);
            $('#accuracy').val(current_accuracy);
        }
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("latitude");

            function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        document.open("text/html","replace");
        document.write(position.coords.latitude);
        document.close();
        }
    </script>]
@endsection

@section('extra-script')
   
@endsection
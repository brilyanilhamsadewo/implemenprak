@extends('layouts/modul1/main')
@section('title', 'Cetak Label')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/barang.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    {{-- <div class="page-header">
        <h4>Cetak Label TnJ 108</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel">
                <h5>Daftar Barang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-table">
                            <thead class="thead-dark">
                                <th scope="col">ID Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($barang as $barang)
                                    <tr>
                                        <td>{{ $barang->id_barang }}</td>
                                        <td>{{ $barang->nama }}</td>
                                        <td>
                                            <form action="{{ url('/cetak-label-tnj-108') }}" method="post">
                                                @csrf
                                                
                                                <input type="hidden" name="input_id_barang" value="{{ $barang->id_barang }}">
                                                <button type="submit" class="btn btn-sm btn-youtube">
                                                    <i class="fas fa-file-pdf mr-2"></i>
                                                    CETAK BARCODE
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Barang</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID BARANG</th>
                                <th>NAMA BARANG</th>
                                <th class="text-center">Barcode</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $b)
                            <tr>
                                <td>{{$b->id_barang}}</td>
                                <td>{{$b->nama}}</td>
                                <td class="img-xs">
                                <img class="img-xs" src="data:image/png;base64,{{DNS1D::getBarcodePNG($b->id_barang, 'C128')}}" alt="barcode"  height="60" width="180"/>
                                    <br/>
                                    {{$b->id_barang}}
                                </td>
                                <td class="text-center">
                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="barcode_pdf">
                                <button type="button" class="btn btn-primary mr-2">
                                    CETAK BARCODE
                                </button>
                                </a>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/datatable/button.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="{{ asset('/assets/js/barang.js') }}"></script>
@endsection
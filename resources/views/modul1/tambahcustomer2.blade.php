@extends('layouts/modul1/main')
@section('title', 'Tambah Customer 2')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/customer.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Customer</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5>Tambah Customer 2</h5>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 form-tambah-customer-col">
                    <form action="{{ url('/customer/tambah-2') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="input_nama">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="input_alamat">
                        </div>

                        <div class="form-group">
                            <label>Provinsi</label>
                            <select class="form-control select2-component select-provinsi">
                                <option>Pilih provinsi</option>
                                @foreach ($provinsi as $provinsi)
                                    <option value="{{ $provinsi->id_provinsi }}">{{ $provinsi->nama_provinsi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kabupaten/Kota</label>
                            <select class="form-control select2-component select-kota">
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="form-control select2-component select-kecamatan">
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kode Pos - Kelurahan</label>
                            <select name="input_kelurahan" class="form-control select2-component select-kelurahan">
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="wrapper-foto">
                                <div class="kontainer-foto">
                                    <img src="" alt="Foto" id="final-snapshot">
                                    <input type="hidden" name="input_foto" class="input_foto" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary tombol-buka-modal-foto" data-toggle="modal" data-target="#modal-ambil-foto">
                                <i class="fas fa-camera mr-2"></i>
                                Ambil Foto
                            </button>
                            <button type="submit" class="btn btn-primary ml-2">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Data
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->

{{-- Start Modal Ambil Foto --}}
<div class="modal fade" id="modal-ambil-foto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Modal Ambil Foto</h5>
                <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="modal-foto-wrapper">
                        <div class="modal-video-container">
                            <video id="webcam" autoplay playsinline width="200" height="150"></video>
                        </div>
                        <div class="modal-foto-kontainer">
                            <canvas id="canvas" class=""></canvas>
                        </div>
                    </div>

                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-sm btn-dark tombol-switch-camera" data-toggle="tooltip" data-placement="top" title="Switch Camera (hanya untuk smartphone)">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-dark tombol-capture" data-toggle="tooltip" data-placement="top" title="Capture">
                            <i class="fas fa-camera"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-primary tombol-simpan-foto" data-dismiss="modal">
                            <i class="fas fa-save mr-2"></i>
                            SIMPAN
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Modal Ambil Foto --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/webcam-easy.min.js') }}"></script>
    <script src="{{ asset('/assets/js/tambah-customer.js') }}"></script>
@endsection
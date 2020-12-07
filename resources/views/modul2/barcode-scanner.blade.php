@extends('layouts/modul1/main')
@section('title', 'Barcode Scanner')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/barcode-scanner.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Barcode Scanner</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="my-container">
                <div class="video-container">
                    <video id="video"></video>
                </div>
                <div class="tombol-container">
                    <button id="startButton" class="btn btn-sm btn-dark">
                        <i class="fas fa-play-circle mr-2"></i>
                        START
                    </button>
                    <button id="resetButton" class="btn btn-sm btn-youtube">
                        <i class="fas fa-undo-alt mr-2"></i>
                        RESET
                    </button>
                </div>
                <div id="sourceSelectPanel" class="form-group">
                    <label>Pilih Kamera</label>
                    <select id="sourceSelect" class="form-control select-camera">
                    </select>
                </div>
                <h5>Hasil scan:</h5>
                <div class="hasil-scan-container">
                    <p id="result"></p>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="{{ asset('/assets/js/barcode-scanner.js') }}"></script>
@endsection
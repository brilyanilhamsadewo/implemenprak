@extends('layouts/modul1/main')
@section('title', 'Data Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
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
                <h5>Data Customer</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-table">
                            <thead class="thead-dark">
                                <th scope="col">ID Customer</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($customer as $customer)
                                    <tr>
                                        <td>{{ $customer->id_customer }}</td>
                                        <td>{{ $customer->nama }}</td>
                                        <td>
                                            {{ $customer->alamat }},
                                            @php
                                                $kelurahan = DB::table('kelurahan')->where('id_kelurahan', $customer->id_kelurahan)->value('nama_kelurahan');
                                                $id_kecamatan = DB::table('kelurahan')->where('id_kelurahan', $customer->id_kelurahan)->value('id_kecamatan');
                                                $kecamatan = DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->value('nama_kecamatan');
                                                $id_kota = DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->value('id_kota');
                                                $kota = DB::table('kota')->where('id_kota', $id_kota)->value('nama_kota');
                                                $id_provinsi = DB::table('kota')->where('id_kota', $id_kota)->value('id_provinsi');
                                                $provinsi = DB::table('provinsi')->where('id_provinsi', $id_provinsi)->value('nama_provinsi');
                                                echo $kelurahan . ', ' . $kecamatan . ', ' . $kota . ', ' . $provinsi;
                                            @endphp
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-customer-{{ $customer->id_customer }}">
                                                <i class="fas fa-info-circle mr-1"></i>
                                                DETAIL
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->

@foreach ($customer2 as $customer2)
{{-- Start Detail Customer Modal --}}
<div class="modal fade" id="modal-detail-customer-{{ $customer2->id_customer }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-5 d-flex justify-content-center">
                        <div class="detail-foto">
                            @if ( isset($customer2->foto) )
                                <img src="{{ $customer2->foto }}" alt="Foto {{ $customer2->nama }}">
                            @elseif ( isset($customer2->file_path) )
                                <img src="{{ asset($customer2->file_path) }}" alt="Foto {{ $customer2->nama }}">
                            @endif
                        </div>
                    </div>

                    <div class="my-3">
                        <h5>ID Customer</h5>
                        <h6>{{ $customer2->id_customer }}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama</h5>
                        <h6>{{ $customer2->nama }}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Alamat</h5>
                        <h6>{{ $customer2->alamat }}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Kelurahan</h5>
                        @php
                            $kelurahan = DB::table('kelurahan')->where('id_kelurahan', $customer2->id_kelurahan)->value('nama_kelurahan');
                        @endphp
                        <h6>
                            @php
                                echo $kelurahan;
                            @endphp
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Kecamatan</h5>
                        @php
                            $id_kecamatan = DB::table('kelurahan')->where('id_kelurahan', $customer2->id_kelurahan)->value('id_kecamatan');
                            $kecamatan = DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->value('nama_kecamatan');
                        @endphp
                        <h6>
                            @php
                                echo $kecamatan;
                            @endphp
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Kota/Kabupaten</h5>
                        @php
                            $id_kota = DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->value('id_kota');
                            $kota = DB::table('kota')->where('id_kota', $id_kota)->value('nama_kota');
                        @endphp
                        <h6>
                            @php
                                echo $kota;
                            @endphp
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Provinsi</h5>
                        @php
                            $id_provinsi = DB::table('kota')->where('id_kota', $id_kota)->value('id_provinsi');
                            $provinsi = DB::table('provinsi')->where('id_provinsi', $id_provinsi)->value('nama_provinsi');
                        @endphp
                        <h6>
                            @php
                                echo $provinsi;
                            @endphp
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Kode Pos</h5>
                        @php
                            $kodepos = DB::table('kelurahan')->where('id_kelurahan', $customer2->id_kelurahan)->value('kodepos');
                        @endphp
                        <h6>
                            @php
                                echo $kodepos;
                            @endphp
                        </h6>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Customer Modal --}}
@endforeach

@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/customer.js') }}"></script>
@endsection
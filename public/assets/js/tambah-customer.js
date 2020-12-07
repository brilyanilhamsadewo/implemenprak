    // Efek menu aktif
    $('#customer-menu').addClass('active');

    // Mencegah submit form via tombol enter
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    // Select2
    const select2Component = document.getElementsByClassName("select2-component");
    $(select2Component).select2();

    // Tampilkan data kota sesuai provinsi yang dipilih
    $('.select-provinsi').on('change', function () {
        const id_provinsi = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/customer/req-data-kota';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {
                id: id_provinsi
            },
            dataType: 'json',
            success: function (data) {
                $('.select-kota').empty();

                $.each(data, function (id_kota, nama_kota) {
                    $('.select-kota').append(new Option(nama_kota, id_kota));
                });
            }
        });
    });

    // Tampilkan data kecamatan sesuai kota yang dipilih
    $('.select-kota').on('change', function () {
        const id_kota = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/customer/req-data-kecamatan';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {
                id: id_kota
            },
            dataType: 'json',
            success: function (data) {
                $('.select-kecamatan').empty();

                $.each(data, function (id_kecamatan, nama_kecamatan) {
                    $('.select-kecamatan').append(new Option(nama_kecamatan, id_kecamatan));
                });
            }
        });
    });

    // Tampilkan data kelurahan sesuai kecamatan yang dipilih
    $('.select-kecamatan').on('change', function () {
        const id_kecamatan = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/customer/req-data-kelurahan';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {
                id: id_kecamatan
            },
            dataType: 'json',
            success: function (data) {
                $('.select-kelurahan').empty();

                $.each(data, function (id_kelurahan, nama_kelurahan) {
                    $('.select-kelurahan').append(new Option(nama_kelurahan, id_kelurahan));
                });
            }
        });
    });

    const webcamElement = document.getElementById('webcam');
    const canvasElement = document.getElementById('canvas');
    const webcam = new Webcam(webcamElement, 'user' || 'environtment', canvasElement);

    $('.tombol-buka-modal-foto').click(function () {
        webcam.start()
            .then(result => {
                console.log("webcam started");
            })
            .catch(err => {
                console.log(err);
            });

        $('.tombol-switch-camera').click(function () {
            webcam.flip();
            webcam.start();
        });

        $('.tombol-capture').click(function () {
            let hasil = webcam.snap();
            $('#final-snapshot').attr('src', hasil);
            $('.input_foto').val(hasil);
        });

        $('.tombol-simpan-foto, .tutup-modal').click(function () {
            webcam.stop();
        });
    });

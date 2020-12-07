// Efek menu aktif
$('#cetak-label-tnj-108-menu').addClass('active');

// Datatable
$('.datatable-table').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
$(document).ready( function() {
    // hilangkan tombol cari
    $('#tombol').hide();
    
    // event ketika diketik
    $('#keyword').on('keyup', function() {
        $('#loader').show();
        // $('#container-table').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {

            $('#container-table').html(data);
            $('#loader').hide();
        })
    });



});
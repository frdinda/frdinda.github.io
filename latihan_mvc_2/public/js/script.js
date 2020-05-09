$(function (){
    $('.ModalUbah').on('click', function(){
        const id = $(this).data('id');
        console.log(id);
        
        $('#judulModal').html('Something To Change');
        $('.modal-footer button[type=submit]').html('Save Changes');
        $('.modal-body form').attr('action', 'http://localhost/frdinda.github.io/latihan_mvc_2/public/journal/ubah_data');

        $.ajax({
            url: 'http://localhost/frdinda.github.io/latihan_mvc_2/public/journal/detail', 
            data: {id : id},
            method: 'post',
            dataType: 'json',
            timeout: 500,
            success: function(data){
                $('#id').val(data.journal.id);
                $('#judul').val(data.journal.judul);
                $('#isi').val(data.journal.isi);
                console.log('masuk lebih dalam');
            },
            error: function(){
                console.log('success gajalan');
            }
        });
    });

    $('.ModalTambah').on('click', function(){
        $('#judulModal').html('Write Something Today');
        $('.modal-footer button[type=submit]').html('Save');
        $('.modal-body form').attr('action', 'http://localhost/frdinda.github.io/latihan_mvc_2/public/journal/tambah_data');
        $('#id').val('');
        $('#judul').val('');
        $('#isi').val('');
    })
});
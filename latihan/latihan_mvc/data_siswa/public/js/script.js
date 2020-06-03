$(function (){
    $('.ModalUbah').on('click', function(){
        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/frdinda.github.io/data_siswa/public/data_siswa/detail', 
            data: {id : id},
            method: 'post',
            dataType: 'json',
            timeout: 500,
            success: function(data){
                $('#nama').val(data.siswa.nama);
                $('#nis').val(data.siswa.nis);
                $('#tanggal_lahir').val(data.siswa.tanggal_lahir);
                $('#id').val(data.siswa.id);
                console.log(data.siswa.nama);
            }
        });
    });

    $('.ModalTambah').on('click', function(){
        $('#judulModal').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/frdinda.github.io/data_siswa/public/data_siswa/tambah_data')
        $('#nama').val('');
        $('#nis').val('');
        $('#tanggal_lahir').val('');
    })
});
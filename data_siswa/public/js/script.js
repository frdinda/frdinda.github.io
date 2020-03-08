$(function (){
    $('.ModalDetail').on('click', function(){
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
                console.log(data.siswa.nama);
            }
        });
    });
});
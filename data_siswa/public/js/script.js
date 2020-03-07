$(function(){
    $('.ModalDetail').on('click', function(){
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/frdinda.github.io/data_siswa/public/data_siswa/detail', 
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                console.log(data);
            }
        });
    });
});
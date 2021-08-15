$("#tipe_user").on('change', function(){
    $(".tambah_user").hide();
    $("#" + $(this).val()).fadeIn(700);
}).change();

$("#id_akses").on('change', function(){
    var id = $(this).val();
    console.log(id);
    if(id === "sbg" || id === "admin" || id === "super"){
        $(".div_id_bag").fadeIn(700);
        $(".div_id_subbag").fadeIn(700);
    }else if(id === "kbg"){
        $(".div_id_bag").fadeIn(700);
        $(".div_id_subbag").hide(700);
    }else if(id === "kdv"){
        $(".div_id_bag").hide(700);
        $(".div_id_subbag").hide(700);
    }else if(id === "kkw"){
        $(".div_id_div").hide(700);
        $(".div_id_bag").hide(700);
        $(".div_id_subbag").hide(700);
    }
}).change();

$(document).ready(function(){
    $("#jumlah").change(function(){
        var jumlah = parseInt($(this).val());
        var no_surat = parseInt($("#no_surat").val());
        var no_surat_akhir = no_surat + (jumlah-1);
        $("#no_surat_terakhir").val(no_surat_akhir);
    });
});

$(document).ready(function(){
    $("#jumlah_surat_mundur").change(function(){
        var jumlah = parseInt($(this).val());
        var no_surat = parseInt($("#no_surat_mundur").val());
        var jumlah_sisa = parseInt($('#jumlah_sisa').val());
        if(jumlah > jumlah_sisa){
            alert("Jumlah Melebihi Batas");
            var no_surat_akhir = no_surat + (jumlah-1);
            $("#no_surat_mundur_terakhir").val(no_surat_akhir);
        } else {
            var no_surat_akhir = no_surat + (jumlah-1);
            $("#no_surat_mundur_terakhir").val(no_surat_akhir);
        }
    });
});

$(document).ready(function(){
    $('#sbg_id_div').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/tambah_user/getbagian",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                var html2 = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].id_bag+'">'+response[count].nama_bag+'</option>';
                }
                $('#sbg_id_bag').html(html)
                $('#sbg_id_subbag').html(html2)
            }
        })
    });
});

$(document).ready(function(){
    $('#sbg_id_bag').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/tambah_user/getsubbagian",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].id_subbag+'">'+response[count].nama_subbag+'</option>';
                }
                $('#sbg_id_subbag').html(html)
            }
        })
    });
});

$(document).ready(function(){
    $('#kbg_id_div').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/tambah_user/getbagian",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].id_bag+'">'+response[count].nama_bag+'</option>';
                }
                $('#kbg_id_bag').html(html)
            }
        })
    });
});

$(document).ready(function(){
    $('#adm_id_div').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/tambah_user/getbagian",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].id_bag+'">'+response[count].nama_bag+'</option>';
                }
                $('#adm_id_bag').html(html)
            }
        })
    });
});

$(document).ready(function(){
    $('#adm_id_bag').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/tambah_user/getsubbagian",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].id_subbag+'">'+response[count].nama_subbag+'</option>';
                }
                $('#adm_id_subbag').html(html)
            }
        })
    });
});

$(document).ready(function(){
    $('#sadm_id_div').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/tambah_user/getbagian",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].id_bag+'">'+response[count].nama_bag+'</option>';
                }
                $('#sadm_id_bag').html(html)
            }
        })
    });
});

$(document).ready(function(){
    $('#sadm_id_bag').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/tambah_user/getsubbagian",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].id_subbag+'">'+response[count].nama_subbag+'</option>';
                }
                $('#sadm_id_subbag').html(html)
            }
        })
    });
});

$(document).ready(function(){
    $('#kode_masalah').change(function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/nomor/getsubs1",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                var html2 = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].masalah_substantif_1+'">'+response[count].masalah_substantif_1+' - '+response[count].penjabaran_subs_1+'</option>';
                }
                $('#masalah_substantif_1').html(html)
                $('#masalah_substantif_2').html(html2)
            }
        })
    });
});

$(document).ready(function(){
    $('#masalah_substantif_1').change(function(){
        var id = $(this).val();
        var id_kode_masalah = $('#kode_masalah').val();
        $.ajax({
            type: "POST",
            url: "/nomor/getsubs2",
            data: {
                id:id,
                id_kode_masalah:id_kode_masalah
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                // $('#id_bag').html(response);
                var html = '<option value=""></option>';
                var html2 = '<option value=""></option>';
                for(var count=0; count < response.length; count++){
                    html += '<option value="'+response[count].masalah_substantif_2+'">'+response[count].masalah_substantif_2+' - '+response[count].penjabaran_subs_2+'</option>';
                }
                $('#masalah_substantif_2').html(html)
                // $('#sbg_id_subbag').html(html2)
            }
        })
    });
});

$(document).ready(function() {
    $('#table-surat-all').DataTable({
        "dom": '<"toolbar">frtip'
    });
} );
$(document).ready(function() {
    $('#table-surat-user').DataTable({
        "dom": '<"toolbar">frtip'
    });
} );
$(document).ready(function() {
    $('#table-surat-bag').DataTable({
        "dom": '<"toolbar">frtip'
    });
} );
$(document).ready(function() {
    $('#table-user').DataTable({
        "dom": '<"toolbar">frtip'
    });
} );

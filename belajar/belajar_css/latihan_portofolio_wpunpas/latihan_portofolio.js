// event pada saat link di klik
$('.page_scroll').on('click', function(e){
    // ambil isi href
    var tujuan = $(this).attr('href');
    
    // tangkap elemen yang bersangkutan
    var elementujuan = $(tujuan);
    
    console.log(tujuan);
    // scrollTop untuk mengetahui jarak dengan posisi paling atas, tapi kalo di scroll, nilai scrollnya akan berubah
    $('html').animate({
        scrollTop: elementujuan.offset().top -40
    }, 1100, 'easeInOutExpo');

    e.preventDefault();
});
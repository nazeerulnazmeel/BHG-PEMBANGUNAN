<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="assets/js/Simple-Slider.js"></script>
</body>

<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#tunjuk-unit').change(function() {
    //         var unit_id = $('#tunjuk-unit').val();
    //         $.ajax({
    //             method: 'post',
    //             url: 'controller/loadunit.php',
    //             data: 'unit_id_pnp=' + unit_id
    //         }).done(function(kump) {
    //             console.log(kump);
    //             $('#pengurusan').empty();
    //             $('#pengurusan').html(kump);
    //         });

    //         $.ajax({
    //             method: 'post',
    //             url: 'controller/loadunit.php',
    //             data: 'unit_id_pel=' + unit_id
    //         }).done(function(kump2) {
    //             $('#pelaksana').empty();
    //             $('#pelaksana').html(kump2);
    //         });
    //     });
    // });

    $(document).ready(function() {
        $('#senarai-pegawai').load(function() {
            var pegawai_id = $('#senarai')
            $.ajax({
                method: 'post',
                url: 'includes/loadpegawai.inc.php',
                data: 'pegawai_uid=' + pegawai_id
            }).done(function(pegawai) {
                console.log(pegawai);
            }) 
        })
    });
</script>

</html>
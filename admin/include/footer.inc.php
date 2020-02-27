<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="../assets/js/Simple-Slider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#pilih-cawangan').change(function() {
            var uid = $('#pilih-cawangan').val();
            $.ajax({
                method: 'post',
                url: 'controller/loadunit.php',
                data: 'uid=' + uid
            }).done(function(units) {
                console.log(units);
                $('#tunjuk-unit').empty();
                $('#tunjuk-unit').html(units);
            });
        })
    });
</script>
</body>

</html>
<!-- jQuery + Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
<script>
$(document).ready(function () {
    $('#categorySelect').select2({
        placeholder: "-- Select Category --",
        allowClear: true,
        width: '300px'
    });
 
    // Enter key se highlighted option select hoga
    $(document).on('keyup', '.select2-search__field', function (e) {
        if (e.keyCode === 13) { // Enter key
            e.preventDefault();
            let highlighted = $('.select2-results__option--highlighted');
            if (highlighted.length) {
                highlighted.trigger('mouseup'); // select option
                $('#categorySelect').select2('close'); // close dropdown
            }
        }
    });
});
</script>
 

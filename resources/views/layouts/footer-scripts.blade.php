<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

<script>
    // عندما يتم الضغط على الـ checkbox الكبير
    $('#select_all_box').click(function() {
        $('.checkbox_row').prop('checked', this.checked);
    });

    // لحذف جميع ال checkboxs المتحددة
    $('#bulk-delete-btn').click(function() {
    var selectedIds = [];
    $('.checkbox_row:checked').each(function() {
        selectedIds.push($(this).val());
    });

    if(selectedIds.length === 0){
        alert("{{ trans('classrooms.no_selection') }}");
        $('#delete_all_classes').modal('hide');
    } else {
        $('#bulk-delete-ids').val(selectedIds.join(','));
    }
});

</script>


{{-- this script to show button to delete all classrooms when checked the checkboxes --}}
<script>
    // وظيفة علشان تتحقق من الـ checkboxes وتظهر أو تخفي الزر
    function toggleBulkDeleteButton() {
        const checkedBoxes = $('.checkbox_row:checked');
        const bulkDeleteBtn = $('#bulk-delete-btn');

        if (checkedBoxes.length > 0) {
            bulkDeleteBtn.show();
        } else {
            bulkDeleteBtn.hide();
        }
    }

    // لما الصفحة تتحمل
        $(document).ready(function() {
        // تحقق أول مرة
        toggleBulkDeleteButton();

        // استمع للتغير في كل الـ checkboxes
        $('.checkbox_row').change(function() {
            toggleBulkDeleteButton();
        });

        // Select all checkbox
        $('#select_all_box').change(function() {
            $('.checkbox_row').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });

    });
</script>

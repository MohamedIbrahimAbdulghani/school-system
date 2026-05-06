<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

<script>
    $('#select_all_box').click(function() {
        $('.checkbox_row').prop('checked', this.checked);
    });

    $('#bulk-delete-btn').click(function() {
        var selectedIds = [];
        $('.checkbox_row:checked').each(function() {
            selectedIds.push($(this).val());
        });
        if (selectedIds.length === 0) {
            alert("{{ trans('classrooms.no_selection') }}");
            $('#delete_all_classes').modal('hide');
        } else {
            $('#bulk-delete-ids').val(selectedIds.join(','));
        }
    });

    function toggleBulkDeleteButton() {
        const checkedBoxes = $('.checkbox_row:checked');
        const bulkDeleteBtn = $('#bulk-delete-btn');
        if (checkedBoxes.length > 0) {
            bulkDeleteBtn.show();
        } else {
            bulkDeleteBtn.hide();
        }
    }

    $(document).ready(function() {
        toggleBulkDeleteButton();
        $('.checkbox_row').change(function() {
            toggleBulkDeleteButton();
        });
        $('#select_all_box').change(function() {
            $('.checkbox_row').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });
    });
</script>

{{-- Ajax grade -> classroom -> section --}}
<script>
$(document).ready(function () {
    $('select[name="grade_id"]').on('change', function () {
        let grade_id = $(this).val();
        let classroom = $('select[name="classroom_id"]');
        let section = $('select[name="section_id"]');

        classroom.empty().prop('disabled', true);
        section.empty().prop('disabled', true);

        if (grade_id) {
            $.ajax({
                url: "/{{ app()->getLocale() }}/get_classrooms/" + grade_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    classroom.append('<option selected disabled>{{ trans("student.Choose") }}</option>');
                    $.each(data, function (key, value) {
                        classroom.append('<option value="' + key + '">' + value + '</option>');
                    });
                    classroom.prop('disabled', false);
                }
            });
        }
    });

    $('select[name="classroom_id"]').on('change', function () {
        let classroom_id = $(this).val();
        let section = $('select[name="section_id"]');

        section.empty().prop('disabled', true);

        if (classroom_id) {
            $.ajax({
                url: "/{{ app()->getLocale() }}/get_sections/" + classroom_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    section.append('<option selected disabled>{{ trans("student.Choose") }}</option>');
                    $.each(data, function (key, value) {
                        section.append('<option value="' + key + '">' + value + '</option>');
                    });
                    section.prop('disabled', false);
                }
            });
        }
    });

    $('select[name="grade_id_new"]').on('change', function () {
        let grade_id = $(this).val();
        let classroom = $('select[name="classroom_id_new"]');
        let section = $('select[name="section_id_new"]');

        classroom.empty().prop('disabled', true);
        section.empty().prop('disabled', true);

        if (grade_id) {
            $.ajax({
                url: "/{{ app()->getLocale() }}/get_classrooms/" + grade_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    classroom.append('<option selected disabled>{{ trans("student.Choose") }}</option>');
                    $.each(data, function (key, value) {
                        classroom.append('<option value="' + key + '">' + value + '</option>');
                    });
                    classroom.prop('disabled', false);
                }
            });
        }
    });

    $('select[name="classroom_id_new"]').on('change', function () {
        let classroom_id = $(this).val();
        let section = $('select[name="section_id_new"]');

        section.empty().prop('disabled', true);

        if (classroom_id) {
            $.ajax({
                url: "/{{ app()->getLocale() }}/get_sections/" + classroom_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    section.append('<option selected disabled>{{ trans("student.Choose") }}</option>');
                    $.each(data, function (key, value) {
                        section.append('<option value="' + key + '">' + value + '</option>');
                    });
                    section.prop('disabled', false);
                }
            });
        }
    });
});
</script>

@yield('js')

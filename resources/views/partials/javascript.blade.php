{{-- Check if the user is online --}}
@if (App::environment('production') && @fsockopen('www.google.com', 80))
    {{-- Load online scripts --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@else
    {{-- Load offline scripts --}}
    <script src="{{ asset('/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery_ui.js') }}"></script>
    <script src="{{ asset('/assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    @yield('additional_javascript')
@endif

{{-- Additional inline JavaScript if needed --}}
@yield('additional_javascript')

{{-- Initialize scripts --}}
<script>
    $(document).ready(function() {
        $('#class_id').change(function() {
            let class_id = $(this).val();
            
            if (class_id) {
                $.ajax({
                    url: "{{ route('attendance.fetch-students') }}", // Route to fetch students
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        class_id: class_id
                    },
                    success: function(response) {
                        $('#students-section').html(response); // Load students into the section
                        $('#submit-btn').show(); // Show submit button once students are loaded
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText); // Log any errors
                    }
                });
            } else {
                $('#students-section').html('<p>Please select a class to see the students.</p>');
                $('#submit-btn').hide(); // Hide submit button if no class is selected
            }
        });
    });
</script>
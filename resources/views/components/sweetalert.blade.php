@if (session('alert'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            swal({
                title: "{{ session('alert.title') }}",
                text: "{{ session('alert.text') }}",
                icon: "{{ session('alert.icon') }}"
            });
        });
    </script>
@endif
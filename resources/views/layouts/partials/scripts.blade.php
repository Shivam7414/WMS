<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!};    
</script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>

<!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ asset('js/web.js') }}"></script>


<script type="text/javascript">
    @if(session('success'))
        showToast('success', '{{ session('success') }}');
    @elseif(session('error'))
        showToast('error', '{{ session('error') }}');
    @elseif(session('warning'))
        showToast('warning', '{{ session('warning') }}');
    @elseif(session('info'))
        showToast('info', '{{ session('info') }}');
    @elseif(session('question'))
        showToast('question', '{{ session('question') }}');
    @endif
</script>

@yield('scripts')
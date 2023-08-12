<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!};    
</script>
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e6670c54bd.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

<script src="{{ asset('js/admin.js') }}"></script>


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
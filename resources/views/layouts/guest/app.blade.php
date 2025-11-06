{{-- start css --}}
@include('layouts.guest.css')
{{-- END css --}}

{{--start navbar --}}
@include('layouts.guest.navbar')
{{--end navbar --}}

{{-- start content --}}
@yield('content')

{{-- end content --}}

{{-- Start Float --}}
@include('layouts.guest.float')
{{-- End Float --}}

{{-- start footer --}}
@include('layouts.guest.footer')
{{-- end footer --}}

{{-- start js --}}
@include('layouts.guest.js')
{{-- end js --}}

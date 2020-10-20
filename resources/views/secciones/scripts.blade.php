<!--   Core JS Files   -->
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{asset('js/plugins/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/moment.es.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert2.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('js/plugins/jquery.validate.min.js')}}"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
{{-- <script src="{{url('/')}}/js/plugins/jquery.bootstrap-wizard.js"></script> --}}
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
{{-- <script src="{{url('/')}}/js/plugins/bootstrap-selectpicker.js"></script> --}}
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
{{-- <script src="{{url('/')}}/js/plugins/jquery.dataTables.min.js"></script> --}}
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{url('/')}}/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
@if (request()->is('perfil') OR request()->is('proyectos'))
<script src="{{asset('js/plugins/jasny-bootstrap.min.js')}}"></script>
@endif
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
{{-- <script src="{{url('/')}}/js/plugins/fullcalendar.min.js"></script> --}}
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
{{-- <script src="{{url('/')}}/js/plugins/jquery-jvectormap.js"></script> --}}
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('js/plugins/nouislider.min.js')}}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
{{-- <script src="../../../../cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script> --}}
<!-- Library for adding dinamically elements -->
{{-- <script src="{{url('/')}}/js/plugins/arrive.min.js"></script> --}}
{{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
<!-- Chartist JS -->
{{-- <script src="{{url('/')}}/js/plugins/chartist.min.js"></script> --}}
<!--  Notifications Plugin    -->
{{-- <script src="{{url('/')}}/js/plugins/bootstrap-notify.js"></script> --}}
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-dashboard.min.js')}}" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
{{-- <script src="http://chaicopadillag.com/js/fontawesome.min.js" data-auto-replace-svg="nest"></script> --}}
<script src="{{asset('js/cv-true.js')}}"></script>

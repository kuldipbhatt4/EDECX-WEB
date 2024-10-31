<script src="{{asset('edecx/website/assets/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('edecx/website/assets/js/popper.min.js')}}"></script>
<script src="{{asset('edecx/website/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('edecx/website/assets/js/jquery.validate.min.js')}}"></script>
<!-- Sticky Sidebar JS -->
<script src="{{asset('edecx/website/assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('edecx/website/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('edecx/website/assets/plugins/select2/js/select2.min.js')}}"></script>

<!-- Datetimepicker JS -->
<script src="{{asset('edecx/website/assets/js/moment.min.js')}}"></script>
<script src="{{asset('edecx/website/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('edecx/website/assets/js/script.js')}}"></script>
<script src="{{asset('edecx/website/assets/js/bootstrap-multiselect.js')}}"></script>
<script>
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert-success").fadeOut('fast');
            $("div.alert-danger").fadeOut('fast');
            $("div.alert-warning").fadeOut('fast');
            $("div.alert-info").fadeOut('fast');
        }, 1000 );
    });
   </script>

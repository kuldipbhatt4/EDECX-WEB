@extends('student.layouts.app')
@section('edecx')

@if(!empty($getTutorDetails) && count($getTutorDetails) > 0)
    @foreach($getTutorDetails as $key => $getTutorDetail)
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="booking-user-info">
                        <a href="{{url('/tutor/tutor-profile/'.$getTutorDetail->id)}}" class="booking-user-img">
                            @if($getTutorDetail->tutor_image != '')
                                @if(file_exists(public_path('edecx/website/tutor-profile/'.$getTutorDetail->tutor_image)))
                                    <img class="img-fluid" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/tutor-profile/'.$getTutorDetail->tutor_image)))) }}"  alt="{{$getTutorDetail->tutors_fname . ' '.$getTutorDetail->tutors_lname}}">
                                @else
                                    <img class="img-fluid" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="{{$getTutorDetail->tutors_fname . ' '.$getTutorDetail->tutors_lname}}">
                                @endif
                            @else
                                <img class="img-fluid" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="{{$getTutorDetail->tutors_fname . ' '.$getTutorDetail->tutors_lname}}">
                            @endif
                        </a>
                        <div class="booking-info">
                            <h4><a href="{{url('/tutor/tutor-profile/'.$getTutorDetail->id)}}">{{$getTutorDetail->tutors_fname . ' '.$getTutorDetail->tutors_lname}}</a></h4>
                            <div class="rateit rating" data-rateit-value="{{ $getTutorDetail->avg_tutor_review > 0 ?  $getTutorDetail->avg_tutor_review : 0 }}" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5" data-rateit-resetable="false" data-rateit-readonly="true" > <span class="d-inline-block average-rating">({{($getTutorDetail->total_tutor_review > 0 ? $getTutorDetail->total_tutor_review : '0')}})</span></div> 	                                

                            <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{$getTutorDetail->address}}, {{$getTutorDetail->city}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-4">
                    <h4 class="mb-1">Please select your booking date & slot</h4>                    
                </div>
                <div class="col-12 col-sm-8 col-md-6 text-sm-left">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" id="booked_start_date" type="button" id="datePickerShow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Booking Date
                        </button>
                        <div class="dropdown-menu" aria-labelledby="datePickerShow"></div>
                    </div>
                </div>
            </div>
            <!-- Schedule Widget -->
            <div class="alert alert-danger hide error_show_booking"  role="alert"></div>
            <div class="alert alert-success hide success_show_booking"  role="alert"></div>
            <div class="card booking-schedule schedule-widget">            
                <!-- Schedule Header -->
                <div class="schedule-header">
                    <div class="row">
                        <div class="col-md-12">
                        
                        <h4 class="mb-1 show_changed_date"></h4>
                        <p class="text-muted show_day_name"></p>
                        <p class="text-muted"><small>Booking duration would be 1 hour</small></p>
                            
                        </div>
                    </div>
                </div>
                <!-- /Schedule Header -->
                <div class="schedule-cont">
                    <div class="row">
                        <div class="col-md-12">                    
                            <div class="time-slot">
                                <ul class="clearfix show_available_time_slots">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>              
             
            </div>
            <!-- /Schedule Widget -->
            <!-- Submit Section -->
            <div class="submit-section proceed-btn text-right">
                <button type="button" class="btn btn-primary submit-btn " id="clk_booking_tutor" onclick="bookingTutor()">Pay ${{($getTutorDetail->hrprice > 0 ? $getTutorDetail->hrprice : 0 )}}</small></button>
            </div>
            <!-- /Submit Section -->
        </div>
    @endforeach
@else
    <div class="col-12">Sorry! No tutor found with details</div>
    
@endif 
@endsection
<link href="{{asset('edecx/website/assets/plugins/ratings/rateit.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('edecx/website/assets/css/bootstrap-datepicker.css')}}" rel="stylesheet" type="text/css">
@section('page-js-script')
<script src="{{asset('edecx/website/assets/plugins/ratings/jquery.rateit.js')}}"></script>
<script src="{{asset('edecx/website/assets/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(document).ready(function(){
        var initdate = new Date();
        var todayDate = initdate.getFullYear() + "/" + (initdate.getMonth()+1) + "/" + initdate.getDate();
        $(document).on('click','.nav-link',function(){
                let id = $(this).attr('data-id');
                $('#id').val(id);
        }); 
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";    
        $('#booked_start_date').datepicker({
            format: 'yyyy-mm-dd',        
            todayHighlight: true,
            startDate: '+0d',                         
            //endDate:'',            
            autoclose: true,
            container: container,
            beforeShowDay: function(date){}
        }).on('changeDate', function (e) {            
            e.preventDefault();
            //new Date(e.date).toLocaleDateString('en-US');
            var getDateValue = e.format(0,"d MM yyyy");            
            $("#session_booked_start_date").val(getDateValue);
            changeBookingDate(getDateValue);                 
        });
        $('#booked_start_date').datepicker('setDate', todayDate);
    });
    function changeBookingDate(getDateValue){
        if(!getDateValue){
            getDateValue = '';
        }        
        var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        var makeDate = new Date(getDateValue);
        var getDayName = weekday[makeDate.getDay()];
        $(".show_changed_date").html(getDateValue);
        $(".show_day_name").html(getDayName);
        $(".error_show_booking").hide();

        $.ajax({
                type : 'POST',
            url: "{{url('student/book-appointment-get-timeslots/')}}",
            dataType:'json',                
            data:{'booking_t_id': "{{$b_tutor_id}}",'s_date':getDateValue,'_token':"{{csrf_token()}}",'reschedule_id':"{{$reschedule_id}}"},
            success : function(data){                    
                $('.show_available_time_slots').html(data.html);                       
            },error: function(data){
                alert("Sorry! Something went Wrong, Please try after some time.");
            },
        });
    }

    function bookingTutor(){
        $("#clk_booking_tutor").prop('disabled', true);
        var txt_booking_slot = $('input[name="txt_booking_slot"]:checked').val();
        var hdn_selected_booking_date = $("#hdn_selected_booking_date").val();
        if(txt_booking_slot > 0){
            $(".error_show_booking").hide();
            $.ajax({
                type : 'POST',
                url: "{{url('student/student-book-appointment')}}",
                dataType:'json',                
                data:{'booking_tutor_id': "{{$b_tutor_id}}",'booking_date':hdn_selected_booking_date,'_token':"{{csrf_token()}}",'txt_booking_slot':txt_booking_slot,'reschedule_id':"{{$reschedule_id}}"},
                success : function(data){                    
                    if(data.status == true){
                        $(".success_show_booking").html(data.return_msg);
                        $(".success_show_booking").show();
                        setTimeout(() => {
                            window.location.href = data.page_link;     
                        },2200);
                       
                    }
                    else{
                        $(".error_show_booking").html(data.return_msg);
                        $(".error_show_booking").show();
                        $("#clk_booking_tutor").prop('disabled', false);                        
                    }
                },error: function(data){
                    alert("Sorry! Something went Wrong, Please try after some time.");
                    $("#clk_booking_tutor").prop('disabled', false);
                },
            });
        }
        else{
            $(".error_show_booking").html("Please select booking time");
            $(".error_show_booking").show();
            $("#clk_booking_tutor").prop('disabled', false);
        }
    }

    
 </script>
@endsection
</body>
</html>
@extends('tutor.layouts.app')
@section('edecx')
{{-- sidebar --}}
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    @include('tutor.partials.sidebar')
</div>
{{-- /sidebar --}}
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Schedule Timings</h4>
                    @include('flash-message')
                    <div class="profile-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card schedule-widget mb-0">
                                    <form method="post" action="{{url('tutor/schedule-timing-submit/')}}" enctype="multipart/form-data" name="frm_tutor_time_avibility" id="frm_tutor_time_avibility"> 
                                        {{ csrf_field() }}                         
                                        <!-- Schedule Widget -->
                                        <div class="card booking-schedule schedule-widget">                
                                            <!-- Schedule Header -->
                                            <div class="schedule-header">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- Day Slot -->
                                                        <div class="day-slot">
                                                            <ul>                                
                                                            @foreach($days as $dayname)      
                                                                <li>
                                                                    <span>{{ $dayname->day}}</span>
                                                                    <!-- </span>-->
                                                                </li>
                                                            @endforeach
                                                            
                                                            </ul>
                                                        </div>
                                                        <!-- /Day Slot -->

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Schedule Header -->

                                            <!-- Schedule Content -->
                                            <div class="schedule-cont">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <!-- Time Slot -->
                                                        <div class="time-slot">
                                                            <ul class="clearfix">
                                                            @foreach($days as $dayname)      
                                                                <li>
                                                                @foreach($time as $timeslot)                                      
                                                                    <input type="checkbox" name="txt_time_slot[]" id="txt_time_slot{{$timeslot->id}}" value="{{$dayname->id}}_{{$timeslot->id}}" class="" {{in_array($dayname->id.'_'.$timeslot->id,$selectedSlot) ? 'checked' : ''}}>
                                                                    <a class="timing {{in_array($dayname->id.'_'.$timeslot->id,$selectedSlot) ? 'selected' : ''}}"><span>{{date('H:i A',strtotime($timeslot->start_time))}}</span></a>                                                                    
                                                                @endforeach
                                                            @endforeach
                                                            </ul>
                                                        </div>
                                                        <!-- /Time Slot -->
                                                    </div> 
                                                </div>
                                            </div>
                                            <!-- /Schedule Content -->
                                        </div>
                                        <!-- /Schedule Widget -->                                            
                                            <input type="submit" class="btn btn-ftutor" value="Continue" name="submit_frm_tutor_time_avibility" id="submit_frm_tutor_time_avibility">                                                                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js-script')
<script>
  $(document).on('click','.nav-link',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
    
    $('#frm_tutor_time_avibility').validate({ 
        rules: {
            'txt_time_slot[]': {
                required: true
            }
        },
        messages:{
            'txt_time_slot[]': {required: "Please select any time slot"}
        }
    });    

    $("#submit_frm_tutor_time_avibility").click(function(event){        
        if($("#frm_tutor_time_avibility").valid()){
            $("#frm_tutor_time_avibility").submit();
        }
        else{
            return false;
        }
    });

 </script>
@endsection
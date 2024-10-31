<li class="li_listing_booking_slots {{$total_tutor_bookings > 8 ? 'red_color full_slot' : ''}}">
    {{$total_tutor_bookings}} booking
    @if($total_tutor_bookings > 8)
    @else
        <input type="radio" name="txt_booking_slot" id="txt_booking_slot_{{$time_id}}" value="{{$time_id}}" class=""> 
    @endif
    <a class="timing" ><span>{{date('H:i A',strtotime($start_time))}} To {{date('H:i A',strtotime($start_time_plus))}}</span></a>   
    <input type="hidden" name="hdn_selected_booking_date" id="hdn_selected_booking_date" value="{{$s_date}}" />
</li>
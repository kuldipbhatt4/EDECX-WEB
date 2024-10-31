<p>Booking Date: {{date('d F yy',strtotime($booking_date))}}</p>
<p>Booking Time: <span class="">{{date('H:i A',strtotime($start_time))}} - {{date('H:i A',strtotime($start_time_plus))}}</span></p>
<p>Booking Price: {{env('CURRENCY_SIGN')}}{{$price}}</p>
<p>Booking Status: <span class="{{$status}}">{{$status}}</span></p>
<p>Student Name:{{$fname}} {{$lname}}</p>
<p>Student Number: {{$mobile_no}}</p>
<p>Student Email: {{$email}}</p>
<p>Student Address: {{$address}},{{$street_address}}, {{$city}}</p>

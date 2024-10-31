<p>Booking Date: {{date('d F yy',strtotime($booking_date))}}</p>
<p>Booking Time: <span class="">{{date('H:i A',strtotime($start_time))}} - {{date('H:i A',strtotime($start_time_plus))}}</span></p>
<p>Booking Price: {{env('CURRENCY_SIGN')}}{{$price}}</p>
<p>Booking Status: <span class="{{$status}}">{{$status}}</span></p>
<p>Tutor Name:{{$tutors_fname}} {{$tutors_lname}}</p>
<p>Tutor Number: {{$contact_no}}</p>
<p>Tutor type degree:{{$typedegree}} </p>
<p>Tutor Email: {{$tutor_email}}</p>
<p>Tutor Address: {{$address}},{{$city}}</p>

<tr>
    <td>
        <h2 class="table-avatar">
            <a href="{{url('/tutor/tutor-profile/'.$tutor_id)}}" class="avatar avatar-sm mr-2">                                    
                @if($tutor_image != '')
                    @if(file_exists(public_path('edecx/website/tutor-profile/'.$tutor_image)))
                        <img  class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/tutor-profile/'.$tutor_image)))) }}"  alt="{{$tutors_fname . ' '.$tutors_lname}}">
                    @else
                        <img  class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="{{$tutors_fname . ' '.$tutors_lname}}">
                    @endif
                @else
                    <img  class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="{{$tutors_fname . ' '.$tutors_lname}}">
                @endif
            </a>                        
            <a href="{{url('/tutor/tutor-profile/'.$tutor_id)}}">{{$tutors_fname . ' '.$tutors_lname}} <span>{{$tutor_email}}</span></a>
        </h2>
    </td>
    <td>{{date('d F yy',strtotime($booking_date))}} </td>
    <td><span class="">{{date('H:i A',strtotime($start_time))}} - {{date('H:i A',strtotime($start_time_plus))}}</span></td>
    <td class="text-center">
        <div class="rateit rating" data-rateit-value="{{ $student_given_review > 0 ?  $student_given_review : 0 }}" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5" data-rateit-resetable="false" data-rateit-readonly="true" onclick="giveReview('{{$booking_id}}')"></div>        
    </td>    
    <td class="text-center"><span class="{{$status}}">{{$status}}</span></td>        
    <td class="text-center">
        <button type="button" class="btn btn-sm bg-info-light" onclick="viewDetails('{{$booking_id}}')"><i class="far fa-eye"></i> View</button>
        @if( $status == 'Accept' || $status == 'Pending')
            <button class="btn btn-sm bg-info-light" onclick="clickReschedule('{{$reschedule_link}}')"><i class="far fa-user"></i> reschedule</button>
        @else
        @endif
    </td>    
</tr>

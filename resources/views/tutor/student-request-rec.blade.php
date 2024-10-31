<tr>
    <td>
        <h2 class="table-avatar">
            <a href="{{url('/student/student-profile/'.$student_id)}}" class="avatar avatar-sm mr-2">                                    
                @if($student_image != '')
                    @if(file_exists(public_path('edecx/website/student-profile/'.$student_image)))
                        <img  class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/student-profile/'.$student_image)))) }}"  alt="{{$fname . ' '.$lname}}">
                    @else
                        <img  class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="{{$fname . ' '.$lname}}">
                    @endif
                @else
                    <img  class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="{{$fname . ' '.$lname}}">
                @endif
            </a>                        
            <a href="{{url('/student/student-profile/'.$student_id)}}">{{$fname . ' '.$lname}} <span>{{$email}}</span></a>
        </h2>
    </td>
    <td>{{date('d F yy',strtotime($booking_date))}} </td>    
    <td><span class="">{{date('H:i A',strtotime($start_time))}} - {{date('H:i A',strtotime($start_time_plus))}}</span></td>
    <td class="text-center"><span class="{{$status}}">{{$status}}</span></td>        
    <td class="text-center">
        <button type="button" class="btn btn-sm bg-info-light" onclick="viewDetails('{{$booking_id}}')"><i class="far fa-eye"></i> View</button>
        @if( $status == 'Pending')
            <a class="btn btn-accept" onclick="clickBookingStatus('{{$booking_id}}','a')"><i class="far fa-user"></i> Accept</a>
            <a class="btn btn-cancel" onclick="clickBookingStatus('{{$booking_id}}','r')"><i class="far fa-user"></i> Reject</a>
        @else
        @endif
    </td>    
</tr>
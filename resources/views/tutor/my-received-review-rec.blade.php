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
    <td class="text-center">
        <div class="rateit rating" data-rateit-value="{{ $rating > 0 ?  $rating : 0 }}" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5" data-rateit-resetable="false" data-rateit-readonly="true"></div>        
    </td>    
    <td class="text-center">{{$review_description}}</td>        
</tr>
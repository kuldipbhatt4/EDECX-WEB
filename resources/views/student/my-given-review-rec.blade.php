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
    <td class="text-center">
        <div class="rateit rating" data-rateit-value="{{ $rating > 0 ?  $rating : 0 }}" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5" data-rateit-resetable="false" data-rateit-readonly="true"></div>        
    </td>    
    <td class="text-center">{{$review_description}}</td>        
</tr>
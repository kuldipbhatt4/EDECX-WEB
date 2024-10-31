<!-- Mentor Widget -->
    <div class="card">
        <div class="card-body">
            <div class="mentor-widget">
                <div class="user-info-left">
                    <div class="mentor-img">
                        <a href="{{url('/tutor/tutor-profile/'.$tutor_id)}}">                                    
                            @if($tutor_image != '')
                                @if(file_exists(public_path('edecx/website/tutor-profile/'.$tutor_image)))
                                    <img class="img-fluid" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/tutor-profile/'.$tutor_image)))) }}"  alt="{{$tutors_fname . ' '.$tutors_lname}}">
                                @else
                                    <img class="img-fluid" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="{{$tutors_fname . ' '.$tutors_lname}}">
                                @endif
                            @else
                                <img class="img-fluid" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="{{$tutors_fname . ' '.$tutors_lname}}">
                            @endif
                        </a>
                    </div>
                    <div class="user-info-cont">
                        <h4 class="usr-name"><a href="{{url('/tutor/tutor-profile/'.$tutor_id)}}">{{$tutors_fname . ' '.$tutors_lname}}</a></h4>
                        <p class="mentor-type">{{$typedegree}}</p>
                        <div class="rateit rating" data-rateit-value="{{ $avg_tutor_review > 0 ?  $avg_tutor_review : 0 }}" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5" data-rateit-resetable="false" data-rateit-readonly="true" > <span class="d-inline-block average-rating">({{($total_tutor_review > 0 ? $total_tutor_review : '0')}})</span></div> 	                                
                        <div class="mentor-details">
                            <p class="user-location"><i class="fas fa-map-marker-alt"></i> {{$address}}, {{$city}}</p>
                        </div>
                    </div>
                </div>
                <div class="user-info-right">
                    <div class="user-infos">
                        <ul>
                            <li><i class="far fa-comment"></i> {{$total_tutor_order}} Total orders</li>
                            <li><i class="fas fa-map-marker-alt"></i> {{$address}}, {{$city}}</li>
                            <li><i class="far fa-money-bill-alt"></i> {{env('CURRENCY_SIGN')}}{{($hrprice > 0 ? $hrprice : '--')}}/hours <i class="fas fa-info-circle" data-toggle="tooltip" title="${{$hrprice}} hourly rate"></i> </li>
                        </ul>
                    </div>
                    <div class="mentor-booking">
                        <a class="apt-btn" href="{{url('/student/book-appointment/'.$tutor_id)}}">Book Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Mentor Widget -->
 
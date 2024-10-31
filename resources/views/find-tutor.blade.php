@extends('website.layouts.app')
@section('edecx')

<section class="section section-search banner">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>Find your perfect online tutor </h1>
                <p>Expert one-to-one help, wherever you are, with online tutoring.</p>
            </div>
        </div>
    </div>
</section>
<!-- /Home Banner -->
<!-- find subject -->
<section class="find-subject">
    <div class="container">
        <form method="get" action="{{url('student/tutor-list')}}" enctype="multipart/form-data" name="frm_search_tutor" id="frm_search_tutor"> 
            <!-- {{ csrf_field() }} -->
            <div class="find-subjectdiv">
                <h3>which subject you learning?</h3>
                <ul>
                    @foreach($subjects as $subject)
                    <li class="subject-box">
                        <input type="radio" name="tutor_subject" id="tutor_subject_{{$subject->id}}" value="{{$subject->id}}">
                            <div class="subject-img">
                                <img src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/subject-icon/'.$subject->subject_web_icon)))) }}"  height="50" width="50">
                            </div>
                            <div class="subject-text">                        
                                <h4>{{$subject->subject_name}}</h4>
                            </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="hide level show_level">
                <h3>Which level?</h3>
                <ul>
                    @foreach($levels as $level)
                    <input type="radio" name="tutor_level" id="tutor_level_{{$level->id}}" value="{{$level->id}}">
                    <li class="subject-box level-box">
                        <h4>{{$level->level}}</h4>
                    </li>
                    @endforeach
                </ul>
            </div>        

            <div class="hide level show_class_type">
                <h3>Which class type?</h3>
                <ul>
                    @foreach($classtype as $class)
                    <input type="radio" name="tutor_class" id="tutor_class_{{$class->id}}" value="{{$class->id}}">
                    <li class="subject-box level-box">
                        <h4>{{$class->classtype}}</h4>
                    </li>
                    @endforeach
                </ul>
            </div>        
                <input type="hidden" name="orderBy" value="latest" class="hide"/>
                <input type="hidden" name="view_type" value="list" class="hide"/>
                @if($studentid > 0)
                    <input type="submit" class="btn btn-ftutor" value="Submit" id="submit_frm_search_tutor">                    
                @else                    
                    <a href="{{ url('student/login') }}" class="btn btn-ftutor">Continue</a>
                @endif
        </form>
    </div>
</section>
<!-- /find subject -->
<!-- Statistics Section -->
<section class="section statistics-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>500+</span>
                    <h3>Happy Clients</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>120+</span>
                    <h3>Online Appointments</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>100%</span>
                    <h3>Job Satisfaction</h3>
                </div>
            </div>
        </div>
    </div>
</section>

@section('page-js-script')
<script>
    $(document).ready(function(){
        $(".subject-box").click(function(){
            $(".show_level").show();
            $(".show_level").click(function(){
                $(".show_class_type").show();
            });
        });
    
        $(document).on('click','.nav-link',function(){
                let id = $(this).attr('data-id');
                $('#id').val(id);
        });
    
        $('#frm_search_tutor').validate({ 
            rules: {
                tutor_subject: {required: true},
                tutor_level: {required: true}, 
                tutor_class: {required: true}
            },
            messages:{
                tutor_subject: {required: "Please select any subject"},
                tutor_level: {required: "Please select any lavel"},
                tutor_class: {required: "Please select class type"},
            }
        });    

        $("#submit_frm_search_tutor").click(function(event){        
            if($("#frm_search_tutor").valid()){
                $("#frm_search_tutor").submit();
            }
            else{
                return false;
            }
        });
    });
 </script>
@endsection


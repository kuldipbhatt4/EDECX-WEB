@extends('student.layouts.app')
@section('edecx')
   <div class="content request-box">
    <div class="container py-3">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="accordion" id="faqExample">
                    <div class="card">
                        @if(!empty($faqsstudents) && $faqsstudents->count())
                            @foreach ($faqsstudents as $key => $faqstudent)
                                <div class="card-header p-2" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Q: {{ $faqstudent->faq_question }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqExample">
                                    <div class="card-body">
                                        <b>Answer: </b>{!! $faqstudent->faq_answer !!}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>
    <!--container-->
</div>
@endsection

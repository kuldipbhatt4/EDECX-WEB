@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                      <h4 class="card-title">FAQ Tutors List</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>Sr No.</th>
                                  <th>Tutor</th>
                                  <th>Question</th>
                                  <th>Answer</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @if(!empty($faqstutors) && $faqstutors->count())
                                @foreach ($faqstutors as $key => $faqstutor)
                                <tr>
                                    <td>{{ $faqstutors->firstItem() + $key }}</td>
                                    <td>@if($faqstutor->student_tutor=='1')
                                                Tutor
                                        @endif
                                    </td>
                                    <td>{{$faqstutor->faq_question}}</td>
                                    <td>{!! substr($faqstutor->faq_answer,0,20) !!}</td>
                                    <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a href="{{action('Admin\Auth\FaqController@edit', $faqstutor->id)}}" class="iq-bg-primary edit-location">
                                                    <i class="ri-pencil-line "></i>
                                                </a>
                                                <a class="iq-bg-primary" data-href="{{ URL::asset('edecx-admin/pages/faq/'.$faqstutor->id) }}" data-toggle="modal" data-target="#confirm-delete">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                   <td colspan="12">There are no data.</td>
                                </tr>
                             @endif
                           </tbody>
                         </table>
                      </div>
                         <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                                <span>Showing {{ $faqstutors->firstItem() }} to {{ $faqstutors->lastItem() }} of total {{$faqstutors->total()}} entries</span>
                            </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                     {{ $faqstutors->links() }}
                                  </ul>
                               </nav>
                            </div>
                         </div>
                   </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                       <div class="iq-header-title">
                          <h4 class="card-title">FAQ Students List</h4>
                       </div>
                    </div>
                    <div class="iq-card-body">
                       <div class="table-responsive">
                          <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                            <thead>
                                <tr>
                                   <th>Sr No.</th>
                                   <th>Student</th>
                                   <th>Question</th>
                                   <th>Answer</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--  {{ dd($faqsstudents->count()) }}  --}}
                             @if(!empty($faqsstudents) && $faqsstudents->count() > 0)
                                 @foreach ($faqsstudents as $key => $faqsstudent)
                                 <tr>
                                     <td>{{ $faqsstudents->firstItem() + $key }}</td>
                                     <td>@if($faqsstudent->student_tutor=='0')
                                                 Student
                                         @endif
                                     </td>
                                     <td>{{$faqsstudent->faq_question}}</td>
                                     <td>{!! substr($faqsstudent->faq_answer,0,20) !!}</td>
                                     <td>
                                             <div class="flex align-items-center list-user-action">
                                                 <a href="{{action('Admin\Auth\FaqController@edit', $faqsstudent->id)}}" class="iq-bg-primary edit-location">
                                                     <i class="ri-pencil-line "></i>
                                                 </a>
                                                 <a class="iq-bg-primary" data-href="{{ URL::asset('edecx-admin/pages/faq/'.$faqsstudent->id) }}" data-toggle="modal" data-target="#confirm-delete-student">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                         </div>
                                     </td>
                                 </tr>
                                 @endforeach
                             @else
                                 <tr>
                                    <td colspan="12">There are no data.</td>
                                 </tr>
                              @endif
                            </tbody>
                          </table>
                       </div>
                          <div class="row justify-content-between mt-3">
                             <div id="user-list-page-info" class="col-md-6">
                                 <span>Showing {{ $faqsstudents->firstItem() }} to {{ $faqsstudents->lastItem() }} of total {{$faqsstudents->total()}} entries</span>
                             </div>
                             <div class="col-md-6">
                                <nav aria-label="Page navigation example">
                                   <ul class="pagination justify-content-end mb-0">
                                      {{ $faqsstudents->links() }}
                                   </ul>
                                </nav>
                             </div>
                          </div>
                    </div>
                </div>
          </div>
       </div>
    </div>
</div>
@if(!empty($faqstutors) && $faqstutors->count())
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete record?</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Do you really want to delete this record?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
                <a class="btn btn-primary btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
  @endif
  @if(!empty($faqsstudents) && $faqsstudents->count())
  <div class="modal fade" id="confirm-delete-student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete record?</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Do you really want to delete this record?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
                <a class="btn btn-primary btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
  @endif
  @endsection
@section('page-js-script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        $('#confirm-delete-student').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
    </script>
@endsection

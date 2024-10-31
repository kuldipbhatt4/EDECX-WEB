@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        @include('edecx-admin.flash-message')
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Subject List</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>Sr. No.</th>
                                  <th>Subject App Icon</th>
                                  <th>Subject Website Icon</th>
                                  <th>Subject Name</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                           @if(!empty($subjects) && $subjects->count())
                           @foreach ($subjects as $key => $subject)
                               <tr>
                                 <td>{{ $subjects->firstItem() + $key }}</td>
                                       <td>
                                       <?php if ($subject->subject_app_icon == '' || $subject->subject_app_icon == null) { ?>
                                        <img src="{{asset('/edecx/admin/images/user/11.png')}}" height="50" width="50">
                                     <?php  } else { ?>
                                        @if(file_exists(public_path('/edecx/admin/subject-icon/'.$subject->subject_app_icon)))
                                          <img src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('/edecx/admin/subject-icon/'.$subject->subject_app_icon)))) }}" height="50" width="50">
                                        @else
                                        <img src="{{asset('/edecx/admin/images/user/11.png')}}" height="50" width="50">
                                        @endif
                                          <?php } ?>
                                       </td>
                                       <td>
                                       <?php if ($subject->subject_web_icon == '' || $subject->subject_web_icon == NULL) { ?>
                                        <img src="{{asset('/edecx/admin/images/user/11.png')}}" height="50" width="50">
                                       <?php } else { ?>
                                        @if(file_exists(public_path('/edecx/admin/subject-icon/'.$subject->subject_web_icon)))
                                             <img src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('/edecx/admin/subject-icon/'.$subject->subject_web_icon)))) }}" height="50" width="50">
                                        @else
                                             <img src="{{asset('/edecx/admin/images/user/11.png')}}" height="50" width="50">
                                        @endif
                                       <?php } ?>
                                       </td>
                                    <td>{{$subject->subject_name}}</td>
                                    <td>
                                          <div class="flex align-items-center list-user-action">
                                             <a href="{{action('Admin\Auth\SubjectController@edit', $subject->id)}}" class="iq-bg-primary edit-subject"><i class="ri-pencil-line "></i></a>
                                             {{--  <a class="iq-bg-primary deletesubject" data-toggle="modal" data-id='{{$subject->id}}' data-target="#subjectModal" data-placement="top" title="" data-original-title="Delete" href=""><i class="ri-delete-bin-line"></i></a>  --}}
                                             <a class="iq-bg-primary" data-href="{{ URL::asset('/edecx-admin/subject/'.$subject->id) }}" data-toggle="modal" data-target="#confirm-delete">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                          </div>
                                    </td>
                              </tr>
                              </tbody>
                              @endforeach
                              @else
                                 <tr>
                                    <td colspan="12">There are no data.</td>
                                 </tr>
                                 </tbody>
                              @endif
                         </table>
                      </div>
                         <div class="row justify-content-between mt-3">
                             <div id="user-list-page-info" class="col-md-6">
                             <span>
                               Showing {{ $subjects->firstItem() }} to {{ $subjects->lastItem() }} of total {{$subjects->total()}} entries</span>
                              </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                    {{ $subjects->links() }}
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
@endsection
@section('page-js-script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
    </script>
@endsection

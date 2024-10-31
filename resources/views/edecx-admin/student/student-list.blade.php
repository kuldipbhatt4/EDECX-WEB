@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Students List</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                    <th>Sr No</th>
                                  <th>Student Name</th>
                                  <th>Birthdate</th>
                                  <th>Gender</th>
                                  <th>Email ID</th>
                                  <th>Mobile No</th>
                                  <th>Subject</th>
                                  <th>Level</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @if(!empty($students) && $students->count())
                            @foreach ($students as $key => $student)
                               <tr>
                                  <td>{{ $students->firstItem() + $key }}</td>
                                  <td>{{ $student->fname }} {{ $student->middle_name }} {{  $student->lname }}
                                  </td>
                                  <td>{{ $student->student_dob }}</td>
                                  <td>
                                    @if ($student->gender == '0')
                                      Male
                                    @else
                                        Female
                                    @endif
                                    </td>
                                  <td>{{ $student->email }}</td>
                                  <td>{{ $student->mobile_no }}</td>
                                  <td>
                                    <?php
                                    $selected = explode(",", $student->subject);
                                    ?>
                                    @foreach($subjects as $studentsubject)
                                        {{ (in_array($studentsubject['id'], $selected)) ? $studentsubject->subject_name : '' }}
                                    @endforeach
                                  </td>
                                  <td>
                                    <?php
                                    $selected = explode(",", $student->level);
                                    ?>
                                    @foreach($levels as $studentlevel)
                                      {{ (in_array($studentlevel['id'], $selected)) ? $studentlevel->level : '' }}
                                    @endforeach
                                  </td>
                                   <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a data-href="{{ URL::asset('/edecx-admin/student/'.$student->id) }}" data-toggle="modal" data-target="#confirm-delete">
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
                                <span>
                                    Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of total {{$students->total()}} entries
                                </span>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                         {{ $students->links() }}
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

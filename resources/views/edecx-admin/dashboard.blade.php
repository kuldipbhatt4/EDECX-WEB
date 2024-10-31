@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        @include('flash-message')
       <div class="row">
          <div class="col-md-6 col-lg-3">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body">
                   <div class="text-center"><span>Total Revenue</span></div>
                   <div class="d-flex justify-content-between align-items-center">
                      <div class="value-box">
                         <h2 class="mb-0">{{env('CURRENCY_SIGN')}}<span class="counter"><b>{{$totalEarning}}</b></span></h2>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body">
                   <div class="text-center"><span>Total Bookings</span></div>
                   <div class="d-flex justify-content-between align-items-center">
                      <div class="value-box">
                         <h2 class="mb-0"><span class="counter"><b>{{$totalBookings}}</b></span></h2>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body">
                   <div class="text-center"><span>Total Tutors</span></div>
                   <div class="d-flex justify-content-between align-items-center">
                      <div class="value-box">
                         <h2 class="mb-0"><span class="counter"><b>{{ $totaltutors }}</b></span></h2>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body">
                   <div class="text-center"><span>Total Students</span></div>
                   <div class="d-flex justify-content-between align-items-center">
                      <div class="value-box">
                         <h2 class="mb-0"><span class="counter"><b>{{ $totalstudents }}</b></span></h2>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Unapproved Tutor List</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>Sr No</th>
                                  <th>Tutor Name</th>
                                  <th>Contact</th>
                                  <th>Email</th>
                                  <th>Resume</th>
                                  <th>Status</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                           @if(!empty($tutors) && $tutors->count())
                              @foreach ($tutors as $key => $tutor)
                               <tr>
                               <td>{{ $tutors->firstItem() + $key }}</td>
                                  <td>{{ $tutor->tutors_fname }} {{ $tutor->tutors_lname }}</td>
                                  <td>{{ $tutor->tutor_email }}</td>
                                  <td>{{ $tutor->contact_no }}</td>
                                  <td>{{ $tutor->resume }}</td>
                                  <td>
                                  @if ($tutor->status == '1' )
                                    <span class="badge iq-bg-danger">Inactive</span>
                                  @endif
                                 </td>
                                  <td>
                                       <a href="/dashboard/update/{{ $tutor->id }}" class="btn btn-xs btn-info accept" data-toggle="modal" data-id='{{ $tutor->id }}' data-target="#acceptmodal" data-placement="top" title="" data-original-title="Accept" >Accept</a>
                                       <a href="/dashboard/update/{{ $tutor->id }}" class="btn btn-xs btn-info denied" data-toggle="modal" data-id='{{ $tutor->id }}' data-target="#deniedmodal" data-placement="top" title="" data-original-title="Denied" >Denied</a>
                                  </td>
                               </tr>
                               @endforeach
                           @else
                              <tr>
                                 <td colspan="12">There are no records.</td>
                              </tr>
                           @endif
                           </tbody>
                         </table>
                      </div>
                      @if(!empty($tutors) && $tutors->count())
                         <div class="row justify-content-between mt-3">
                              <div id="user-list-page-info" class="col-md-6">
                                 <span>
                                    Showing {{ $tutors->firstItem() }} to {{ $tutors->lastItem() }} of total {{$tutors->total()}} entries
                                 </span>
                              </div>
                              <div class="col-md-6">
                                   <nav aria-label="Page navigation example">
                                       <ul class="pagination justify-content-end mb-0">
                                          {{ $tutors->links() }}
                                       </ul>
                                   </nav>
                              </div>
                         </div>
                     @endif
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>

 @if(!empty($tutors) && $tutors->count())
 <div class="modal fade" id="acceptmodal" tabindex="-1" role="dialog" aria-labelledby="acceptmodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="acceptmodalLabel">edecx</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form method="post" action="{{ url('/edecx-admin/dashboard/update', $tutor->id ) }}" name="Accept" >
                  @csrf
                  <input name="id" type="hidden" id="tutorid" value="{{ $tutor->id }}"/>
                  <input name="status" type="hidden" value="{{ $tutor->status }}"/>
                  <input name="accept" type="hidden" id="accept" value="1"/>
                  <p class="text-center">Are you sure You Want To Accept?</p>
                  </div>
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Accept</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                  </div>
               </form>
          </div>
        </div>
      </div>


      <div class="modal fade" id="deniedmodal" tabindex="-1" role="dialog" aria-labelledby="deniedmodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="deniedmodalLabel">edecx</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form method="post" action="{{ url('/edecx-admin/dashboard/update', $tutor->id ) }}" name="Denied" >
                  @csrf
                  <input name="id" type="hidden" id="tutorid" value="{{ $tutor->id }}"/>
                  <input name="status" type="hidden" value="{{ $tutor->status }}"/>
                  <input name="denied" type="hidden" id="denied" value="2"/>
                  <p class="text-center">Are you sure You Want To Deny?</p>
                  </div>
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Deny</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                  </div>
               </form>
          </div>
        </div>
      </div>
   @endif
@endsection
@section('page-js-script')
<script>
  $(document).on('click','.accept',function(){
         let id = $(this).attr('data-id');
         let value = $('#accept').val();
         $('#id').val(id);
         $('#accept').val(value);
    });
    $(document).on('click','.denied',function(){
         let id = $(this).attr('data-id');
         let value = $('#denied').val();
         $('#id').val(id);
         $('#denied').val(value);
    });
 </script>
@endsection

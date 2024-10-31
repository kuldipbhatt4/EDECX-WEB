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
                         <h4 class="card-title">Inquiry List</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                <th>Sr.No.</th>
                                  <th>Full Name</th>
                                  <th>Email ID</th>
                                  <th>Phone Number</th>
                                  <th>Message</th>
                               </tr>
                           </thead>
                           <tbody>
                           @if(!empty($inquires) && $inquires->count())
                              @foreach ($inquires as $key => $inquiry)
                               <tr>
                                 <td>{{ $inquires->firstItem() + $key }}</td>
                                       <td>{{$inquiry->fname}}</td>
                                       <td>{{$inquiry->contact_email}}</td>
                                       <td>{{$inquiry->phone_no}}</td>
                                       <td>{{$inquiry->message}}</td>
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
                               Showing {{ $inquires->firstItem() }} to {{ $inquires->lastItem() }} of total {{$inquires->total()}} entries</span>
                            </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                     {{ $inquires->links() }}
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
@endsection

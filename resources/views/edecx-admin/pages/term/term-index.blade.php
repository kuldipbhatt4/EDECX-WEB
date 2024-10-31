<?php $number = 1; ?>
@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Terms List</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>Sr No.</th>
                                  <th>Version</th>
                                  <th>T&C</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach($terms as $term)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{$term->version}}</td>
                                <td>{!! substr($term->condition,0,20) !!}</td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a href="{{action('Admin\Auth\TermsConditionController@edit', $term->id)}}" class="iq-bg-primary edit-level"><i class="ri-pencil-line "></i></a>
                                        <a class="iq-bg-primary" data-href="{{ URL::asset('edecx-admin/pages/term/'.$term->id) }}" data-toggle="modal" data-target="#confirm-delete">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $number++; ?>
                            @endforeach
                           </tbody>
                         </table>
                      </div>
                         <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                                <span>Showing {{ $terms->firstItem() }} to {{ $terms->lastItem() }} of total {{$terms->total()}} entries</span>
                            </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                     {{ $terms->links() }}
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

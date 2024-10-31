@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Student Order History</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-6">
                               <div id="user_list_datatable_info" class="dataTables_filter">
                                  <form class="mr-3 position-relative">
                                     <div class="form-group mb-0">
                                        <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                     </div>
                                  </form>
                               </div>
                            </div>
                            {{-- <div class="col-sm-12 col-md-6">
                               <div class="user-list-files d-flex float-right">
                                  <a class="iq-bg-primary" href="javascript:void();" >
                                     Print
                                   </a>
                                  <a class="iq-bg-primary" href="javascript:void();">
                                     Excel
                                   </a>
                                   <a class="iq-bg-primary" href="javascript:void();">
                                     Pdf
                                   </a>
                                 </div>
                            </div> --}}
                         </div>
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>Sr No.</th>
                                  <th>Student Name</th>
                                  <th>Tutor Name</th>
                                  <th>Student Email</th>
                                  <th> Date</th>
                                  <th>Time</th>
                                  <th>Status</th>

                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                  <td>1</td>
                                  <td>Anna Sthesia</td>
                                  <td>Anna Sthesia</td>
                                  <td>annasthesia@gmail.com</td>
                                  <td>2019/12/01</td>
                                  <td>01:10</td>
                                  <td><span class="badge iq-bg-primary">Active</span></td>
                               </tr>
                               {{-- <tr>
                                  <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{asset('edecx/admin/images/user/02.jpg')}}" alt="profile"></td>
                                  <td>Brock Lee</td>
                                  <td>+62 5689 458 658</td>
                                  <td>brocklee@gmail.com</td>
                                  <td>Indonesia</td>
                                  <td><span class="badge iq-bg-primary">Active</span></td>
                                  <td>Soylent Corp</td>
                                  <td>2019/12/01</td>
                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                     </div>
                                  </td>
                               </tr>
                               <tr>
                                  <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{asset('edecx/admin/images/user/03.jpg')}}" alt="profile"></td>
                                  <td>Dan Druff</td>
                                  <td>+55 6523 456 856</td>
                                  <td>dandruff@gmail.com</td>
                                  <td>Brazil</td>
                                  <td><span class="badge iq-bg-warning">Pending</span></td>
                                  <td>Umbrella Corporation</td>
                                  <td>2019/12/01</td>
                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                     </div>
                                  </td>
                               </tr>
                               <tr>
                                  <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{asset('edecx/admin/images/user/04.jpg')}}" alt="profile"></td>
                                  <td>Hans Olo</td>
                                  <td>+91 2586 253 125</td>
                                  <td>hansolo@gmail.com</td>
                                  <td>India</td>
                                  <td><span class="badge iq-bg-danger">Inactive</span></td>
                                  <td>Vehement Capital</td>
                                  <td>2019/12/01</td>
                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                     </div>
                                  </td>
                               </tr>
                               <tr>
                                  <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{asset('edecx/admin/images/user/05.jpg')}}" alt="profile"></td>
                                  <td>Lynn Guini</td>
                                  <td>+27 2563 456 589</td>
                                  <td>lynnguini@gmail.com</td>
                                  <td>Africa</td>
                                  <td><span class="badge iq-bg-primary">Active</span></td>
                                  <td>Massive Dynamic</td>
                                  <td>2019/12/01</td>
                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                     </div>
                                  </td>
                               </tr>
                               <tr>
                                  <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{asset('edecx/admin/images/user/06.jpg')}}" alt="profile"></td>
                                  <td>Eric Shun</td>
                                  <td>+55 25685 256 589</td>
                                  <td>ericshun@gmail.com</td>
                                  <td>Brazil</td>
                                  <td><span class="badge iq-bg-warning">Pending</span></td>
                                  <td>Globex Corporation</td>
                                  <td>2019/12/01</td>
                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                     </div>
                                  </td>
                               </tr>
                               <tr>
                                  <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{asset('edecx/admin/images/user/07.jpg')}}" alt="profile"></td>
                                  <td>aaronottix</td>
                                  <td>(760) 765 2658</td>
                                  <td>budwiser@ymail.com</td>
                                  <td>USA</td>
                                  <td><span class="badge iq-bg-info">Hold</span></td>
                                  <td>Acme Corporation</td>
                                  <td>2019/12/01</td>
                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                     </div>
                                  </td>
                               </tr>
                               <tr>
                                  <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{asset('edecx/admin/images/user/08.jpg')}}" alt="profile"></td>
                                  <td>Marge Arita</td>
                                  <td>+27 5625 456 589</td>
                                  <td>margearita@gmail.com</td>
                                  <td>Africa</td>
                                  <td><span class="badge iq-bg-success">Complite</span></td>
                                  <td>Vehement Capital</td>
                                  <td>2019/12/01</td>
                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                     </div>
                                  </td>
                               </tr>
                               <tr>
                                  <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{asset('edecx/admin/images/user/09.jpg')}}" alt="profile"></td>
                                  <td>Bill Dabear</td>
                                  <td>+55 2563 456 589</td>
                                  <td>billdabear@gmail.com</td>
                                  <td>Brazil</td>
                                  <td><span class="badge iq-bg-primary">active</span></td>
                                  <td>Massive Dynamic</td>
                                  <td>2019/12/01</td>
                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                     </div>
                                  </td>
                               </tr> --}}
                           </tbody>
                         </table>
                      </div>
                         <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                               <span>Showing 1 to 5 of 5 entries</span>
                            </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                     <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                     </li>
                                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                     </li>
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
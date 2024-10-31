<!DOCTYPE html>
@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-body">
                   <form  method="post" action="/edecx-admin/tutor/tutor-list">
                    {{ csrf_field() }}
                      <div class="row">
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputText1">First Name </label>
                               <input type="text" class="form-control" id="exampleInputText1" value="Mark Jhon" placeholder="Enter Name">
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                           <div class="form-group">
                               <label for="exampleInputEmail3">Last Name</label>
                               <input type="text" class="form-control" id="exampleInputEmail3" value="markjhon@gmail.com" placeholder="Enter Email">
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputurl">Email Address</label>
                               <input type="email" class="form-control" id="exampleInputurl" value="https://getbootstrap.com" placeholder="Enter Email Address">
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputphone">Teliphone Input</label>
                               <input type="tel" class="form-control" id="exampleInputphone" value="1-(555)-555-5555">
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                             <div class="form-group">
                               <label for="exampleInputPassword3">Password Input</label>
                               <input type="password" class="form-control" id="exampleInputPassword3" value="markjhon123" placeholder="Enter Password">
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputdate">Date Input</label>
                               <input type="date" class="form-control" id="exampleInputdate" value="2019-12-18">
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputmonth">Month Input</label>
                               <input type="month" class="form-control" id="exampleInputmonth" value="2019-12">
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputtime">Time Input</label>
                               <input type="time" class="form-control" id="exampleInputtime" value="13:45">
                            </div>
                         </div>
                         <div class="col-12">
                            <div class="form-group">
                               <label for="exampleFormControlTextarea1">Example textarea</label>
                               <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                         </div>
                         <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn iq-bg-danger">cancel</button>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>

@endsection

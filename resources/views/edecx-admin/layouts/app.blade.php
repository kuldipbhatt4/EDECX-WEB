<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Edecx</title>
      @include('edecx-admin.partials.style')
   </head>
   <body>
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->

         <div class="iq-sidebar">
            @include('edecx-admin.partials.navigation')
         </div>
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         @yield('edecx')
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      <footer class="bg-white iq-footer">
        @include('edecx-admin.partials.footer')
      </footer>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">edecx</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
              <p class="text-center">Are you sure You Want To Delete?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Delete</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      @include('edecx-admin.partials.script')
      @yield('page-js-script')
   </body>
</html>

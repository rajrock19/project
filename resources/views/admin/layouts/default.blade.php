<!doctype html>
<html lang="en">
    <head>
        @include('admin.layouts.includes.head')
    </head>
    <body>
        <!-- Begin page -->
        <div class="main-wrapper">
            @include('admin.layouts.includes.header')
            <!-- ========== Left Sidebar Start ========== -->
            <div class="sidebar" id="sidebar" style="top: 50px;">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                    <!--- Sidemenu -->
                    @include('admin.layouts.includes.sidebar-menu')
                    <!-- Sidebar -->
                  </div>
                </div>
              </div>
            <div class="page-wrapper">
                  @yield('content')
            </div>

        </div>
        <!-- JAVASCRIPT -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/toastr/js/toastr.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
                @if(session()->has('error'))
                     toastr.error("", "{{ session()->get('error')}}", {
                                    positionClass: "toast-top-right",timeOut: 5000,
                                    closeButton: !0,debug: !1,newestOnTop: !0,
                                    progressBar: !0,preventDuplicates: !0,onclick: null,
                                    showDuration: "300",hideDuration: "1000",
                                    extendedTimeOut: "1000",showEasing: "swing",
                                    hideEasing: "linear",showMethod: "fadeIn",
                                    hideMethod: "fadeOut",tapToDismiss: !1
                                })
                    @endif
                    @if(session()->has('success'))
                       toastr.success("", "{{ session()->get('success')}}", {
                                    timeOut: 5000,closeButton: !0,
                                    debug: !1,newestOnTop: !0,
                                    progressBar: !0,positionClass: "toast-top-right",
                                    preventDuplicates: !0,onclick: null,
                                    showDuration: "300",hideDuration: "1000",
                                    extendedTimeOut: "1000",showEasing: "swing",
                                    hideEasing: "linear",showMethod: "fadeIn",
                                    hideMethod: "fadeOut",tapToDismiss: !1
                                })
                    @endif
        </script>
        @stack('scripts')
    </body>
</html>

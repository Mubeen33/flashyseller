<div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    
<script src="{{ asset('app-assets/js/scripts/pages/account-setting.js')}}"></script>  
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <!-- END: Page JS-->

    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
     <style>
       .ui-helper-hidden-accessible {
          display:none !important;
         }
    </style>
    <script>
         $(function() {
            var projects = [
               {
                  value: "Phone Cs in phone Cases",
                  desc: "Home & living ▸ Home Decor ▸ wall decor",
               },
               {
                  value: "Iphone Mobile",
                  desc: "Electornics ▸ Mobile phone ▸ Iphone",
               },
               {
                  value: "wall decorators",
                  desc: "Home & living ▸ Home Decor ▸ wall decor",
               },
               {
                  value: "1 flat",
                  desc: "Property ▸ Home ▸ flat",
               },
               {
                  value: "Phone Cs in phone Cases",
                  desc: "Home & living ▸ Home Decor ▸ wall decor",
               },
               {
                  value: "Phone Cs in phone Cases",
                  desc: "Home & living ▸ Home Decor ▸ wall decor",
               },
            ];
            $( "#project" ).autocomplete({
               minLength: 0,
               source: projects,
               focus: function( event, ui ) {
                  $( "#project" ).val( ui.item.label );
                     return false;
               },
               select: function( event, ui ) {
                  $( "#project" ).val( ui.item.label );
                  $( "#project-id" ).val( ui.item.value );
                  $( "#project-description" ).html( ui.item.desc );
                  return false;
               }
            })
        
            .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
               return $( "<li class='list-group-item list-group-item-action'>" )
               .append( "<a style='text-decoration:none;'>" + item.label + "<br>" + item.desc + "</a>" )
               .appendTo( ul );
            };
            $("#ui-id-1").addClass("list-group");
            (".ui-helper-hidden-accessible").remove();
         });
    </script>
    @stack('scritps')

</body>
<!-- END: Body-->

</html>
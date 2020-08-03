@include('layouts.header')
@include('layouts.sidebar')
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">@yield('page-title')</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                @yield('breadcrumbs')
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                @yield('content')
                <!-- END: Card DATA-->                 
            </div>
        </main>
@include('layouts.footer')        
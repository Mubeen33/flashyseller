@include('layouts.header')
@include('layouts.sidebar')
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">@yield('page-title')</h2>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        @yield('breadcrumbs')
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @yield('content')
            </div>
        </div>
@include('layouts.footer')        
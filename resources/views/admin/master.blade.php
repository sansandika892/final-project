<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Blank | Dasher - Responsive Bootstrap 5 Admin Dashboard</title>


    @include('admin.componets.icon')





    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="../assets/images/favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <!-- Color modes -->

    @include('admin.componets.js-head')


    @include('admin.componets.css')





</head>

<body>
    @include('admin.partial.side-navbar')

    <!-- Main Content -->
    <div id="content" class="position-relative h-100">

        @include('admin.partial.tops-navbar')
       


                <div class="custom-container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>


            @include('admin.componets.js')




            <div id="app">



    <!-- FOOTER -->
    <footer class="footer border-top py-3 bg-white">
        <div class="container-fluid text-center">
            <span class="text-muted">
                © All rights reserved by DIKA 
                <a href="https://www.codescandy.com" target="_blank">codescandy</a>. 
                Distributed by 
                <a href="https://themewagon.com" target="_blank">themewagon</a>
            </span>
        </div>
    </footer>

</div>


</body>

</html>

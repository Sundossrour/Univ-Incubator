<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>University College Table</title>
    <!-- Simple bar CSS -->

    @include('layouts.LocalAdmin.LinkHeader')

</head>

<body class="vertical  light  ">
    <div class="wrapper">

        @include('layouts.LocalAdmin.Header')


        @include('layouts.LocalAdmin.Sidebar')


        <main role="main" class="main-content">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">University College Table </h2>

                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">

                                {{-- message Section --}}

                                @if (session('success_message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('success_message') }}
                                    </div>
                                @endif

                                {{-- end  message Section --}}

                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <div class="table-responsive">

                                            <table class="table datatables" id="dataTable-1">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>#</th>
                                                        <th>College Name</th>
                                                        <th>College Image</th>
                                                        <th>University Name</th>
                                                        <th>Created By</th>
                                                        <th>Created Date</th>
                                                        <th>Last Updated Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($universityColleges as $universityCollege)
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input">
                                                                    <label class="custom-control-label"></label>
                                                                </div>
                                                            </td>
                                                            <td>{{ $universityCollege->id }}</td>
                                                            <td>{{ $universityCollege->collegeName }}</td>
                                                            <td>
                                                                <img src="{{ asset('Image/' . $universityCollege->collegeImage) }}"
                                                                    style="width: 100px; height: 100px;">
                                                            </td>
                                                            <td>{{ $universityCollege->university->name }}</td>
                                                            <td>{{ $universityCollege->LAdmin->name }}</td>
                                                            <td>{{ $universityCollege->created_at }}</td>
                                                            <td>{{ $universityCollege->updated_at }}</td>
                                                            <td><button
                                                                class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('ladmin.college.edit', $universityCollege->id) }}">Edit</a>
                                                                <form
                                                                    action="{{ route('ladmin.college.soft.delete', $universityCollege->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="dropdown-item"
                                                                        type="submit">Delete</button>
                                                                </form>
                                                          
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->



        </main> <!-- main -->
    </div> <!-- .wrapper -->

    <script src="{{ asset('DashboardAssets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/js/popper.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/js/moment.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/js/simplebar.min.js') }}"></script>
    <script src='{{ asset('DashboardAssets/js/daterangepicker.js') }}'></script>
    <script src='{{ asset('DashboardAssets/js/jquery.stickOnScroll.js') }}'></script>
    <script src="{{ asset('DashboardAssets/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/js/config.js') }}"></script>
    <script src='{{ asset('DashboardAssets/js/jquery.dataTables.min.js') }}'></script>
    <script src='{{ asset('DashboardAssets/js/dataTables.bootstrap4.min.js') }}'></script>
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
    </script>
    <script src="DashboardAssets/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
    {{-- @include('layouts.GlobalAdmin.LinkJS') --}}

</body>

</html>

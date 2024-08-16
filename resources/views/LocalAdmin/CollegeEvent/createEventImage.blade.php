<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Add Event Image</title>
    <!-- Simple bar CSS -->

    @include('layouts.LocalAdmin.LinkHeader')

</head>

<body class="vertical  light  ">
    <div class="wrapper">

        @include('layouts.LocalAdmin.Header')


        @include('layouts.LocalAdmin.Sidebar')


        <main role="main" class="main-content">

            <div class="card-deck">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Add Event Image </strong>
                    </div>

                                {{-- message Section --}}

                                @if (session('success_message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('success_message') }}
                                </div>
                            @endif
            
                            @if (session('error_message'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('error_message') }}
                            </div>
                        @endif
            
                            {{-- end  message Section --}}

                    <div class="card-body">
                        <form action="{{ route('ladmin.college.event.university.college.events.image.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="simpleInput">Event Image</label>
                                    <input type="file" class="form-control" id="simpleInput" name="img" required>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Details</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder=""
                                        name="details" required>
                                </div>

                                <input type="hidden" name="collegeEventID" value="{{$collegeEventID}}" >

                                
                            </div>

                           
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div> <!-- / .card-desk-->

        </main> <!-- main -->
    </div> <!-- .wrapper -->

    @include('layouts.LocalAdmin.LinkJS')


</body>

</html>

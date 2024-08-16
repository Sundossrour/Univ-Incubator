<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Create Event</title>
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
                        <strong class="card-title">Add Event</strong>
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
                        <form action="{{ route('ladmin.college.event.university.college.events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Name"
                                        name="name" required>
                                </div>


                                <div class="form-group col-md-4">
                                    <label>Event Date</label>
                                    <input type="date" class="form-control" name="dateEvent" id="dateEvent" required="">
                                    <p id="dayName"></p>
                                </div>

                          
                               
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label>Event Time</label>
                                    <input type="time" class="form-control" id="inputEmail4" placeholder=""
                                        name="eventTime" required>
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="inputEmail4">Details</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder=". . . . ."
                                        name="details" required>
                                </div>
                                

                            </div>
    
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option selected>Choose...</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Done</option>
                                        <option value="2">Canceled</option>
                                    </select>
                                </div>

                        
                                <div class="col-3">
                                    <input type="hidden" name="dayName" id="hiddenDayName">
                                </div>

                                <input type="hidden" class="form-control"
                                        name="universityCollegeID" value="{{$universityCollegeID}}" required>

                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
                    
                                <script>
                                    $(document).ready(function () {
                                        // Triggered when the date input changes
                                        $('#dateEvent').on('change', function () {
                                            // Get the selected date
                                            var selectedDate = $(this).val();
                    
                                            // Use Moment.js to format the date and get the day name
                                            var dayName = moment(selectedDate).format('dddd');
                    
                                            // Display the day name
                                            $('#dayName').text('Selected day: ' + dayName);
                    
                                            // Set the day name in the hidden input field
                                            $('#hiddenDayName').val(dayName);
                                        });
                                    });
                                </script>

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

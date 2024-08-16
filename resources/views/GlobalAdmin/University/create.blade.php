<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Create University</title>
    <!-- Simple bar CSS -->

    @include('layouts.GlobalAdmin.LinkHeader')

</head>

<body class="vertical  light  ">
    <div class="wrapper">

        @include('layouts.GlobalAdmin.Header')


        @include('layouts.GlobalAdmin.Sidebar')


        <main role="main" class="main-content">

            <div class="card-deck">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Add University</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gadmin.university.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Name"
                                        name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Phone</label>
                                    <input type="tel" class="form-control" id="inputPassword4" placeholder="Phone"
                                        name="phone" required>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="simpleInput">University Image</label>
                                    <input type="file" class="form-control" id="simpleInput" name="img" required>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option selected>Choose...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Type</label>
                                    <select id="inputState" class="form-control" name="type">
                                        <option selected>Choose...</option>
                                        <option value="0">
                                            <span>Public</span>
                                        </option>
                                        <option value="1">
                                            <span>Private</span>
                                        </option>
                                        <option value="2">
                                            <span>Virtual</span>
                                        </option>


                                    </select>
                                </div>
                             
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div> <!-- / .card-desk-->

        </main> <!-- main -->
    </div> <!-- .wrapper -->

    @include('layouts.GlobalAdmin.LinkJS')

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBddryhfLC4gYIvreVc9YDY4gLv2BrhhmY&callback=initMap"></script>
</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Create University Ads</title>
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
                        <strong class="card-title">Add University Ads</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ladmin.university.ads.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Name"
                                        name="name" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Title</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="title" required>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="simpleInput">Ads Image</label>
                                    <input type="file" class="form-control" id="simpleInput" name="img" required>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Body</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder=""
                                        name="body" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Details</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="details" required>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-5">
                                    <label for="inputState">University</label>
                                    <select id="inputState" class="form-control" name="universityID">
                                        <option selected>Choose...</option>
                                        @foreach ($universities as $university)
                                            <option value="{{ $university->id }}">
                                                {{ $university->name }}</option>
                                        @endforeach

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

    @include('layouts.LocalAdmin.LinkJS')


</body>

</html>

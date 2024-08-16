<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Update University</title>
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
                        <strong class="card-title">Update University</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gadmin.university.update', $university->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Name"
                                        name="name" value="{{ $university->name }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Phone</label>
                                    <input type="tel" class="form-control" id="inputPassword4" placeholder="Phone"
                                        name="phone" value="{{ $university->phone }}" required>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="simpleInput">University Image</label>
                                    <input type="file" class="form-control" id="simpleInput" name="img">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option>Choose...</option>
                                        <option value="1" {{ $university->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $university->status == 0 ? 'selected' : '' }}>Not
                                            Active</option>
                                    </select>

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Type</label>
                                    <select id="inputState" class="form-control" name="type">
                                        <option selected>Choose...</option>
                                        <option value="0" {{ $university->type == 0 ? 'selected' : '' }}>
                                            <span>Public</span>
                                        </option>
                                        <option value="1" {{ $university->type == 1 ? 'selected' : '' }}>
                                            <span>Private</span>
                                        </option>
                                        <option value="2" {{ $university->type == 2 ? 'selected' : '' }}>
                                            <span>Virtual</span>
                                        </option>


                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck"> Check me out </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>

            </div> <!-- / .card-desk-->

        </main> <!-- main -->
    </div> <!-- .wrapper -->

    @include('layouts.GlobalAdmin.LinkJS')

</body>

</html>

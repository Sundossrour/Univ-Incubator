<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Update Teaching Staff</title>
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
                        <strong class="card-title">Update Teaching Staff</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ladmin.teachingStaff.update' , $teachingStaff->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Name"
                                        name="name" value="{{$teachingStaff->name}}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="LAdmin@gmail.com"
                                        name="email" value="{{$teachingStaff->email}}" required>
                                </div>
                               
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="simpleInput">Teaching Staff Image</label>
                                    <input type="file" class="form-control" id="simpleInput" name="img" >
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Age</label>
                                    <input type="number" class="form-control" id="inputPassword4" placeholder=""
                                        name="age" value="{{$teachingStaff->age}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Designation</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Designation"
                                        name="designation" value="{{$teachingStaff->Designation}}" required>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option selected>Choose...</option>
                                        <option value="1" {{ $teachingStaff->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $teachingStaff->status == 0 ? 'selected' : '' }}>Not Active</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputState">Gender</label>
                                    <select id="inputState" class="form-control" name="gender">
                                        <option selected>Choose...</option>
                                        <option value="1" {{ $teachingStaff->gender == 1 ? 'selected' : '' }}>Male</option>
                                        <option value="0" {{ $teachingStaff->gender == 0 ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="inputState">University College</label>
                                    <select id="inputState" class="form-control" name="univercityCollegeID">
                                        <option selected>Choose...</option>
                                        @foreach ($universityColleges as $universityCollege)
                                        <option value="{{$universityCollege->id}}" {{ $teachingStaff->univercityCollegeID == $universityCollege->id ? 'selected' : '' }}>{{$universityCollege->university->name}} / {{$universityCollege->collegeName}}</option>
                                        @endforeach
                    
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

    @include('layouts.LocalAdmin.LinkJS')


</body>

</html>

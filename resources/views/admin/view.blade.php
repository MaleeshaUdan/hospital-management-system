<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('admin.libraries.style')
    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
    <title>Admin Dashbord</title>
</head>

<body>
    @include('admin.components.nav')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Patient Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Patient Id</label>
                                <input type="text" class="form-control" name="" value="{{ $patient->id }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $patient->name }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Age</label>
                                <input type="text" class="form-control" name="name" value="{{ $patient->age }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                 <textarea class="form-control" name="address" readonly>{{ $patient->address }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Ward</label>
                                <input type="text" class="form-control" name="name" value="{{ $patient->ward }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Bed</label>
                                <input type="text" class="form-control" value="{{ $patient->bed }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Admitted On</label>
                                <input type="text" class="form-control" value="{{ $patient->admitedon }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Status</label>
                                <input type="text" class="form-control" value="{{ $patient->status }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Record Created By</label>
                                <input type="text" class="form-control" value="{{ $patient->createdby }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-success">
                                        <i class="bi bi-arrow-left"></i> Back
                                    </button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    @include('admin.libraries.js')
</body>
</html>

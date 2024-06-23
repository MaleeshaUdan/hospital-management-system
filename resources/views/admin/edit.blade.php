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
                        <h4>Edit Patient Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update',$patient->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Patient Id</label>
                                <input type="text" class="form-control" name="id" value="{{ $patient->id }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control"  value="{{ $patient->name }}"
                                    aria-describedby="emailHelp" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Ward</label>
                                <input type="text" class="form-control" name="ward" value="{{ $patient->ward }}"
                                    aria-describedby="emailHelp"  required/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Bed</label>
                                <input type="number" class="form-control" min="0" name="bed" value="{{ $patient->bed }}"
                                    aria-describedby="emailHelp" required/>
                            </div>
                            <div class="mb-3">
                                <label for="statusSelect" class="form-label">Status</label>
                                <select class="form-control" name="status" id="statusSelect"
                                    aria-describedby="statusHelp" required>
                                    <option value="In Hospital">In Hospital</option>
                                    <option value="Discharged">Discharged</option>
                                    <option value="Dead">Dead</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                        <i class="bi bi-cloud-plus"></i> Submit
                                    </button>
                                <a href=""><button type="reset" class="btn btn-danger">
                                        <i class="bi bi-x-octagon-fill"></i> Reset
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

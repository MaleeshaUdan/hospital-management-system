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
    <title>Visit Records</title>
</head>

<body>
    @include('admin.components.nav')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{ route('admin.visit.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Patient Id</label>
                        <input type="text" class="form-control" name="patientid" value="{{ $patient->id }}"
                            aria-describedby="emailHelp" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" value="{{ $patient->name }}"
                            aria-describedby="emailHelp" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="visitTime" class="form-label">Visit</label>
                        <select class="form-control" name="visit" required>
                            <option value="Morning">Morning</option>
                            <option value="Day">Day</option>
                            <option value="Night">Night</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Visit Date</label>
                        <input type="date" class="form-control" name="visitdate" aria-describedby="emailHelp"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Number of Visitors</label>
                        <input type="number" class="form-control" name="numbervisitors" min="0" max="50"
                            aria-describedby="emailHelp" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Visitor's Name</label>
                        <input type="text" class="form-control" name="visitedby" aria-describedby="emailHelp"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Visitor's Contact Number</label>
                        <input type="number" class="form-control" name="contactnumber" min="0"
                            aria-describedby="emailHelp" required />
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>
                </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Record Id</th>
                            <th scope="col">Visit Date</th>
                            <th scope="col">Visit</th>
                            <th scope="col">Number of Visitors</th>
                            <th scope="col">Visitor Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $key => $record)
                            <tr>
                                <th>{{ $record->id }}</th>
                                <td>{{ $record->visitdate }}</td>
                                <td>{{ $record->visit }}</td>
                                <td>{{ $record->numbervisitors }}</td>
                                <td>{{ $record->visitedby }}</td>
                                <td>
                                    <a href=""><button type="button" class="btn btn-primary">
                                            <i class="bi bi-eye"></i></button></a>
                                    <a href=""><button type="button" class="btn btn-danger">
                                            <i class="bi bi-trash"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    @include('admin.libraries.js')
</body>

</html>

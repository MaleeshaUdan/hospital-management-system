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
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>All Patients' Record</h3>

                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <i class="bi bi-person-add"> New Patient</i>
                        </button>
                    </div>

                    <div class="card-body">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>Patient Id</th>
                                    <th>Patient Name</th>
                                    <th>Admitted On</th>
                                    <th>Patient Status</th>
                                    <th>Visit Records</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $key => $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->admitedon }}</td>
                                        <td>{{ $patient->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.visitindex',$patient->id) }}"><button type="button" class="btn btn-warning">
                                                    <i class="bi bi-arrow-right-circle-fill"></i></button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.show',$patient->id) }}"><button type="button" class="btn btn-primary">
                                                    <i class="bi bi-eye"></i></button></a>
                                            <a href="{{ route('admin.edit',$patient->id) }}"><button type="button" class="btn btn-success">
                                                    <i class="bi bi-pencil-square"></i></button></a>
                                            <a href="#" data-id="{{ $patient->id }}"
                                                onclick="confirmDeletion(this); return false;">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <form action="{{ route('admin.store') }}" method="post">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                        <i class="bi bi-person-badge"> Patient Details</i>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="name"
                                                id="exampleFormControlInput1" required />
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                                name="age" min="0" max="150" required />
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                                <textarea class="form-control" name="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Admit
                                                    Date</label>
                                                <input type="date" class="form-control" name="admitedon" required />
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Ward</label>
                                                <input type="text" class="form-control" name="ward" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Bed
                                                    No</label>
                                                <input type="number" class="form-control" name="bed" min="0"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    @include('admin.libraries.js')
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });

        function confirmDeletion(element) {
            const recordId = element.getAttribute("data-id");
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/admin/delete/patient/" + recordId;
                }
            });
        }
    </script>
</body>

</html>

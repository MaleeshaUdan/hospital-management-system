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
    <title>Admin Profile</title>
  </head>
  <body>
   @include('admin.components.nav')
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-header">
              <h4>My Profile</h4>
            </div>
            <div class="card-body">
              <form action="">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"
                    >Name</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    name="name"
                    value="{{ $name }}"
                    aria-describedby="emailHelp"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"
                    >Email Address</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    name="name"
                    value="{{ $email }}"
                    aria-describedby="emailHelp"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"
                    >Role</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    name="name"
                    value="{{ $role }}"
                    aria-describedby="emailHelp"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"
                    >Account Status</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    name="name"
                    value="{{ $status }}"
                    aria-describedby="emailHelp"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <a href="{{ route('admin.index') }}"
                    ><button type="button" class="btn btn-success">
                      <i class="bi bi-arrow-left"></i> Back
                    </button></a
                  >
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

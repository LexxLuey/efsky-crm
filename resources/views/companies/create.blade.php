@extends('layouts.app')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Add Company
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="name"> Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"/>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="logo">Company Logo</label>
                    <input type="file" class="form-control" name="logo" />
                </div>
                <div class="col">
                    <label for="sector"> Sector</label>
                    <input type="text" class="form-control" name="sector"/>
                </div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="website"> Website</label>
                    <input type="text" class="form-control" name="website"/>
                </div>
                <div class="col">
                    <label for="linkedin"> LinkedIn</label>
                    <input type="text" class="form-control" name="linkedin"/>
                </div>
          </div>
          <div class="form-group">
              <div class="row">
                  <div class="col">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone"/>
                  </div>
                  <div class="col">
                    <label for="facebook"> Facebook</label>
                    <input type="text" class="form-control" name="facebook"/>
                  </div>
              </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="number_of_employees"> Number Of Employees</label>
                    <input type="number" class="form-control" name="number_of_employees"/>
                </div>
                <div class="col">
                    <label for="rating"> Rating</label>
                    <input type="number" class="form-control" name="rating"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row mt-5">
                <div class="mx-auto">
                    <button type="submit" class="btn btn-success">Create Company</button>
                </div>
            </div>
        </div>


      </form>
  </div>
</div>
@endsection

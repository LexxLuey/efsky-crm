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
      <form method="post" action="{{ route('employees.store') }}" >
            @csrf
          <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname"/>
                </div>
                <div class="col">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname"/>
                </div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"/>
                </div>
                <div class="col">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone"/>
                  </div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="company_id"> Company</label>
                    <select class="form-control" name="company_id">
                        <option selected>Pick Company</option>
                        @forelse ($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @empty
                        <option selected>No Company Available</option>
                        @endforelse
                    </select>
                </div>

                <div class="col">
                    <label for="dob"> Date Of Birth</label>
                    <input type="text" class="form-control" name="dob"/>
                </div>
          </div>
          <div class="form-group">
            <div class="row mt-5">
                <div class="mx-auto">
                    <button type="submit" class="btn btn-success">Create Employee</button>
                </div>
            </div>
          </div>
      </form>
  </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <div class="row">
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('employees.create') }}"> Create Employee</a>
    </div>
  </div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>DOB</td>
          <td>Company</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>

        @forelse($employees as $key=>$employee)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$employee->fname}}</td>
            <td>{{$employee->lname}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>
            <td>{{$employee->dob}}</td>
            <td>{{$employee->company->name}}</td>
            <td class="text-center">
                <a href="{{ route('employees.show', $employee->id)}}" class="btn btn-success btn-sm">View</a>
                <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @empty
        No Employee yet
        @endforelse
    </tbody>
  </table>
<div>
    {{ $employees->links() }}
@endsection

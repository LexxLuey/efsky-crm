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
        <a class="btn btn-primary" href="{{ route('companies.create') }}"> Create Company</a>
    </div>
  </div>

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Logo</td>
          <td>Name</td>
          <td>Sector</td>
          <td>Website</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Facebook</td>
          <td>LinkedIn</td>
          <td>No of Employees</td>
          <td>Rating</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>

        @forelse($companies as $key=>$company)
        <tr>
            <td>{{$key+1}}</td>
            <td><img src="{{asset('/storage/images/logos/'.$company->logo)}}" alt="logo" class="img-thumbnail"></td>
            <td>{{$company->name}}</td>
            <td>{{$company->sector}}</td>
            <td><a href="{{$company->website}}">{{$company->website}}</a></td>
            <td>{{$company->email}}</td>
            <td>{{$company->phone}}</td>
            <td><a href="{{$company->facebook}}">{{$company->facebook}}</a></td>
            <td><a href="{{$company->linkedin}}">{{$company->linkedin}}</a></td>
            <td>{{$company->number_of_employees}}</td>
            <td>{{$company->rating}}</td>
            <td class="text-center">
                <a href="{{ route('companies.show', $company->id)}}" class="btn btn-success btn-sm">View</a>
                <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('companies.destroy', $company->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @empty
        No Company yet
        @endforelse
    </tbody>
  </table>
<div>

    {{ $companies->links() }}
@endsection

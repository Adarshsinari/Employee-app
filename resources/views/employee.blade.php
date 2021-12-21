@extends('app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <a href="{{ route('Employee.create') }} " type="button " class="btn btn-primary ">Add Employee</a>
            <!-- display-table-data -->
            <table class="table mt-4">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Contact</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $key => $employee)
                <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$employee->name}}</td>
                <td>{{$employee->department}}</td>
                <td>{{$employee->contact}}</td>
                <td><a href="{{url('/employee/'.$employee->id.'/edit')}} " style="text-decoration: none;"><i class="fas fa-edit"></a></td>
                <td><a href="{{url('/employee/'.$employee->id.'/delete')}} " style="text-decoration: none;"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
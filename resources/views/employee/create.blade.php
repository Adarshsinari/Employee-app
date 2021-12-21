@extends('app')

@section('content')
<div class="container mt-4">
    <div class="card">
   
        <div class="card-body mx-auto">
            <!-- validation msg -->
        @if ($errors->any())
            <div class="alert alert-danger mt-3 ">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (Session::has('success-message'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                {{Session::get('success-message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        <!-- form     -->
        <h5  class="form-label">Add Employee</h5>
        <form method="POST" action="{{route('Employee.store')}}">
        @csrf
            <div class= "col mt-2 ">
            <input type="text" class="form-control" placeholder="Name"  name="name" >
            </div>
            <div class="col mt-2 ">
            <input type="text" class="form-control" placeholder="Department"  name="department">
            </div>
            <div class="col mt-2 ">
            <input type="text" class="form-control" placeholder="Contact"  name="contact">
            </div>
            <div class="col-auto mt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
            
       
        </div>
    </div>
</div>



@endsection
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Add New Student</h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <form action="{{ route('student.store') }}" method="POST">
    @csrf 
        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="" placeholder="Enter Name">
        </div>

        <div class="mb-3">
            <label for="major_id">Major</label>
            <select class="form-control" name="major_id" id="">
                @foreach($majors as $major)
                <option value="{{ $major->id }}">{{ $major->name }}</option>   
                @endforeach
            </select>
       </div>
    

        <div class="left">
           <button type="submit">Submit</button>
            <a href="#">Cancle</a>
        </div>

    </form>
</div>
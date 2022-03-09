@extends('layouts.app')
@section('content')
<div>
    <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="file" name="file" class="form-control"> <br>  
        <button class="btn btn-success">Import Student Data</button>
        <a class="btn btn-warning" href="{{ route('student.export') }}">Export Student Data</a>
    </form><br>
</div>
@endsection

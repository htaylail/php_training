@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students Data</h2>
            </div>
        </div>
    </div>

    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('student.create') }}">New Student</a>
        <a class="btn btn-primary" href="{{ route('students.import') }}">Import & Export View</a>
    
        <form style="float:right" type="get" action="{{ route('student.search') }}">
            <input name="query" type="search" placeholder="Search ..">
            <button class="btn btn-dark" type="submit">Search</button>
        </form>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    

    <div style="margin-top: 10px;">
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Major</th>               
                <th>Operation</th>
            </tr>

            @foreach ($students as $student)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->grade }}</td>
                <td>{{ $student->major->name }}</td>
                <td>
                    <form method="POST" action=" {{ route('student.destroy', $student->id) }}">
                        <a onclick="return confirm('Are you sure to edit?')"; class="btn btn-primary" href="{{ route('student.edit',$student->id) }}"> Edit</a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input onclick="return confirm('Are you sure to delete?')"; type="submit" class="btn btn-danger delete-user" value="Delete">
                    </form>
                </td>

            </tr>
            @endforeach
        </table>
    </div>
@endsection
@extends('layouts.app')
@section('head')
    <title>Students</title>
@endsection

@section('styles')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #005bb5;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h2 {
            color: #005bb5;
            text-align: center;
        }

        .search {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search input {
            padding: 10px;
            width: 50%;
            margin-right: 10px;
        }

        .search button {
            padding: 10px;
            background-color: #005bb5;
            color: white;
            border-radius: 5px;
            border: none;
        }

        .search button:hover {
            background-color: #2e23a4ff;
        }

        .addStudentButton {
            background-color: #005bb5;
            color: white;
            padding: 10px 15px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 10px;
            color: white;
            border: none;
        }

        .addStudentButton:hover {
            background-color: #2e23a4ff;
            color: white;
        }

        .editButton {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .editButton:hover {
            background-color: #45a049;
        }

        .deleteButton {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .deleteButton:hover {
            background-color: #da190b;
        }
    </style>
@endsection

@section('content')
    <section>
        <h2>Students</h2>
        <form action="{{ URL('students') }}" method="GET">
            <div class="search">
                <input type="text" placeholder="Search" id="search" name="search" value="{{ request('search') }}">
                <button type="submit">Search</button>
                <a class="addStudentButton" href="{{ URL('students/add') }}">Add Student</a>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Score</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        {{-- <td>
                            @if($student->image)
                                <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image" width="50" height="50">
                            @endif
                        </td> --}}
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->score }}</td>
                        <td>
                            @if($student->image)
                                <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image" width="50" height="50">
                            @endif
                        </td>
                        <td>
                            <a href="{{ URL('students/edit', $student->id) }}" class="editButton">Edit</a>
                            {{-- video 45: delete button and form --}}
                            <form action="{{ URL('students/delete/'. $student->id) }}" method="POST" style="display: inline;"
                            onsubmit="return confirm('Are you sure you want to delete this student?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            {{-- <a href="#" class="deleteButton">Delete</a> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="paginationDiv">
            {{ $students
        ->appends(request()->query())
        ->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection

@section('scripts')
    <script></script>
@endsection
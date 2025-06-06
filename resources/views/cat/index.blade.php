@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div class="container mt-3">
    <h5>category</h5>

    <a href="/cat/add" class="btn btn-primary">Add Category</a>

    <table class="table table-sm table-bordered mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="/cat/edit/{{ $category->id }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <a href="/cat/delete/{{ $category->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

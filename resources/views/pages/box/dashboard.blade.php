@extends('layout.app')

@section('content')

<div class="content-section">
    <table>
        <caption>Box Table</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($boxes as $box)
                <tr>
                    <td>{{ $box->name }}</td>
                    <td>{{ $box->created_at }}</td>
                    <td>{{ $box->updated_at }}</td>
                    <td>
                        <div class="actions">
                            <div class="edit-btn">
                                <button data-id="{{ $box->id }}">Edit</button>
                            </div>
                            <div class="delete-btn">
                                <button data-id="{{ $box->id }}">Delete</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">No data found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
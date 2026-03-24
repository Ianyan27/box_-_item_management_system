@extends('layout.app')

@section('content')

<div class="content-section">
    <div style="display:flex; justify-content: space-between; margin-bottom: 15px;">
        <h2>Users</h2>
        <button onclick="openModal()" class="btn-add">+ Add User</button>
    </div>
    <table>
        <caption>User Table</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th class="th-actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <div class="actions">
                            <div class="edit-btn">
                                <button 
                                    onclick="openEditModal({{ $user->id }}, '{{ $user->name }}')">
                                    Edit
                                </button>
                            </div>
                            <div class="delete-btn">
                                <button onclick="openDeleteModal({{ $user->id }})">
                                    Delete
                                </button>
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
    <div id="addModal" class="modal">
        <div class="modal-content">
            <h3>Create New User</h3>

            <form method="POST" action="{{ route('user.store') }}">
                @csrf

                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>

                <div class="modal-actions">
                    <button type="button" onclick="closeModal()" class="btn-cancel">Cancel</button>
                    <button type="submit" class="btn-save">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editUserModal" class="modal">
        <div class="modal-content">
            <h3>Edit User</h3>

            <form method="POST" id="editForm">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="editUserName" required>
                </div>

                <div class="modal-actions">
                    <button type="button" onclick="closeEditModal()" class="btn-cancel">Cancel</button>
                    <button type="submit" class="btn-save">Update</button>
                </div>
            </form>
        </div>
    </div>


    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3>Delete User</h3>

            <p>Are you sure you want to delete this user?</p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-actions">
                    <button type="button" onclick="closeDeleteModal()" class="btn-cancel">
                        Cancel
                    </button>
                    <button type="submit" class="btn-save" style="background-color: #ef4444;">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/modal/user.js') }}"></script>

@endsection
@extends('layout.app')

@section('content')

<div class="content-section">
    <div style="display:flex; justify-content: space-between; margin-bottom: 15px;">
        <h2>Boxes</h2>
        <button onclick="openModal()" class="btn-add">+ Add Box</button>
    </div>
    <table>
        <caption>Box Table</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th class="th-actions">Actions</th>
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
                                <button 
                                    onclick="openEditModal({{ $box->id }}, '{{ $box->name }}')">
                                    Edit
                                </button>
                            </div>
                            <div class="delete-btn">
                                <button onclick="openDeleteModal({{ $box->id }})">
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
            <h3>Create New Box</h3>

            <form method="POST" action="{{ route('boxes.store') }}">
                @csrf

                <div class="form-group">
                    <label>Box Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="modal-actions">
                    <button type="button" onclick="closeModal()" class="btn-cancel">Cancel</button>
                    <button type="submit" class="btn-save">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editBoxModal" class="modal">
        <div class="modal-content">
            <h3>Edit Box</h3>

            <form method="POST" id="editForm">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Box Name</label>
                    <input type="text" name="name" id="editBoxName" required>
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
            <h3>Delete Box</h3>

            <p>Are you sure you want to delete this box?</p>

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

<script src="{{ asset('js/modal/deletebox.js') }}"></script>

@endsection
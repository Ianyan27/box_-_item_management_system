@extends('layout.app')

@section('content')

<div class="content-section">
    <div style="display:flex; justify-content: space-between; margin-bottom: 15px;">
        <h2>Items</h2>
        <button onclick="openModal()" class="btn-add">+ Add Item</button>
    </div>
    <table>
        <caption>Item Table</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Box</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th class="th-actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->box->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <div class="actions">
                            <div class="edit-btn">
                                <button data-id="{{ $item->id }}">Edit</button>
                            </div>
                            <div class="delete-btn">
                                <button data-id="{{ $item->id }}">Delete</button>
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
            <h3>Create New Item</h3>

            <form method="POST" action="{{ route('items.store') }}">
                @csrf

                <div class="form-group">
                    <label>List of Box</label>
                    <select name="box_id" required>
                        <option value="">Select Box</option>
                        @foreach ($boxes as $box)
                        <option value="{{ $box->id }}">{{ $box->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>List Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="modal-actions">
                    <button type="button" onclick="closeModal()" class="btn-cancel">Cancel</button>
                    <button type="submit" class="btn-save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
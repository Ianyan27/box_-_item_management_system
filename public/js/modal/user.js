function openEditModal(id, name) {
    const modal = document.getElementById('editUserModal');
    const input = document.getElementById('editUserName');
    const form = document.getElementById('editForm');

    // Set input value
    input.value = name;

    // Set dynamic form action
    form.action = `/users/${id}`;

    modal.style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editUserModal').style.display = 'none';
}

function openDeleteModal(boxId) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');

    // Set dynamic route
    form.action = `/users/${boxId}`;

    modal.style.display = 'flex';
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.style.display = 'none';
}

// Optional: close when clicking outside modal
window.onclick = function(event) {
    const modal = document.getElementById('deleteModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}


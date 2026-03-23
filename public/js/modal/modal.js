function openModal() {
    document.getElementById('addModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('addModal').style.display = 'none';
}

// Close when clicking outside
window.onclick = function(e) {
    const modal = document.getElementById('boxModal');
    if (e.target === modal) {
        modal.style.display = "none";
    }
}
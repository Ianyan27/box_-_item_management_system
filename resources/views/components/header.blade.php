<div style="min-height: 50px; background-color: #1f2937; color: white; padding: 10px; display: flex; align-items: center; justify-content: space-between;">
    <h1>Box & Item Management</h1>
    <div class="logout-container">
        <form method="POST" action="{{ route('logout') }}">
        @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div>
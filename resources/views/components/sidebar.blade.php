<style>
    .header-container{
        width: 220px; 
        height: 100vh; 
        background-color: #1f2937; 
        color: white; 
        padding: 20px; 
        border-top-right-radius: 10px;
    }

    .header-container h2{
        margin-bottom: 30px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin-bottom: 15px;
        min-height: 30px;
        align-content: center;
        background-color: rgb(219, 219, 219);
        padding: 0 0.5rem;
        border-radius: 6px;
    }

    a {
        color: #1f2937;
        text-decoration: none;
        display: block;
    }

    i{
        margin-right: 0.5rem;
    }
</style>

<div class="header-container">
    
    <h2>Menu</h2>

    <ul>
        
        <li>
            <a href="{{ route('box.dashboard') }}">
                <i class="fa-solid fa-box"></i>Box
            </a>
        </li>

        <li>
            <a href="{{ route('item.dashboard') }}">
                <i class="fa-solid fa-list"></i>Item
            </a>
        </li>

        <li>
            <a href="{{ route('user.dashboard') }}">
                <i class="fa-solid fa-list"></i>User
            </a>
        </li>

    </ul>

</div>
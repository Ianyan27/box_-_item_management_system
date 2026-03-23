<div style="width: 220px; height: 100vh; background-color: #1f2937; color: white; padding: 20px; border-top-right-radius: 10px;">
    
    <h2 style="margin-bottom: 30px;">Menu</h2>

    <ul style="list-style: none; padding: 0;">
        
        <li style="margin-bottom: 15px;">
            <a href="{{ route('box.dashboard') }}" 
                style="color: white; text-decoration: none;">
                <i class="fa-solid fa-box"></i>Box
            </a>
        </li>

        <li style="margin-bottom: 15px;">
            <a href="{{ route('item.dashboard') }}" 
                style="color: white; text-decoration: none;">
                <i class="fa-solid fa-list"></i>Item
            </a>
        </li>

    </ul>

</div>
<!-- font awesom link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- sweetAlert Link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="right_side">
    <a href="{{'/'}}">Task Management</a>

    <div class="list">
        <div class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        </div>

        <div class="menu-item {{ request()->is('category') ? 'active' : '' }}">
            <a href="{{ url('/category') }}">Category</a>
        </div>

        <div class="menu-item {{ request()->is('profile') ? 'active' : '' }}">
            <a href="{{ url('/profile') }}">Profile</a>
        </div>
       
    </div>
      <div class="bottom-image">
          <img src="https://media.istockphoto.com/id/1011182136/photo/check-off-completed-tasks-on-a-to-do-list.jpg?s=2048x2048&w=is&k=20&c=49i3xw2_dxZzTwks_WbELUixqrOm0jdjd-s-qhjIUi4="" alt="">
    </div>
</div>

   
<style>
    
    a{
        text-decoration:none;
        color:white;
        font-size:1.3rem;
    }
    html, body {
                margin: 0;
                padding: 0;
                height: 100%;
                overflow: hidden; /* stops unwanted scroll */
            }
    /* Sidebar Container */
.right_side {
    width: 20%;
    min-height: 100vh;
    background: #1728a3;
    color: white;
    padding: 20px 10px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}


/* Sidebar Title */
.right_side h2 {
    text-align: center;
    margin-bottom: 30px;
}

/* Menu Container */
.list {
    display: flex;
    flex-direction: column;
    gap: 15px;
    position:relative;
}

/* Menu Item */
.menu-item {
    padding: 15px;
    text-align: center;
    font-size: 1.2rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}

/* Link Styling */
.menu-item a {
    text-decoration: none;
    color: white;
    display: block;   /* Makes full box clickable */
}

/* Hover Effect */
.menu-item:hover {
    background: #0f1c75;
    cursor: pointer;
}

/* Active Page */
.active {
    background-color: #4e46e5;
    font-weight: bold;
}
.bottom-image {
    margin-top: auto;   /* THIS pushes it to bottom */
}

.bottom-image img {
    width: 100%;
    height: auto;
    display: block;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
       <title>Task Management System</title>
        <!-- @vite('resources/css/app.css') -->
</head>
<!-- icon link -->

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<!-- font awesom link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- sweetAlert Link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
     html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden; /* stops unwanted scroll */
}
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f3f4f6;
    }

    .material-symbols-outlined {
        font-size: 28px;
        color: white;
        vertical-align: middle;
        transition: 0.3s ease;
    }

    .material-symbols-outlined:hover {
        transform: scale(1.1);
        color: #e0e7ff;
    }

    .navbar {
        display: flex;
        align-items: center;
        padding: 12px 24px;
        background: linear-gradient(90deg, #1d4ed8, #2563eb);
        border-radius: 6px;
        color: white;
        font-size: 1.4rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .navbar span {
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .navbar a {
        color: white;
        font-size: 1rem;
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 4px;
        transition: 0.3s ease;
    }

    .navbar a:hover {
        background-color: rgba(255, 255, 255, 0.15);
    }

    .left {
        display: flex;
        gap: 18px;
        margin-left: auto;
        align-items: center;
    }

    .left a,
    .left button {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    button {
        background: none;
        border: none;
        cursor: pointer;
    }

    .container {
        padding: 0px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .navbar {
            flex-wrap: wrap;
            gap: 10px;
        }

        .left {
            gap: 12px;
        }

        .navbar span {
            font-size: 1.2rem;
        }
    }
</style>

<body>
    <nav class="navbar">
        <a href="{{'/'}}">Task Management</a>

        @if(Auth::check())
            <a href="{{'/category'}}">Categories</a>
        @else
            <a href="{{ '/' }}" title="logged in first">Categories</a>
        @endif

        <nav class="left">
            @if(Auth::check())
                <a href="{{'/profile'}}">
                    <span class="material-symbols-outlined" title="Profile">account_circle</span>
                </a>
            @else
                <a href="{{'/login'}}">
                    <span class="material-symbols-outlined" title="Logged In First">account_circle</span>
                </a>
            @endif

            @if(Auth::check())
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; padding:0; cursor:pointer;">
                        <span class="material-symbols-outlined" title="Click here for logout">
                            logout
                        </span>
                    </button>
                </form>

            @else
                <a href="{{'/'}}">
                    <span class="material-symbols-outlined" title="Click here for login">login </span>
                </a>
            @endif
        </nav>
    </nav>

     <div class="container">
        @yield('content')
    </div>
</body>
</html>
@extends('layouts.app')

@section('content')

<div class="body">

<div class="image-wrapper">
<h1 class="login-title">Login</h1>

<img src="https://i.pinimg.com/1200x/0c/9b/89/0c9b89b62ba04b4b4740f4ce2da28b54.jpg" alt="">
</div>

    <div class="login-wrapper">

        <form method="POST" action="/login" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Enter your email"
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Enter your password"
                >
            </div>

            <div>
                <button type="submit" class="login-btn">
                    Login
                </button>
            </div>

            <div class="register-text">
                Do Not Have an Account?
                <a href="{{ '/register' }}">Register Here</a>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
   

    .body{
        background:white;
        /* border:1px solid black; */
        display:flex;
        height: auto;
    }

    .image-wrapper{
        /* border:1px solid black; */
        width:50%;
    margin-top: 30px;

    }

    .image-wrapper img{
        width:100%;
        max-width:100%;
        height:auto;
        overflow:hidden;
    }

    .login-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    /* margin-top: 40px; */
}

.login-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 30px;
    /* border:1px solid black; */
    width:50%;
    height:775px;
        background:white;

}

.login-form {
    width: 100%;
    max-width: 60%;
    /* background: white; */
    box-shadow: 0 10px 25px rgba(253, 253, 253, 0.1);
    border-radius: 12px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: #374151; 
    margin-bottom: 6px;
}

.form-group input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    outline: none;
    font-size: 14px;
    transition: 0.2s;
}

.form-group input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
}

.login-btn {
    width: 100%;
    background: #2563eb;
    color: white;
    padding: 10px;
    border-radius: 8px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: 0.2s;
}

.login-btn:hover {
    background: #1d4ed8;
}

.register-text {
    font-size: 14px;
    text-align: center;
}

.register-text a {
    color: #2563eb;
    text-decoration: none;
    font-weight: 500;
}

.register-text a:hover {
    text-decoration: underline;
}

</style>
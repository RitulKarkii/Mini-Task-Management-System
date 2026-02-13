<div class="body">

    <div class="right-side">
        <div class="register">Register Here</div>
        <img src="https://i.pinimg.com/1200x/0c/9b/89/0c9b89b62ba04b4b4740f4ce2da28b54.jpg" alt="">
    </div>

    <div class="left_side">
        
    <div class="form-container">
    <form method="POST" action="/register" class="form">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role">
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Submit</button>
        </div>

        <div class="login-link">
            Already Have an Account?<a href="{{'/login'}}">Login Here</a>
        </div>
    </form>
</div>

    </div>
</div>


<style>

    html, body {
                margin: 0;
                padding: 0;
                height: 100%;
                overflow: hidden; /* stops unwanted scroll */
            }

    .body{
        display:flex;
        height:100vh;
    }

    .register{
        text-align:center;
        font-size:2rem;
    }

    .right-side{
        width:50%;
        overflow:hidden;
        object-fit:cover;
    }
    .right-side img{
        width:100%;
        max-width:100%;
        height:100vh;
    }

    .left_side{
        width:50%;
    }
/* Container & Layout */
.heading {
    font-size: 1.875rem; /* text-3xl */
    font-weight: 700;    /* font-bold */
    text-align: center;
    margin-top: 2.5rem; /* mt-10 */
}

.form-container {
    /* display: flex; */
    /* justify-content: center; */
    margin-top: 2rem; /* mt-8 */
}

.form {
    width: 100%;
    max-width: 28rem; /* max-w-md */
    background-color: white;
    border-radius: 1rem; /* rounded-xl */
    padding: 1.5rem; /* p-6 */
    display: flex;
    flex-direction: column;
    gap: 1rem; /* space-y-4 */
}

/* Form Fields */
.form-group label {
    display: block;
    font-size: 0.875rem; /* text-sm */
    font-weight: 500;    /* font-medium */
    color: #374151;      /* text-gray-700 */
    margin-bottom: 0.25rem; /* mb-1 */
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 0.5rem 0.75rem; /* px-3 py-2 */
    border: 1px solid #d1d5db; /* border-gray-300 */
    border-radius: 0.5rem; /* rounded-lg */
    outline: none;
    transition: all 0.2s;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #3b82f6; /* focus:border-blue-500 */
    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5); /* focus:ring-2 focus:ring-blue-500 */
}

/* Button */
button {
    width: 100%;
    background-color: #2563eb; /* bg-blue-600 */
    color: white;
    padding: 0.5rem 0; /* py-2 */
    border-radius: 0.5rem; /* rounded-lg */
    font-weight: 600; /* font-semibold */
    cursor: pointer;
    transition: background-color 0.2s;
}

button:hover {
    background-color: #1d4ed8; /* hover:bg-blue-700 */
}

/* Login link */
.login-link {
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.login-link a {
    color: #2563eb;
    margin-left: 0.25rem;
    text-decoration: none;
}

.login-link a:hover {
    text-decoration: underline;
}
</style>

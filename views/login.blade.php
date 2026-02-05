<div>
    <h1 class="text-3xl font-bold text-center mt-10">Home Page</h1>
<!-- tailwindcss -->
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex justify-center mt-8">
    <form method="POST" action="/login" class="w-full max-w-md bg-white shadow-lg rounded-xl p-6 space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input 
                type="email" 
                name="email" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your email"
            >
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input 
                type="password" 
                name="password" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your password"
            >
        </div>

        <div>
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200" >
             Login
            </button>
        </div>
        <div>Do Not Have an Account?<a href="{{'/register'}}">Register Here</a></div>
    </form>
</div>



</div>

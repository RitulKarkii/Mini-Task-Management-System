<div>

    <div>
        <button onclick="showModel()" class="btn-add">
            Add Category
        </button>
    </div>

    <!-- function -->
    <script>
        function showModel() {
            document.getElementById('categoryForm').style.display = 'flex';
        }

        function closeModel() {
            document.getElementById('categoryForm').style.display = 'none';
        }
    </script>
    

    <form action="{{ url('search') }}" method="GET" class="search-form">
        <input type="text" placeholder="Search With Name" name="search" class="search-input" value="{{ request('search')}}"/>
        <button class="search-btn">Search</button>
    </form>

    <h1 class="page-title">Category Page</h1>

    <!-- Modal Form -->
    <div id="categoryForm" style="display:none;">
        <form method="POST" action="/category" class="form-box">
            @csrf

            <div class="form-group">
                <label class="form-label">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-input"
                    placeholder="Enter your name"
                >
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <input 
                    type="text" 
                    name="description" 
                    class="form-input"
                    placeholder="Enter your description"
                >
            </div>

            <div class="form-group">
                <button type="submit" class="btn-primary">
                    Add
                </button>
            </div>

            <div>
                <button type="button" onclick="closeModel()" class="btn-close">
                    Close
                </button>
            </div>
        </form>
    </div>

</div>

<!-- CSS -->
<style>

    /* Add Category Button */
    .btn-add {
        width: 200px;
        background-color: #2563eb;
        color: white;
        padding: 10px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-add:hover {
        background-color: #1d4ed8;
    }

    /* Search Form */
    .search-form {
        margin-top: 10px;
    }

    .search-input {
        padding: 6px 10px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
    }

    .search-btn {
        padding: 6px 12px;
        background-color: #2563eb;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    /* Page Title */
    .page-title {
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        margin-top: 40px;
    }

    /* Modal Background */
    #categoryForm {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    /* Form Box */
    .form-box {
        width: 100%;
        max-width: 400px;
        background: white;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        border-radius: 12px;
        padding: 24px;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 16px;
    }

    /* Label */
    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: #374151;
        margin-bottom: 6px;
    }

    /* Input */
    .form-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        outline: none;
        transition: 0.2s;
    }

    .form-input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.3);
    }

    /* Buttons */
    .btn-primary {
        width: 100%;
        background-color: #2563eb;
        color: white;
        padding: 10px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    .btn-close {
        width: 200px;
        background-color: #2563eb;
        color: white;
        padding: 10px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-close:hover {
        background-color: #1d4ed8;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }

    th, td {
        padding: 10px;
        border: 1px solid #e5e7eb;
        text-align: center;
    }

    th {
        background-color: #2563eb;
        color: white;
    }

    /* Success Message */
    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 15px;
        text-align: center;
    }

</style>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a href="{{'editCategory/'.$category->id}}">Edit</a>
                <a href="{{'deleteCategory/'.$category->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$categories->links()}}

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

<style>
  .w-5.h-5{
    width:20px;
  }

</style>

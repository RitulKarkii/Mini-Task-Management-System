<!DOCTYPE html>
<html>
<head>
    <title>Category Page</title>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        /* Layout */
        .body {
            display: flex;
            min-height: 100vh;
            background: #f3f4f6;
        }

        /* Sidebar */
        .right_side {
            width: 20%;
        }

        /* Content */
        .main_content {
            width: 80%;
            padding: 20px;
        }

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
            margin: 20px 0;
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
            margin-bottom: 20px;
        }

        /* Modal Background */
        #categoryForm {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
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

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }

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
        .btn-primary, .btn-close {
            width: 100%;
            background-color: #2563eb;
            color: white;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 10px;
        }

        .btn-primary:hover, .btn-close:hover {
            background-color: #1d4ed8;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

        td i {
    font-size: 18px;
    color: #2563eb;
    margin: 0 5px;
}

td i:hover {
    color: #1d4ed8;
}

.pagination-wrapper{
    /* border:1px solid black; */
    display: flex;
}

 ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex; /* makes items horizontal */
  gap: 8px;      /* spacing between items */
}

 li {
  margin: 0;
}

.pagination {
    font-size: 14px;
    /* border:1px solid black; */
}
.pagination .page-link {
    padding: 5px 10px;
}

.pagination a {
    padding: 6px 12px;
    color:black;
}

    </style>

    <!-- JS Functions -->
    <script>
        function showModel() {
            document.getElementById('categoryForm').style.display = 'flex';
        }

        function closeModel() {
            document.getElementById('categoryForm').style.display = 'none';
        }
    </script>
</head>
<body>

<div class="body">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Main Content --}}
    <div class="main_content">

        {{-- Success Message --}}
        @if(session('success'))
            <script>
                Swal.fire({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <button onclick="showModel()" class="btn-add">Add Category</button>

            <form action="{{ url('search') }}" method="GET" class="search-form">
                <input type="text" placeholder="Search With Name" name="search" class="search-input" value="{{ request('search') }}"/>
                <button class="search-btn">Search</button>
            </form>
        </div>

       <div class="box">
            <h1 class="page-title">Category Page</h1>

              {{-- Pagination --}}
            <div class="pagination-wrapper" style="margin-top: 15px;">
                {{ $categories->links() }}
            </div>
       </div>

        {{-- Modal Form --}}
        <div id="categoryForm">
            <form method="POST" action="/category" class="form-box">
                @csrf

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-input" placeholder="Enter category name">
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-input" placeholder="Enter category description">
                </div>

                <button type="submit" class="btn-primary">Add</button>
                <button type="button" onclick="closeModel()" class="btn-close">Close</button>
            </form>
        </div>

        {{-- Category Table --}}
        <table>
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
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ url('editCategory/'.$category->id) }}">
                             <i class="fas fa-edit"></i>
                        </a> 
                        <a href="{{ url('deleteCategory/'.$category->id) }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

      

    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            padding: 20px;
        }

        h1 {
            margin: 10px 0;
        }

        .text-center {
            text-align: center;
        }

        /* Button Styles */
        .btn-primary {
            background-color: #2563eb;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-close {
            background: none;
            border: none;
            color: #dc2626;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-close:hover {
            text-decoration: underline;
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

        /* Form Container */
        .form-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .task-form {
            width: 100%;
            max-width: 400px;
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 12px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 4px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 8px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            outline: none;
            font-size: 14px;
        }

        input:focus, select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        .btn-submit {
            width: 100%;
            background-color: #2563eb;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-submit:hover {
            background-color: #1d4ed8;
        }

        /* Table Styles */
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

        .search{
            width:15%;
            height :auto;
        }
    </style>
</head>
<body>

<!-- Create Task Button -->
<button onclick="showForm()" type="button" class="btn-primary">
    Create New Task
</button>

<h1 class="text-center" style="font-size: 28px; font-weight: bold; margin-top: 20px;">
    Dashboard
</h1>
<h1>Welcome {{ auth()->user()->name }}</h1>

<div class=search>
    <form action="{{route('search')}}" method="GET">
        <input type="text" name="search" placeholder="search....." value="{{ request('search')}}">
        <button>Search</button>
    </form>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<script>
    // for Model
    function showForm() {
        document.getElementById('taskForm').style.display = 'block';
    }

     function hideForm() {
        document.getElementById('taskForm').style.display = 'none';
     }

</script>

<!-- Task Form -->
<div id="taskForm" style="display:none;">
    <div class="form-wrapper">
        <form method="POST" action="/tasks" class="task-form">
            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" placeholder="Enter your title">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="discription" placeholder="Enter your description">
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="">Select Status</option>
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label>Priority</label>
                <select name="priority">
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">
                    Submit
                </button>
            </div>

            <div class="text-center">
                <button type="button" onclick="hideForm()" class="btn-close">
                    Close
                </button>
            </div>

        </form>
    </div>
</div>


<!-- Task Table -->
<div>
    <table>
        <thead>
            <tr>
                <th>Done</th>
                <th>Task Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
              @can('view-task', $task)
            <tr>
                <td>
                    <form action="{{route('task-status',$task->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="is_completed" value="0">
                        <input type="checkbox" name="is_completed" value="1" onchange="this.form.submit()" 
                         {{ $task->is_completed ? 'checked' : '' }} >
                    </form>
                </td>
                <td>{{$task->title}}</td>
                <td>{{$task->category->name ?? 'No Category'}}</td>
                <td
                 style="
                    color: 
                    @if($task->status == 'Pending') red 
                    @elseif($task->status == 'In Progress') orange 
                    @elseif($task->status == 'Completed') green 
                    @else black 
                    @endif;
                    font-weight: bold; "
                >{{$task->status}}</td>
                <td
                style="
                color:
                @if($task->priority == 'Low') red
                @elseif($task->priority == 'Medium') orange
                @elseif($task->priority == 'High') green
                @else black
                @endif;
                font-weight: bold;"
                >{{$task->priority}}</td>
                <td>
                    <a href="{{'edit/'.$task->id}}">Edit</a>
                    <a href="{{'delete/'.$task->id}}">Delete</a>
                </td>
            </tr>
                @endcan 
            @endforeach
        </tbody>
    </table>
</div>

<!-- logout css -->
 <style>
 .logout-container {
    display: flex;
    justify-content: center;
    margin-top: 24px; /* mt-6 */
    position: fixed;   /* fix on screen */
    top: 50p%;         /* distance from top */
    left: 20px;        /* distance from left */
    z-index: 1000;
}

.logout-form {
    width: 100%;
    max-width: 400px; /* similar to max-w-md */
}

.logout-btn {
    width: auto;
    background-color: #dc2626; /* red-600 */
    color: white;
    padding: 8px 0; /* py-2 */
    border-radius: 8px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: background-color 0.2s ease;
    padding:12px;   
}

.logout-btn:hover {
    background-color: #b91c1c; /* red-700 */
}
</style>

    <!-- ✅ Logout Form -->
   <div class="logout-container">
    <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>
</div>

    
</body>
</html>

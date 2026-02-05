<style>
/* Form Background Overlay (optional popup effect) */
#editForm {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

/* Form Box */
.form-wrapper {
    background: #ffffff;
    width: 450px;
    max-width: 95%;
    padding: 25px 30px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.3s ease-in-out;
}

/* Form Title (optional) */
.form-wrapper h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
    color: #333;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

/* Labels */
.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 6px;
    color: #444;
}

/* Input & Select */
.form-group input,
.form-group select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    transition: 0.2s ease;
}

/* Focus Effect */
.form-group input:focus,
.form-group select:focus {
    border-color: #4f46e5;
    outline: none;
    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
}

/* Submit Button */
.btn-submit {
    width: 100%;
    padding: 10px;
    background: #4f46e5;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s ease;
}

.btn-submit:hover {
    background: #4338ca;
}

/* Close Button */
.btn-close {
    margin-top: 10px;
    background: transparent;
    border: none;
    color: #ef4444;
    font-size: 14px;
    cursor: pointer;
    font-weight: 600;
}

.btn-close:hover {
    text-decoration: underline;
}

/* Center Close Button */
.text-center {
    text-align: center;
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
</style>

<script>
     function hideEditForm() {
        document.getElementById('editForm').style.display = 'none';
        window.location.href = "/dashboard";
    }
</script>

<div>
  <!-- Task Edit Form -->
<div id="editForm" style="display:block;">
    <div class="form-wrapper">
        <form method="POST" action="{{ url('/edit-task/'.$data->id) }}"class="task-form">
            @csrf
            @method('PUT')

            <input type="hidden" name="_method" value="put" />
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" placeholder="Enter your title" value="{{ $data->title }}">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="discription" placeholder="Enter your description" value="{{ $data->discription }}">
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                         <option value="{{ $category->id }}"
                            {{ $data->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="">Select Status</option>
                    <option value="Pending" {{ $data->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ $data->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ $data->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label>Priority</label>
                <select name="priority">
                      <option value="Low" {{ $data->priority == 'Low' ? 'selected' : '' }}>Low</option>
                      <option value="Medium" {{ $data->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                      <option value="High" {{ $data->priority == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">
                    Update
                </button>
            </div>

            <div class="text-center">
                <button type="button" onclick="hideEditForm()" class="btn-close">
                    Close
                </button>
            </div>

        </form>
    </div>
</div>
</div>

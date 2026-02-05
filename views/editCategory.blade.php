<div>
    <script>
        function closeModel() {
            document.getElementById('categoryForm').style.display = 'none';
            window.location.href = "/category";
        }
    </script>

    <style>

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

.form-box {
    width: 100%;
    max-width: 400px;
    background: white;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    padding: 24px;
}

        /* Form box */
        .form-box {
            width: 100%;
            max-width: 400px;
            background: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 24px;
        }

        /* Label */
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }

        /* Input fields */
        .form-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            transition: 0.2s;
        }

        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }

        /* Buttons */
        .btn-primary {
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

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-close {
            width: 208px;
            background: #2563eb;
            color: white;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-close:hover {
            background: #1d4ed8;
        }

        /* Spacing between fields */
        .form-group {
            margin-bottom: 16px;
        }
    </style>

    <div class="form-container" id="categoryForm">
        <form method="POST" action="{{ url('/edit-category/'.$data->id) }}" class="form-box">
            @csrf
            @method('PUT')

            <input type="hidden" name="_method" value="put" />

            <div class="form-group">
                <label class="form-label">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ $data->name }}"
                    class="form-input"
                    placeholder="Enter your name"
                >
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <input 
                    type="text" 
                    name="description" 
                    value="{{ $data->description }}"
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

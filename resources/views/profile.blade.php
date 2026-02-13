<!-- style -->
 <style>
    .body{
        display:flex;
        height:100vh
    }
    .right_side{
        width:20%;
        background:#1728a3;
        color:white;
        padding:6px
    }
    .left_side{
        width:80%;
    }
    .show_image{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
    }

    .show_image img{
        width:100%;
        height:100%;
        object-fit: cover;
        object-position: center top;
    }
    .font{
        font-size:2rem;
    }
    .text{
        font-size:2rem;
        display:flex;
        flex-direction: row;
        gap:87%;
        margin-bottom:18px;
    }
    .text button{
        border:none;
        background:blue;
        color:white;
        padding:8px;
        border-radius:6px;
        font-size:1.2rem;
    }

 </style>

<div class="body">
     @include('layouts.sidebar')
   <div class="left_side">

   <div class="text">
    Profile
    <div>
          <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">
                        <span class="material-symbols-outlined" title="Click here for logout">
                            logout
                        </span>
                    </button>
                </form>
    </div>
   </div>

     <div class="show_image">
          @if($user->profile_image)
            <img src="{{ asset('uploads/profile/' . $user->profile_image) }}" onclick="showImage()">
        @else
            <img src="{{ asset('default.png') }}" >
        @endif
        </div>

     <div class="font">{{auth()->user()->name}}</div>

    <div id="imageForm" style="display:none;">
        <form action="{{route('profile_upload')}}" method="POST"  enctype="multipart/form-data">
        @csrf

        <input type="file" name="profile_image">
        <button type="submit">Upload</button>
    </form>
    </div>
    
   </div>
</div>

<script>
    function showImage(){
        document.getElementById('imageForm').style.display="flex";
    }
</script>

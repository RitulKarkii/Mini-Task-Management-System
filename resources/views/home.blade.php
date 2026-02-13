<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background:#d3daeb;
        }
        .container{
            text-align:center;
            font-size:2.5rem;
        }
        .container button{
            border:none;
            padding:20px 38px;
            border-radius:8px;
            font-size:1.3rem;
            background:#1728a3;
            color:white;
        }
        p{
            font-size:1rem;
            line-height: 1.5; 
            text-align:center;
            margin-bottom: 30px;
        }
        h1{
            margin-bottom:0;
        }
        a{
            color:white;
            text-decoration:none;

        }

        .images{
            display:flex;
            /* justify-content:space-evenly; */
            /* border:1px solid black; */
            margin-top:20px;
            height:330px;
            padding:8px;
            margin-left:58px;
        }
        .image1{
            /* border:1px solid black; */
            width:30%;
            margin-top:80px;
            overflow:hidden;
        }
       .image1 img{
        max-width:100%;
        width:100%;
        height:290px;
        overflow:hidden;
       }
       .image2{
            /* border:1px solid black; */
            width:30%;
            height:300px;
            /* margin-top:80px; */
            overflow:hidden;
        }
       .image2 img{
        max-width:100%;
        width:100%;
        height:290px;
        overflow:hidden;
       }
       .image3{
            /* border:1px solid black; */
            width:30%;
            margin-top:80px;
            overflow:hidden;
        }
       .image3 img{
        max-width:100%;
        width:100%;
        height:290px;
        overflow:hidden;
       }
    </style>
</head>
<body>
    @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Your Task</h1>
        <p>Our Task Management System helps you efficiently create, organize, assign, track, and manage your tasks in one place, so you can stay focused, improve productivity, meet deadlines on time, and collaborate smoothly with your team or personal workflow.</p>
    </div>
    <button><a href="{{'/login'}}">GET STARTED</a></button>

   <div class="images">
         <div class="image1">
             <img src="https://media.istockphoto.com/id/1329003941/photo/agenda-organize-with-color-coding-sticky-for-time-management.jpg?s=2048x2048&w=is&k=20&c=UE7uBcj6zZGCeDqF4RR1p_Z_keJnRuAGY6EJlps8by0=" alt="">
        </div>
        <div class="image2">
             <img src="https://media.istockphoto.com/id/1301200314/photo/woman-using-calendar-app-on-computer-in-office.jpg?s=2048x2048&w=is&k=20&c=Gzrn5Ba8PTTXgZc0tqXsXxFuqeyqsCkS9zRf3Z94cUs=" alt="">
        </div>
        <div class="image3">
             <img src="https://media.istockphoto.com/id/1945362043/photo/person-writing-on-notebook-with-sticky-notes-organized-workstation-for-productivity-boost.jpg?s=2048x2048&w=is&k=20&c=jEXZqwL_lwyBAYmXR--zQzzUT5alDBRHU5Ap1UmEi9E=" alt="">
        </div>
   </div>
    
@endsection
</body>
</html>

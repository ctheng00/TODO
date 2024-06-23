<!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style type="text/css">
    body{
      background: #F8F9FA;
    }
  </style>
    <link rel="canonical" href="https://https://demo.themesberg.com/landwind/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workerz Direct</title>

    <!-- Meta SEO -->
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="{{asset('site.manifest')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="{{asset('css/output.css')}}" rel="stylesheet">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>
<body>
    <header class="fixed w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                @session('error')
                    <div class="alert alert-danger" role="alert"> 
                        {{ $value }}
                    </div>
                @endsession
                @session('success')
                    <div class="alert alert-success" role="alert"> 
                        {{ $value }}
                    </div>
                @endsession
                <a href="#" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Workerz Direct TODO</span>
                </a>
                <div class="flex items-center lg:order-2">
                    <!-- <a href="#" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a> -->
                    
                    @if(!Auth::check())
                    <a href="{{route('login')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Sign In</a>
                    
                    <a href="{{route('register')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Sign Up</a>
                    @else
                    <a href="{{route('profile')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Profile</a>
                    <a href="{{route('logout')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Logout</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <div class="flex justify-between items-center">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">Todo List</h1>
                @if(Auth::check())
                    <a onclick="create()" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Add Task</a>
                @endif
                </div>
                @php
                    $status=array("KIV","IN-PROGRESS", "COMPLETED", "ABANDONED")
                @endphp
                <div style="border:1px solid; width:60vw; height:400px; border-radius:25px; overflow-y:scroll;">
                    @forelse ($todo as $item)
                    <div class="mx-auto mt-2" style="border:1px solid; width:58vw; border-radius:10px; background-color:#fffdc9 ">
                        <div class="flex justify-between items-center">
                            <h1 class="mb-2 ml-1 text-2xl font-bold leading-none tracking-tight">{{$item->title}}</h1>
                            <p class="mb-2 ml-1 mr-1"><b>{{$status[$item->status]}}</b>&nbsp;</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="mb-2 ml-1"><b>Description: </b>{{$item->description}}</p>
                            <a id="myBtn" onclick="edit({{$item->id}},{{$item->status}})" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Edit</a>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="mb-2 ml-1"><b>Created By: </b>{{$item->name}}</p>
                            <p class="mb-2 ml-1 mr-1"><b>{{$item->created_at}}</b>&nbsp;</p>
                        </div>
                    </div>
                    @empty
                    <div >
                        <h1 class="text-center">No todo item</h1>
                    </div>
                    @endforelse
                </div>
            </div>             
        </div>
    </section>
    <!-- End block -->
    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card-body p-3 p-md-4 p-xl-5">
            <form method="POST" action="{{ route('todo.create') }}">
            @csrf
            <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="title" id="title" placeholder="Task Title" required>
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                </div>
                </div>
                <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="description" id="description" value='' placeholder="task Description" >
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                </div>
                </div>
                <div class="col-6">
                    <div >
                        <label for="privacy">Privacy:</label>

                        <select name="privacy" id="privacy" >
                            <option value="0" >Public</option>
                            <option value="1" >Users</option>
                            <option value="2" >Self</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                <div class="d-grid my-3">
                    <button class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800" type="submit">Create New Task</button>
                </div>
                </div>
            </div>
            </form>
            </div>
        </div>

        </div>
    <div id="editModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card-body p-3 p-md-4 p-xl-5">
            <form method="POST" action="{{ route('todo.edit') }}">
            @csrf
            <input type="hidden" id="id_field" name="id">
            <div class="row gy-2 overflow-hidden">
                <div class="col-6 mb-3">
                    <div >
                        <label for="status">Status:</label>

                        <select name="status" id="status" >
                            <option value="0">KIV</option>
                            <option value="1" >IN-PROGRESS</option>
                            <option value="2" >COMPLETED</option>
                            <option value="3" >ABANDONED</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                <div class="d-grid my-3">
                    <button class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800" type="submit">Update</button>
                </div>
                </div>
            </div>
            </form>
            </div>
        </div>

    </div>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script>
// Get the modal
var modal = document.getElementById("editModal");
var modal2 = document.getElementById("createModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[1];
var span2 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
const edit = (id,status) =>{
    modal.style.display = "block";
    document.getElementById('id_field').value=id;
    document.getElementById('status').value=status;
}

const create = (id) =>{
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>
</body>
</html>
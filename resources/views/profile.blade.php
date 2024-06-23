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
                <a href="#" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Workerz Direct TODO</span>
                </a>
                <div class="flex items-center lg:order-2">
                    <!-- <a href="#" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a> -->
                    
                    @if(!Auth::check())
                    <a href="{{route('login')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Sign In</a>
                    
                    <a href="{{route('register')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Sign Up</a>
                    @else
                    <a href="{{route('dashboard')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Dashboard</a>
                    <a href="{{route('logout')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Logout</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16">
            <div class="container">
                    <div class="row justify-content-center">
                        <div class="card border col-xl-7 border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">My Profile Details</span>
                            </div>
                            <form method="POST" action="{{ route('profile.post') }}">
                            @csrf

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

                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name@example.com" value="{{$user->name}}" required>
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{$user->email}}" required>
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                </div>
                                </div>
                                <div class="col-6">
                                    <div >
                                        <label for="gender">Gender:</label>

                                        <select name="gender" id="gender" >
                                            <option value="" @if($user->gender == null) selected @endif>Select</option>
                                            <option value="male" @if($user->gender == "male") selected @endif>Male</option>
                                            <option value="female" @if($user->gender == "female") selected @endif>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div >
                                        <label for="available">Available:</label>
                                        <label class="switch">
                                            <input type="checkbox" id="available" name="available" @if($user->available == 1) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div >
                                    <input type="checkbox" class="form-control" onchange="changepw(this)">
                                    <label class="form-label">{{ __('Change Password') }}</label>
                                </div>
                                <div class="col-12">
                                <div class="form-floating mb-3" id='pw_div' style="display:none">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" >
                                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="form-floating mb-3" id='cfmpw_div' style="display:none">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="password_confirmation">
                                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
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
                </div>
                        
        </div>
    </section>
    <!-- End block -->
    
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>
<script>
function changepw(checkbox){
    console.log('test');
    if(checkbox.checked){
        const pw_field = document.getElementById('pw_div').style.display="block";
        const cfmpw_field = document.getElementById('cfmpw_div').style.display="block";
    }else{
        const pw_field = document.getElementById('pw_div').style.display="none";
        const cfmpw_field = document.getElementById('cfmpw_div').style.display="none";
    }
}
</script>
</html>
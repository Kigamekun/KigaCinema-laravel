@extends('layouts.base')

@section('main')
<style>
  @media (max-width: 767px) {
  .navicon {
    width: 1.125em;
    height: .125em;
  }

  .navicon::before,
  .navicon::after {
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    transition: all .2s ease-out;
    content: '';
    background: #3D4852;
  }

  .navicon::before {
    top: 5px;
  }

  .navicon::after {
    top: -5px;
  }

  .menu-btn:not(:checked) ~ .menu {
    display: none;
  }

  .menu-btn:checked ~ .menu {
    display: block;
  }

  .menu-btn:checked ~ .menu-icon .navicon {
    background: transparent;
  }

  .menu-btn:checked ~ .menu-icon .navicon::before {
    transform: rotate(-45deg);
  }

  .menu-btn:checked ~ .menu-icon .navicon::after {
    transform: rotate(45deg);
  }

  .menu-btn:checked ~ .menu-icon .navicon::before,
  .menu-btn:checked ~ .menu-icon .navicon::after {
    top: 0;
  }
}

</style>
<header class="text-white md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4 ">
  
  <!-- Logo text or image -->
  <div class="flex items-center justify-between mb-4 md:mb-0">
    <h1 class="leading-none text-2xl text-grey-darkest">
      <a class="no-underline text-grey-darkest hover:text-purple-700" href="#">
        <b>Kiga-Cinema</b>
      </a>
    </h1>

    <a class="text-black hover:text-orange md:hidden" href="#">
      <i class="fa fa-2x fa-bars"></i>
    </a>
  </div>
  <!-- END Logo text or image -->
  
  <!-- Search field -->
  <form class="mb-4 w-full md:mb-0 md:w-1/4">
    <label class="hidden" for="search-form">Search</label>
    <input style="color: black" class="bg-grey-lightest border-2 focus:border-orange p-2 rounded-lg shadow-inner w-full" placeholder="Search" type="text">
    <button class="hidden">Submit</button>
  </form>
  <!-- END Search field -->
  
  <!-- Global navigation -->
  <nav>
    <ul class="list-reset md:flex md:items-center">
      @if (Auth::guest())
      <li class="md:ml-4">
        <a class="block no-underline hover:bold py-2 text-grey-darkest hover:text-purple-700 md:border-none md:p-0" href="{{ route('login') }}">
          Login
        </a>
      </li>
      <li class="md:ml-4">
        <a class="border-t block no-underline hover:bold py-2 text-grey-darkest hover:text-purple-700 md:border-none md:p-0" href="{{ route('register') }}">
          Register
        </a>
      </li>
@else
    
    <li class="md:ml-4">
      <a class="block no-underline hover:bold py-2 text-grey-darkest hover:text-purple-700 md:border-none md:p-0" href="#">
        {{ Auth::user()->name }}
      </a>
    </li>
    <li class="md:ml-4">
      <a class="block no-underline hover:bold py-2 text-grey-darkest hover:text-purple-700 md:border-none md:p-0" href="{{ route('my_ticket') }}">
      My Tick
      </a>
    </li>
    <li class="md:ml-4">
      <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a onclick="event.preventDefault();
      this.closest('form').submit();" class="border-t block no-underline hover:bold py-2 text-grey-darkest hover:text-purple-700 md:border-none md:p-0" href="{{ route('logout') }}">
        Logout
      </a>
      
      </form>
    </li>
@endif
      
      
    </ul>
  </nav>
  <!-- END Global navigation -->

</header>
{{-- <div style="height:100vh;background: url('{{ url('/res/4296216.jpg') }}') no-repeat center center fixed ; -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
  <nav class="nav flex flex-wrap items-center justify-between px-4">
    <div class="flex flex-no-shrink items-center mr-6 py-3 text-grey-darkest">
     
      <span class="font-semibold text-xl tracking-tight">Kiga Cinema</span>
    </div>
  
    <input class="menu-btn hidden" type="checkbox" id="menu-btn">
    <label class="menu-icon block cursor-pointer md:hidden px-2 py-4 relative select-none" for="menu-btn">
      <span class="navicon bg-grey-darkest flex items-center relative"></span>
    </label>
  
    <ul class="menu border-b md:border-none flex justify-end list-reset m-0 w-full md:w-auto">
      <li class="border-t md:border-none">
        <a href="/" class="block md:inline-block px-4 py-3 no-underline text-grey-darkest hover:text-grey-darker font-bold">Home</a>
      </li>
      
      <li class="border-t md:border-none">
        <a href="/about/" class="block md:inline-block px-4 py-3 no-underline text-grey-darkest hover:text-grey-darker">About</a>
      </li>
      
      <li class="border-t md:border-none">
        <a href="/blog/" class="block md:inline-block px-4 py-3 no-underline text-grey-darkest hover:text-grey-darker">Blog</a>
      </li>
      
    </ul>
  </nav>

  <div style="height: 90vh;width:100%;display:flex;justify-content: center;align-items: center">
     <div style="flex: 2;">
      
      <h1 style="margin-left: 5px; font-size: 50px;font-weight: bold;color:white;text-shadow: 2px 2px 2px cyan;">order your favorite ticket <span style="color: black;text-shadow: 2px 2px 2px green">here!</span>

    </h1>
    <div class="p-2 md:w-40 ">
        <div class="flex items-center p-4 bg-green-200 rounded-lg shadow-xs cursor-pointer hover:bg-green-500 hover:text-gray-100">
            
            <svg class="h-6 fill-current hover:text-gray-100" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Vue.js icon</title><path d="M19.197 1.608l.003-.006h-4.425L12 6.4v.002l-2.772-4.8H4.803v.005H0l12 20.786L24 1.608"/></svg>
            <div>
              <p class=" text-xs font-medium ml-2 ">
                VUE
              </p>
              
            </div>
        </div>
    </div>
  </div>
     <div style="flex: 2;"></div>
  </div>


</div> --}}
<!-- This example requires Tailwind CSS v2.0+ -->

<center>
    <h1 style="color: white;font-size: 50px;font-weight: bold">
       
            Movie
       
    </h1>
</center>

    <div class="w-5/5 flex flex-wrap justify-center m-auto">
        
        @foreach ($film as $item)
        
        <div class="m-5">
            <div class="max-w-md w-full bg-gray-900 shadow-lg rounded-xl p-6">
              <div class="flex flex-col ">
                <div class="">
                  <div class="relative h-62 w-full mb-3">
                    <div class="absolute flex flex-col top-0 right-0 p-3">
                      <button data-movie="{{ $item->id }}" class="bookmark transition ease-in duration-300 bg-gray-800  hover:text-purple-500 shadow hover:shadow-md text-gray-500 rounded-full w-8 h-8 text-center p-1">
                      @if (App\Models\Bookmark::where(['user_id'=>Auth::id(),'movie_id'=>$item->id])->exists())
                      <i class="fas fa-heart"></i>
                      @else
                      <i class="far fa-heart"></i>
                      @endif
                      
                      </button>
                    </div>
                    <img src="{{ url('/thumb_mov'.'/'.$item->thumb) }}" alt="Just a flower" class=" w-full   object-fill  rounded-2xl">
                  </div>
                  <div class="flex-auto justify-evenly">
                    <div class="flex flex-wrap ">
                      <div class="w-full flex-none text-sm flex items-center text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-gray-400 whitespace-nowrap mr-3">4.60</span><span class="mr-2 text-gray-400">{{$item->country}}</span>
                      </div>
                      <div class="flex items-center w-full justify-between min-w-0 ">
                        <h2 class="text-lg mr-auto cursor-pointer text-gray-200 hover:text-purple-500 truncate ">{{ $item->title }}</h2>
                        <div class="flex items-center bg-green-400 text-white text-xs px-2 py-1 ml-3 rounded-lg">
                          INSTOCK</div>
                      </div>
                    </div>
                    <div class="text-xl text-white font-semibold mt-1">Rp. {{$item->price}}</div>
                    <div class="lg:flex  py-4  text-sm text-gray-600">
                      
                      <div class="flex-1 inline-flex items-center mb-3">
                        <span class="text-secondary whitespace-nowrap mr-3">Room</span>
                        <div class="cursor-pointer text-gray-400 ">
                          @foreach (explode(',',$item->on_air) as $room)
                          <span class="hover:text-purple-500 p-1 py-0">{{$room}}</span>
                          
                          @endforeach
        
                        </div>
                      </div>
                    </div>
                    <div class="flex space-x-2 text-sm font-medium justify-start">
                      <a href="{{ route('order',$item->id) }}" class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-purple-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-purple-600 ">
                        Order
                      </a>
                      <button class="transition ease-in duration-300 bg-gray-700 hover:bg-gray-800 border hover:border-gray-500 border-gray-700 hover:text-white  hover:shadow-lg text-gray-400 rounded-full w-9 h-9 text-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



        @endforeach



    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).on('click','.bookmark',function () {
    var data = $(this).find( "i" );
    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/add_bookmark",
                            method: 'POST',
                            data: {
                                
                                movie_id: $(this).attr('data-movie'),
                                 
                            },
                            success: function(result) {
                              // console.log(data.attr('class'));
                               if (result.act == "add") {
                                data.removeClass('far fa-heart').addClass('fas fa-heart');
                                 
                               }else {
                                data.removeClass('fas fa-heart').addClass('far fa-heart');
                                
                               }


Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your act has been saved',
  showConfirmButton: false,
  timer: 1000
})
                               

                            }
                        });
    // alert($(this).find( "i" ).attr('class'));
    // $(this).find( "i" ).removeClass('far fa-heart').addClass('fas fa-heart');
  });

</script>

@endsection
<x-front-guest-layout>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&display=swap" rel="stylesheet">

    <main class="bg-white font-montserrat" >
        <header class="h-24 sm:h-32 flex items-center">
            <div class="container mx-auto px-6 sm:px-12 flex items-center justify-between">
                <div class="text-black font-black text-2xl flex items-center">
                <div class="sm:w-1/4 ">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEimusi_8Vlyb_W6anOmkjObu6AOpy9w3NCTXSXYiKlLKi2lbwWnI-CjVXh80MajVSG1rHPr571xbS0ZE5uEZhNovK3iMF_jI_jtzCMqjKf5XTNUPOBwQMp5zO5NslTdSePedJ37HsV-gHxElwsBn5yno80hFrQJ8-TxZuRD0OkbN_oZVG-g1k-3HkklSXMS/w1600/onee.png" alt="Example Image">
              </div>
                </div>
                <div class="flex items-center">
                    <nav class="text-black text-lg hidden lg:flex items-center">

                        @if(Route::has('admin.login'))
                                <a href="{{ route('admin.login') }}" class="py-2 px-6 flex hover:text-blue-700">Login</a>

                        @endif

                        <!-- @if (Route::has('login'))
                            @auth('front')
                                <a href="{{ url('/dashboard') }}" class="py-2 px-6 flex hover:text-green-500">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="py-2 px-6 flex hover:text-green-500">Sign up</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 py-2 px-6 flex hover:text-green-500">Register</a>
                                @endif
                            @endauth
                        @endif -->
                    </nav>
                    <button class="lg:hidden flex flex-col">
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                    </button>
                </div>
            </div>
        </header>
        <div class="container mx-auto px-6 sm:px-12 flex flex-col-reverse sm:flex-row items-center">
            <div class="sm:w-2/5 flex flex-col items-start mt-8 sm:mt-0">
                <h1 class="text-4xl lg:text-6xl leading-none mb-4"><strong class="font-black">ONEE Marrakech</strong> </h1>
                <p class="lg:text-lg mb-4 sm:mb-12">L’Office National de l’Électricité et de l’Eau potable (ONEE) est le pilier de la
                     stratégie énergétique et bras armé de l’Etat dans le secteur de l’eau et de l’assainissement au Maroc.
                     Depuis le milieu des années 1990, l’Office est sur tous les fronts : généralisation de l’accès à l’électricité et à l’eau potable,
                      épuration des eaux usées …</p>
                <a href="#" class="font-semibold text-lg bg-blue-500 hover:bg-blue-400 text-white py-2 px-3 rounded-full">Pour Nous</a>
            </div>
            <div class="sm:w-3/5 ">
            <img src="https://maroc-diplomatique.net/wp-content/uploads/2020/01/ONEE-e1586104439100.jpg" alt="Example Image">
            </div>
        </div>
    </main>
</x-front-guest-layout>

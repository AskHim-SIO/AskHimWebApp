@extends('layouts.app')

@section('title', 'Page Accueil')


@section('navbar')
    <x-navbar></x-navbar>
@endsection

@section('content')
    <!-- component -->
    <div class="bg-white">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="relative mt-6 max-w-lg mx-auto">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                        </span>
                    <input
                        class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-askHim-blue focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Recherche">
                </div>
            </div>
        </header>
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="h-64 rounded-lg overflow-hidden bg-cover bg-center"
                     style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Sport Shoes</h2>
                            <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                            <button
                                class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>Shop Now</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="md:flex mt-8 md:-mx-4">
                    <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
                         style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <h2 class="text-2xl text-white font-semibold">Back Pack</h2>
                                <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing
                                    elit.
                                    Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                                <button
                                    class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                    <span>Shop Now</span>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
                        style="background-image: url('{{asset('assets/img/smartphone.jpg')}}')">
                        <div class="bg-gray-900 bg-opacity-75 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <h2 class="text-2xl text-white font-semibold">Ask<span
                                        class="text-askHim-blue">Him</span> sur ton mobile !</h2>
                                <p class="mt-2 text-gray-400">Toujours avec vous même dans vos poches. <span
                                        class="text-askHim-blue">L'application</span> vous permet de contnuer
                                    l'aventure
                                    peu importe ou vous vous situez.</p>
                                <button
                                    class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                    <span>Télécharger l'application !</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">Catégories</h3>
                    <ul class="flex items-center justify-center space-x-6">
                        <!-- Add Story -->
                        <li class="flex flex-col items-center space-y-2">
                            <!-- Ring -->
                            <div class="story-ring flex justify-center items-center
                                bg-white rounded-full relative cursor-pointer
                                hover:transition-all duration-150 delay-100">
                                <a class="block rounded-full hover:bg-askHim-blue hover:-rotate-6 p-1 " href="#">
                                    <!-- Thumbnail -->
                                    <img class="w-25 rounded-full"
                                         src="{{asset('assets/img/category/transport.jpg')}}">
                                </a>
                            </div>

                            <!-- Username -->
                            <span class="story-text font-medium">Transport</span>
                        </li>

                        <li class="flex flex-col items-center space-y-2">
                            <!-- Ring -->
                            <div class="story-ring flex justify-center items-center
                                bg-white rounded-full relative cursor-pointer
                                hover:transition-all duration-150 delay-100">
                                <a class="block rounded-full hover:bg-askHim-blue hover:-rotate-6 p-1 " href="#">
                                    <!-- Thumbnail -->
                                    <img class="w-25 rounded-full"
                                         src="{{asset('assets/img/category/course.jpg')}}">
                                </a>
                            </div>

                            <!-- Username -->
                            <span class="story-text font-medium">Course</span>
                        </li>

                        <li class="flex flex-col items-center space-y-2">
                            <!-- Ring -->
                            <div class="story-ring flex justify-center items-center
                                bg-white rounded-full relative cursor-pointer
                                hover:transition-all duration-150 delay-100">
                                <a class="block rounded-full hover:bg-askHim-blue hover:-rotate-6 p-1 " href="#">
                                    <!-- Thumbnail -->
                                    <img class="w-25 rounded-full"
                                         src="{{asset('assets/img/category/tacheMenagere.jpg')}}">
                                </a>
                            </div>

                            <!-- Username -->
                            <span class="story-text font-medium">Tâches ménagères</span>
                        </li>


                        <li class="flex flex-col items-center space-y-2">
                            <!-- Ring -->
                            <div class="story-ring flex justify-center items-center
                                bg-white rounded-full relative cursor-pointer
                                hover:transition-all duration-150 delay-100">
                                <a class="block rounded-full hover:bg-askHim-blue hover:-rotate-6 p-1 " href="#">
                                    <!-- Thumbnail -->
                                    <img class="w-25 rounded-full"
                                         src="{{asset('assets/img/category/formation.jpg')}}">
                                </a>
                            </div>

                            <!-- Username -->
                            <span class="story-text font-medium">Formation</span>
                        </li>

                        <li class="flex flex-col items-center space-y-2">
                            <!-- Ring -->
                            <div class="story-ring flex justify-center items-center
                                bg-white rounded-full relative cursor-pointer
                                hover:transition-all transition duration-400 delay-100">
                                <a class="block rounded-full hover:bg-askHim-blue hover:-rotate-6 p-1 " href="#">
                                    <!-- Thumbnail -->
                                    <img class="w-25 rounded-full"
                                         src="{{asset('assets/img/category/loisir.jpg')}}">
                                </a>
                            </div>

                            <!-- Username -->
                            <span class="story-text font-medium">Loisir</span>
                        </li>
                    </ul>
                </div>

                <div class="flex">
                    <div class="flax-initial grow">
                        <h3 class="text-gray-600 text-2xl font-medium">Services récents</h3>
                    </div>

                    <div class="flex">
                        <button class="rounded-full hover:border hover:border-askHim-blue hover:border-2"
                                id="slideRight">
                            <svg class="h-8 w-8 text-askHim-blue" width="35" height="35" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"/>
                                <polyline points="11 7 6 12 11 17"/>
                                <polyline points="17 7 12 12 17 17"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flax pl-5">
                        <button class="rounded-full hover:border hover:border-askHim-blue hover:border-2"
                                id="slideLeft">
                            <svg class="h-8 w-8 text-askHim-blue" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="13 17 18 12 13 7"/>
                                <polyline points="6 17 11 12 6 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <script>
                    const left = document.getElementById('slideLeft');
                    const right = document.getElementById('slideRight');
                    let long = 0;
                    left.onclick = function () {
                        long = long + 400;
                        document.getElementById('container').scrollTo({left: long, behavior: 'smooth'})
                    };
                    right.onclick = function () {
                        long = long - 400;
                        document.getElementById('container').scrollTo({left: long, behavior: 'smooth'})
                    };
                </script>

                <div class="async">
                    <div class="flex flex-col mt-5">
                        <div class="flex overflow-x-hidden snap-x snap-mandatory" id="container">

                            <script>
                                fetch("http://askhim.ctrempe.fr:8080/service/get-recent-services")
                                    .then((response) => response.json())
                                    .then((services) => {
                                        let i = 0;
                                        services.forEach((service) => {
                                            const milliseconds = service.postDate
                                            const dateObject = new Date(milliseconds)
                                            const date = dateObject.toLocaleDateString()

                                            document.getElementById("container").insertAdjacentHTML(
                                                "beforeend",
                                                `
                                                <div class="p-4 rounded-xl hover:scale-105 duration-500 transform transition cursor-pointer">
                                                    <!-- Tag Discount -->
                                                    <div class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-green-500 text-gray-100 text-xs md:text-sm font-medium md:block">Theme</div>
                                                    <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-green-500"></div>
                                                    <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-green-600"></div>
                                                    <div class="w-52 pb-2 bg-white rounded-xl shadow-xl z-10">
                                                        <div class="relative">
                                                        <!-- :src="image.largeImageURL"     -->
                                                            <img src="https://www.bretagne.ars.sante.fr/system/files/2020-11/UNE_test-antigenique.jpg" class="max-h-60 object-cover rounded-t-xl" alt="">
                                                            <!-- Tag rekomendasi -->
<!--                                                            <div class="bottom-0 right-0 mb-2 mr-2 px-2 rounded-lg absolute bg-yellow-500 text-gray-100 text-xs font-medium">Pour vous</div>-->
                                                        </div>
                                                        <div class="px-2 py-1">
                                                            <!-- Product Title -->
                                                            <div class="text-sm md:text-base font-bold pr-2">${service.name}</div>
                                                            <div class="flex py-2">
                                                                <!-- Distance -->
                                                                <div class="bg-gray-200 p-1 mr-2 rounded-lg text-xs font-medium text-gray-900">
                                                                    ${service.lieu.ville}
                                                                </div>
                                                                <div class="flex justify-between item-center">
                                                                        <div class="flex items-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9b9b9b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                                            <!-- Rating total -->
                                                                            <p class="text-gray-600 font-bold text-xs md:text-sm ml-1">
                                                                                ${service.price}
                                                                                <!-- Jumlah review -->
                                                                                <span class="text-gray-500 font-normal">AskCoins</span>
                                                                            </p>
                                                                        </div>
                                                                </div>
                                                            </div>
<!--                                                            &lt;!&ndash; Alamat &ndash;&gt;-->
<!--                                                            <p class="pb-1 md:pb-2 text-xs md:text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>-->
                                                            <!-- Tombol pesan -->
                                                            <div class="flex flex-row-reverse">
                                                                <a class="inset-x-0 bottom-0 flex justify-center bg-blue-500 hover:bg-white text-sm md:text-base border hover:border-2 hover:border-blue-500 rounded-xl w-14 md:w-16 p-1 text-gray-100 hover:text-blue-900" href="#">Voir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                `
                                            );
                                        });
                                    })
                                ;
                            </script>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <div class="flax-initial grow">
                        <h3 class="text-gray-600 text-2xl font-medium">Transport</h3>
                    </div>

                    <div class="flex">
                        <button class="rounded-full hover:border hover:border-askHim-blue hover:border-2"
                                id="slideRightTransport">
                            <svg class="h-8 w-8 text-askHim-blue" width="35" height="35" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"/>
                                <polyline points="11 7 6 12 11 17"/>
                                <polyline points="17 7 12 12 17 17"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flax pl-5">
                        <button class="rounded-full hover:border hover:border-askHim-blue hover:border-2"
                                id="slideLeftTransport">
                            <svg class="h-8 w-8 text-askHim-blue" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="13 17 18 12 13 7"/>
                                <polyline points="6 17 11 12 6 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <script>
                    const leftTransport = document.getElementById('slideLeftTransport');
                    const rightTransport = document.getElementById('slideRightTransport');
                    let longTransport = 0;
                    leftTransport.onclick = function () {
                        longTransport = longTransport  + 400;
                        document.getElementById('containerTransport').scrollTo({
                            left: longTransport,
                            behavior: 'smooth'
                        })
                    };
                    rightTransport.onclick = function () {
                        longTransport = longTransport - 400;
                        document.getElementById('containerTransport').scrollTo({
                            left: longTransport,
                            behavior: 'smooth'
                        })
                    };
                </script>

                <div class="async">
                    <div class="flex flex-col mt-5">
                        <div class="flex overflow-x-hidden snap-x snap-mandatory" id="containerTransport">

                            <script>
                                fetch("http://askhim.ctrempe.fr:8080/service/get-transports")
                                    .then((response) => response.json())
                                    .then((services) => {
                                        let i = 0;
                                        services.forEach((service) => {
                                            const milliseconds = service.postDate
                                            const dateObject = new Date(milliseconds)
                                            const date = dateObject.toLocaleDateString()

                                            document.getElementById("containerTransport").insertAdjacentHTML(
                                                "beforeend",
                                                `
                                                <div class="p-4 rounded-xl hover:scale-105 duration-500 transform transition cursor-pointer">
                                                    <!-- Tag Discount -->
                                                    <div class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-green-500 text-gray-100 text-xs md:text-sm font-medium md:block">Theme</div>
                                                    <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-green-500"></div>
                                                    <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-green-600"></div>
                                                    <div class="w-52 pb-2 bg-white rounded-xl shadow-xl z-10">
                                                        <div class="relative">
                                                        <!-- :src="image.largeImageURL"     -->
                                                            <img src="https://www.bretagne.ars.sante.fr/system/files/2020-11/UNE_test-antigenique.jpg" class="max-h-60 object-cover rounded-t-xl" alt="">
                                                            <!-- Tag rekomendasi -->
<!--                                                            <div class="bottom-0 right-0 mb-2 mr-2 px-2 rounded-lg absolute bg-yellow-500 text-gray-100 text-xs font-medium">Pour vous</div>-->
                                                        </div>
                                                        <div class="px-2 py-1">
                                                            <!-- Product Title -->
                                                            <div class="text-sm md:text-base font-bold pr-2">${service.name}</div>
                                                            <div class="flex py-2">
                                                                <!-- Distance -->
                                                                <div class="bg-gray-200 p-1 mr-2 rounded-lg text-xs font-medium text-gray-900">
                                                                    ${service.lieu.ville}
                                                                </div>
                                                                <div class="flex justify-between item-center">
                                                                        <div class="flex items-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9b9b9b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                                            <!-- Rating total -->
                                                                            <p class="text-gray-600 font-bold text-xs md:text-sm ml-1">
                                                                                ${service.price}
                                                                                <!-- Jumlah review -->
                                                                                <span class="text-gray-500 font-normal">AskCoins</span>
                                                                            </p>
                                                                        </div>
                                                                </div>
                                                            </div>
<!--                                                            &lt;!&ndash; Alamat &ndash;&gt;-->
<!--                                                            <p class="pb-1 md:pb-2 text-xs md:text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>-->
                                                            <!-- Tombol pesan -->
                                                            <div class="flex flex-row-reverse">
                                                                <a class="inset-x-0 bottom-0 flex justify-center bg-blue-500 hover:bg-white text-sm md:text-base border hover:border-2 hover:border-blue-500 rounded-xl w-14 md:w-16 p-1 text-gray-100 hover:text-blue-900" href="#">Voir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                `
                                            );
                                        });
                                    })
                                ;
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <x-tab-icon></x-tab-icon>
        <title>TechLoan</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/js/app.js')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-100 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">                           
                        </div>
                        @if (Route::has('login'))
                        <nav class="fixed top-0 left-0 right-0 flex justify-end gap-3 bg-white/ p-4 z-10 shadow-sm glass-effect">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:bg-blue-400 hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Dashboard
                                </a>
                        
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-10 py-2 text-black ring-1 ring-transparent transition hover:bg-blue-500 hover:text-white focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Log in
                                </a>
                        
                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-10 py-2 text-black ring-1 ring-transparent transition hover:bg-blue-500 hover:text-white focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                                               
                        @endif
                    </header>
                    <main class="lg:mt-6 2xl:mt-6 xl:mt-6 -mt-96 ">                                                                                    
                        <div class="grid grid-cols-1 md:grid-cols-5 sm:row-start-1 grid-rows-5 gap-4 p-4 text-black">
                            <div class="col-span-1 md:col-span-3 row-span-4 bg-white/50 p-10 rounded-2xl shadow-sm">
                                <h1 class="text-center text-2xl font-bold italic">Welcome To Borrowing System</h1>
                                <p class="mt-10 text-justify">In this system, employees can borrow items such as laptops, projectors, or other IT equipment from the IT department.</p>
                            </div>
                            <div class="col-span-1 md:col-span-2 md:col-start-4 row-span-2 bg-white/50 p-10 rounded-2xl shadow-sm">
                                <img src="{{ asset('images/LOGO.png') }}" alt="" class="justify-self-center">
                                <p class="mt-10 text-justify">Hayakawa Electronics (Phils.) Corp. (HEPC) was incorporated and registered with the Philippine Securities and Exchange Commission (SEC) on March 14, 1990. It is a wholly owned subsidiary of Hayakawa Densen Kogyo Co., Ltd. (the parent company), a company incorporated in Japan. HEPC is presently engaged in the manufacture, assembly, and fabrication of wire harness for various electronic and electrical appliances.</p>
                            </div>
                            <div class="col-span-1 md:col-span-2 md:col-start-4 row-span-2 row-start-3 bg-white/50 p-10 rounded-2xl shadow-sm">
                                <h1 class="font-bold text-center">IT Department</h1>
                                <p class="mt-10 text-justify">The IT department of HEPC is responsible for the maintenance and operation of the company's technology systems. The department >involves providing assistance to end-users and ensuring the smooth operation of an organization's technology systems. This includes troubleshooting hardware and software issues, managing network connectivity problems, maintaining servers and databases, installing and updating software, and resolving technical inquiries. The goal is to minimize downtime and ensure that IT systems are running efficiently to support business operations.</p>
                            </div>
                        </div>                                                        
                    </main>
                    <footer id="footer" class="py-16 text-center text-sm text-black italic dark:text-white/70 translate-y-full transition-transform duration-700 ease-in-out opacity-0">
                        Hayakayawa Electronics (Phils.) Corp.
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>

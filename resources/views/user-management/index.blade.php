@extends('layouts.app')

@section('content')
    <div x-data="{ sidebarOpen: true }" class="lg:flex overflow-x-auto md:min-h-screen w-full">
        <main class="flex-1 ">
            <div class=" bg-primary-400">
                <div class="container sm:px-1 mx-auto">
                    <div class="flex justify-between">
                        <ul class="flex md:space-x-10 py-5">                                                        
                            <li class="py-3 text-center self-center">
                                <a href="#" class=" flex">
                                    <div class="w-14">
                                        <img src="../img/icons/account.svg" alt="home" class="w-5 mx-6 ">
                                    </div>
                                    <span class="self-center font-poppins font-medium text-white md:text-sm text-xs uppercase ">Customers</span>
                                </a>
                            </li>
                            
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="pt-3 bg-white">
                <div class="sm:p-4 py-4">
                    <div class="container sm:px-6 px-3 mx-auto">
                        <a class="font-medium text-black hover:text-blue-700 " href="manage-user.html">
                            <svg class="w-5 opacity-70" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg> 
                        </a>
                    
                        <h3 class="text-lg font-medium leading-6 text-gray-900 py-4">Customer List</h3>
                        @livewire('show-users')
                    </div>
                </div>
            </div>
        </main>
    </div>
    
@endsection
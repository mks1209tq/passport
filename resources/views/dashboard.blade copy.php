@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
    <div class="container px-4 py-8 border-2 border-red-500">
    <div class=""ml-16>

  </div>
    <div class="flex flex-col md:flex-row gap-8 ml-16">
        <div class="w-full md:w-1/2 ml-16 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">FORM</h2>
            <!-- Your form content goes here -->
            <div class="mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <?php
                    $employees = App\Models\EmployeePP::all();
                    ?>
                    @foreach ($employees as $employee)
                        <p>{{ $employee->employee_id }}</p>
                    @endforeach

                </div>
                
            </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">PDF</h2>
            <!-- Your PDF viewer or content goes here -->
            <p>PDF content or viewer will be displayed here.</p>
        </div>
    </div>
</div>
</div>
@endsection




<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in") . ' ' . Auth::user()->name }}
                    @if (Route::has('register'))
                    
                        @if (Auth::user()->is_admin)
                            <a href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register wsx
                            </a>
                        @endif

                    @endif
                    <?php
                    $docUrl = Storage::disk('idrive_e2')->temporaryUrl('10003.pdf', now()->addMinutes(5));
                    ?>

                </div>
                
            </div>

            <div class="mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <?php
                    $employees = App\Models\EmployeePP::all();
                    ?>
                    @foreach ($employees as $employee)
                        <p>{{ $employee->employee_id }}</p>
                    @endforeach

                </div>
                
            </div>
            </div>

            


        </div>
        <div class="">
            <div class="col-md-12">
                <h2>Document viewer</h2>

                <p>Resources</p>


                <div class="row">
                    <div class="">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $docUrl }}" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>
                
             
            </div>
        </div>
    </div>
</x-app-layout>

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
                    {{ __("You're logged in")." ".Auth::user()->name }}
                    @if (Route::has('register'))
                                    @if (Auth::user()->is_admin)
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                    @endif
                    <?php
                        $docUrl = Storage::disk('idrive_e2')->temporaryUrl('10003.pdf', now()->addMinutes(5));
                    ?>
                    

                   
                </div>
            </div>
        </div>
        <div class="container-fluid">
                        <div class="col-md-12">
                            <h2>Document viewer</h2>

                            <p>Resources</p>
                            

                            <div class="row">
                                <div class="container-fluid">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src= {{$docUrl}} allowfullscreen></iframe>
                                    </div>

                                </div>
                                
                            </div>
                            <!-- row end -->
                        </div>
                    </div>
    </div>
</x-app-layout>

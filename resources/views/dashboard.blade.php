<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    <div class="flex h-screen">
        <div class="w-1/12 bg-red-500 p-4">
            Logo
        </div>
        <div class="w-3/12 overflow-y-auto bg-blue-500">
            <div class="p-6 text-gray-900">
                <?php
                    $employees = App\Models\EmployeePP::all();
                    ?>
                    @foreach ($employees as $employee)
                        <p>{{ $employee->id }}</p>
                        
                        <a href="{{ route('employee-pps.edit', $employee->id) }}">Edit</a>
                        <p>{{ $employee->employee_id }}</p>

                    @endforeach

            </div>
        </div>
        <div class="w-6/12 bg-green-500 p-4">
            
                <h2>Document viewer</h2>
                <div class="h-5/6 bg-white p-4 rounded-lg shadow-md">
                    
                    <?php
                    $docUrl = Storage::disk('idrive_e2')->temporaryUrl('10003.pdf', now()->addMinutes(5));
                    ?>

                
                            <iframe class="embed-responsive-item w-full h-full" src="{{ $docUrl }}" allowfullscreen></iframe>
                </div>       

                    

              
                
           
        
        </div>
    </div>
</body>
</html>
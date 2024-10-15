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
        <div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Employee</h1>

   

    <form action="{{ route('employee-pps.update', $employeePP->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $employeePP->id }}">
       
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="employeePP_id">
                Employee ID
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                   id="employee_id" 
                   type="text" 
                   name="employee_id" 
                   value="{{ old('employee_id', $employeePP->employee_id) }}" 
                   required>
        </div>

        

        

        

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="submit">
                Update Employee
            </button>
            <a href="{{ route('dashboard') }}" 
               class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Cancel
            </a>
        </div>
    </form>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">There were some problems with your input.</span>
            <ul class="mt-3 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
        </div>
        <div class="w-6/12 bg-green-500 p-4">
            
                <h2>Document viewer</h2>
                <div class="h-5/6 bg-white p-4 rounded-lg shadow-md">
                    
                    <?php
                    $file = $employeePP->file_name;

                    // dd($file);
                    $docUrl = Storage::disk('idrive_e2')->temporaryUrl($file, now()->addMinutes(5));
                    ?>

                
                            <iframe class="embed-responsive-item w-full h-full" src="{{ $docUrl }}" allowfullscreen></iframe>
                </div>       

                    

              
                
           
        
        </div>
    </div>
</body>
</html>
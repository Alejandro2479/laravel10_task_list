<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks List</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-100
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-green-500 underline-offset-4 decoration-2
        }

        label {
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {
            @apply text-red-500 text-sm
        }

        .success {
            @apply text-green-500 text-sm mb-4
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <div class="border border-green-500 rounded-lg shadow-xl">
        <div class="m-4">
            <h1 class="text-2xl mb-4 font-medium">@yield('title')</h1>
            @if(session()->has('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>

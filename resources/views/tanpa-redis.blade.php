<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    </head>
    <body class="antialiased">
        <div class="h-screen bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center mb-3">
                   <h4 class="font-bold">Tanpa Redis</h4>
                </div>
                <a href="{{ route('dengan.redis') }}">Kembali</a>
                <div class="flex justify-center gap-3">
                </div>
            </div>
            <div class="border max-w-7xl mx-auto p-5">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="border">
                            <th>No</th>
                            <th class="px-6 py-3">User</th>
                            <th class="px-6 py-3">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4">Tidak ada pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="flex justify-end mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </body>
</html>

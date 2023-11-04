<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto">
    <header class="flex items-center justify-between border-b py-6">
        <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
            </svg>

            <h1 class="font-bold text-lg">Product CRUD</h1>
        </div>

        <a href="{{ route('products.create') }}" class="text-blue-500 hover:text-blue-600">Create product</a>

    </header>

    <main class="py-6">
        <h1 class="text-center font-bold text-2xl mb-6">All Products</h1>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                <th scope="col" class="px-6 py-4">Product name</th>
                                <th scope="col" class="px-6 py-4">Product Price</th>
                                <th scope="col" class="px-6 py-4">Created_at</th>
                                <th scope="col" class="px-6 py-4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $product->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $product->title }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $product->price }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $product->created_at->format('d/m/Y') }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 space-x-3">
                                        <a href="{{ route('products.show', $product) }}" class="text-green-500 hover:text-green-600">Show</a>
                                        <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>

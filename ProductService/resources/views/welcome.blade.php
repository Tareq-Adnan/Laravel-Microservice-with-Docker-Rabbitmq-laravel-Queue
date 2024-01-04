<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="mx-auto mb-5 mt-10 w-10/12 border flex items-center justify-center shadow-md flex-col">
        @if (session('success'))
            <div class="p-4 bg-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if (session('failed'))
            <div class="p-4 bg-red-400 rounded">
                {{ session('failed') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="p-4 bg-orange-400 rounded">
                {{ session('warning') }}
            </div>
        @endif

        <div class="my-28 text-center w-full">
            <h1 class="font-bold text-xl">Stocks</h1>
            <div class="p-4 w-full">
                <table class="w-full">
                    <thead>
                        <tr class="p-5 rounded bg-gray-50 m-2 shadow-md">
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Stock</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($product as $data)
                            <tr class="p-2 border">
                                <td class="p-2 rounded bg-gray-50 m-2 shadow-md"> {{ $data->title }} </td>
                                <td class="p-2 rounded bg-gray-50 m-2 shadow-md"> {{ $data->price }} </td>
                                <td class="p-2 rounded bg-gray-50 m-2 shadow-md"> {{ $data->stock }} </td>
                            </tr>
                        @endforeach

                    </tbody>


                </table>

            </div>
        </div>
        <div class="text-center w-full mb-5">
            <h1 class="font-bold text-xl">Orders</h1>
            <div class="p-4 w-full">
                <table class="w-full">
                    <thead>
                        <tr class="p-5 rounded bg-gray-50 m-2 shadow-md">
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                            <tr class="p-2 border">
                                <td class="p-2 rounded bg-gray-50 m-2 shadow-md"> {{ $order->product_id }} </td>
                                <td class="p-2 rounded bg-gray-50 m-2 shadow-md"> {{ $order->count }} </td>
                                <td class="p-2 rounded bg-gray-50 m-2 shadow-md"><a
                                        href="/confirm/{{ $order->product_id }}/{{ $order->count }}/{{ $order->id }}"
                                        class="p-2 text-white bg-green-500 rounded hover:bg-green-600">Confirm</a>
                                    <a href="reject/{{ $order->id }}"
                                        class="p-2 mx-2 text-white bg-red-500 rounded hover:bg-red-600">Reject</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>


                </table>

            </div>
            <a href="orders" class="p-3 text-white bg-green-500 rounded hover:bg-green-600">Show Order</a>
        </div>
    </div>
</body>

</html>

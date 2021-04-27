<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Currency Converter</title>
</head>
<body class=" bg-gray-100 flex bg-local">
<div class=" mx-auto max-w-6xl py-20 px-12 lg:px-24  mb-24">

    <form action="/convert" method="post">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-24 flex flex-col">

            <div class="mx-3 md:flex mb-6">

                <div class="md:w-1/2 mb-6 ">
                    <img src="images/logo-currency-exchange.jpg" alt="logo">

                </div>
                <div class=" md:w-1/2 py-6 text-3xl font-bold text-indigo-900">
                    Currency Converter
                </div>

                <div class="md:w-1/2 px-3">
                </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-indigo-900 text-xs font-bold mb-2" for="code">
                        Select currency
                    </label>
                    <div>
                        <select
                            class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded"
                            name="code" id="code">

                            @foreach($currencies as $currency)
                                <option>
                                    {{$currency->code}} ({{number_format(($currency->rate / 100000), 3)}})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="md:w-1/2 px-3 ">
                    <label class="uppercase tracking-wide text-indigo-900 text-xs font-bold mb-2" for="amount">
                        input amount in eur
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-4 mb-3 pr-8 "
                           type="text" placeholder="Amount in EUR" name="amount" id="amount">
                </div>
            </div>


            <div class=" pb-5 text-center text-indigo-900 text-2xl font-semibold ">
                @if (session('conversion'))
                        {{ session('conversion') }}
                @endif
            </div>

            <div class="md:w-full px-3">
                <button type="submit" name="submit"
                        class="md:w-full bg-blue-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                    Convert
                </button>
            </div>


        </div>
    </form>
</div>
</body>
</html>

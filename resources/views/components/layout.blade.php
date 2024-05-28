<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="Muhammad Farhan Novian" content="">

    <title>Pendataan Alumni | {{ $title }}</title>
    <x-asset></x-asset>



    <!-- CSS FILES -->


</head>

<body class="d-flex flex-column h-100">

    <main>

        {{-- Navigation --}}
        <x-navbar></x-navbar>

        {{-- Hero --}}
        <x-banner> {{ $title }}</x-banner>

        {{-- Content --}}
        {{ $slot }}


    </main>

    {{-- Footer --}}
    <x-footer></x-footer>

    <!-- JAVASCRIPT FILES -->

    <x-js></x-js>


</body>

</html>

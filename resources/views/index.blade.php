<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.170.0/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <title>Fejlődjünk tudatosan!</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    @include('components.navigation')
    @include('components.call-to-action')

    <h1>Frontend Technologies</h1>
    <ul>
        @foreach($frontend as $tech)
            <li>{{ $tech }}</li>
        @endforeach
    </ul>

    <h1>Backend Technologies</h1>
    <ul>
        @foreach($backend as $tech)
            <li>{{ $tech }}</li>
        @endforeach
    </ul>
</body>
</html>

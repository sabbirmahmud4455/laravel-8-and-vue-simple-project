<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Laravel & Vue SPA</title>
    <script src="https://use.fontawesome.com/13fc9a263b.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <app-header class="mb-4"></app-header>
        <router-view></router-view>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
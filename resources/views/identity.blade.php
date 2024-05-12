<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identity</title>
</head>
<body>
    <h1>Laravel Layouts</h1>
    <x-alert class="jodi" type="error" :$message :$options>
        <x-slot:title>
            Title Blog = {{$component->title}}
        </x-slot:title>
        <p>Ini slot</p>
    </x-alert>
</body>
</html>
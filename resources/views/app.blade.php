<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    @vite('resources/js/app.js')
</head>

<body>
    
    @foreach ($items as $item)
        <h1>{{$item->name}}</h1>
        <p>{{$item->type}}</p>
        <p>{{$item->category}}</p>
        <p>{{$item->weight}}</p>
        <p>{{$item->cost}}</p>
        <p>{{$item->damage_dice}}</p>

    @endforeach
</body>

</html>
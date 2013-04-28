<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/foundation.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/knockout.js"></script>
    </head>
    <body>
<div class="row">
    <div class="span6 offset3">
    Movie DB Access
    </div>
</div>
<div class="row">
    <div class="span4 offset4">
        <form class="form-search" data-bind="submit: getMovies">
            <input type="search" class="input-medium search-query" data-bind="value: person"><input type="submit" class="btn" value="search">
        </form>
    </div>
</div>
<div class="row">
    <div class="span4 offset4">
        <ul data-bind="foreach: {data: movies, as: 'movie}">
            <li><a href="#" data-bind="attr:{href: movie.movieUrl}"><img src="" data-bind="attr: {src: movie.poster}"></a> <h3 data-bind="text: movie.title"></h3>
            Starring: <span class="stars" data-bind="text: movie.character"></span>
            </li>
        </ul>
    </div>
</div>
</body>
</html>
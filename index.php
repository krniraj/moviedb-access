<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/foundation.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/knockout.js"></script>
		<script type="text/javascript" src="js/koviews.js"></script>
    </head>
    <body>
<div class="row">
    <div class="large-8 columns large-offset-2 text-center">
		<h1>Movie DB Access</h1>
		<h2 class="subheader">Movies by <span data-bind="text: actor">Actors</span></h2>
    </div>
</div>
<div class="row">
    <div class="large-8 large-offset-2 columns">
        <form class="form-search" data-bind="submit: getMovies">
			<div class="row collapse">
			<div class="small-9 columns">
            <input type="search" placeholder="Actor Name" data-bind="value: person">
			</div>
			<div class="small-3 columns">
			<input type="submit" class="button postfix" value="search">
			</div>
			</div>
		<div data-alert class="hide" data-bind="attr: {class: alert}, text: notification">
		
		<a href+"#" class="close">&times;</a>
		</div>
        </form>

    </div>
</div>
<div class="row">
    <div class="large-8 large-offset-2 columns">
        <div data-bind="foreach: {data: movies, as: 'movie'}">
		<!-- ko if: movie.visible() == true -->
            <div class="panel"><a href="#" data-bind="attr:{href: movie.movieUrl}"> <h3 data-bind="text: movie.title"></h3></a>
			<ul class="no-bullet">
			<li><strong>Release Date:</strong> <span data-bind="text: movie.date"></span></li>
			<li><strong>Character Role:</strong> <span data-bind="text: movie.character"></span></li>
			</ul>
            </div>
        <!-- /ko -->
		</div>
		<a href="#" data-bind="click: showMovies, text: showMore">Show more</a>
    </div>
</div>
<div class="row">
	<div class="large-8 large-offset-2 columns">
	Application created by <a href="http://antjanus.com">AntJanus</a>. Check out the source code on <a href="https://github.com/AntJanus/moviedb-access">Github</a>.
	</div>
</div>
</body>
</html>
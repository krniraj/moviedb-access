function movie(data){
       var self = this;
       self.title = data.title;
       self.date = data.release_date;
       self.img = data.poster_path;
       self.poster =  'http://api.themoviedb.org/3/'+ self.img;
       self.character = data.character;
       self.movieUrl = 'http://www.themoviedb.org/movie/' + data.id;
}

function movieViewModel(){
    var self = this;
    self.movies = ko.observableArray([]);
    self.getMovies = function(){
        var request = {
            'cmd': 'actor',
            'actor': self.person
        };
        $.post('/api.php', request, function(data){
        var mappedMovies = $.map(data, function(item){ return new movie(item)});
        self.movies(mappedMovies);
    });
    };
    self.person = ko.obserable();
}

ko.applyBindings(new movieViewModel());
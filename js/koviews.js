$(document).ready(function(){
function movie(data){
       var self = this;
       self.title = data.title;
       self.date = data.release_date;
       self.poster =  'http://themoviedb.org/3'+ data.poster_path;
       self.character = data.character;
       self.movieUrl = 'http://www.themoviedb.org/movie/' + data.id;
	   self.visible = ko.observable(data.visible);
}

function movieViewModel(){
    var self = this;
	self.alert = ko.observable('hide');
    self.movies = ko.observableArray([]);
	self.shownMovies = ko.observable(8);
	self.showMovies = function(){
			var cur = self.shownMovies();
			self.shownMovies(cur + 10);
			for(var i = cur; i<cur+10; i++){
				self.movies()[i].visible(true);
				console.log(i);
			}
	};
	self.notification = ko.observable();
    self.getMovies = function(){
		self.notification('Loading Actor Information...');
		self.alert('alert-box');
        var request = {
            'cmd': 'actor',
            'actor': self.person
        };
        $.post('api.php', request, function(data){
		console.log(data);
		var i = 0;
        var mappedMovies = $.map(data.movies, function(item){ 
		if(i < 10){
			item.visible = true;
			self.shownMovies(i);
			i++;
		}
		else{
			item.visible = false;
		}
		
		
		return new movie(item)});
        self.movies(mappedMovies);
		self.actor(data.name);
		if(self.actor().toLowerCase() != self.person().toLowerCase()){
			self.notification('Did you mean - '+self.actor()+'?');
		}
		else{
		self.alert('hide');
		}
    });
    };
    self.person = ko.observable();
	self.actor = ko.observable('Actors');
	self.showMore = ko.computed(function(){
		if(self.movies().length == 0 || self.movies().length <= self.shownMovies()){
			return '';
		}
		else{
			return 'Show More';
		}
	});
}

ko.applyBindings(new movieViewModel());

});
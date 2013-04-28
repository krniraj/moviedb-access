function movie(){
       
}

function movieViewModel(){
    var self = this;
    self.movies = ko.observableArray([]);
}

ko.applyBindings(new movieViewModel());
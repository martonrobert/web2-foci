

var KlubListaViewModel = function() {
    var self = this;

    this.klubLista = ko.observableArray();
    this.selectedCsapat = ko.observable();
    this.currentJatekosLista = ko.observableArray();
    this.view = ko.observable('klubLista');

    $.ajax({
        url: '/csapatok',
        method: "GET",
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        dataType: "json",
        success: function(response) {
            console.log(response);
            ko.utils.arrayPushAll(self.klubLista, response);
        },
        error: function(error) {
            console.log(error);
            var message = error.responseJSON.message;
            alert(message);

        }
    });

    this.showKlubGamers = function() {
        var csapat = this;

        console.log(this);
        self.currentJatekosLista = ko.observableArray();

        $.ajax({
            url: '/csapatok/'+this.id+'/jatekosok',
            method: "GET",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            dataType: "json",
            success: function(response) {
                console.log(response);
                ko.utils.arrayPushAll(self.currentJatekosLista, response);
                self.view('jatekosLista');
                self.selectedCsapat(csapat);
            },
            error: function(error) {
                console.log(error);
                var message = error.responseJSON.message;
                alert(message);
    
            }
        });
    }

    this.back = function() {
        self.view('klubLista');
    }

};
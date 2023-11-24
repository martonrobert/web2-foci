var NewsViewModel = function () {
    var self = this;

    this.news = ko.observableArray();

    $.ajax({
        type: 'GET',
        url: './api-news',
        success: function(response) {
            console.log(response);

            self.news(response);

        },
        error: function() {

        }
    });

}
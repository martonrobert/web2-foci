var loginViewModel = function() {
    var self = this;

    this.title = ko.observable('Bejelentkezés');
    this.username = '';
    this.password = '';

    this.signin = function() {
        var data = {
            username: self.username,
            password: self.password
        };

        if (self.username == '') {
            alert('Az e-amil cím megadása köteleő a bejelentkezéshez.');
            return;
        }
        if (self.password == '') {
            alert('A jelszó megadása köteleő a bejelentkezéshez.');
            return;
        }

        $.ajax({
            url: '/belepes',
            method: "POST",
            data: data,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            dataType: "json",
            success: function(response) {
                console.log(response);
                debugger;
                window.location.href = '/';
            },
            error: function(error) {
                console.log(error);
                var message = error.responseJSON.message;
                alert(message);

            }
        });

    }

};
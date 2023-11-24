<div class="container" id="signupView">
    <div class="jumbotron">
        <h1>Regisztráció</h1>
        <p>A további funkciók és információk eléréséhez regisztráció szükséges.</p>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Regisztráció</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-xs-2">Név</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" placeholder="Név" data-bind="value: nev" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-2">E-mail cím</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" placeholder="E-mail cím" data-bind="value: email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-2">Jelszó</label>
                            <div class="col-xs-10">
                                <input type="password" class="form-control" data-bind="value: jelszo" />
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-xs-2">Jelszó újra</label>
                            <div class="col-xs-10">
                                <input type="password" class="form-control" data-bind="value: jelszo2" />
                            </div>
                        </div>                         
                    </form>
                </div>
                <div class="panel-footer text-center">
                    <a href="/" role="button" class="btn btn-default">Mégsem</a>
                    <button type="button" class="btn btn-primary" data-bind="click: signup">Regisztráció</button>
                </div>

            </div>
            <div class="text-center">
                <a href="/belepes">Már van regisztrációm, inkább belépek</a>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">

var SignupViewModel = function() {
    var self = this;

    this.title = ko.observable('Regisztráció');

    this.nev = ko.observable('');
    this.email = '';
    this.telefon = ko.observable('');
    this.jelszo = '';
    this.jelszo2 = '';

    this.signup = function() {
        var data = {
            nev: self.nev,
            email: self.email,
            telefon: self.telefon,
            jelszo: self.jelszo
        };

        if (self.nev == '') {
            alert('A név megadása köteleő a regisztrációhoz.');
            return;
        }
        if (self.email == '') {
            alert('Az e-mail cím megadása köteleő a regisztrációhoz.');
            return;
        }
        if (self.jelszo == '') {
            alert('A jelszó megadása köteleő a regisztrációhoz.');
            return;
        }
        if (self.jelszo !== self.jelszo2) {
            alert('A jelszó és a jelszó ellenőrzés nem egyezik meg.');
            return;
        }
        

        $.ajax({
            url: '/regisztracio',
            method: "POST",
            data: data
        }).done(function(data) {
            debugger;
            window.location.href = '/belepes';

        });

    }


};

ko.applyBindings(SignupViewModel, document.getElementById('signupView'))
</script>
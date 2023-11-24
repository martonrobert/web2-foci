<div class="container" id="loginView">
    <div class="jumbotron">
        <h1>Bejelentkezés</h1>
        <p>A további funkciók és információk eléréséhez bejelentkezés szükséges.</p>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Bejelentkezés</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-xs-2">E-mail cím</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" placeholder="E-mail cím" data-bind="value: username" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-2">Jelszó</label>
                            <div class="col-xs-10">
                                <input type="password" class="form-control" data-bind="value: password" />
                            </div>                            
                        </div>  
                    </form>
                </div>
                <div class="panel-footer text-center">
                    <a href="/" role="button" class="btn btn-default">Mégsem</a>
                    <button type="button" class="btn btn-primary" data-bind="click: signin">Belépés</button>
                </div>

            </div>
            <div class="text-center">
                <a href="/regisztrácio">Még nincs regisztrációm, regisztrálok</a>
            </div>
        </div>
    </div>
    

</div>


<script type="text/javascript">
ko.applyBindings(loginViewModel, document.getElementById('loginView'))
</script>
<nav class="navbar navbar-default navbar-fixed-top" id="navigationBar">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" data-bind="text: title"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/">Főoldal</a></li>
            <li><a href="#about">Rólunk</a></li>
            <li><a href="#contact">Kapcsolat</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/belepes">Bejelentkezés</a></li>
            <li><a href="/regisztrácio">Regisztráció</a></li>
            <li><a href="/kilepes">Kijelentkezés</a></li>
        </ul>
    </div>
    </div>
</nav>

<script type="text/javascript">
    ko.applyBindings(HomeViewModel, document.getElementById('navigationBar'));
</script>
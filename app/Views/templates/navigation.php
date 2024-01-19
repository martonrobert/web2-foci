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
            <li><a href="/">Főoldal</a></li>
            <?php if (isset($auth) and (string) $auth->token_str !== '') : ?>
                <li><a href="/csapatok-lista">Csapatok</a></li>
            <?php endif; ?>  
            <?php if (isset($auth) and (string) $auth->token_str !== '' and (int) $auth->adminisztrator == 1) : ?>
                <li><a href="/felhasznalok-lista">Felhasználók</a></li>
            <?php endif; ?>               
            <li><a href="/about">Rólunk</a></li>
            <li><a href="/contact-us">Kapcsolat</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($auth) or (string) $auth->token_str == '') : ?>
            <li><a href="/belepes">Bejelentkezés</a></li>
            <li><a href="/regisztrácio">Regisztráció</a></li>
            <?php endif; ?>
            <?php if (isset($auth) and (string) $auth->token_str !== '') : ?>
            <li><p class="navbar-text"><?php echo $auth->nev . ' (' . $auth->email . ')' ?></p></li>
            <li><a href="/kilepes">Kijelentkezés</a></li>
            <?php endif; ?>
        </ul>
    </div>
    </div>
</nav>

<script type="text/javascript">
    ko.applyBindings(HomeViewModel, document.getElementById('navigationBar'));
</script>
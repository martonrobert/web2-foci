<div class="container" id="homeView">
    <div class="jumbotron">
    <h1>Minden ami foci!</h1>
    <p>A csapatok és játékosok megtekintéséhez jelentkezzen be.</p>
    <p>Ha még nincs regisztrációja, akkor a további információkért végezze el a regisztrációt.</p>
    </div>
    <div data-bind="foreach: news">
        <div class="thumbnail">
            <img data-bind="attr: {src: img}">
            <div class="caption">
                <h3 data-bind="text: title"></h3>
                <p>...</p>
                <p><a class="btn btn-primary" role="button" data-bind="attr: {href: url}">Tovább...</a></p>
            </div>
        </div>
    </div>


</div>



<script type="text/javascript">
    ko.applyBindings(NewsViewModel, document.getElementById('homeView'));
</script>
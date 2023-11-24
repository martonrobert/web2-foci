<div class="container" id="klubListaView">

    <div data-bind="if: (view() == 'klubLista')">
        <h3>Csapatok</h3>
        <div class="list-group" data-bind="foreach: klubLista">
            <a href="#" class="list-group-item" data-bind="click: showKlubGamers">
                <h4 class="list-group-item-heading" data-bind="text: csapatnev"></h4>
                <p class="list-group-item-text">
                    Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.
                </p>
            </a>
        </div>
    </div>

    <div data-bind="if: (view() == 'jatekosLista')">
        <h3 data-bind="text: selectedCsapat.csapatnev"></h3>
        <div class="list-group" data-bind="foreach: currentJatekosLista">
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading" data-bind="text: csapatnev"></h4>
                <p class="list-group-item-text">
                    Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.
                </p>
            </a>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" data-bind="click: back">Vissza a csapatokhoz</button>
        </div>
    </div>

</div>

<script type="text/javascript">
ko.applyBindings(KlubListaViewModel, document.getElementById('klubListaView'));
</script>
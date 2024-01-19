<div class="container" id="userListView">

    <h3>Felhasználók</h3>
    <hr />

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <row>
                    <th>ID</th>
                    <th>Név</th>
                    <th>E-mail</th>
                    <th>Telefon</th>
                    <th>Regisztráció időpontja</th>
                    <th>Adminisztrátor</th>
                </row>
            </thead>
            <tbody>
            <?php foreach($userList as $user) : ?>
                <tr>
                    <th><?= $user->id ?></th>
                    <th><?= $user->nev ?></th>
                    <td><?= $user->email ?></td>
                    <td><?= $user->telefon ?></td>
                    <td><?= $user->regisztracio ?></td>
                    <td><?= ((int) $user->adminisztrator == 1 ? 'igen' : '') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
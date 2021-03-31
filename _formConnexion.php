<form class="app-form" method="post">
    <fieldset>
        <legend class="bg-light mb-3">Vos informations de connexion</legend>

        <div class="row mb-3">
            <div class="col-3">
                <label for="email">Votre email *</label>
            </div>
            <div class="col">
                <input type="text" id="email" name="email" class="form-control" required />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="pwd">Votre mot de passe *</label>
            </div>
            <div class="col">
                <input type="password" id="pwd" name="pwd" class="form-control" required />
            </div>
        </div>
    </fieldset>

    <hr />

    <div class="row">
        <div class="col text-center">
            <button type="cancel" class="btn btn-link">Effacer</button>
        </div>
        <div class="col text-center">
            <button type="submit" class="btn btn-primary ">Se connecter</button>
        </div>
    </div>
</form>
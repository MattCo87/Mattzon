<div class="modal" id="myPopup">
    <div class="modal-content">
        <button id="closePopup">X</button>
        <!-- Formulaire de connexion -->
        <form class="app-form" method="post" action="catalogue.php">
            <fieldset>
                <legend class="bg-light mb-3">Vos informations de connexion</legend>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="email"></label>
                    </div>
                    <div class="col">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Adresse e-mail" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Mot de passe" required />
                    </div>
                </div>

                <div class="col text-center">
                    <button type="submit" id="Connexion">Connexion</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

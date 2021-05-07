<div class="row g-3 align-items-center">
  <div class="col-auto">
    <form action = "?oldal=belep" method = "post">
      <fieldset>
        <legend>Bejlentkezés</legend>
        <div class="mb-3">
          <label for="felhasználó">Felhasználó</label>
          <input type="text"  name="felhasznalo" class="form-control" id="felhasználó" required laceholder="Felhasználó">
        </div>

        <div class="mb-3">
          <label for="jelszo">Jelszó</label>
          <input type="password"  name="s" class="form-control" id="jelszo" required laceholder="Jelszó">
        </div>
        <div class="mb-3">
          <input class="btn" type="submit" name="belepes" value="Belépés">
        </div>
      </fieldset>
    </form>


    <h3>Regisztrálja magát, ha még nem felhasználó!</h2>
    <form action = "?oldal=regisztral" method = "post">
    <fieldset>
     <legend>Regisztráció</legend>
      <div class="mb-3">
        <label for="vezeteknev">Vezetéknév</label>
        <input type="text"  name="vezeteknev" class="form-control" id="vezeteknev" required laceholder="Vezetéknév">
      </div>

      <div class="mb-3">
        <label for="utonev">Utónév</label>
        <input type="text"  name="utonev" class="form-control" id="utonev" required laceholder="Utónév">
      </div>

      <div class="mb-3">
        <label for="felhasznalo">Felhasználó</label>
        <input type="text"  name="felhasznalo" class="form-control" id="felhasznalo" required laceholder="Felhasználó">
      </div>

      <div class="mb-3">
        <label for="jelszo">Jelszó</label>
        <input type="password"  name="jelszo" class="form-control" id="jelszo" required laceholder="Jelszó">
      </div>

      <div class="mb-3">
        <input class="btn" type="submit" name="regisztracio" value="Regisztráció">
      </div>
      </fieldset>
    </form>
    </div>
    </div>
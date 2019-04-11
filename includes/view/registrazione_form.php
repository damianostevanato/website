<div class="row">
    <div class="col-md-3">
        <label class="mylabel">Nome Utente:</label>
        <label class="mylabel">Password:</label>
        <label class="mylabel">E-Mail:</label>
        <label class="mylabel">Nome:</label>
        <label class="mylabel">Cognome:</label>
        <label class="mylabel">Provincia:</label>
        <label id="labelcomune" class="mylabel hidden">Comune:</label>
        <label class="mylabel">Data di nascita:</label>
        <label class="mylabel">Sesso:</label>
    </div>
    <div class="col-lg-3">
        <form method="post" action="index.php?controller=page1Controller&action=registraUtente">
            <input type="text" class="myinput" name="nomeutenter" id="nomeutenter" required>
            <input type="password" class="myinput" name="passwordr" id="passwordr" required>
            <input type="text" class="myinput" name="emailr" id="emailr" required>
            <input type="text" class="myinput" name="nomer" id="nomer" required>
            <input type="text" class="myinput" name="cognomer" id="cognomer" required>
            <select class="myinput" id="provincer" name="provincer" required>
                <option selected>Seleziona Provincia</option>
            </select>
            <select class="myinput hidden" id="comunir" name="comunir" required>
                <option selected>Seleziona Comune</option>
            </select>
            <input type="text" class="myinput" name="datepicker" id="datepicker" required>
            <input type="checkbox" class="mycheckbox" name="sesso" value="uomo" id="sesso">Uomo
            <input type="checkbox" class="mycheckbox" name="sesso" value="donna" id="sesso">Donna
            <button type="submit" class="btn btn-primary mybutton" name="completar" id="completar">Completa
                Registrazione
            </button>
        </form>
    </div>
    <div class="col-md-3">
        <label id="errorenome" class="error hidden">Nome utente gia in uso</label>
    </div>
</div>

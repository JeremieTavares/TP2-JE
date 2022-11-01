<?php
    $title = 'Connexion';
    ob_start();
?>

<h1>Se connecter</h1><br/>

<form action="authenticate" method="post">
    <label for="pseudo">Pseudo : </label>
    <input type="text" name="pseudo" id="pseudo">

    <br/>

    <label for="mdp">Mot de passe : </label>
    <input type="password" name="mdp" id="mdp">
    
    <br/>

    <input type="hidden" name="action" value="authenticate">
    <input type="submit" value="Se connecter">
</form>

<?php
    $content = ob_get_clean();

    require('template.php');
?>
<?php

    //formulaire d'inscription

?>

<form action="#" method="post">
        <table>
        <thead>
            <tr>
                <th colspan="2" style='margin-bottom:1%;'>Entrez vos identifiants : </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>email : </td><td><input type="text" name="email" autocomplete="Email" required/></td>
            </tr>
            <tr>
                <td>Mdp : </td><td><input type="password" name="mdp" autocomplete="Mot de Passe" required/></td>
            </tr>
            <tr>
                <td colspan=2><input type="submit" name="submit" /></td>   
            </tr>
            </table>
</form>
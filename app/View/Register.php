<?php
require_once __DIR__ . "/../../Core/Constants.php";
$error = $A_view['errors'];
?>

<h1>Inscription</h1>

<?php
if(!empty($error)){
    echo '<p style="color: red;">'. htmlspecialchars($error[0]) .'</p>';
}
?>

<span>
   <form action="/index.php?url=register/register" method="post">
     <ul>
           <li>
              <li>
                <label id = "label" for = "email">E-mail</label>
              </li>
             <li>
                 <input class="textInput" type="email" name="email" required>
             </li>
         </li>
         <li>
             <li>
                 <label id = "label" for = "password" >Mot de passe</label>
             </li>
             <li>
                <input class="textInput" type="password" name="password" value="" required>
            </li>
        </li>
        <li>
            <li>
                <label id = "label" for = "confirmation">Confirmation du mot de passe</label>
            </li>
            <li>
                <input class="textInput" type="password" name="confirmation" value="" required>
            </li>
        </li>
        <button type="submit">S\'inscrire</button>
       </ul>
   </form>
   <p>vous avez déjà un compte ? Connectez vous <a href="/index.php?url=login/login">ici</a></p>
</span>
<?php
require_once __DIR__ . "/../../Core/Constants.php";
$A_view = $A_view ?? [];
$error = $A_view['errors'];
?>

<h1>Reset du mot de passe</h1>

<?php
if(!empty($error)){
    echo '<p style="color: red;">'. htmlspecialchars($error[0]) .'</p>';
}
?>

<span>
   <form action="/index.php?url=resetpassword/resetpassword" method="post">
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
         <button type="submit">Valider</button>
       </ul>
   </form>
</span>
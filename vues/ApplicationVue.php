<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Jeu Mastermind!</title>
  </head>
  <body>
    <table cellpadding="0" cellspacing="0" height="80" width="1599" bgcolor=" green">
      <tr>
        <td align="center" valign="middle" height="80" width="300" bgcolor=" green">
          <img width="94" height="70" class="irc_mi" onload="typeof google==='object'&amp;&amp;google.aft&amp;&amp;google.aft(this)" alt="Résultat de recherche d'images pour &quot;mastermind jeu&quot;" src="https://www.gralon.net/articles/vignettes/thumb-mastermind---le-celebre-jeu-de-deduction-5085.gif">
        </td>
        <td align="center" valign="middle" height="80" width="1299" bgcolor=" green">
          <h2 style="color: white">Bienvenue dans votre plateforme de Mastermind !</h2>
        </td>
      </tr>
    </table>
    <table cellpadding="0" cellspacing="0" height="40" width="1599" bgcolor=" #ebebeb">
      <tr>
        <td align="center" valign="middle" height="40" width="1599" bgcolor=" #ebebeb">
          
        </td>
      </tr>
    </table>
    <table cellpadding="0" align = "center" cellspacing="0" height="300" width="1599" bgcolor=" #ebebeb">
      <tr>
        <td align="center" valign="middle" height="300" width="740" bgcolor=" #ebebeb">
          <form method="POST" action="index.php?action=choixUser&ctrlaction=enregistrerChoixUser">
            <?php 
             
              for($i=0; $i < 4; $i++)
              {
                  
                  echo "<label for='choixUser'>Pion $i:</label>
                  <select name='choix$i'>";
                    echo "<option value='-'>-------------</option>";
                    echo "<option value='R'>R</option>";
                    echo "<option value='J'>J</option>";
                    echo "<option value='B'>B</option>";
                    echo "<option value='O'>O</option>";
                    echo "<option value='V'>V</option>";
                    echo "<option value='N'>N</option>";
                    echo "</select></br></br>";
              }
            ?>
          <button type="submit" style="color: green" height="50" width="100"><strong>Valider</strong></button>
          </form>
        </td>
        <td align="left" valign="middle" height="300" width="740" bgcolor=" #ebebeb">
         <table align="left" cellpadding="0" cellspacing="0" height="300" width="740" bgcolor=" #ebebeb">
          <thead style="border:2px solide green;">
            <tr>
              <th align="center" valign="middle" height="30" width="100" bgcolor=" #ebebeb" >Votre choix</th>
              <th align="center" valign="middle" height="30" width="100" bgcolor=" #ebebeb" >Pions justes</th>
              <th align="center" valign="middle" height="30" width="210" bgcolor=" #ebebeb" >juste et mals plac&eacute;s</th>
              <th align="center" valign="middle" height="30" width="80" bgcolor=" #ebebeb" ">Tentative</th>
            </tr>
          </thead>
          <tbody style="border:2px solide black;">
            <?php
              for ($compter=0;$compter<count($tousLesChoixUser);$compter++)
                  {
                    echo("<tr><td>");
                    echo $tousLesChoixUser[$compter]['val1'];
                    echo $tousLesChoixUser[$compter]['val2'];
                    echo $tousLesChoixUser[$compter]['val3'];
                    echo $tousLesChoixUser[$compter]['val4'];
                    echo("</td>");
                    echo("<td>");
                    echo $resultatsChoix[$compter]['nombre_pions_juste'];
                    echo ("</td>");
                    echo("<td>");
                    echo $resultatsChoix[$compter]['nombre_pions_mal_places'];
                    echo ("</td>");
                    echo("<td>");
                    echo $compter+1;
                    echo " / 10";
                    echo("</td></tr>");
                      if($resultatsChoix[$compter]['nombre_pions_juste'] == 4 && $compter<=$nombreParties[0]['nb'])
                      {
                        echo ("<tr><td><strong></br></br> Partie Gagnée !</strong></br></br><strong>Pourcentage de réussite : </strong>");
                        echo "<strong>";
                        echo (10-$compter)* 10;
                        echo " %</strong></td></tr>";
                        break;
                      }
                      else if ($compter>$nombreParties[0]['nb'])
                      {
                        echo ("<tr><td><h3> Partie Perdue !<br></br></br><strong>Pourcentage de réussite : 0 %</strong><h3></td></tr>");
                        echo ("<tr><td><h5> Le choix correct était<h5>");
                        echo $copie_combinaisonOrdinateur[0];
                        echo $copie_combinaisonOrdinateur[1];
                        echo $copie_combinaisonOrdinateur[2];
                        echo $copie_combinaisonOrdinateur[3];
                        echo("</td></tr>");
                        break;
                      }
                  }
            ?>
          </tbody>
        </table> 
        </td>
      </tr>
    </table>
    <table cellpadding="0" cellspacing="0" height="40" width="1584" bgcolor=" green">
        <tr>
        <td align="center" valign="middle" height="250" width="738" bgcolor=" #ebebeb">
          <button ><a href="index.php" style="color: green" height="50" width="100"><strong>Recommencer partie</strong></a></button>
        </td>
      </tr>
    </table>
    <table cellpadding="0" cellspacing="0" height="40" width="1584" bgcolor=" green">
      <tr>
        <td align="center" valign="middle" height="40" width="1584" bgcolor=" green">
          <h5 style="color: white">Avec nous le Mastermind n'est jamais termin&eacute;e!</h5>
        </td>
      </tr>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

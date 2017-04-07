<?php
   if(isset($_POST['submit'])){
   
       //Hent data fra form
       //Pers info
   
       // navn adresse telefon epost linkedin fodselsdato
       $navn = $_POST['navn'];
       $adresse = $_POST['adresse'];
       $telefon = $_POST['telefon'];
       $epost = $_POST['epost'];
       $linkedin = $_POST['linkedin'];
       $fodselsdato = $_POST['fodselsdato'];
   
       //Utdanning
       $tab_utdanning_sted = $_POST['tab_utdanning_sted'];
       $tab_utdanning_start = $_POST['tab_utdanning_start'];
       $tab_utdanning_slutt = $_POST['tab_utdanning_slutt'];
       $tab_utdanning_info = $_POST['tab_utdanning_info'];
   
       // Erfaring
       $tab_erfaring_firma = $_POST['tab_erfaring_firma'];
       $tab_erfaring_stilling = $_POST['tab_erfaring_stilling'];
       $tab_erfaring_info = $_POST['tab_erfaring_info'];
       $tab_erfaring_start = $_POST['tab_erfaring_start'];
       $tab_erfaring_slutt = $_POST['tab_erfaring_slutt'];
       $tab_erfaring_adresse = $_POST['tab_erfaring_adresse'];
   
       //  Annet
       
        $tab_annet_type = $_POST['tab_annet_type'];
        $tab_annet_info = $_POST['tab_annet_info'];
   
       // Interesser
        $interesser_info = $_POST['interesser_info'];
   
       // Referanser
        $tab_referanse_navn = $_POST['tab_referanse_navn'];
        $tab_referanse_firma = $_POST['tab_referanse_firma'];
        $tab_referanse_stilling = $_POST['tab_referanse_stilling'];
        $tab_referanse_nummer = $_POST['tab_referanse_nummer'];
        $tab_referanse_epost = $_POST['tab_referanse_epost'];
   
       //Skjekke om navnet er ført inn
       if($navn ==''){
           $error[] = 'Vennligst oppgi navn';
       }
   
       //Skjekke om epost addressen er på riktig format
       if(!filter_var($epost, FILTER_VALIDATE_EMAIL)){
            $error[] = 'Vennligst oppgi en gyldig epost adresse!';
       }
   
       //Visst det er ingen error, fortsett scriptet
       if(!isset($error)){
   
           //Lag html kode av dataen
           ob_clean();
           ob_start();
           ?>
<?php 
   include('oppsett.php');
   ?>
   <link href="https://bootswatch.com/readable/bootstrap.min.css" type="stylesheet">
   
   <?php
   include('dokument.php');
   $body = ob_get_clean();
   
   $body = iconv("UTF-8","UTF-8//IGNORE",$body);
   
   $path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
   require_once $path . '/vendor/autoload.php';
   $mpdf = new \Mpdf\Mpdf(['mode' => 'c']);
   
   
   //skriv html koden om til et PDF dokument
   $mpdf->WriteHTML($body);
   
   //Skriv ut PDF dokumentet, og åpne det i en ny fane
   $mpdf->Output();
   }
   }
   
   //Visst det er noen feil, viser de på skjermen
   if(isset($error)){
   foreach($error as $error){
   echo "<p style='color:#ff0000'>$error</p>";
   }
   }
   ?> 
<!DOCTYPE html>
<html lang="no">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Fra CV Til PDF</title>
      <?php include('oppsett.php');?> 
      <script type="text/javascript" src="js/script.js"></script> 
   </head>
   <body>
      <div class="container">
         <h1><strong>Fra CV til PDF!</strong></h1>
         <form action='' method='post'>
            <div class="row">
               <div class="col-sm-3">
                  <div class="row form-group">
                     <fieldset>
                        <legend>Personlig info</legend>
                        <table>
                           <tbody>
                              <tr>
                                 <p>
                                 <td> 
                                    <label>Navn</label><br><input type='text' name='navn' value='Ola Nordmann'>
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Epost</label><br><input type='email' name='epost' value='Loremipsum@lorem.com'>  
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Telefon</label><br><input type='tel' name='telefon' value='43444343' maxlength="8">  
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Adresse</label><br><input type='text' name='adresse' value='demoveien 1, 5239 Rådal'>  
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>LinkedIn</label><br><input type='url' name='linkedin' value='https://www.linkedin.com/in/kalliainen/'>  
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Fødselsdato</label><br><input type='date' name='fodselsdato' value='1996-01-01'>  
                                 </td>
                                 </p>
                              </tr>
                           </tbody>
                        </table>
                     </fieldset>
                  </div>
                  <div class="row form-group">
                     <fieldset>
                        <legend>Annet</legend>
                        <p> 
                           <input type="button" class="btn btn-primary" value="Legg til annet" onClick="addRow('annetTable')" /> 
                           <input type="button" class="btn btn-primary" value="Fjern annet" onClick="deleteRow('annetTable')"  /> 
                        <p>(Marker en boks for å slette.)</p>
                        </p>
                        <table id="annetTable">
                           <tbody>
                              <tr>
                                 <p>
                                 <td><input type="checkbox" name="chk[]"  /></td>
                                 <td>
                                    <label>Type</label><br>
                                    <input type="text" name="tab_annet_type[]"> 
                                 </td>
                                 <td>
                                    <label>Info</label><br>
                                    <input type="text" name="tab_annet_info[]">
                                 </td>
                                 </p>
                              </tr>
                           </tbody>
                        </table>
                     </fieldset>
                  </div>
                  <div class="row form-group">
                     <fieldset>
                        <legend>Interesser</legend>
                        <table id="interesserTable">
                           <tbody>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Interesser</label><br>
                                    <input type="text" name="interesser_info"> 
                                 </td>
                                 </p>
                              </tr>
                           </tbody>
                        </table>
                     </fieldset>
                  </div>
               </div>
               <div class="col-sm-1">
               </div>
               <div class="col-sm-3">
                  <div class="row form-group">
                     <fieldset>
                        <legend>Utdanning</legend>
                        <p> 
                           <input type="button" class="btn btn-primary" value="Legg til utdanning" onClick="addRow('utdanningTable')" /> 
                           <input type="button" class="btn btn-primary" value="Fjern utdanning" onClick="deleteRow('utdanningTable')"  /> 
                        <p>(Marker en boks for å slette.)</p>
                        </p>
                        <table id="utdanningTable">
                           <tbody>
                              <tr>
                                 <p>
                                 <td><input type="checkbox" name="chk[]"  /><br><br></td>
                                 <td>
                                    <label>Utdanningssted</label><br><input type="text" name="tab_utdanning_sted[]">
                                 </td>
                                 <td>
                                    <label>Info om utdanning</label><br><input type='text' name="tab_utdanning_info[]">
                                 </td>
                                 <td>
                                    <label>Fra</label><br><input type='date' name="tab_utdanning_start[]">
                                 </td>
                                 <td>
                                    <label>Til</label><br><input type='date' name="tab_utdanning_slutt[]">
                                 </td>
                                 </p>
                              </tr>
                           </tbody>
                        </table>
                     </fieldset>
                  </div>
                  <div class="row form-group">
                     <fieldset>
                        <legend>Erfaring</legend>
                        <p> 
                           <input type="button" class="btn btn-primary" value="Legg til arbeidssted" onClick="addRow('erfaringTable')" /> 
                           <input type="button" class="btn btn-primary" value="Fjern arbeidssted" onClick="deleteRow('erfaringTable')"  /> 
                        <p>(Marker en boks for å slette.)</p>
                        </p>
                        <table id="erfaringTable">
                           <tbody>
                              <tr>
                                 <p>
                                 <td><input type="checkbox" name="chk[]"/></td>
                                 <td>
                                    <label>Firma</label><br><input type="text" name="tab_erfaring_firma[]">
                                 </td>
                                 <td>
                                    <label>Type</label><br>
                                    <select name="tab_erfaring_stilling">
                                       <option value="">----
                                       </option>
                                       <option value="Deltid">Deltid
                                       </option>
                                       <option value="Heltid">Heltid
                                       </option>
                                    </select>
                                 </td>
                                 <td>
                                    <label>Info om stilling</label><br><input type='text' name="tab_erfaring_info[]">
                                 </td>
                                 <td>
                                    <label>Sted</label><br><input type='text' name="tab_erfaring_adresse[]">
                                 </td>
                                 <td>
                                    <label>Fra</label><br><input type='date' name="tab_erfaring_start[]">
                                 </td>
                                 <td>
                                    <label>Til</label><br><input type='date' name="tab_erfaring_slutt[]">
                                 </td>
                                 </p>
                              </tr>
                           </tbody>
                        </table>
                     </fieldset>
                  </div>
                  <div class="row">
                     <fieldset>
                        <legend>Referanser</legend>
                        <p> 
                           <input type="button" class="btn btn-primary" value="Legg til referanse" onClick="addRow('referanseTable')" /> 
                           <input type="button" class="btn btn-primary" value="Fjern referanse" onClick="deleteRow('referanseTable')"  /> 
                        <p>(Marker en boks for å slette.)</p>
                        </p>
                        <table id="referanseTable">
                           <tbody>
                              <tr>
                                 <td><input type="checkbox" name="chk[]"  /></td>
                                 <p>
                                 <td>
                                    <label>Navn</label><br>
                                    <input type="text" name="tab_referanse_navn[]"> 
                                 </td>
                                 <td>
                                    <label>Firma</label><br>
                                    <input type="text" name="tab_referanse_firma[]">
                                 </td>
                                 <td>
                                    <label>Stilling</label><br>
                                    <input type="text" name="tab_referanse_stilling[]"> 
                                 </td>
                                 <td>
                                    <label>Telefon</label><br>
                                    <input type="text" name="tab_referanse_nummer[]" size="8"> 
                                 </td>
                                 <td>
                                    <label>Epost</label><br>
                                    <input type="text" name="tab_referanse_epost[]"> 
                                 </td>
                                 </p>
                              </tr>
                           </tbody>
                        </table>
                     </fieldset>
                  </div>
               </div>
            </div>
            <div class="row">
               <p><br><input class="btn btn-danger" type='submit' name='submit' value='Lag PDF!'></p>
            </div>
         </form>
      </div>
   </body>
</html>
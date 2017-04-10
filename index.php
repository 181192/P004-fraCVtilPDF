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
   
       // Skjekke om adresse er ført inn
       if($adresse ==''){
           $error[] = 'Vennligst oppgi adresse';
       }
   
       // Skjekke om telefonnummer er ført inn
       if($telefon == ''){
            $error[] = 'Vennligst oppgi telefonnummer';
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
   include('dokument.php');
   $body = ob_get_clean();
   
   $body = iconv("UTF-8","UTF-8//IGNORE",$body);
   
   $path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
   require_once $path . '/vendor/autoload.php';
   $mpdf = new \Mpdf\Mpdf(["mode -> 'c'"]);
   
   
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

      <!-- Bootstrap Core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom Fonts -->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      <!-- Datetimepicker css -->
      <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-datepicker.css">

      <!-- Min css for footer og main -->
      <link rel="stylesheet" type="text/css" href="css/footer.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
   </head>
   <body>
      <header>
        <?php include('../module/headermenu.php');?>
         <div class="container text-left" style="margin-top: 50px;">
            <h1><strong>Fra CV til PDF!</strong></h1>
            <p>Før inn all informasjon du måtte ønske til din CV, og trykk <strong>generer min CV!</strong> for å få en perfekt formatert CV</p>
         </div>
      </header>
      <div class="container">
         <form action='' method='post'>
            <div class="row">
               <div class="col-md-3">
                  <div class="row form-group">
                     <fieldset>
                        <legend>Personlig info</legend>
                        <table>
                           <tbody>
                              <tr>
                                 <p>
                                 <td> 
                                    <label>Navn</label><br><input class="form-control" type='text' name='navn' placeholder="Navn" required>
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Epost</label><br><input class="form-control" type='email' name='epost' placeholder="Epost" required>  
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Telefon</label><br><input class="form-control" type='tel' name='telefon' maxlength="8" placeholder="Telefon" required>  
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Adresse</label><br><input class="form-control" type='text' name='adresse' placeholder="Adresse" required>  
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>LinkedIn</label><br><input class="form-control" type='url' name='linkedin' placeholder='LinkedIn' required>  
                                 </td>
                                 </p>
                              </tr>
                              <tr>
                                 <p>
                                 <td>
                                    <label>Fødselsdato</label><br><input class="form-control" type='text' name='fodselsdato' id="fodselsdato" placeholder="Fødselsdato" required>  
                                 </td>
                                 </p>
                              </tr>
                           </tbody>
                        </table>
                     </fieldset>
                  </div>
                  <div class="row form-group">
                     <div class = "col-lg">
                        <fieldset>
                           <legend>Interesser</legend>
                           <table id="interesserTable">
                              <tbody>
                                 <tr>
                                    <p>
                                    <td>                               
                                       <textarea class="form-control" type="text" name="interesser_info" rows="6" cols="35" placeholder="Mine interesser er..."></textarea> 
                                    </td>
                                    </p>
                                 </tr>
                              </tbody>
                           </table>
                        </fieldset>
                     </div>
                  </div>
               </div>
               <div class="col-md-1">
               </div>
               <div class="col-md-8">
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
                                 <td><input type="checkbox" name="chk[]"/><br><br></td>
                                 <td>
                                    <label>Utdanningssted</label><br><input class="form-control" type="text" name="tab_utdanning_sted[]" placeholder="Utdanningssted">
                                 </td>
                                 <td>
                                    <label>Info om utdanning</label><br><input class="form-control" type='text' name="tab_utdanning_info[]" placeholder="Info om utdanning">
                                 </td>
                                 <td>
                                    <label>Fra</label><br><input class="form-control datepicker" type='text' name="tab_utdanning_start[]" placeholder="Fra">
                                 </td>
                                 <td>
                                    <label>Til</label><br><input class="form-control datepicker" type='text' name="tab_utdanning_slutt[]" placeholder="Til">
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
                                    <label>Firma</label><br><input class="form-control" type="text" name="tab_erfaring_firma[]" placeholder="Firma">
                                 </td>
                                 <td>
                                    <label>Type</label><br>
                                    <select class="form-control" name="tab_erfaring_stilling[]">
                                       <option value="">----
                                       </option>
                                       <option value="Deltid">Deltid
                                       </option>
                                       <option value="Heltid">Heltid
                                       </option>
                                    </select>
                                 </td>
                                 <td>
                                    <label>Info om stilling</label><br><input class="form-control" type='text' name="tab_erfaring_info[]" placeholder="Info om stilling">
                                 </td>
                                 <td>
                                    <label>Sted</label><br><input class="form-control" type='text' name="tab_erfaring_adresse[]" placeholder="Sted">
                                 </td>
                                 <td>
                                    <label>Fra</label><br><input class="form-control datepicker" type='text' name="tab_erfaring_start[]" placeholder="Fra">
                                 </td>
                                 <td>
                                    <label>Til</label><br><input class="form-control datepicker" type='text' name="tab_erfaring_slutt[]" placeholder="Til">
                                 </td>
                                 </p>
                              </tr>
                           </tbody>
                        </table>
                     </fieldset>
                  </div>
                  <div class="row form-group">
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
                                    <input class="form-control" type="text" name="tab_referanse_navn[]" placeholder="Navn"> 
                                 </td>
                                 <td>
                                    <label>Firma</label><br>
                                    <input class="form-control" type="text" name="tab_referanse_firma[]" placeholder="Firma">
                                 </td>
                                 <td>
                                    <label>Stilling</label><br>
                                    <input class="form-control" type="text" name="tab_referanse_stilling[]" placeholder="Stilling"> 
                                 </td>
                                 <td>
                                    <label>Telefon</label><br>
                                    <input class="form-control" type="tel" name="tab_referanse_nummer[]" maxlength="8" placeholder="Telefon"> 
                                 </td>
                                 <td>
                                    <label>Epost</label><br>
                                    <input class="form-control" type="text" name="tab_referanse_epost[]" placeholder="Epost"> 
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
                                    <input class="form-control" type="text" name="tab_annet_type[]" placeholder="Type"> 
                                 </td>
                                 <td>
                                    <label>Info</label><br>
                                    <input class="form-control" type="text" name="tab_annet_info[]" placeholder="Info">
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
           	   <div class="col-md-4">
                  <p><input class="btn-lg btn-danger" type='submit' name='submit' value='Generer min CV!'></p>
               </div>
            </div>
         </form>
      </div>
      <?php include("footer.php") ?>
      
      <!-- jQuery -->
      <script src="vendor/jquery/jquery.min.js"></script>

      <!-- Theme JavaScript -->
      <script src="js/clean-blog.min.js"></script>

      <!-- Datetimepicker js -->
      <script src="dist/js/bootstrap-datepicker.js"></script>
      <script src="dist/js/bootstrap-datepicker.min.js"></script>
      <script src="dist/locales/bootstrap-datepicker.nb.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

      <!-- Mitt skript, for sletting av rader, og datepicker -->
      <script type="text/javascript" src="js/script.js"></script>
      <script type="text/javascript" src="js/datepicker.js"></script>
   </body>
</html>
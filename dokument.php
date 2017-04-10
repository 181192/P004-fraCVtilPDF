<!doctype html>
<html lang="no">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title><?php echo $navn;?></title>
      <!-- Bootstrap Core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="css/dokument.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="container">
         <!-- rad for tittel -->
         <div class="row">
            <div class="col-md-offset-2 col-md-8 text-center">
               <h1><strong><?php echo $navn;?></strong></h1>
            </div>
         </div>
         <!-- rad for pers info -->
         <div class="row">
            <div class="col-md-offset-4 col-md-4 text-center">
            <p>
               <div class="row">
                  <?php echo $adresse;?>
               </div>
               <div class="row">
                  <?php echo $telefon;?> | <a href=""><?php echo $epost;?></a>
               </div>
               <div class="row">
                  <a href="<?php echo $linkedin?>"><?php echo $linkedin?></a>
               </div>
               <div>
                  Født: <?php echo $fodselsdato?>
               </div>
               </p>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <h2><strong>Utdanning</strong></h2>
            </div>
         </div>
         <div class="row">
         <div class="col-md-12 text-right">
            <table id="utdanningTable">
               <tbody>
                  <?php foreach($tab_utdanning_sted as $a => $b){?>
                  <tr>
                     <td class="column-top-right">
                        <p><b><strong><?php echo date('M. Y', strtotime($tab_utdanning_start[$a]))?> - <?php echo date('M. Y', strtotime($tab_utdanning_slutt[$a]))?></strong></b></p>
                     </td>
                     <td width="446">
                        <p><strong><?php echo $tab_utdanning_sted[$a]?></strong></p>
                     </td>
                  <tr>
                     <td class="column-top-right">
                        <p><strong>&nbsp;</strong></p>
                     </td>
                     <td width="446">
                        <p><?php echo $tab_utdanning_info[$a]?></p>
                     </td>
                  </tr>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <h2><strong>Erfaring</strong></h2>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 text-right">
               <table id="erfaringTable">
                  <tbody>
                     <?php foreach($tab_erfaring_firma as $a => $b){?>
                     <tr>
                        <td class="column-top-right">
                           <p><strong><?php echo date('M. Y', strtotime($tab_erfaring_start[$a]))?> - <?php echo date('M. Y', strtotime($tab_erfaring_slutt[$a]))?></strong></p>
                        </td>
                        <td width="340">
                           <p><strong><?php echo $tab_erfaring_stilling[$a]?>, <?php echo $tab_erfaring_firma[$a]?></strong></p>
                        </td>
                        <td width="111">
                           <p><?php echo $tab_erfaring_adresse[$a]?></p>
                        </td>
                     <tr>
                        <td class="column-top-right">
                           <p><strong>&nbsp;</strong></p>
                        </td>
                        <td width="340">
                           <p><?php echo $tab_erfaring_info[$a]?></p>
                        </td>
                        <td width="111">
                           <p>&nbsp;</p>
                        </td>
                     </tr>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <h2><strong>Annet</strong></h2>
            </div>
         </div>
         <div class="row">
         <div class="col-md-12">
            <table id="annetTable">
               <tbody>
                  <?php foreach($tab_annet_type as $a => $b){?>
                  <tr>
                     <td class="column-top-right">
                        <p><strong><?php echo $tab_annet_type[$a]?></strong></p>
                     </td>
                     <td width="446">
                        <p><?php echo $tab_annet_info[$a]?></p>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <h2><strong>Interesser</strong></h2>
            </div>
         </div>
         <div class="row">
         <div class="col-md-12">
            <table id = "interesserTable">
               <tbody>
                  <tr>
                     <td class="column-top-right">
                        <p><strong>Interesser</strong></p>
                     </td>
                     <td width="447">
                        <p><?php echo $interesser_info ?></p>
                     </td>
                  </tr>
               </tbody>
            </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <h2><strong>Referanser</strong></h2>
            </div>
         </div>
         <div class="row">
         <div class="col-md-12">
            <table id= "referanseTable">
               <tbody>
                  <?php foreach($tab_referanse_navn as $a => $b){?>
                  <tr>
                     <td>
                        <p><?php echo $tab_referanse_navn[$a]?>, <?php echo $tab_referanse_firma[$a]?>, <?php echo $tab_referanse_stilling[$a]?>, <?php echo $tab_referanse_nummer[$a]?>, <?php echo $tab_referanse_epost[$a]?></p>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
            </div>
         </div>
      </div>
   </body>
</html>
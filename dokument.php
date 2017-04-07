<h1 style="text-align: center;"><strong><?php echo $navn;?></strong></h1>
<p style="text-align: center;"><?php echo $adresse;?></p>
<p style="text-align: center;">
   <?php echo $telefon;?> | <a href=""><?php echo $epost;?></a>
</p>
<p style="text-align: center;"><a href="<?php echo $linkedin?>"></a><?php echo $linkedin?></p>
<p style="text-align: center;">f&oslash;dt: <?php echo $fodselsdato?></p>
<p style="text-align: center;"><strong>&nbsp;</strong></p>
<p style="text-align: center;"><strong><h2>Utdanning</h2></strong></p>
<table id="utdanningTable" style="margin-left: auto; margin-right: auto;">
   <tbody>
      <?php foreach($tab_utdanning_sted as $a => $b){?>
      <tr>
         <td width="168">
            <p><b><strong><?php echo date('j. M Y', strtotime($tab_utdanning_start[$a]))?> - <?php echo date('j. M Y', strtotime($tab_utdanning_slutt[$a]))?></strong></b></p>
         </td>
         <td width="446">
            <p><strong><?php echo $tab_utdanning_sted[$a]?></strong></p>
         </td>
      <tr>
         <td width="168">
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
<p style="text-align: center;"><strong>&nbsp; </strong></p>
<p style="text-align: center;"><strong><h2>Erfaring</h2></strong></p>
<table id="erfaringTable" style="margin-left: auto; margin-right: auto;">
   <tbody>
      <?php foreach($tab_erfaring_firma as $a => $b){?>
      <tr>
         <td width="168">
            <p><strong><?php echo date('j. M Y', strtotime($tab_erfaring_start[$a]))?> - <?php echo date('j. M Y', strtotime($tab_erfaring_slutt[$a]))?></strong></p>
         </td>
         <td width="340">
            <p><strong><?php echo $tab_erfaring_stilling[$a]?>, <?php echo $tab_erfaring_firma[$a]?></strong></p>
         </td>
         <td width="111">
            <p><?php echo $tab_erfaring_adresse[$a]?></p>
         </td>
      <tr>
         <td width="168">
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
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;"><strong><h2>Annet</h2></strong></p>
<table id="annetTable" style="margin-left: auto; margin-right: auto;">
   <tbody>
 		<?php foreach($tab_annet_type as $a => $b){?>
   		<tr>
   			<td width="168">
   				<p><strong><?php echo $tab_annet_type[$a]?></strong></p>
   			</td>
   			<td width="446">
   				<p><?php echo $tab_annet_info[$a]?></p>
   			</td>
   		</tr>
   		<?php } ?>
   </tbody>
</table>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;"><strong><h2>Interesser</h2></strong></p>
<table id = "interesserTable" style="margin-left: auto; margin-right: auto;">
   <tbody>
   	<tr>
   		<td width="168">
            <p><strong>Interesser</strong></p>
         </td>
         <td width="447">
   			<p><?php echo $interesser_info ?></p>
   		</td>
   	</tr>
   </tbody>
</table>
<p style="text-align: center;"><strong>&nbsp;</strong></p>
<p style="text-align: center;"><strong><h2>Referanser</h2></strong></p>
<table id= "referanseTable" style="margin-left: auto; margin-right: auto;">
   <tbody>
    <?php foreach($tab_referanse_navn as $a => $b){?>
   		<tr>
   			<td>
   				<p><?php echo $tab_referanse_navn[$a]?></p>
   			</td>
   		</tr>
   		<tr>
   			<td>
   				<p><?php echo $tab_referanse_firma[$a]?></p>
   			</td>
   		</tr>
   		<tr>
   			<td>
   				<p><?php echo $tab_referanse_stilling[$a]?></p>
   			</td>
   		</tr>
   		<tr>
   			<td>
   				<p><?php echo $tab_referanse_nummer[$a]?></p>
   			</td>
   		</tr>
   		<tr>
   			<td>
   				<p><?php echo $tab_referanse_epost[$a]?></p>
   			</td>
   		</tr>
   		<?php } ?>
   </tbody>
</table>
<p style="text-align: center;"><strong>&nbsp;</strong></p>
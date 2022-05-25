<style type="text/css">
	@import url("css/hello.css");
</style>

<head>
<title>Equipes</title>
</head>

<table>
	<tr>
		<th colspan="5">GESTION DES EQUIPES</th>
	</tr>
	<tr>
		<td><B>Sélectionner</B></td>
		<td><B>Numéro de l'équipe</B></td>
		<td><B>Nom de l'équipe</B></td>
		<td><B>Nom du club</B></td>
		<td><B>Nom du Championnat</B></td>
	</tr>
	<form action="./?action=equipes" method="POST" OnSubmit="return verif()">
		<?php foreach ($Equipe as $UneEquipe) { ?>
			<tr>
				<td><input value="<?php echo $UneEquipe->num_equipe; ?>" name="equipe" type="radio"></td>
				<td><?php echo $UneEquipe->num_equipe; ?> </td>
				<td><?php echo $UneEquipe->nom_equipe; ?></td>
				<td><?php echo $UneEquipe->nom_club; ?></td>
				<td><?php echo $UneEquipe->nom_championnat; ?></td>
			</tr>
		<?php }
		?>
</table>

</br>
<input type="submit" name="valider" value="AJOUTER" /></br>
<input type="submit" name="modif" value="MODIFIER" /></br>
<input type="submit" name="supprimer" value="SUPPRIMER" /></br>

<div class="container">
	<input type="hidden" name="numEquipe" value="<?php if (isset($afficher)) {
														echo $afficher['num_equipe'];
													} else { ?> <?php } ?>">

	<label name="nomequipe">{Nom d'Equipe :</label>
	<input type="text" name="txtNomEquipe" value="<?php if (isset($afficher)) {
														echo $afficher['nom_equipe'];
													} else { ?> <?php } ?>"></br>

	<label name="nomclub">{Nom du Club :</label>
	<select id="liste" name="listeclub">
		<option value="<?php if (isset($afficher)) {
							echo $afficher['num_club']; ?>"><?php echo $afficher['nom_club'];
																					} else { ?><?php } ?></option>
		<?php foreach ($Club as $UnClub) { ?>
			<option value="<?php echo $UnClub->num_club; ?>"><?php echo $UnClub->nom_club; ?></option>
		<?php } ?>
	</select>

	<label name="nomchampionnat" name="nomchampionnat">{Nom du Championnat :</label>
	<select id="listechamp" name="listechamp">
		<option value="<?php if (isset($afficher)) {
							echo $afficher['num_championnat']; ?>"><?php echo $afficher['nom_championnat'];
																						} else { ?><?php } ?></option>
		<?php foreach ($Championnat as $UnChampionnat) { ?>
			<option value="<?php echo $UnChampionnat->num_championnat; ?>"><?php echo $UnChampionnat->nom_championnat; ?></option>
		<?php } ?>
	</select></br>

	<input type="submit" name="modifier" value="Afficher la sélection" /></br>
</div>
</form>
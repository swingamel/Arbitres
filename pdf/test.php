<?php

require("fpdf/fpdf.php");

// Création de la class PDF
class PDF extends FPDF {
	// Header
	function Header() {
		// Logo : 8 >position à gauche du document (en mm), 2 >position en haut du document, 80 >largeur de l'image en mm). La hauteur est calculée automatiquement.
		// Saut de ligne 20 mm
		
		$this->Ln(20);

		// Titre gras (B) police Helbetica de 11
		$this->SetFont('Helvetica','B',20);
		// fond de couleur gris (valeurs en RGB)
		$this->setFillColor(230,230,230);
 		// position du coin supérieur gauche par rapport à la marge gauche (mm)
		$this->SetX(45);
		// Texte : 60 >largeur ligne, 8 >hauteur ligne. Premier 0 >pas de bordure, 1 >retour à la ligneensuite, C >centrer texte, 1> couleur de fond ok	
		$this->Cell(120,20,'LISTE DES ARBITRES',0,1,'C',1);
		// Saut de ligne 10 mm
		$this->Ln(10);
	}
}
// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new PDF('P','mm','A4');

// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
// Polices par défaut : Helvetica taille 9
$pdf->SetFont('Helvetica','',9);
// Couleur par défaut : noir
$pdf->SetTextColor(0);
// Compteur de pages {nb}
$pdf->AliasNbPages();


// Fonction en-tête des tableaux en 3 colonnes de largeurs variables
function entete_table($position_entete) {
	global $pdf;
	$pdf->SetDrawColor(183); // Couleur du fond RVB
	$pdf->SetFillColor(221); // Couleur des filets RVB
	$pdf->SetTextColor(0); // Couleur du texte noir
	$pdf->SetY($position_entete);

    $pdf->SetX(5);
    $pdf->Cell(60,8,utf8_decode('État civil'),1,0,'C',1);

    $pdf->SetX(65); 
    $pdf->Cell(70,8,'Adresse',1,0,'C',1);

    $pdf->SetX(125); 
    $pdf->Cell(25,8,utf8_decode('Téléphone'),1,0,'C',1);
  
    $pdf->SetX(150); 
    $pdf->Cell(30,8,'Mail',1,0,'C',1);
  
    $pdf->SetX(180); 
    $pdf->Cell(25,8,'Nom du club',1,0,'C',1);

	$pdf->Ln(); // Retour à la ligne
}
// AFFICHAGE EN-TÊTE DU TABLEAU
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (60 mm)
$position_entete = 70;
// police des caractères
$pdf->SetFont('Helvetica','',9);
$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau
entete_table($position_entete);
$position_detail = 78; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8)
foreach ($Arbitre as $UnArbitre) {
	// position abcisse de la colonne 1 (10mm du bord)
	$pdf->SetY($position_detail);
	$pdf->SetX(5);
	$pdf->MultiCell(20,8, utf8_decode ($UnArbitre->nom_arbitre), 1,'C');

    $pdf->SetY($position_detail);
	$pdf->SetX(25);
	$pdf->MultiCell(20,8, utf8_decode($UnArbitre->prenom_arbitre), 1,'C');

    $pdf->SetY($position_detail);
	$pdf->SetX(45);
	$pdf->MultiCell(20,8,$UnArbitre->date_naiss_arbitre, 1,'C');

    // position abcisse de la colonne 2 (70 = 10 + 60)	
	$pdf->SetY($position_detail);
	$pdf->SetX(65);
	$pdf->MultiCell(20,8, utf8_decode ($UnArbitre->adresse_arbitre),1,'C');

    $pdf->SetY($position_detail);
	$pdf->SetX(85);
	$pdf->MultiCell(20,8, utf8_decode ($UnArbitre->ville_arbitre),1,'C');

    $pdf->SetY($position_detail);
	$pdf->SetX(105);
	$pdf->MultiCell(20,8,$UnArbitre->CP_arbitre,1,'C');

    $pdf->SetY($position_detail);
	$pdf->SetX(125);
	$pdf->MultiCell(25,8,$UnArbitre->tel_port_arbitre,1,'C');

    $pdf->SetY($position_detail);
	$pdf->SetX(150);
	$pdf->MultiCell(30,8,utf8_decode ($UnArbitre->mailU),1,'C');

    $pdf->SetY($position_detail);
	$pdf->SetX(180);
	$pdf->MultiCell(25,8,$UnArbitre->nom_club,1,'C');

	// on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)	
	$position_detail += 8; 
}

$pdf->Output('test.pdf','I'); // affichage à l'écran
// Ou export sur le serveur
// $pdf->Output('F', '../test.pdf');
?>

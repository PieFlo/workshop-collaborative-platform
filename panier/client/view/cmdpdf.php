<?php

use Spipu\Html2Pdf\Html2Pdf;

// get the HTML
ob_start();
// Insertion du CSS
?>
<page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm" footer="page;">

    <page_footer>
        <hr />
        <p>Fait à Montpellier, le <?php echo date("d/m/y"); ?></p>
        <p>Signature du particulier, suivie de la mension manuscrite "bon pour accord".</p>
        <p>&nbsp;</p>
    </page_footer>

    <p>Date de la commande : <?= $date->format("d/m/Y");?></p>
    <table style="vertical-align: top;">
        <thead>
        <tr>
            <th>Libelle</th>
            <th>Quantité</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($commandeDetails) {
            foreach ($commandeDetails as $comandeDetail) {
                echo '<tr><td>' .  $comandeDetail->libelle . '</td><td>' . $comandeDetail->quantity . '</td></tr>';
            }
        }
        else {
            echo "<tr><td colspan='2'>Aucun résultat</td></tr>";
        }
        ?>
        </tbody>
    </table>

</page>

<?php

$content = ob_get_clean();

try {
    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('facture_n' . $idCmd . '.pdf');
} catch (HTML2PDF_exception $e) {
    die($e);
}
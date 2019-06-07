<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Dutch.json"></script>
<div class="tableContainer">
    <table id="dataTable" style="display:none;">
        <thead>
        <tr>
            <td>Gebruikersnaam</td>
            <td>email</td>
            <td>Voornaam</td>
            <td>Achternaam</td>
            <td>Adresregel 1</td>
            <td>Postcode</td>
            <td>Plaatsnaam</td>
            <td>Account status</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($this->vars['gebruikers'] as $value) { ?>
            <tr height="50">
                <td><?= $value['gebruikersnaam']; ?></td>
                <td><?= $value['mailbox']; ?></td>
                <td><?= $value['voornaam']; ?></td>
                <td><?= $value['tussenvoegsel'] . $value['achternaam']; ?></td>
                <td><?= $value['adresregel_1']; ?></td>
                <td><?= $value['postcode']; ?></td>
                <td><?= $value['plaatsnaam']; ?></td>
                <td><?= ($value['isGeblokkeerd'] ?"Geblokkeerd" :"Niet geblokkeerd"); ?></td>
                <td><a class="uk-text-primary" href="<?= SITEURL . "beheer/blokkeer_gebruiker/?gebruiker=" . $value['gebruikersnaam'] . "&status=" . $value['isGeblokkeerd']; ?>"><?= ($value['isGeblokkeerd'] ?"Deblokkeer" :"Blokkeer"); ?></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').show();
        $('#dataTable').DataTable( {
            "language": {
                "sProcessing": "Bezig...",
                "sLengthMenu": "_MENU_ resultaten weergeven",
                "sZeroRecords": "Geen resultaten gevonden",
                "sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
                "sInfoEmpty": "Geen resultaten om weer te geven",
                "sInfoFiltered": " (gefilterd uit _MAX_ resultaten)",
                "sInfoPostFix": "",
                "sSearch": "",
                "searchPlaceholder": "Zoeken...",
                "sEmptyTable": "Geen resultaten aanwezig in de tabel",
                "sInfoThousands": ".",
                "sLoadingRecords": "Een moment geduld aub - bezig met laden...",
                "oPaginate": {
                    "sFirst": "Eerste",
                    "sLast": "Laatste",
                    "sNext": "Volgende",
                    "sPrevious": "Vorige"
                },
                "oAria": {
                    "sSortAscending": ": activeer om kolom oplopend te sorteren",
                    "sSortDescending": ": activeer om kolom aflopend te sorteren"
                }
            }
        } );
    } );
</script>

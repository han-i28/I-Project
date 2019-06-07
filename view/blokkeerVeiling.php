<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<div class="tableContainer">
    <table id="dataTable" style="display:none;">
        <thead>
        <tr>
            <td>Voorwerpnummer</td>
            <td>Starttijd</td>
            <td>Verkoper</td>
            <td>Status</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($this->vars['veilingen'] as $value) { ?>
            <tr height="50">
                <td><a href="<?= SITEURL."veiling/weergave/?veiling=".$value['voorwerpnummer']; ?>"><?= $value['voorwerpnummer']; ?></a></td>
                <td><?= $value['looptijdbegin']; ?></td>
                <td><?= $value['verkoper']; ?></td>
                <td><?= ($value['veilingGesloten'] ?"Geblokkeerd" :"Niet geblokkeerd"); ?></td>
                <td><?= ($value['veilingGesloten'] ?"Geblokkeerd" :"<a class='uk-text-primary' href='" . SITEURL . "beheer/blokkeer_veiling/?veiling=" . $value['voorwerpnummer'] . "'>Blokkeer</a>"); ?></td>
                <!--            <a class=\"uk-text-primary\" href=\"" . SITEURL . "beheer/blokkeer_veiling/?veiling=" . $value['voorwerpnummer'] . ">Blokkeer</a>-->
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

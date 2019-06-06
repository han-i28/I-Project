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
                    <td><?= $value['voorwerpnummer']; ?></td>
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
        <!--
            Next script is from: https://datatables.net/
            It loads in the table shown on the webpage.
            It works like $(SELECTOR).FUNCTION();
            For all function go to: https://datatables.net/reference/index 
        -->
    <script>
        $(document).ready(function() {
            $('#dataTable').show();
            $('#dataTable').DataTable();
        } );
    </script>

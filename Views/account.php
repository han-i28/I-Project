<?php
	 $accountInformation = $this->vars['accountInfo'];
	 //print_r($accountInformation['gebruikersnaam']);
?>
<h1 class="uk-margin-top" style="margin-left: calc(50% - 160px);">Account informatie</h1></br></br>
<div class="uk-flex">
	<div style="width: 20%; margin-left: 2%;"> <!-- wellicht een menu met alle bijbehorende onderdelen zoals 'update account info' 'billing history' etc -->
		<ul class="uk-nav">
			<li class="uk-parent">
				<ul class="uk-nav-sub">
					<li>
						<a href="account">Account informatie</a>
						<a href="password_change">Wachtwoord veranderen</a>
						<a href="billing_history">Geschiedenis</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<hr class="uk-divider-vertical" style="margin-top: -1%; height: 130px;">
	<div style="width: 70%; margin-left: 8%;"><!-- losse account informatie -->
		<p>Gebruikersnaam: <?php echo $accountInformation['gebruikersnaam']; ?></br></p>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<?php if(!empty($accountInformation['tussenvoegsel'])) {
			echo '<p>Naam: ' . $accountInformation['voornaam'] . ' ' . $accountInformation['tussenvoegsel'] . ' ' . $accountInformation['achternaam'] . '</br></p><hr style="margin-left: -5%; margin-right: 10%;">';
		} else {
			echo '<p>Naam: ' . $accountInformation['voornaam'] . ' ' . $accountInformation['achternaam'] . '</br></p><hr style="margin-left: -5%; margin-right: 10%;">';
		}
		if(empty($accountInformation['adresregel_2'])) {
			?><p>Adres: <?php echo $accountInformation['adresregel_1']; ?></p><?php
		} else {
			?><p>Adressen: <li type="square"><?php echo $accountInformation['adresregel_1'] . '</li><li type="square">' . $accountInformation['adresregel_2'] . '</li></p>';
		}
		?>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<p>Postcode: <?php echo $accountInformation['postcode']; ?></br></p>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<p>Woonplaats: <?php echo $accountInformation['plaatsnaam']; ?></br></p>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<p>Geboortedatum: <?php echo $accountInformation['geboortedatum']; ?></br></p>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<p>Telefoonnummer: <?php echo $accountInformation['telefoon']; ?></br></p></br></br>
	</div>
</div>
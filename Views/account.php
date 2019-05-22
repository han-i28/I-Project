<?php
	 $accountInformation = $this->vars['accountInfo'];
	 //print_r($accountInformation['gebruikersnaam']);
?>
<h1 class="uk-margin-top" style="margin-left: calc(50% - 160px);">Account informatie</h1></br></br>
<div class="uk-flex">
	<div style="width: 20%; margin-left: 2%;"> <!-- wellicht een menu met alle bijbehorende onderdelen zoals 'update account info' 'billing history' etc -->
		<ul class="uk-nav">
			<li class="uk-parent">
				<a href=""></a>
				<ul class="uk-nav-sub">
					<li>
						<a href="">Account informatie</a>
						<a href="">Wachtwoord veranderen</a>
						<a href="">Geschiedenis</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<hr class="uk-divider-vertical">
	<div style="width: 70%; margin-left: 8%;"><!-- losse account informatie -->
		<p>Mijn gebruikersnaam: <?php echo $accountInformation['gebruikersnaam']; ?></br></p>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<?php if(!empty($accountInformation['tussenvoegsel'])) {
			echo '<p>Mijn naam: ' . $accountInformation['voornaam'] . ' ' . $accountInformation['tussenvoegsel'] . ' ' . $accountInformation['achternaam'] . '</br></p><hr style="margin-left: -5%; margin-right: 10%;">';
		} else {
			echo '<p>Mijn naam: ' . $accountInformation['voornaam'] . ' ' . $accountInformation['achternaam'] . '</br></p><hr style="margin-left: -5%; margin-right: 10%;">';
		}
		if(empty($accountInformation['adresregel_2'])) {
			?><p>Mijn adres: <?php echo $accountInformation['adresregel_1']; ?></p><?php
		} else {
			?><p>Mijn adressen: <li type="square"><?php echo $accountInformation['adresregel_1'] . '</li><li type="square">' . $accountInformation['adresregel_2'] . '</li></p>';
		}
		?>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<p>Mijn postcode: <?php echo $accountInformation['postcode']; ?></br></p>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<p>Mijn woonplaats: <?php echo $accountInformation['plaatsnaam']; ?></br></p>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<p>Mijn geboortedatum: <?php echo $accountInformation['geboortedatum']; ?></br></p>
		<hr style="margin-left: -5%; margin-right: 10%;">
		<p>Mijn telefoonnummer: <?php echo $accountInformation['telefoon']; ?></br></p>
	</div>
</div>
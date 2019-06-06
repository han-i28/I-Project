<div class="uk-card uk-card-default uk-card-body uk-position-fixed uk-width-1-5 uk-visible@s uk-text-capitalize">
    <h3>Rubrieken</h3>
    <ul uk-height-viewport="offset-top: true" class="uk-nav-default uk-nav-parent-icon uk-panel uk-panel-scrollable uk-height-viewport uk-overflow-auto uk-nav rubriekenboom" uk-nav="" style="min-height: calc(100vh - 184px);">
        <?php echo $this->vars['rubriekenHTML'] ?>
    </ul>
</div>

<?php 
	echo $this->vars['html'];
	if ($_SESSION['loggedIn'] == true) {
		$userVeilingen = $this->vars['userVeilingen'];
		$userBoden = $this->vars['userBoden'];
		if (!empty($userBoden)) {
			$userTitels = $this->vars['userBodenTitels'];
			$titelNummer = 0;
		}
	}
if (!empty($userVeilingen)) { ?>
	<div class="uk-position-right uk-card uk-card-default uk-card-title uk-width-1-5 uk-visible@s" style="margin-top: 50%;">
		<div class="uk-card-header">
			Uw veilingen
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav">
				<?php 
					foreach ($userVeilingen as $veilingen) { ?>
						<li class="persoonlijkeInfo"><?php echo "<a href='veiling/weergave/?veiling='" . $veilingen['voorwerpnummer'] . "'>" . $veilingen['titel'] . "</a>";?></li><?php
					}
				?>
			</ul>
		</div>
	</div>
<?php } elseif (empty($userveilingen)) { ?>
	<div class="uk-position-right uk-card uk-card-default uk-card-title uk-width-1-5 uk-visible@s" style="margin-top: 50%;">
		<div class="uk-card-header">
			Uw veilingen
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav">
				<li class="persoonlijkeInfo">U heeft geen open veilingen.</li>
			</ul>
		</div>
	</div>
<?php }
if (!empty($userBoden)) { ?>
	<div class="uk-position-right uk-card uk-card-default uk-card-title uk-width-1-5 uk-visible@s" style="margin-top: 10%; margin-bottom: 8%;">
		<div class="uk-card-header">
			Uw biedingen
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav">
				<?php 
					foreach ($userBoden as $boden) { ?>
						<li class="persoonlijkeInfo"><?php echo "<a href='veiling/weergave/?veiling=" . $boden['voorwerp'] . "'>" . $userTitels[$titelNummer] . "</a>" . number_format($boden['bod'], 2); ?></li></br>
						<?php $titelNummer++;
					}
				?>
			</ul>
		</div>
	</div>
<?php } elseif (empty($userBoden)) { ?>
	<div class="uk-position-right uk-card uk-card-default uk-card-title uk-width-1-5 uk-hidden@s" style="margin-top: 10%; margin-bottom: 8%;">
		<div class="uk-card-header">
			Uw Biedingen
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav">
				<li class="persoonlijkeInfo">U heeft geen boden gemaakt.</li>
			</ul>
		</div>
	</div>
<?php } 
//<div class="uk-grid uk-width-1-1 uk-hidden@s">
if (!empty($userVeilingen)) { ?>
	<div class="uk-position-bottom-right uk-card uk-card-default uk-card-title uk-width-1-5 uk-hidden@s">
		<div class="uk-card-header">
			Uw veilingen
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav">
				<?php 
					foreach ($userVeilingen as $veilingen) { ?>
						<li class="persoonlijkeInfo"><?php echo "<a href='veiling/weergave/?veiling='" . $veilingen['voorwerpnummer'] . "'>" . $veilingen['titel'] . "</a>";?></li><?php
					}
				?>
			</ul>
		</div>
	</div>
<?php } else { ?>
	<div class="uk-position-bottom-right uk-card uk-card-default uk-card-title uk-width-1-5 uk-hidden@s">
		<div class="uk-card-header">
			Uw veilingen
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav">
				<li class="persoonlijkeInfo">U heeft geen open veilingen.</li>
			</ul>
		</div>
	</div>
<?php }
if (!empty($userBoden)) { ?>
	<div class="uk-position-center-right uk-card uk-card-default uk-card-title uk-width-1-5 uk-hidden@s">
		<div class="uk-card-header">
			Uw biedingen
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav">
				<?php 
					foreach ($userBoden as $boden) { ?>
						<li class="persoonlijkeInfo"><?php echo "<a href='veiling/weergave/?veiling=" . $boden['voorwerp'] . "'>" . $userTitels[$titelNummer] . "</a>" . number_format($boden['bod'], 2); ?></li></br>
						<?php $titelNummer++;
					}
				?>
			</ul>
		</div>
	</div>
<?php } else { ?>
	<div class="uk-position-center-right uk-card uk-card-default uk-card-title uk-width-1-5 uk-visible@s">
		<div class="uk-card-header">
			Uw Biedingen
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav">
				<li class="persoonlijkeInfo">U heeft geen boden gemaakt.</li>
			</ul>
		</div>
	</div>
<?php } ?>
<!--</div>-->
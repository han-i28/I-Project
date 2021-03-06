USE iproject28
GO

CREATE TABLE voorwerp(
	voorwerpnummer BIGINT NOT NULL,
	titel VARCHAR(100) NOT NULL,
	beschrijving VARCHAR(max) NOT NULL,
	startprijs NUMERIC(19, 7) NOT NULL,
	betalingswijze VARCHAR(50) NOT NULL,
	betalingsinstructie CHAR(25) NULL,
	postcode CHAR(6) NOT NULL,
	plaatsnaam VARCHAR(255) NOT NULL,
	GBA_CODE CHAR(4) NOT NULL,
	looptijdBegin DATETIME NOT NULL,
	verzendkosten NUMERIC(19, 7) NOT NULL, 
	verzendinstructies VARCHAR(50) NOT NULL,
	verkoper VARCHAR(20) NOT NULL,
	koper VARCHAR(20) NULL,
	looptijdEinde DATETIME NOT NULL,
	veilingGesloten BIT NOT NULL,
	verkoopprijs NUMERIC(19, 7) NULL,
	conditie VARCHAR(50) NOT NULL,
	CONSTRAINT PK_Voorwerpnummer PRIMARY KEY (voorwerpnummer),
	CONSTRAINT FK_Voorwerp_GBA_CODE FOREIGN KEY (GBA_CODE)
		REFERENCES tblIMAOLand (GBA_CODE)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Conditie FOREIGN KEY (conditie)
		REFERENCES conditie (conditie)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Betalingswijze FOREIGN KEY (betalingswijze) 
		REFERENCES betalingswijze(betalingswijze) 
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Gebruiker_Verkoper FOREIGN KEY (verkoper)
		REFERENCES verkoper(gebruiker)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Gebruiker_Koper FOREIGN KEY (koper)
		REFERENCES gebruiker(gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Verzendinstructies FOREIGN KEY (verzendinstructies)
		REFERENCES verzendinstructies(verzendinstructies)
		ON UPDATE NO ACTION
		on DELETE NO ACTION,
	CONSTRAINT CHK_Looptijdbegin_Looptijdeinde CHECK (looptijdBegin < looptijdEinde),
	CONSTRAINT CHK_Verkoper_NOT_koper CHECK (verkoper <> koper),
	CONSTRAINT UNQ_Voorwerp UNIQUE (titel, verkoper)
)
GO

CREATE TABLE voorwerp_in_categorie(
	voorwerp BIGINT NOT NULL,
	categorie_op_laagste_niveau BIGINT NOT NULL,
	CONSTRAINT PK_voorwerp_in_categorie_op_laagste_niveau PRIMARY KEY (voorwerp, categorie_op_laagste_niveau),
	CONSTRAINT FK_Voorwerp_in_categorie_voorwerp FOREIGN KEY (voorwerp)
		REFERENCES voorwerp (voorwerpnummer)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_in_categorie_categorie_op_laagste_niveau FOREIGN KEY (categorie_op_laagste_niveau)
		REFERENCES categorie (ID)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)

CREATE INDEX IX_Voorwerp_in_categorie ON voorwerp_in_categorie (categorie_op_laagste_niveau)
GO


INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, betalingswijze, betalingsinstructie, postcode, plaatsnaam, GBA_CODE, verzendkosten, verzendinstructies, verkoper, koper, looptijdBegin, looptijdEinde, veilingGesloten, verkoopprijs, conditie)
VALUES
(1, 'Opel Astra te koop! Als nieuw', 'Mooie Opel Astra uit 2011. Motor is een 2.4tsfi. leren bekleding, airco, elektrische ramen, DAB+ radio.', 12321.50, 'iDeal',
'betalingsinstructie', '3241AB', 'Amsterdam', 6030, 6.95, 'Verzenden', 'Alex123', 'Alex456', '01-12-2018', '07-12-2018', 1, 12321.45, 'Nieuw')

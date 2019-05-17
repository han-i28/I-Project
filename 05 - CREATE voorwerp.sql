USE EA
GO

CREATE TABLE voorwerp(
	voorwerpnummer NUMERIC(14) IDENTITY NOT NULL,
	titel VARCHAR(100) NOT NULL,
	beschrijving VARCHAR(max) NOT NULL,
	startprijs NUMERIC(19, 7) NOT NULL,
	betalingswijze INT NOT NULL,
	betalingsinstructie CHAR(25) NULL,
	plaatsnaam VARCHAR(255) NOT NULL,
	GBA_CODE CHAR(4) NOT NULL,
	looptijdBegin DATETIME NOT NULL,
	verzendkosten NUMERIC(19, 7) NOT NULL, 
	verzendinstructies INT NOT NULL,
	verkoper CHAR(20) NOT NULL,
	koper CHAR(20) NULL,
	looptijdEinde DATETIME NOT NULL,
	veilingGesloten BIT NOT NULL,
	verkoopprijs NUMERIC(19, 7) NULL,
	conditie INT NOT NULL,
	CONSTRAINT PK_Voorwerpnummer PRIMARY KEY (voorwerpnummer),
	CONSTRAINT FK_Voorwerp_GBA_CODE FOREIGN KEY (GBA_CODE)
		REFERENCES tblIMAOLand (GBA_CODE)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Conditie FOREIGN KEY (conditie)
		REFERENCES conditie (ID)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Betalingswijze FOREIGN KEY (betalingswijze) 
		REFERENCES betalingswijze(ID) 
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Gebruiker_Verkoper FOREIGN KEY (verkoper)
		REFERENCES gebruiker(gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Gebruiker_Koper FOREIGN KEY (koper)
		REFERENCES gebruiker(gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Verzendinstructies FOREIGN KEY (verzendinstructies)
		REFERENCES verzendinstructies(ID)
		ON UPDATE NO ACTION
		on DELETE NO ACTION,
	CONSTRAINT CHK_Looptijdbegin_Looptijdeinde 
		CHECK (looptijdBegin < looptijdEinde)
)
GO

CREATE INDEX IX_Voorwerp_categorie ON voorwerp (categorie)
GO

CREATE TABLE voorwerp_in_categorie(
	voorwerp NUMERIC(14) NOT NULL,
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
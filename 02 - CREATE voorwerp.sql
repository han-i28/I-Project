USE EA
GO

CREATE TABLE betalingswijze (
	ID INT NOT NULL,
	Beschrijving VARCHAR(50) NOT NULL
)
GO

INSERT INTO betalingswijze 
VALUES 
(1, iDeal),
(2, Contant),
(3, Creditcard),
(4, PayPal)
GO

CREATE TABLE verzendinstructies (
	ID INT NOT NULL,
	Beschrijving VARCHAR(50) NOT NULL
)

INSERT INTO verzendinstructies
VALUES 
(1, 'Ophalen'),
(2, 'Afhalen'),
(3, 'Ophalen of afhalen'),
(4, 'Post - brief'),
(5, 'Post - pakket')
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
	CONSTRAINT PK_Voorwerpnummer PRIMARY KEY (voorwerpnummer),
	CONSTRAINT FK_Voorwerp_GBA_CODE FOREIGN KEY (GBA_CODE)
		REFERENCES tblIMAOLand (GBA_CODE)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Conditie FOREIGN KEY (Conditie)
		REFERENCES conditie (ID)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Betalingswijze FOREIGN KEY (Betalingswijze) 
		REFERENCES betalingswijze(ID) 
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Gebruiker_Verkoper FOREIGN KEY (verkoper)
		REFERENCES gebruiker(gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Gebruiker_Koper FOREIGN KEY (koper)
		REFERENCES gebruiker(koper)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Voorwerp_Rubrieken FOREIGN KEY (voorwerpnummer)
		REFERENCES rubrieken(voorwerpnummer)
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
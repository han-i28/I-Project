USE master
GO

--DROP DATABASE [Ontwikkeldatabase Eenmaal Andermaal]
--GO

CREATE DATABASE [Ontwikkeldatabase Eenmaal Andermaal]
GO

USE [Ontwikkeldatabase Eenmaal Andermaal]
GO

CREATE TABLE voorwerp(
	voorwerpnummer NUMERIC(10) NOT NULL,
	titel VARCHAR(100) NOT NULL,
	beschrijving VARCHAR(600) NOT NULL,
	startprijs NUMERIC(19, 7) NOT NULL,
	betalingswijze CHAR(25) NOT NULL,
	betalingsinstructie CHAR(25) NULL,
	plaatsnaam VARCHAR(255) NOT NULL,--!!!
	land CHAR(50) NOT NULL,--!!!
	looptijdBegin DATETIME NOT NULL,
	verzendkosten NUMERIC(19, 7) NOT NULL, 
	verzendinstructies CHAR(27) NOT NULL,
	verkoper CHAR(20) NOT NULL,
	koper CHAR(20) NULL,
	looptijdEinde DATETIME NOT NULL,
	veilingGesloten BIT NOT NULL,
	verkoopprijs NUMERIC(19, 7) NULL,
	CONSTRAINT PK_Voorwerpnummer PRIMARY KEY (voorwerpnummer)
)

CREATE TABLE gebruiker (
	gebruikersnaam CHAR(20) NOT NULL,
	voornaam CHAR(255) NOT NULL,
	tussenvoegsel VARCHAR(10) NULL,
	achternaam CHAR(255) NOT NULL,
	adresregel_1 VARCHAR(50) NOT NULL,
	adresregel_2 VARCHAR (50) NULL,
	postcode CHAR(16) NOT NULL,--Montserrat zipcodes are 13 chars long: future proof with 16
	plaatsnaam CHAR(100) NOT NULL,
	land CHAR(255) NOT NULL,
	geboortedatum DATE NOT NULL,
	telefoon CHAR(15) NOT NULL,
	mailbox VARCHAR(50) NOT NULL,--Create email check
	wachtwoord BINARY(128) NOT NULL,--128 BINARY field for password hash
	vraag INT NOT NULL,
	antwoordtekst CHAR(20) NOT NULL,
	is_verkoper BIT NOT NULL,
	CONSTRAINT PK_Gebruiker PRIMARY KEY (gebruikersnaam)
)

CREATE TABLE voorwerp_in_rubriek(
	voorwerp NUMERIC(10) NOT NULL,
	rubriek_op_laagste_niveau INT NOT NULL, --!!!
	CONSTRAINT PK_voorwerp_in_rubriek_op_laagste_niveau PRIMARY KEY (voorwerp, rubriek_op_laagste_niveau)
)

CREATE TABLE bestand(
	filenaam CHAR(13) NOT NULL,
	voorwerp NUMERIC(10) NOT NULL,
	CONSTRAINT PK_filenaam PRIMARY KEY (filenaam)
)

CREATE TABLE bod     (
	voorwerp NUMERIC(10) NOT NULL,
	bodBedrag CHAR(10) NOT NULL,
	gebruiker CHAR(10) NOT NULL,
	bodDag CHAR(10) NOT NULL,
	bodTijdstip CHAR(8) NOT NULL,
	CONSTRAINT PK_Bod_voorwerp_bodBedrag PRIMARY KEY (voorwerp, bodBedrag),
	CONSTRAINT UNQ_Bod_gebruiker_bodDagEnTijdstip UNIQUE (gebruiker, bodDag, bodTijdstip),
	CONSTRAINT UNQ_Bod_voorwerp_bodDagEnTijdstip UNIQUE (gebruiker, bodDag, bodTijdstip)
)

CREATE TABLE Feedback (
	voorwerp NUMERIC(10) NOT NULL,
	soort_gebruiker CHAR(8) NOT NULL,
	feedbacksoort CHAR(8) NOT NULL,
	dag CHAR(10) NOT NULL,
	tijdstip CHAR(8) NOT NULL,
	commentaar CHAR(12) NULL,
	CONSTRAINT PK_Feedback_voorwerp_soortGebruiker PRIMARY KEY (voorwerp, soort_gebruiker)
)

CREATE TABLE gebruiker (
	gebruikersnaam CHAR(20) NOT NULL,
	voornaam CHAR(255) NOT NULL,
	tussenvoegsel VARCHAR(10) NULL,
	achternaam CHAR(255) NOT NULL,
	adresregel_1 VARCHAR(50) NOT NULL,
	adresregel_2 VARCHAR (50) NULL,
	postcode CHAR(16) NOT NULL,--Montserrat zipcodes are 13 chars long: future proof with 16
	plaatsnaam CHAR(100) NOT NULL,
	land CHAR(255) NOT NULL,
	geboortedatum DATE NOT NULL,
	telefoon CHAR(15) NOT NULL,
	mailbox VARCHAR(50) NOT NULL,--Create email check
	wachtwoord BINARY(128) NOT NULL,--128 BINARY field for password hash
	vraag INT NOT NULL,
	antwoordtekst CHAR(20) NOT NULL,
	is_verkoper BIT NOT NULL,
	CONSTRAINT PK_Gebruiker PRIMARY KEY (gebruikersnaam)
)

CREATE TABLE rubriek(
	rubrieknummer INT NOT NULL,
	rubrieknaam CHAR(24) NOT NULL,
	Rubriek INT NULL,
	volgnr INT NOT NULL,
	CONSTRAINT PK_Rubriek PRIMARY KEY (rubrieknummer)
)

CREATE TABLE verkoper(
	gebruiker CHAR(10) NOT NULL,
	bank CHAR(8) NULL,
	bankrekening INT NULL,
	controle_optie CHAR(10) NOT NULL,
	creditcard CHAR(19) NULL,
	CONSTRAINT PK_Verkoper PRIMARY KEY (gebruiker)
)

CREATE TABLE vraag(
	vraagnummer INT NOT NULL,
	tekst_vraag CHAR(21) NOT NULL,
	CONSTRAINT PK_Vraag PRIMARY KEY (vraagnummer)
)

GO
--FK Constraints:

ALTER TABLE voorwerp
	ADD CONSTRAINT FK_Voorwerp_voorwerpVerkoper_gebruiker FOREIGN KEY (verkoper)
		REFERENCES Verkoper (gebruiker)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT FK_Voorwerp_voorwerpKoper_gebruikersnaam FOREIGN KEY (koper)
		REFERENCES Gebruiker (gebruikersnaam)
		ON UPDATE CASCADE
		ON DELETE CASCADE
;	
GO

ALTER TABLE bestand
	ADD CONSTRAINT FK_Bestand_voorwerpnummer FOREIGN KEY (voorwerp)
		REFERENCES Voorwerp (voorwerpnummer)
		ON UPDATE CASCADE
		ON DELETE NO ACTION
;
GO

ALTER TABLE bod
	ADD CONSTRAINT FK_Bod_voorwerp FOREIGN KEY (voorwerp)
		REFERENCES voorwerp (voorwerpnummer)
		ON UPDATE CASCADE
		ON DELETE NO ACTION,
	CONSTRAINT FK_Bod_gebruiker FOREIGN KEY (gebruiker)
		REFERENCES gebruiker (gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
;
GO

ALTER TABLE feedback
	ADD CONSTRAINT FK_Feedback_voorwerp FOREIGN KEY (voorwerp)
		REFERENCES voorwerp (voorwerpnummer)
		ON UPDATE CASCADE
		ON DELETE NO ACTION
;
GO

ALTER TABLE rubriek
	ADD CONSTRAINT FK_Rubriek_rubrieknummer FOREIGN KEY (rubriek)
		REFERENCES rubriek (rubrieknummer)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
;
GO

ALTER TABLE verkoper
	ADD CONSTRAINT FK_Verkoper_gebruikersnaam FOREIGN KEY (gebruiker)
		REFERENCES gebruiker (gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
;
GO

ALTER TABLE voorwerp_in_rubriek
	ADD CONSTRAINT FK_VoorwerpInRubriek_voorwerp FOREIGN KEY (voorwerp)
		REFERENCES voorwerp (voorwerpnummer)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Rubriek_rubriek_op_laagste_niveau FOREIGN KEY (rubriek_op_laagste_niveau)
		REFERENCES rubriek (rubrieknummer)
		ON UPDATE CASCADE
		ON DELETE CASCADE
;
GO
--createscript for US 1 and 2

USE master
GO

--DROP DATABASE [Ontwikkeldatabase Eenmaal Andermaal]
--GO

CREATE DATABASE [Ontwikkeldatabase Eenmaal Andermaal]
GO

USE [Ontwikkeldatabase Eenmaal Andermaal]
GO

CREATE TABLE country(
	id SMALLINT NOT NULL,
	[name] VARCHAR(255) NOT NULL,
	code CHAR(2) NOT NULL,
	[language] VARCHAR(3) NOT NULL,
	CONSTRAINT PK_Country_id PRIMARY KEY (id)
);

CREATE TABLE voorwerp(
	voorwerpnummer NUMERIC(14) IDENTITY NOT NULL,
	titel VARCHAR(100) NOT NULL,
	beschrijving VARCHAR(600) NOT NULL,
	startprijs NUMERIC(19, 7) NOT NULL,
	betalingswijze CHAR(25) NOT NULL,
	betalingsinstructie CHAR(25) NULL,
	plaatsnaam VARCHAR(255) NOT NULL,
	land_id SMALLINT NOT NULL,
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
	adresregel_1 VARCHAR(60) NOT NULL,--Street, addressnumber
	adresregel_2 VARCHAR (60) NULL,
	postcode CHAR(16) NOT NULL,--Montserrat zipcodes are 13 chars long: future proof with 16
	plaatsnaam CHAR(85) NOT NULL,
	land_id SMALLINT NOT NULL,
	geboortedatum DATE NOT NULL,
	telefoon CHAR(15) NOT NULL,
	mailbox VARCHAR(50) NOT NULL,--Create email check
	wachtwoord BINARY(128) NOT NULL,--128 BINARY field for password hash
	vraag INT NOT NULL,
	antwoordtekst CHAR(20) NOT NULL,
	is_verkoper BIT NOT NULL,
	CONSTRAINT PK_Gebruiker PRIMARY KEY (gebruikersnaam)
)

GO

ALTER TABLE voorwerp
	ADD CONSTRAINT FK_Voorwerp_land_id FOREIGN KEY (land_id)
		REFERENCES country (id)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
;

ALTER TABLE gebruiker
	ADD CONSTRAINT FK_Gebruiker_land_id FOREIGN KEY (land_id)
		REFERENCES country (id)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
;
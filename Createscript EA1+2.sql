--createscript for US 1 and 2

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

INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, betalingswijze, plaatsnaam, land, looptijdBegin, 
verzendkosten, verzendinstructies, verkoper, looptijdEinde, veilingGesloten)
VALUES 
(1, 'OPEL ASTRA TE KOOP', 'Mooie opel astra te koop, zo goed als nieuw. Hij gaat weg omdat ik het niet meer nodig heb.', 
200.00, 'iDeal', 'Nijmegen', 'Nederland', '2019-04-19 16:00:00', 0, 'Ophalen', 'Johan de Vries', '2019-04-25 16:00:00', 0),
(2, 'Gitaar', 'Deze gitaar van mijn zoon wordt niet meer gebruikt dus mag ie weg, het is een koopje.', 15.00, 'PayPal',
'Arnhem', 'Nederland', '2019-03-20 15:00:00', 0, 'Ophalen', 'Richard Klaassen', '2019-04-19 15:00:00', 0),
(3, 'PlayStation 4', 'Heb een gamepc gekocht.', 150.00, 'Contant',
'Enschede', 'Nederland', '2019-02-14 15:00:00', 0, 'Ophalen', 'Tony te Vrede', '2019-04-14 15:00:00', 0),
(4, 'Konijn', 'Dit konijn staat te koop omdat het agressief is, het heeft al 2 hokken kapot gebeten.', 5.00, 'Contant', 'Delft', 
'Nederland', '2019-04-19 10:00:00', 0, 'Ophalen', 'Klaas Vaak', '2019-05-19 10:00:00', 0),
(5, 'Staafmixer', 'Heb een nieuwe gekocht dus deze mag weg.', 15.00, 'Contant', 'Roosendaal', 'Nederland', '2019-04-10 12:00:00',
0, 'Ophalen of post', 'Meike de Lange', '2019-04-20 12:00:00', 0);


/*
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
)*/
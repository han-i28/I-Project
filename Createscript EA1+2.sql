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
0, 'Ophalen of post', 'Meike de Lange', '2019-04-20 12:00:00', 0),
(6, 'Volkswagen Polo', 'heb een nieuwe auto', 1500.00, 'Ideal', 'Nijmegen', 'nederland', '2019-04-20 10:00:00',0, 'ophalen', 'Piet hein','2019-05-12 12:00:00',0),
(8, 'Jacht', 'ben mijn vaarbewijs kwijt geraakt', 23000.00, 'Ideal', 'Amsterdam', 'Nederland', '2019-04-19 11:30:00',0, 'ophalen', 'Jeroen van Kampen','2019-06-21 12:00:00', 0),
(9, 'Prive jet', 'heb het geld nodig', 2500000.00, 'Ideal', 'Volendam', 'Nederland', '2019-04-23 13:35:00',0, 'ophalen', 'Nick Simons','2019-06-23 12:00:00', 0),
(10, 'Tom Tom', 'Heb hem niet meer nodig', 35.00, 'contant', 'Amsterdam', 'Nederland', '2019-04-19 11:30:00',6.5, 'ophalen of verzenden', 'Jan Mulders','2019-06-19 12:00:00', 0),
(11, 'Pokemon kaarten', 'Speel het niet meer', 10.00, 'contant', 'enschede', 'Nederland', '2019-04-24 15:30:00',0, 'ophalen', 'Ash Pallet','2019-06-24 12:00:00', 0),
(12, 'Houten stoel', 'Heb een stoel over', 5.00, 'contant', 'Eibergen', 'Nederland', '2019-04-24 11:36:00',0, 'ophalen', 'Anja Kamp','2019-06-24 12:00:00', 0),
(13, 'grasmaaier', 'Heb geen gras meer', 15.00, 'contant', 'Amsterdam', 'Nederland', '2019-04-25 11:30:00',0, 'ophalen', 'Jeroen van Kampen','2019-06-25 12:00:00', 0),
(14, 'postzegelverzameling', 'gestopt met verzamelen', 66.00, 'Ideal', 'Amsterdam', 'Nederland', '2019-04-26 12:30:00',0, 'ophalen', 'Anton bonten','2019-06-26 12:00:00', 0),
(15, 'MTG black lotus', 'kaart gebruik ik niet meer (alpha played)', 10000.00, 'Ideal', 'Utrecht', 'Nederland', '2019-04-25 13:30:00',0, 'ophalen', 'Josh kwai','2019-06-25 12:00:00', 0),
(16, 'comics', 'heb ze allemaal gelezen', 75.00, 'Ideal', 'Rotterdam', 'Nederland', '2019-04-24 14:30:00',0, 'ophalen', 'Stan Lee','2019-06-24 12:00:00', 0),
(17, 'arc reactor', 'Niet meer nodig', 1050.00, 'Ideal', 'Den Haag', 'Nederland', '2019-04-21 15:30:00',0, 'ophalen', 'Tony stark','2019-06-21 12:00:00', 0),
(18, 'Schild', 'Heb een nieuwe', 15.00, 'contant', 'groningen', 'Nederland', '2019-04-23 16:30:00',0, 'ophalen', 'Steve Rogers','2019-06-23 12:00:00', 0),
(19, 'Hoge Hakken', 'draag ze te weinig', 45.00, 'contant', 'maastricht', 'Nederland', '2019-04-23 11:40:00',0, 'ophalen', 'Natasha Romanoff','2019-06-23 12:00:00', 0),
(20, 'gammastraling', 'wil het niet meer wordt er groot en boos van', 0.00, 'contant', 'groenlo', 'Nederland', '2019-04-22 12:50:00',0, 'ophalen', 'Bruce Banner','2019-06-22 12:00:00', 0),
(21, 'Boog', 'Gebruik zwaarden', 75.00, 'Ideal', 'Eindhoven', 'Nederland', '2019-04-20 13:10:00',0, 'ophalen', 'Clint Barton','2019-06-20 12:00:00', 0),
(22, 'Mjolnir', 'Heb nu stormbreaker (hij ligt wel in stukjes)', 23.00, 'Ideal', 'Asgard', 'Nederland', '2019-04-18 14:20:00',0, 'ophalen', 'Thor Odinson','2019-06-18 12:00:00', 0),
(23, 'eye of agamotto', 'losse ketting zonder steen', 25.00, 'Ideal', 'Amsterdam', 'Nederland', '2019-04-26 15:30:00',0, 'ophalen', 'Stephen strange','2019-06-26 12:00:00', 0),
(24, 'helicarrier', 'Niet toegestaan om er mee te vliegen', 349000000.00, 'Paypall', 'Schiphol', 'Nederland', '2019-04-19 16:40:00',0, 'ophalen', 'Nick Fury','2019-06-19 12:00:00', 0);


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
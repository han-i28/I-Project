USE EA
GO

CREATE TABLE voorwerp(
	voorwerpnummer NUMERIC(14) IDENTITY NOT NULL,
	titel VARCHAR(100) NOT NULL,
	beschrijving VARCHAR(600) NOT NULL,
	startprijs NUMERIC(19, 7) NOT NULL,
	betalingswijze CHAR(25) NOT NULL,
	betalingsinstructie CHAR(25) NULL,
	plaatsnaam VARCHAR(255) NOT NULL,
	GBA_CODE CHAR(4) NOT NULL,
	looptijdBegin DATETIME NOT NULL,
	verzendkosten NUMERIC(19, 7) NOT NULL, 
	verzendinstructies CHAR(27) NOT NULL,
	verkoper CHAR(20) NOT NULL,
	koper CHAR(20) NULL,
	looptijdEinde DATETIME NOT NULL,
	veilingGesloten BIT NOT NULL,
	verkoopprijs NUMERIC(19, 7) NULL,
	CONSTRAINT PK_Voorwerpnummer PRIMARY KEY (voorwerpnummer),
	CONSTRAINT FK_Voorwerp_GBA_CODE FOREIGN KEY (GBA_CODE)
		REFERENCES tblIMAOLand (GBA_CODE)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
)
GO


INSERT INTO voorwerp (titel, beschrijving, startprijs, betalingswijze, plaatsnaam, GBA_CODE, looptijdBegin, 
verzendkosten, verzendinstructies, verkoper, looptijdEinde, veilingGesloten)
VALUES 
('OPEL ASTRA TE KOOP', 'Mooie opel astra te koop, zo goed als nieuw. Hij gaat weg omdat ik het niet meer nodig heb.', 
200.00, 'iDeal', 'Nijmegen', 6030, '2019-04-19 16:00:00', 0, 'Ophalen', 'Johan de Vries', '2019-04-25 16:00:00', 0),
('Gitaar', 'Deze gitaar van mijn zoon wordt niet meer gebruikt dus mag ie weg, het is een koopje.', 15.00, 'PayPal',
'Arnhem', 6030, '2019-03-20 15:00:00', 0, 'Ophalen', 'Richard Klaassen', '2019-04-19 15:00:00', 0),
('PlayStation 4', 'Heb een gamepc gekocht.', 150.00, 'Contant',
'Enschede', 6030, '2019-02-14 15:00:00', 0, 'Ophalen', 'Tony te Vrede', '2019-04-14 15:00:00', 0),
('Konijn', 'Dit konijn staat te koop omdat het agressief is, het heeft al 2 hokken kapot gebeten.', 5.00, 'Contant', 'Delft', 
6030, '2019-04-19 10:00:00', 0, 'Ophalen', 'Klaas Vaak', '2019-05-19 10:00:00', 0),
('Staafmixer', 'Heb een nieuwe gekocht dus deze mag weg.', 15.00, 'Contant', 'Roosendaal', 6030, '2019-04-10 12:00:00',
0, 'Ophalen of post', 'Meike de Lange', '2019-04-20 12:00:00', 0),
('Volkswagen Polo', 'heb een nieuwe auto', 1500.00, 'Ideal', 'Nijmegen', 6030, '2019-04-20 10:00:00',0, 'ophalen', 'Piet hein','2019-05-12 12:00:00',0),
('Jacht', 'ben mijn vaarbewijs kwijt geraakt', 23000.00, 'Ideal', 'Amsterdam', 6030, '2019-04-19 11:30:00',0, 'ophalen', 'Jeroen van Kampen','2019-06-21 12:00:00', 0),
('Prive jet', 'heb het geld nodig', 2500000.00, 'Ideal', 'Volendam', 6030, '2019-04-23 13:35:00',0, 'ophalen', 'Nick Simons','2019-06-23 12:00:00', 0),
('Tom Tom', 'Heb hem niet meer nodig', 35.00, 'contant', 'Amsterdam', 6030, '2019-04-19 11:30:00',6.5, 'ophalen of verzenden', 'Jan Mulders','2019-06-19 12:00:00', 0),
('Pokemon kaarten', 'Speel het niet meer', 10.00, 'contant', 'enschede', 6030, '2019-04-24 15:30:00',0, 'ophalen', 'Ash Pallet','2019-06-24 12:00:00', 0),
('Houten stoel', 'Heb een stoel over', 5.00, 'contant', 'Eibergen', 6030, '2019-04-24 11:36:00',0, 'ophalen', 'Anja Kamp','2019-06-24 12:00:00', 0),
('grasmaaier', 'Heb geen gras meer', 15.00, 'contant', 'Amsterdam', 6030, '2019-04-25 11:30:00',0, 'ophalen', 'Jeroen van Kampen','2019-06-25 12:00:00', 0),
('postzegelverzameling', 'gestopt met verzamelen', 66.00, 'Ideal', 'Amsterdam', 6030, '2019-04-26 12:30:00',0, 'ophalen', 'Anton bonten','2019-06-26 12:00:00', 0),
('MTG black lotus', 'kaart gebruik ik niet meer (alpha played)', 10000.00, 'Ideal', 'Utrecht', 6030, '2019-04-25 13:30:00',0, 'ophalen', 'Josh kwai','2019-06-25 12:00:00', 0),
('comics', 'heb ze allemaal gelezen', 75.00, 'Ideal', 'Rotterdam', 6030, '2019-04-24 14:30:00',0, 'ophalen', 'Stan Lee','2019-06-24 12:00:00', 0),
('arc reactor', 'Niet meer nodig', 1050.00, 'Ideal', 'Den Haag', 6030, '2019-04-21 15:30:00',0, 'ophalen', 'Tony stark','2019-06-21 12:00:00', 0),
('Schild', 'Heb een nieuwe', 15.00, 'contant', 'groningen', 6030, '2019-04-23 16:30:00',0, 'ophalen', 'Steve Rogers','2019-06-23 12:00:00', 0),
('Hoge Hakken', 'draag ze te weinig', 45.00, 'contant', 'maastricht', 6030, '2019-04-23 11:40:00',0, 'ophalen', 'Natasha Romanoff','2019-06-23 12:00:00', 0),
('gammastraling', 'wil het niet meer wordt er groot en boos van', 0.00, 'contant', 'groenlo', 6030, '2019-04-22 12:50:00',0, 'ophalen', 'Bruce Banner','2019-06-22 12:00:00', 0),
('Boog', 'Gebruik zwaarden', 75.00, 'Ideal', 'Eindhoven', 6030, '2019-04-20 13:10:00',0, 'ophalen', 'Clint Barton','2019-06-20 12:00:00', 0),
('Mjolnir', 'Heb nu stormbreaker (hij ligt wel in stukjes)', 23.00, 'Ideal', 'Asgard', 6030, '2019-04-18 14:20:00',0, 'ophalen', 'Thor Odinson','2019-06-18 12:00:00', 0),
('eye of agamotto', 'losse ketting zonder steen', 25.00, 'Ideal', 'Amsterdam', 6030, '2019-04-26 15:30:00',0, 'ophalen', 'Stephen strange','2019-06-26 12:00:00', 0),
('helicarrier', 'Niet toegestaan om er mee te vliegen', 349000000.00, 'Paypall', 'Schiphol', 6030, '2019-04-19 16:40:00',0, 'ophalen', 'Nick Fury','2019-06-19 12:00:00', 0);
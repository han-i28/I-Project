USE EA
GO

INSERT INTO voorwerp (titel, beschrijving, startprijs, betalingswijze, plaatsnaam, land_id, looptijdBegin, 
verzendkosten, verzendinstructies, verkoper, looptijdEinde, veilingGesloten, verkoop_valuta)
VALUES 
('OPEL ASTRA TE KOOP', 'Mooie opel astra te koop, zo goed als nieuw. Hij gaat weg omdat ik het niet meer nodig heb.', 
200.00, 'iDeal', 'Nijmegen', 153, '2019-04-19 16:00:00', 0, 'Ophalen', 'Johan de Vries', '2019-04-25 16:00:00', 0, 'EUR'),
('Gitaar', 'Deze gitaar van mijn zoon wordt niet meer gebruikt dus mag ie weg, het is een koopje.', 15.00, 'PayPal',
'Arnhem', 153, '2019-03-20 15:00:00', 0, 'Ophalen', 'Richard Klaassen', '2019-04-19 15:00:00', 0, 'USD'),
('PlayStation 4', 'Heb een gamepc gekocht.', 150.00, 'Contant',
'Enschede', 153, '2019-02-14 15:00:00', 0, 'Ophalen', 'Tony te Vrede', '2019-04-14 15:00:00', 0, 'GBP'),
('Konijn', 'Dit konijn staat te koop omdat het agressief is, het heeft al 2 hokken kapot gebeten.', 5.00, 'Contant', 'Delft', 
153, '2019-04-19 10:00:00', 0, 'Ophalen', 'Klaas Vaak', '2019-05-19 10:00:00', 0, 'JPY'),
('Staafmixer', 'Heb een nieuwe gekocht dus deze mag weg.', 15.00, 'Contant', 'Roosendaal', 153, '2019-04-10 12:00:00',
0, 'Ophalen of post', 'Meike de Lange', '2019-04-20 12:00:00', 0, 'CHF'),
('Volkswagen Polo', 'heb een nieuwe auto', 1500.00, 'Ideal', 'Nijmegen', 153, '2019-04-20 10:00:00',0, 'ophalen', 'Piet hein','2019-05-12 12:00:00',0, 'IDR'),
('Jacht', 'ben mijn vaarbewijs kwijt geraakt', 23000.00, 'Ideal', 'Amsterdam', 153, '2019-04-19 11:30:00',0, 'ophalen', 'Jeroen van Kampen','2019-06-21 12:00:00', 0, 'DKK'),
('Prive jet', 'heb het geld nodig', 2500000.00, 'Ideal', 'Volendam', 153, '2019-04-23 13:35:00',0, 'ophalen', 'Nick Simons','2019-06-23 12:00:00', 0, 'HKD'),
('Tom Tom', 'Heb hem niet meer nodig', 35.00, 'contant', 'Amsterdam', 153, '2019-04-19 11:30:00',6.5, 'ophalen of verzenden', 'Jan Mulders','2019-06-19 12:00:00', 0, 'SGD'),
('Pokemon kaarten', 'Speel het niet meer', 10.00, 'contant', 'enschede', 153, '2019-04-24 15:30:00',0, 'ophalen', 'Ash Pallet','2019-06-24 12:00:00', 0, 'CZK'),
('Houten stoel', 'Heb een stoel over', 5.00, 'contant', 'Eibergen', 153, '2019-04-24 11:36:00',0, 'ophalen', 'Anja Kamp','2019-06-24 12:00:00', 0, 'EUR'),
('grasmaaier', 'Heb geen gras meer', 15.00, 'contant', 'Amsterdam', 153, '2019-04-25 11:30:00',0, 'ophalen', 'Jeroen van Kampen','2019-06-25 12:00:00', 0, 'USD'),
('postzegelverzameling', 'gestopt met verzamelen', 66.00, 'Ideal', 'Amsterdam', 153, '2019-04-26 12:30:00',0, 'ophalen', 'Anton bonten','2019-06-26 12:00:00', 0, 'GBP'),
('MTG black lotus', 'kaart gebruik ik niet meer (alpha played)', 10000.00, 'Ideal', 'Utrecht', 153, '2019-04-25 13:30:00',0, 'ophalen', 'Josh kwai','2019-06-25 12:00:00', 0, 'EUR'),
('comics', 'heb ze allemaal gelezen', 75.00, 'Ideal', 'Rotterdam', 153, '2019-04-24 14:30:00',0, 'ophalen', 'Stan Lee','2019-06-24 12:00:00', 0, 'EUR'),
('arc reactor', 'Niet meer nodig', 1050.00, 'Ideal', 'Den Haag', 153, '2019-04-21 15:30:00',0, 'ophalen', 'Tony stark','2019-06-21 12:00:00', 0, 'GBP'),
('Schild', 'Heb een nieuwe', 15.00, 'contant', 'groningen', 153, '2019-04-23 16:30:00',0, 'ophalen', 'Steve Rogers','2019-06-23 12:00:00', 0, 'EUR'),
('Hoge Hakken', 'draag ze te weinig', 45.00, 'contant', 'maastricht', 153, '2019-04-23 11:40:00',0, 'ophalen', 'Natasha Romanoff','2019-06-23 12:00:00', 0, 'USD'),
('gammastraling', 'wil het niet meer wordt er groot en boos van', 0.00, 'contant', 'groenlo', 153, '2019-04-22 12:50:00',0, 'ophalen', 'Bruce Banner','2019-06-22 12:00:00', 0, 'JPY'),
('Boog', 'Gebruik zwaarden', 75.00, 'Ideal', 'Eindhoven', 153, '2019-04-20 13:10:00',0, 'ophalen', 'Clint Barton','2019-06-20 12:00:00', 0, 'JPY'),
('Mjolnir', 'Heb nu stormbreaker (hij ligt wel in stukjes)', 23.00, 'Ideal', 'Asgard', 153, '2019-04-18 14:20:00',0, 'ophalen', 'Thor Odinson','2019-06-18 12:00:00', 0, 'DKK'),
('eye of agamotto', 'losse ketting zonder steen', 25.00, 'Ideal', 'Amsterdam', 153, '2019-04-26 15:30:00',0, 'ophalen', 'Stephen strange','2019-06-26 12:00:00', 0, 'EUR'),
('helicarrier', 'Niet toegestaan om er mee te vliegen', 349000000.00, 'Paypall', 'Schiphol', 153, '2019-04-19 16:40:00',0, 'ophalen', 'Nick Fury','2019-06-19 12:00:00', 0, 'EUR');

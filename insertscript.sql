/*insertscript

voorwerp*/
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

/*gebruiker*/
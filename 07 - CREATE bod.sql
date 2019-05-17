USE EA
GO

CREATE TABLE bod (
	voorwerp NUMERIC(10) NOT NULL,
	bodBedrag CHAR(10) NOT NULL,
	gebruiker CHAR(10) NOT NULL,
	bodMoment DATETIME NOT NULL
	CONSTRAINT PK_Bod_voorwerp_bodBedrag PRIMARY KEY (voorwerp, bodBedrag),
	CONSTRAINT UNQ_Bod_gebruiker_bodMoment UNIQUE (gebruiker, bodMoment),
	CONSTRAINT UNQ_Bod_voorwerp_bodMoment UNIQUE (gebruiker, bodTijdstip),
	CONSTRAINT FK_Bod_voorwerp FOREIGN KEY (voorwerp)
		REFERENCES voorwerp (voorwerpnummer)
		ON UPDATE CASCADE
		ON DELETE NO ACTION,
	CONSTRAINT FK_Bod_gebruiker FOREIGN KEY (gebruiker)
		REFERENCES gebruiker (gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
)
GO

INSERT INTO bod (voorwerp, bodBedrag, gebruiker, bodMoment)
VALUES
(1, '100', 'Alex123', '03-10-2000')
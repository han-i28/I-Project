USE iproject28
GO

SELECT * FROM biedingen

CREATE TABLE bod (
	voorwerp BIGINT NOT NULL,
	bodBedrag NUMERIC(19,7) NOT NULL,
	gebruiker VARCHAR(20) NOT NULL,
	bodMoment DATETIME NOT NULL DEFAULT GETDATE()
	CONSTRAINT PK_Bod_voorwerp_bodBedrag PRIMARY KEY (voorwerp, bodBedrag),
	CONSTRAINT FK_Bod_voorwerp FOREIGN KEY (voorwerp)
		REFERENCES voorwerp (voorwerpnummer)
		ON UPDATE CASCADE
		ON DELETE NO ACTION,
	CONSTRAINT FK_Bod_gebruiker FOREIGN KEY (gebruiker)
		REFERENCES gebruiker (gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT UNQ_Bod_gebruiker_bodMoment UNIQUE (gebruiker, bodMoment),
	CONSTRAINT UNQ_Bod_voorwerp_bodMoment UNIQUE (gebruiker, bodMoment),
	CONSTRAINT CHK_Bod_hoger_bod CHECK (bodBedrag > (SELECT MAX(bodBedrag) FROM bod)),
	CONSTRAINT CHK_Bod_bodMoment_volgorde CHECK (bodMoment > (SELECT MAX(bodMoment) FROM bod))
)
GO

INSERT INTO bod (voorwerp, bodBedrag, gebruiker, bodMoment)
VALUES
(1, '100', 'Alex123', '03-10-2000')
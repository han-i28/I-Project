USE EA
GO

CREATE TABLE bod (
	voorwerp NUMERIC(10) NOT NULL,
	bodBedrag CHAR(10) NOT NULL,
	gebruiker CHAR(10) NOT NULL,
	bodDag CHAR(10) NOT NULL,
	bodTijdstip CHAR(8) NOT NULL,
	CONSTRAINT PK_Bod_voorwerp_bodBedrag PRIMARY KEY (voorwerp, bodBedrag),
	CONSTRAINT UNQ_Bod_gebruiker_bodDagEnTijdstip UNIQUE (gebruiker, bodDag, bodTijdstip),
	CONSTRAINT UNQ_Bod_voorwerp_bodDagEnTijdstip UNIQUE (gebruiker, bodDag, bodTijdstip)
)
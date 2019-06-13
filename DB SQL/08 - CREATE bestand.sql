USE iproject28
GO

CREATE TABLE bestand(
	pad VARCHAR(40) NOT NULL,
	voorwerp BIGINT NOT NULL,
	CONSTRAINT PK_filenaam PRIMARY KEY (pad),
    CONSTRAINT FK_Bestand_voorwerpnummer FOREIGN KEY (voorwerp)
		REFERENCES voorwerp (voorwerpnummer)
		ON UPDATE CASCADE
		ON DELETE NO ACTION
)
GO

INSERT INTO bestand (pad, voorwerp)
VALUES
('/img/voorwerp/1243425234235.jpg', 1)
USE iproject28
GO

CREATE TABLE verkoper(
	gebruiker CHAR(20) NOT NULL,
	bank CHAR(8) NULL,
	bankrekening VARCHAR(10) NULL,
	controle_optie CHAR(10) NOT NULL,
	creditcard CHAR(19) NULL,
	CONSTRAINT PK_Verkoper PRIMARY KEY (gebruiker),
    CONSTRAINT FK_Verkoper_gebruikersnaam FOREIGN KEY (gebruiker)
		REFERENCES gebruiker (gebruikersnaam)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
)

INSERT INTO verkoper(gebruiker, bank, bankrekening, controle_optie, creditcard)
VALUES
('Alex123', 'NL41INGB', '1234567890', 'Creditcard', '4567-8901-2345-6789')
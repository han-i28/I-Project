USE EA
GO

CREATE TABLE gebruiker (
	gebruikersnaam CHAR(20) NOT NULL,
	voornaam CHAR(255) NOT NULL,
	tussenvoegsel VARCHAR(10) NULL,
	achternaam CHAR(255) NOT NULL,
	adresregel_1 VARCHAR(60) NOT NULL,--Street, addressnumber
	adresregel_2 VARCHAR (60) NULL,
	postcode CHAR(16) NOT NULL,--Montserrat zipcodes are 13 chars long: future proof with 16
	plaatsnaam CHAR(85) NOT NULL,
	GBA_CODE CHAR(4) NOT NULL,
	geboortedatum DATE NOT NULL,
	telefoon CHAR(15) NOT NULL,
	mailbox VARCHAR(50) NOT NULL,--Create email check
	wachtwoord BINARY(128) NOT NULL,--128 BINARY field for password hash
	vraag INT NOT NULL,
	antwoordtekst CHAR(20) NOT NULL,
	is_verkoper BIT NOT NULL,
	CONSTRAINT PK_Gebruiker PRIMARY KEY (gebruikersnaam),
	CONSTRAINT FK_Gebruiker_GBA_CODE FOREIGN KEY (GBA_CODE)
		REFERENCES tblIMAOLand (GBA_CODE)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION
)
GO

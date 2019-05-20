USE iproject28
GO

CREATE TABLE gebruiker (
	gebruikersnaam VARCHAR(20) NOT NULL,
	voornaam VARCHAR(255) NOT NULL,
	tussenvoegsel VARCHAR(10) NULL,
	achternaam VARCHAR(255) NOT NULL,
	adresregel_1 VARCHAR(60) NOT NULL,--Street, addressnumber
	adresregel_2 VARCHAR (60) NULL,
	postcode CHAR(6) NOT NULL,--Montserrat zipcodes are 13 chars long: future proof with 16
	plaatsnaam VARCHAR(85) NOT NULL,
	GBA_CODE CHAR(4) NOT NULL,
	geboortedatum DATE NOT NULL,
	telefoon CHAR(15) NOT NULL,
	mailbox VARCHAR(50) NOT NULL,--Create email check
	wachtwoord BINARY(128) NOT NULL,--128 BINARY field for password hash
	vraag INT NOT NULL,
	antwoordtekst VARCHAR(20) NOT NULL,
	rating NUMERIC(4,1) NOT NULL,
	CONSTRAINT PK_Gebruiker PRIMARY KEY (gebruikersnaam),
	CONSTRAINT FK_Gebruiker_GBA_CODE FOREIGN KEY (GBA_CODE)
		REFERENCES tblIMAOLand (GBA_CODE)
		ON UPDATE NO ACTION
		ON DELETE NO ACTION,
	CONSTRAINT FK_Gebruiker_Vraag FOREIGN KEY (vraag)
		REFERENCES vraag(ID)
		ON UPDATE NO ACTION
		on DELETE NO ACTION,
	CONSTRAINT CHK_Mailbox CHECK (mailbox LIKE '%_@__%.__%'),
	CONSTRAINT UNQ_Mailbox UNIQUE (mailbox),
	CONSTRAINT CHK_Wachtwoord CHECK (COL_LENGTH ('wachtwoord', 'this') = LEN(wachtwoord)),--password hash must be maximum length of column to ensure hash
	CONSTRAINT CHK_Geboortedatum CHECK (getdate() >= DATEADD(year, 12, geboortedatum)),--users need to be at least 12 years old
	CONSTRAINT CHK_adresregel_1_not_adresregel_2 CHECK (adresregel_1 <> adresregel_2),
	CONSTRAINT CHK_adresregel_1_format CHECK (adresregel_1 LIKE '%___[ ]%')
)
GO

INSERT INTO gebruiker(gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, adresregel_2, postcode,
	plaatsnaam, GBA_CODE, geboortedatum, telefoon, mailbox, wachtwoord, vraag, antwoordtekst, rating)
	VALUES
	('Alex123', 'Alex', '', 'Heijmans', 'Kerkstraat 5a', '', '5352MH', 'Utrecht', 6030, '03-06-2000', '+31629384719','alex.heijmans@gmail.com',
	0x38EE2372C69EF3AE53651FF80F3647879CBB301CC2A8EB2CA42A42E055E086ACF0FADE45D22FAE89BE43562F5964D0FAD08706AAA332858F02F6CD9C5B125972DE7207155701B46C0CA65D7F52BCD33F59480FCDD9DC08BE74000000000000000000000000000000000000000000000000000000000000000000000000000000,
	1, 'Hond', 99.9)
INSERT INTO gebruiker(gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, adresregel_2, postcode,
	plaatsnaam, GBA_CODE, geboortedatum, telefoon, mailbox, wachtwoord, vraag, antwoordtekst, rating)
	VALUES
	('Alex456', 'Alex', '', 'Heijmens', 'Kerkstraat 5a', '', '5352MH', 'Utrecht', 6030, '03-06-2000', '+31629384719','alex.heijmens@gmail.com',
	0x38EE2372C69EF3AE53651FF80F3647879CBB301CC2A8EB2CA42A42E055E086ACF0FADE45D22FAE89BE43562F5964D0FAD08706AAA332858F02F6CD9C5B125972DE7207155701B46C0CA65D7F52BCD33F59480FCDD9DC08BE74000000000000000000000000000000000000000000000000000000000000000000000000000000,
	1, 'Hond', 99.9)
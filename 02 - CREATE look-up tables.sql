USE EA
GO

CREATE TABLE betalingswijze (
	ID INT NOT NULL,
	Beschrijving VARCHAR(50) NOT NULL
    CONSTRAINT PK_betalingswijze PRIMARY KEY (ID)
)
GO

INSERT INTO betalingswijze 
VALUES 
(1, 'iDeal'),
(2, 'Contant'),
(3, 'Creditcard'),
(4, 'PayPal')
GO

CREATE TABLE verzendinstructies (
	ID INT NOT NULL,
	Beschrijving VARCHAR(50) NOT NULL
    CONSTRAINT PK_verzendinstructies PRIMARY KEY (ID)
)

INSERT INTO verzendinstructies
VALUES 
(1, 'Ophalen'),
(2, 'Afhalen'),
(3, 'Ophalen of afhalen'),
(4, 'Post - brief'),
(5, 'Post - pakket')
GO

CREATE TABLE conditie (
	ID INT NOT NULL,
	Beschrijving VARCHAR(50) NOT NULL
    CONSTRAINT PK_conditie PRIMARY KEY (ID)
)
GO

INSERT INTO conditie
VALUES 
(1, 'Nieuw'),
(2, 'Tweedehands'),
(3, 'Zo goed als nieuw'),
(4, 'Gebruikt'),
(5, 'Opknapbeurt nodig')
GO
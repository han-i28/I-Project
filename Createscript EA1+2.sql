--createscript for US 1 and 2

USE master
GO

--DROP DATABASE [Ontwikkeldatabase Eenmaal Andermaal]
--GO

CREATE DATABASE [Ontwikkeldatabase Eenmaal Andermaal]
GO

USE [Ontwikkeldatabase Eenmaal Andermaal]
GO

CREATE TABLE [dbo].[Country](
	Id [smallint] NOT NULL,
	[Name] [varchar](255) NOT NULL,
	[Code] [varchar](2) NOT NULL,
	[Language] [varchar](3) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

/****** Object:  Table [dbo].[Region]    Script Date: 31-Dec-18 1:27:55 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Region](
	[Id] [int] NOT NULL,
	[Name] [varchar](255) NOT NULL,
	[CountryId] [smallint] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Region]  WITH CHECK ADD  CONSTRAINT [FK_Region_Country] FOREIGN KEY([CountryId])
REFERENCES [dbo].[Country] ([Id])
GO

ALTER TABLE [dbo].[Region] CHECK CONSTRAINT [FK_Region_Country]
GO

CREATE TABLE voorwerp(
	voorwerpnummer NUMERIC(10) NOT NULL,
	titel VARCHAR(100) NOT NULL,
	beschrijving VARCHAR(600) NOT NULL,
	startprijs NUMERIC(19, 7) NOT NULL,
	betalingswijze CHAR(25) NOT NULL,
	betalingsinstructie CHAR(25) NULL,
	plaatsnaam VARCHAR(255) NOT NULL,--!!!
	land CHAR(50) NOT NULL,--!!!
	looptijdBegin DATETIME NOT NULL,
	verzendkosten NUMERIC(19, 7) NOT NULL, 
	verzendinstructies CHAR(27) NOT NULL,
	verkoper CHAR(20) NOT NULL,
	koper CHAR(20) NULL,
	looptijdEinde DATETIME NOT NULL,
	veilingGesloten BIT NOT NULL,
	verkoopprijs NUMERIC(19, 7) NULL,
	CONSTRAINT PK_Voorwerpnummer PRIMARY KEY (voorwerpnummer)
)


CREATE TABLE gebruiker (
	gebruikersnaam CHAR(20) NOT NULL,
	voornaam CHAR(255) NOT NULL,
	tussenvoegsel VARCHAR(10) NULL,
	achternaam CHAR(255) NOT NULL,
	adresregel_1 VARCHAR(60) NOT NULL,
	adresregel_2 VARCHAR (60) NULL,
	postcode CHAR(16) NOT NULL,--Montserrat zipcodes are 13 chars long: future proof with 16
	plaatsnaam CHAR(85) NOT NULL,
	land CHAR(255) NOT NULL,
	geboortedatum DATE NOT NULL,
	telefoon CHAR(15) NOT NULL,
	mailbox VARCHAR(50) NOT NULL,--Create email check
	wachtwoord BINARY(128) NOT NULL,--128 BINARY field for password hash
	vraag INT NOT NULL,
	antwoordtekst CHAR(20) NOT NULL,
	is_verkoper BIT NOT NULL,
	CONSTRAINT PK_Gebruiker PRIMARY KEY (gebruikersnaam)
)


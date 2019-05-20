USE iproject28
GO

CREATE TABLE feedback (
	voorwerp BIGINT NOT NULL,
	soort_gebruiker CHAR(8) NOT NULL,
	feedbacksoort CHAR(8) NOT NULL,
	moment DATETIME NOT NULL,
	commentaar VARCHAR(600) NULL,
	CONSTRAINT PK_Feedback_voorwerp_soortGebruiker PRIMARY KEY (voorwerp, soort_gebruiker),
	CONSTRAINT FK_Feedback_voorwerp FOREIGN KEY (voorwerp)
		REFERENCES voorwerp (voorwerpnummer)
		ON UPDATE CASCADE
		ON DELETE NO ACTION
)
GO

INSERT INTO feedback (voorwerp, soort_gebruiker, feedbacksoort, moment, commentaar)
VALUES
(1, 'Koper', 'Positief', '11-05-2019', 'De auto is met een volle tank afgeleverd en was netjes schoongemaakt. Ik ben er erg blij mee!')
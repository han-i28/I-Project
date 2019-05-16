--FILTERFUNCTIE, LOS RUNNEN ANDERS WERKT HET NIET
DROP FUNCTION IF EXISTS [dbo].[udf_StripHTML]
go
CREATE FUNCTION [dbo].[udf_StripHTML]
(
@HTMLText varchar(MAX)
)
RETURNS varchar(MAX)
AS
BEGIN
    DECLARE @Start  int
    DECLARE @End    int
    DECLARE @Length int

    -- Replace the HTML entity &amp; with the '&' character (this needs to be done first, as
    -- '&' might be double encoded as '&amp;amp;')
    SET @Start = CHARINDEX('&amp;', @HTMLText)
    SET @End = @Start + 4
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '&')
        SET @Start = CHARINDEX('&amp;', @HTMLText)
        SET @End = @Start + 4
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &lt; with the '<' character
    SET @Start = CHARINDEX('&lt;', @HTMLText)
    SET @End = @Start + 3
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '<')
        SET @Start = CHARINDEX('&lt;', @HTMLText)
        SET @End = @Start + 3
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &gt; with the '>' character
    SET @Start = CHARINDEX('&gt;', @HTMLText)
    SET @End = @Start + 3
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '>')
        SET @Start = CHARINDEX('&gt;', @HTMLText)
        SET @End = @Start + 3
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &amp; with the '&' character
    SET @Start = CHARINDEX('&amp;amp;', @HTMLText)
    SET @End = @Start + 4
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '&')
        SET @Start = CHARINDEX('&amp;amp;', @HTMLText)
        SET @End = @Start + 4
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &nbsp; with the ' ' character
    SET @Start = CHARINDEX('&nbsp;', @HTMLText)
    SET @End = @Start + 5
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, ' ')
        SET @Start = CHARINDEX('&nbsp;', @HTMLText)
        SET @End = @Start + 5
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &Ouml; with the 'Ö' character
    SET @Start = CHARINDEX('&Ouml;', @HTMLText)
    SET @End = @Start + 5
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'Ö')
        SET @Start = CHARINDEX('&Ouml;', @HTMLText)
        SET @End = @Start + 5
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &ouml; with the 'ö' character
    SET @Start = CHARINDEX('&ouml;', @HTMLText)
    SET @End = @Start + 5
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'ö')
        SET @Start = CHARINDEX('&ouml;', @HTMLText)
        SET @End = @Start + 5
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &Euml; with the 'Ë' character
    SET @Start = CHARINDEX('&Euml;', @HTMLText)
    SET @End = @Start + 5
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'Ë')
        SET @Start = CHARINDEX('&Euml;', @HTMLText)
        SET @End = @Start + 5
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &euml; with the 'ë' character
    SET @Start = CHARINDEX('&euml;', @HTMLText)
    SET @End = @Start + 5
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'ë')
        SET @Start = CHARINDEX('&euml;', @HTMLText)
        SET @End = @Start + 5
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &Auml; with the 'Ä' character
    SET @Start = CHARINDEX('&Auml;', @HTMLText)
    SET @End = @Start + 5
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'Ä')
        SET @Start = CHARINDEX('&Auml;', @HTMLText)
        SET @End = @Start + 5
        SET @Length = (@End - @Start) + 1
    END

    -- Replace the HTML entity &auml; with the 'ä' character
    SET @Start = CHARINDEX('&auml;', @HTMLText)
    SET @End = @Start + 5
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'ä')
        SET @Start = CHARINDEX('&auml;', @HTMLText)
        SET @End = @Start + 5
        SET @Length = (@End - @Start) + 1
    END

    -- Replace any <br> tags with a newline
    SET @Start = CHARINDEX('<br>', @HTMLText)
    SET @End = @Start + 3
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, CHAR(13) + CHAR(10))
        SET @Start = CHARINDEX('<br>', @HTMLText)
        SET @End = @Start + 3
        SET @Length = (@End - @Start) + 1
    END

    -- Replace any <br/> tags with a newline
    SET @Start = CHARINDEX('<br/>', @HTMLText)
    SET @End = @Start + 4
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, CHAR(13) + CHAR(10))
        SET @Start = CHARINDEX('<br/>', @HTMLText)
        SET @End = @Start + 4
        SET @Length = (@End - @Start) + 1
    END

    -- Replace any <br /> tags with a newline
    SET @Start = CHARINDEX('<br />', @HTMLText)
    SET @End = @Start + 5
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, CHAR(13) + CHAR(10))
        SET @Start = CHARINDEX('<br />', @HTMLText)
        SET @End = @Start + 5
        SET @Length = (@End - @Start) + 1
    END

    -- Remove anything between <STYLE> tags
    SET @Start = CHARINDEX('<STYLE', @HTMLText)
    SET @End = CHARINDEX('</STYLE>', @HTMLText, CHARINDEX('<', @HTMLText)) + 7
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '')
        SET @Start = CHARINDEX('<STYLE', @HTMLText)
        SET @End = CHARINDEX('</STYLE>', @HTMLText, CHARINDEX('</STYLE>', @HTMLText)) + 7
        SET @Length = (@End - @Start) + 1
    END

    -- Remove anything between <SCRIPT> tags
    SET @Start = CHARINDEX('<SCRIPT', @HTMLText)
    SET @End = CHARINDEX('</SCRIPT>', @HTMLText, CHARINDEX('<', @HTMLText)) + 7
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '')
        SET @Start = CHARINDEX('<SCRIPT', @HTMLText)
        SET @End = CHARINDEX('</SCRIPT>', @HTMLText, CHARINDEX('</SCRIPT>', @HTMLText)) + 7
        SET @Length = (@End - @Start) + 1
    END

    -- Remove anything between <whatever> tags
    SET @Start = CHARINDEX('<', @HTMLText)
    SET @End = CHARINDEX('>', @HTMLText, CHARINDEX('<', @HTMLText))
    SET @Length = (@End - @Start) + 1

    WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
        SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '')
        SET @Start = CHARINDEX('<', @HTMLText)
        SET @End = CHARINDEX('>', @HTMLText, CHARINDEX('<', @HTMLText))
        SET @Length = (@End - @Start) + 1
    END

    RETURN LTRIM(RTRIM(@HTMLText))

END

-- FILTERT HTML/CSS/JS ERUIT
update Items --TABELNAAM
set Beschrijving = dbo.udf_StripHTML(Beschrijving)
--KOLOMNAAM

-- VERWIJDERT DE ONNODIGE SPACING AAN HET BEGIN VAN DE ZIN
update Items --TABELNAAM
set Beschrijving = LTRIM(RTRIM(REPLACE(REPLACE(REPLACE(Beschrijving, CHAR(9), ''), CHAR(10), ''), CHAR(13), ''))) --KOLOMNAAM
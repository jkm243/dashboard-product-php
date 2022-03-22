DECLARE @trans CHAR(100) , @value CHAR(100) ;
SET @value = CONCAT(
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))));
  
SET @trans ='TR_'+@value 

SELECT @trans 


-- Exemple TRANSACTION
REATE PROCEDURE RemoveUser (@UserID INT)
AS
 
BEGIN TRY
  BEGIN TRANSACTION Important
    DELETE FROM Users WHERE UserID = @UserID
  COMMIT TRANSACTION Important
END TRY
BEGIN CATCH
  ROLLBACK TRANSACTION Important
END CATCH
GO

        
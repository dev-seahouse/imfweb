-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkout`(
in app_id int)
BEGIN
UPDATE jobapplicant_t SET CheckOut=NOW(),MarkAsPresent='T',ExpHours=TIMESTAMPDIFF(MINUTE, CheckIn, NOW()) WHERE JobAppID=app_id;

-- set safe update off before it can be ran
-- This function is called during checkout, it checks job ids where job date<today and mark all absentees as absent.
SET SQL_SAFE_UPDATES=0;
UPDATE jobapplicant_t join job_t ON jobapplicant_t.JobID = job_t.JobID SET
    MarkAsPresent = 'F',
    ExpHours = 0
where
    JobDate < curdate()
        AND MarkAsPresent = 'A'
        AND CheckIn IS NULL;
END
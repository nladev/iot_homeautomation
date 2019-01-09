DELIMITER $$
CREATE EVENT my_event
  ON SCHEDULE
    EVERY 1 MINUTE
	DO
		BEGIN
			SET @OUTFILE =
			   CONCAT (
				   "SELECT * FROM `sensor` into outfile '/xampp/htdocs/iot/log/data-"
				   , DATE_FORMAT( NOW(), '%Y-%m-%d-%h-%i')
				   , ".csv'"
				   ,"FIELDS TERMINATED BY ','"
				   ,"ENCLOSED BY '\"'"
				   ,"LINES TERMINATED BY '\n'"
				);
            PREPARE s1 FROM @OUTFILE;
			EXECUTE s1;
            DROP PREPARE s1;
            DELETE FROM sensor;
	END $$
DELIMITER ;

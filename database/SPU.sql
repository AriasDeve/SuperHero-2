USE superhero;


DELIMITER $$
CREATE PROCEDURE spu_superhero_list(IN _publisher_id INT)
BEGIN
SELECT 	
	superhero.`id`, superhero.`superhero_name`,
	superhero.`full_name`, gender.`gender`,
	c1.`colour` 'eye_colour', c2.`colour` 'hair_colour', c3.`colour` 'skin_colour',
	race.`race`, `publisher`.`publisher_name`,
	alignment.`alignment`, superhero.`height_cm`,
	superhero.`weight_kg`
	FROM superhero 
	 INNER JOIN gender ON gender.`id` = superhero.`gender_id`
	 INNER JOIN colour c1 ON c1.`id` = superhero.`eye_colour_id`
	 INNER JOIN colour c2 ON c2.`id` = superhero.`hair_colour_id`
	 INNER JOIN colour c3 ON c3.`id` = superhero.`skin_colour_id`
	 LEFT JOIN race	ON race.`id` = superhero.`race_id`
	 LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	 LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
	WHERE superhero.`publisher_id` = _publisher_id
	ORDER BY superhero.`id`;
END $$



DELIMITER $$
CREATE PROCEDURE spu_superheroplus_list(IN _race_id INT, IN _gender_id INT, IN _alignment_id INT)
BEGIN
SELECT 	
	superhero.`id`, superhero.`superhero_name`,
	c1.`colour` 'hair_colour',`publisher`.`publisher_name`,
	superhero.`weight_kg`,  gender.`gender`, race.`race`, 
	alignment.`alignment`
	FROM superhero 
	 INNER JOIN gender ON gender.`id` = superhero.`gender_id`
	 INNER JOIN colour c1 ON c1.`id` = superhero.`hair_colour_id`	
	 LEFT JOIN race	ON race.`id` = superhero.`race_id`
	 LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	 LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
	WHERE race.`id` = _race_id AND gender.`id` = _gender_id AND alignment.`id` = _alignment_id;
END $$

   
 CALL `spu_superheroplus_list`(2,1,1);
 
	


DELIMITER $$
CREATE PROCEDURE spu_race_list()
BEGIN
SELECT * FROM race;
END$$


DELIMITER $$
CREATE PROCEDURE spu_gender_list()
BEGIN
SELECT * FROM gender;
END $$


DELIMITER $$
CREATE PROCEDURE spu_alignment_list()
BEGIN
SELECT * FROM alignment;
END $$


DELIMITER$$
CREATE PROCEDURE spu_list_bandos()
BEGIN
SELECT alignment.`alignment` AS 'label', COUNT(*) AS 'cantidad' FROM superhero
LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
GROUP BY alignment.`id`;
END $$



CALL `spu_list_bandos`()
SELECT 
alignmnet.`alignmnet`,
alignment.`id`
COUNT(*) 
FROM superhero
LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
GROUP BY alignment.`id`, alignment.`alignment`;

SELECT * FROM publisher




-- 1  
DELIMITER $$
CREATE PROCEDURE spu_ejercicio_01(IN _publisher_id INT)
BEGIN
SELECT 

	`alignment`.`id`,
	alignment.`alignment`,
	publisher.`publisher_name`,
	COUNT(*) 'ALIGNMENT'
FROM superhero
LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
WHERE superhero.`alignment_id` IN ('1','2') AND superhero.`publisher_id` = _publisher_id
GROUP BY `alignment`.`id`,`alignment`.`alignment`;
END $$

CALL `spu_ejercicio_01`('13');

-- 2 
DELIMITER $$
CREATE PROCEDURE spu_ejercicio_02()
BEGIN
SELECT 
publisher.`id`,
 publisher.`publisher_name`, colour.`colour`,
COUNT(*) 'amount'
FROM superhero
INNER JOIN colour  ON colour.`id` = superhero.`eye_colour_id`
LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
WHERE superhero.`publisher_id`IN ('13','4')
GROUP BY colour.`colour`, publisher.`publisher_name`
ORDER BY colour.`colour`;
END$$

CALL spu_ejercicio_02();

-- 3
DELIMITER $$
CREATE PROCEDURE spu_ejercicio_03()
BEGIN
SELECT publisher.`publisher_name`,alignment.`alignment`,
COUNT(*) 'amount'
FROM superhero
LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
WHERE  publisher.`id` IN('2','5','11','18','24') 
GROUP BY  publisher.`publisher_name`,`alignment`.`alignment`
ORDER BY publisher.`publisher_name`,alignment.`alignment`;
END $$

CALL spu_ejercicio_03()

-- 4
DELIMITER $$
CREATE PROCEDURE spu_ejercicio_04()
BEGIN

SELECT 
	gender.`gender`, alignment.`alignment`,
	superhero.`superhero_name`
FROM superhero
LEFT JOIN gender ON gender.`id` = superhero.`gender_id`
LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
WHERE gender.`id` IN ('1','2','3') AND  alignment.`id` IN('1','2','3','4')
ORDER BY gender.`gender`, alignment.`alignment`;
END $$

CALL spu_ejercicio_04();

-- 5
DELIMITER $$
CREATE PROCEDURE spu_ejercicio_05()
BEGIN 
SELECT race.`race`,COUNT(*) AS 'superhero'
FROM superhero
LEFT JOIN race	ON race.`id` = superhero.`race_id`
GROUP BY race.`race`;
END $$

CALL spu_ejercicio_05()



SELECT * FROM publisher
SELECT * FROM alignment
SELECT * FROM colour
SELECT * FROM gender
SELECT * FROM race

SELECT * FROM superhero  WHERE race_id = '2';

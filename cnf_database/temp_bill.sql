-- TEMP BILL TABLE
CREATE TABLE temp_bill(
	bill_id int(255),
	bill_no varchar(255),
	bill_date date,
	accesable_value float(30,2),
	comission_acc float(30,2),
	discount float(30,2),
	paid_am float(30,2),
	job_id date
);
ALTER TABLE temp_bill ADD PRIMARY KEY (bill_id);
ALTER TABLE temp_bill ADD CONSTRAINT uk_temp_bill_no UNIQUE (bill_no);
ALTER TABLE temp_bill ADD CONSTRAINT fk_temp_bill_job_id FOREIGN KEY (job_id) REFERENCES job(job_id);

-- temp bill function
DROP FUNCTION IF EXISTS temp_bill_f;
DELIMITER $$
CREATE FUNCTION temp_bill_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
DECLARE p_bill_id int(10);
SELECT MAX(bill.bill_id) INTO p_bill_id FROM bill;
IF p_bill_id is NULL THEN
SET p_bill_id=1;
ELSE 
SET p_bill_id=p_bill_id+1;
END IF;
RETURN p_bill_id;
END$$
DELIMITER ;

-- TEMP BILL----------------------------
DROP PROCEDURE IF EXISTS insert_temp_bill;
DELIMITER $$
CREATE PROCEDURE insert_temp_bill
(IN p_bill_no varchar(255),
IN p_bill_date date,
IN p_accesable_value float(30,2),
IN p_comission_acc float(30,2),
IN p_discount float(30,2),
IN p_paid_am float(30,2),
IN p_job_id int(255),
OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	
	
	INSERT INTO temp_bill
    VALUES (temp_bill_f(),
		p_bill_no,
		p_bill_date, 
		p_accesable_value,
		p_comission_acc,
		p_discount,
		p_paid_am,
		p_job_id
		);
	COMMIT;
	SET p_msg='Successful';
END$$
DELIMITER ;

-- temp total_bill_am 

DROP FUNCTION IF EXISTS total_temp_bill_am;
DELIMITER $$
CREATE FUNCTION total_temp_bill_am(p_bill_id int(255)) 
RETURNS float(15,2) 
DETERMINISTIC
BEGIN
DECLARE v_bill float(15,2);
DECLARE v_acc float(15,2);
SELECT SUM(temp_particular_d.amount*temp_particular_d.qty) INTO v_bill FROM temp_particular_d WHERE temp_particular_d.bill_id=p_bill_id;
IF v_bill is NULL THEN
SET v_bill=0;
END IF;
SELECT (temp_bill.accesable_value*temp_bill.comission_acc)/100 INTO v_acc FROM temp_bill WHERE temp_bill.bill_id=p_bill_id;
SET v_bill= v_bill+v_acc; 
RETURN v_bill;
END$$
DELIMITER ;

-- temp_bill view
CREATE OR REPLACE VIEW temp_bill_view as
SELECT temp_bill.bill_id as 'bill_id', temp_bill.bill_no as 'bill_no' , temp_bill.bill_date as 'bill_date' , temp_bill.accesable_value as 'accesable_value' , temp_bill.comission_acc as 'comission_acc',total_bill_am(temp_bill.bill_id) as 'total_bill',temp_bill.discount as 'discount' ,(total_bill_am(temp_bill.bill_id)-temp_bill.discount) as 'sub_total', temp_bill.paid_am as 'paid_am' 
FROM temp_bill; 

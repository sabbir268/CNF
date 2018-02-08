-- <<---------START INSERT PROCEDURE---------->> --
-- PORT----------------------------
DROP PROCEDURE IF EXISTS insert_port;
DELIMITER $$
CREATE PROCEDURE insert_port
(IN p_port_name varchar(30),
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	INSERT INTO port
    VALUES (port_f() , p_port_name);
	COMMIT;
	SET p_msg='Successful';
END$$
DELIMITER ;

/*
	CALL insert_port('benapol',@p_msg);
	SELECT @p_msg; 
*/

-- CUSTOMER----------------------------
DROP PROCEDURE IF EXISTS insert_customer;
DELIMITER $$
CREATE PROCEDURE insert_customer
(IN p_messers varchar(255),
	IN p_address varchar(255),
	IN p_lc_no varchar(255),
	IN p_lc_date date,
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
 	
	START TRANSACTION;
	
	INSERT INTO customer
    VALUES (customer_f(),
		p_messers,
		p_address,
		p_lc_no,
		p_lc_date
	);
	COMMIT;
	SET p_msg='Successful';
END$$
DELIMITER ;

/* CALL insert_customer('janata shop ltd.','jessore','3829382',curdate(),@p_msg);SELECT @p_msg; */


-- JOB TABLE-------------------------------
DROP PROCEDURE IF EXISTS insert_job;
DELIMITER $$
CREATE PROCEDURE insert_job
(IN p_job_no int(255) ,
	IN p_ac varchar(255),
	IN p_bill_of_entry int(255),
	IN p_date_of_bill date,
	IN p_disc_goods varchar(255),
	IN p_quantity varchar(255),
	IN p_weight float(30,2),
	IN p_ex_ss varchar(255),
	IN p_rot_no varchar(255),
	IN p_lin_no varchar(255),
	IN p_arrived_on date,
	IN p_track_recipt varchar(255),
	IN p_tr_description varchar(255),
	IN p_exporter varchar(255),
	IN p_depot varchar(255),
	IN p_cnf_value float(30,2),
	IN p_clearence_date date,
	IN p_customer_id int(255),
	IN p_port_id int(255),
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
 	START TRANSACTION;
	
	INSERT INTO job
    VALUES (job_f(),
		p_job_no,
		p_ac,
		p_bill_of_entry,
		p_date_of_bill,
		p_disc_goods,
		p_quantity,
		p_weight,
		p_ex_ss,
		p_rot_no,
		p_lin_no,
		p_arrived_on,
		p_track_recipt,
		p_tr_description,
		p_exporter,
		p_depot,
		p_cnf_value,
		p_clearence_date,
		p_customer_id,
		p_port_id
	);
	COMMIT;
	SET p_msg='Successful';
END$$
DELIMITER ;

/* CALL insert_job(1,1999,2333,curdate(),'oil',900,40,'x.p padma','8989','992',curdate(),'343h343u','something','cc','port',49000.00,curdate(),1,1,@p_msg);SELECT @p_msg; */



-- ENCLOSER----------------------------
DROP PROCEDURE IF EXISTS insert_encloser_doc;
DELIMITER $$
CREATE PROCEDURE insert_encloser_doc
(IN p_ed_name varchar(255),
	IN p_port_id int(255),
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
 	
	START TRANSACTION;
	
	INSERT INTO encloser_doc
    VALUES (encloser_doc_f(),
		p_ed_name,
		p_port_id
	);
	COMMIT;
	SET p_msg='Successful';
END$$
DELIMITER ;

/*CALL  insert_encloser_doc('TP/IP/GP',1,@p_msg);
	SELECT @p_msg;
*/


-- PARTICULER----------------------------
DROP PROCEDURE IF EXISTS insert_particular;
DELIMITER $$
CREATE PROCEDURE insert_particular
(IN p_particular_name varchar(255),
	IN p_particular_type varchar(255),
	IN p_port_id int(255),
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
 	
	START TRANSACTION;
	
	INSERT INTO particular
    VALUES (particular_f(),
		p_particular_name,
		p_particular_type,
		p_port_id
	);
	
	SET p_msg='Successful';
	COMMIT;
END$$
DELIMITER ;

/* 
	CALL insert_particular('Bill of entry Charge /Final Assesment. ','others',2,@p_msg);
	SELECT @p_msg;
*/

-- BILL----------------------------
DROP PROCEDURE IF EXISTS insert_bill;
DELIMITER $$
CREATE PROCEDURE insert_bill
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
	
	
	INSERT INTO bill
    VALUES (bill_f(),
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

/*
	CALL insert_bill(337,curdate(),450000.56,33330000,8900,389000234,1,@p_msg);
	SELECT @p_msg;
*/

-- PAYMENT----------------------------
DROP PROCEDURE IF EXISTS insert_payment;
DELIMITER $$
CREATE PROCEDURE insert_payment
(IN p_bill_id int(255),
	IN p_amount float(15,2),
	IN p_pay_date date,
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE v_total_pay_am float(15,2);
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	INSERT INTO payment
    VALUES (payment_f(),
		p_bill_id,
		p_amount, 
		p_pay_date
	);
	SELECT SUM(payment.amount) INTO v_total_pay_am FROM payment WHERE bill_id=p_bill_id;
	UPDATE bill 
	SET 
	bill.paid_am = v_total_pay_am
	WHERE bill.bill_id=p_bill_id;
	COMMIT;
	SET p_msg='Successful';
END$$
DELIMITER ;

/*
	CALL insert_payment(1,3000.89,curdate(),@p_msg);SELECT @p_msg;
*/

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


/* CALL insert_temp_bill(337,curdate(),450000.56,33330000,8900,389000234,1,@p_msg);
SELECT @p_msg; */


-- ENCLOSER DETAILS----------------------------
DROP PROCEDURE IF EXISTS insert_encloser_doc_d;
DELIMITER $$
CREATE PROCEDURE insert_encloser_doc_d
(IN p_ed_id int(255),
	IN p_ed_image varchar(2000),
	IN p_bill_id int(255),
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
 	
	START TRANSACTION;
	
	INSERT INTO encloser_doc_d
    VALUES (encloser_doc_d_f(),
		p_ed_id,
		p_ed_image,
		p_bill_id
	);
	COMMIT;
	SET p_msg='Successful';
END$$
DELIMITER ;
/*
	CALL insert_encloser_doc_d(1,'dghjkhgjkg76r687fuygu.jpg',1,@p_msg); SELECT @p_msg;
*/

-- TEMP ENCLOSER DETAILS----------------------------
DROP PROCEDURE IF EXISTS insert_temp_encloser_doc_d;
DELIMITER $$
CREATE PROCEDURE insert_temp_encloser_doc_d
(IN p_ed_id int(255),
	IN p_ed_image varchar(2000),
	IN p_bill_id int(255),
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
 	
	START TRANSACTION;
	
	INSERT INTO temp_encloser_doc_d
    VALUES (temp_encloser_doc_d_f(),
		p_ed_id,
		p_ed_image,
		p_bill_id
	);
	COMMIT;
	SET p_msg='Successful';
END$$
DELIMITER ;
/*
	CALL insert_temp_encloser_doc_d(1,'dghjkhgjkg76r687fuygu.jpg',1,@p_msg); SELECT @p_msg;
*/


-- PARTICULER DETAILS----------------------------
DROP PROCEDURE IF EXISTS insert_particular_d;
DELIMITER $$
CREATE PROCEDURE insert_particular_d
(IN p_particular_id int(255),
	IN p_amount float(15,2),
	IN p_qty float(15,2),
	IN p_bill_id int(255),
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
 	
	START TRANSACTION;
	
	INSERT INTO particular_d
    VALUES (particular_d_f(),
		p_particular_id,
		p_amount,
		p_qty,
		p_bill_id
	);
	
	SET p_msg='Successful';
	COMMIT;
END$$
DELIMITER ;

/* 
	CALL insert_particular_d(1,9000.89,1,1,@p_msg);
	SELECT @p_msg;
*/

-- TEMP PARTICULER DETAILS----------------------------
DROP PROCEDURE IF EXISTS insert_temp_particular_d;
DELIMITER $$
CREATE PROCEDURE insert_temp_particular_d
(IN p_particular_id int(255),
	IN p_amount float(15,2),
	IN p_qty float(15,2),
	IN p_bill_id int(255),
	OUT p_msg varchar(100)
)
BEGIN 
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
 	
	START TRANSACTION;
	
	INSERT INTO temp_particular_d
    VALUES (temp_particular_d_f(),
		p_particular_id,
		p_amount,
		p_qty,
		p_bill_id
	);
	SET p_msg=CONCAT('Successful ',p_amount*p_qty,' Taka Added');
	COMMIT;
END$$
DELIMITER ;

/* 
	CALL insert_temp_particular_d(1,9000.89,1,1,@p_msg);
	SELECT @p_msg;
*/

/*-----------Bank Info------------------*/
DROP PROCEDURE IF EXISTS insert_bank_info;
DELIMITER $$
CREATE PROCEDURE insert_bank_info
(IN p_bank_name	varchar(255),
	IN 	p_bank_branch varchar(255),
	IN p_bank_district varchar(255),
	IN p_bank_balance	float(30,2),
	IN p_openning_date	date,
	OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	INSERT INTO bank_info
    VALUES (bank_info_f(),p_bank_name,p_bank_branch,p_bank_district,p_bank_balance,p_openning_date);
	COMMIT;
	SET p_msg='Bank Info Successful Added';
	
END$$
DELIMITER ;
/*CALL insert_bank_info('DBBL','Jessore','Jessore',100000.00,curdate());*/

/*-----------  Bank Trans------------------*/
DROP PROCEDURE IF EXISTS insert_bank_trans;
DELIMITER $$
CREATE PROCEDURE insert_bank_trans
(IN p_bank_id int(10),
	IN 	p_bt_date date,
	IN p_bt_amount float(15,2),
	IN p_bt_status	enum('deposit', 'withdraw'),
	IN p_payment_type varchar(30),
	OUT p_msg varchar(100)
)
BEGIN
	DECLARE v_bank_balance float(15,3);
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	SELECT bank_info.bank_balance INTO v_bank_balance FROM bank_info WHERE bank_info.bank_id = p_bank_id;
	
	IF p_bt_status = 'withdraw' THEN
		
		IF (v_bank_balance = 0 OR v_bank_balance < p_bt_amount ) THEN
			SELECT 'Not Enough Balance';
			ELSE
			INSERT INTO bank_trans
			VALUES (bank_trans_f(),p_bank_id,p_bt_date,p_bt_amount,p_bt_status,p_payment_type);
			SET v_bank_balance=v_bank_balance-p_bt_amount;
			UPDATE bank_info
			SET bank_balance=v_bank_balance WHERE bank_info.bank_id = p_bank_id;
			SET p_msg='Successfully Withdrawn';
		END IF;
		
		ELSE
		INSERT INTO bank_trans
		VALUES (bank_trans_f(),p_bank_id,p_bt_date,p_bt_amount,p_bt_status,p_payment_type);
		SET v_bank_balance=v_bank_balance+p_bt_amount;
		UPDATE bank_info
		SET bank_balance=v_bank_balance WHERE bank_info.bank_id = p_bank_id;
		SET p_msg='Successfully Deposited';
	END IF;
	COMMIT;
END$$
DELIMITER ;
/*CALL insert_bank_trans(1,curdate(),2300.00,'withdraw','Check'); */


-- move to final procedure 
DROP PROCEDURE IF EXISTS finalze_cnf;
DELIMITER $$
CREATE PROCEDURE finalze_cnf(
	IN p_last_bill_id int(255),
	OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	INSERT INTO bill SELECT * FROM temp_bill WHERE bill_id = p_last_bill_id;
	INSERT INTO encloser_doc_d SELECT * FROM temp_encloser_doc_d WHERE bill_id = p_last_bill_id; 
	INSERT INTO particular_d SELECT * FROM temp_particular_d WHERE bill_id = p_last_bill_id;
	DELETE FROM temp_encloser_doc_d WHERE bill_id = p_last_bill_id;
	DELETE FROM temp_particular_d WHERE bill_id = p_last_bill_id;
	DELETE FROM temp_bill WHERE bill_id = p_last_bill_id;
	COMMIT;
	SET p_msg='A CNF successfully created';
END$$
DELIMITER ;

/* 
	CALL finalze_cnf(1,@p_msg);
	SELECT @p_msg;
*/



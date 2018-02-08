-- <<------END INSERT PROCEDURE-------->> --

-- <<------START UPDATE PROCEDURE-------->> --
-- port update----------------------------------
DROP PROCEDURE IF EXISTS update_port;
DELIMITER $$
CREATE PROCEDURE update_port
(IN	p_port_id int(255),
IN p_port_name varchar(100),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO @p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO @p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO @p_msg;
	START TRANSACTION;
	UPDATE port 
	SET 
	port_name=p_port_name
	WHERE port_id=p_port_id;
	COMMIT;
	SET p_msg='Successful Updated';
END$$
DELIMITER ;

/*
		CALL update_port('ctg',1,@p_msg);SELECT @p_msg;
*/
-- customer update----------------------------------
DROP PROCEDURE IF EXISTS update_customer;
DELIMITER $$
CREATE PROCEDURE update_customer
(IN p_customer_id int(255),
IN p_messers varchar(255),
IN p_address varchar(255),
IN p_lc_no int(255),
IN p_lc_date date,
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO @p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO @p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO @p_msg;
	START TRANSACTION;
	UPDATE customer
	SET 
	customer.messers=p_messers,
	customer.address=p_address,
	customer.lc_no=p_lc_no,
	customer.lc_date=p_lc_date
	WHERE customer.customer_id=p_customer_id;
	COMMIT;
	SET p_msg='Successful Updated';
END$$
DELIMITER ;

/*
	CALL update_customer(1,'suvo shop','jessore','38479238',curdate(),@p_msg);
	SELECT @p_msg;
*/
-- Job Update procedure ----------------------------
DROP PROCEDURE IF EXISTS update_job;
DELIMITER $$
CREATE PROCEDURE update_job
(	IN p_job_id int(10),
	IN p_job_no int(255),
	IN p_ac varchar(255),
	IN p_bill_of_entry int(255),
	IN p_date_of_bill date,
	IN p_disc_goods varchar(255),
	IN p_quantity varchar(255),
	IN p_weight float(30,2),
	IN p_ex_ss varchar(255),
	IN p_rot_no int(255),
	IN p_lin_no int(255),
	IN p_arrived_on date,
	IN p_track_recipt varchar(255),
	IN p_tr_description varchar(255),
	IN p_exporter varchar(255),
	IN p_depot varchar(255),
	IN p_cnf_value float(30,2),
	IN p_clearence_date date
	OUT p_msg varchar(100)
	)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	UPDATE job 
	SET
	job.job_no=p_job_no,
	job.ac=p_ac,
	job.bill_of_entry=p_bill_of_entry,
	job.date_of_bill=p_date_of_bill,
	job.disc_goods=p_disc_goods,
	job.quantity=p_quantity,
	job.weight=p_weight,
	job.ex_ss=p_ex_ss,
	job.rot_no=p_rot_no,
	job.lin_no=p_lin_no,
	job.arrived_on=p_arrived_on,
	job.track_recipt=p_track_recipt,
	job.tr_description=p_tr_description,
	job.exporter=p_exporter,
	job.depot=p_depot,
	job.cnf_value=p_cnf_value,
	job.clearence_date=p_clearence_date
	WHERE job_id=p_job_id ;
	COMMIT;
	SET p_msg='Successfully Updated';
END$$
DELIMITER ;

/*
	CALL update_job(1,2,2222,44444,curdate(),'oil',900,40,'x.p padma','8989','766',curdate(),'343h343u','something','cc','port',49000.00,curdate(),1,1,@p_msg);
	SELECT @p_msg;
*/

-- encloser_doc update----------------------------------
DROP PROCEDURE IF EXISTS update_encloser_doc;
DELIMITER $$
CREATE PROCEDURE update_encloser_doc
(IN ed_id int(255),
IN p_ed_name varchar(255),
IN p_status boolean,
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO @p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO @p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO @p_msg;
	START TRANSACTION;
	UPDATE encloser_doc 
	SET 
	encloser_doc.ed_name=p_ed_name,
	encloser_doc.status=p_status
	WHERE encloser_doc.ed_id=ed_id;
	COMMIT;
	SET p_msg='Successful Updated';
END$$
DELIMITER ;

/*
 CALL update_encloser_doc(1,'Landing Charg',0,1,@p_msg); SELECT @p_msg;
*/

-- particular update----------------------------------
DROP PROCEDURE IF EXISTS update_particular;
DELIMITER $$
CREATE PROCEDURE update_particular
(IN p_particular_id int(255),
IN p_particular_name varchar(255),
IN p_amount varchar(255),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO @p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO @p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO @p_msg;
	START TRANSACTION;
	UPDATE particular 
	SET
	particular.particular_name=p_particular_name,
	particular.amount=p_amount
	WHERE particular.particular_id=p_particular_id;
	COMMIT;
	SET p_msg='Successful Updated';
END$$
DELIMITER ;

/*
	CALL update_particular(1,'customer duty',900,@p_msg);SELECT @P_msg;
*/

-- bill update----------------------------------
-- DROP PROCEDURE IF EXISTS update_bill;
-- DELIMITER $$
-- CREATE PROCEDURE update_bill
-- (IN p_bill_id int(255),
-- IN p_bill_no varchar(255),
-- IN p_bill_date date,
-- IN p_commision_am float(30,2),
-- IN p_total_am float(30,2),
-- IN p_add_on_balance float(30,2),
-- IN p_grand_total float(30,2),
-- IN p_less_ad_date date,
-- IN p_net_bf float(30,2),
-- OUT p_msg varchar(100)
-- )
-- BEGIN
	-- DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO @p_msg;
	-- DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO @p_msg;
	-- DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO @p_msg;
	-- START TRANSACTION;
	-- UPDATE bill
	-- SET 
	-- bill.bill_no=p_bill_no,
	-- bill.bill_date=p_bill_date,
	-- bill.commision_am=p_commision_am,
	-- bill.total_am=p_total_am,
	-- bill.add_on_balance=p_add_on_balance,
	-- bill.grand_total=p_grand_total,
	-- bill.less_ad_date=p_less_ad_date,
	-- bill.net_bf=p_net_bf
	-- WHERE bill_id=p_bill_id;
	-- COMMIT;
	-- SET p_msg='Successful Updated';
-- END$$
-- DELIMITER ;

/* 
	CALL update_bill(2,444,curdate(),44444.56,55555,7777,9999,curdate(),23555,@p_msg);
	SELECT @p_msg;
*/


DROP PROCEDURE IF EXISTS update_bill_accesable_value;
DELIMITER $$
CREATE PROCEDURE update_bill_accesable_value
(IN p_bill_id int(255),
IN p_accesable_value float(15,2),
IN p_commision_am float(3,2),
OUT p_msg varchar(255)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	UPDATE bill 
	SET 
	bill.accesable_value = p_accesable_value,
	bill.comission_acc = p_commision_am
	WHERE bill.bill_id=p_bill_id;
	COMMIT;
	SET p_msg="Accesable value added";
END$$
DELIMITER ;

/* 
	CALL update_bill_accesable_value(1,450000.00,0.20,@p_msg);
	SELECT @p_msg;
*/


-- update_temp_bill_accesable_value
DROP PROCEDURE IF EXISTS update_temp_bill_accesable_value;
DELIMITER $$
CREATE PROCEDURE update_temp_bill_accesable_value
(IN p_bill_id int(255),
IN p_accesable_value float(15,2),
IN p_commision_am float(3,2),
OUT p_msg varchar(255)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	UPDATE temp_bill 
	SET 
	temp_bill.accesable_value = p_accesable_value,
	temp_bill.comission_acc = p_commision_am
	WHERE temp_bill.bill_id=p_bill_id;
	COMMIT;
	SET p_msg="Accesable value added";
END$$
DELIMITER ;

/* 
	CALL update_bill_accesable_value(1,450000.00,0.20,@p_msg);
	SELECT @p_msg;
*/


DROP PROCEDURE IF EXISTS update_bill_discount;
DELIMITER $$
CREATE PROCEDURE update_bill_discount
(IN p_bill_id int(255),
IN p_discount float(15,2),
OUT p_msg varchar(255)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	UPDATE bill 
	SET 
	bill.discount = p_discount
	WHERE bill.bill_id=p_bill_id;
	COMMIT;
	SET p_msg="Discount amount added";
END$$
DELIMITER ;

/* 
		CALL update_bill_discount(1,3000,@p_msg);
		SELECT @p_msg;
*/


-- update_temp_bill_discount
DROP PROCEDURE IF EXISTS update_temp_bill_discount;
DELIMITER $$
CREATE PROCEDURE update_temp_bill_discount
(IN p_bill_id int(255),
IN p_discount float(15,2),
OUT p_msg varchar(255)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	UPDATE temp_bill 
	SET 
	temp_bill.discount = p_discount
	WHERE temp_bill.bill_id=p_bill_id;
	COMMIT;
	SET p_msg="Discount amount added";
END$$
DELIMITER ;

/* 
		CALL update_temp_bill_discount(1,3000,@p_msg);
		SELECT @p_msg;
*/

-- update bill paid 
DROP PROCEDURE IF EXISTS update_bill_paid;
DELIMITER $$
CREATE PROCEDURE update_bill_paid
(IN p_bill_id int(255),
IN p_paid_am float(15,2),
OUT p_msg varchar(255)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	UPDATE bill 
	SET 
	bill.paid_am = p_paid_am
	WHERE bill.bill_id=p_bill_id;
	COMMIT;
	SET p_msg="Paid amount added";
END$$
DELIMITER ;

/* 
		CALL update_bill_paid(1,20000,@p_msg);
		SELECT @p_msg;
*/

-- update_temp_bill_paid
DROP PROCEDURE IF EXISTS update_temp_bill_paid;
DELIMITER $$
CREATE PROCEDURE update_temp_bill_paid
(IN p_bill_id int(255),
IN p_paid_am float(15,2),
OUT p_msg varchar(255)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	UPDATE temp_bill 
	SET 
	temp_bill.paid_am = p_paid_am
	WHERE temp_bill.bill_id=p_bill_id;
	COMMIT;
	SET p_msg="Paid amount added";
END$$
DELIMITER ;

/* 
		CALL update_bill_paid(1,20000,@p_msg);
		SELECT @p_msg;
*/



/*-----------Bank Info------------------*/
DROP PROCEDURE IF EXISTS update_bank_info;
DELIMITER $$
CREATE PROCEDURE update_bank_info
(IN p_bank_id int(255),
IN p_bank_name	varchar(255),
IN 	p_bank_branch varchar(255),
IN p_bank_district varchar(255),
IN p_bank_balance	float(30,2),
IN p_openning_date	date,
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000' INTO p_msg;
	START TRANSACTION;
	UPDATE bank_info 
	SET 
	bank_info.bank_name=p_bank_name,
	bank_info.bank_branch=p_bank_branch,
	bank_info.bank_district=p_bank_district,
	bank_info.bank_balance=p_bank_balance,
	bank_info.openning_date=p_openning_date
	WHERE bank_info.bank_id=p_bank_id;
	COMMIT;
	SET p_msg="Bank Info Successfully Updated";
END$$
DELIMITER ;
/*
CALL update_bank_info(1,'Agrani','Newmarket','Jessore',900000.00,curdate(),@p_msg); 
SELECT @p_msg;
*/

/*-----------Bank Trans------------------*/
DROP PROCEDURE IF EXISTS update_bank_trans;
DELIMITER $$
CREATE PROCEDURE update_bank_trans
(IN p_bt_id int(10),
IN 	p_bt_amount	float(15,2),
IN p_bt_status	enum('deposit', 'withdraw'),
IN p_payment_type varchar(30),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE v_status varchar(30);
	DECLARE b_amount float(15,2);
	DECLARE n_amount float(15,2);
	DECLARE bt_n_amount float(15,2);
	DECLARE f_amount float(15,2);
	DECLARE v_bank_id int(10);
	DECLARE v_amount float(15,2);
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' as msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered';
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000';
	START TRANSACTION;
	SELECT bank_trans.bank_id,bank_trans.bt_status,bank_trans.bt_amount INTO v_bank_id,v_status,v_amount FROM bank_trans WHERE bank_trans.bt_id=p_bt_id;
	SELECT bank_info.bank_balance INTO b_amount FROM bank_info WHERE bank_info.bank_id=v_bank_id;
	IF v_status='withdraw' THEN
		SET n_amount=b_amount+v_amount;
	ELSE 
		SET n_amount=b_amount-v_amount;
	END IF;
	IF p_bt_status='withdraw' THEN 
		SET f_amount=n_amount-p_bt_amount;
	ELSE
		SET f_amount=n_amount+p_bt_amount;
	END IF;
	
	UPDATE bank_info 
		SET bank_info.bank_balance=f_amount
	WHERE bank_info.bank_id=v_bank_id;
	
	UPDATE bank_trans
		SET bank_trans.bt_amount=p_bt_amount,bank_trans.bt_status=p_bt_status,bank_trans.payment_type=p_payment_type
		WHERE bank_trans.bt_id=p_bt_id;
		
	SET p_msg='Bank Transaction successfully Updated';
	COMMIT;
	
END$$
DELIMITER ;

/*
CALL update_bank_trans(1,'100000','withdraw','cash',@p_msg);
SELECT @p_msg;
*/

-- <<------END UPDATE PROCEDURE-------->> --
-- <<------START DELETE PROCEDURE------->> --
-- port delete
DROP PROCEDURE IF EXISTS delete_port;
DELIMITER $$
CREATE PROCEDURE delete_port
(
IN p_port_id int(255),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'Delete not possible' INTO p_msg;
	START TRANSACTION;
	DELETE FROM port WHERE port.port_id=p_port_id;
	SET p_msg='Deleted successfully';
	COMMIT;
END$$
DELIMITER ;
-- customer delete
DROP PROCEDURE IF EXISTS delete_customer;
DELIMITER $$
CREATE PROCEDURE delete_customer
(
IN p_customer_id int(255),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'Delete not possible' INTO p_msg;
	START TRANSACTION;
	DELETE FROM customer WHERE customer.customer_id=p_customer_id;
	SET p_msg='Deleted successfully';
	COMMIT;
END$$
DELIMITER ;
-- job delete
DROP PROCEDURE IF EXISTS delete_job;
DELIMITER $$
CREATE PROCEDURE delete_job
(
IN p_job_id int(10),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'Delete not possible' INTO p_msg;
	START TRANSACTION;
	DELETE FROM job WHERE job.job_id=p_job_id;
	SET p_msg='Deleted successfully';
	COMMIT;
END$$
DELIMITER ;
-- encloser_doc delete
DROP PROCEDURE IF EXISTS delete_encloser_doc;
DELIMITER $$
CREATE PROCEDURE delete_encloser_doc
(
IN p_ed_id int(255),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'Delete not possible' INTO p_msg;
	START TRANSACTION;
	DELETE FROM encloser_doc WHERE encloser_doc.ed_id=p_ed_id;
	SET p_msg='Deleted successfully';
	COMMIT;
END$$
DELIMITER ;
-- particular delete
DROP PROCEDURE IF EXISTS delete_particular;
DELIMITER $$
CREATE PROCEDURE delete_particular
(
IN p_particular_id int(255),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'Delete not possible' INTO p_msg;
	START TRANSACTION;
	DELETE FROM particular WHERE particular.particular_id=p_particular_id;
	SET p_msg='Deleted successfully';
	COMMIT;
END$$
DELIMITER ;

-- bill delete
DROP PROCEDURE IF EXISTS delete_bill;
DELIMITER $$
CREATE PROCEDURE delete_bill
(
IN p_bill_id int(255),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'Delete not possible' INTO p_msg;
	START TRANSACTION;
	DELETE FROM bill WHERE bill.bill_id=p_bill_id;
	SET p_msg='Deleted successfully';
	COMMIT;
END$$
DELIMITER ;

-- delete_payment
DROP PROCEDURE IF EXISTS delete_payment;
DELIMITER $$
CREATE PROCEDURE delete_payment
(
IN p_pay_id int(255),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE v_pay_amount float(15,2);
	DECLARE v_old_paid_amount float(15,2);
	DECLARE v_bill_id int(255);
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'Delete not possible' INTO p_msg;
	START TRANSACTION;
	
	SELECT payment.amount INTO v_pay_amount FROM payment WHERE payment.pay_id=p_pay_id;
	SELECT payment.bill_id INTO v_bill_id FROM payment WHERE payment.pay_id=p_pay_id;
	SELECT bill.paid_am INTO v_old_paid_amount FROM bill WHERE bill.bill_id=v_bill_id;
	
	SET v_old_paid_amount = v_old_paid_amount-v_pay_amount;
	
	UPDATE bill 
	SET 
	bill.paid_am = v_old_paid_amount
	WHERE bill.bill_id=v_bill_id;
	
	DELETE FROM payment WHERE payment.pay_id=p_pay_id;
	SET p_msg='Deleted successfully';
	
	COMMIT;
END$$
DELIMITER ;
/* 
	
*/

-- bank_info delete
DROP PROCEDURE IF EXISTS delete_bank_info;
DELIMITER $$
CREATE PROCEDURE delete_bank_info
(
IN p_bank_id int(255),
OUT p_msg varchar(100)
)
BEGIN
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate entry is not allowd' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered' INTO p_msg;
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'Delete not possible' INTO p_msg;
	START TRANSACTION;
	DELETE FROM bank_info WHERE bank_info.bank_id=p_bank_id;
	SET p_msg='Deleted successfully';
	COMMIT;
END$$
DELIMITER ;
-- bank_trans delete
DROP PROCEDURE IF EXISTS delete_bank_trans;
DELIMITER $$
CREATE PROCEDURE delete_bank_trans
(	IN p_bt_id int(10),
	OUT p_msg varchar(100)
)
BEGIN
	DECLARE v_amount float(15,2);
	DECLARE n_amount float(15,2);
	DECLARE b_amount float(15,2);
	DECLARE v_bank_id int(10);
	DECLARE v_status varchar(20);
	DECLARE EXIT HANDLER FOR 1062 SELECT 'Duplicate keys error encountered' as msg;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'SQLException encountered';
	DECLARE EXIT HANDLER FOR SQLSTATE '23000' SELECT 'SQLSTATE 23000';
	START TRANSACTION;
	SELECT bank_trans.bt_amount,bank_trans.bank_id,bank_trans.bt_status INTO v_amount,v_bank_id,v_status FROM bank_trans WHERE bank_trans.bt_id=p_bt_id;
	SELECT bank_info.bank_balance INTO b_amount FROM bank_info WHERE bank_info.bank_id=v_bank_id;
	IF v_status='withdraw' THEN
		SET n_amount=b_amount+v_amount;
		UPDATE bank_info
		SET bank_info.bank_balance=n_amount
		WHERE bank_info.bank_id=v_bank_id;
	SET p_msg='A Bank Transaction record successfully delete and added to Bank Balance';
	ELSE 
		SET n_amount=b_amount-v_amount;
		UPDATE bank_info
		SET bank_info.bank_balance=n_amount
		WHERE bank_info.bank_id=v_bank_id;
		SET p_msg='A Bank Transaction record successfully delete and substract from Bank Balance';
	END IF;
	DELETE FROM bank_trans WHERE bank_trans.bt_id=p_bt_id;
	COMMIT;
	END$$
	DELIMITER ;
	
	/* CALL delete_bank_trans(1,@p_msg); SELECT @p_msg; */
-- <<------END DELETE PROCEDURE------->> --

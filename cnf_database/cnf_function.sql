-- job_id function
DROP FUNCTION IF EXISTS job_f;
DELIMITER $$
CREATE FUNCTION job_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_job_id int(10);
	SELECT MAX(job.job_id) INTO v_job_id FROM job;
	IF v_job_id is NULL THEN
		SET v_job_id=1;
		ELSE 
		SET v_job_id=v_job_id+1;
	END IF;
	RETURN v_job_id;
END$$
DELIMITER ;

-- customer_id function
DROP FUNCTION IF EXISTS customer_f;
DELIMITER $$
CREATE FUNCTION customer_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_customer_id int(10);
	SELECT MAX(customer.customer_id) INTO v_customer_id FROM customer;
	IF v_customer_id is NULL THEN
		SET v_customer_id=1;
		ELSE 
		SET v_customer_id=v_customer_id+1;
	END IF;
	RETURN v_customer_id;
END$$
DELIMITER ;

-- port_id function
DROP FUNCTION IF EXISTS port_f;
DELIMITER $$
CREATE FUNCTION port_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_port_id int(10);
	SELECT MAX(port.port_id) INTO v_port_id FROM port;
	IF v_port_id is NULL THEN
		SET v_port_id=1;
		ELSE 
		SET v_port_id=v_port_id+1;
	END IF;
	RETURN v_port_id;
END$$
DELIMITER ;

-- ed_id(encloser) function
DROP FUNCTION IF EXISTS encloser_doc_f;
DELIMITER $$
CREATE FUNCTION encloser_doc_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_ed_id int(10);
	SELECT MAX(encloser_doc.ed_id) INTO v_ed_id FROM encloser_doc;
	IF v_ed_id is NULL THEN
		SET v_ed_id=1;
		ELSE 
		SET v_ed_id=v_ed_id+1;
	END IF;
	RETURN v_ed_id;
END$$
DELIMITER ;

-- edd_id(encloser_doc_d) function
DROP FUNCTION IF EXISTS encloser_doc_d_f;
DELIMITER $$
CREATE FUNCTION encloser_doc_d_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_edd_id int(10);
	SELECT MAX(encloser_doc_d.edd_id) INTO v_edd_id FROM encloser_doc_d;
	IF v_edd_id is NULL THEN
		SET v_edd_id=1;
		ELSE 
		SET v_edd_id=v_edd_id+1;
	END IF;
	RETURN v_edd_id;
END$$
DELIMITER ;

-- temp edd_id(encloser_doc_d) function
DROP FUNCTION IF EXISTS temp_encloser_doc_d_f;
DELIMITER $$
CREATE FUNCTION temp_encloser_doc_d_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_edd_id int(10);
	DECLARE v_temp_edd_id int(10);
	SELECT MAX(temp_encloser_doc_d.edd_id) INTO v_temp_edd_id FROM temp_encloser_doc_d;
	IF v_temp_edd_id IS NULL THEN
		SELECT MAX(encloser_doc_d.edd_id) INTO v_edd_id FROM encloser_doc_d;
		IF v_edd_id is NULL THEN
			SET v_edd_id=1;
			ELSE 
			SET v_edd_id=v_edd_id+1;
		END IF;
		ELSE 
		SET v_edd_id=v_temp_edd_id+1;
	END IF;
	RETURN v_edd_id;
END$$
DELIMITER ;

-- particular_id function
DROP FUNCTION IF EXISTS particular_f;
DELIMITER $$
CREATE FUNCTION particular_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_particular_id int(10);
	SELECT MAX(particular.particular_id) INTO v_particular_id FROM particular;
	IF v_particular_id is NULL THEN
		SET v_particular_id=1;
		ELSE 
		SET v_particular_id=v_particular_id+1;
	END IF;
	RETURN v_particular_id;
END$$
DELIMITER ;

-- pd_id function
DROP FUNCTION IF EXISTS particular_d_f;
DELIMITER $$
CREATE FUNCTION particular_d_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_particular_d_id int(10);
	SELECT MAX(particular_d.pd_id) INTO v_particular_d_id FROM particular_d;
	IF v_particular_d_id is NULL THEN
		SET v_particular_d_id=1;
		ELSE 
		SET v_particular_d_id=v_particular_d_id+1;
	END IF;
	RETURN v_particular_d_id;
END$$
DELIMITER ;

-- temp_pd_id function
DROP FUNCTION IF EXISTS temp_particular_d_f;
DELIMITER $$
CREATE FUNCTION temp_particular_d_f() 
RETURNS int(10) 
DETERMINISTIC 
BEGIN
	DECLARE v_temp_pd_id int(10);
	DECLARE v_null_pd_id int(10);
	SELECT MAX(temp_particular_d.pd_id) INTO v_null_pd_id FROM temp_particular_d;
	IF v_null_pd_id IS NULL THEN
		SELECT MAX(particular_d.pd_id) INTO v_temp_pd_id FROM particular_d;
		IF v_temp_pd_id is NULL THEN
			SET v_temp_pd_id=1;
			ELSE 
			SET v_temp_pd_id=v_temp_pd_id+1;
		END IF;
		ELSE 
		SET v_temp_pd_id=v_null_pd_id+1;
	END IF;
	RETURN v_temp_pd_id;
END$$
DELIMITER ;

-- bill function
DROP FUNCTION IF EXISTS bill_f;
DELIMITER $$
CREATE FUNCTION bill_f() 
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

-- bill payment function
DROP FUNCTION IF EXISTS payment_f;
DELIMITER $$
CREATE FUNCTION payment_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE p_pay_id int(10);
	SELECT MAX(payment.pay_id) INTO p_pay_id FROM payment;
	IF p_pay_id is NULL THEN
		SET p_pay_id=1;
		ELSE 
		SET p_pay_id=p_pay_id+1;
	END IF;
	RETURN p_pay_id;
END$$
DELIMITER ;



-- temp bill function
DROP FUNCTION IF EXISTS temp_bill_f;
DELIMITER $$
CREATE FUNCTION temp_bill_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE p_bill_id int(10);
	DECLARE p_temp_bill_id int(10);
	SELECT MAX(temp_bill.bill_id) INTO p_temp_bill_id FROM temp_bill;
	IF p_temp_bill_id IS NULL THEN
		SELECT MAX(bill.bill_id) INTO p_bill_id FROM bill;
		IF p_bill_id is NULL THEN
			SET p_bill_id=1;
			ELSE 
			SET p_bill_id=p_bill_id+1;
		END IF;
		ELSE 
		SET p_bill_id = p_temp_bill_id+1;
	END IF;
	RETURN p_bill_id;
END$$
DELIMITER ;


-- bank_id function
DROP FUNCTION IF EXISTS bank_info_f;
DELIMITER $$
CREATE FUNCTION bank_info_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_bank_id int(10);
	SELECT MAX(bank_info.bank_id) INTO v_bank_id FROM bank_info;
	IF v_bank_id is NULL THEN
		SET v_bank_id=1;
		ELSE 
		SET v_bank_id=v_bank_id+1;
	END IF;
	RETURN v_bank_id;
END$$
DELIMITER ;

-- bank_trans function
DROP FUNCTION IF EXISTS bank_trans_f;
DELIMITER $$
CREATE FUNCTION bank_trans_f() 
RETURNS int(10) 
DETERMINISTIC
BEGIN
	DECLARE v_bank_trans int(10);
	SELECT MAX(bank_trans.bt_id) INTO v_bank_trans FROM bank_trans;
	IF v_bank_trans is NULL THEN
		SET v_bank_trans=1;
		ELSE 
		SET v_bank_trans=v_bank_trans+1;
	END IF;
	RETURN v_bank_trans;
END$$
DELIMITER ;


-- total_bill_am 

DROP FUNCTION IF EXISTS total_bill_am;
DELIMITER $$
CREATE FUNCTION total_bill_am(p_bill_id int(255)) 
RETURNS float(15,2) 
DETERMINISTIC
BEGIN
	DECLARE v_bill float(15,2);
	DECLARE v_acc float(15,2);
	SELECT SUM(particular_d.amount*particular_d.qty) INTO v_bill FROM particular_d WHERE particular_d.bill_id=p_bill_id;
	IF v_bill is NULL THEN
		SET v_bill=0;
	END IF;
	SELECT (bill.accesable_value*bill.comission_acc)/100 INTO v_acc FROM bill WHERE bill.bill_id=p_bill_id;
	SET v_bill= v_bill+v_acc; 
	RETURN v_bill;
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

-- bill_to_lc 
DROP FUNCTION IF EXISTS bill_to_lc;
DELIMITER $$
CREATE FUNCTION bill_to_lc(p_bill_id int(255)) 
RETURNS varchar(255)
DETERMINISTIC
BEGIN
	DECLARE v_lc varchar(255);
	SELECT customer.lc_no INTO v_lc FROM customer , job , bill WHERE customer.customer_id = job.customer_id AND job.job_id = bill.job_id AND bill.bill_id=p_bill_id;
	RETURN v_lc;
END$$
DELIMITER ;

-- customer messers to bill
DROP FUNCTION IF EXISTS messers_to_bill;
DELIMITER $$
CREATE FUNCTION messers_to_bill(p_bill_id int(255)) 
RETURNS varchar(255)
DETERMINISTIC
BEGIN
	DECLARE v_messers varchar(255);
	SELECT customer.messers INTO v_messers FROM customer , job , bill WHERE customer.customer_id = job.customer_id AND job.job_id = bill.job_id AND bill.bill_id=p_bill_id;
	RETURN v_messers;
END$$
DELIMITER ;

-- customer address to bill
DROP FUNCTION IF EXISTS address_to_bill;
DELIMITER $$
CREATE FUNCTION address_to_bill(p_bill_id int(255)) 
RETURNS varchar(255)
DETERMINISTIC
BEGIN
	DECLARE v_address varchar(255);
	SELECT customer.address INTO v_address FROM customer , job , bill WHERE customer.customer_id = job.customer_id AND job.job_id = bill.job_id AND bill.bill_id=p_bill_id;
	RETURN v_address;
END$$
DELIMITER ;

-- bill to goods
DROP FUNCTION IF EXISTS bill_to_goods;
DELIMITER $$
CREATE FUNCTION bill_to_goods(p_bill_id int(255)) 
RETURNS varchar(255)
DETERMINISTIC
BEGIN
	DECLARE v_dec varchar(255);
	SELECT job.disc_goods INTO v_dec FROM job , bill WHERE job.job_id = bill.job_id AND bill.bill_id=p_bill_id;
	RETURN v_dec;
END$$
DELIMITER ;


DROP FUNCTION IF EXISTS bill_incomplete_status;
DELIMITER $$
CREATE FUNCTION bill_incomplete_status(p_bill_id int(255)) 
RETURNS varchar(255)
DETERMINISTIC
BEGIN
	DECLARE v_temp_pd_id int(255);
	DECLARE v_pd_id int(255);
	DECLARE v_msg varchar(255);
	SELECT MAX(temp_particular_d.pd_id) INTO v_temp_pd_id FROM temp_particular_d WHERE temp_particular_d.bill_id=p_bill_id;
	
	SELECT MAX(particular_d.pd_id) INTO v_pd_id FROM particular_d WHERE particular_d.bill_id=p_bill_id;
	
	IF v_temp_pd_id IS NOT NULL THEN
		SET v_msg= 'Incomplete';
		ELSE 
		IF v_pd_id IS NULL THEN
			SET v_msg='empty';
			ELSE
			SET v_msg='Complete';
		END IF;
	END IF; 
	RETURN v_msg;
END$$
DELIMITER ;


DROP FUNCTION IF EXISTS particular_amount_f;
DELIMITER $$
CREATE FUNCTION particular_amount_f(p_particular_id int(255)) 
RETURNS varchar(255)
DETERMINISTIC
BEGIN
	DECLARE v_particular_id int(255);
	DECLARE v_pd_id int(255);
	DECLARE v_amount int(255);
	SELECT particular.particular_id INTO v_particular_id FROM particular WHERE particular.particular_id=p_particular_id;
	
	SELECT particular_d.particular_id INTO v_pd_id FROM particular_d WHERE particular_d.particular_id=p_particular_id;
	
	IF v_particular_id=v_pd_id THEN 
		SELECT particular_d.amount INTO v_amount FROM particular_d WHERE particular_d.particular_id=v_particular_id;
		ELSE 
		SET v_amount = NULL;
	END IF;
	RETURN v_amount;
END$$
DELIMITER ;





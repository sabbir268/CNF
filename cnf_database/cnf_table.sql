-- PORT TABLE
CREATE TABLE port(
	port_id int(255),
	port_name varchar(100) NOT NULL
);
-- CUSTOMER TABLE
CREATE TABLE customer(
	customer_id int(255),
	messers varchar(255) NOT NULL,	
	address varchar(255) NOT NULL,
	lc_no varchar(255) NOT NULL,
	lc_date date
);
-- JOB TABLE
CREATE TABLE job(
	job_id int(10),
	job_no varchar(255) NOT NULL,
	ac varchar(255) NOT NULL,
	bill_of_entry int(255) NOT NULL,
	date_of_bill date,
	disc_goods varchar(255) NOT NULL,
	quantity varchar(255) NOT NULL,
	weight float(30,2) NOT NULL,
	ex_ss varchar(255) NOT NULL,
	rot_no varchar(255) NOT NULL,
	lin_no varchar(255) NOT NULL,
	arrived_on date,
	track_recipt varchar(255),
	tr_description varchar(255),
	exporter varchar(255) NOT NULL,
	depot varchar(255) NOT NULL,
	cnf_value float(30,2) NOT NULL,
	clearence_date date,
	customer_id int(255) NOT NULL,
	port_id int(255)
);

-- ENCLOSER TABLE
CREATE TABLE encloser_doc(
	ed_id int(255),
	ed_name varchar(255),
	port_id int(255)
);


-- PARTICULAR TABLE
CREATE TABLE particular(
	particular_id int(255),
	particular_name varchar(255),
	port_id int(255)
);
-- BILL TABLE
CREATE TABLE bill(
	bill_id int(255),
	bill_no varchar(255),
	bill_date date,
	accesable_value float(30,2),
	comission_acc float(30,2),
	discount float(30,2),
	paid_am float(30,2),
	job_id int(255)
); 

-- BILL PAYMENT
CREATE TABLE payment(
	pay_id int(255),
	bill_id int(255),
	amount float(15,2),
	pay_date date
); 

	
-- TEMP BILL TABLE
CREATE TABLE temp_bill(
	bill_id int(255),
	bill_no varchar(255),
	bill_date date,
	accesable_value float(30,2),
	comission_acc float(30,2),
	discount float(30,2),
	paid_am float(30,2),
	job_id int(255)
);


-- ENCLOSER DETAILS TABLE
CREATE TABLE encloser_doc_d(
	edd_id int(255),
	ed_id int(255),
	ed_image varchar(2000),
	bill_id int(255)
);

-- TEMP ENCLOSER DETAILS TABLE
CREATE TABLE temp_encloser_doc_d(
	edd_id int(255),
	ed_id int(255),
	ed_image varchar(2000),
	bill_id int(255)
);

-- PARTICULAR DETAILS TABLE
CREATE TABLE particular_d(
	pd_id int(255),
	particular_id int(255),
	amount float(15,2),
	qty float(15,2),
	bill_id int(255)
);


-- TEMP PARTICULAR DETAILS TABLE
CREATE TABLE temp_particular_d(
	pd_id int(255),
	particular_id int(255),
	amount float(15,2),
	qty float(15,2),
	bill_id int(255)
);


-- BANK INFO TABLE
CREATE TABLE bank_info(
	bank_id int(255),
	bank_name varchar(255) NOT NULL,
	bank_branch varchar(255) NOT NULL,
	bank_district varchar(255) NOT NULL,
	bank_balance float(30,2) NOT NULL,
	opening_date date
);
-- BANK TRANSACTION TABLE
CREATE TABLE bank_trans(
	bt_id int(255),
	bt_date varchar(255) NOT NULL,
	bt_amount float(30,2) NOT NULL,
	bt_status varchar(255) NOT NULL,
	payment_type varchar(30) NOT NULL,
	bank_id int(255)
);
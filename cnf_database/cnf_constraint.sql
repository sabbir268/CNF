-- port table-------------------------------------------------
ALTER TABLE port ADD PRIMARY KEY (port_id);
ALTER TABLE port ADD CONSTRAINT uk_port_port_name UNIQUE (port_name);

-- customer table--------------------------------------------
ALTER TABLE customer ADD PRIMARY KEY (customer_id);

-- job table -----------------------------------------------
ALTER TABLE job ADD PRIMARY KEY (job_id);
ALTER TABLE job ADD CONSTRAINT uk_job_bill_of_entry UNIQUE (bill_of_entry);
ALTER TABLE job ADD CONSTRAINT fk_job_customer_id FOREIGN KEY (customer_id) REFERENCES customer(customer_id);
ALTER TABLE job ADD CONSTRAINT fk_job_port_id FOREIGN KEY (port_id) REFERENCES port(port_id);


-- encloser_doc table-----------------------------------------------
ALTER TABLE encloser_doc ADD PRIMARY KEY (ed_id);
ALTER TABLE encloser_doc ADD CONSTRAINT uk_encloser_doc_name UNIQUE (ed_name);
ALTER TABLE encloser_doc ADD CONSTRAINT fk_port_id FOREIGN KEY (port_id) REFERENCES port(port_id);


-- particular table----------------------------------------------
ALTER TABLE particular ADD PRIMARY KEY (particular_id);
ALTER TABLE particular ADD CONSTRAINT uk_particular_name UNIQUE (particular_name);
ALTER TABLE particular ADD CONSTRAINT fk_particular_port_id FOREIGN KEY (port_id) REFERENCES port(port_id);


-- bill table--------------------------------------------
ALTER TABLE bill ADD PRIMARY KEY (bill_id);
ALTER TABLE bill ADD CONSTRAINT uk_bill_no UNIQUE (bill_no);
ALTER TABLE bill ADD CONSTRAINT fk_bill_job_id FOREIGN KEY (job_id) REFERENCES job(job_id);

-- payment table --------------------------------------------
ALTER TABLE payment ADD PRIMARY KEY (pay_id);
ALTER TABLE payment ADD CONSTRAINT fk_payment_bill_id FOREIGN KEY (bill_id) REFERENCES bill(bill_id);
	
-- encloser_doc details  table-----------------------------------------------
ALTER TABLE encloser_doc_d ADD PRIMARY KEY (edd_id);
ALTER TABLE encloser_doc_d ADD CONSTRAINT fk_encd_bill_id FOREIGN KEY (bill_id) REFERENCES bill(bill_id);
ALTER TABLE encloser_doc_d ADD CONSTRAINT fk_encd_ed_id FOREIGN KEY (ed_id) REFERENCES encloser_doc(ed_id);
ALTER TABLE encloser_doc_d ADD CONSTRAINT uk_encd_bill_id UNIQUE (bill_id,ed_id);


-- temp encloser_doc details  table-----------------------------------------------
ALTER TABLE temp_encloser_doc_d ADD PRIMARY KEY (edd_id);
ALTER TABLE temp_encloser_doc_d ADD CONSTRAINT fk_temp_encd_bill_id FOREIGN KEY (bill_id) REFERENCES temp_bill(bill_id);
ALTER TABLE temp_encloser_doc_d ADD CONSTRAINT fk_temp_encd_ed_id FOREIGN KEY (ed_id) REFERENCES encloser_doc(ed_id);
ALTER TABLE temp_encloser_doc_d ADD CONSTRAINT uk_temp_encd_bill_id UNIQUE (bill_id,ed_id);


-- particular details table----------------------------------------------
ALTER TABLE particular_d ADD PRIMARY KEY (pd_id);
ALTER TABLE particular_d ADD CONSTRAINT fk_pd_bill_id FOREIGN KEY (bill_id) REFERENCES bill(bill_id);
ALTER TABLE particular_d ADD CONSTRAINT fk_particular_id FOREIGN KEY (particular_id) REFERENCES particular(particular_id);
ALTER TABLE particular_d ADD CONSTRAINT uk_particular_d_name_bill UNIQUE (bill_id,pd_id);


-- temp particular details table----------------------------------------------
ALTER TABLE temp_particular_d ADD PRIMARY KEY (pd_id);
ALTER TABLE temp_particular_d ADD CONSTRAINT fk_temp_pd_bill_id FOREIGN KEY (bill_id) REFERENCES temp_bill(bill_id);
ALTER TABLE temp_particular_d ADD CONSTRAINT fk_temp_particular_id FOREIGN KEY (particular_id) REFERENCES particular(particular_id);
ALTER TABLE temp_particular_d ADD CONSTRAINT uk_temp_particular_id UNIQUE (particular_id);
ALTER TABLE temp_particular_d ADD CONSTRAINT uk_temp_particular_d_name_bill UNIQUE (bill_id,pd_id);
-- bank info table--------------------------------------------

ALTER TABLE bank_info ADD PRIMARY KEY (bank_id);
ALTER TABLE bank_info ADD CONSTRAINT uk_bank UNIQUE (bank_name,bank_branch,bank_district);

-- bank trans table--------------------------------------------

ALTER TABLE bank_trans ADD PRIMARY KEY (bt_id);
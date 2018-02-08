CREATE OR REPLACE VIEW customer_option_view AS
SELECT customer.customer_id as 'customer_id' , customer.messers as 'messers' 
FROM customer;

CREATE OR REPLACE VIEW job_option_view AS
SELECT job.job_id as 'job_id' , job.job_no as 'job_no' 
FROM job;



CREATE OR REPLACE VIEW bill_view as
SELECT bill.bill_id as 'bill_id', bill.bill_no as 'bill_no' , bill.bill_date as 'bill_date', job.job_no as 'job_no',job.customer_id as 'customer_id' ,messers_to_bill(bill.bill_id) as 'messers',address_to_bill(bill.bill_id) as 'address', bill_to_lc(bill.bill_id) as 'bill_lc' ,job.ac as 'ac',bill.accesable_value as 'accesable_value' , bill.comission_acc as 'comission_acc' , round(((bill.accesable_value*bill.comission_acc)/100),2)  as 'net_comission_am' ,total_bill_am(bill.bill_id) as 'total_bill' , bill.discount as 'discount' , (total_bill_am(bill.bill_id)-bill.discount) as 'sub_total', bill.paid_am as 'paid_am' ,((total_bill_am(bill.bill_id)-bill.discount)-bill.paid_am) as 'due' , bill_incomplete_status(bill.bill_id) as 'status' , bill_to_goods(bill.bill_id) as 'desc', job.port_id as 'port_id'
FROM bill , job WHERE bill.job_id=job.job_id; 

-- temp_bill view
CREATE OR REPLACE VIEW temp_bill_view as
SELECT temp_bill.bill_id as 'bill_id', temp_bill.bill_no as 'bill_no' , temp_bill.bill_date as 'bill_date' , temp_bill.accesable_value as 'accesable_value' , temp_bill.comission_acc as 'comission_acc',total_temp_bill_am(temp_bill.bill_id) as 'total_bill',temp_bill.discount as 'discount' ,(total_temp_bill_am(temp_bill.bill_id)-temp_bill.discount) as 'sub_total', temp_bill.paid_am as 'paid_am' 
FROM temp_bill; 

CREATE OR REPLACE VIEW particular_with_amount as 
SELECT particular.particular_id as 'particular_id', particular.particular_name as 'particular_name' ,particular_amount_f(particular.particular_id) as 'amount' 
FROM particular;





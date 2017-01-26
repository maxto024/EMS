CREATE TABLE  TABLE_TEST(
	EMP_ID NUMERIC(5),
	EMP_NAME VARCHAR2(50),
	DESIGNATION NUMERIC(2),
	SCALE NUMERIC(2),
	TYPES NUMERIC(2),
	JOIN_DATE DATE,
	 dept_EMP_ID number(4,0),
	PRIMARY KEY(EMP_ID)
);

CREATE TABLE SCALES (
	SCALE  NUMERIC(2),
	BASIC_AMOUNT NUMERIC(10,3),
	HOUSING NUMERIC(3),
	TRANSPORT NUMERIC(3),
	PRIMARY KEY(SCALE)
);
create table transaction (Tid varchar2(30) primary key,
                          trans_date date,
                          emp_id number(6,0),
                          salary number(10,0),
                          foreign key(emp_id) references TABLE_TEST(EMP_ID));
ALTER TABLE TABLE_TEST ADD SALARY number(10,2);
ALTER TABLE TABLE_TEST ADD TAXE number(10,2);

create or replace procedure make_transaction(garbage number)is

cursor employee_cursor is
 select EMP_ID,SCALE,types from TABLE_TEST;

EMPLOYEE_ID TABLE_TEST.EMP_ID%type;
emp_scale TABLE_TEST.SCALE%type;
emp_type TABLE_TEST.TYPES%type; 
scale_BASIC_AMOUNT SCALES.BASIC_AMOUNT %type;
scale_housing SCALES.housing%type;
SCALESransport SCALES.transport%type;
scale_salary transaction.salary%type;
normalsalary transaction.salary%type; --salary of an TABLE_TEST who join a the begining of a month
employee_salary transaction.salary%type; --salary of an employe who dEMP_IDn't join a the begining of the month
transaction_number number(10,0); --variable to chech if an TABLE_TEST ever get paEMP_ID
total_day number(2,0); -- variable to get the total number of day in his hired month
hire_day number(2,0); -- hire day of the TABLE_TEST
transaction_id transaction.Tid%type; --variable to get the transaction EMP_ID;
date_and_time varchar2(40); --variable to get the date and time of a particular TABLE_TEST's transaction
j number(9,0);
--begining of the transaction procedure
begin

open employee_cursor;

loop 
   fetch employee_cursor into employee_id,emp_scale,emp_type;
    --get the salary of the one who was not hire the first day of the month
select count(tid) into transaction_number  from transaction where emp_id=employee_id;          
   -- DBMS_OUTPUT.put_line(emp_EMP_ID);
   exit when employee_cursor%NOTFOUND;
  
   if employee_cursor%FOUND THEN
      select BASIC_AMOUNT,housing,transport into scale_BASIC_AMOUNT,scale_housing,SCALESransport
            from SCALES where SCALE=emp_scale;
          
       if sql%found then
           --calculate the salary or someone who get hire the first day of the month
           normalsalary:=scale_BASIC_AMOUNT+scale_BASIC_AMOUNT*(scale_housing/100)+scale_BASIC_AMOUNT*(SCALESransport/100);
           
           
           if transaction_number=0 then
               --get the number of day in his hiring month
               select to_number(to_char(last_day(JOIN_DATE),'dd')) into total_day 
               from TABLE_TEST
               where EMP_ID=employee_id;
              
               --get the day the the TABLE_TEST get hire
			   
               select to_number(to_char(JOIN_DATE,'DD'))into hire_day 
                  from TABLE_TEST
                  where EMP_ID=employee_id;
                 
               -- get the salary of the TABLE_TEST
               employee_salary:=(normalsalary*(total_day-hire_day))/total_day;
           elsif  transaction_number>0 then
             employee_salary:=normalsalary;
           end if;
           transaction_number:=0;
           
       end if;
       --generating the transaction EMP_ID
       /*this loop has no use it is just to slow the cpu a bit to get different transaction EMP_ID
       since the cpu is so fast event when i'm fetching the millisecond there will be some TABLE_TEST
       who will have the same transaction_EMP_ID which is a primary key*/
       for i in 1..2000000 loop
        j:=j+1;
       end loop;
       select to_char(systimestamp,'DDMMYYYYhhmissff3') into date_and_time 
            from dual;
        --the if condition have to be made here with TYPES;
		if emp_type=1 then transaction_ID:='AC';
		else transaction_ID:='AD';
		END IF;
       --transaction_EMP_ID:=concat(transaction_EMP_ID,substr(to_char(emp_EMP_ID),5,2));
       transaction_ID:=concat(transaction_ID,substr(date_and_time,5,4));
       transaction_ID:=concat(transaction_ID,substr(date_and_time,3,2));
       transaction_ID:=concat(transaction_ID,substr(date_and_time,1,2));
       transaction_ID:=concat(transaction_ID,substr(date_and_time,9,9)); 
       insert into transaction values(transaction_id,current_date,employee_id,employee_salary);
       UPDATE TABLE_TEST SET SALARY=employee_salary WHERE EMP_ID=employee_id; 
   end if; 
   
end loop;
close employee_cursor;
commit;
end;
/
---------
/* The call */
$sql = "CALL make_transaction(:parameter)";

/* Parse connection and sql */
$foo = oci_parse($conn, $sql);

/* Binding Parameters */
oci_bind_by_name($foo, ':parameter', $page) ;

/* Execute */
$res = oci_execute($foo);

/* Get the output on the screen */
print_r($res, true);


/* The call */
$sql = "CALL view_institution(:parameter)";

/* Parse connection and sql */
$foo = oci_parse($conn, $sql);

/* Binding Parameters */
oci_bind_by_name($foo, ':parameter', $yourparameter) ;

/* Execute */
$res = oci_execute($foo);

/* Get the output on the screen */
print_r($res, true);
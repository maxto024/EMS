--creation of the scale_t table 
create table scale_t(scales numeric(3) primary key,
                     amount number(10,2),
                     housing number(3,0),
                     transport number(3,0));
--insert values into scales
 insert into scale_t values(1,300,40,10);
 insert into scale_t values(2,600,50,20);
 insert into scale_t values(3,800,60,30);



--creation of the employee table
create table employee (id number(6,0)primary key,
                        emp_name varchar2(40),
                        designation varchar2(40),
                        scales  numeric(3),
                        emp_type numeric(2),
                        salary number(10,2),
                        joining_date date,
						dept_id number(4,0),
                        Taxe number(10,2),
						FOREIGN KEY(DEPT_ID) REFERENCES DEPT(DEPT_ID),
                        foreign key(scales)references scale_t(scales));
 insert into employee (id ,emp_name,designation,scales,emp_type,salary,joining_date)
             values(124311,'ngnamsie njimbouom soualihou','assistant programmer','sc3','AC',700,current_date);
 insert into employee (id ,emp_name,scales,emp_type,salary,joining_date)
             values(14101,'zokora',2,1,600,current_date);

--creation of the taxes table
create table taxes (taxe_id NUMBER(2,2) primary key,
                    percentage number(3,0),
                    TYI1 number(15,2),
                    TYI2 number(15,2));
					
					
  
--creation ot the transaction table
create table transaction (Tid varchar2(30) primary key,
                          trans_date date,
                          emp_id number(6,0),
                          salary number(10,0),
                          foreign key(emp_id) references employee(id));

--will be usefull when creating the function for the transaction
select id,emp_name,to_char(joining,'YYYYMMDDHHMISS') From EMPLOYEE;

--function to get the last day of a month
 SELECT to_char(LAST_DAY(joining_date),'dd')
  FROM employee;

--to select a specific row from oracle
select * From (select scales ,amount,housing,transport , rownum as rn from SCALE_T) where rn=2;

--creat the transaction procedure

create or replace procedure make_transaction(garbage number)is

cursor employee_cursor is
 select id,scales,emp_type from employee;

employee_id employee.id%type;
emp_scale employee.scales%type;
emp_type employee.emp_type%type; 
scale_amount scale_t.amount %type;
scale_housing scale_t.housing%type;
scale_transport scale_t.transport%type;
scale_salary transaction.salary%type;
normalsalary transaction.salary%type; --salary of an employee who join a the begining of a month
employee_salary transaction.salary%type; --salary of an employe who didn't join a the begining of the month
transaction_number number(10,0); --variable to chech if an employee ever get paid
total_day number(2,0); -- variable to get the total number of day in his hired month
hire_day number(2,0); -- hire day of the employee
transaction_id transaction.Tid%type; --variable to get the transaction id;
date_and_time varchar2(40); --variable to get the date and time of a particular employee's transaction
j number(9,0);
--begining of the transaction procedure
begin

open employee_cursor;

loop 
   fetch employee_cursor into employee_id,emp_scale,emp_type;
    --get the salary of the one who was not hire the first day of the month
           select count(tid) into transaction_number  from transaction where emp_id=employee_id; 
           dbms_output.put_line(employee_id||' '||transaction_number);
   -- DBMS_OUTPUT.put_line(emp_id);
   exit when employee_cursor%NOTFOUND;
  
   if employee_cursor%FOUND THEN
      select amount,housing,transport into scale_amount,scale_housing,scale_transport
            from scale_t where scales=emp_scale;
          
       if sql%found then
           --calculate the salary or someone who get hire the first day of the month
           normalsalary:=scale_amount+scale_amount*(scale_housing/100)+scale_amount*(scale_transport/100);
           
           
           if transaction_number=0 then
               --get the number of day in his hiring month
               select to_number(to_char(last_day(joining_date),'dd')) into total_day 
               
               from employee
               where id=employee_id;
              
               --get the day the the employee get hire
               select to_number(to_char(joining_date,'DD'))into hire_day 
                  from employee
                  where id=employee_id;
                 
               -- get the salary of the employee
               employee_salary:=(normalsalary*(total_day-hire_day))/total_day;
           elsif  transaction_number>0 then
             employee_salary:=normalsalary;
           end if;
           transaction_number:=0;
           
       end if;
       --generating the transaction id
       /*this loop has no use it is just to slow the cpu a bit to get different transaction id
       since the cpu is so fast event when i'm fetching the millisecond there will be some employee
       who will have the same transaction_id which is a primary key*/
       for i in 1..2000000 loop
        j:=j+1;
       end loop;
       select to_char(systimestamp,'DDMMYYYYhhmissff3') into date_and_time 
            from dual;
        --the if condition have to be made here with emp_type;
       transaction_id:=emp_type;
       --transaction_id:=concat(transaction_id,substr(to_char(emp_id),5,2));
       transaction_id:=concat(transaction_id,substr(date_and_time,5,4));
       transaction_id:=concat(transaction_id,substr(date_and_time,3,2));
       transaction_id:=concat(transaction_id,substr(date_and_time,1,2));
       transaction_id:=concat(transaction_id,substr(date_and_time,9,9)); 
       insert into transaction values(transaction_id,current_date,employee_id,employee_salary);
	   UPDATE TABLE_TEST SET SALARY=employee_salary WHERE EMP_ID=employee_id;
        
   end if; 
   
end loop;
close employee_cursor;
commit;
end;
/
select to_timestamp( current_date) from dual;
delete from transaction;
call make_transaction(9); 
select * from transaction;
  select max(to_number(substr(tid,3))) from transaction;      

  
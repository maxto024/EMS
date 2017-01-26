
create or replace procedure check_for_transaction(garbage number) 
as
 current_day number(10,2);  --current day variable
 current_month number(10,2); --current month variable
 taxe number(10,2);
 
 begin
  select to_number(to_char(current_date,'dd')) into current_day 
    from dual;
  select to_number(to_char(current_date,'MM')) into current_month
    from dual;
    
    if current_day=21 and current_month=4 then  --change these day to 31 and month to 12
        dbms_output.put_line('taxes should be calculated today');
        taxe_perform(taxe);
    end if;    
 
 end;
 /
 call check_for_transaction(10);
 select * from taxes;
 
 --creation of the taxe_perform procedure;
 create or replace procedure taxe_perform(emp_taxes out number) as
 
 cursor employee_cursor is
 select EMP_ID,EMP_NAME,TYPES
  from TABLE_TEST;

 employee_id TABLE_TEST.EMP_ID%type;
 name TABLE_TEST.EMP_NAME%type;
 typ TABLE_TEST.TYPES%type;
 emp_taxe TABLE_TEST.TAXE%type;
 amount number(12,2); --variable to receive the total amount of money per year
 per taxes.percentage%type; --variable to retreive the percentage of a taxe
 
 begin
   open employee_cursor;
   
   
   loop
      fetch employee_cursor into employee_id,name,typ;
      exit when employee_cursor%NOTFOUND;
      if employee_cursor%found then
         amount:=income(employee_id);
         percentage(amount,per);
         emp_taxe:=(amount*(per/100));
         dbms_output.put_line('employee taxe is '||emp_taxe||'EMPID='||employee_id);
         update TABLE_TEST set Taxe=emp_taxe where emp_id=employee_id;
		 COMMIT;
      end if;
   end loop;
   
   close employee_cursor;
   
 end;
 /
 
 --percentage procedure
 
create or replace procedure percentage(amount in number,emp_per out number)is
 cursor employee_taxe is
 select percentage,TYI1,TYI2
  from taxes;
  T1 taxes.TYI1%type; --variable to retreive the yearly income 1
  T2 taxes.TYI2%type; --variable to retreive the yearly income 2
   per taxes.percentage%type;
begin
  open employee_taxe;
   loop
      fetch employee_taxe into per,T1,T2;
      exit when employee_taxe%NOTFOUND;
      if employee_taxe%found then
         if amount between T1 and T2 then
            emp_per:=per;
            exit;
         end if;
      end if;
   end loop;   
end;
  /  --end of the procedure percentage
 
 --creation of the employee total yearly income
 
 create or replace function income(id number)return number
 as 
 cursor employee_money is
 select (current_date-trans_date),salary 
 from transaction
  where emp_id=id ;
  
  day_in_year number(3,0); --variable storing the number of days in a years
  TYI transaction.salary%type; --will take the total amount of money of the employee per year
  money transaction.salary%type;
  days number(3,0); -- will store the number of days from the transaction day to the end of the years

 begin
  open employee_money;
  select (add_months(trunc(sysdate,'YYYY'),12) -trunc(sysdate,'YYYY')) into day_in_year  from dual;
  TYI:=0;
  loop
     fetch employee_money into days,money;
     exit when employee_money%NOTFOUND;
     if employee_money%FOUND then
        if days<day_in_year then   --check and add only those salary that the current_date-date_of_transaction are less than the total number of days in a year
           TYI:=TYI+money;  
        end if;
     end if;
  end loop;
  --dbms_output.put_line('employee '||id||' total yealy income is '||TYI);
  close employee_money;
  return TYI;
 end;
 /
 
  create or replace procedure test(id number)is
  dt number(3,0);
  i number(6,0);
  begin
  select distinct(id),to_number(add_months(current_date,12)-trans_date) into i,dt from transaction where emp_id=id and salary<600;
  dbms_output.put_line('date '||dt);
  end;
  /
  
create or replace function get_new_biz_id
	return number as
	
	current_id number;
	next_id number;
BEGIN
	select max(biz_id)
	into current_id
	from Biz_prof;
	
	if current_id is null then
		raise no_data_found;
	end if;

	next_id := current_id + 1;

	return next_id;
EXCEPTION
	when no_data_found then
		return 1;
END;
/
show errors

create or replace procedure insert_new_biz(new_name varchar2, new_street_add varchar2, new_city varchar2, new_state char, new_type varchar2, new_active char, new_phone varchar2, new_liasion varchar2) AS
	active char;
	new_id number;
BEGIN
	new_id := get_new_biz_id();
	active := 'y';
	
	insert into Biz_prof
	values
	(new_id, new_name, new_street_add, new_city, new_state, new_type, new_active, new_phone, null, null, new_liasion);
END;
/
show errors
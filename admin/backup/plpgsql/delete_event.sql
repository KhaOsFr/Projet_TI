create or replace function delete_event(p_id integer) returns integer as
  '
begin
	delete from event where id_event = p_id;
	if found then
		return 1;
	else
		return 0;
	end if;
 end;
 ' LANGUAGE 'plpgsql';
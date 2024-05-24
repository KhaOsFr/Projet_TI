create or replace function delete_sportif(p_id integer) returns integer as
  '
begin
	delete from sportif where id_sportif = p_id;
	if found then
		return 1;
	else
		return 0;
	end if;
 end;
 ' LANGUAGE 'plpgsql';
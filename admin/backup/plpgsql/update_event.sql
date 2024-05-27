create or replace function update_event(int,text, text, date, date, int, int, text) returns integer as
  '
  declare p_id alias for $1;
  declare p_nom alias for $2;
  declare p_desc alias for $3;
  declare p_dated alias for $4;
  declare p_datef alias for $5;
  declare p_idd alias for $6;
  declare p_idp alias for $7;
  declare p_img alias for $8;
  declare id integer;
  declare retour integer;
  
begin
	update event set nom=p_nom, description=p_desc, date_debut=p_dated, date_fin=p_datef, id_disc=p_idd, id_pays=p_idp, img=p_img where id_event=p_id;
    RETURN 1;
 end;
 ' LANGUAGE 'plpgsql';
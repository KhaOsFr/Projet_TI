create or replace function ajout_event(text, text, date, date, int, int, text) returns integer as
  '
  declare p_nom alias for $1;
  declare p_desc alias for $2;
  declare p_dated alias for $3;
  declare p_datef alias for $4;
  declare p_idd alias for $5;
  declare p_idp alias for $6;
  declare p_img alias for $7;
  declare id integer;
  declare retour integer;
  
begin
	select into id id_event from event where nom = p_nom;
	if not found
	then
	  insert into event (nom, description, date_debut, date_fin, id_disc, id_pays, img) values
	    (p_nom, p_des, p_dated, p_datef, p_idd, p_idp, p_img);
	  select into id id_event from event where nom = p_nom;
	  if not found
	  then	
	    retour = -1; --échec de la requête
	  else
	    retour = 1; -- insertion ok
	  end if;
	else
	  retour = 0; -- déjà en BD
	end if;
 	return retour;
 end;
 ' LANGUAGE 'plpgsql';
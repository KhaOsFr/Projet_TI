create or replace function ajout_sportif(text, text, int, int, text, int) returns integer as
  '
  declare p_nom alias for $1;
  declare p_prenom alias for $2;
  declare p_age alias for $3;
  declare p_pays alias for $4;
  declare p_img alias for $5;
  declare p_event alias for $6;
  declare id integer;
  declare retour integer;
  
begin
	select into id id_sportif from sportif where nom = p_nom and prenom = p_prenom;
	if not found
	then
	  insert into sportif (nom, prenom, age, id_pays, img, id_event) values
	    (p_nom, p_prenom, p_age, p_pays, p_img, p_event);
	  select into id id_sportif from sportif where nom = p_nom and prenom = p_prenom;
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
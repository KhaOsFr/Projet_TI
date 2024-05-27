CREATE OR REPLACE FUNCTION update_sportif(int, text, text, int, int, text, int) RETURNS integer AS
'
	declare p_ids alias for $1;
	declare p_nom alias for $2;
	declare p_prenom alias for $3;
	declare p_age alias for $4;
	declare p_idp alias for $5;
	declare p_img alias for $6;
	declare p_ide alias for $7;
BEGIN
    update sportif set nom=p_nom, prenom=p_prenom, age=p_age, id_pays=p_idp, img=p_img, id_event=p_ide where id_sportif=p_ids;
    RETURN 1;
END;
' LANGUAGE 'plpgsql';

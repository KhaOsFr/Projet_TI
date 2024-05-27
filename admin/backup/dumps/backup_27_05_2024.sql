--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

-- Started on 2024-05-27 13:45:15

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 231 (class 1255 OID 16781)
-- Name: ajout_event(text, text, date, date, integer, integer, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajout_event(text, text, date, date, integer, integer, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
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
	    (p_nom, p_desc, p_dated, p_datef, p_idd, p_idp, p_img);
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
 ';


--
-- TOC entry 228 (class 1255 OID 16777)
-- Name: ajout_sportif(text, text, integer, integer, text, integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajout_sportif(text, text, integer, integer, text, integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
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
 ';


--
-- TOC entry 232 (class 1255 OID 16782)
-- Name: delete_event(integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.delete_event(p_id integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
begin
	delete from event where id_event = p_id;
	if found then
		return 1;
	else
		return 0;
	end if;
 end;
 ';


--
-- TOC entry 229 (class 1255 OID 16779)
-- Name: delete_sportif(integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.delete_sportif(p_id integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
begin
	delete from sportif where id_sportif = p_id;
	if found then
		return 1;
	else
		return 0;
	end if;
 end;
 ';


--
-- TOC entry 233 (class 1255 OID 16783)
-- Name: update_event(integer, text, text, date, date, integer, integer, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.update_event(integer, text, text, date, date, integer, integer, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
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
 ';


--
-- TOC entry 230 (class 1255 OID 16780)
-- Name: update_sportif(integer, text, text, integer, integer, text, integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.update_sportif(integer, text, text, integer, integer, text, integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
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
';


--
-- TOC entry 227 (class 1255 OID 16757)
-- Name: verifier_admin(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.verifier_admin(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare p_login alias for $1;
	declare p_password alias for $2;
	declare id integer;
	declare retour integer;
	
begin
	select into id id_admin from admin where login=p_login and password = p_password;
	if not found 
	then
	  retour = 0;
	else
	  retour =1;
	end if;  
	return retour;
end;
';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 215 (class 1259 OID 16570)
-- Name: admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    login text NOT NULL,
    password text NOT NULL
);


--
-- TOC entry 216 (class 1259 OID 16577)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

ALTER TABLE public.admin ALTER COLUMN id_admin ADD GENERATED BY DEFAULT AS IDENTITY (
    SEQUENCE NAME public.admin_id_admin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 221 (class 1259 OID 16699)
-- Name: discipline; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.discipline (
    id_disc integer NOT NULL,
    nom text NOT NULL
);


--
-- TOC entry 222 (class 1259 OID 16706)
-- Name: discipline_id_disc_seq; Type: SEQUENCE; Schema: public; Owner: -
--

ALTER TABLE public.discipline ALTER COLUMN id_disc ADD GENERATED BY DEFAULT AS IDENTITY (
    SEQUENCE NAME public.discipline_id_disc_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999
    CACHE 1
);


--
-- TOC entry 218 (class 1259 OID 16684)
-- Name: event; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.event (
    id_event integer NOT NULL,
    nom text NOT NULL,
    description text NOT NULL,
    date_debut date NOT NULL,
    date_fin date NOT NULL,
    id_disc integer NOT NULL,
    id_pays integer NOT NULL,
    img text
);


--
-- TOC entry 219 (class 1259 OID 16691)
-- Name: event_id_event_seq; Type: SEQUENCE; Schema: public; Owner: -
--

ALTER TABLE public.event ALTER COLUMN id_event ADD GENERATED BY DEFAULT AS IDENTITY (
    SEQUENCE NAME public.event_id_event_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999
    CACHE 1
);


--
-- TOC entry 223 (class 1259 OID 16726)
-- Name: pays; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pays (
    id_pays integer NOT NULL,
    pays text NOT NULL,
    img text
);


--
-- TOC entry 224 (class 1259 OID 16733)
-- Name: pays_id_pays_seq; Type: SEQUENCE; Schema: public; Owner: -
--

ALTER TABLE public.pays ALTER COLUMN id_pays ADD GENERATED BY DEFAULT AS IDENTITY (
    SEQUENCE NAME public.pays_id_pays_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999
    CACHE 1
);


--
-- TOC entry 217 (class 1259 OID 16677)
-- Name: sportif; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sportif (
    id_sportif integer NOT NULL,
    nom text,
    prenom text,
    age integer,
    id_pays integer,
    img text,
    id_event integer
);


--
-- TOC entry 220 (class 1259 OID 16692)
-- Name: sportif_id_sportif_seq; Type: SEQUENCE; Schema: public; Owner: -
--

ALTER TABLE public.sportif ALTER COLUMN id_sportif ADD GENERATED BY DEFAULT AS IDENTITY (
    SEQUENCE NAME public.sportif_id_sportif_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999
    CACHE 1
);


--
-- TOC entry 226 (class 1259 OID 16772)
-- Name: vue_event_disc_pays; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_event_disc_pays AS
 SELECT e.id_event,
    e.nom,
    e.description,
    e.date_debut,
    e.date_fin,
    d.nom AS discipline,
    p.pays,
    p.img AS img_p,
    e.img AS img_e
   FROM ((public.event e
     JOIN public.discipline d ON ((e.id_disc = d.id_disc)))
     JOIN public.pays p ON ((p.id_pays = e.id_pays)));


--
-- TOC entry 225 (class 1259 OID 16767)
-- Name: vue_sportif_disc_pays; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_sportif_disc_pays AS
 SELECT s.id_sportif,
    s.nom,
    s.prenom,
    s.age,
    p.pays,
    p.img AS img_p,
    d.nom AS discipline,
    s.img AS img_s,
    s.id_event
   FROM (((public.sportif s
     JOIN public.pays p ON ((s.id_pays = p.id_pays)))
     JOIN public.event e ON ((e.id_event = s.id_event)))
     JOIN public.discipline d ON ((d.id_disc = e.id_disc)));


--
-- TOC entry 4886 (class 0 OID 16570)
-- Dependencies: 215
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.admin (id_admin, login, password) VALUES (1, 'admin', 'admin');
INSERT INTO public.admin (id_admin, login, password) VALUES (2, 'Bob', 'Bob');


--
-- TOC entry 4892 (class 0 OID 16699)
-- Dependencies: 221
-- Data for Name: discipline; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.discipline (id_disc, nom) VALUES (1, 'Football');
INSERT INTO public.discipline (id_disc, nom) VALUES (2, 'Basketball');
INSERT INTO public.discipline (id_disc, nom) VALUES (3, 'Tennis');
INSERT INTO public.discipline (id_disc, nom) VALUES (4, 'Handball');
INSERT INTO public.discipline (id_disc, nom) VALUES (5, 'Rugby');
INSERT INTO public.discipline (id_disc, nom) VALUES (6, 'Golf');
INSERT INTO public.discipline (id_disc, nom) VALUES (8, 'Cyclisme');


--
-- TOC entry 4889 (class 0 OID 16684)
-- Dependencies: 218
-- Data for Name: event; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.event (id_event, nom, description, date_debut, date_fin, id_disc, id_pays, img) VALUES (2, 'Euro 2024', 'Le championnat d''Europe de football 2024 regroupe les meilleures équipes d''Europe', '2024-06-14', '2024-07-14', 1, 2, 'euro.jpg');
INSERT INTO public.event (id_event, nom, description, date_debut, date_fin, id_disc, id_pays, img) VALUES (3, 'Tour de France', 'Evénement mondial du cyclisme depuis plus de 120 ans, elle est l''une des compétitions les plus importantes de l''année', '2024-06-29', '2024-07-21', 8, 1, 'tdf.jpg');
INSERT INTO public.event (id_event, nom, description, date_debut, date_fin, id_disc, id_pays, img) VALUES (1, 'Roland Garros', 'L''un des tournois les plus prestigieux du monde du tennis, Grand Chelem sur terre battue', '2024-05-26', '2024-06-09', 3, 1, 'rg.jpg');


--
-- TOC entry 4894 (class 0 OID 16726)
-- Dependencies: 223
-- Data for Name: pays; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pays (id_pays, pays, img) VALUES (1, 'France', 'france.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (3, 'Danemark', 'danemark.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (2, 'Allemagne', 'allemagne.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (4, 'Belgique', 'belgique.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (5, 'Suède', 'suede.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (6, 'Norvège', 'norvege.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (7, 'Suisse', 'suisse.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (8, 'Angleterre', 'angleterre.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (9, 'Ecosse', 'ecosse.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (10, 'Pays-Bas', 'pays-bas.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (11, 'Irlande', 'irlande.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (12, 'Espagne', 'espagne.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (13, 'Italie', 'italie.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (14, 'Portugal', 'portugal.jpg');
INSERT INTO public.pays (id_pays, pays, img) VALUES (15, 'Grèce', 'grece.jpg');


--
-- TOC entry 4888 (class 0 OID 16677)
-- Dependencies: 217
-- Data for Name: sportif; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (10, 'Mbappé', 'Kylian', 25, 1, 'mbappe.jpg', 2);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (2, 'Vingegaard', 'Jonas', 27, 3, 'vingegaard.jpg', 3);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (20, 'De Bruyne', 'Kevin', 32, 4, 'debruyne.jpg', 2);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (21, 'Jorginho', 'Luiz', 32, 13, 'jorginho.jpg', 2);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (22, 'Yamal', 'Lamine', 16, 12, 'yamal.jpg', 2);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (23, 'van der Poel', 'Mathieu', 29, 10, 'vdp.jpg', 3);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (24, 'Pidcock', 'Tom', 24, 8, 'pidcock.jpg', 3);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (25, 'Evenepoel', 'Remco', 24, 4, 'evenepoel.jpg', 3);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (26, 'Nadal', 'Rafael', 37, 12, 'nadal.jpg', 1);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (27, 'Zverev', 'Alexander', 27, 2, 'zverev.jpg', 1);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (28, 'Alcaraz', 'Carlos', 21, 12, 'alcaraz.jpg', 1);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (29, 'Sakkari', 'Maria', 28, 15, 'sakkari.jpg', 1);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (30, 'Paolini', 'Jasmine', 28, 13, 'paolini.jpg', 1);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (31, 'Sinner', 'Jannik', 22, 13, 'sinner.jpg', 1);
INSERT INTO public.sportif (id_sportif, nom, prenom, age, id_pays, img, id_event) VALUES (3, 'Müller', 'Thomas', 34, 2, 'muller2.jpg', 2);


--
-- TOC entry 4901 (class 0 OID 0)
-- Dependencies: 216
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 2, true);


--
-- TOC entry 4902 (class 0 OID 0)
-- Dependencies: 222
-- Name: discipline_id_disc_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.discipline_id_disc_seq', 8, true);


--
-- TOC entry 4903 (class 0 OID 0)
-- Dependencies: 219
-- Name: event_id_event_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.event_id_event_seq', 10, true);


--
-- TOC entry 4904 (class 0 OID 0)
-- Dependencies: 224
-- Name: pays_id_pays_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pays_id_pays_seq', 15, true);


--
-- TOC entry 4905 (class 0 OID 0)
-- Dependencies: 220
-- Name: sportif_id_sportif_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.sportif_id_sportif_seq', 31, true);


--
-- TOC entry 4724 (class 2606 OID 16576)
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 4732 (class 2606 OID 16723)
-- Name: discipline disc_nom_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.discipline
    ADD CONSTRAINT disc_nom_unique UNIQUE (nom);


--
-- TOC entry 4734 (class 2606 OID 16705)
-- Name: discipline discipline_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.discipline
    ADD CONSTRAINT discipline_pkey PRIMARY KEY (id_disc);


--
-- TOC entry 4728 (class 2606 OID 16725)
-- Name: event event_nom_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.event
    ADD CONSTRAINT event_nom_unique UNIQUE (nom);


--
-- TOC entry 4730 (class 2606 OID 16690)
-- Name: event event_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.event
    ADD CONSTRAINT event_pkey PRIMARY KEY (id_event);


--
-- TOC entry 4736 (class 2606 OID 16732)
-- Name: pays pays_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pays
    ADD CONSTRAINT pays_pkey PRIMARY KEY (id_pays);


--
-- TOC entry 4726 (class 2606 OID 16683)
-- Name: sportif sportif_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sportif
    ADD CONSTRAINT sportif_pkey PRIMARY KEY (id_sportif);


--
-- TOC entry 4739 (class 2606 OID 16707)
-- Name: event event_fk_disc; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.event
    ADD CONSTRAINT event_fk_disc FOREIGN KEY (id_disc) REFERENCES public.discipline(id_disc);


--
-- TOC entry 4740 (class 2606 OID 16734)
-- Name: event event_fk_pays; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.event
    ADD CONSTRAINT event_fk_pays FOREIGN KEY (id_pays) REFERENCES public.pays(id_pays) NOT VALID;


--
-- TOC entry 4737 (class 2606 OID 16762)
-- Name: sportif sportif_fk_event; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sportif
    ADD CONSTRAINT sportif_fk_event FOREIGN KEY (id_event) REFERENCES public.event(id_event) NOT VALID;


--
-- TOC entry 4738 (class 2606 OID 16739)
-- Name: sportif sportif_fk_pays; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sportif
    ADD CONSTRAINT sportif_fk_pays FOREIGN KEY (id_pays) REFERENCES public.pays(id_pays) NOT VALID;


-- Completed on 2024-05-27 13:45:15

--
-- PostgreSQL database dump complete
--


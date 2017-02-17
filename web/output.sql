--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: collaborate; Type: SCHEMA; Schema: -; Owner: wsykoeftlsvbix
--

CREATE SCHEMA collaborate;


ALTER SCHEMA collaborate OWNER TO wsykoeftlsvbix;

--
-- Name: collaboration; Type: SCHEMA; Schema: -; Owner: wsykoeftlsvbix
--

CREATE SCHEMA collaboration;


ALTER SCHEMA collaboration OWNER TO wsykoeftlsvbix;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = collaboration, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: conversation; Type: TABLE; Schema: collaboration; Owner: wsykoeftlsvbix
--

CREATE TABLE conversation (
    id integer NOT NULL,
    convo text NOT NULL,
    player_id integer NOT NULL
);


ALTER TABLE conversation OWNER TO wsykoeftlsvbix;

--
-- Name: conversation_id_seq; Type: SEQUENCE; Schema: collaboration; Owner: wsykoeftlsvbix
--

CREATE SEQUENCE conversation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE conversation_id_seq OWNER TO wsykoeftlsvbix;

--
-- Name: conversation_id_seq; Type: SEQUENCE OWNED BY; Schema: collaboration; Owner: wsykoeftlsvbix
--

ALTER SEQUENCE conversation_id_seq OWNED BY conversation.id;


--
-- Name: player; Type: TABLE; Schema: collaboration; Owner: wsykoeftlsvbix
--

CREATE TABLE player (
    id integer NOT NULL,
    playername character varying(30) NOT NULL,
    password character varying(30) NOT NULL
);


ALTER TABLE player OWNER TO wsykoeftlsvbix;

--
-- Name: player_id_seq; Type: SEQUENCE; Schema: collaboration; Owner: wsykoeftlsvbix
--

CREATE SEQUENCE player_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE player_id_seq OWNER TO wsykoeftlsvbix;

--
-- Name: player_id_seq; Type: SEQUENCE OWNED BY; Schema: collaboration; Owner: wsykoeftlsvbix
--

ALTER SEQUENCE player_id_seq OWNED BY player.id;


--
-- Name: profile; Type: TABLE; Schema: collaboration; Owner: wsykoeftlsvbix
--

CREATE TABLE profile (
    fname character varying(30),
    lname character varying(30),
    location character varying(300),
    bio text
);


ALTER TABLE profile OWNER TO wsykoeftlsvbix;

SET search_path = public, pg_catalog;

--
-- Name: conversation; Type: TABLE; Schema: public; Owner: wsykoeftlsvbix
--

CREATE TABLE conversation (
    id integer NOT NULL,
    player1_id integer NOT NULL,
    player2_id integer NOT NULL,
    communication text NOT NULL
);


ALTER TABLE conversation OWNER TO wsykoeftlsvbix;

--
-- Name: conversation_id_seq; Type: SEQUENCE; Schema: public; Owner: wsykoeftlsvbix
--

CREATE SEQUENCE conversation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE conversation_id_seq OWNER TO wsykoeftlsvbix;

--
-- Name: conversation_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: wsykoeftlsvbix
--

ALTER SEQUENCE conversation_id_seq OWNED BY conversation.id;


--
-- Name: player; Type: TABLE; Schema: public; Owner: wsykoeftlsvbix
--

CREATE TABLE player (
    id integer NOT NULL,
    username character varying(30) NOT NULL,
    password character varying(30) NOT NULL
);


ALTER TABLE player OWNER TO wsykoeftlsvbix;

--
-- Name: player_id_seq; Type: SEQUENCE; Schema: public; Owner: wsykoeftlsvbix
--

CREATE SEQUENCE player_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE player_id_seq OWNER TO wsykoeftlsvbix;

--
-- Name: player_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: wsykoeftlsvbix
--

ALTER SEQUENCE player_id_seq OWNED BY player.id;


--
-- Name: profile; Type: TABLE; Schema: public; Owner: wsykoeftlsvbix
--

CREATE TABLE profile (
    id integer NOT NULL,
    fname character varying(30),
    lname character varying(30),
    location character varying(200),
    email character varying(30),
    bio text,
    title character varying(30),
    phone character varying(15),
    player_id integer
);


ALTER TABLE profile OWNER TO wsykoeftlsvbix;

--
-- Name: profile_id_seq; Type: SEQUENCE; Schema: public; Owner: wsykoeftlsvbix
--

CREATE SEQUENCE profile_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE profile_id_seq OWNER TO wsykoeftlsvbix;

--
-- Name: profile_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: wsykoeftlsvbix
--

ALTER SEQUENCE profile_id_seq OWNED BY profile.id;


SET search_path = collaboration, pg_catalog;

--
-- Name: conversation id; Type: DEFAULT; Schema: collaboration; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY conversation ALTER COLUMN id SET DEFAULT nextval('conversation_id_seq'::regclass);


--
-- Name: player id; Type: DEFAULT; Schema: collaboration; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY player ALTER COLUMN id SET DEFAULT nextval('player_id_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- Name: conversation id; Type: DEFAULT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY conversation ALTER COLUMN id SET DEFAULT nextval('conversation_id_seq'::regclass);


--
-- Name: player id; Type: DEFAULT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY player ALTER COLUMN id SET DEFAULT nextval('player_id_seq'::regclass);


--
-- Name: profile id; Type: DEFAULT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY profile ALTER COLUMN id SET DEFAULT nextval('profile_id_seq'::regclass);


SET search_path = collaboration, pg_catalog;

--
-- Data for Name: conversation; Type: TABLE DATA; Schema: collaboration; Owner: wsykoeftlsvbix
--

COPY conversation (id, convo, player_id) FROM stdin;
\.


--
-- Name: conversation_id_seq; Type: SEQUENCE SET; Schema: collaboration; Owner: wsykoeftlsvbix
--

SELECT pg_catalog.setval('conversation_id_seq', 1, false);


--
-- Data for Name: player; Type: TABLE DATA; Schema: collaboration; Owner: wsykoeftlsvbix
--

COPY player (id, playername, password) FROM stdin;
\.


--
-- Name: player_id_seq; Type: SEQUENCE SET; Schema: collaboration; Owner: wsykoeftlsvbix
--

SELECT pg_catalog.setval('player_id_seq', 1, false);


--
-- Data for Name: profile; Type: TABLE DATA; Schema: collaboration; Owner: wsykoeftlsvbix
--

COPY profile (fname, lname, location, bio) FROM stdin;
\.


SET search_path = public, pg_catalog;

--
-- Data for Name: conversation; Type: TABLE DATA; Schema: public; Owner: wsykoeftlsvbix
--

COPY conversation (id, player1_id, player2_id, communication) FROM stdin;
2	1	2	Jonathan: Hey Seth: Hey! What is up? Jonathan: Not much. You? Seth: Just doing CS313 homework Jonathan: Oh cool!
\.


--
-- Name: conversation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: wsykoeftlsvbix
--

SELECT pg_catalog.setval('conversation_id_seq', 2, true);


--
-- Data for Name: player; Type: TABLE DATA; Schema: public; Owner: wsykoeftlsvbix
--

COPY player (id, username, password) FROM stdin;
1	jester1570	Jmonnao1.
2	chillinwithchilders	Jmonnao1.
3	little spoon	12345
\.


--
-- Name: player_id_seq; Type: SEQUENCE SET; Schema: public; Owner: wsykoeftlsvbix
--

SELECT pg_catalog.setval('player_id_seq', 3, true);


--
-- Data for Name: profile; Type: TABLE DATA; Schema: public; Owner: wsykoeftlsvbix
--

COPY profile (id, fname, lname, location, email, bio, title, phone, player_id) FROM stdin;
1	Jonathan	Manoa	Rexburg, Idaho	jester1570@gmail.com	Jonathan hails from Santa Maria, California. Most of his childhood was spent playing outside. He enjoyed the great outdoors all through high school with camping trips, kayaking, and hiking. Hammocks did not come into his life until his third semester of college when his roommate Chris texted him over the break about  getting a hammock. This is when he finally decided to make the jump (almost literally) into hammocks. Since then, hammocks have been his favorite past time.	Island Thunder	805-345-5168	1
2	Seth	Childers	Rexburg, Idaho	chillinwithchilders@gmail.com	I am from da hood!	Course Support Specialist	\N	2
3	Ben	Smith	Boise, Idaho	maxjamin@gmail.com	I am from da hood!	Neon Dragon	\N	3
\.


--
-- Name: profile_id_seq; Type: SEQUENCE SET; Schema: public; Owner: wsykoeftlsvbix
--

SELECT pg_catalog.setval('profile_id_seq', 3, true);


SET search_path = collaboration, pg_catalog;

--
-- Name: conversation conversation_pkey; Type: CONSTRAINT; Schema: collaboration; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY conversation
    ADD CONSTRAINT conversation_pkey PRIMARY KEY (id);


--
-- Name: player player_pkey; Type: CONSTRAINT; Schema: collaboration; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY player
    ADD CONSTRAINT player_pkey PRIMARY KEY (id);


--
-- Name: player player_playername_key; Type: CONSTRAINT; Schema: collaboration; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY player
    ADD CONSTRAINT player_playername_key UNIQUE (playername);


SET search_path = public, pg_catalog;

--
-- Name: conversation conversation_pkey; Type: CONSTRAINT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY conversation
    ADD CONSTRAINT conversation_pkey PRIMARY KEY (id);


--
-- Name: player player_pkey; Type: CONSTRAINT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY player
    ADD CONSTRAINT player_pkey PRIMARY KEY (id);


--
-- Name: player player_username_key; Type: CONSTRAINT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY player
    ADD CONSTRAINT player_username_key UNIQUE (username);


SET search_path = collaboration, pg_catalog;

--
-- Name: conversation conversation_player_id_fkey; Type: FK CONSTRAINT; Schema: collaboration; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY conversation
    ADD CONSTRAINT conversation_player_id_fkey FOREIGN KEY (player_id) REFERENCES player(id);


SET search_path = public, pg_catalog;

--
-- Name: conversation conversation_player1_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY conversation
    ADD CONSTRAINT conversation_player1_id_fkey FOREIGN KEY (player1_id) REFERENCES player(id);


--
-- Name: conversation conversation_player2_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY conversation
    ADD CONSTRAINT conversation_player2_id_fkey FOREIGN KEY (player2_id) REFERENCES player(id);


--
-- Name: profile profile_player_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: wsykoeftlsvbix
--

ALTER TABLE ONLY profile
    ADD CONSTRAINT profile_player_id_fkey FOREIGN KEY (player_id) REFERENCES player(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: wsykoeftlsvbix
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO wsykoeftlsvbix;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO wsykoeftlsvbix;


--
-- PostgreSQL database dump complete
--


--
-- PostgreSQL database dump
--

-- Dumped from database version 16.4
-- Dumped by pg_dump version 16.8 (Ubuntu 16.8-0ubuntu0.24.04.1)

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cache; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO user_db;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO user_db;

--
-- Name: cars; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.cars (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.cars OWNER TO user_db;

--
-- Name: cars_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.cars_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cars_id_seq OWNER TO user_db;

--
-- Name: cars_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.cars_id_seq OWNED BY public.cars.id;


--
-- Name: configuration_option; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.configuration_option (
    configuration_id bigint NOT NULL,
    option_id bigint NOT NULL
);


ALTER TABLE public.configuration_option OWNER TO user_db;

--
-- Name: configurations; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.configurations (
    id bigint NOT NULL,
    car_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.configurations OWNER TO user_db;

--
-- Name: configurations_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.configurations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.configurations_id_seq OWNER TO user_db;

--
-- Name: configurations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.configurations_id_seq OWNED BY public.configurations.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO user_db;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO user_db;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO user_db;

--
-- Name: jobs; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO user_db;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO user_db;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO user_db;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO user_db;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: options; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.options (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.options OWNER TO user_db;

--
-- Name: options_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.options_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.options_id_seq OWNER TO user_db;

--
-- Name: options_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.options_id_seq OWNED BY public.options.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO user_db;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO user_db;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_access_tokens_id_seq OWNER TO user_db;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: prices; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.prices (
    id bigint NOT NULL,
    configuration_id bigint NOT NULL,
    price integer NOT NULL,
    start_date timestamp(0) without time zone NOT NULL,
    end_date timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.prices OWNER TO user_db;

--
-- Name: prices_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.prices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.prices_id_seq OWNER TO user_db;

--
-- Name: prices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.prices_id_seq OWNED BY public.prices.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO user_db;

--
-- Name: users; Type: TABLE; Schema: public; Owner: user_db
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO user_db;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: user_db
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO user_db;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user_db
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: cars id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.cars ALTER COLUMN id SET DEFAULT nextval('public.cars_id_seq'::regclass);


--
-- Name: configurations id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.configurations ALTER COLUMN id SET DEFAULT nextval('public.configurations_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: options id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.options ALTER COLUMN id SET DEFAULT nextval('public.options_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: prices id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.prices ALTER COLUMN id SET DEFAULT nextval('public.prices_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- Data for Name: cars; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.cars (id, name, created_at, updated_at) FROM stdin;
1	Kia	2025-04-11 18:54:56	2025-04-11 18:54:57
2	Toyota	2025-04-11 18:54:56	2025-04-11 18:54:57
3	BMW	2025-04-11 18:54:56	2025-04-11 18:54:57
4	Skoda	2025-04-11 18:54:56	2025-04-11 18:54:57
\.


--
-- Data for Name: configuration_option; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.configuration_option (configuration_id, option_id) FROM stdin;
1	1
2	1
3	1
4	1
1	2
2	3
3	3
4	4
1	4
\.


--
-- Data for Name: configurations; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.configurations (id, car_id, name, created_at, updated_at) FROM stdin;
1	1	Lux	2025-04-11 18:55:59	2025-04-11 18:55:59
2	1	Comfort	2025-04-11 18:55:59	2025-04-11 18:55:59
3	1	Taxi	2025-04-11 18:55:59	2025-04-11 18:55:59
4	2	Comfort	2025-04-11 18:55:59	2025-04-11 18:55:59
5	2	Lux	2025-04-11 18:55:59	2025-04-11 18:55:59
6	3	Lux	2025-04-11 18:55:59	2025-04-11 18:55:59
7	4	Lux	2025-04-11 18:55:59	2025-04-11 18:55:59
8	4	Taxi	2025-04-11 18:55:59	2025-04-11 18:55:59
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2025_04_11_064604_create_cars_table	1
5	2025_04_11_064720_create_options_table	1
6	2025_04_11_064920_create_configurations_table	1
7	2025_04_11_065150_create_configuration_option_table	1
8	2025_04_11_065746_create_prices_table	1
9	2025_04_11_070901_create_personal_access_tokens_table	1
\.


--
-- Data for Name: options; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.options (id, name, created_at, updated_at) FROM stdin;
1	Silent taxi driver	2025-04-11 18:57:59	2025-04-11 18:58:00
2	No driver	2025-04-11 18:57:59	2025-04-11 18:58:00
3	Heating food	2025-04-11 18:57:59	2025-04-11 18:58:00
5	Fridge	2025-04-11 18:57:59	2025-04-11 18:58:00
4	Foot warmer	2025-04-11 18:57:59	2025-04-11 18:58:00
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: prices; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.prices (id, configuration_id, price, start_date, end_date) FROM stdin;
1	1	100	2025-04-11 19:01:04	2025-04-11 20:01:05
8	1	666	2025-04-11 20:01:04	2025-04-11 21:01:05
5	4	10000	2025-04-11 19:01:04	2025-04-11 20:01:05
4	4	200	2025-04-11 19:01:04	2025-04-11 20:01:05
7	4	10	2025-04-11 19:01:04	2025-04-11 20:01:05
2	2	11000	2025-04-11 19:01:04	2025-04-11 20:01:05
6	4	2000	2025-04-11 19:01:04	2025-04-11 20:01:05
3	3	100000	2025-04-11 19:01:04	2025-04-11 20:01:05
9	3	200	2025-04-11 21:01:04	2025-04-11 23:01:05
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: user_db
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- Name: cars_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.cars_id_seq', 1, false);


--
-- Name: configurations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.configurations_id_seq', 1, false);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);


--
-- Name: options_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.options_id_seq', 1, false);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: prices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.prices_id_seq', 2, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user_db
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: cars cars_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_pkey PRIMARY KEY (id);


--
-- Name: configuration_option configuration_option_configuration_id_option_id_unique; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.configuration_option
    ADD CONSTRAINT configuration_option_configuration_id_option_id_unique UNIQUE (configuration_id, option_id);


--
-- Name: configurations configurations_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.configurations
    ADD CONSTRAINT configurations_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: options options_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.options
    ADD CONSTRAINT options_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: prices prices_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.prices
    ADD CONSTRAINT prices_pkey PRIMARY KEY (id);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: user_db
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: user_db
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: user_db
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: user_db
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: configuration_option configuration_option_configuration_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.configuration_option
    ADD CONSTRAINT configuration_option_configuration_id_foreign FOREIGN KEY (configuration_id) REFERENCES public.configurations(id);


--
-- Name: configuration_option configuration_option_option_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.configuration_option
    ADD CONSTRAINT configuration_option_option_id_foreign FOREIGN KEY (option_id) REFERENCES public.options(id);


--
-- Name: configurations configurations_car_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.configurations
    ADD CONSTRAINT configurations_car_id_foreign FOREIGN KEY (car_id) REFERENCES public.cars(id);


--
-- Name: prices prices_configuration_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: user_db
--

ALTER TABLE ONLY public.prices
    ADD CONSTRAINT prices_configuration_id_foreign FOREIGN KEY (configuration_id) REFERENCES public.configurations(id);


--
-- PostgreSQL database dump complete
--


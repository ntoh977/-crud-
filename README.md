# Administrator-crud-authorization
1. БД  - postgre
3. защита от sql инъекций
4. подключение на паттерне Сингетон, PDO
5. Возможность администрирования
6. Хэширование пароля php
7. 
CREATE TABLE IF NOT EXISTS public.users
(
    id integer NOT NULL DEFAULT nextval('users_id_seq'::regclass),
    username character varying(50) COLLATE pg_catalog."default" NOT NULL,
    password character varying(255) COLLATE pg_catalog."default" NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    surname character varying(128) COLLATE pg_catalog."default",
    tell character varying(12) COLLATE pg_catalog."default",
    CONSTRAINT users_pkey PRIMARY KEY (id),
    CONSTRAINT users_username_key UNIQUE (username)
)

CREATE USER user_db WITH PASSWORD 'password';

CREATE DATABASE data_base OWNER user_db;
CREATE DATABASE data_base_testing OWNER user_db;

GRANT ALL PRIVILEGES ON DATABASE data_base TO user_db;
GRANT ALL PRIVILEGES ON DATABASE data_base_testing TO user_db;
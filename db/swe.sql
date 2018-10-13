DROP TABLE member;
DROP TABLE ab_member;
DROP TABLE document;
DROP TABLE speaker;
DROP TABLE calendar_event;
DROP TABLE task;


CREATE TABLE member(
    id SERIAL PRIMARY KEY NOT NULL
    , first_name VARCHAR(50)
    , last_name VARCHAR(50)
    , email VARCHAR(30)
    , phone VARCHAR(20)
    , major VARCHAR(40)
);

CREATE TABLE ab_member(
    id SERIAL PRIMARY KEY 
    , username VARCHAR(50) NOT NULL UNIQUE 
    , password VARCHAR(50) NOT NULL 
    , memberID int REFERENCES member(id)
    , position VARCHAR(20)
    , exp_date DATE 
);

CREATE TABLE document(
    id SERIAL PRIMARY KEY NOT NULL
    , title VARCHAR(50)
    , doc_type VARCHAR(10)
    , to_print BIT 
    , date_created DATE
);

CREATE TABLE speaker(
    id SERIAL PRIMARY KEY NOT NULL
    , full_name VARCHAR(30)
    , title VARCHAR(50)
    , email VARCHAR(50)
    , phone VARCHAR(50)
);

CREATE TABLE calendar_event(
    id SERIAL PRIMARY KEY NOT NULL
    , event_name VARCHAR(40)
    , event_type VARCHAR(30)
    , speaker int REFERENCES speaker(id)
    , date_planned DATE  
);

CREATE TABLE task(
    id SERIAL PRIMARY KEY NOT NULL
    , name VARCHAR(30)
    , complete_by DATE
    , event_id int REFERENCES calendar_event(id)
);

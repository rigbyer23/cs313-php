DROP TABLE calendar_event;
DROP TABLE task;
DROP TABLE ab_member;
DROP TABLE member;
DROP TABLE document;
DROP TABLE speaker;



CREATE TABLE member(
    id SERIAL PRIMARY KEY NOT NULL
    , first_name VARCHAR(50) NOT NULL
    , last_name VARCHAR(50) NOT NULL
    , email VARCHAR(30)
    , phone VARCHAR(20)
    , major_id INT REFERENCES major(id)
);

CREATE TABLE major(
    id SERIAL PRIMARY KEY NOT NULL
    , name VARCHAR(30) NOT NULL
    , abbr VARCHAR(10)
);

CREATE TABLE ab_member(
    id SERIAL PRIMARY KEY 
    , username VARCHAR(50) NOT NULL UNIQUE 
    , password VARCHAR(50) NOT NULL 
    , member_id int REFERENCES member(id) NOT NULL
    , position VARCHAR(20)
    , exp_date DATE 
);

CREATE TABLE document(
    id SERIAL PRIMARY KEY NOT NULL
    , title VARCHAR(50) NOT NULL
    , doc_type VARCHAR(10)
    , link VARCHAR(50) NOT NULL
    , to_print BIT 
    , date_created DATE
);

CREATE TABLE speaker(
    id SERIAL PRIMARY KEY NOT NULL
    , full_name VARCHAR(30) NOT NULL
    , title VARCHAR(50)
    , email VARCHAR(50)
    , phone VARCHAR(50)
);

CREATE TABLE event(
    id SERIAL PRIMARY KEY NOT NULL
    , event_name VARCHAR(40) NOT NULL
    , event_type VARCHAR(30)
);


CREATE TABLE calendar_event(
    id SERIAL PRIMARY KEY NOT NULL
    , event_id INT REFERENCES event(id)
    , speaker_id int REFERENCES speaker(id)
    , date_planned DATE NOT NULL
);

CREATE TABLE task(
    id SERIAL PRIMARY KEY NOT NULL
    , name VARCHAR(30) NOT NULL
    , complete_by DATE NOT NULL
    , event_id int REFERENCES calendar_event(id) NOT NULL
);

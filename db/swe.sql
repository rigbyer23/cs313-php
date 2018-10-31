DROP TABLE event;
DROP TABLE calendar_event;
DROP TABLE speaker;
DROP TABLE task;
DROP TABLE document;
DROP TABLE ab_member;
DROP TABLE member;
DROP TABLE major;


CREATE TABLE major(
    id SERIAL PRIMARY KEY NOT NULL
    , name TEXT NOT NULL
    , abbr VARCHAR(50)
);


CREATE TABLE member(
    id SERIAL PRIMARY KEY NOT NULL
    , first_name VARCHAR(50) NOT NULL
    , last_name VARCHAR(50) NOT NULL
    , email VARCHAR(30)
    , phone VARCHAR(20)
    , major_id INT REFERENCES major(id)
);


CREATE TABLE ab_member(
    id SERIAL PRIMARY KEY 
    , username VARCHAR(100) NOT NULL UNIQUE 
    , password VARCHAR(100) NOT NULL 
    , member_id int REFERENCES member(id) NOT NULL
    , position VARCHAR(50)
    , exp_date SMALLINT 
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

INSERT INTO major(name, abbr)
VALUES ('Computer Information Technology', 'CIT')
        ,('Web Design and Development','WDD')
        ,('Software Engineering', 'SE')
        ,('Computer Science', 'CS');


INSERT INTO member (first_name, last_name, email, phone, major_id)
VALUES ('Jane', 'Doe', 'ilovetarzan@gmail.com','964 555-1985', 1)
        ,('Emma', 'Watson', 'book.nerd@gmail.com','964 555-1991', 3)
        ,('Malala', 'Yousafzai', 'magicisreal@gmail.com','964 555-1996', 2)
        ,('Harriet', 'Tubman', 'freedomismine@gmail.com','964 555-1836', 2)
        ,('Marie', 'Curie', 'sciencesaveslives@gmail.com','964 555-1965', 4)
        ,('Ameila', 'Earheart', 'flygirl@gmail.com','964 555-1960', 3);
        ,('Dororthy', 'Vaughn', 'idomath@gmail.com', '946-555-1953', 4)
        ,('Mary', 'Jackson', 'firstcoder@gmail.com', '946-555-1946', 1)
        ,('Katherine', 'Johnson', 'womenengineer@gmail.com', '946-555-1943', 3);

INSERT INTO ab_member (username, password, member_id, position, exp_date)
 VALUES ('hermione12', 'iloveronw2', (SELECT id FROM member WHERE email = 'book.nerd@gmail.com'), 'President', 2020)
        ,('bbcblogger', 'pinkwrap', (SELECT id FROM member WHERE email = 'magicisreal@gmail.com'), 'Vice President', 2019)
        ,('flygirl60', 'icandowhatmendo', (SELECT id FROM member WHERE email = 'flygirl@gmail.com'), 'Secretary', 2021)
        ,('underground65', 'mossonthenorth', (SELECT id FROM member WHERE email = 'freedomismine@gmail.com'), 'Treasurer', 2023);

INSERT INTO speaker (full_name, title, email, phone)
VALUES('Mother Teresa', 'Albanian Nun', 'globalpeace@gmail.com', '876-555-1997')
        ,('Rosa Parks', 'Civil Rights Activist', 'myseat@gmail.com', '876-555-2005')
        ,('Anne Frank', 'Dutch Jewish Author', 'journalistjew@gmail.com', '865-555-1945');


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



SELECT first_name, last_name, email, position, username, position
FROM member m JOIN ab_member am ON m.id = am.member_id; 

SELECT *
FROM member;

SELECT first_name, phone
FROM member;

SELECT email 
FROM member
WHERE id > 1;

SELECT *
FROM member
ORDER BY last_name; 

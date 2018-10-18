INSERT INTO member (first_name, last_name, email, phone, major)
VALUES ('Jane', 'Doe', 'ilovetarzan@gmail.com','964 555-1985', 'CIT')
        ,('Janae', 'Christianson', 'j.dream@gmail.com','964 555-1595', 'Software Engineer')
        ,('Janae', 'Christianson', 'j.dream@gmail.com','964 555-1595', 'WDD');



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

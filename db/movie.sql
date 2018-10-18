
CREATE TABLE actor(
    id SERIAL PRIMARY KEY NOT NULL
    , name VARCHAR(50) NOT NULL
    , birth_year SMALLINT
);

CREATE TABLE movie(
    id SERIAL PRIMARY KEY NOT NULL
    , title VARCHAR(40) NOT NULL
    , runtime SMALLINT
    , year SMALLINT
);

CREATE TABLE actor_movie (
    id SERIAL PRIMARY KEY
    , actor_id INT NOT NULL REFERENCES actor(id)
    , movie_id INT NOT NULL REFERENCES movie(id)
);

INSERT INTO actor(name, birth_year)
VALUES
('Jimmy Stewart', 1908)
,('Tom Cruise', 1962)
,('Meryl Streep', 1949)
,('Carrie Fisher', 1956);

INSERT INTO movie(title, runtime, year)
VALUES
('The Giver', 127, 2005)
,('It''s a wonderful Life', 120, 1957)
,('Guardians of the Galaxy', 140, 2014);

INSERT INTO actor_movie(actor_id, movie_id)
VALUES
(2, 3)
,(1, 1)
,(1, 3)
,(4, 2)
,(1, 2);

SELECT * FROM movie m
JOIN actor_movie am ON m.id = am.movie_id
JOIN actor a ON am.actor_id = a.id
WHERE m.title = 'It''s a wonderful Life';
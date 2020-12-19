INSERT genre_title(name_genre)
VALUES ('Action');
INSERT genre_title(name_genre)
VALUES ('Fantasy');
INSERT genre_title(name_genre)
VALUES ('Romance');

INSERT author(first_name, second_name)
VALUES ('Ookouchi', 'Ichirou');
INSERT author(first_name, second_name)
VALUES ('Reki', 'Kawahara');
INSERT author(first_name, second_name)
VALUES ('Satou', 'Tsutomu');
INSERT author(first_name, second_name, DOB)
VALUES ('Hata', 'Kenjirou', '1975-11-19');

INSERT studio(name_studio)
VALUES ('Sunrise');
INSERT studio(name_studio)
VALUES ('A-1 Pictures');
INSERT studio(name_studio)
VALUES ('Madhouse');
INSERT studio(name_studio)
VALUES ('Seven Arcs');

INSERT titles(title, date_of_creation, episode_count, rating, exit_status, id_studio, id_author)
VALUES ('Code Geass', '2013-04-29', 24, 10,'Came Out',1,1);
INSERT titles(title, date_of_creation, episode_count, rating, exit_status, id_studio, id_author)
VALUES ('Sword Art Online', '2013-06-15', 25, 10, 'Came Out',2,2);
INSERT titles(title, date_of_creation, episode_count, rating, exit_status, id_studio, id_author)
VALUES ('The Irregular at Magic High School', '2014-09-12', 26, 8, 'Came Out',3,3);
INSERT titles(title, date_of_creation, episode_count, rating, exit_status, id_studio, id_author)
VALUES ('Over the Moon For You', '2020-12-19', 12, 10,'Ongoing',4,4);

INSERT title_to_genre(id_title, id_genre)
VALUES (1, 1);
INSERT title_to_genre(id_title, id_genre)
VALUES (2, 1);
INSERT title_to_genre(id_title, id_genre)
VALUES (2, 2);
INSERT title_to_genre(id_title, id_genre)
VALUES (3, 1);
INSERT title_to_genre(id_title, id_genre)
VALUES (3, 2);
INSERT title_to_genre(id_title, id_genre)
VALUES (4, 3);

INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Asuna', 'Yuuki', 'Lightning Flash');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Kirito', 'Kirigaya', 'Black Swordman');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Alice', 'Zuberg ', 'Alice Synthesis Thirty');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Eugeo', 'Eugeo', 'Eugeo');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Tsukasa', 'Yuzaki', 'Tsukuyomi Tsukasa');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Nasa', 'Yuzaki', 'Nasa Yuzaki');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Lelouch', 'Lamperouge', 'Lulu');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('C.', 'C.', 'Pizza Girl');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Tatsuya', 'Shiba', 'God of Destruction');
INSERT the_character(first_name_char, second_name_char, alias)
VALUES ('Miyuki', 'Shiba', 'Snow Queen');

INSERT character_to_title(id_title, id_character)
VALUES (1,7);
INSERT character_to_title(id_title, id_character)
VALUES (1,8);
INSERT character_to_title(id_title, id_character)
VALUES (2,1);
INSERT character_to_title(id_title, id_character)
VALUES (2,2);
INSERT character_to_title(id_title, id_character)
VALUES (2,3);
INSERT character_to_title(id_title, id_character)
VALUES (2,4);
INSERT character_to_title(id_title, id_character)
VALUES (2,1);
INSERT character_to_title(id_title, id_character)
VALUES (3,9);
INSERT character_to_title(id_title, id_character)
VALUES (3,10);
INSERT character_to_title(id_title, id_character)
VALUES (4,5);
INSERT character_to_title(id_title, id_character)
VALUES (4,6);
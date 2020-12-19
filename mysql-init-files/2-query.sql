USE animedb;
SELECT * FROM titles WHERE rating<10;
SELECT titles.title,alias FROM titles, the_character WHERE titles.id=the_character.id_title;
SELECT titles.title,first_name, second_name, DOB FROM author, titles WHERE DOB IS NOT NULL AND titles.id=author.id_title;
SELECT titles.id,title, date_of_creation, episode_count, rating, exit_status, first_name_char, second_name_char, alias FROM titles JOIN the_character ON the_character.id_title=titles.id;
SELECT name_studio,title FROM titles JOIN studio ON studio.id_title=titles.id;
SELECT title, name_studio FROM titles,studio WHERE exit_status='Ongoing' AND studio.id_title=titles.id;
SELECT * FROM titles ORDER BY episode_count;
SELECT titles.title, genre_title.name_genre FROM genre_title
 INNER JOIN title_to_genre ON genre_title.id = title_to_genre.id_genre LEFT JOIN titles ON title_to_genre.id_title = titles.id;

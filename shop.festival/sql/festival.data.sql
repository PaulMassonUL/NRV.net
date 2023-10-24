INSERT INTO `Spot` (`id`, `name`, `address`, `nb_standing`, `nb_seated`)
VALUES (1, "Théâtre Municipal", "123 Rue de la Scène", 200, 400),
       (2, "Salle de Concert Nancy", "456 Avenue de la Musique", 150, 300),
       (3, "Cinéma Étoile", "789 Boulevard du Cinéma", 100, 250),
       (4, "Palais des Congrès", "101 Place des Conférences", 300, 600),
       (5, "Salle Polyvalente", "202 Rue de l'Événement", 120, 240),
       (6, "Centre Culturel Nancy", "303 Avenue de la Culture", 80, 160),
       (7, "Théâtre du Centre", "404 Rue du Spectacle", 250, 500),
       (8, "Stade Nancy Arena", "505 Allée des Sports", 500, 1000),
       (9, "Auditorium Municipal", "606 Rue de la Musique", 150, 300),
       (10, "Espace des Congrès", "707 Boulevard des Conférences", 200, 400);

INSERT INTO `SpotImage` (`path`, `spot_id`)
VALUES ("https://loremflickr.com/800/600/theater", 1),
       ("https://loremflickr.com/1024/768/concert", 1),
       ("https://loremflickr.com/800/600/cinema", 2),
       ("https://loremflickr.com/1024/768/concert", 3),
       ("https://loremflickr.com/800/600/theater", 3),
       ("https://loremflickr.com/1024/768/conference", 4),
       ("https://loremflickr.com/800/600/venue", 5),
       ("https://loremflickr.com/1024/768/theater", 6),
       ("https://loremflickr.com/800/600/theater", 7),
       ("https://loremflickr.com/1024/768/stadium", 8),
       ("https://loremflickr.com/800/600/theater", 9),
       ("https://loremflickr.com/1024/768/concert", 9),
       ("https://loremflickr.com/800/600/conference", 10);

INSERT INTO `Evening` (`id`, `name`, `thematic`, `date`, `price`, `reduced_price`, `spot_id`)
VALUES (1, "Soirée Jazz", "Jazz", "2023-10-25 20:00:00", 20.00, 15.00, 1),
       (2, "Soirée Reggae", "Reggae", "2023-11-05 21:00:00", 25.00, 20.00, 2),
       (3, "Soirée Rock", "Rock", "2023-11-15 19:30:00", 22.00, 18.00, 3);

INSERT INTO `Show` (`id`, `title`, `description`, `time`, `video`, `evening_id`)
VALUES (1, "Spectacle de Magie", "Un spectacle de magie fascinant qui éblouira le public avec des tours incroyables.",
        "20:00:00", "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4", 1),
       (2, "Concert de Rock", "Un concert énergique avec des riffs de guitare percutants et une ambiance électrique.",
        "20:30:00", "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4", 1),
       (3, "Théâtre Comique", "Une comédie hilarante qui fera rire aux éclats le public du début à la fin.", "21:00:00",
        "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4", 1),
       (4, "Ballet Classique", "Une performance gracieuse de danse classique avec des costumes somptueux.", "21:30:00",
        "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4", 2),
       (5, "Spectacle de Cirque", "Un spectacle de cirque spectaculaire avec des acrobates et des clowns talentueux.",
        "22:00:00", "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4", 2),
       (6, "Concert de Jazz",
        "Une soirée de jazz envoûtante avec des mélodies suaves et des improvisations brillantes.", "20:00:00",
        "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4", 3);

INSERT INTO `ShowImage` (`path`, `show_id`)
VALUES ("https://loremflickr.com/320/240/show", 1),
       ("https://loremflickr.com/640/480/show", 1),
       ("https://loremflickr.com/800/600/show", 1),
       ("https://loremflickr.com/400/300/show", 2),
       ("https://loremflickr.com/300/200/show", 3),
       ("https://loremflickr.com/640/480/show", 3),
       ("https://loremflickr.com/420/315/show", 4),
       ("https://loremflickr.com/680/510/show", 4),
       ("https://loremflickr.com/880/660/show", 4),
       ("https://loremflickr.com/480/360/show", 5),
       ("https://loremflickr.com/720/540/show", 5),
       ("https://loremflickr.com/400/300/show", 6),
       ("https://loremflickr.com/640/480/show", 6);

INSERT INTO `Artist` (`id`, `name`, `show_id`)
VALUES (1, "Pierre", 1),
       (2, "Paul", 2),
       (3, "Jacques", 3),
       (4, "Jean", 4),
       (5, "Marie", 5),
       (6, "Julie", 6);

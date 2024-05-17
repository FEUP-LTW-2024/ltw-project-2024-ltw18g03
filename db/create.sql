DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Album;
DROP TABLE IF EXISTS Item;
DROP TABLE IF EXISTS Wishlist;
DROP TABLE IF EXISTS Mail;


--Table created for every user that is registered
CREATE TABLE User
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    profilePicture VARCHAR(30) NOT NULL DEFAULT 'white',
    city VARCHAR(30) NOT NULL,
    postalCode CHAR(8),
    phone CHAR(9),
    email VARCHAR(30) NOT NULL,
    passwordHash VARCHAR(30) NOT NULL,
    isAdmin BOOLEAN NOT NULL DEFAULT FALSE,
    joinDate DATE NOT NULL DEFAULT CURRENT_DATE
);
-- Populate Users
INSERT INTO User (firstName, lastName, profilePicture, city, postalCode, phone, email, passwordHash, isAdmin) 
VALUES 
('Rodrigo', 'de Sousa', 'orange', 'Porto', '4250-453', '966110454', 'rodrigodiasdesousa@gmail.com', '$2y$10$SRvGoGEpu.Nh02H5.bd.aevXrWclSL9Irh6zcxW1DJ7kFWRzzcAFS', TRUE),
('User', 'One', 'white', 'Porto', '1234-123', '123456789', 'user1@example.com', '$2y$10$SRvGoGEpu.Nh02H5.bd.aevXrWclSL9Irh6zcxW1DJ7kFWRzzcAFS', FALSE),
('User', 'Two', 'white', 'Porto', '1234-123', '123456789', 'user2@example.com', '$2y$10$SRvGoGEpu.Nh02H5.bd.aevXrWclSL9Irh6zcxW1DJ7kFWRzzcAFS', FALSE),
('User', 'Three', 'white', 'Porto', '1234-123', '123456789', 'user3@example.com', '$2y$10$SRvGoGEpu.Nh02H5.bd.aevXrWclSL9Irh6zcxW1DJ7kFWRzzcAFS', FALSE),
('User', 'Four', 'white', 'Porto', '1234-123', '123456789', 'user4@example.com', '$2y$10$SRvGoGEpu.Nh02H5.bd.aevXrWclSL9Irh6zcxW1DJ7kFWRzzcAFS', FALSE),
('Gonçalo', 'Sousa', 'orange', 'Aveiro', '3700-793', '916891858', 'guguini2004@gmail.com', '$2y$10$SRvGoGEpu.Nh02H5.bd.aevXrWclSL9Irh6zcxW1DJ7kFWRzzcAFS', TRUE);

-- Table created for every album on the db, not necessarily on sale
CREATE TABLE Album
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(25) NOT NULL CHECK (LENGTH(title) <= 25), --album name
    artist VARCHAR(30) NOT NULL, --album artist
    yearOfRelease CHAR(4) NOT NULL, --date of release
    cover VARCHAR(255) NOT NULL, --cover url
    genre TEXT NOT NULL, --all genres, comma-seperated-values
    rym FLOAT NOT NULL CHECK (rym >= 1 AND rym <= 5), --rym rating
    quantity INTEGER NOT NULL, --number of items for sale
    averagePrice FLOAT NOT NULL --average price of the items for sale
);

-- Populate Albums
INSERT INTO Album (title, artist, yearOfRelease, cover, genre, rym, quantity, averagePrice) 
VALUES 
('Thriller', 'Michael Jackson', '1982', 'https://upload.wikimedia.org/wikipedia/en/5/55/Michael_Jackson_-_Thriller.png', 'Pop, R&B', 3.99, 0, 0.0),
('Back in Black', 'AC/DC', '1980', 'https://upload.wikimedia.org/wikipedia/commons/9/92/ACDC_Back_in_Black.png', 'Hard Rock',  3.46, 0, 0.0),
('The Dark Side of the Moon', 'Pink Floyd', '1973', 'https://upload.wikimedia.org/wikipedia/pt/3/3b/Dark_Side_of_the_Moon.png', 'Progressive Rock', 4.24, 0, 0.0),
('Abbey Road', 'The Beatles', '1969', 'https://upload.wikimedia.org/wikipedia/en/4/42/Beatles_-_Abbey_Road.jpg', 'Rock', 4.27, 0, 0.0),
('The Wall', 'Pink Floyd', '1979', 'https://i.scdn.co/image/ab67616d0000b2735d48e2f56d691f9a4e4b0bdf', 'Progressive Rock', 3.82, 0, 0.0),
('Led Zeppelin IV', 'Led Zeppelin', '1971', 'https://upload.wikimedia.org/wikipedia/pt/4/4b/LedZeppelinIV.jpg', 'Hard Rock', 4.09, 0, 0.0),
('Hotel California', 'Eagles', '1976', 'https://upload.wikimedia.org/wikipedia/en/4/49/Hotelcalifornia.jpg', 'Rock', 3.27, 0, 0.0),
('Rumours', 'Fleetwood Mac', '1977', 'https://upload.wikimedia.org/wikipedia/en/f/fb/FMacRumours.PNG', 'Rock', 4.03, 0, 0.0),
('Born to Run', 'Bruce Spring', '1975', 'https://upload.wikimedia.org/wikipedia/en/7/7a/Born_to_Run_%28Front_Cover%29.jpg', 'Rock', 3.96, 0, 0.0),
('The Joshua Tree', 'U2','1987', 'https://upload.wikimedia.org/wikipedia/en/6/6b/The_Joshua_Tree.png', 'Rock', 3.88, 0, 0.0),
('Nevermind', 'Nirvana', '1991', 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/NirvanaNevermindalbumcover.jpg/220px-NirvanaNevermindalbumcover.jpg', 'Grunge, Alternative Rock', 4.01, 0, 0.0),
('The Chronic', 'Dr. Dre', '1992', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/19/Dr.DreTheChronic.jpg/220px-Dr.DreTheChronic.jpg', 'West Coast Hip Hop, G-Funk', 3.83, 0, 0.0),
('Ten', 'Pearl Jam', '1991', 'https://upload.wikimedia.org/wikipedia/pt/thumb/d/da/Pearl_Jam_-_Ten.jpg/220px-Pearl_Jam_-_Ten.jpg', 'Grunge, Alternative Rock', 3.74, 0, 0.0),
('The Slim Shady LP', 'Eminem', '1999', 'https://upload.wikimedia.org/wikipedia/pt/f/f9/The_Slim_Shady_LP.jpg', 'Hip Hop', 3.51, 0, 0.0),
('OK Computer', 'Radiohead', '1997', 'https://upload.wikimedia.org/wikipedia/en/b/ba/Radioheadokcomputer.png', 'Alternative Rock, Experimental', 4.29, 0, 0.0),
('Achtung Baby', 'U2', '1991', 'https://upload.wikimedia.org/wikipedia/en/7/72/Achtung_Baby.png', 'Alternative Rock', 3.70, 0, 0.0),
('The College Dropout', 'Kanye West', '2004', 'https://upload.wikimedia.org/wikipedia/en/a/a3/Kanyewest_collegedropout.jpg', 'Hip Hop', 4.12, 0, 0.0),
('Definitely Maybe', 'Oasis', '1994', 'https://upload.wikimedia.org/wikipedia/en/d/d4/OasisDefinitelyMaybealbumcover.jpg', 'Britpop, Rock', 3.65, 0, 0.0),
('In Utero', 'Nirvana', '1993', 'https://upload.wikimedia.org/wikipedia/pt/b/b4/InUtero.jpeg', 'Grunge, Alternative Rock', 4.05, 0, 0.0),
('Californication', 'Red Hot Chili Peppers', '1999', 'https://upload.wikimedia.org/wikipedia/pt/7/78/Red_Hot_Chili_Peppers_-_Californication.jpg', 'Alternative Rock, Funk Rock', 3.47, 0, 0.0),
('The Marshall Mathers LP', 'Eminem', '2000', 'https://upload.wikimedia.org/wikipedia/en/a/ae/The_Marshall_Mathers_LP.jpg', 'Hip Hop', 3.68, 0, 0.0),
('Debut', 'Björk', '1993', 'https://upload.wikimedia.org/wikipedia/en/7/77/Bj%C3%B6rk-Debut-1993.png', 'Art Pop, House', 3.77, 0, 0.0),
('The Bends', 'Radiohead', '1995', 'https://upload.wikimedia.org/wikipedia/en/5/55/Radioheadthebends.png', 'Alternative Rock', 3.86, 0, 0.0),
('The Blueprint', 'Jay-Z', '2001', 'https://upload.wikimedia.org/wikipedia/en/2/2c/The_Blueprint.png', 'East Coast Hip Hop', 3.87, 0, 0.0),
('The Queen Is Dead', 'The Smiths', '1986', 'https://upload.wikimedia.org/wikipedia/en/e/ed/The-Queen-is-Dead-cover.png', 'Alternative Rock', 4.13, 0, 0.0),
('The Doors', 'The Doors', '1967', 'https://upload.wikimedia.org/wikipedia/en/9/98/TheDoorsTheDoorsalbumcover.jpg', 'Psychedelic Rock', 4.08, 0, 0.0),
('Aja', 'Steely Dan', '1977', 'https://upload.wikimedia.org/wikipedia/en/4/49/Aja_album_cover.jpg', 'Jazz Rock', 4.01, 0, 0.0),
('Ágætis byrjun', 'Sigur Rós', '1999', 'https://upload.wikimedia.org/wikipedia/en/9/92/%C3%81g%C3%A6tisByrjunCover.JPG', 'Post-Rock', 4.04, 0, 0.0),
('The Stone Roses', 'The Stone Roses', '1989', 'https://upload.wikimedia.org/wikipedia/en/f/ff/Stoneroses.jpg', 'Indie Rock', 4.00, 0, 0.0),
('Mezzanine', 'Massive Attack', '1998', 'https://upload.wikimedia.org/wikipedia/en/e/e9/Massive_Attack_-_Mezzanine.png', 'Trip Hop', 4.07, 0, 0.0),
('London Calling', 'The Clash', '1979', 'https://upload.wikimedia.org/wikipedia/en/0/00/TheClashLondonCallingalbumcover.jpg', 'Punk Rock', 4.01, 0, 0.0),
('Electric Warrior', 'T. Rex', '1971', 'https://upload.wikimedia.org/wikipedia/en/e/e5/T_Rex_Electric_Warrior_UK_album_cover.jpg', 'Punk Rock', 3.89, 0, 0.0),
('Little Girl Blue', 'Nina Simone', '1959', 'https://upload.wikimedia.org/wikipedia/en/5/53/Ninasimonelittlegirlblue.jpg', 'Jazz', 3.88, 0, 0.0),
('Volume 1', 'José Pinhal', '1984', 'https://i.discogs.com/tpdykHHLh2XV0TOpLpOdIPlXWbxeLmrVTucDIbbqDw4/rs:fit/g:sm/q:90/h:600/w:587/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTIxNzE4/MjM0LTE2Njk1ODcy/NTMtMzAzNi5qcGVn.jpeg', 'PPM', 3.64, 0, 0.0),
('So Alone ', 'Johnny Thunders', '1978', 'https://upload.wikimedia.org/wikipedia/en/b/b1/Johnny_Thunders_So_Alone.jpg', 'Punk Rock', 3.64, 0, 0.0),
('Appetite for Destruction', 'Guns N Roses', '1987', 'https://upload.wikimedia.org/wikipedia/en/6/60/GunsnRosesAppetiteforDestructionalbumcover.jpg', 'Hard Rock', 3.92, 0, 0.0),
('Toys in the Attic', 'Aerosmith', '1975', 'https://upload.wikimedia.org/wikipedia/en/3/37/Aerosmith_-_Toys_in_the_Attic.jpg', 'Hard Rock', 3.51, 0, 0.0),
('Rocks ', 'Aerosmith', '1976', 'https://upload.wikimedia.org/wikipedia/en/8/87/Aerosmith_-_Rocks.JPG', 'Hard Rock', 3.59, 0, 0.0),
('Life', 'Thin Lizzy', '1983', 'https://en.wikipedia.org/wiki/Life_(Thin_Lizzy_album)#/media/File:Thin_Lizzy_-_Life.jpg', 'Hard Rock', 3.88, 0, 0.0),
('Transformer', 'Lou Reed', '1972', 'https://upload.wikimedia.org/wikipedia/en/f/f1/Loureedtransformer.jpeg', 'Glam Rock', 3.90, 0, 0.0),
('Pearl (Legacy Edition)', 'Janis Joplin', '1971', 'https://en.wikipedia.org/wiki/Pearl_(Janis_Joplin_album)#/media/File:Janis_Joplin-Pearl_(album_cover).jpg', 'Blues Rock', 3.73, 0, 0.0),
('Marquee Moon', 'Television', '1977', 'https://upload.wikimedia.org/wikipedia/en/a/af/Marquee_moon_album_cover.jpg', 'Post-Punk', 4.14, 0, 0.0),
('Never Mind the Bollocks', 'Sex Pistols', '1977', 'https://upload.wikimedia.org/wikipedia/en/4/4c/Never_Mind_the_Bollocks%2C_Here%27s_the_Sex_Pistols.png', 'Punk Rock', 3.53, 0, 0.0),
('Rum Sodomy & the Lash', 'The Pogues', '1985', 'https://upload.wikimedia.org/wikipedia/en/e/eb/Rum_sodomy_and_the_lash.jpg', 'Glam Rock', 4.14, 0, 0.0);



-- Table created for each item to be sold
CREATE TABLE Item
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(64) NOT NULL,
    descriptionOfItem TEXT DEFAULT 'no description was provided by the seller',
    price FLOAT NOT NULL,
    condition VARCHAR(40),
    sold BOOLEAN DEFAULT FALSE,
    listDate DATE NOT NULL DEFAULT CURRENT_DATE,
    seller INTEGER REFERENCES User(ID) ON DELETE CASCADE,
    buyer INTEGER REFERENCES User(ID) ON DELETE SET NULL DEFAULT NULL,
    album INTEGER REFERENCES Album(ID) ON DELETE CASCADE
);


-- Table created for each picture for each item
CREATE TABLE Wishlist
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    userID INTEGER REFERENCES User(ID) ON DELETE CASCADE,
    albumID INTEGER REFERENCES Album(ID) ON DELETE CASCADE
);
-- Populate Wishlist
INSERT INTO Wishlist (userID, albumID)
VALUES
(1, 1),
(1, 2),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 15),
(1, 20),
(1, 21),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 19),
(2, 20),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 19),
(4, 20),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 8),
(5, 9),
(5, 10);

-- Mail Table for Messaging system
CREATE TABLE Mail 
(
    idMail INTEGER PRIMARY KEY NOT NULL,
    senderID INTEGER NOT NULL REFERENCES User(ID) ON DELETE CASCADE,
    receiverID INTEGER NOT NULL REFERENCES User(ID) ON DELETE CASCADE,
    itemID INTEGER NOT NULL REFERENCES Item(ID) ON DELETE CASCADE,
    title VARCHAR(64) NOT NULL,
    content TEXT NOT NULL,
    timest DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- Populate Mail
INSERT INTO Mail (senderID, receiverID, itemID, title, content)
VALUES 
(1, 2, 1, 'Hello', 'Hello, I am interested in buying your album.'),
(2, 1, 2, 'Re: Hello', 'Hello, I am glad you are interested in my album. I can give you a discount if you buy more than one.'),
(1, 2, 3, 'Hello', 'Hello, I am interested in buying your album.'),
(2, 1, 4, 'Re: Hello', 'Hello, I am glad you are interested in my album. I can give you a discount if you buy more than one.'),
(1, 2, 5, 'Hello', 'Hello, I am interested in buying your album.'),
(2, 1, 6, 'Re: Hello', 'Hello, I am glad you are interested in my album. I can give you a discount if you buy more than one.'),
(1, 2, 7, 'Hello', 'Hello, I am interested in buying your album.'),
(2, 1, 8, 'Re: Hello', 'Hello, I am glad you are interested in my album. I can give you a discount if you buy more than one.'),
(1, 2, 9, 'Hello', 'Hello, I am interested in buying your album.'),
(2, 1, 10, 'Re: Hello', 'Hello, I am glad you are interested in my album. I can give you a discount if you buy more than one.'),
(1, 2, 11, 'Hello', 'Hello, I am interested in buying your album.'),
(2, 1, 12, 'Re: Hello', 'Hello, I am glad you are interested in my album. I can give you a discount if you buy more than one.'),
(1, 2, 13, 'Hello', 'Hello, I am interested in buying your album.'),
(2, 1, 14, 'Re: Hello', 'Hello, I am glad you are interested in my album. I can give you a discount if you buy more than one.'),
(1, 2, 15, 'Hello', 'Hello, I am interested in buying your album.'),
(2, 1, 16, 'Re: Hello', 'Hello, I am glad you are interested in my album. I can give you a discount if you buy more than one.');




-- Trigger to increment quantity when a new item is inserted
CREATE TRIGGER increment_album_quantity_trigger
AFTER INSERT ON Item
BEGIN
    UPDATE Album
    SET quantity = quantity + 1
    WHERE ID = NEW.album;
END;

-- Trigger to decrement quantity when an item is deleted
CREATE TRIGGER decrement_album_quantity_trigger
AFTER DELETE ON Item
BEGIN
    UPDATE Album
    SET quantity = quantity - 1
    WHERE ID = OLD.album;
END;

-- Trigger to update average price when a new item is inserted
CREATE TRIGGER update_album_average_price_insert_trigger
AFTER INSERT ON Item
BEGIN
    UPDATE Album
    SET averagePrice = (
        (averagePrice * quantity + NEW.price) / (quantity + 1)
    )
    WHERE ID = NEW.album;
END;

-- Trigger to update average price when an item is deleted
CREATE TRIGGER update_album_average_price_delete_trigger
AFTER DELETE ON Item
BEGIN
    UPDATE Album
    SET averagePrice = (
        (averagePrice * quantity - OLD.price) / (quantity - 1)
    )
    WHERE ID = OLD.album AND quantity > 1;
END;
    

-- Populate Items
INSERT INTO Item (title, descriptionOfItem, price, condition, seller, album)
VALUES
('Vintage Rock Vinyl', 'Rare 70s rock album in great condition.', 120.00, 'Near Mint', 1, 1),
('Jazz Classics Collection', 'A must-have collection for jazz enthusiasts.', 150.00, 'Mint', 2, 2),
('The Blues Anthology', 'Deep and soulful blues from the Mississippi Delta.', 90.00, 'Very Good', 3, 3),
('Indie Rock Hits', 'A compilation of the best indie rock songs.', 75.00, 'Light Scratches', 4, 4),
('Electronic Vibes', 'Electrifying beats and soothing melodies.', 60.00, 'Damaged Cover', 5, 5),
('Pop Icons', 'Greatest hits from the world’s biggest pop stars.', 80.00, 'Scratched', 1, 6),
('Hip-Hop Masters', 'The essential tracks from hip-hop legends.', 110.00, 'Near Mint', 2, 7),
('Country Classics', 'Heartfelt stories from country music’s finest.', 70.00, 'Mint', 3, 8),
('Reggae Rhythms', 'Chill out with these smooth reggae tunes.', 65.00, 'Very Good', 4, 9),
('Soulful Sounds', 'Soul music that touches the heart.', 85.00, 'Light Scratches', 5, 10),
('Hard Rock Essentials', 'The loudest, most explosive hard rock tracks.', 95.00, 'Damaged Cover', 1, 11),
('Classical Masterpieces', 'Timeless classical music from the maestros.', 100.00, 'Scratched', 2, 12),
('Folk Favorites', 'Folk music that tells a story.', 55.00, 'Near Mint', 3, 13),
('Punk Rock Rebellion', 'Punk anthems that defined a generation.', 45.00, 'Mint', 4, 14),
('Heavy Metal Thunder', 'Heavy metal that’s as loud as it gets.', 105.00, 'Very Good', 5, 15),
('Blues Guitar Legends', 'The greatest guitarists in blues history.', 115.00, 'Light Scratches', 1, 16),
('Jazz Fusion Journeys', 'Experimental sounds from jazz fusion artists.', 50.00, 'Damaged Cover', 2, 17),
('Electronic Dance Music Hits', 'The biggest EDM tracks for the dance floor.', 65.00, 'Scratched', 3, 18),
('R&B Grooves', 'Smooth R&B tracks to get you in the groove.', 75.00, 'Near Mint', 4, 19),
('Alternative Rock Adventures', 'Alternative rock tracks that defy genres.', 85.00, 'Mint', 5, 20),
('Opera Classics', 'The most powerful and emotive opera performances.', 95.00, 'Very Good', 1, 21),
('Ska and Reggae Rhythms', 'The infectious beats of ska and reggae music.', 60.00, 'Light Scratches', 2, 21),
('Classic Rock Anthems', 'The ultimate collection of classic rock hits.', 90.00, 'Near Mint', 3, 1),
('Smooth Jazz Grooves', 'Relaxing and melodic jazz tunes for a laid-back vibe.', 70.00, 'Mint', 4, 2),
('Country Legends', 'Timeless country songs from legendary artists.', 80.00, 'Very Good', 5, 3),
('Reggae Party Mix', 'Get the party started with these upbeat reggae tracks.', 65.00, 'Light Scratches', 1, 4),
('Soulful Ballads', 'Emotional and soul-stirring ballads that tug at the heartstrings.', 85.00, 'Damaged Cover', 2, 5),
('Hard Rock Revival', 'Modern hard rock tracks that pack a punch.', 95.00, 'Scratched', 3, 6),
('Classical Piano Masterpieces', 'Beautiful piano compositions from classical composers.', 100.00, 'Near Mint', 4, 7),
('Folk Revival', 'Contemporary folk music that pays homage to the classics.', 55.00, 'Mint', 5, 8),
('Punk Rock Rebellion II', 'The next generation of punk rock anthems.', 45.00, 'Very Good', 1, 9),
('Heavy Metal Mayhem', 'Intense and aggressive heavy metal tracks for headbangers.', 105.00, 'Light Scratches', 2, 10),
('Blues Harmonica Legends', 'Soulful blues performances featuring the harmonica.', 115.00, 'Damaged Cover', 3, 11),
('Jazz Fusion Explorations', 'Cutting-edge and experimental jazz fusion compositions.', 50.00, 'Scratched', 4, 12),
('Electronic Dance Music Extravaganza', 'Energetic and pulsating EDM tracks for the ultimate dance party.', 65.00, 'Near Mint', 5, 13),
('R&B Sensations', 'Smooth and seductive R&B tracks to set the mood.', 75.00, 'Mint', 1, 14),
('Alternative Rock Revolution', 'Revolutionary alternative rock songs that challenge the status quo.', 85.00, 'Very Good', 2, 15),
('Opera Divas', 'Powerful and awe-inspiring performances by opera divas.', 95.00, 'Light Scratches', 3, 16),
('Ska and Reggae Revival', 'The resurgence of ska and reggae music with a modern twist.', 60.00, 'Damaged Cover', 4, 17),
('Classic Rock Ballads', 'Heartfelt and emotional ballads from the golden era of classic rock.', 90.00, 'Scratched', 5, 18),
('Smooth Jazz Vibes', 'Smooth and sophisticated jazz tunes for a relaxing atmosphere.', 70.00, 'Near Mint', 1, 19),
('Country Hits', 'Chart-topping country hits that will make you sing along.', 80.00, 'Mint', 2, 20),
('Reggae Classics', 'Timeless reggae classics that never go out of style.', 65.00, 'Very Good', 3, 21),
('Soulful Grooves', 'Soulful and groovy tracks that will get you moving.', 85.00, 'Light Scratches', 4, 1),
('Hard Rock Anthems', 'The ultimate collection of hard rock anthems that will blow you away.', 95.00, 'Damaged Cover', 5, 2),
('Classical Guitar Masterpieces', 'Beautiful and intricate guitar compositions from classical composers.', 100.00, 'Scratched', 1, 3),
('Folk Classics', 'Timeless folk classics that tell stories of love, loss, and life.', 55.00, 'Near Mint', 2, 4),
('Punk Rock Pioneers', 'The pioneers of punk rock who paved the way for future generations.', 45.00, 'Mint', 3, 5),
('Heavy Metal Legends', 'The legendary bands and artists who defined the heavy metal genre.', 105.00, 'Very Good', 4, 6),
('Blues Guitar Heroes', 'The guitar heroes of the blues who influenced generations of musicians.', 115.00, 'Light Scratches', 5, 7),
('Jazz Fusion Innovators', 'The innovative and groundbreaking artists who pushed the boundaries of jazz fusion.', 50.00, 'Damaged Cover', 1, 8),
('Electronic Dance Music Icons', 'The iconic figures who shaped the electronic dance music scene.', 65.00, 'Scratched', 2, 9),
('R&B Legends', 'The legendary figures who defined the R&B genre and influenced generations of artists.', 75.00, 'Near Mint', 3, 10),
('Alternative Rock Icons', 'The iconic bands and artists who defined the alternative rock genre.', 85.00, 'Mint', 4, 11),
('Opera Masters', 'The masters of opera whose performances continue to captivate audiences around the world.', 95.00, 'Very Good', 5, 12),
('Ska and Reggae Legends', 'The legendary figures who shaped the ska and reggae genres and inspired countless musicians.', 60.00, 'Light Scratches', 1, 13),
('Classic Rock Legends', 'The legendary bands and artists who defined the classic rock genre and continue to inspire new generations of musicians.', 90.00, 'Near Mint', 2, 14),
('Smooth Jazz Masters', 'The masters of smooth jazz whose music continues to soothe and inspire listeners around the world.', 70.00, 'Mint', 3, 15),
('Country Pioneers', 'The pioneers of country music who laid the foundation for the genre and inspired countless artists.', 80.00, 'Very Good', 4, 16),
('Reggae Pioneers', 'The pioneers of reggae music who brought the sounds of Jamaica to the world stage.', 65.00, 'Light Scratches', 5, 17),
('Soulful Legends', 'The legendary figures who defined the soul genre and continue to inspire new generations of artists.', 85.00, 'Damaged Cover', 1, 18),
('Hard Rock Heroes', 'The heroes of hard rock who brought the thunder and the fury to the stage.', 95.00, 'Scratched', 2, 19),
('Classical Masters', 'The masters of classical music whose compositions continue to resonate with audiences around the world.', 100.00, 'Near Mint', 3, 20),
('Folk Pioneers', 'The pioneers of folk music who brought the sounds of the past into the present.', 55.00, 'Mint', 4, 21);



--Populate Sold Items
INSERT INTO Item (title, descriptionOfItem, price, condition, sold, seller, buyer, album)
VALUES
('Vintage Rock Vinyl', 'Rare 70s rock album in great condition.', 120.00, 'Near Mint', TRUE, 1, 2, 1),
('Jazz Classics Collection', 'A must-have collection for jazz enthusiasts.', 150.00, 'Mint', TRUE, 2, 1, 2),
('The Blues Anthology', 'Deep and soulful blues from the Mississippi Delta.', 90.00, 'Very Good', TRUE, 3, 4, 3),
('Indie Rock Hits', 'A compilation of the best indie rock songs.', 75.00, 'Light Scratches', TRUE, 4, 3, 4),
('Electronic Vibes', 'Electrifying beats and soothing melodies.', 60.00, 'Damaged Cover', TRUE, 5, 2, 5),
('Pop Icons', 'Greatest hits from the world’s biggest pop stars.', 80.00, 'Scratched', TRUE, 1, 3, 6),
('Hip-Hop Masters', 'The essential tracks from hip-hop legends.', 110.00, 'Near Mint', TRUE, 2, 5, 7),
('Country Classics', 'Heartfelt stories from country music’s finest.', 70.00, 'Mint', TRUE, 3, 1, 8),
('Reggae Rhythms', 'Chill out with these smooth reggae tunes.', 65.00, 'Very Good', TRUE, 4, 2, 9),
('Soulful Sounds', 'Soul music that touches the heart.', 85.00, 'Light Scratches', TRUE, 5, 4, 10),
('Hard Rock Essentials', 'The loudest, most explosive hard rock tracks.', 95.00, 'Damaged Cover', TRUE, 1, 5, 11),
('Classical Masterpieces', 'Timeless classical music from the maestros.', 100.00, 'Scratched', TRUE, 2, 3, 12),
('Folk Favorites', 'Folk music that tells a story.', 55.00, 'Near Mint', TRUE, 3, 2, 13),
('Punk Rock Rebellion', 'Punk anthems that defined a generation.', 45.00, 'Mint', TRUE, 4, 1, 14),
('Heavy Metal Thunder', 'Heavy metal that’s as loud as it gets.', 105.00, 'Very Good', TRUE, 5, 5, 15),
('Blues Guitar Legends', 'The greatest guitarists in blues history.', 115.00, 'Light Scratches', TRUE, 1, 3, 16),
('Jazz Fusion Journeys', 'Experimental sounds from jazz fusion artists.', 50.00, 'Damaged Cover', TRUE, 2, 2, 17),
('Electronic Dance Music Hits', 'The biggest EDM tracks for the dance floor.', 65.00, 'Scratched', TRUE, 3, 4, 18),
('R&B Grooves', 'Smooth R&B tracks to get you in the groove.', 75.00, 'Near Mint', TRUE, 4, 5, 19),
('Alternative Rock Adventures', 'Alternative rock tracks that defy genres.', 85.00, 'Mint', TRUE, 5, 1, 20),
('Opera Classics', 'The most powerful and emotive opera performances.', 95.00, 'Very Good', TRUE, 1, 2, 21),
('Ska and Reggae Rhythms', 'The infectious beats of ska and reggae music.', 60.00, 'Light Scratches', TRUE, 2, 3, 21),
('Classic Rock Anthems', 'The ultimate collection of classic rock hits.', 90.00, 'Near Mint', TRUE, 3, 4, 1),
('Smooth Jazz Grooves', 'Relaxing and melodic jazz tunes for a laid-back vibe.', 70.00, 'Mint', TRUE, 4, 5, 2),
('Country Legends', 'Timeless country songs from legendary artists.', 80.00, 'Very Good', TRUE, 5, 1, 3),
('Reggae Party Mix', 'Get the party started with these upbeat reggae tracks.', 65.00, 'Light Scratches', TRUE, 1, 2, 4),
('Soulful Ballads', 'Emotional and soul-stirring ballads that tug at the heartstrings.', 85.00, 'Damaged Cover', TRUE, 2, 3, 5);
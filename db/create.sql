DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Album;
DROP TABLE IF EXISTS Item;
DROP TABLE IF EXISTS ProfilePicture;
DROP TABLE IF EXISTS Wishlist;
DROP TABLE IF EXISTS Image;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS Chat;
DROP TABLE IF EXISTS Message;


--Table created for every user that is registered in
CREATE TABLE User
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    profilePicture INTEGER REFERENCES ProfilePicture(ID) DEFAULT 0,
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
('John', 'Doe', 1, 'New York', '1000-101', '123456789', 'john@example.com', 'hashed_password', FALSE),
('Jane', 'Smith', 2, 'Los Angeles', '9000-111', '987654321', 'jane@example.com', 'hashed_password', FALSE),
('Admin', 'Adminson', 1, 'Admin City', '1234-345', '111222333', 'admin@example.com', 'admin_password_hash', TRUE),
--('Gonçalo', 'Sousa', ...),
('Rodrigo', 'de Sousa', 5, 'Porto', '4250-453', '966110454', 'rodrigodiasdesousa@gmail.com', 'what_imnot_doingTHAT', TRUE);

-- Table created for every album on the db, not necessarily on sale
CREATE TABLE Album
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(30) NOT NULL, --album name
    artist VARCHAR(30) NOT NULL, --album artist
    songs TEXT NOT NULL, --all songs, comma-seperated-values
    yearOfRelease CHAR(4) NOT NULL, --date of release
    cover VARCHAR(255) NOT NULL, --cover url
    genre TEXT NOT NULL, --all genres, comma-seperated-values
    rym FLOAT NOT NULL CHECK (rym >= 1 AND rym <= 5), --rym rating
    quantity INTEGER NOT NULL, --number of items for sale
    averagePrice FLOAT NOT NULL --average price of the items for sale
);

-- Populate Albums
INSERT INTO Album (title, artist, songs, yearOfRelease, cover, genre, rym, quantity, averagePrice) 
VALUES 
('Thriller', 'Michael Jackson', 'Wanna Be Startin Somethin, Thriller, Beat It, Billie Jean, Human Nature, P.Y.T. (Pretty Young Thing), The Lady in My Life', '1982', 'https://upload.wikimedia.org/wikipedia/en/5/55/Michael_Jackson_-_Thriller.png', 'Pop, R&B', 3.99, 0, 0.0),
('Back in Black', 'AC/DC', 'Hells Bells, Shoot to Thrill, What Do You Do for Money Honey, Givin the Dog a Bone, Let Me Put My Love into You, Back in Black, You Shook Me All Night Long, Have a Drink on Me, Shake a Leg, Rock and Roll Aint Noise Pollution', '1980', 'https://upload.wikimedia.org/wikipedia/commons/9/92/ACDC_Back_in_Black.png', 'Hard Rock',  3.46, 0, 0.0),
('The Dark Side of the Moon', 'Pink Floyd', 'Speak to Me, Breathe, On the Run, Time, The Great Gig in the Sky, Money, Us and Them, Any Colour You Like, Brain Damage, Eclipse', '1973', 'https://upload.wikimedia.org/wikipedia/pt/3/3b/Dark_Side_of_the_Moon.png', 'Progressive Rock', 4.24, 0, 0.0),
('Abbey Road', 'The Beatles', 'Come Together, Something, Maxwell''s Silver Hammer, Oh! Darling, Octopus''s Garden, I Want You (She''s So Heavy), Here Comes the Sun, Because, You Never Give Me Your Money, Sun King, Mean Mr. Mustard, Polythene Pam, She Came in Through the Bathroom Window, Golden Slumbers, Carry That Weight, The End, Her Majesty', '1969', 'https://upload.wikimedia.org/wikipedia/en/4/42/Beatles_-_Abbey_Road.jpg', 'Rock', 4.27, 0, 0.0),
('The Wall', 'Pink Floyd', 'In the Flesh?, The Thin Ice, Another Brick in the Wall Part 1, The Happiest Days of Our Lives, Another Brick in the Wall Part 2, Mother, Goodbye Blue Sky, Empty Spaces, Young Lust, One of My Turns, Don''t Leave Me Now, Another Brick in the Wall Part 3, Goodbye Cruel World, Hey You, Is There Anybody Out There?, Nobody Home, Vera, Bring the Boys Back Home, Comfortably Numb, The Show Must Go On, In the Flesh, Run Like Hell, Waiting for the Worms, Stop, The Trial, Outside the Wall', '1979', 'https://i.scdn.co/image/ab67616d0000b2735d48e2f56d691f9a4e4b0bdf', 'Progressive Rock', 3.82, 0, 0.0),
('Led Zeppelin IV', 'Led Zeppelin', 'Black Dog, Rock and Roll, The Battle of Evermore, Stairway to Heaven, Misty Mountain Hop, Four Sticks, Going to California, When the Levee Breaks', '1971', 'https://upload.wikimedia.org/wikipedia/pt/4/4b/LedZeppelinIV.jpg', 'Hard Rock', 4.09, 0, 0.0),
('Hotel California', 'Eagles', 'Hotel California, New Kid in Town, Life in the Fast Lane, Wasted Time, Wasted Time (Reprise), Victim of Love, Pretty Maids All in a Row, Try and Love Again, The Last Resort', '1976', 'https://upload.wikimedia.org/wikipedia/en/4/49/Hotelcalifornia.jpg', 'Rock', 3.27, 0, 0.0),
('Rumours', 'Fleetwood Mac', 'Second Hand News, Dreams, Never Going Back Again, Dont Stop, Go Your Own Way, Songbird, The Chain, You Make Loving Fun, I Dont Want to Know, Oh Daddy, Gold Dust Woman', '1977', 'https://upload.wikimedia.org/wikipedia/en/f/fb/FMacRumours.PNG', 'Rock', 4.03, 0, 0.0),
('Born to Run', 'Bruce Springsteen', 'Thunder Road, Tenth Avenue Freeze-Out, Night, Backstreets, Born to Run, She''s the One, Meeting Across the River, Jungleland', '1975', 'https://upload.wikimedia.org/wikipedia/en/7/7a/Born_to_Run_%28Front_Cover%29.jpg', 'Rock', 3.96, 0, 0.0),
('The Joshua Tree', 'U2', 'Where the Streets Have No Name, I Still Haven''t Found What I''m Looking For, With or Without You, Bullet the Blue Sky, Running to Stand Still, Red Hill Mining Town, In God''s Country, Trip Through Your Wires, One Tree Hill, Exit, Mothers of the Disappeared', '1987', 'https://upload.wikimedia.org/wikipedia/en/6/6b/The_Joshua_Tree.png', 'Rock', 3.88, 0, 0.0),
('Nevermind', 'Nirvana', 'Smells Like Teen Spirit, In Bloom, Come as You Are, Breed, Lithium, Polly, Territorial Pissings, Drain You, Lounge Act, Stay Away, On a Plain, Something in the Way', '1991', 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/NirvanaNevermindalbumcover.jpg/220px-NirvanaNevermindalbumcover.jpg', 'Grunge, Alternative Rock', 4.01, 0, 0.0),
('The Chronic', 'Dr. Dre', 'The Chronic (Intro), Fuck wit Dre Day (And Everybody''s Celebratin''), Let Me Ride, The Day the Niggaz Took Over, Nuthin'' but a "G" Thang, Deeez Nuuuts, Lil'' Ghetto Boy, A Nigga Witta Gun, Rat-Tat-Tat-Tat, The $20 Sack Pyramid, Lyrical Gangbang, High Powered, The Doctor''s Office, Stranded on Death Row, The Roach (The Chronic Outro), Bitches Ain''t Shit', '1992', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/19/Dr.DreTheChronic.jpg/220px-Dr.DreTheChronic.jpg', 'West Coast Hip Hop, G-Funk', 3.83, 0, 0.0),
('Ten', 'Pearl Jam', 'Once, Even Flow, Alive, Why Go, Black, Jeremy, Oceans, Porch, Garden, Deep, Release', '1991', 'https://upload.wikimedia.org/wikipedia/pt/thumb/d/da/Pearl_Jam_-_Ten.jpg/220px-Pearl_Jam_-_Ten.jpg', 'Grunge, Alternative Rock', 3.74, 0, 0.0),
('The Slim Shady LP', 'Eminem', 'Public Service Announcement, My Name Is, Guilty Conscience, Brain Damage, Paul, If I Had, 97'' Bonnie & Clyde, Bitch, Role Model, Lounge, My Fault, Ken Kaniff, Cum on Everybody, Rock Bottom, Just Don''t Give a Fuck, Soap, As the World Turns, I''m Shady, Bad Meets Evil, Still Don''t Give a Fuck', '1999', 'https://i.discogs.com/fIM1eAAcJOZQy7MUVS0Cx9Jf2l8NwxETKg1IfsT7A_0/rs:fit/g:sm/q:90/h:600/w:600/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTMyODMx/OTUtMTY4Mjk0Mzc2/OS04MjUyLmpwZWc.jpeg', 'Hip Hop', 3.51, 0, 0.0),
('OK Computer', 'Radiohead', 'Airbag, Paranoid Android, Subterranean Homesick Alien, Exit Music (For a Film), Let Down, Karma Police, Fitter Happier, Electioneering, Climbing Up the Walls, No Surprises, Lucky, The Tourist', '1997', 'https://upload.wikimedia.org/wikipedia/en/b/ba/Radioheadokcomputer.png', 'Alternative Rock, Experimental', 4.29, 0, 0.0),
('Achtung Baby', 'U2', 'Zoo Station, Even Better Than the Real Thing, One, Until the End of the World, Who''s Gonna Ride Your Wild Horses, So Cruel, The Fly, Mysterious Ways, Tryin'' to Throw Your Arms Around the World, Ultra Violet (Light My Way), Acrobat, Love Is Blindness', '1991', 'https://upload.wikimedia.org/wikipedia/en/7/72/Achtung_Baby.png', 'Alternative Rock', 3.70, 0, 0.0),
('The College Dropout', 'Kanye West', 'We Don''t Care, Graduation Day, All Falls Down, I''ll Fly Away, Spaceship, Jesus Walks, Never Let Me Down, Get Em High, Workout Plan, The New Workout Plan, Slow Jamz, Breathe in Breathe Out, School Spirit, School Spirit Skit 1, School Spirit Skit 2, Lil Jimmy Skit, Two Words, Through the Wire, Family Business, Last Call', '2004', 'https://upload.wikimedia.org/wikipedia/en/a/a3/Kanyewest_collegedropout.jpg', 'Hip Hop', 4.12, 0, 0.0),
('Definitely Maybe', 'Oasis', 'Rock ''n'' Roll Star, Shakermaker, Live Forever, Up in the Sky, Columbia, Supersonic, Bring It On Down, Cigarettes & Alcohol, Digsy''s Dinner, Slide Away, Married with Children', '1994', 'https://upload.wikimedia.org/wikipedia/en/d/d4/OasisDefinitelyMaybealbumcover.jpg', 'Britpop, Rock', 3.65, 0, 0.0),
('In Utero', 'Nirvana', 'Serve the Servants, Scentless Apprentice, Heart-Shaped Box, Rape Me, Frances Farmer Will Have Her Revenge on Seattle, Dumb, Very Ape, Milk It, Pennyroyal Tea, Radio Friendly Unit Shifter, tourette''s, All Apologies', '1993', 'https://upload.wikimedia.org/wikipedia/pt/b/b4/InUtero.jpeg', 'Grunge, Alternative Rock', 4.05, 0, 0.0),
('Californication', 'Red Hot Chili Peppers', 'Around the World, Parallel Universe, Scar Tissue, Otherside, Get on Top, Californication, Easily, Porcelain, Emit Remmus, I Like Dirt, This Velvet Glove, Savior, Purple Stain, Right on Time, Road Trippin', '1999', 'https://upload.wikimedia.org/wikipedia/pt/7/78/Red_Hot_Chili_Peppers_-_Californication.jpg', 'Alternative Rock, Funk Rock', 3.47, 0, 0.0),
('The Marshall Mathers LP', 'Eminem', 'Public Service Announcement 2000, Kill You, Stan, Paul (Skit), Who Knew, Steve Berman, The Way I Am, The Real Slim Shady, Remember Me?, Im Back, Marshall Mathers, Ken Kaniff (Skit), Drug Ballad, Amityville, Bitch Please II, Kim, Under the Influence, Criminal', '2000', 'https://upload.wikimedia.org/wikipedia/en/a/ae/The_Marshall_Mathers_LP.jpg', 'Hip Hop', 3.68, 0, 0.0);

-- Table created for each item to be sold
CREATE TABLE Item
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(64) NOT NULL,
    descriptionOfItem TEXT DEFAULT 'no description was provided by the seller',
    price FLOAT NOT NULL,
    condition VARCHAR(40),
    listDate DATE NOT NULL DEFAULT CURRENT_DATE,
    seller INTEGER REFERENCES User(ID),
    album INTEGER REFERENCES Album(ID)
);
-- Table created for default profile pictures for Users
CREATE TABLE ProfilePicture
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    url VARCHAR(255) NOT NULL
);
-- Table created for each picture for each item
CREATE TABLE Wishlist
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    userID INTEGER REFERENCES User(ID) ON DELETE CASCADE,
    albumID INTEGER REFERENCES Album(ID) ON DELETE CASCADE
);
-- Table created for each review a user leaves on an item
CREATE TABLE Review 
(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    itemID INTEGER REFERENCES Item(ID) NOT NULL,
    userID INTEGER REFERENCES User(ID) NOT NULL,
    feedback TEXT NOT NULL,
    rating FLOAT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    dateOfReview DATE NOT NULL DEFAULT CURRENT_DATE
);

CREATE TABLE Chat 
(
    idChat INTEGER  NOT NULL,
    idUser1 INTEGER  NOT NULL,
    idUser2 
);

CREATE TABLE Message
(
    idMessage INTEGER NOT NULL,
    idWriter INTEGER NOT NULL,
    Content TEXT
);



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
    
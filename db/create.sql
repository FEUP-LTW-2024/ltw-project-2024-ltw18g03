DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Album;
DROP TABLE IF EXISTS Item;
DROP TABLE IF EXISTS ProfilePicture;
DROP TABLE IF EXISTS Image;
DROP TABLE IF EXISTS Review;

--Table created for every user that is registered in
CREATE TABLE User
{
    ID INT PRIMARY KEY AUTOINCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    profilePicture INT REFERENCES ProfilePicture(ID) DEFAULT 1,
    city VARCHAR(30) NOT NULL,
    postalCode CHAR(8) NOT NULL,
    phone CHAR(9) NOT NULL,
    email VARCHAR(30) NOT NULL,
    passwordHash VARCHAR(30) NOT NULL,
    isAdmin BOOLEAN NOT NULL DEFAULT FALSE,
    joinDate DATE NOT NULL DEFAULT CURRENT_DATE
};
-- Table created for every album on the db, not necessarily on sale
CREATE TABLE Album
{
    ID INT PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(30) NOT NULL, --album name
    artist VARCHAR(30) NOT NULL, --album artist
    songs TEXT NOT NULL, --all songs, comma-seperated-values
    yearOfRelease CHAR(4) NOT NULL --date of release
    cover VARCHAR(255) NOT NULL --cover url
    genre TEXT NOT NULL --all genres, comma-seperated-values
    rym FLOAT NOT NULL CHECK (rating >= 1 AND rating <= 5), --rym rating
    quantity INT NOT NULL --number of items for sale
    averagePrice FLOAT NOT NULL --average price of the items for sale
};
-- Table created for each item to be sold
CREATE TABLE Item
{
    ID INT PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(64) NOT NULL
    descriptionOfItem TEXT DEFAULT 'no description was provided by the seller',
    price FLOAT NOT NULL,
    condition VARCHAR(40),
    listDate DATE NOT NULL DEFAULT CURRENT_DATE,
    seller INT REFERENCES User(ID)
    album INT REFERENCES Album(ID)
};
-- Table created for default profile pictures for Users
CREATE TABLE ProfilePicture
{
    ID INT PRIMARY KEY AUTOINCREMENT,
    url VARCHAR(255) NOT NULL
};
-- Table created for each picture for each item
CREATE TABLE Image
{
    ID INT PRIMARY KEY AUTOINCREMENT,
    itemID INT REFERENCES Item(ID) ON DELETE CASCADE,
    url VARCHAR(255) NOT NULL
};

CREATE TABLE Review {
    ID INT PRIMARY KEY AUTOINCREMENT,
    itemID INT REFERENCES Item(ID) NOT NULL,
    userID INT REFERENCES User(ID) NOT NULL,
    feedback TEXT NOT NULL,
    rating FLOAT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    dateOfReview DATE NOT NULL DEFAULT CURRENT_DATE
};
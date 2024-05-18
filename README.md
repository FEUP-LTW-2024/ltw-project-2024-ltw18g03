# GrooveSwap
### Swap your Grooves
## LTW18G03
- Gonçalo Augusto Sousa (202207320)
- Rodrigo Dias Ferreira Loureiro de Sousa (202205751)

## Install Instructions



    git clone <your_repo_url>

    git checkout final-delivery-v1

    sqlite3 db/database.db < db/create.sql

    php -S localhost:9000

http://localhost:9000/
## Screenshots



(2 or 3 screenshots of your website)



## Implemented Features



**General**:



- [x] Register a new account.

- [x] Log in and out.

- [x] Edit their profile, including their name, username, password, and email.



**Sellers**  should be able to:



- [x] List new items, providing details such as album, price, and condition.

- [x] Track and manage their listed items.

- [x] Respond to inquiries from buyers regarding their items and add further information if needed.

- [x] Print shipping forms for items that have been sold.



**Buyers**  should be able to:



- [x] Browse items using filters like genre, artist, and title.

- [x] Engage with sellers to ask questions or negotiate prices.

- [x] Add items to a wishlist or shopping cart.

- [x] Proceed to checkout with their shopping cart (simulate payment process).



**Admins**  should be able to:



- [x] Elevate a user to admin status.

- [x] Introduce new albums and other pertinent entities.

- [x] Oversee and ensure the smooth operation of the entire system.



**Security**:

We have been careful with the following security aspects:



- [x] **SQL injection**

- [x] **Cross-Site Scripting (XSS)**

- [x] **Cross-Site Request Forgery (CSRF)**



**Password Storage Mechanism**: hash_password&verify_password



**Aditional Requirements**:



We also implemented the following additional requirements (you can add more):




- [x] **Promotional Features**, like one-time use Promotional Codes

- [x] **Shipping Costs**


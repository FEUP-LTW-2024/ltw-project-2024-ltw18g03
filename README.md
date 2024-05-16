# GrooveSwap
### Swap your Grooves
## LTW18G03
- Gonçalo Sousa (202207320)
- Rodrigo Dias Ferreira Loureiro de Sousa 

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



- [ ] Register a new account.

- [ ] Log in and out.

- [ ] Edit their profile, including their name, username, password, and email.



**Sellers**  should be able to:



- [ ] List new items, providing details such as category, brand, model, size, and condition, along with images.

- [ ] Track and manage their listed items.

- [ ] Respond to inquiries from buyers regarding their items and add further information if needed.

- [ ] Print shipping forms for items that have been sold.



**Buyers**  should be able to:



- [ ] Browse items using filters like category, price, and condition.

- [ ] Engage with sellers to ask questions or negotiate prices.

- [ ] Add items to a wishlist or shopping cart.

- [ ] Proceed to checkout with their shopping cart (simulate payment process).



**Admins**  should be able to:



- [ ] Elevate a user to admin status.

- [ ] Introduce new item categories, sizes, conditions, and other pertinent entities.

- [ ] Oversee and ensure the smooth operation of the entire system.



**Security**:

We have been careful with the following security aspects:



- [ ] **SQL injection**

- [ ] **Cross-Site Scripting (XSS)**

- [ ] **Cross-Site Request Forgery (CSRF)**



**Password Storage Mechanism**: hash_password&verify_password



**Aditional Requirements**:



We also implemented the following additional requirements (you can add more):



- [ ] **Rating and Review System**

- [ ] **Promotional Features**

- [ ] **Analytics Dashboard**

- [ ] **Multi-Currency Support**

- [ ] **Item Swapping**

- [ ] **API Integration**

- [ ] **Dynamic Promotions**

- [ ] **User Preferences**

- [ ] **Shipping Costs**

- [ ] **Real-Time Messaging System**
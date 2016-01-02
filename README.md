# A Message Board using PHP and MySQL

Project Description:
The project4 directory contains the file createDB.sql, which contains the SQL description of the tables: users and posts, that have the following schema:

users ( username, password, fullname, email )
posts ( id, postedby, follows, datetime, message )

Primary keys: users.username and posts.id
Foreign keys: posts.postedby->users.username and posts.follows->posts.id
An empty sqlite database has already been created for you, called mydb.sqlite. An example of an sqlite session on omega is:

sqlite3 mydb.sqlite
select * from users;
.exit

The project4 directory also contains the file board.php, which needs to be changed as described in the description of the web application. The board.php file uses the PDO extension of PHP to insert a new user and to query the users table using SQLite.
Documentation

The following are tutorials on PDO and SQLite. Use them as a reference only.

    The PHP Data Objects (PDO) extension, especially the PDO class
    SQLite

Project Requirements

Your script board.php must be able to produce 4 web pages (can be from the same script or you can split it into 4 different php scripts):

    Page1: a login form that has text windows for username and password, a "Login" button, and a "New users must register here" button.
    Page2: a "Logout" button, a "New Message" button, and the printout of all messages.
    Page3: a textarea with a "Post" button.
    Page4: a form to fill out user information along with a "Register" button 

When board.php is executed for the first time, it displays Page1:

    If the user enters a wrong username/password and pushes "Login", it should go back to Page1
    If the user enters a correct username/password and pushes "Login", it should go to Page2
    If the user pushes the "New users must register here" button, it should go to Page4 

From Page4, if the user pushes "Register" and the username doesn't already exist it goes to Page1; otherwise, it goes to Page4.
From Page2, if the user pushes "Logout", it should logout and go to Page1.
From Page3, if the user fills out the textarea and pushes the "Post" button, it will insert the new message in the database and will go to Page2.

For each posted message, you print:

    The message ID. If the message is a reply, it should also display the message ID of the message it replies to (ie, the attribute follows).
    The username and the fullname of the person who posted the message.
    The date and time when this message was posted.
    A button "Reply" to reply to this message. If the user pushes this button, it goes to Page3. Page3 must store the new message as a reply to the original message (ie, the attribute follows of the new message must contain the ID of the original message).
    The message text. 

To make the project easier, the messages must be printed ordered by date/time (oldest first) only. That is, you don't need to nest the replies.

Hints: Use md5 to encode passwords in PHP. Use uniqid to generate a unique id in PHP. Use the SQLite function datetime('now') to compute the current date and time. 

create table users (
   username   varchar(10) primary key,
   password   varchar(32),
   fullname   varchar(45),
   email      varchar(45)
);

create table posts (
   id         varchar(13) primary key,
   postedby   varchar(10) foreign key references users(username),
   follows    varchar(13) foreign key references posts(id),
   datetime   datetime,
   message    text
);

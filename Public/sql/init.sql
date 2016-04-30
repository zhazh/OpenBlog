/*
    创建数据库open_blog
*/
create database if not exists open_blog default CHARACTER set utf8 collate utf8_general_ci;
/*
    连接数据库后创建相关表
    ob_user:    用户表
    ob_follow:  关注表，
    ob_tweet:   博文表
*/

use open_blog;

create table if not exists ob_user(
    id bigint not null auto_increment,
    name varchar(50) not null unique,
    passwd varchar(100) not null,
    email varchar(100) not null unique,
    create_date date not null,
    primary key(id)
);

create table if not exists ob_follow(
    user_id bigint not null,
    follow_user_id bigint not null,
    follow_date datetime,
    primary key(user_id, follow_user_id)
);

create table if not exists ob_tweet(
    id bigint not null auto_increment,
    user_id bigint not null,
    tweet varchar(240),
    ref_tweet_id bigint,
    create_date datetime not null,
    primary key(id)
);



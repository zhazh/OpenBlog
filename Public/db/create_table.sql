/*
    连接数据库后创建相关表
    ob_image                图像表
    ob_user:                用户表
    ob_user_relation:       用户关系表，
    ob_article:             微博文章表
    ob_article_comment:     文章评论表
*/

create table if not exists ob_image(
    id bigint not null auto_increment,
    url varchar(500),
    primary key(id)
);

create table if not exists ob_user(
    id bigint not null auto_increment,
    name varchar(50) not null unique,
    passwd varchar(100) not null,
    email varchar(100) not null unique,
    image_id bigint,
    create_time datetime not null,
    primary key(id)
);

create table if not exists ob_user_relation(
    user_id bigint not null,
    follow_user_id bigint not null,
    follow_time datetime not null,
    primary key(user_id, follow_user_id)
);

create table if not exists ob_article(
    id bigint not null auto_increment,
    user_id bigint not null,
    content varchar(240),
    image_id_list varchar(100),
    ref_article_id bigint,
    post_time datetime not null,
    primary key(id)    
);

create table if not exists ob_article_comment(
    id bigint not null auto_increment,
    article_id bigint not null,
    content varchar(200),
    ref_article_comment_id bigint,
    post_time datetime not null,
    primary key(id)
);



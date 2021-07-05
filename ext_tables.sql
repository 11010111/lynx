#
# Add SQL definition of database tables
#
CREATE TABLE tt_content (
    frame_class_extra VARCHAR(30) DEFAULT '' NOT NULL,
    space_left_class  VARCHAR(30) DEFAULT '' NOT NULL,
    space_right_class VARCHAR(30) DEFAULT '' NOT NULL,
    display_on        VARCHAR(30) DEFAULT '' NOT NULL
);

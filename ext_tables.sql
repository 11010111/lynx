#
# Add SQL definition of database tables
#
CREATE TABLE tt_content (
    frame_class_extra VARCHAR(255) DEFAULT '' NOT NULL,
    space_left_class  VARCHAR(255) DEFAULT '' NOT NULL,
    space_right_class VARCHAR(255) DEFAULT '' NOT NULL,
    no_mobile         INT(11) DEFAULT '0' NOT NULL
);

#
# Add SQL definition of database tables
#
CREATE TABLE tt_content
(
    container               VARCHAR(30) DEFAULT '' NOT NULL,
    html_tag                VARCHAR(30) DEFAULT '' NOT NULL,
    breakpoint              VARCHAR(30) DEFAULT '' NOT NULL,
    breakpoint_desktop      VARCHAR(30) DEFAULT '' NOT NULL,
    breakpoint_tablet       VARCHAR(30) DEFAULT '' NOT NULL,
    alignment               VARCHAR(30) DEFAULT '' NOT NULL,
    margin_top_tablet       VARCHAR(30) DEFAULT '' NOT NULL,
    margin_bottom_tablet    VARCHAR(30) DEFAULT '' NOT NULL,
    margin_top_mobile       VARCHAR(30) DEFAULT '' NOT NULL,
    margin_bottom_mobile    VARCHAR(30) DEFAULT '' NOT NULL,
    padding_top             VARCHAR(30) DEFAULT '' NOT NULL,
    padding_bottom          VARCHAR(30) DEFAULT '' NOT NULL,
    padding_top_tablet      VARCHAR(30) DEFAULT '' NOT NULL,
    padding_bottom_tablet   VARCHAR(30) DEFAULT '' NOT NULL,
    padding_top_mobile      VARCHAR(30) DEFAULT '' NOT NULL,
    padding_bottom_mobile   VARCHAR(30) DEFAULT '' NOT NULL,
    background_color        VARCHAR(30) DEFAULT '' NOT NULL,
);

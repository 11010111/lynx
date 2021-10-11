#
# Add SQL definition of database tables
#
CREATE TABLE tt_content
(
    container        VARCHAR(30) DEFAULT '' NOT NULL,
    breakpoint       VARCHAR(30) DEFAULT '' NOT NULL,
    padding_top      VARCHAR(30) DEFAULT '' NOT NULL,
    padding_bottom   VARCHAR(30) DEFAULT '' NOT NULL,
    background_color VARCHAR(30) DEFAULT '' NOT NULL,
    foreground_color VARCHAR(30) DEFAULT '' NOT NULL
);

CREATE TABLE tx_lynx_domain_model_preset
(
    uid              INT(11)                         NOT NULL AUTO_INCREMENT,
    pid              INT(11)             DEFAULT '0' NOT NULL,

    title            VARCHAR(255)        DEFAULT ''  NOT NULL,
    preset           VARCHAR(255)        DEFAULT ''  NOT NULL,

    crdate           INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    tstamp           INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    deleted          TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
    hidden           TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
    starttime        INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    endtime          INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    cruser_id        INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    fe_group         INT(11)             DEFAULT '0' NOT NULL,
    sorting          INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    sys_language_uid INT(11)             DEFAULT '0' NOT NULL,
    l18n_parent      INT(11)             DEFAULT '0' NOT NULL,
    l18n_diffsource  MEDIUMBLOB                      NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid)
);

CREATE TABLE tt_content (
    tx_brightsidecontent_template int(11) DEFAULT '0' NOT NULL,
    tx_brightsidecontent_cropratiothumb varchar(25),
    tx_brightsidecontent_cropratiozoom varchar(25),
    tx_brightsidecontent_showtitle int(11) DEFAULT '0' NOT NULL,
    tx_brightsidecontent_showdesc int(11) DEFAULT '0' NOT NULL,
    tx_brightsidecontent_link tinytext,
    tx_brightsidecontent_linktext tinytext,
);

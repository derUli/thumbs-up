<?php
Database::query ( "ALTER TABLE {prefix}content add column `thumbs_up` int(11) default '0'", true );
Database::query ( "ALTER TABLE {prefix}content add column `thumbs_down` int(11) default '0'", true );

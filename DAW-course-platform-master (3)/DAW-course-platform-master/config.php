<?php

/** Global Folders */
define( 'APP_ROOT', $_SERVER['DOCUMENT_ROOT'].'/DAW-project');
define( 'APP_ADMIN', APP_ROOT.'/admin' );
define( 'APP_STUDENT', APP_ROOT.'/student' );
define( 'APP_IMAGES', APP_ROOT.'/src/assets/img' );
define( 'APP_PDF', APP_ROOT.'/src/assets/pdf' );
define( 'APP_VIDEOS', APP_ROOT.'/src/assets/videos' );
define( 'APP_FUNCTIONS', APP_ROOT.'/src/functions' );
define( 'APP_STYLES', APP_ROOT.'/src/styles' );
define( 'APP_DATA_FILES', APP_ROOT.'/src/data-files/' );
define('APP_QCM',APP_ROOT.'/src/qcm/');

/** global pages */
define( 'W_ROOT', 'http://'.$_SERVER['HTTP_HOST'].'/DAW-project');
define( 'W_ADMIN', W_ROOT."/admin" );
define( 'W_STUDENT', W_ROOT."/student" );
define( 'W_FUNCTIONS', W_ROOT.'/src/functions' );
define( 'W_STYLES', W_ROOT.'/src/styles' );
define( 'W_SCRIPTS', W_ROOT.'/src/scripts' );

define( 'W_IMAGES', W_ROOT.'/src/assets/img' );
define( 'W_PDF', W_ROOT.'/src/assets/pdf' );
define( 'W_VIDEOS', W_ROOT.'/src/assets/videos' );

/** images */
define( 'W_IMG_STUDENT', 'student.png' );
define( 'W_IMG_COURSE', 'course.png' );
define( 'W_IMG_RESOURCE', 'resource.png' );

define( 'W_IMG_PDF', 'pdf.png' );
define( 'W_IMG_IMAGE', 'image.png' );
define( 'W_IMG_VIDEO', 'video.png' );


/** words */
define( 'WORD_PDF', 'pdf' );
define( 'WORD_IMAGE', 'image' );
define( 'WORD_VIDEO', 'video' );
define( 'WORD_STUDENT', 'student' );
define( 'WORD_COURSE', 'course' );
define( 'WORD_RESOURCE', 'resource' );

define( 'WORD_PLAIN_TEXT', 'plain text' );
define( 'WORD_TEXT', 'text' );
define( 'WORD_USER_NAME', 'user name' );
define( 'WORD_PASSWORD', 'password' );
define( 'WORD_EMAIL', 'email' );


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'daw_project' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

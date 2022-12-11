<?php

include (MY_Ftp.php);

// parameters
$params = array(
   'mftp_user' => 'user',
   'mftp_host' => 'host',
   'mftp_pass' => '',
   /** you can check the remote directory by connecting to the remote server through File Zilla
    * */  
   'mRemote_dir' => '/',
);

// new object
$mFtp = new MY_Ftp($params);

// List files on Remote Server
$list = $this->mFtp->mftp_list('');

var_dump($list);

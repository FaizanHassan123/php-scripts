<?php

class MY_Ftp
{
   private $mftp_user;
   private $mftp_host;
   private $mftp_pass;
   private $mConn;
   private $mRemote_dir;

   function __construct($params){
      $this->mftp_user        = $params['mftp_user'];
      $this->mftp_host        = $params['mftp_host'];
      $this->mftp_pass        = $params['mftp_pass'];
      $this->mRemote_dir      = $params['mRemote_dir'];
      $this->mftp_connect();
   }

   function mftp_connect()
   {
      $this->mConn = ftp_connect($this->mftp_host) or die("Couldn't connect to" . $this->ftp_host);
      ftp_login($this->mConn, $this->mftp_user, $this->mftp_pass) or die("Couldn't login to ftp server");
      ftp_pasv($this->mConn, true);
   }

   // upload files
   function mftp_upload($local_dir, $remote_dir='')
   {
      $file = basename($local_dir);
      if (ftp_put($this->mConn, ($this->mRemote_dir.'/'.$remote_dir.($remote_dir != '' ? '/' : '').$file), $local_dir, FTP_BINARY)) {
         echo "successfully uploaded $file\n";
      } else {
         echo "There was a problem while uploading $file\n";
      }
   }

   // Make Directory
   function mftp_makedir($dirName)
   {
      ftp_mkdir($this->mConn, $this->mRemote_dir.'/'.$dirName);
   }

   // view files
   function mftp_list($dirName)
   {
      return ftp_nlist($this->mConn, $this->mRemote_dir.'/'.$dirName) or die('Error While Listing');
   }

   // Delete files
   function mftp_delete($file, $dirName='')
   {
      if (ftp_delete($this->mConn, $this->mRemote_dir.'/'.$dirName.'/'.$file)) {
         echo "$file deleted successful\n";
      } else {
         echo "could not delete $file\n";
      }
   }

   // Closing Connection with Destruct
   function __destruct()
   {
      ftp_close($this->mConn);
   }
}
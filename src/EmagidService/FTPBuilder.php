<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 3/23/17
 * Time: 3:58 PM
 */

namespace EmagidService;

class FTPBuilder {
    public $ftp;
    private $host;
    private $account;
    private $password;
    public $uploadPath;
    public $downloadPath;
    private $ssl;

    public function __construct()
    {
        $this->ftp = new \FtpClient\FtpClient();
    }

    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = $uploadPath;
        return $this;
    }

    public function setDownloadPath($downloadPath)
    {
        $this->downloadPath = $downloadPath;
        return $this;
    }

    public function setSSL($ssl)
    {
        $this->ssl = $ssl?true:false;
    }

    public function build()
    {
        if($this->ssl){
            $this->ftp->connect($this->host, true, 22);
        } else {
            $this->ftp->connect($this->host);
        }

        $this->ftp->login($this->account, $this->password);

        return new FTP($this);
    }
}
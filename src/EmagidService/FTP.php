<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 3/23/17
 * Time: 4:14 PM
 */

namespace EmagidService;


/**
 * Class FTP
 * @package EmagidService
 * @Example
 * (new FTPBuilder())->setHost('xx.xx.xx.xxx')
 * ->setAccount('xxxx')
 * ->setPassword(' xxxx')
 * ->setUploadPath('/outbox')
 * ->build()
 * ->upload($file);
 */
class FTP
{
    private $ftp;
    private $config;

    public function __construct(FTPBuilder $builder)
    {
        $this->config = $builder;
        $this->ftp = $builder->ftp;
    }

    /**
     * If you need...
     */
    public static function quickBuild()
    {

    }

    public function upload($file)
    {
        $fileName = basename($file);
        $remoteFile = $this->config->uploadPath.'/'.$fileName;
        $handle = fopen($file, 'r');
        if ($this->ftp->fput($remoteFile, $handle, FTP_ASCII)){
            rewind($handle);
        }

        return $this;
    }

    public function download($file)
    {
        // TODO: check upload path
    }
}
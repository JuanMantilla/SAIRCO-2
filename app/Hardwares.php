<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardwares extends Eloquent
{
    protected $table = 'hardwares';
    protected $fillable = ['ID',
                           'DEVICEID',
                           'NAME',
                           'WORKGROUP',
                           'USERDOMAIN',
                           'OSNAME',
                           'OSVERSION',
                           'OSCOMENTS',
                           'PROCESSORT',
                           'PROCESSORS',
                           'PROCESSORN',
                           'MEMORY',
                           'SWAP',
                           'IPADDR',
                           'DNS',
                           'DEFAULTGETWAY',
                           'ETIME',
                           'LASTDATE',
                           'LASTCOME',
                           'QUALITY',
                           'FIDELITY',
                           'USERID',
                           'TYPE',
                           'DESCRIPTION',
                           'WINCOMPANY',
                           'WINOWNER',
                           'WINPRODID',
                           'WINPRODKEY',
                           'USERAGENT',
                           'CHECKSUM',
                           'SSTATE',
                           'IPSRC',
                           'UUID',
                           'ARCH',];
}

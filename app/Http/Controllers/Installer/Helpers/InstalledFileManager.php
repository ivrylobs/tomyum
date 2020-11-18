<?php
/*   __________________________________________________
    |  Obfuscated by YAK Pro - Php Obfuscator  2.0.1   |
    |              on 2020-05-31 05:32:54              |
    |    GitHub: https://github.com/pk-fr/yakpro-po    |
    |__________________________________________________|
*/
/*
* Copyright (C) Incevio Systems, Inc - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Munna Khan <help.zcart@gmail.com>, September 2018
*/
 namespace App\Http\Controllers\Installer\Helpers; class InstalledFileManager { public function create() { $installedLogFile = storage_path("\x69\x6e\163\x74\x61\154\154\x65\x64"); $dateStamp = date("\131\57\155\x2f\144\x20\x68\x3a\x69\72\x73\x61"); if (!file_exists($installedLogFile)) { goto I3pgn; } $message = trans("\151\x6e\x73\164\x61\x6c\154\x65\x72\137\155\145\163\163\x61\x67\x65\163\56\165\160\x64\x61\x74\x65\x72\56\154\x6f\x67\x2e\x73\x75\143\143\x65\x73\163\x5f\x6d\x65\163\x73\x61\x67\x65") . $dateStamp; file_put_contents($installedLogFile, $message . PHP_EOL, FILE_APPEND | LOCK_EX); goto Z0Io9; I3pgn: $message = trans("\151\156\163\x74\x61\154\154\x65\162\137\155\x65\163\x73\141\147\x65\163\x2e\151\x6e\163\164\x61\x6c\x6c\145\144\x2e\163\165\143\x63\145\163\x73\x5f\154\x6f\x67\137\x6d\145\163\163\x61\147\x65") . $dateStamp . "\12"; file_put_contents($installedLogFile, $message); Z0Io9: return $message; } public function update() { return $this->create(); } }

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
 namespace App\Http\Controllers\Installer; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\InstalledFileManager; use App\Http\Controllers\Installer\Helpers\DatabaseManager; class UpdateController extends Controller { use \App\Http\Controllers\Installer\Helpers\MigrationsHelper; public function welcome() { return view("\x69\x6e\x73\164\141\154\x6c\145\x72\x2e\165\160\x64\x61\x74\145\56\x77\x65\154\x63\x6f\155\x65"); } public function overview() { $migrations = $this->getMigrations(); $dbMigrations = $this->getExecutedMigrations(); return view("\x69\x6e\x73\x74\141\154\x6c\x65\162\56\165\x70\x64\x61\x74\145\56\x6f\x76\145\x72\x76\x69\145\x77", ["\156\165\x6d\x62\145\162\117\146\125\x70\144\x61\164\x65\x73\120\145\x6e\x64\151\x6e\x67" => count($migrations) - count($dbMigrations)]); } public function database() { $databaseManager = new DatabaseManager(); $response = $databaseManager->migrateAndSeed(); return redirect()->route("\114\x61\x72\x61\x76\x65\x6c\x55\x70\x64\x61\164\x65\162\x3a\x3a\x66\151\156\141\154")->with(["\155\x65\x73\x73\141\x67\145" => $response]); } public function finish(InstalledFileManager $fileManager) { $fileManager->update(); return view("\151\156\163\164\141\x6c\154\x65\x72\x2e\x75\x70\x64\141\164\x65\x2e\x66\151\156\x69\163\150\x65\144"); } }

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
 namespace App\Http\Controllers\Installer; use Exception; use Illuminate\Support\Facades\DB; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\DatabaseManager; class DatabaseController extends Controller { private $databaseManager; public function __construct(DatabaseManager $databaseManager) { $this->databaseManager = $databaseManager; } public function database() { if ($this->checkDatabaseConnection()) { goto vIfOT; } return redirect()->back()->withErrors(["\x64\141\164\x61\142\x61\163\x65\x5f\143\157\x6e\x6e\x65\143\x74\x69\x6f\x6e" => trans("\151\x6e\x73\x74\x61\x6c\x6c\145\x72\x5f\155\x65\x73\163\x61\147\145\163\56\x65\x6e\166\x69\x72\157\156\x6d\x65\x6e\x74\56\x77\151\x7a\x61\162\x64\x2e\146\x6f\x72\x6d\56\144\x62\x5f\x63\157\x6e\x6e\145\143\x74\x69\157\156\137\146\x61\x69\x6c\145\x64")]); vIfOT: ini_set("\155\x61\x78\137\x65\170\x65\x63\x75\x74\151\x6f\x6e\x5f\164\x69\155\145", 600); $response = $this->databaseManager->migrateAndSeed(); return redirect()->route("\x49\156\163\164\x61\154\x6c\145\162\x2e\x66\151\x6e\x61\154")->with(["\155\x65\163\x73\x61\147\x65" => $response]); } private function checkDatabaseConnection() { try { DB::connection()->getPdo(); return true; } catch (Exception $e) { return false; } } }

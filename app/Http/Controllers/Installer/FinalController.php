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
 namespace App\Http\Controllers\Installer; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\DatabaseManager; use App\Http\Controllers\Installer\Helpers\EnvironmentManager; use App\Http\Controllers\Installer\Helpers\FinalInstallManager; use App\Http\Controllers\Installer\Helpers\InstalledFileManager; class FinalController extends Controller { public function final(FinalInstallManager $finalInstall, EnvironmentManager $environment) { $finalMessages = $finalInstall->runFinal(); $finalEnvFile = $environment->getEnvContent(); return view("\151\x6e\163\164\x61\x6c\x6c\145\x72\x2e\x66\151\156\x69\x73\x68\145\x64", compact("\146\x69\x6e\x61\x6c\115\145\x73\163\141\147\x65\x73", "\x66\151\156\141\154\105\x6e\x76\106\x69\x6c\145")); } public function seedDemo(DatabaseManager $databaseManager) { $response = $databaseManager->seedDemoData(); return redirect()->route("\111\x6e\x73\x74\x61\x6c\x6c\x65\x72\56\146\x69\x6e\x69\163\150"); } public function finish(InstalledFileManager $fileManager) { $finalStatusMessage = $fileManager->update(); return redirect()->to(config("\151\156\163\x74\x61\x6c\154\145\x72\x2e\x72\145\144\x69\x72\x65\x63\x74\125\x72\x6c"))->with("\x6d\145\x73\163\x61\x67\145", $finalStatusMessage); } }

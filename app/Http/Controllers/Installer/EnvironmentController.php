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
 namespace App\Http\Controllers\Installer; use Illuminate\Routing\Controller; use Illuminate\Http\Request; use Illuminate\Routing\Redirector; use App\Http\Controllers\Installer\Helpers\EnvironmentManager; use Validator; class EnvironmentController extends Controller { protected $EnvironmentManager; public function __construct(EnvironmentManager $environmentManager) { $this->EnvironmentManager = $environmentManager; } public function environmentMenu() { return view("\x69\156\163\x74\x61\x6c\x6c\145\162\x2e\145\156\x76\151\x72\x6f\156\x6d\x65\x6e\164"); } public function environmentWizard() { } public function environmentClassic() { $envConfig = $this->EnvironmentManager->getEnvContent(); return view("\x69\156\x73\x74\141\154\x6c\x65\162\56\x65\156\x76\151\162\157\x6e\155\x65\x6e\x74\55\x63\154\141\163\x73\x69\x63", compact("\x65\x6e\x76\103\x6f\x6e\146\151\x67")); } public function saveClassic(Request $input, Redirector $redirect) { $message = $this->EnvironmentManager->saveFileClassic($input); return $redirect->route("\111\156\x73\164\141\154\154\x65\x72\x2e\x65\156\166\151\x72\x6f\x6e\155\x65\x6e\x74\x43\x6c\x61\x73\163\151\x63")->with(["\155\x65\163\x73\141\147\x65" => $message]); } }

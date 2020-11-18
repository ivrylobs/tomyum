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
 namespace App\Http\Controllers\Installer; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\RequirementsChecker; class RequirementsController extends Controller { protected $requirements; public function __construct(RequirementsChecker $checker) { $this->requirements = $checker; } public function requirements() { $phpSupportInfo = $this->requirements->checkPHPversion(config("\151\156\x73\164\141\154\154\x65\x72\56\x63\x6f\162\145\x2e\x6d\x69\x6e\x50\150\x70\x56\145\162\163\x69\x6f\x6e"), config("\151\x6e\x73\164\141\x6c\x6c\x65\162\x2e\143\x6f\x72\x65\56\155\x61\170\x50\150\x70\126\145\x72\x73\151\157\156")); $requirements = $this->requirements->check(config("\151\x6e\163\x74\x61\154\154\145\162\56\x72\x65\x71\x75\151\x72\145\155\x65\x6e\164\163")); return view("\151\x6e\163\x74\x61\154\154\145\162\x2e\x72\x65\161\165\151\x72\145\155\145\x6e\x74\163", compact("\x72\145\161\165\x69\x72\x65\x6d\x65\156\x74\163", "\x70\x68\x70\123\165\x70\160\157\162\x74\x49\x6e\x66\x6f")); } }

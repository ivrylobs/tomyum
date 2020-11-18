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
 namespace App\Http\Controllers\Installer\Helpers; use Exception; use Illuminate\Http\Request; class EnvironmentManager { private $envPath; private $envExamplePath; public function __construct() { $this->envPath = base_path("\x2e\145\x6e\166"); $this->envExamplePath = base_path("\x2e\145\156\x76\56\145\170\141\155\160\154\145"); } public function getEnvContent() { if (file_exists($this->envPath)) { goto TPJ0s; } if (file_exists($this->envExamplePath)) { goto o2PcO; } touch($this->envPath); goto pFAvF; o2PcO: copy($this->envExamplePath, $this->envPath); pFAvF: TPJ0s: return file_get_contents($this->envPath); } public function getEnvPath() { return $this->envPath; } public function getEnvExamplePath() { return $this->envExamplePath; } public function saveFileClassic(Request $input) { $message = trans("\x69\156\163\164\x61\154\x6c\145\x72\x5f\155\145\x73\x73\141\x67\x65\x73\56\145\156\166\151\162\157\x6e\x6d\x65\156\164\56\x73\x75\x63\x63\145\x73\x73"); try { file_put_contents($this->envPath, $input->get("\145\x6e\166\x43\x6f\x6e\146\x69\x67")); } catch (Exception $e) { $message = trans("\151\x6e\x73\x74\x61\154\154\145\162\x5f\x6d\145\163\x73\x61\147\145\x73\x2e\x65\x6e\166\x69\x72\x6f\x6e\155\145\x6e\x74\56\x65\162\x72\157\162\163"); } return $message; } }

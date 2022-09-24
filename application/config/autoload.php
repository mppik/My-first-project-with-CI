<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','session');

$autoload['drivers'] = array();

$autoload['helper'] = array('form','file','url');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('model_login','modelpengurus','modelkeuangan','model_laporan');

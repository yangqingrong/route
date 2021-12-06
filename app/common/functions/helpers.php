<?php

use M\C;
use M\LS;

function v($v, $a = []) {
	extract($a);
	$f = str_replace('.', '/', $v);
	$p = BASE_PATH . '/resources/views/' . $f . '.phtml';
	include $p;
}

function public_path($f = '') {
	$c = C::g('app.public_path');
	$p = BASE_PATH . $c;
	if (strlen($f) > 0) {
		$p .= '/' . $f;
	}
	return $p;
}

function storage_path($f = '') {
	$p = BASE_PATH . '/storage';
	if (strlen($f) > 0) {
		$p .= '/' . $f;
	}
	return $p;
}

function resource_path($f = '') {
	$p = BASE_PATH . '/resources';
	if (strlen($f) > 0) {
		$p .= '/' . $f;
	}
	return $p;
}

function asset($f) {

	return '/' . trim($f, "/");
}

function redirect($url) {
	header('location: ' . $url);
	// exit();
}

function ius($k) {
	LS::io($k, $_SERVER['REQUEST_URI']);
}

function iug($k) {
	return LS::io($k);
}

function iur($k, $u) {
	$ur = iug($k);
	if (trim($ur) == '') {
		$ur = $u;
	}
	redirect($ur);
}

function iup($k, $u) {
	$ur = iug($k);
	if (trim($ur) == '') {
		$ur = $u;
	}
	return $ur;
}

function l() {
	return W\Lang::id();
}

function __($t, $p = []) {
	return W\Lang::__($t, $p);
}

function fp($k, $d = 0) {
	return isset($_POST[$k]) ? floatval($_POST[$k]) : $d;
}

function ip($k, $d = 0) {
	return isset($_POST[$k]) ? intval($_POST[$k]) : $d;
}

function p($k, $d = '') {
	return isset($_POST[$k]) ? $_POST[$k] : $d;
}

function ig($k, $d = 0) {
	return isset($_GET[$k]) ? intval($_GET[$k]) : $d;
}

function g($k, $d = '') {
	return isset($_GET[$k]) ? $_GET[$k] : $d;
}

function ir($k, $d = 0) {
	return isset($_REQUEST[$k]) ? intval($_REQUEST[$k]) : $d;
}

function r($k, $d = '') {
	return isset($_REQUEST[$k]) ? $_REQUEST[$k] : $d;
}

function h($h) {
	echo htmlspecialchars($h);
}

if (!function_exists('array_key_first')) {
    function array_key_first(array $arr) {
        foreach($arr as $key => $unused) {
            return $key;
        }
        return NULL;
    }
}
?>
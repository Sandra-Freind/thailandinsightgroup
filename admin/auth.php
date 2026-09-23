<?php
declare(strict_types=1);
ini_set('session.use_strict_mode','1');
session_set_cookie_params(['httponly'=>true,'secure'=>(!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off'),'samesite'=>'Strict','path'=>'/']);
session_start();
const ADMIN_FILE=__DIR__.'/../data/admin.json';
function admin_config(): array { if(!is_file(ADMIN_FILE)) return []; $x=json_decode((string)file_get_contents(ADMIN_FILE),true); return is_array($x)?$x:[]; }
function admin_logged_in(): bool { if(empty($_SESSION['admin_ok'])) return false; $last=(int)($_SESSION['admin_last']??0); if($last>0&&time()-$last>3600){$_SESSION=[];session_destroy();return false;} $_SESSION['admin_last']=time(); return true; }
function admin_require(): void { if(!admin_logged_in()){ header('Location: login.php'); exit; } }
function csrf(): string { if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(24)); return $_SESSION['csrf']; }
function csrf_check(string $v): bool { return isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'],$v); }

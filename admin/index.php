<?php
declare(strict_types=1);

require __DIR__ . '/auth.php';
admin_require();
require_once __DIR__ . '/../includes/cms.php';
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Referrer-Policy: same-origin');

$schema = require __DIR__ . '/schema.php';
$data = cms_load();
cms_normalize_lists($data);
$section = (string)($_GET['section'] ?? $_POST['section'] ?? 'travel');
if (!isset($schema[$section])) $section = 'travel';
$message = '';
$error = '';

function admin_h(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function admin_token(string $path): string { return bin2hex($path); }
function admin_path(string $token): string { $decoded=hex2bin($token); return $decoded===false?'':$decoded; }
function admin_label(string $key): string {
    $labels=[
        'title'=>'Titel','subtitle'=>'Untertitel','intro'=>'Einleitung','description'=>'Beschreibung','text'=>'Text','body'=>'Text','image'=>'Bild','hero_image'=>'Hero-Bild','hero_books'=>'Hero-Bücherbild','cover'=>'Cover','pdf'=>'PDF-Datei','href'=>'Linkziel','page'=>'Zielseite','label'=>'Beschriftung','button'=>'Buttontext','button2'=>'Zweiter Button','button2_href'=>'Zweiter Button-Link','button_href'=>'Button-Link','meta'=>'Zusatzangaben','date'=>'Datum','tag'=>'Kennzeichnung','source_label'=>'Quellen-Beschriftung','source_url'=>'Quellen-Link','contact_email'=>'E-Mail-Adresse','contact_phone'=>'Telefonnummer','eyebrow'=>'Kleine Überschrift','heading'=>'Überschrift','company'=>'Unternehmen','address'=>'Adresse','success'=>'Bestätigungstext','toc'=>'Inhaltsübersicht','section_title'=>'Bereichsüberschrift','info_title'=>'Info-Überschrift','info_subtitle'=>'Info-Unterzeile','live_label'=>'Live-Beschriftung','more_title'=>'Weitere Meldungen','ticker_title'=>'Ticker-Überschrift','radar_title'=>'Radar-Überschrift','radar_subtitle'=>'Radar-Unterzeile','name_label'=>'Feldname „Name“','email_label'=>'Feldname „E-Mail“','message_label'=>'Feldname „Nachricht“','travel_heading'=>'Überschrift Reise','weather_heading'=>'Überschrift Wetter','tat_label'=>'TAT-Linktext','tat_url'=>'TAT-Link','tat_logo'=>'TAT-Logo','tmd_label'=>'Wetter-Linktext','tmd_url'=>'Wetter-Link','aa_label'=>'Auswärtiges Amt – Linktext','aa_url'=>'Auswärtiges Amt – Link','imprint_title'=>'Impressum-Überschrift','imprint_body'=>'Impressum-Text','terms_title'=>'AGB-Überschrift','terms_body'=>'AGB-Text','privacy_title'=>'Datenschutz-Überschrift','privacy_body'=>'Datenschutz-Text','price_note'=>'Preis-Hinweis','more_label'=>'Mehr-Button','more_href'=>'Mehr-Button-Link','banner_image'=>'Bannerbild','amazing_title'=>'Amazing-Zeile','amazing_line'=>'Amazing-Unterzeile','notice'=>'Hinweisbox','icon'=>'Tab-Symbol','breadcrumb'=>'Brotkrumen'
    ];
    return $labels[$key]??ucfirst(str_replace('_',' ',$key));
}
function admin_is_media(string $key): bool { return in_array($key,['image','hero_image','hero_books','cover','pdf','tat_logo','banner_image'],true); }
function admin_is_long(string $key,string $value): bool { return strlen($value)>100||str_contains($value,"\n")||in_array($key,['body','text','description','intro','address','toc','article_p1','article_p2','imprint_body','terms_body','privacy_body'],true); }

function admin_upload(array $file): array {
    if(($file['error']??UPLOAD_ERR_NO_FILE)===UPLOAD_ERR_NO_FILE) return ['path'=>null,'error'=>null];
    if(($file['error']??UPLOAD_ERR_OK)!==UPLOAD_ERR_OK) return ['path'=>null,'error'=>'Eine Datei konnte nicht hochgeladen werden.'];
    $size=(int)($file['size']??0);
    if($size<1||$size>30*1024*1024) return ['path'=>null,'error'=>'Dateien dürfen höchstens 30 MB groß sein.'];
    $tmp=(string)($file['tmp_name']??'');
    $mime=(new finfo(FILEINFO_MIME_TYPE))->file($tmp);
    $allowed=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp','image/gif'=>'gif','application/pdf'=>'pdf'];
    if(!isset($allowed[$mime])) return ['path'=>null,'error'=>'Erlaubt sind JPG, PNG, WEBP, GIF und PDF.'];
    if(str_starts_with((string)$mime,'image/')&&@getimagesize($tmp)===false) return ['path'=>null,'error'=>'Die hochgeladene Bilddatei ist ungültig.'];
    $directory=__DIR__.'/../uploads';
    if(!is_dir($directory)&&!mkdir($directory,0755,true)) return ['path'=>null,'error'=>'Der Upload-Ordner konnte nicht angelegt werden.'];
    $base=preg_replace('/[^a-z0-9]+/i','-',pathinfo((string)$file['name'],PATHINFO_FILENAME));
    $base=trim((string)$base,'-')?:'datei';
    $name=strtolower($base).'-'.date('Ymd-His').'-'.bin2hex(random_bytes(4)).'.'.$allowed[$mime];
    if(!move_uploaded_file($tmp,$directory.'/'.$name)) return ['path'=>null,'error'=>'Die Datei konnte nicht gespeichert werden.'];
    return ['path'=>'uploads/'.$name,'error'=>null];
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!csrf_check((string)($_POST['csrf']??''))) $error='Die Sicherheitsprüfung ist fehlgeschlagen. Bitte lade die Seite neu.';
    elseif(isset($_POST['add_item'])){
        $target=(string)$_POST['add_item'];
        if(isset($schema[$target]['template'])&&is_array($schema[$target]['template'])){
            if(!isset($data[$target])||!is_array($data[$target])) $data[$target]=[];
            $data[$target][]=$schema[$target]['template']; cms_normalize_lists($data);
            $message=cms_save($data)?'Neuer Eintrag wurde angelegt.':'Der Eintrag konnte nicht gespeichert werden.'; $section=$target;
        }
    } elseif(isset($_POST['delete_item'])){
        $path=admin_path((string)$_POST['delete_item']);
        if($path!==''&&str_starts_with($path,$section.'.')){ cms_remove_path($data,$path); cms_normalize_lists($data); $message=cms_save($data)?'Eintrag wurde entfernt.':'Der Eintrag konnte nicht entfernt werden.'; }
    } elseif(isset($_POST['save_section'])){
        foreach((array)($_POST['fields']??[]) as $token=>$value){ $path=admin_path((string)$token); if($path!==''&&($path===$section||str_starts_with($path,$section.'.'))) cms_set_path($data,$path,trim((string)$value)); }
        foreach((array)($_FILES['media']['name']??[]) as $token=>$name){
            $path=admin_path((string)$token); if($path===''||!str_starts_with($path,$section.'.')) continue;
            $file=['name'=>$name,'type'=>$_FILES['media']['type'][$token]??'','tmp_name'=>$_FILES['media']['tmp_name'][$token]??'','error'=>$_FILES['media']['error'][$token]??UPLOAD_ERR_NO_FILE,'size'=>$_FILES['media']['size'][$token]??0];
            $result=admin_upload($file); if($result['error']){$error=$result['error'];break;} if($result['path']) cms_set_path($data,$path,$result['path']);
        }
        cms_normalize_lists($data);
        if($error==='') $message=cms_save($data)?'Änderungen wurden veröffentlicht.':'Die Änderungen konnten nicht gespeichert werden. Prüfe die Schreibrechte des Ordners data.';
    }
}

function admin_render_fields(mixed $value,string $path=''): void {
    if(!is_array($value)) return; $isList=array_is_list($value);
    foreach($value as $key=>$item){
        $itemPath=$path===''?(string)$key:$path.'.'.$key;
        if(is_array($item)){
            echo '<section class="editor-group"><div class="editor-group-head"><h3>'.admin_h($isList?'Eintrag '.((int)$key+1):admin_label((string)$key)).'</h3>';
            if($isList) echo '<button class="danger small" type="submit" name="delete_item" value="'.admin_h(admin_token($itemPath)).'" onclick="return confirm(\'Diesen Eintrag wirklich entfernen?\')">Eintrag entfernen</button>';
            echo '</div>'; admin_render_fields($item,$itemPath); echo '</section>'; continue;
        }
        $text=(string)$item; $fieldKey=(string)$key; $token=admin_token($itemPath);
        echo '<div class="field"><label for="f-'.admin_h($token).'">'.admin_h(admin_label($fieldKey)).'</label>';
        if(admin_is_media($fieldKey)){
            if($text!==''){ if($fieldKey==='pdf') echo '<a class="current-file" href="../'.admin_h($text).'" target="_blank" rel="noopener">Aktuelle PDF öffnen</a>'; else echo '<img class="preview" src="../'.admin_h($text).'" alt="Aktuelle Datei">'; }
            echo '<input id="f-'.admin_h($token).'" name="fields['.admin_h($token).']" value="'.admin_h($text).'" readonly><input type="file" name="media['.admin_h($token).']" accept="'.($fieldKey==='pdf'?'application/pdf':'image/jpeg,image/png,image/webp,image/gif').'"><small>Neue Datei auswählen, um die aktuelle Datei zu ersetzen.</small>';
        } elseif(admin_is_long($fieldKey,$text)) echo '<textarea id="f-'.admin_h($token).'" name="fields['.admin_h($token).']" rows="6">'.admin_h($text).'</textarea>';
        else echo '<input id="f-'.admin_h($token).'" name="fields['.admin_h($token).']" value="'.admin_h($text).'">';
        echo '</div>';
    }
}
$current=$data[$section]??[];
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>ThailandInsight Verwaltung</title><link rel="stylesheet" href="admin.css?v=2"></head><body>
<div class="admin-shell"><aside class="admin-nav"><div class="admin-brand"><strong>ThailandInsight</strong><span>Inhaltsverwaltung</span></div><nav><?php foreach($schema as $key=>$definition):?><a class="<?=$section===$key?'active':''?>" href="?section=<?=admin_h($key)?>"><?=admin_h((string)$definition['label'])?></a><?php endforeach;?></nav><div class="admin-links"><a href="media.php">Medienübersicht</a><a href="messages.php">Kontaktanfragen</a><a href="../index.php" target="_blank" rel="noopener">Website öffnen</a><a href="logout.php">Abmelden</a></div></aside>
<main class="admin-main"><header><div><p class="kicker">INHALTE BEARBEITEN</p><h1><?=admin_h((string)$schema[$section]['label'])?></h1><p><?=admin_h((string)$schema[$section]['description'])?></p></div><span class="design-lock">🔒 Grunddesign geschützt</span></header>
<?php if($message!==''):?><div class="notice success"><?=admin_h($message)?></div><?php endif;?><?php if($error!==''):?><div class="notice error"><?=admin_h($error)?></div><?php endif;?>
<form method="post" enctype="multipart/form-data" class="editor-form"><input type="hidden" name="csrf" value="<?=admin_h(csrf())?>"><input type="hidden" name="section" value="<?=admin_h($section)?>"><?php admin_render_fields($current,$section);?><div class="sticky-actions"><?php if(!empty($schema[$section]['repeatable'])):?><button class="secondary" type="submit" name="add_item" value="<?=admin_h($section)?>">+ Neuen Eintrag anlegen</button><?php endif;?><button class="primary" type="submit" name="save_section" value="1">Änderungen speichern und veröffentlichen</button></div></form>
</main></div></body></html>

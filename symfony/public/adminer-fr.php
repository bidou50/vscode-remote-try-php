<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.8.3
*/function
adminer_errors($Cc,$Ec){return!!preg_match('~^(Trying to access array offset on null|Undefined array key)~',$Ec);}error_reporting(6135);set_error_handler('adminer_errors',E_WARNING);$ad=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($ad||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Ii=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Ii)$$X=$Ii;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$f;return$f;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($u){if(!preg_match('~^[`\'"[]~',$u))return$u;$pe=substr($u,-1);return
str_replace($pe.$pe,$pe,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($tg,$ad=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($y,$X)=each($tg)){foreach($X
as$he=>$W){unset($tg[$y][$he]);if(is_array($W)){$tg[$y][stripslashes($he)]=$W;$tg[]=&$tg[$y][stripslashes($he)];}else$tg[$y][stripslashes($he)]=($ad?$W:stripslashes($W));}}}}function
bracket_escape($u,$Na=false){static$ui=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Na?array_flip($ui):$ui));}function
min_version($Zi,$Ce="",$g=null){global$f;if(!$g)$g=$f;$nh=$g->server_info;if($Ce&&preg_match('~([\d.]+)-MariaDB~',$nh,$C)){$nh=$C[1];$Zi=$Ce;}return(version_compare($nh,$Zi)>=0);}function
charset($f){return(min_version("5.5.3",0,$f)?"utf8mb4":"utf8");}function
script($yh,$ti="\n"){return"<script".nonce().">$yh</script>$ti";}function
script_src($Ni){return"<script src='".h($Ni)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($D,$Y,$db,$me="",$tf="",$hb="",$ne=""){$I="<input type='checkbox' name='$D' value='".h($Y)."'".($db?" checked":"").($ne?" aria-labelledby='$ne'":"").">".($tf?script("qsl('input').onclick = function () { $tf };",""):"");return($me!=""||$hb?"<label".($hb?" class='$hb'":"").">$I".h($me)."</label>":$I);}function
optionlist($_f,$gh=null,$Ri=false){$I="";foreach($_f
as$he=>$W){$Af=array($he=>$W);if(is_array($W)){$I.='<optgroup label="'.h($he).'">';$Af=$W;}foreach($Af
as$y=>$X)$I.='<option'.($Ri||is_string($y)?' value="'.h($y).'"':'').(($Ri||is_string($y)?(string)$y:$X)===$gh?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($D,$_f,$Y="",$sf=true,$ne=""){if($sf)return"<select name='".h($D)."'".($ne?" aria-labelledby='$ne'":"").">".optionlist($_f,$Y)."</select>".(is_string($sf)?script("qsl('select').onchange = function () { $sf };",""):"");$I="";foreach($_f
as$y=>$X)$I.="<label><input type='radio' name='".h($D)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Ia,$_f,$Y="",$sf="",$fg=""){$Yh=($_f?"select":"input");return"<$Yh$Ia".($_f?"><option value=''>$fg".optionlist($_f,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$fg'>").($sf?script("qsl('$Yh').onchange = $sf;",""):"");}function
confirm($Me="",$hh="qsl('input')"){return
script("$hh.onclick = function () { return confirm('".($Me?js_escape($Me):'Êtes-vous certain(e) ?')."'); };","");}function
print_fieldset($t,$ue,$cj=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$ue</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($cj?"":" class='hidden'").">\n";}function
generate_linksbar($A){$ye="<p class='links'>";foreach($A
as$y=>$_){if($y!==key(array_keys($A)))$ye.="<span class='separator'>|</span>";$ye.=$_;}$ye.="</p>";return$ye;}function
bold($Ua,$hb=""){return($Ua?" class='active $hb'":($hb?" class='$hb'":""));}function
odd($I=' class="odd"'){static$s=0;if(!$I)$s=-1;return($s++%2?$I:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($y,$X=null){static$bd=true;if($bd)echo"{";if($y!=""){echo($bd?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$bd=false;}else{echo"\n}\n";$bd=true;}}function
ini_bool($Ud){$X=ini_get($Ud);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($Yi,$M,$V,$F){$_SESSION["pwds"][$Yi][$M][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($P){global$f;return$f->quote($P);}function
get_vals($G,$d=0){global$f;$I=array();$H=$f->query($G);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$d];}return$I;}function
get_key_vals($G,$g=null,$qh=true){global$f;if(!is_object($g))$g=$f;$I=array();$H=$g->query($G);if(is_object($H)){while($J=$H->fetch_row()){if($qh)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($G,$g=null,$m="<p class='error'>"){global$f;$yb=(is_object($g)?$g:$f);$I=array();$H=$yb->query($G);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($g)&&$m&&defined("PAGE_HEADER"))echo$m.error()."\n";return$I;}function
unique_array($J,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$I=array();foreach($v["columns"]as$y){if(!isset($J[$y]))continue
2;$I[$y]=$J[$y];}return$I;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$C))return$C[1].idf_escape(idf_unescape($C[2])).$C[3];return
idf_escape($y);}function
where($Z,$o=array()){global$f,$x;$I=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$d=escape_key($y);$I[]=$d.($x=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($o[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$o[$y]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$d = ".q($X)." COLLATE ".charset($f)."_bin";}foreach((array)$Z["null"]as$y)$I[]=escape_key($y)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$o=array()){parse_str($X,$bb);remove_slashes(array(&$bb));return
where($bb,$o);}function
where_link($s,$d,$Y,$vf="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($d)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$vf:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($e,$o,$L=array()){$I="";foreach($e
as$y=>$X){if($L&&!in_array(idf_escape($y),$L))continue;$Ga=convert_field($o[$y]);if($Ga)$I.=", $Ga AS ".idf_escape($y);}return$I;}function
cookie($D,$Y,$xe=2592000){global$ba;return
header("Set-Cookie: $D=".urlencode($Y).($xe?"; expires=".gmdate("D, d M Y H:i:s",time()+$xe)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($gd=false){$Qi=ini_bool("session.use_cookies");if(!$Qi||$gd){session_write_close();if($Qi&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Yi,$M,$V,$k=null){global$kc;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($kc))."|username|".($k!==null?"db|":"").session_name()),$C);return"$C[1]?".(sid()?SID."&":"").($Yi!="server"||$M!=""?urlencode($Yi)."=".urlencode($M)."&":"")."username=".urlencode($V).($k!=""?"&db=".urlencode($k):"").($C[2]?"&$C[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($B,$Me=null){if($Me!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($B!==null?$B:$_SERVER["REQUEST_URI"]))][]=$Me;}if($B!==null){if($B=="")$B=".";header("Location: $B");exit;}}function
query_redirect($G,$B,$Me,$Dg=true,$Jc=true,$Tc=false,$gi=""){global$f,$m,$b;if($Jc){$Fh=microtime(true);$Tc=!$f->query($G);$gi=format_time($Fh);}$Ah="";if($G)$Ah=$b->messageQuery($G,$gi,$Tc);if($Tc){$m=error().$Ah.script("messagesPrint();");return
false;}if($Dg)redirect($B,$Me.$Ah);return
true;}function
queries($G){global$f;static$yg=array();static$Fh;if(!$Fh)$Fh=microtime(true);if($G===null)return
array(implode("\n",$yg),format_time($Fh));$yg[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$f->query($G);}function
apply_queries($G,$S,$Fc='table'){foreach($S
as$Q){if(!queries("$G ".$Fc($Q)))return
false;}return
true;}function
queries_redirect($B,$Me,$Dg){list($yg,$gi)=queries(null);return
query_redirect($yg,$B,$Me,$Dg,false,!$Dg,$gi);}function
format_time($Fh){return
sprintf('%.3f s',max(0,microtime(true)-$Fh));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($Qf=""){return
substr(preg_replace("~(?<=[?&])($Qf".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($E,$Pb){return" ".($E==$Pb?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($y,$Xb=false){$Zc=$_FILES[$y];if(!$Zc)return
null;foreach($Zc
as$y=>$X)$Zc[$y]=(array)$X;$I='';foreach($Zc["error"]as$y=>$m){if($m)return$m;$D=$Zc["name"][$y];$oi=$Zc["tmp_name"][$y];$Db=file_get_contents($Xb&&preg_match('~\.gz$~',$D)?"compress.zlib://$oi":$oi);if($Xb){$Fh=substr($Db,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Fh,$Jg))$Db=iconv("utf-16","utf-8",$Db);elseif($Fh=="\xEF\xBB\xBF")$Db=substr($Db,3);$I.=$Db."\n\n";}else$I.=$Db;}return$I;}function
upload_error($m){$Je=($m==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($m?'Impossible d\'importer le fichier.'.($Je?" ".sprintf('La taille maximale des fichiers est de %sB.',$Je):""):'Le fichier est introuvable.');}function
repeat_pattern($cg,$ve){return
str_repeat("$cg{0,65535}",$ve/65535)."$cg{0,".($ve%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$ve=80,$Mh=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$ve).")($)?)u",$P,$C))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$ve).")($)?)",$P,$C);return
h($C[1]).$Mh.(isset($C[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($tg,$Jd=array(),$lg=''){$I=false;foreach($tg
as$y=>$X){if(!in_array($y,$Jd)){if(is_array($X))hidden_fields($X,array(),$y);else{$I=true;echo'<input type="hidden" name="'.h($lg?$lg."[$y]":$y).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Uc=false){$I=table_status($Q,$Uc);return($I?$I:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$I=array();foreach($b->foreignKeys($Q)as$q){foreach($q["source"]as$X)$I[$X][]=$q;}return$I;}function
enum_input($T,$Ia,$n,$Y,$zc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$n["length"],$Ee);$I=($zc!==null?"<label><input type='$T'$Ia value='$zc'".((is_array($Y)?in_array($zc,$Y):$Y===0)?" checked":"")."><i>".'vide'."</i></label>":"");foreach($Ee[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$db=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$I.=" <label><input type='$T'$Ia value='".($s+1)."'".($db?' checked':'').'>'.h($b->editVal($X,$n)).'</label>';}return$I;}function
input($n,$Y,$r){global$U,$b,$x;$D=h(bracket_escape($n["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Ea=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ea[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ea);$r="json";}$Ng=($x=="mssql"&&$n["auto_increment"]);if($Ng&&!$_POST["save"])$r=null;$pd=(isset($_GET["select"])||$Ng?array("orig"=>'original'):array())+$b->editFunctions($n);$Ia=" name='fields[$D]'";if($n["type"]=="enum")echo
h($pd[""])."<td>".$b->editInput($_GET["edit"],$n,$Ia,$Y);else{$zd=(in_array($r,$pd)||isset($pd[$r]));echo(count($pd)>1?"<select name='function[$D]'>".optionlist($pd,$r===null||$zd?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($pd))).'<td>';$Wd=$b->editInput($_GET["edit"],$n,$Ia,$Y);if($Wd!="")echo$Wd;elseif(preg_match('~bool~',$n["type"]))echo"<input type='hidden'$Ia value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ia value='1'>";elseif($n["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$n["length"],$Ee);foreach($Ee[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$db=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$D][$s]' value='".(1<<$s)."'".($db?' checked':'').">".h($b->editVal($X,$n)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$n["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'>";elseif(($ei=preg_match('~text|lob|memo~i',$n["type"]))||preg_match("~\n~",$Y)){if($ei&&$x!="sqlite")$Ia.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Ia.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Ia>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$n["type"]))echo"<textarea$Ia cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Le=(!preg_match('~int~',$n["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$n["length"],$C)?((preg_match("~binary~",$n["type"])?2:1)*$C[1]+($C[3]?1:0)+($C[2]&&!$n["unsigned"]?1:0)):($U[$n["type"]]?$U[$n["type"]]+($n["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$n["type"]))$Le+=7;echo"<input".((!$zd||$r==="")&&preg_match('~(?<!o)int(?!er)~',$n["type"])&&!preg_match('~\[\]~',$n["full_type"])?" type='number'":"")." value='".h($Y)."'".($Le?" data-maxlength='$Le'":"").(preg_match('~char|binary~',$n["type"])&&$Le>20?" size='40'":"")."$Ia>";}echo$b->editHint($_GET["edit"],$n,$Y);$bd=0;foreach($pd
as$y=>$X){if($y===""||!$X)break;$bd++;}if($bd)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $bd), oninput: function () { this.onchange(); }});");}}function
process_input($n){global$b,$l;$u=bracket_escape($n["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($n["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($n["auto_increment"]&&$Y=="")return
null;if($r=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$n["on_update"])?idf_escape($n["field"]):false);if($r=="NULL")return"NULL";if($n["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$n["type"])&&ini_bool("file_uploads")){$Zc=get_file("fields-$u");if(!is_string($Zc))return
false;return$l->quoteBinary($Zc);}return$b->processInput($n,$Y,$r);}function
fields_from_edit(){global$l;$I=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$D=bracket_escape($y,1);$I[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$l->primary),);}return$I;}function
search_tables(){global$b,$f;$_GET["where"][0]["val"]=$_POST["query"];$jh="<ul>\n";foreach(table_status('',true)as$Q=>$R){$D=$b->tableName($R);if(isset($R["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$H=$f->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$H||$H->fetch_row()){$pg="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>";echo"$jh<li>".($H?$pg:"<p class='error'>$pg: ".error())."\n";$jh="";}}}echo($jh?"<p class='message'>".'Aucune table.':"</ul>")."\n";}function
dump_headers($Hd,$Ue=false){global$b;$I=$b->dumpHeaders($Hd,$Ue);$Mf=$_POST["output"];if($Mf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Hd).".$I".($Mf!="file"&&preg_match('~^[0-9a-z]+$~',$Mf)?".$Mf":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$y=>$X){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$X)||$X==="")$J[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($r,$d){return($r?($r=="unixepoch"?"DATETIME($d, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$d)"):$d);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$p=@tempnam("","");if(!$p)return
false;$I=dirname($p);unlink($p);}}return$I;}function
file_open_lock($p){$nd=@fopen($p,"r+");if(!$nd){$nd=@fopen($p,"w");if(!$nd)return;chmod($p,0660);}flock($nd,LOCK_EX);return$nd;}function
file_write_unlock($nd,$Rb){rewind($nd);fwrite($nd,$Rb);ftruncate($nd,strlen($Rb));flock($nd,LOCK_UN);fclose($nd);}function
password_file($h){$p=get_temp_dir()."/adminer.key";$I=@file_get_contents($p);if($I||!$h)return$I;$nd=@fopen($p,"w");if($nd){chmod($p,0660);$I=rand_string();fwrite($nd,$I);fclose($nd);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$n,$fi){global$b;if(is_array($X)){$I="";foreach($X
as$he=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($he):"")."<td>".select_value($W,$_,$n,$fi);return"<table cellspacing='0'>$I</table>";}if(!$_)$_=$b->selectLink($X,$n);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$I=$b->editVal($X,$n);if($I!==null){if(!is_utf8($I))$I="\0";elseif($fi!=""&&is_shortable($n))$I=shorten_utf8($I,max(0,+$fi));else$I=h($I);}return$b->selectVal($I,$_,$n,$X);}function
is_mail($wc){$Ha='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$jc='[[:alnum:]](?:[-[:alnum:]]{0,61}[[:alnum:]])';$cg="$Ha+(?:\\.$Ha+)*@(?:$jc?\\.)+$jc";return
is_string($wc)&&preg_match("(^$cg(?:,\\s*$cg)*\$)i",$wc);}function
is_url($P){return(bool)preg_match('~^
			https?://                 # scheme
			(?:
				# IPv6 in square brackets
				\[(?:
					(?:[[:xdigit:]]{1,4}:){7}[[:xdigit:]]{1,4} |             # 1:2:3:4:5:6:7:8
					(?:[[:xdigit:]]{1,4}:){1,7}: |                           # 1::                             1:2:3:4:5:6:7::
					(?:[[:xdigit:]]{1,4}:){1,6}:[[:xdigit:]]{1,4} |          # 1::8            1:2:3:4:5:6::8  1:2:3:4:5:6::8
					(?:[[:xdigit:]]{1,4}:){1,5}(?::[[:xdigit:]]{1,4}){1,2} | # 1::7:8          1:2:3:4:5::7:8  1:2:3:4:5::8
					(?:[[:xdigit:]]{1,4}:){1,4}(?::[[:xdigit:]]{1,4}){1,3} | # 1::6:7:8        1:2:3:4::6:7:8  1:2:3:4::8
					(?:[[:xdigit:]]{1,4}:){1,3}(?::[[:xdigit:]]{1,4}){1,4} | # 1::5:6:7:8      1:2:3::5:6:7:8  1:2:3::8
					(?:[[:xdigit:]]{1,4}:){1,2}(?::[[:xdigit:]]{1,4}){1,5} | # 1::4:5:6:7:8    1:2::4:5:6:7:8  1:2::8
					[[:xdigit:]]{1,4}:(?::[[:xdigit:]]{1,4}){1,6} |          # 1::3:4:5:6:7:8  1::3:4:5:6:7:8  1::8
					:(?::[[:xdigit:]]{1,4}){1,7} |                           # ::2:3:4:5:6:7:8 ::2:3:4:5:6:7:8 ::8
					fe80:(?::[[:xdigit:]]{0,4}){0,4}%[[:alnum:]]+ |          # fe80::7:8%eth0  fe80::7:8%1     (link-local IPv6 addresses with zone index)
					::(?:ffff(?::0{1,4})?:)?
						(?:(?:25[0-5]|(?:2[0-4]|1?[0-9])?[0-9])\.){3}
						(?:25[0-5]|(?:2[0-4]|1?[0-9])?[0-9])
						(?<!\b0\.0\.0\.0) |                                  # ::255.255.255.255  ::ffff:255.255.255.255 ::ffff:0:255.255.255.255  (IPv4-mapped IPv6 addresses and IPv4-translated addresses)
					(?:[[:xdigit:]]{1,4}:){1,4}:
						(?:(?:25[0-5]|(?:2[0-4]|1?[0-9])?[0-9])\.){3}
						(?:25[0-5]|(?:2[0-4]|1?[0-9])?[0-9])
						(?<!\b0\.0\.0\.0)                                    # 2001:db8:3:4::192.0.2.33  64:ff9b::192.0.2.33 (IPv4-Embedded IPv6 Address)
				)\] |
				# IPv4
				(?:(?:25[0-5]|(?:2[0-4]|1?[0-9])?[0-9])\.){3}
					(?:25[0-5]|(?:2[0-4]|1?[0-9])?[0-9])
					(?<!\b0\.0\.0\.0) |                                      # 0.0.0.0 excluded for URLs
				# domain
				[_[:alnum:]](?:[-_[:alnum:]]{0,61}[_[:alnum:]])?
					(?:\.[_[:alnum:]](?:[-_[:alnum:]]{0,61}[_[:alnum:]])?)*
			)                         # host
			(?::(?:[1-9]\d{0,3})?\d)? # port
			(?:/[^\s?\#]*)?           # path
			(?:\?[^\s\#]*)?           # query
			(?:\#\S*)?                # fragment
			$~xi',$P);}function
is_shortable($n){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$n["type"]);}function
count_rows($Q,$Z,$ce,$sd){global$x;$G=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($ce&&($x=="sql"||count($sd)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$sd).")$G":"SELECT COUNT(*)".($ce?" FROM (SELECT 1$G GROUP BY ".implode(", ",$sd).") x":$G));}function
slow_query($G){global$b,$qi,$l;$k=$b->database();$hi=$b->queryTimeout();$vh=$l->slowQuery($G,$hi);if(!$vh&&support("kill")&&is_object($g=connect())&&($k==""||$g->select_db($k))){$ke=$g->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$ke,'&token=',$qi,'\');
}, ',1000*$hi,');
</script>
';}else$g=null;ob_flush();flush();$I=@get_key_vals(($vh?$vh:$G),$g,false);if($g){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$Ag=rand(1,1e6);return($Ag^$_SESSION["token"]).":$Ag";}function
verify_token(){list($qi,$Ag)=explode(":",$_POST["token"]);return($Ag^$_SESSION["token"])==$qi;}function
lzw_decompress($Ra){$gc=256;$Sa=8;$jb=array();$Pg=0;$Qg=0;for($s=0;$s<strlen($Ra);$s++){$Pg=($Pg<<8)+ord($Ra[$s]);$Qg+=8;if($Qg>=$Sa){$Qg-=$Sa;$jb[]=$Pg>>$Qg;$Pg&=(1<<$Qg)-1;$gc++;if($gc>>$Sa)$Sa++;}}$fc=range("\0","\xFF");$I="";foreach($jb
as$s=>$ib){$vc=$fc[$ib];if(!isset($vc))$vc=$nj.$nj[0];$I.=$vc;if($s)$fc[]=$nj.$vc[0];$nj=$vc;}return$I;}function
on_help($rb,$sh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $rb, $sh) }, onmouseout: helpMouseout});","");}function
edit_form($Q,$o,$J,$Li){global$b,$x,$qi,$m;$Rh=$b->tableName(table_status1($Q,true));page_header(($Li?'Modifier':'Insérer'),$m,array("select"=>array($Q,$Rh)),$Rh);$b->editRowPrint($Q,$o,$J,$Li);if($J===false)echo"<p class='error'>".'Aucun résultat.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$o)echo"<p class='error'>".'Vous n\'avez pas les droits pour mettre à jour cette table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($o
as$D=>$n){echo"<tr><th>".$b->fieldName($n);$Yb=$_GET["set"][bracket_escape($D)];if($Yb===null){$Yb=$n["default"];if($n["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Yb,$Jg))$Yb=$Jg[1];}$Y=($J!==null?($J[$D]!=""&&$x=="sql"&&preg_match("~enum|set~",$n["type"])?(is_array($J[$D])?array_sum($J[$D]):+$J[$D]):(is_bool($J[$D])?+$J[$D]:$J[$D])):(!$Li&&$n["auto_increment"]?"":(isset($_GET["select"])?false:$Yb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$n);$r=($_POST["save"]?(string)$_POST["function"][$D]:($Li&&preg_match('~^CURRENT_TIMESTAMP~i',$n["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(!$_POST&&!$Li&&$Y==$n["default"]&&preg_match('~^[\w.]+\(~',$Y))$r="SQL";if(preg_match("~time~",$n["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$r="now";}input($n,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($o){echo"<input type='submit' value='".'Enregistrer'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Li?'Enr. et continuer édition':'Enr. et insérer prochain')."' title='Ctrl+Shift+Enter'>\n",($Li?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Enregistrement'."…', this); };"):"");}}echo($Li?"<input type='submit' name='delete' value='".'Effacer'."'>".confirm()."\n":($_POST||!$o?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0(\0Z\n���|\"�ј�^=�HdR9\$�M'�J\$h�V-9K�%�\0�	)�NgS���}?�P@�`:^������\\��2-K T*�V�W�VdR�D��M�=e�	{F�-�K��Mj�o�\\hR�D�/~�%�kd^V.K�R�՝݂�bqX���9/c����\n��e�Գ4B\0�=&�G/K�����3/�5��XX�4۽�^U�إ��a��DT����egeK�ާVu/6�ߒ�T�{ը�@r�>�	/��]b�\0V�����ܼO��sr��J�@b^>>ai���P\nN�%�^q%�	��x���x)\n:�b��A�a��C�*T�0ic��)�b'�x���	y�,�AhG�X%�����*���ZS<.T��/�j^kH)x_'��x�����ԗ��P�/.\n�B��iy��#F��)7@I`*��iy��7S�����aʗ�\"��\0��H�IDu�%����t{��%���K'�xiL���9(%��_A��:�4UH-G/�X_<��W=ix�����O@��B���;|�u\n^`6�:^t%�\"^襏���`�?����%���\0��\0-���Zȥ�@�!���L)at�\n�\r◎iyҗ��bX?�xP��ix����|d�%�JX����>��p(�s2�(�����^^'�����^dB*��NXv��j~�@��@��y����_����p�I\"_I%�n�I|��J^\"��c�����gahs��R^;IxƔ��u����*^o%��v���y�%�:X����J+�U�a%�pI�2^C%�z_>�id���[�%�J��n���,�w�ؖc;�^��h�%�p��?�y/�aq�[��k����\r}�O%֋t�Xإ8����z���;���8k֏�i`9֒+.��Ic��&�*^Iv��Z��p	���l�j��d�KKJ%�H��X!�88@���f`I`�%�Q��rX�-G����\0K�	//��BX�yD\0ļ���_��?<'��!X\"�/H�֒��˔:�\r\$�v\$��j�������'��KǢ,İ)\0Z�h�h�5K�����G&a����Kɉ,a��<BA��Ixu%ᄗ�H�8-E ���b�I`�%���_d\0-��J��Z�,\n�T,�w�K:Z��7)I:K|����2XSD�%��Uʠ[+i�ҺX_ ���R�^�q/���%��\$���0�D��D�V��;Ah�F҉�6�r��0-h0��f�ݛ⬗��^�RA/\n�~p�VK�L�S�z�lCq/\n��~��?�/3B|��\$�TI�%�q�Icc���Ż\"Bg�&���BX.y,ld��\$��K�-nh��NK(I9|ؗ��^(�!}.E��gBV�-+<�Y9������R�\\�uUL��h�,d�����RIxf-焺��4K]\nPRi,����?9+��,f�N*�����w�@Z��� ���H��hV\"��F�����`k��\$��w��\\�-s�����BY�\0Du���5`	*�i�g8�_E!��ơ�L<`ΝD�%H�l�EQ!:��\r��~?��\$��K��7�D��!�q�`����5X���Uw��I�І�	xsA<���K�a/�ʖ�@q��-P��^�Wk-�@�b\"�B�/�\0��Q󰚨}�y,dK�����p�-.�e1s	�.%�]0jjK�A/�1H2_\"�kۛ3n�&�3�`ضA(���3�	`��,H�ۡ����%�L��xi�G�>��u�\\�-6�,6���Mz�\\Ϝ\r\$���(-�q������#��	2<�EAh������K��jı�Ȣ��.	\$�^�rx��x-���+:����X-Z��w��<O1.U��e�(-?���/���0Zۏ���D������p�jZ�^�ZZ��D�f�݌G�xA,�_L� Z�Ah�YS����У��D����K+���T�Y�Ykt2p��&_�`57lS\"�K�,Ǆ�#ɛ�s�T���\"����5� �����Ak��#ƣ���x�ľЙ�x��n@��`(��/�`�Lܨ�n \$���K��f,��I�UV���߬�藊�_�KDŦİ=�B_���AA�WN�,�`v���nK�T�8���v^����x�i�S�v������ß��jk%����̡�S�Z�&���z�}����i�f�=_���\"�\r��!��@���^��g���AyoM]-���_�?�Zw��Z���KZﻞ̒��|?���C�x\0���\0���@�?����<x��?\0���?|�������p������?������C����������X������/����/��o��������`~\0�����!�p0���~�������>Ͻ�}������]�/�\0!���'��k�j\0���k	��	p�	��\"���j�������|\0��\0a�����\0/��x���\r����� ��������o�����/����!�#\0q*�O��o|�\0��\0��\0�P�\0���\0���������\0a\0�a�������|");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n��C���o6�C����(\"#H��a1���#y��d��1٘�n:�#(�b.\rDc)��a7E����l�ñ��i1Ύs����54��f�4�ngsI��hM��д�i:`�,��]�����Y��t�L0hD*B0\rF&3��x���s���'��[Ʉtv4��S%��0XL���W5���)�Y��f��\r^�=~9g0�\\@���r�Q�Nn�^��yN�j{�o�p�C%�ʋ�GS��Zh��5Z�|>:��'���b{�J)Ɠєt1�*uS=^���2*�8t(�0R,�8�j:�x����@9�\n�@�1\nJ��#��4��BR�J�����FƋ��>#�����J����`Ha�a�hbC0\r�4A�r�&���\nB��54�\$>�+Q�A2Do�MEL�\"��4�8��=��s5D�LW7��J��G��f�*��*Hj���E����K��1��6�ڸ�,��o�L�t�J�A�\\�\$Q�|�9-H@�0�\nxt�V��(��o�����.+�ܮ����;1D��8e*��c\rT䍣��B2܍�z��\n�83=���K�t��ƻ��u�(���km�ׅ����.���G;�+:�2)��c�n<�s��5�:�6���\n�ԡ)_�\\�6���YL�\"VV`c\$L����;��k&���\$�?�XAW�U��4��8���	�B�ޡ�ڮ���z�����*��[O�24�<?{3�6%;V���V�:\\A�䎈	x�np�x��F�<�[x����oW.����U[��Ãsd7��r���F�&	���b�Ò����]t*7ji�=�dZֹ�Yy�4�:�i���e�u�p\\���6bH���Cx�f��׳Ɓ��䎁sr8��Kr��Jp������\$|�����;-9(�?O�2z�Đ�ߋO~o(;���{]d�%&D�y�8EaM&\\��ta�<�\0�A8s����@NC��@���(��Y=Oй�Ҟ��B��6���x���1���]�k�44��\"�b(`��A�;�8c<e�Bw*��\\B�٢0���\n0 /ll����˩\r�����C�_*�2��~�X-�I���\\��ybfe�@`u\"̆5�h��s@�T;>��C��phk���%'��\$ᰂ�I���;R|`�]��FB\n��.�[��r2/�`\rҢ\rCKeF2����[r�����%)��Y�,��5&ڸ��pMe=(��N@+�9�e8f����nu:�܋T}�ԎG��C\r�Ns��g%>Ô���P6Hʒ�l�?τ_>�hee,3���F� n�9���eFh�a���M)�,_�#a-�Hi�B�-(��vb����&r�J�1�Hh�Uiy�\0�#S�M˵I���S`�-�MT�V}\"�UH,�� ������ #�ֵֹ;-\"ы\rt�2�\n�FL�ؖu�-�5S_+�y5��0��Q��/3E|�%}����A��C�&t�Gk2�Jio���kb�Hj�Q����Q\"��x�����_�����B�<�A�8��'ṋbV��x[�\0:����(��ڃ��p�)�Nag�(���6�#�@d���8�w?l.H9�ޫF~�!����%��D���-&��ge�a�Z�rr�̆�%a�P��M���V>�mq���\r�1�P�	�ę-��tZ �:lx5��&�P�Z�6p���f�Dg)���pPLA�,��\\\rȮ7j��1��Hۿ.���r&A�d���DH�JTl�Ɇ�J��� @��8�\nI)�Yf`���<�]�f�J@��8k���W1v3\$�k��\$3����v8��:�{}r�.�I��i��J,nR@�ٔ^A���y�e��UpҢ�:�Ӈ�k��ZV��9[z���P@{�T;V�A��>�Y�=��������e��97m��^6���[�D\rDA�p�@[���:���*�e��e��;pVi@��!�0��` �pN�`	�mn�P��h8���^��g�0e�/�*伟�Y(�h.<@�P��xx�\0�dt��1\0��r�6�ӈp�Pt<@��~���3��4��a���|{� ���\0mT]ht dA�.��1��j��7�� ��RWw��Q �n��EȾ� e��K`��xS�z׋��%t�b\r�h3�@ӹ�ފ\r�2��\$�0o�04\0��xԌ\r<�/`���<��E���x_��<P1�\r%u���p0���-�n�!0P���tPa�>�}�`����fzw�@���RW�gZ��#x6���x-���bd����r�Ovin�0\$�&\0`�P\\��J& @���&N���id%���΄/bd���mq�rn��E\r�8������d�\\�/\0����N.�\r�^O���@n�,�#�D �褗	�@�0�o���\n�\"^��/l�r�c\0�D�/�IP�ȭp��c\0���0N�P\n�	`[o��N�E\r�n�@�p�f�n�P΀A��o�F�����2���(�l@����VP�(n�I`b�d� p�n���0XH������P�h��OO����x�baϳ�(�z�n�Q�Ί��ΐ���	`fd��^%��P��\0d��p�/�(���x����`�B���Q^����@09�^�[��ȯV�o��\"�O@�0��.� 2%�V�\0� jr������R?.��CΖ�=\"W���^P�\r��F���e\$��\"c nx�Q�\$Q� n��O�����@��z� `D1y�	�c��%�`n�P�,����,�`��p��q�P�Rz�z02D����.��N�io#+0X��� i�I1�Բ1gr��DD1��)1n��p��\"Wҗ���Β^��\\�@���\r�؄\0J��d���r�V#���ζ(@��^�>�Sc6`N�3x�|�j��p?vCs�\r�~���1ep��N�n�\r���/A�i#��L�9��8%@�1@O8�����<��\$ҿ3�����Z��;��OOE@��<3���!Om/���� M��0&Al��Eo\"���\0�@�%�#�6��E�50L��;&6\r@�*�ToA3���p�>���^�`�p�R\0��#'��tT@b\"T�J��B�h��p\\�SG��+�@��Ps�?C<�%<�E�\$��&�:���d�F�o@�O����������	/�#��D\"aQ�5Q;\0003CP�\$ba-p[.���	ogC�D�U΃1���U�R���%��Vn�\"��Hn���oD��e�:�Ͽ��C���R�R5wRu��Lfq_SOaNy��O�8�R�@�=��.uQ(/��B�di u\\�O���H�\nZ�C�{O�k���	��o[1��!P��ҭ&Q�Q4��/^P�+l�P��\n�-�`�r�,V2�z����r;��U���\np��A4=�W^2N��dP��,��!PP�	,���O�i`�cT�^ҽ!UN��D��_p�����H�n�����S^TPH�lϠ�Sum1Eb�h�Q�01	 ��b��!�.����� P���A*�qQ���S���ϧ\\5M]��kQ`R�q[n�XQ�RL�Wc��	1�pȠkd��@i̏q��EOL���#m��Uown�����qO�4OC\0�q�c�_��yN���p���j\r1Ѝ��f���e\npW��w�(���N�-z�5<�n��o.�u�Iuw�Wh`cu�h�wIv\0n�R�C6�t��\nr���?��2h��f�O��7j���ci��r\"�r��o�u1*�хg���7\r0Bb�R��O��u�q�V6��o'e2�&��X{�ϥЩ�q%����0\0gz�c{3`\r3e6�m:suMM�\rH��I\0�Is����9��9��:Ss:�{A�9�z8��G4v�\0O;�ύط/�It\"�/{u���O�{�V����;�W\$�����KttP�\0j)�eE�Fy�q�}ؽB�?�)3�g�nt5,9C�MZy&�u- Ww��qa�E����.�j��F�N�N`ېp�p�@gvY&Y_��DU�����U9}P�=��IY��y�I��������` D\"��؊�\0���*����PS��(`��`J�X�b���^K��Y�>0��y��\r9���>4�3+�+��-Q��5�hԎ���K�����3I�CG��m���>�C�L7-�ۺt]���\r�խ.V-ۦm��C�\0N���*�;���� vu��� X�B�`zN��n����`��ɝ�D\0�V�7������\n�pl�ERV��c�9�.HN��.R������p�@D��#���;:�Zӱ�>L:�\"�b�Z�9:��;#:�q;x㫧����x[J�y?{%��'�4\$@�Q�n����\0��xɶ�[X�ǵ���\r��/�sid�C����\rn�Ɨ��e��w[�ivQ�������{�{���K�`�,�q=����N;��z����Ѿ�ՙ;�0 m�[�9��O�@G��p�\0p�F3�����b#��Bq\0dbK�G���H��]��b�-ݥ_ĪI�-���yţ�M�܃!������Z��:�����LZ�ߺ��.���)����B����խ��Z߮�A����-��X������i�\n)�|ǰ�m����S��AH��MA���r%03�}��E����8�;�T�\\��\0�G[S�{�<�_ϻb�i�΁�;w��A��� _������\0�uo,I/-��Aw]O�Ć�D�uqn&O-e`E�}�\0�P��C�j\r��}i�����q��SR��f�(D���D�|/�\"��zN��?�\$\r�d5��=Ěo��g�m�Mŧ��2M������hHFi��	���c���NC�\$_����nE�z���tꜗɺɬ��Z�:���׮O��9�^'˜ ���;	�<ͭ.j��s�fg�|ϲT�\rл'��/�<�6}2�Y��]8�k�a�\"?�;]����m�[p�+�>��;�+�9N[�6Q����o��s�nH���;ǹϰ�H>��;�	�u�u}L��e껢�����d/,/#�\r��1I>����{���_��[�˿���\0��=�P�F��l�H����xWt���1�(��Re�r�V��J�,*T?'�Rp�\0�?2�L��`�'p_e�@u9����#�|���?F>ɴ��v<���z����R���S�?��d6@'i�̾O\0F.��B�׾�U�M����䐨��pj]��\r42��m���F��4A�q&`����01|�c�gߒ�剸�\0j�Iz�_�셧o�N�.V��A�l�\0�Xkf��F�SKMPl���F��\r�u\r.���L>�hCC�IW��&�?+��F2��Q��	JP��V���X����	d�\$9pv\n& 5�V\"��؟ð�8\$�*��i�Ef,�g,5����D��S\rh<�%�\ra�M��	*MI��/v���g�����?����ph`���RQr�ľB:h��Y���2�e\n�b��p�\0y4�Z�N\0�T��|�}���Gn8����i�H��v5܎*0{����ɨ0}�\\%�O����An�S�\r��aL�4Ɏ=j����՗�9 �Ok�����|�-ixk�ܮ嶹�H�.\\kXa`�Y\n�oSS���7����M�s`��N�������-0���琅=)�o;m��K��:!箊z\"&�Q\"6�ҍ���g����Z�����;�֛�w��\n%͊o\0ٖ\$����3�L���D�\rOu����%�-ΊX����\$�)M�o\"X�ܣ\\12*l.n���6�y�I�[y\"�\$���.%g:<M����!�b'�ۋ�sޮ�\n&\r҉l]b��>\r�Co��\\�!���\"7A��Z����Q�g�)c&p��FZ2�'�f��21��lP��\rrP0��\n���h�R}F����6A��M\0007m���w��jᑖ������Ɖ����D��5���8 �X��2/��#c@�%ذ�q_�cH����f\0*,u�> ���;îx��\0x�P�'X 1\0��?G|��\rq�d+q(�xC��~S��8\"�B~p��	�e�f���m`)���Q�*=���!�!�b�������P[Q�SF��r\0��\"��\r|�A�hX�M�\"(@*;�m(dz�+x��}��y����\00022��vd�\0�\"�I�G�d�&�h*���cfH����-��M!�E��H1ےđc[��Ry'�	�NQ\\@<���`�\$�");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("\n��B9�� 3NG89��e6�M�s�@s�LgCy� '#	�.t9M�x��C#��d��4�E��be���f0�M�C��9=7�γ����r�NF��m8�D���x(�u7F�&����(�C�q�`��d:OAH��\n��*����Aχ�E*�)N�S�������R;AP 6a��0A��#���M����	4�k7�֧��\n�F7�iu�u��U��)���~�t��Nf̝�+m��nw[�\$�#�(����Սu��^�Ʃ�Ne�q�]��\rh�b.��8���8�6\r�\n����B���iZ��	RY	6����Ac�v��*����K������'\r��4��b��,K#�9��{\"�=�����K����ñ,[Ǻ��=�� (� �\n:�������K��\r(@7H�����]-��䘅��R��.tk2L���#��2��DaO��ֺ8P3\r����R��3�a\0�9\$��\\0���<�r�6-�t�9���1��@b�/2��E,�3�JTu-N?Q�[M��>�,ܪJ��:O�t�1R��3�SR���\"��#�D�*��5ʹ�_;����z�]=���3�c-C݃E�Fs�mH\r0=>3�t�~�<u;O�6-MTUPE�7��l�k_���_�8��'�\$�gX7�ݍX�H��V}��Ø�4�ꣾ61j(�9\r�xީV��7 ���1\rON��j�FJ6�#�Udj��9�c�i_���{LXʋ%H�˳�`H鰋{p��Z`˼����J��2Q;R�6��8@!�b������6�8���\n�\\�b-�Cx�6�d�^@�@��,�s��	�(ʶ�Cć��H�^��B}�d<����}�\"*0�Z��\"��P���.��N|���M_��c�H��J������w�wl���A����ϟ  O�������T\r�3���Hb\r)�:����.>Qк0ʺ�B#��.�U�i���爍޸#��+�����/��0zy;qI￠N��A�D�7@VF�aegkLǮSWQZ=a�5����B_\n�6�#\r�g�8(�	�o��x<���hd!�X16���/M��@�\\U�ΐ���!�D����Ij]_z����b��]ML��Gw�	�٤z�)��g\"♝\n�1�b��\"Ӈk��L�r���.t�.bOcXw*�T)�Nh�����:tm/����吿\"�D�iRU��1#���!�]���/��d����n��c�5ҍ#���T\$8esM�ϧe�MyaͳB���p`����E��%F0������[���+��%+K:�HƎ�'�d�\nYK�\\XSd�\$V�=5���F��F�I]\r��T�[#`�ɔ2&x�\r˕M�4�F��T�M?�/���d\rH�ZwJ�2����pp\r�0&�\$q%\0&�x�\"Z�:� EP�M��\$cEO��H2#�E�KM�i���V�)q��\\����%'��Q����F�V�\$�#�����P(���^�ѩyGT��;��)���<���O�A@.`����F�ݥ�\0000��yZ�E��,��N��	�\\�S��P�n�hg�{]kxCPa\0�qJp�?�Lm���ZJ��:����]IN	����^�^0�p��Upf�If�7�&��H�dl6@QKR�@�}�������[��e˛�&�1ѭL��T�t������h�V@�-(�c�v1��QD��\\�D5'Xbؤ�Թ��*\"�(أ��R�a�+������5D*: JCA`Yw%��������E���^|h��蓴]%��R�;�K�A�Z��A�\\���S�\".X��ldK��ÍEA7�2\\��^�-A�ّ��0\n�~�=AP�A�B='���8^z��PJpR	-'\r4#-B��\n�..\$3^��>�1K<@���Ū�O��gӄkO.�>�ݖ�*��4&-XP��P�\"Lj�u�\$ek]�\\��:���5k��^��ל_���Ceq�dM�\rω� �*����r���y̭��+g6k.����k׻L��_�H�ׯ��P�Rc[�Y���r�-����\\]�~�C�&��\\��зx@''�o�����gb���0�(� 	���j\0o�2�A	d����޵���g���Y\n��X\\��@��	���L��a�Jf\"�ido;��pu#�44�p�Ù�BfW��Lb�]�H�d��#�@t\r�S٫���^%����@'���	~�\$�>ט^s��p!�r�d`�@����9m?^�uOS�	������qx�0���CZn�c(�!��)�̠���.��.��:��\0���<\0҅�l��p��(��\"@�?IR\r V�kN�n`��~�#�\r,�X�`��@���`���k��L!*�d`~��<����������\n np���m.A�@�\$��Ұm��i��Ǫ)�l9l���OZ!�	.t�L,���'%:f�\\�0�(���P�)�p&4��?2\r7�weRvM�`@�ׯ6pL����O���pzQC���PQ`n�n�q\r�J���g��	di\0�(����v���`zQ,\rpxL���Ji�]�\0;�A�^��O��px(��E�!�Z�(&�0*���#�y�����i��%yQ>�\0�,.�\"�,�ާ:�r���lN�p�����O�o�/���<��¥�8w�F�o&1�^��\0AFC	�ʓ\nP��[�bސ���-hK#�p[.���p��|<gjl�1��h^�`ڹ�Lp�mP���Q��p��v��m��n\"?2\0��^�:fD��*�FI��ro̑P_\0������tD!��'��i�����uo�\"�u�瑐��6����\0l2�\"g�`��m���Q-�Y�<��b,�,�z��}�(�\0���\rg�L���|\r�@�2��3��)�:�F\r�-4��r��\0. ևS�H�*گ�a+ŲH�9�W�\\F`AH#V�҅��e6 �\n���h&�\"n���S@n�S=&�q��� �@���3ڷkPۨ+�B�ft ��x� �0�8.�@���NJ�J�Ӌ H�7��'\$Z��Q\0Bw���\0^q�P\r�W8�l����J(��`D�MQڷ�|�S���1\r�!�G�\\��ĳ8N-*Q/  AD�3+� w�4��J��.�?��^�f`�A\0&�\n�1!*�_ b0f�r�D�D���\0^�R�}(؅`�������qK�e4,!M��L��\rKr\rN2�m�(�P�0g��`����JĽA��ķ�|�'��#�_i�,�E,�2%жCr5J�tT�\"�T,+GsD��)�wGp��ˤu@��m�\0CS578�@4U5S_K�]X��R][HuZ��U� ��/�%��~7��PT�0\n�Fl�y4`m�fLC�Zu�St�'��ѯR�Q�(�o]�E�?0S5�[�>Ս��_�V��p��t�A150*��?�T�3)b��eh~<��I�=cn�B�j Ġ\0�,#d�8�S(Cg��D>DԷvg]VZF?�JCc��,K\"��>�1܍B�7�6]�����/�i� ��,���[/p�Ox�ڨw/�|�Q�c�^y�B�U�D��}��L~g�phEz��l�V���Ve�@���M4E{n�.<�:�1\0��D3�\r�yj�����iWKu7V6�_t9e���MtB܊�Lɀ�d�\0��Mb������\n:7;&W|S�b3�G���L\nh\"�n��r�8�|28\"�]��Ђ̔�7�B�Aki�m�G}�~\0�*\0�-��Xe{<�b	�Q�֘))U��'�k�逫>MT?ψ�M}��J�?�n�ȏ�6�����Bn��)	�\$��,�.EAV�J�vW�t�����/��<��0��0��F '�>�8]G���£���	�~����� ���D��x�D}�	�j�?x<��� b��<\$¢EXرiq��ح���ʵw:	TMO5�F�0�e��9xnF�r	���j���}���#��@Op�V�4b!��j8g�Co:u~�x�9@\nJߒK{��J��m;E3�C�x\"��Rte5�����nָ%ԯ��/!��G�tE}�K�-2%i/�L�=/�G��+Cqr}�&�0��X���ٶ#r�)6�y�j� Z@�P�`^}�*9�,�͢�?���9��Q�-��'e3'�2\r2ѱ��ر6!���≤���������g���Y��hu�abo���t	T���m4�CR�Wa?ڋ���]8���O�9�cLCH�M��,Z`�*J�`�#F� A���!�**��0I~\"MY��t\"F�2ѕ\$a�]�Za6�2���ѮJ�\r�zbu�����\rе�bu��pW�w{��`e�,��l˄�Ey��t��uh>S\"�h��*��5C!� à�;6�9�5q��9��l�;��z�9h����1b�4��H��ē_�l�U\n��XFg���(�N)r�G��	�h0'��W%{j(�s;u�{P\r�d#��Yz��z\$<�O��Bf��`��`�.\$ZǤ2��z���5���R������������#�rH�Cv�,�� �|/�{K�ڧk����>Xh�;yĠ�\"#n��,��i�f\r\n���H��Kٻ��\0{��6({\ny�|\nn��\nh_�v\"��G�p��b{N��0��άA-��,��p_c+ygh?g�yY1�]��Be��U�H��tGdf�|�����(�3�\\�v\\�@�h|�L|��m\"�,�p�T���<ZqJ�`�Ef�Z\0P�\0ڋvoZ�\0�y��7��3�_宀�´��V�d�D��E�3�E{;��<'�Ez�+�\\�îB���J�GS�IR�5�wU�Z�����:Z���F�;�N��b�쵽8e�`A�=���4��n����>����Fv��wn�4�-�`�E��]Z�#)��w�?qo�\0A��߮��-;��2��p�t �;��\r�B�6�8������#���O�<�0S� ӽ0X{1�f �\\\rOD\r\0��*�×���\"�?z=�:�aZ;\$�)��ɱ��\"~�m����������3��H?>�47��� a�������n*]De{�Ȼ�wn�t��4�4��Y��������0fL�=��Pe�����)�������M�FaӔ7|��]�<���\"UR\$KI��ܐ�m��[T�3S���o��g�9��Z7��2Z羋�m�T/1�N~����}�T=�)�����h{���^�}��Q_70_;&�����v��\rk(���\r\"\"iq\n���>���`v�L��  ]x�FDЃ��#�kA��<�֝H-��Z�t�@�q>���*x8\n��@qE�Dy#����]:�)��x�ߊBƶ��#&S��짪�x�q~�t�r�����e{v+��zƕ�퍰\$&P[`����a�O�w�����}��{��-K֠~Z�%M�s^���v�셌�Pe^�Aܲ�G��]�����J�N�uh��=GE����:A�Ȍ|�(>=IC�Qnb�漥��:/�f(\nQA���1��r�a\"�n=���P��]2�#>��.t��\n߲�Ћ;Q�\"{aS��f��1���R�_T-g����8ErD����3�0_ǜU�*�l��ܵ��b�f�6h�姇��*�[K��4��8i�xd\$\0�k�?[	�C���Ϙ��.Ú�,��eH9-X���֠�a	b=��P�~��\0Xz�~���h���� ��6FxL�m� �,C�N<B�r8�;Dm3I�L�Ha�E� ���@L�Vat��� j\$L�H��� s�Bb&_(�!�\0>)�Ǣ\"H�&�V��H����!Q�H~�J����@(�����@�<M l����͗q\nd]�\0	����|�o�P	5(�6���h�p�2P9��	�\n��u��J'A�\rƃJ���w>5i1ё��ìeV�N1�u���f�5���(�HF�����Xku(�3F��0�9�Ylb(C\\�,��/ق�S^+�1	�?s6�\"���͢�orJZ6��&,\"%�QJ;IQ��4<�#n>����\n�_�)�r!�����¥j�s\0P���7,HS\\o�{\0G����j���l�1H�qA4�����\"W�XC#�����`�C�I�� �	�B�E8ڝ:±/�a!� `��Y���x(�]K<ID0���E�x8v�!灬�+�igJ��6Z�BB�cBrJ��ȆDh�>#�d�Q	H*D�\0 �J�\$� ��P�X��B7%Sb\nzL@e� �6=p&��idU�\$\"@*@~dt�sW6+�%H�\\�/�ZHs�9h�r:�C%6��H�.�%���va6(p�>!�\"�Rd�E��F>Q����C�eS(YK��xt��)�Y����[�>Z�D��.���|I{�m(�\\��� +\"�ȆD�\n�Ie1a�P`b#@	�S��p\"�u0��s2 ���-\"�`t��C\nzN��\\���bvSh�|�� ����\0���-'D����\"�2�d���Iw��z�Xl���-���2W���!v�y���!�p\\Y�͈���	����F�[��)ȀS��mɖ�6d���а� � �>�YD�T)i[��SA�]d�&C3����g(+!\\�r����&S�TE��Z�R��FeH,���JyUJ����/��Q++A,�W\$d7�P��!2XNX���%2	i�`]r�\\��̵53��VEKo=�\n���*�\0J��� �N6i~�_��\$:wa8�³�A��h9X�X ǹ�l�&e��2G��/����񻐾I�p��叉;�'7�S>|�f���(XRC�!��&�9��9���˫�.w	N�n�|���8��(Y��\"�G�1!�8?CH��� Y���]U��<�@�!u����:�~gY��d�Wf	���o}G��~#8�S�nI�F#��\"�90>�X\\���TG��s�R�~X�b> ϊ��8ʨ@4�)P�i���h�v��\"��B���5�\$,h���3�!#����>��Ml��CO@��(\$��qy��¢f%�V\nѷR�>c��\0R��h�{(C\$��!���(d�{���c�n\$WЊa���`jx��0D��� O�x��C�����1T5_<.sҐ�e��S�Ϟ}|�p�.\n���?���r�\\�Te���-��� �gB�Jj�����K�py��LP4\0�`������P\0�S��[Q�9FR����eN6����צ��e!'�g�y�,��1�>3�a�>f����0�H��!�(��~�\0�B��!�*h��ǚ�1�&�xԆż��1���{x��]��0Ց��M\"]�L`���7SY�S5�/BULߣ'�iA�\nY}S*�F�B��gzY@�\$g�\r��)��X����\n���c�u<.��Q�̂DQ��q��2�K���\n�:��Z��t��U��ţq�����<	��2Ub\"5?�?-���Apޛ2�l�ڇ��A����;���Z-����*@\0�)��wڳ]�Bgk�����NwȽȾ�&9���!�\n�E��ꦘ�@�U�\r��f��Rj] �3`	�Q\$s6����̷1�����s�Za#&T���,�`�	Z�^M`��9c�Tظ��W���!��B��A3�x�{\0���wl�� 4!}A�\\к�!��L�H�&!��F�%3�b�;tT\nt0Y4]'�{7p.U��-�����39�\$�o�j�+�y7�ny���L|c���8\n�Ld�J��`��oUuv6�ܳ0��Z�h���A�I�O���#(r/2�Nʮ�D�����Y�YWq�Y�P`�X��`u0��c�'�m��\n9��]k��]mm%��{2Yp]l�f�u�me,�=�����k�9�&����Fy��N,�GYP\no���O�T/�Md}5L`Z�C��Dj�`�)a(P1�K⎦S̸��Q�'�a�/�	U�{Q������i˱<�MX#X�rc�k	�Z�01X�<�P��	)���}!y����������te\"����k ���~W4�X��vͱt�v�'*պ�a�U}��c�kY��VZ=��̠�l1��lDL���/��L،�z^�a�-C���c��.��~0�^b_{��F:}H�����\\��[:) 2t���`ha��7��1��I֖P�Ze��fmBT��^,���2��Y�	��`h��qs�g1>��M�p��sє1>%���Gnz�y�N�紳�e-S���Yۄ��I�����HYͮ�ǹ�Wka �i���AsD�5��|�=���Bȅ�{�4H�<���F��Ph��/�Vn�c��˪�ɣ��=`xO�ϋ%YP�T�S4���\\4|6�郮�Z�Y�(�f}�,#ǀ<���Z?/�7����l��H�j�B���_�p�`;�e��i\nu�����1/��!�BA�1V��V�0���Q�2��hx\$47�!=)E�V�66�9m����8Z\r�6��aX�\$Ra�7�z����P@0��2��?�\0��N�9�7<�����)��h�v�G���6�d�i���?4�����\\NI}@��W�*\0��3𕣱#�wq�����_����X�1Z��(���O�	)D��՛1���K,Z\\!��v���g����xI{����V�*L\"�\r/���7뢹D\rgQ���W0�*\n��\0\$�_z5\"�&B��'з�1�޺HPΐ:��Z}��\r�~ꩅ�i����_� P�ƃL2��7Xj��F�^#l,֞8B�Ò@���P���А���SGhL>�����?}ܕ���{�U-���HƕU��C��/�7�&(/����\0۴Ț�~�-	��+3�\0����le��\n����r*\0*�;C��v:���̰u�Pq�nR@u[P�w�a%�.>���Y��2T�zh`%�-d8y�V^\0����5�-�p�Q�\"�R\"�	���dZ���=�C�l�<]�2׷a�����AbK\rPd�D�����3�oU~`P,S\n�yC(^QF`RB̖%����2��/(\n`q?�������d��]FLrg�\\���'D�҈r�Eeѫ[)YLA|@�±��7\$�+ʂt;�:�1<yLO�V�n�Ԥe{,��	��Ҥ��^ ����WX�r�̒�\"`a	S��`~Z�,�)�+L̀��\$��'���lK\"?��u��a!��@�&�xAC�No!˲�VS��������oM>8�:���C{~C�/@���!�(��E�x\"��b]�y~H3f���/)�47Β �9pP;� �y��O�r�E����m��Wnk���d���Fق�Q`V!9��l0b.�Q'�����n|i����'H����K��2��#N�uQ�����֯S?��!73회�#@��]x}Y����YqS ��b�{e�@ϩ�����4�J%�Kz���7�h�R�jD(	�W�����bm���� ��c�a�r���'AHtS��|��nFd��/Vcq0�����\\�	�L�o���#�/��#�#є������֬e�\nE��	/����f�(Du����֪Y�D���8�!��\\)����ӠY5֒�f�3��He�ĵ�g�%�c���G������:P�i����XZ�Y\0�8�D����_U���X6�T�g�6!E\\�����k��&�\0�R����9[�ػ�t�57�ŘA�V(�i��S���|r1�_	�=뤹�C��C}t�D'KWk6�b6� T�h5f�?Bq��{�0<5j�(�5��s&��<6���99�s\r_��F��������c\0	���F�M�5����pިm���B^ ����#�RB��\r��J�B0c�KC_�]Λƻ�w��\n?Մe�Jަ��mD�+��|fg3\$�D~%�#:6�o���jh�o��ڞm}�D�0�;ٵ�o}��l(�����߲�V`0�f�K���pӡ	��x�\n\$`y�Z�5�L�p�L�J1 ����L��]2�u\$�8�>0�<���>���Q`7Hq���\n�8G�����9�����S\"�8(ʐ�N�}��xhj�)��%K_�RT�6eE�.������SvD�#�A�5B�M��:X���\0�p7�Se�oɪ��[����f�ْπ��謐�:j�v:�`�8};gj�\"þ\$o�\rH���o/} .S)n�x�x\n,��3�\0q����q\0�3�?�?�������cl�\"����4 -\\G���	�\0�s%��I ������7����,�e;��z��%��qf\\ �Z���>e3�!oh%V�+qC.`l�D��.#��D�h�� �L+;	xR�(p!u;���T@!^_��V\$�x��t��uWG���41�Q�*�8��p1�ϊ�*� B�>C��q��\0�\0)�1cY�B!v+L�����?�8���w�y�*w�\r�n��5�3íKo#�ÿ����]����D����h=��\0-�2�n�)���`<�Vb �zA�\nq�.��Vk�,da{�`(TQ�w9�\0�ajz��Bj++ ��M���?)�i�qS���/�D��3<Ĵ�h[\\�w@��\0 HP&�Y�9\r���n��\0ta�zax߻GcD����5s�iV��\0�2Ӻp�!���ѧL��+~�Q��8:�+�\nFq+��cP�?��:�bc�С��	@E�v;�����Pū�`j�����!u��k1��.�5�n�{�u��ֆ�%����U;\$�N\0��&����@	�]��\$l4�8C�x��qd��T�I~���C���c�*;NM�ӗ�|���V��E��lN����SP�K\0ΐ�=	I/�r�hw��\\�x�{L�\"v�^ d��e������/��5�o��|G�y��p�B�I��)���=���b_G7�Gڹ҂P2��XMs't�\0�51��Zi\rH�������C2�9̹�Gɍ�\0�eh���\n����W*s��T�x8�����M_P��:hN�\\�&��v��Ԭ����M[Ɉ(ӟi&�����Ƨ��;c�a��װLy-M��wRE����z������p�(�s�����m`�w�ی�a�7Ϻ��|*�&�<)U�I��^0���_��~�2�`�v���f�w�7z�?�M��y���P�w����_sA^�o�C�y�^H�Y�����G���\r�ϏO�?����/��&/�x�R��\\'=HyD�a2��VzK3Т{�WйbL�l6��u��P5�p�^�S����c��g���t�b��c�=�r�J�X+֦��MF�S�W�h�!{k�\rU9I�.)��+A]���Ύ����'Y�h�y>4�5\"��W��۵��h*/�=&F�:;��1P̡���-[O�0�Q�Ɇ1/p��B� E��%�m:�����&���y\\.�D�``���_~���K��S��Lh�Y����#�|\\?�t�ڽ����{�n>��u}έ��	`E���.\0,CDl���Hإ����:\$BF��=�|�%M�o1p,�D��0��k�qP�xD�K��� 8\\>��w��]){/0�w6T����߄O��rhCT�>{~ʀ_���������K6~�O3����_P�\nƾ< |��,�O���s�V�w؜�:4���|�qA���\"�s5��.���A�@/�1�Ռ��e�'�m��sjEa�W�S��PK�\0��/�>h���1�T��s��?�a_�?z�?�}c�_Z��*�r./y���ʗ��Ѐ��\$F��U�N�}~g	[�`{_�u�#���^d����n\r��1����M#a|���F���8�h��P�B5(����	��⎁��5���0�\0 @\"��haV�N��/��\\�|���\0;��@_�Z�]���9>�l�E���;c�����%ͧ�����H�q`��z4ѐ`��<���.�5�=q~gxT4	�/�@D�,��q\0�\0��/�:ʍ/��Ӹ���#p�y������M:���F�\"txf��&F��.���3�,u���\r�4��eB�@��|�j���k����	\r�F����c�K�Ve�I�N0��c�2�\0���A\0�\"%�C����&�(7kb����HLh`�-��!6��xf�UAx\0�������{{\0�-��r���[;�\\.¹�g\\�`A~��a�O1��>5ZQ9S){�\"��l= a�C���I{���}\00075p���9AܙQ�F���װ��&�yb�\$0�w���=�/l�|�K1���d#� ���`*�:�9BFAa����0\r��u�-�N���n����A-J�b�|�3���qz��(O\n��OI>G�\"=�9B#0�\"�(>��O[3�0���ۚNT@\"*`��,P!?lO�'�T\n����{���AO\0/,�\n�б�	h䲅e�,��BҖ\$-������y	�.�2��x�m#�Gk��6>�0C<.�+�40��q���\nfLp�'FjcD42\r�/��X+P�¢��<ؔ~|\np�����&����3�S>6��D����Y�8H�\r�LS}��A\$D+������p�\0�	1eap��A|rk����00�\"\r�o\n#ƥ<PEB(�\n����(n��\rh˖BRs��0�0 �\n|c�Q���D\\�{�ˬ��|�9P\$\$��Q�ј?���ˡ&a�:[������ е�#i\rh�%�3A�K�%�q����k\0<��*K����*��ĉ>��L!��oh\0000T��Ǫ���n�A��Du\0Zh�)۽�.�\"���������TDx�\n�\"����q�w\"\0��/��T(	�\$����*6�B5ĳ4Lบ�3뉂�@ҥ2�Ŋ��\r�?���@�s�hK��Y:r�1�*Y�T����֤��\"�\0�cEd(z�3��F8<�ʠ�m4Q��EB�p`O��N��E�!��x�`kɥ���&�� N��\rD���F�Oj\0�)��E``56f�l�^�K�Z1e����@L��q�Gf�>{��mź'��o�����q3	Y�SJ��tM�}���VD�\\N�\$�4憙{�.!�~f�=P�#\\K��=�?.���\n��'B��?�5�H�,��B�+\n\nĞ;�����Ld���TJ�6n�F���`���U�����;5����ȈkT��*���B����mP�{^&`���S�l�莘�	�>�]�a=�h�D��Q�ov9��x�ne\0d�h��k�iZW������\\�@���4j�<���9��3�6�h{�OZ�+�W�G��k�� �tl����裢�<�����(��j@!~��.��ɎeFȇ��!��CT5���\\�<r(רּ L�jSI\\O�����Q�ƯC��W�nb�e�u�\0�R!L L���']�E����G���x��ǈ�`-��\r�빫mg��ɦ�޿�p�n��X;Yf�A0��gPn8+F��8��s��#�+xQ�\n\r��#6})���C�I�.��i�-i�| 	�����!������HeF\$��qc{�\\%Qց^!�dc����.t�c.����2�F>spm��b�<B�D��m�P&���@F���Oe��e4��PϺ�f��q<\"(�0���\"=��e��R�,���\$M!;sъ**Kb��8�t»Hkca��c�c�*\0R�������|�\$���Q#����e H%a��g\n���B,f�����1�H�� 8 ��I��\0�\$:2��bP!#T���IJ54��IV앣�I\"��\$g�x!�!0V�H�HK`S-��Q�G`ЋFP,���w�ƽ<NoT�h�1�M�����m-�)1>�?��AD \0�	���V����1((�M�=�N�2�w:4I˦�x��slCA����|��4��� ��� �~�ƿ\n�t*(�|��9J�ġP�G�k����(���6��4�jJ����/�(�.����������<0VA]�)}Pσ�D@JFz�mT�h���-qK�\r�a+�1�����ʀ����\n�LD�ì�2�\\��QCC�F��e.(I\r1rq\r�O&0:0ЋN���!�(��[��'� ����:\0�(���W(±jǃ'�\0��&H��DJ�O���@�+��*��\"@\r�P,��D��\0��% 1�� �\r�%*+�D��'�B�,�L!���+�'3��*\$�����ʂE�A��#�K���ʘD \$�8KH(��Ճ��k��E��A�T���~\$\\��u/�\0�\0lp�������Kg\0X ���-̭�ݥ�-�\r*'JY�#��X n;�&(����\$�l`���'�i�\n케���/��\0��A\"����Ģ2��̯CnI��O<C�%<����/�\0\"�b\r ���/�#r���g�ɬ�;Նb�(�����U0���5��0��0�+�%���>���2��[���;��I����L0C^�*��8>��.�����\"���\$��f#+�2����&�,���1`��r���4Z�@62Ѓ5��\rH�c2P\$l��/i2HϠ���^��Q(�`!�T�x�\$��;{n��aA�M?iA�0�!LM~�x�~/>qz���F6��ߓ�DFe�*/Iu#7�Ĭ!B|��Y��FeS���\0S4h�\"�,�!���� ϥ���Q�����8��M6*	��|&�4�(g��\nl0����Å�`�'�����9�4#S���俨����2a�P�����^��J=�\"y��ߔ�,�-ЀV�O�����o����[xM>���#�!�>s� ���X�8������8�m�,ky`N2?\\�q��2��s,�)3 ��NX4��B���J�HɈ3\\Z����R�\"2�2w���O�fJ�G�����������q�p;�	\\�n���\\t��6�+h,�a�1oϛ��}��LJ�\rM�Z�:�^���ɟ!�d��̼���N��0k���� '%����n?h����|�q0�.��O;ٳC�N�-�����\$�?�c�o���:�\nk� q3�|�\"T��OG<�W���/x�h�F!;b�\n�1\$�c�;t�Kt�#�i�yȰT�JtG�7�����2:������!�#軒>��2�Sh-�z��%�NrT��0�qè�:Ha#J���=%\0Hi�FH4µ���.��~��Ã�K��C�g<t�����t��\r�:D��ϱT:T��%OP\"d��)�� Y�%+ʼY�n��LÂ���GH��z��P��K<�� �\0�\nZ-��e�n�T9B��t�c�B�\n�p�M=�J�M\nT	Pq���b\\�^ļ-=e_�P�ơ`D�QÜ�Z�4U\0�����5�/HJ�4tS���mQ��Ch0�I�>�My|�|��N���dq(���\$�H���e��X��qu�i��^7�hLufyQ�e��6	q\"�Qf�1>s�3�斬�.���pp�/H̫X���P���@!l�X\rD�P؎4�D���\$\n�:���eJ+;}a�P�ʎ`�?��Q�=D+�_���my�SJ�r#)&nx`F�F�i��aD���7⪳�ZP���\0Q�Ano�;,t�\r i�f����)]ѥE[�E@�bh%&���>d�\$\"�0LD�ƬO����H 1	�/ꛞZ�ra��A\$��\r��v%�� 0����v1�0���3�f��A�����W�\0@�eHA��?\rA<���YψF4l�G�S���T�O�)*��l����t�>8���c>�jC4ފ.Ķ�������ǔF�n|7�\$!�G�!����Jd��C@#0�5���e!�/R�H��ԉQQ15T��AH�-sx�M7�^�y1=\"��0��9\n�\$H)J�7�n�ʤx�Tn����!^�&��l`\0�p�\"����(��(g:3���4��?��������C��,m�]���6�������kg�Ύ�/v��Iє�fјA5o��NK��g��k��G�T�SD����SP��a�IQ�������`���=6�b��}'Hl1�'�!�N��/�iF�F�P�Ǒ��њ�(\n�k��l)�����M TN�MO��dQptH�#� >\$X��7M	Ӡ���3pB�2��C����=�K�/�F�bԡ6\n	\r�*�R���M�2�f@�0�^ECd�>�ڍ5\0ʵ\"��S�<uD�;����0�@A�G��5Hc�WRڕ,N\"K��`T�<rk��#bR�R=J�/Ԯ(���AR�5)�ԐT�/ԫR�>f�L%M55�«�J4���P�����!BJz�J&��BēP\r2�Cj��AH���T�&�.�+����\r��'�k\r7��!�\r��o̞tA�J���Q�yԋX�p�UH eT�~F��c&�'UR�rD�A�����w]WB�.C:�po,����\r��s�;�=L�C�\0��We��+҂C��h1ɂ Z���W!\"�0n���H�Ԁ�+�\rM\r�� a5�=������:�q� 	ר[6�.��D����u��غLZ��lq��C��0�f��\n�A\0��36y��P�a2�a�/&ɍ����L\0���H��Hk'�Ba㮵{�u�2��GR4� ��~�c��I�b��U�� cm#e�!8�,�X}cf6� ;�4�6րr���#�\$;۠�\n69(<��P����m��G[�έ��WR�7�&�t��jrk'�[ق%<����+�!����am�S��DH�Gπ������3���`�A�.�H��[���	�UĊ�\\]k�D�����W��\"�\0��M�Y�:�4W�0b�\"�Z�P��|��\\a:e��\0�a�D�h�T�ѵJEk�\"�f+lu͡*�p!�P�R\"�*d�w&�A 3>0�x��<�uv\n�ע!}z5ԇ�+Mz�ʑ �k*D��\"�����]U{\"S׸��t�P��^J�a��\rg\0����.��/\\�z՜db����ڕpX���h2U�\0�_ �B�\n��z6\0��_[�o�H� ����U_`<	�%[[ya�Wa[� /�]�U�N\$y�68v�=pi���9荕�փa{�1l��tM�#c]��	2B��Uψ]\ri-�,Ua�x\nׄ�g'�X��'��%Y����c*69_V,}\n¦p���m0���؁\\��\n�b��P��Y�|5���`}�81��UyCה����ւ��}V<//`� �\rp�u*�GY���ׯ_��V(А�H��c��KBI6�Y�'��W����YJ6u|̲������U���\\�j�qd�\\U�3ϒR2����\\�o�WևX��u�8�ZH-�a�v�g���}5fF3[\rh\r܋(ނ��wx�����͏\0��gV�Іu�'؜r@��e�G\0Y�{�Vw��1@��Y�=���t�R�ŝ�wَ{���h�:�F�TsQ��I��j-ۥ᝕(ڹdh;v�N�Z����\0��d�\0����[��%����R��\"W��P~�f�f��E\0�7c�xUAPOGթR-�׷Q�	!��A�/`�U�#Y\0S<p�av�hn�,�5��	��Cʇvx`:�ij�Hܩ�;\\#�R UP��䵾꧐F��~7C�OI�ʑQE�C�Td#���x��5�u}:Z\n��s\n2���\\�z�о�ZNR��Z�j��DJ6ƅe��|�Mh�������ʚi1�9r�ʙ�^!}�ԣε@\\�Џ�'/=j �\$΃���\nbZ�BĻ��M�����(��ɝ�0��J��8B����E���[\\AZ�@���d���Ba�b���X���ϊz+��B=n��V��\\���[��Ւg���n0�����nY�9[�kXMA�[5\\����?o���۰|�\n�ۺDb���L�BD���ɵ�?��wHC5��z�-����d�h��%�hp/ŷ�'��������5R�[�.��Cp�����=��*� (����\"�C\r��K�'<b���OO;0��&�4");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0!�����M��*)�o��) q��e���#��L�\0;";break;case"cross.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0#�����#\na�Fo~y�.�_wa��1�J�G�L�6]\0\0;";break;case"up.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0 �����MQN\n�}��a8�y�aŶ�\0��\0;";break;case"down.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0 �����M��*)�[W�\\��L&ٜƶ�\0��\0;";break;case"arrow.gif":echo"GIF89a\0\n\0�\0\0������!�\0\0\0,\0\0\0\0\0\n\0\0�i������Ӳ޻\0\0;";break;}}exit;}if($_GET["script"]=="version"){$nd=file_open_lock(get_temp_dir()."/adminer.version");if($nd)file_write_unlock($nd,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$f,$l,$kc,$sc,$Bc,$m,$pd,$vd,$ba,$Vd,$x,$ca,$oe,$rf,$eg,$Jh,$_d,$qi,$wi,$U,$Ki,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Rf=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Rf[]=true;call_user_func_array('session_set_cookie_params',$Rf);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$ad);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'fr';}function
lang($vi,$gf=null){if(is_array($vi)){$hg=($gf==1?0:(!$gf?0:1));$vi=$vi[$hg];}$vi=str_replace("%d","%s",$vi);$gf=format_number($gf);return
sprintf($vi,$gf);}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$hg=array_search("SQL",$b->operators);if($hg!==false)unset($b->operators[$hg]);}function
dsn($pc,$V,$F,$_f=array()){$_f[PDO::ATTR_ERRMODE]=PDO::ERRMODE_SILENT;$_f[PDO::ATTR_STATEMENT_CLASS]=array('Min_PDOStatement');try{$this->pdo=new
PDO($pc,$V,$F,$_f);}catch(Exception$Hc){auth_error(h($Hc->getMessage()));}$this->server_info=@$this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);}function
quote($P){return$this->pdo->quote($P);}function
query($G,$Ei=false){$H=$this->pdo->query($G);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error='Erreur inconnue';return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$n=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch();return$J[$n];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(PDO::FETCH_ASSOC);}function
fetch_row(){return$this->fetch(PDO::FETCH_NUM);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$kc=array();function
add_driver($t,$D){global$kc;$kc[$t]=$D;}function
get_driver($t){global$kc;return$kc[$t];}class
Min_SQL{var$_conn;function
__construct($f){$this->_conn=$f;}function
select($Q,$L,$Z,$sd,$Bf=array(),$z=1,$E=0,$pg=false){global$b,$x;$ce=(count($sd)<count($L));$G=$b->selectQueryBuild($L,$Z,$sd,$Bf,$z,$E);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$sd&&$ce&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($sd&&$ce?"\nGROUP BY ".implode(", ",$sd):"").($Bf?"\nORDER BY ".implode(", ",$Bf):""),($z!=""?+$z:null),($E?$z*$E:0),"\n");$Fh=microtime(true);$I=$this->_conn->query($G);if($pg)echo$b->selectQuery($G,$Fh,!$I);return$I;}function
delete($Q,$zg,$z=0){$G="FROM ".table($Q);return
queries("DELETE".($z?limit1($Q,$G,$zg):" $G$zg"));}function
update($Q,$N,$zg,$z=0,$kh="\n"){$Wi=array();foreach($N
as$y=>$X)$Wi[]="$y = $X";$G=table($Q)." SET$kh".implode(",$kh",$Wi);return
queries("UPDATE".($z?limit1($Q,$G,$zg,$kh):" $G$zg"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$K,$ng){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$hi){}function
convertSearch($u,$X,$n){return$u;}function
value($X,$n){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$n):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($ah){return
q($ah);}function
warnings(){return'';}function
tableHelp($D){}}$kc["sqlite"]="SQLite 3";$kc["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($p){$this->_link=new
SQLite3($p);$Zi=$this->_link->version();$this->server_info=$Zi["versionString"];}function
query($G){$H=@$this->_link->query($G);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($G,$n=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$n];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$d=$this->_offset++;$T=$this->_result->columnType($d);return(object)array("name"=>$this->_result->columnName($d),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($p){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($p);}function
query($G,$Ei=false){$Re=($Ei?"unbufferedQuery":"query");$H=@$this->_link->$Re($G,SQLITE_BOTH,$m);$this->error="";if(!$H){$this->error=$m;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($G,$n=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$n];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$y=>$X)$I[idf_unescape($y)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$D=$this->_result->fieldName($this->_offset++);$cg='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($cg\\.)?$cg\$~",$D,$C)){$Q=($C[3]!=""?$C[3]:idf_unescape($C[2]));$D=($C[5]!=""?$C[5]:idf_unescape($C[4]));}return(object)array("name"=>$D,"orgname"=>$D,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($p){$this->dsn(DRIVER.":$p","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($p){if(is_readable($p)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$p)?$p:dirname($_SERVER["SCRIPT_FILENAME"])."/$p")." AS a")){parent::__construct($p);$this->query("PRAGMA foreign_keys = 1");$this->query("PRAGMA busy_timeout = 500");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ng){$Wi=array();foreach($K
as$N)$Wi[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Wi));}function
tableHelp($D){if($D=="sqlite_sequence")return"fileformat2.html#seqtab";if($D=="sqlite_master")return"fileformat2.html#$D";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'La base de données ne support pas les mots de passe';return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$z,$jf=0,$kh=" "){return" $G$Z".($z!==null?$kh."LIMIT $z".($jf?" OFFSET $jf":""):"");}function
limit1($Q,$G,$Z,$kh="\n"){global$f;return(preg_match('~^INTO~',$G)||$f->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$kh):" $G WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$kh."LIMIT 1)");}function
db_collation($k,$nb){global$f;return$f->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($j){return
array();}function
table_status($D=""){global$f;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$J){$J["Rows"]=$f->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($D!=""?$I[$D]:$I);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$f;return!$f->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$f;$I=array();$ng="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$J){$D=$J["name"];$T=strtolower($J["type"]);$Yb=$J["dflt_value"];$I[$D]=array("field"=>$D,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Yb,$C)?str_replace("''","'",$C[1]):($Yb=="NULL"?null:$Yb)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($ng!="")$I[$ng]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$I[$D]["auto_increment"]=true;$ng=$D;}}$Ah=$f->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Ah,$Ee,PREG_SET_ORDER);foreach($Ee
as$C){$D=str_replace('""','"',preg_replace('~^"|"$~','',$C[1]));if($I[$D])$I[$D]["collation"]=trim($C[3],"'");}return$I;}function
indexes($Q,$g=null){global$f;if(!is_object($g))$g=$f;$I=array();$Ah=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Ah,$C)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$C[1],$Ee,PREG_SET_ORDER);foreach($Ee
as$C){$I[""]["columns"][]=idf_unescape($C[2]).$C[4];$I[""]["descs"][]=(preg_match('~DESC~i',$C[5])?'1':null);}}if(!$I){foreach(fields($Q)as$D=>$n){if($n["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($D),"lengths"=>array(),"descs"=>array(null));}}$Dh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$g);foreach(get_rows("PRAGMA index_list(".table($Q).")",$g)as$J){$D=$J["name"];$v=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($D).")",$g)as$Zg){$v["columns"][]=$Zg["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($D).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Dh[$D],$Jg)){preg_match_all('/("[^"]*+")+( DESC)?/',$Jg[2],$Ee);foreach($Ee[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$I[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$I[""]["columns"]||$v["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$D))$I[$D]=$v;}return$I;}function
foreign_keys($Q){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$J){$q=&$I[$J["id"]];if(!$q)$q=$J;$q["source"][]=$J["from"];$q["target"][]=$J["to"];}return$I;}function
view($D){global$f;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$f->result("SELECT sql FROM sqlite_master WHERE name = ".q($D))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($k){return
false;}function
error(){global$f;return
h($f->error);}function
check_sqlite_name($D){global$f;$Qc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Qc)\$~",$D)){$f->error=sprintf('Veuillez utiliser l\'une des extensions %s.',str_replace("|",", ",$Qc));return
false;}return
true;}function
create_database($k,$mb){global$f;if(file_exists($k)){$f->error='Le fichier existe.';return
false;}if(!check_sqlite_name($k))return
false;try{$_=new
Min_SQLite($k);}catch(Exception$Hc){$f->error=$Hc->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($j){global$f;$f->__construct(":memory:");foreach($j
as$k){if(!@unlink($k)){$f->error='Le fichier existe.';return
false;}}return
true;}function
rename_database($D,$mb){global$f;if(!check_sqlite_name($D))return
false;$f->__construct(":memory:");$f->error='Le fichier existe.';return@rename(DB,$D);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$D,$o,$hd,$tb,$_c,$mb,$La,$Wf){global$f;$Pi=($Q==""||$hd);foreach($o
as$n){if($n[0]!=""||!$n[1]||$n[2]){$Pi=true;break;}}$c=array();$Kf=array();foreach($o
as$n){if($n[1]){$c[]=($Pi?$n[1]:"ADD ".implode($n[1]));if($n[0]!="")$Kf[$n[0]]=$n[1][0];}}if(!$Pi){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$D&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($D)))return
false;}elseif(!recreate_table($Q,$D,$c,$Kf,$hd,$La))return
false;if($La){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($D));if(!$f->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($D).", $La)");queries("COMMIT");}return
true;}function
recreate_table($Q,$D,$o,$Kf,$hd,$La,$w=array()){global$f;if($Q!=""){if(!$o){foreach(fields($Q)as$y=>$n){if($w)$n["auto_increment"]=0;$o[]=process_field($n,$n);$Kf[$y]=idf_escape($y);}}$og=false;foreach($o
as$n){if($n[6])$og=true;}$nc=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$nc[$X[1]]=true;unset($w[$y]);}}foreach(indexes($Q)as$ie=>$v){$e=array();foreach($v["columns"]as$y=>$d){if(!$Kf[$d])continue
2;$e[]=$Kf[$d].($v["descs"][$y]?" DESC":"");}if(!$nc[$ie]){if($v["type"]!="PRIMARY"||!$og)$w[]=array($v["type"],$ie,$e);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$hd[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$ie=>$q){foreach($q["source"]as$y=>$d){if(!$Kf[$d])continue
2;$q["source"][$y]=idf_unescape($Kf[$d]);}if(!isset($hd[" $ie"]))$hd[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($o
as$y=>$n)$o[$y]="  ".implode($n);$o=array_merge($o,array_filter($hd));$bi=($Q==$D?"adminer_$D":$D);if(!queries("CREATE TABLE ".table($bi)." (\n".implode(",\n",$o)."\n)"))return
false;if($Q!=""){if($Kf&&!queries("INSERT INTO ".table($bi)." (".implode(", ",$Kf).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Kf)))." FROM ".table($Q)))return
false;$Bi=array();foreach(triggers($Q)as$_i=>$ii){$zi=trigger($_i);$Bi[]="CREATE TRIGGER ".idf_escape($_i)." ".implode(" ",$ii)." ON ".table($D)."\n$zi[Statement]";}$La=$La?0:$f->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($Q));if(!queries("DROP TABLE ".table($Q))||($Q==$D&&!queries("ALTER TABLE ".table($bi)." RENAME TO ".table($D)))||!alter_indexes($D,$w))return
false;if($La)queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($D));foreach($Bi
as$zi){if(!queries($zi))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$D,$e){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($D!=""?$D:uniqid($Q."_"))." ON ".table($Q)." $e";}function
alter_indexes($Q,$c){foreach($c
as$ng){if($ng[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($bj){return
apply_queries("DROP VIEW",$bj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$bj,$Zh){return
false;}function
trigger($D){global$f;if($D=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Ai=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$Ai["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$f->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($D)),$C);$if=$C[3];return
array("Timing"=>strtoupper($C[1]),"Event"=>strtoupper($C[2]).($if?" OF":""),"Of"=>idf_unescape($if),"Trigger"=>$D,"Statement"=>$C[4],);}function
triggers($Q){$I=array();$Ai=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$J){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Ai["Timing"]).')\s*(.*?)\s+ON\b~i',$J["sql"],$C);$I[$J["name"]]=array($C[1],$C[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ROWID()");}function
explain($f,$G){return$f->query("EXPLAIN QUERY PLAN $G");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($dh){return
true;}function
create_sql($Q,$La,$Kh){global$f;$I=$f->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$D=>$v){if($D=='')continue;$I.=";\n\n".index_sql($Q,$v['type'],$D,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$I;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($i){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$f;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$I[$y]=$f->result("PRAGMA $y");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$zf){list($y,$X)=explode("=",$zf,2);$I[$y]=$X;}return$I;}function
convert_field($n){}function
unconvert_field($n,$I){return$I;}function
support($Vc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Vc);}function
driver_config(){$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);return
array('possible_drivers'=>array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite"),'jush'=>"sqlite",'types'=>$U,'structured_types'=>array_keys($U),'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL"),'functions'=>array("distinct","hex","length","lower","round","unixepoch","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",)),);}}$kc["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($Cc,$m){if(ini_bool("html_errors"))$m=html_entity_decode(strip_tags($m));$m=preg_replace('~^[^:]*: ~','',$m);$this->error=$m;}function
connect($M,$V,$F){global$b;$k=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($k!=""?addcslashes($k,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$k!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Zi=pg_version($this->_link);$this->server_info=$Zi["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$n){return($n["type"]=="bytea"&&$X!==null?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($i){global$b;if($i==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($i,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$Ei=false){$H=@pg_query($this->_link,$G);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);$I=false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);$I=true;}else$I=new
Min_Result($H);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$n=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$n);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$d);$I->name=pg_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$d);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($M,$V,$F){global$b;$k=$b->database();$this->dsn("pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' client_encoding=utf8 dbname='".($k!=""?addcslashes($k,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($i){global$b;return($b->database()==$i);}function
quoteBinary($ah){return
q($ah);}function
query($G,$Ei=false){$I=parent::query($G,$Ei);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$I;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ng){global$f;foreach($K
as$N){$Li=array();$Z=array();foreach($N
as$y=>$X){$Li[]="$y = $X";if(isset($ng[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Li)." WHERE ".implode(" AND ",$Z))&&$f->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}function
slowQuery($G,$hi){$this->_conn->query("SET statement_timeout = ".(1000*$hi));$this->_conn->timeout=1000*$hi;return$G;}function
convertSearch($u,$X,$n){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$n["type"])?$u:"CAST($u AS text)");}function
quoteBinary($ah){return$this->_conn->quoteBinary($ah);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($D){$A=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$A[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$D).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Jh;$f=new
Min_DB;$Mb=$b->credentials();if($f->connect($Mb[0],$Mb[1],$Mb[2])){if(min_version(9,0,$f)){$f->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$f)){$Jh['Chaînes'][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$f)){$Jh['Chaînes'][]="jsonb";$U["jsonb"]=4294967295;}}}return$f;}return$f->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$z,$jf=0,$kh=" "){return" $G$Z".($z!==null?$kh."LIMIT $z".($jf?" OFFSET $jf":""):"");}function
limit1($Q,$G,$Z,$kh="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$kh):" $G".(is_view(table_status1($Q))?$Z:$kh."WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$kh."LIMIT 1)"));}function
db_collation($k,$nb){global$f;return$f->result("SELECT datcollate FROM pg_database WHERE datname = ".q($k));}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($j){return
array();}function
table_status($D=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f', 'p')
".($D!=""?"AND relname = ".q($D):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($D!=""?$I[$D]:$I);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$I=array();$Ca=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment".(min_version(10)?", a.attidentity":"")."
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$C);list(,$T,$ve,$J["length"],$xa,$Fa)=$C;$J["length"].=$Fa;$cb=$T.$xa;if(isset($Ca[$cb])){$J["type"]=$Ca[$cb];$J["full_type"]=$J["type"].$ve.$Fa;}else{$J["type"]=$T;$J["full_type"]=$J["type"].$ve.$xa.$Fa;}if(in_array($J['attidentity'],array('a','d')))$J['default']='GENERATED '.($J['attidentity']=='d'?'BY DEFAULT':'ALWAYS').' AS IDENTITY';$J["null"]=!$J["attnotnull"];$J["auto_increment"]=$J['attidentity']||preg_match('~^nextval\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^,)]+(.*)~',$J["default"],$C))$J["default"]=($C[1]=="NULL"?null:idf_unescape($C[1]).$C[2]);$I[$J["field"]]=$J;}return$I;}function
indexes($Q,$g=null){global$f;if(!is_object($g))$g=$f;$I=array();$Sh=$g->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$e=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Sh AND attnum > 0",$g);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption, (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Sh AND ci.oid = i.indexrelid",$g)as$J){$Kg=$J["relname"];$I[$Kg]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$Kg]["columns"]=array();foreach(explode(" ",$J["indkey"])as$Rd)$I[$Kg]["columns"][]=$e[$Rd];$I[$Kg]["descs"]=array();foreach(explode(" ",$J["indoption"])as$Sd)$I[$Kg]["descs"][]=($Sd&1?'1':null);$I[$Kg]["lengths"]=array();}return$I;}function
foreign_keys($Q){global$rf;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$C)){$J['source']=array_map('idf_unescape',array_map('trim',explode(',',$C[1])));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$C[2],$De)){$J['ns']=idf_unescape($De[2]);$J['table']=idf_unescape($De[4]);}$J['target']=array_map('idf_unescape',array_map('trim',explode(',',$C[3])));$J['on_delete']=(preg_match("~ON DELETE ($rf)~",$C[4],$De)?$De[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($rf)~",$C[4],$De)?$De[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
constraints($Q){global$rf;$I=array();foreach(get_rows("SELECT conname, consrc
FROM pg_catalog.pg_constraint
INNER JOIN pg_catalog.pg_namespace ON pg_constraint.connamespace = pg_namespace.oid
INNER JOIN pg_catalog.pg_class ON pg_constraint.conrelid = pg_class.oid AND pg_constraint.connamespace = pg_class.relnamespace
WHERE pg_constraint.contype = 'c'
AND conrelid != 0 -- handle only CONSTRAINTs here, not TYPES
AND nspname = current_schema()
AND relname = ".q($Q)."
ORDER BY connamespace, conname")as$J)$I[$J['conname']]=$J['consrc'];return$I;}function
view($D){global$f;return
array("select"=>trim($f->result("SELECT pg_get_viewdef(".$f->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($D)).")")));}function
collations(){return
array();}function
information_schema($k){return($k=="information_schema");}function
error(){global$f;$I=h($f->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$I,$C))$I=$C[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($C[3]).'})(.*)~','\1<b>\2</b>',$C[2]).$C[4];return
nl_br($I);}function
create_database($k,$mb){return
queries("CREATE DATABASE ".idf_escape($k).($mb?" ENCODING ".idf_escape($mb):""));}function
drop_databases($j){global$f;$f->close();return
apply_queries("DROP DATABASE",$j,'idf_escape');}function
rename_database($D,$mb){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($D));}function
auto_increment(){return"";}function
alter_table($Q,$D,$o,$hd,$tb,$_c,$mb,$La,$Wf){$c=array();$yg=array();if($Q!=""&&$Q!=$D)$yg[]="ALTER TABLE ".table($Q)." RENAME TO ".table($D);foreach($o
as$n){$d=idf_escape($n[0]);$X=$n[1];if(!$X)$c[]="DROP $d";else{$Vi=$X[5];unset($X[5]);if($n[0]==""){if(isset($X[6]))$X[1]=($X[1]==" bigint"?" big":($X[1]==" smallint"?" small":" "))."serial";$c[]=($Q!=""?"ADD ":"  ").implode($X);if(isset($X[6]))$c[]=($Q!=""?"ADD":" ")." PRIMARY KEY ($X[0])";}else{if($d!=$X[0])$yg[]="ALTER TABLE ".table($D)." RENAME $d TO $X[0]";$c[]="ALTER $d TYPE$X[1]";if(!$X[6]){$c[]="ALTER $d ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $d ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($n[0]!=""||$Vi!="")$yg[]="COMMENT ON COLUMN ".table($D).".$X[0] IS ".($Vi!=""?substr($Vi,9):"''");}}$c=array_merge($c,$hd);if($Q=="")array_unshift($yg,"CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($yg,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($tb!==null)$yg[]="COMMENT ON TABLE ".table($D)." IS ".q($tb);if($La!=""){}foreach($yg
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($Q,$c){$h=array();$lc=array();$yg=array();foreach($c
as$X){if($X[0]!="INDEX")$h[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$lc[]=idf_escape($X[1]);else$yg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($h)array_unshift($yg,"ALTER TABLE ".table($Q).implode(",",$h));if($lc)array_unshift($yg,"DROP INDEX ".implode(", ",$lc));foreach($yg
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($bj){return
drop_tables($bj);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$bj,$Zh){foreach(array_merge($S,$bj)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($Zh)))return
false;}return
true;}function
trigger($D,$Q){if($D=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$e=array();$Z="WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q)." AND trigger_name = ".q($D);foreach(get_rows("SELECT * FROM information_schema.triggered_update_columns $Z")as$J)$e[]=$J["event_object_column"];$I=array();foreach(get_rows('SELECT trigger_name AS "Trigger", action_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers '."$Z ORDER BY event_manipulation DESC")as$J){if($e&&$J["Event"]=="UPDATE")$J["Event"].=" OF";$J["Of"]=implode(", ",$e);if($I)$J["Event"].=" OR $I[Event]";$I=$J;}return$I;}function
triggers($Q){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q))as$J){$zi=trigger($J["trigger_name"],$Q);$I[$zi["Trigger"]]=array($zi["Timing"],$zi["Event"]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE","INSERT OR UPDATE","INSERT OR UPDATE OF","DELETE OR INSERT","DELETE OR UPDATE","DELETE OR UPDATE OF","DELETE OR INSERT OR UPDATE","DELETE OR INSERT OR UPDATE OF"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($D,$T){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($D));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($D).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($D,$J){$I=array();foreach($J["fields"]as$n)$I[]=$n["type"];return
idf_escape($D)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($f,$G){return$f->query("EXPLAIN $G");}function
found_rows($R,$Z){global$f;if(preg_match("~ rows=([0-9]+)~",$f->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Jg))return$Jg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$f;return$f->result("SELECT current_schema()");}function
set_schema($ch,$g=null){global$f,$U,$Jh;if(!$g)$g=$f;$I=$g->query("SET search_path TO ".idf_escape($ch));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Jh['Types utilisateur'][]=$T;}}return$I;}function
foreign_keys_sql($Q){$I="";$O=table_status($Q);$ed=foreign_keys($Q);ksort($ed);foreach($ed
as$dd=>$cd)$I.="ALTER TABLE ONLY ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." ADD CONSTRAINT ".idf_escape($dd)." $cd[definition] ".($cd['deferrable']?'DEFERRABLE':'NOT DEFERRABLE').";\n";return($I?"$I\n":$I);}function
create_sql($Q,$La,$Kh){global$f;$I='';$Sg=array();$mh=array();$O=table_status($Q);if(is_view($O)){$aj=view($Q);return
rtrim("CREATE VIEW ".idf_escape($Q)." AS $aj[select]",";");}$o=fields($Q);$w=indexes($Q);ksort($w);$Cb=constraints($Q);if(!$O||empty($o))return
false;$I="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($o
as$Xc=>$n){$Tf=idf_escape($n['field']).' '.$n['full_type'].default_value($n).($n['attnotnull']?" NOT NULL":"");$Sg[]=$Tf;if(preg_match('~nextval\(\'([^\']+)\'\)~',$n['default'],$Ee)){$lh=$Ee[1];$_h=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($lh):"SELECT * FROM $lh"));$mh[]=($Kh=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $lh;\n":"")."CREATE SEQUENCE $lh INCREMENT $_h[increment_by] MINVALUE $_h[min_value] MAXVALUE $_h[max_value]".($La&&$_h['last_value']?" START $_h[last_value]":"")." CACHE $_h[cache_value];";}}if(!empty($mh))$I=implode("\n\n",$mh)."\n\n$I";foreach($w
as$Md=>$v){switch($v['type']){case'UNIQUE':$Sg[]="CONSTRAINT ".idf_escape($Md)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$Sg[]="CONSTRAINT ".idf_escape($Md)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($Cb
as$zb=>$Ab)$Sg[]="CONSTRAINT ".idf_escape($zb)." CHECK $Ab";$I.=implode(",\n    ",$Sg)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($w
as$Md=>$v){if($v['type']=='INDEX'){$e=array();foreach($v['columns']as$y=>$X)$e[]=idf_escape($X).($v['descs'][$y]?" DESC":"");$I.="\n\nCREATE INDEX ".idf_escape($Md)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',$e).");";}}if($O['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($o
as$Xc=>$n){if($n['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($Xc)." IS ".q($n['comment']).";";}return
rtrim($I,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$O=table_status($Q);$I="";foreach(triggers($Q)as$yi=>$xi){$zi=trigger($yi,$O['Name']);$I.="\nCREATE TRIGGER ".idf_escape($zi['Trigger'])." $zi[Timing] $zi[Event] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $zi[Type] $zi[Statement];;\n";}return$I;}function
use_sql($i){return"\connect ".idf_escape($i);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($n){}function
unconvert_field($n,$I){return$I;}function
support($Vc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Vc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$f;return$f->result("SHOW max_connections");}function
driver_config(){$U=array();$Jh=array();foreach(array('Nombres'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date et heure'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Chaînes'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binaires'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Réseau'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Géométrie'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}return
array('possible_drivers'=>array("PgSQL","PDO_PgSQL"),'jush'=>"pgsql",'types'=>$U,'structured_types'=>$Jh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","~","~*","!~","!~*","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'operator_regexp'=>'~*','functions'=>array("char_length","distinct","lower","round","to_hex","to_timestamp","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",)),);}}$kc["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;var$_current_db;function
_error($Cc,$m){if(ini_bool("html_errors"))$m=html_entity_decode(strip_tags($m));$m=preg_replace('~^[^:]*: ~','',$m);$this->error=$m;}function
connect($M,$V,$F){$this->_link=@oci_new_connect($V,$F,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$m=oci_error();$this->error=$m["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($i){$this->_current_db=$i;return
true;}function
query($G,$Ei=false){$H=oci_parse($this->_link,$G);$this->error="";if(!$H){$m=oci_error($this->_link);$this->errno=$m["code"];$this->error=$m["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);oci_free_statement($H);}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$n=1){$H=$this->query($G);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$n);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'OCI-Lob'))$J[$y]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$d);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";var$_current_db;function
connect($M,$V,$F){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$F);return
true;}function
select_db($i){$this->_current_db=$i;return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}function
insertUpdate($Q,$K,$ng){global$f;foreach($K
as$N){$Li=array();$Z=array();foreach($N
as$y=>$X){$Li[]="$y = $X";if(isset($ng[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Li)." WHERE ".implode(" AND ",$Z))&&$f->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$f=new
Min_DB;$Mb=$b->credentials();if($f->connect($Mb[0],$Mb[1],$Mb[2]))return$f;return$f->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces ORDER BY 1");}function
limit($G,$Z,$z,$jf=0,$kh=" "){return($jf?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($z+$jf).") WHERE rnum > $jf":($z!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($z+$jf):" $G$Z"));}function
limit1($Q,$G,$Z,$kh="\n"){return" $G$Z";}function
db_collation($k,$nb){global$f;return$f->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT USER FROM DUAL");}function
get_current_db(){global$f;$k=$f->_current_db?$f->_current_db:DB;unset($f->_current_db);return$k;}function
where_owner($lg,$Nf="owner"){if(!$_GET["ns"])return'';return"$lg$Nf = sys_context('USERENV', 'CURRENT_SCHEMA')";}function
views_table($e){$Nf=where_owner('');return"(SELECT $e FROM all_views WHERE ".($Nf?$Nf:"rownum < 0").")";}function
tables_list(){$aj=views_table("view_name");$Nf=where_owner(" AND ");return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."$Nf
UNION SELECT view_name, 'view' FROM $aj
ORDER BY 1");}function
count_tables($j){global$f;$I=array();foreach($j
as$k)$I[$k]=$f->result("SELECT COUNT(*) FROM all_tables WHERE tablespace_name = ".q($k));return$I;}function
table_status($D=""){$I=array();$eh=q($D);$k=get_current_db();$aj=views_table("view_name");$Nf=where_owner(" AND ");foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q($k).$Nf.($D!=""?" AND table_name = $eh":"")."
UNION SELECT view_name, 'view', 0, 0 FROM $aj".($D!=""?" WHERE view_name = $eh":"")."
ORDER BY 1")as$J){if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$I=array();$Nf=where_owner(" AND ");foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)."$Nf ORDER BY column_id")as$J){$T=$J["DATA_TYPE"];$ve="$J[DATA_PRECISION],$J[DATA_SCALE]";if($ve==",")$ve=$J["CHAR_COL_DECL_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$T.($ve?"($ve)":""),"type"=>strtolower($T),"length"=>$ve,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($Q,$g=null){$I=array();$Nf=where_owner(" AND ","aic.table_owner");foreach(get_rows("SELECT aic.*, ac.constraint_type, atc.data_default
FROM all_ind_columns aic
LEFT JOIN all_constraints ac ON aic.index_name = ac.constraint_name AND aic.table_name = ac.table_name AND aic.index_owner = ac.owner
LEFT JOIN all_tab_cols atc ON aic.column_name = atc.column_name AND aic.table_name = atc.table_name AND aic.index_owner = atc.owner
WHERE aic.table_name = ".q($Q)."$Nf
ORDER BY ac.constraint_type, aic.column_position",$g)as$J){$Md=$J["INDEX_NAME"];$qb=$J["DATA_DEFAULT"];$qb=($qb?trim($qb,'"'):$J["COLUMN_NAME"]);$I[$Md]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$Md]["columns"][]=$qb;$I[$Md]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$Md]["descs"][]=($J["DESCEND"]&&$J["DESCEND"]=="DESC"?'1':null);}return$I;}function
view($D){$aj=views_table("view_name, text");$K=get_rows('SELECT text "select" FROM '.$aj.' WHERE view_name = '.q($D));return
reset($K);}function
collations(){return
array();}function
information_schema($k){return
false;}function
error(){global$f;return
h($f->error);}function
explain($f,$G){$f->query("EXPLAIN PLAN FOR $G");return$f->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
auto_increment(){return"";}function
alter_table($Q,$D,$o,$hd,$tb,$_c,$mb,$La,$Wf){$c=$lc=array();$Hf=($Q?fields($Q):array());foreach($o
as$n){$X=$n[1];if($X&&$n[0]!=""&&idf_escape($n[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($n[0])." TO $X[0]");$Gf=$Hf[$n[0]];if($X&&$Gf){$lf=process_field($Gf,$Gf);if($X[2]==$lf[2])$X[2]="";}if($X)$c[]=($Q!=""?($n[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$lc[]=idf_escape($n[0]);}if($Q=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$lc||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$lc).")"))&&($Q==$D||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($D)));}function
alter_indexes($Q,$c){$lc=array();$yg=array();foreach($c
as$X){if($X[0]!="INDEX"){$X[2]=preg_replace('~ DESC$~','',$X[2]);$h=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");array_unshift($yg,"ALTER TABLE ".table($Q).$h);}elseif($X[2]=="DROP")$lc[]=idf_escape($X[1]);else$yg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($lc)array_unshift($yg,"DROP INDEX ".implode(", ",$lc));foreach($yg
as$G){if(!queries($G))return
false;}return
true;}function
foreign_keys($Q){$I=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($G)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($bj){return
apply_queries("DROP VIEW",$bj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){$I=get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX')) ORDER BY 1");return($I?$I:get_vals("SELECT DISTINCT owner FROM all_tables WHERE tablespace_name = ".q(DB)." ORDER BY 1"));}function
get_schema(){global$f;return$f->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($dh,$g=null){global$f;if(!$g)$g=$f;return$g->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($dh));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($n){}function
unconvert_field($n,$I){return$I;}function
support($Vc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view)$~',$Vc);}function
driver_config(){$U=array();$Jh=array();foreach(array('Nombres'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date et heure'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Chaînes'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binaires'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}return
array('possible_drivers'=>array("OCI8","PDO_OCI"),'jush'=>"oracle",'types'=>$U,'structured_types'=>$Jh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("distinct","length","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",)),);}}$kc["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$m){$this->errno=$m["code"];$this->error.="$m[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$F){global$b;$k=$b->database();$_b=array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8");if($k!="")$_b["Database"]=$k;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$M),$_b);if($this->_link){$Td=sqlsrv_server_info($this->_link);$this->server_info=$Td['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($i){return$this->query("USE ".idf_escape($i));}function
query($G,$Ei=false){$H=sqlsrv_query($this->_link,$G);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$n=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$n];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'DateTime'))$J[$y]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$n=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$n["Name"];$I->orgname=$n["Name"];$I->type=($n["Type"]==1?254:0);return$I;}function
seek($jf){for($s=0;$s<$jf;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$F){$this->_link=@mssql_connect($M,$V,$F);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($H){$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($i){return
mssql_select_db($i);}function
query($G,$Ei=false){$H=@mssql_query($G,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$n=0){$H=$this->query($G);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$n);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($jf){mssql_data_seek($this->_result,$jf);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$F);return
true;}function
select_db($i){return$this->query("USE ".idf_escape($i));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$ng){foreach($K
as$N){$Li=array();$Z=array();foreach($N
as$y=>$X){$Li[]="$y = $X";if(isset($ng[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Li)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$f=new
Min_DB;$Mb=$b->credentials();if($f->connect($Mb[0],$Mb[1],$Mb[2]))return$f;return$f->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$z,$jf=0,$kh=" "){return($z!==null?" TOP (".($z+$jf).")":"")." $G$Z";}function
limit1($Q,$G,$Z,$kh="\n"){return
limit($G,$Z,1,0,$kh);}function
db_collation($k,$nb){global$f;return$f->result("SELECT collation_name FROM sys.databases WHERE name = ".q($k));}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($j){global$f;$I=array();foreach($j
as$k){$f->select_db($k);$I[$k]=$f->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($D=""){$I=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$J){if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$vb=get_key_vals("SELECT objname, cast(value as varchar(max)) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$J){$T=$J["type"];$ve=(preg_match("~char|binary~",$T)?$J["max_length"]:($T=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$T.($ve?"($ve)":""),"type"=>$T,"length"=>$ve,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],"comment"=>$vb[$J["name"]],);}return$I;}function
indexes($Q,$g=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$g)as$J){$D=$J["name"];$I[$D]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$D]["lengths"]=array();$I[$D]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$D]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($D){global$f;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$f->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($D))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$mb)$I[preg_replace('~_.*~','',$mb)][]=$mb;return$I;}function
information_schema($k){return
false;}function
error(){global$f;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$f->error)));}function
create_database($k,$mb){return
queries("CREATE DATABASE ".idf_escape($k).(preg_match('~^[a-z0-9_]+$~i',$mb)?" COLLATE $mb":""));}function
drop_databases($j){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$j)));}function
rename_database($D,$mb){if(preg_match('~^[a-z0-9_]+$~i',$mb))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $mb");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($D));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$D,$o,$hd,$tb,$_c,$mb,$La,$Wf){$c=array();$vb=array();foreach($o
as$n){$d=idf_escape($n[0]);$X=$n[1];if(!$X)$c["DROP"][]=" COLUMN $d";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$vb[$n[0]]=$X[5];unset($X[5]);if($n[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($hd[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($d!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$d").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($D)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$D)queries("EXEC sp_rename ".q(table($Q)).", ".q($D));if($hd)$c[""]=$hd;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($D)." $y".implode(",",$X)))return
false;}foreach($vb
as$y=>$X){$tb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($D).", @level2type = N'Column', @level2name = ".q($y));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$tb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($D).", @level2type = N'Column', @level2name = ".q($y));}return
true;}function
alter_indexes($Q,$c){$v=array();$lc=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$lc[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$lc||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$lc)));}function
last_id(){global$f;return$f->result("SELECT SCOPE_IDENTITY()");}function
explain($f,$G){$f->query("SET SHOWPLAN_ALL ON");$I=$f->query($G);$f->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($R,$Z){}function
foreign_keys($Q){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$J){$q=&$I[$J["FK_NAME"]];$q["db"]=$J["PKTABLE_QUALIFIER"];$q["table"]=$J["PKTABLE_NAME"];$q["source"][]=$J["FKCOLUMN_NAME"];$q["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($bj){return
queries("DROP VIEW ".implode(", ",array_map('table',$bj)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$bj,$Zh){return
apply_queries("ALTER SCHEMA ".idf_escape($Zh)." TRANSFER",array_merge($S,$bj));}function
trigger($D){if($D=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($D));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$I["text"]);return$I;}function
triggers($Q){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$f;if($_GET["ns"]!="")return$_GET["ns"];return$f->result("SELECT SCHEMA_NAME()");}function
set_schema($ch){return
true;}function
use_sql($i){return"USE ".idf_escape($i);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($n){}function
unconvert_field($n,$I){return$I;}function
support($Vc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$Vc);}function
driver_config(){$U=array();$Jh=array();foreach(array('Nombres'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date et heure'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Chaînes'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binaires'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}return
array('possible_drivers'=>array("SQLSRV","MSSQL","PDO_DBLIB"),'jush'=>"mssql",'types'=>$U,'structured_types'=>$Jh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("distinct","len","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",)),);}}$kc["mongo"]="MongoDB (alpha)";if(isset($_GET["mongo"])){define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Mi,$_f){try{$this->_link=new
MongoClient($Mi,$_f);if($_f["password"]!=""){$_f["password"]="";try{new
MongoClient($Mi,$_f);$this->error='La base de données ne support pas les mots de passe';}catch(Exception$rc){}}}catch(Exception$rc){$this->error=$rc->getMessage();}}function
query($G){return
false;}function
select_db($i){try{$this->_db=$this->_link->selectDB($i);return
true;}catch(Exception$Hc){$this->error=$Hc->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$fe){$J=array();foreach($fe
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoId')?"ObjectId(\"$X\")":(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?"$X":(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$je=array_keys($this->_rows[0]);$D=$je[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}class
Min_Driver
extends
Min_SQL{public$ng="_id";function
select($Q,$L,$Z,$sd,$Bf=array(),$z=1,$E=0,$pg=false){$L=($L==array("*")?array():array_fill_keys($L,true));$xh=array();foreach($Bf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Ib);$xh[$X]=($Ib?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$L)->sort($xh)->limit($z!=""?+$z:0)->skip($E*$z));}function
insert($Q,$N){try{$I=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$N['_id'];return!$I['err'];}catch(Exception$Hc){$this->_conn->error=$Hc->getMessage();return
false;}}}function
get_databases($fd){global$f;$I=array();$Wb=$f->_link->listDBs();foreach($Wb['databases']as$k)$I[]=$k['name'];return$I;}function
count_tables($j){global$f;$I=array();foreach($j
as$k)$I[$k]=count($f->_link->selectDB($k)->getCollectionNames(true));return$I;}function
tables_list(){global$f;return
array_fill_keys($f->_db->getCollectionNames(true),'table');}function
drop_databases($j){global$f;foreach($j
as$k){$Og=$f->_link->selectDB($k)->drop();if(!$Og['ok'])return
false;}return
true;}function
indexes($Q,$g=null){global$f;$I=array();foreach($f->_db->selectCollection($Q)->getIndexInfo()as$v){$ec=array();foreach($v["key"]as$d=>$T)$ec[]=($T==-1?'1':null);$I[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$ec,);}return$I;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$f;return$f->_db->selectCollection($_GET["select"])->count($Z);}$xf=array("=");$wf=null;}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$affected_rows,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Mi,$_f){$hb='MongoDB\Driver\Manager';$this->_link=new$hb($Mi,$_f);$this->executeCommand('admin',array('ping'=>1));}function
executeCommand($k,$rb){$hb='MongoDB\Driver\Command';try{return$this->_link->executeCommand($k,new$hb($rb));}catch(Exception$rc){$this->error=$rc->getMessage();return
array();}}function
executeBulkWrite($Ye,$Xa,$Jb){try{$Rg=$this->_link->executeBulkWrite($Ye,$Xa);$this->affected_rows=$Rg->$Jb();return
true;}catch(Exception$rc){$this->error=$rc->getMessage();return
false;}}function
query($G){return
false;}function
select_db($i){$this->_db_name=$i;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$fe){$J=array();foreach($fe
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'."$X\")":(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->getData():(is_a($X,'MongoDB\BSON\Regex')?"$X":(is_object($X)||is_array($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$je=array_keys($this->_rows[0]);$D=$je[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}class
Min_Driver
extends
Min_SQL{public$ng="_id";function
select($Q,$L,$Z,$sd,$Bf=array(),$z=1,$E=0,$pg=false){global$f;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$xh=array();foreach($Bf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Ib);$xh[$X]=($Ib?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$uh=$E*$z;$hb='MongoDB\Driver\Query';try{return
new
Min_Result($f->_link->executeQuery("$f->_db_name.$Q",new$hb($Z,array('projection'=>$L,'limit'=>$z,'skip'=>$uh,'sort'=>$xh))));}catch(Exception$rc){$f->error=$rc->getMessage();return
false;}}function
update($Q,$N,$zg,$z=0,$kh="\n"){global$f;$k=$f->_db_name;$Z=sql_query_where_parser($zg);$hb='MongoDB\Driver\BulkWrite';$Xa=new$hb(array());if(isset($N['_id']))unset($N['_id']);$Lg=array();foreach($N
as$y=>$Y){if($Y=='NULL'){$Lg[$y]=1;unset($N[$y]);}}$Li=array('$set'=>$N);if(count($Lg))$Li['$unset']=$Lg;$Xa->update($Z,$Li,array('upsert'=>false));return$f->executeBulkWrite("$k.$Q",$Xa,'getModifiedCount');}function
delete($Q,$zg,$z=0){global$f;$k=$f->_db_name;$Z=sql_query_where_parser($zg);$hb='MongoDB\Driver\BulkWrite';$Xa=new$hb(array());$Xa->delete($Z,array('limit'=>$z));return$f->executeBulkWrite("$k.$Q",$Xa,'getDeletedCount');}function
insert($Q,$N){global$f;$k=$f->_db_name;$hb='MongoDB\Driver\BulkWrite';$Xa=new$hb(array());if($N['_id']=='')unset($N['_id']);$Xa->insert($N);return$f->executeBulkWrite("$k.$Q",$Xa,'getInsertedCount');}}function
get_databases($fd){global$f;$I=array();foreach($f->executeCommand('admin',array('listDatabases'=>1))as$Wb){foreach($Wb->databases
as$k)$I[]=$k->name;}return$I;}function
count_tables($j){$I=array();return$I;}function
tables_list(){global$f;$ob=array();foreach($f->executeCommand($f->_db_name,array('listCollections'=>1))as$H)$ob[$H->name]='table';return$ob;}function
drop_databases($j){return
false;}function
indexes($Q,$g=null){global$f;$I=array();foreach($f->executeCommand($f->_db_name,array('listIndexes'=>$Q))as$v){$ec=array();$e=array();foreach(get_object_vars($v->key)as$d=>$T){$ec[]=($T==-1?'1':null);$e[]=$d;}$I[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$e,"lengths"=>array(),"descs"=>$ec,);}return$I;}function
fields($Q){global$l;$o=fields_from_edit();if(!$o){$H=$l->select($Q,array("*"),null,null,array(),10);if($H){while($J=$H->fetch_assoc()){foreach($J
as$y=>$X){$J[$y]=null;$o[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$l->primary),"auto_increment"=>($y==$l->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}}return$o;}function
found_rows($R,$Z){global$f;$Z=where_to_query($Z);$pi=$f->executeCommand($f->_db_name,array('count'=>$R['Name'],'query'=>$Z))->toArray();return$pi[0]->n;}function
sql_query_where_parser($zg){$zg=preg_replace('~^\sWHERE \(?\(?(.+?)\)?\)?$~','\1',$zg);$lj=explode(' AND ',$zg);$mj=explode(') OR (',$zg);$Z=array();foreach($lj
as$jj)$Z[]=trim($jj);if(count($mj)==1)$mj=array();elseif(count($mj)>1)$Z=array();return
where_to_query($Z,$mj);}function
where_to_query($hj=array(),$ij=array()){global$b;$Rb=array();foreach(array('and'=>$hj,'or'=>$ij)as$T=>$Z){if(is_array($Z)){foreach($Z
as$Nc){list($kb,$uf,$X)=explode(" ",$Nc,3);if($kb=="_id"&&preg_match('~^(MongoDB\\\\BSON\\\\ObjectID)\("(.+)"\)$~',$X,$C)){list(,$hb,$X)=$C;$X=new$hb($X);}if(!in_array($uf,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$uf,$C)){$X=(float)$X;$uf=$C[1];}elseif(preg_match('~^\(date\)(.+)~',$uf,$C)){$Tb=new
DateTime($X);$hb='MongoDB\BSON\UTCDatetime';$X=new$hb($Tb->getTimestamp()*1000);$uf=$C[1];}switch($uf){case'=':$uf='$eq';break;case'!=':$uf='$ne';break;case'>':$uf='$gt';break;case'<':$uf='$lt';break;case'>=':$uf='$gte';break;case'<=':$uf='$lte';break;case'regex':$uf='$regex';break;default:continue
2;}if($T=='and')$Rb['$and'][]=array($kb=>array($uf=>$X));elseif($T=='or')$Rb['$or'][]=array($kb=>array($uf=>$X));}}}return$Rb;}$xf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);$wf='regex';}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($D="",$Uc=false){$I=array();foreach(tables_list()as$Q=>$T){$I[$Q]=array("Name"=>$Q);if($D==$Q)return$I[$Q];}return$I;}function
create_database($k,$mb){return
true;}function
last_id(){global$f;return$f->last_id;}function
error(){global$f;return
h($f->error);}function
collations(){return
array();}function
logged_user(){global$b;$Mb=$b->credentials();return$Mb[1];}function
connect(){global$b;$f=new
Min_DB;list($M,$V,$F)=$b->credentials();$_f=array();if($V.$F!=""){$_f["username"]=$V;$_f["password"]=$F;}$k=$b->database();if($k!="")$_f["db"]=$k;if(($Ka=getenv("MONGO_AUTH_SOURCE")))$_f["authSource"]=$Ka;$f->connect("mongodb://$M",$_f);if($f->error)return$f->error;return$f;}function
alter_indexes($Q,$c){global$f;foreach($c
as$X){list($T,$D,$N)=$X;if($N=="DROP")$I=$f->_db->command(array("deleteIndexes"=>$Q,"index"=>$D));else{$e=array();foreach($N
as$d){$d=preg_replace('~ DESC$~','',$d,1,$Ib);$e[$d]=($Ib?-1:1);}$I=$f->_db->selectCollection($Q)->ensureIndex($e,array("unique"=>($T=="UNIQUE"),"name"=>$D,));}if($I['errmsg']){$f->error=$I['errmsg'];return
false;}}return
true;}function
support($Vc){return
preg_match("~database|indexes|descidx~",$Vc);}function
db_collation($k,$nb){}function
information_schema(){}function
is_view($R){}function
convert_field($n){}function
unconvert_field($n,$I){return$I;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$D,$o,$hd,$tb,$_c,$mb,$La,$Wf){global$f;if($Q==""){$f->_db->createCollection($D);return
true;}}function
drop_tables($S){global$f;foreach($S
as$Q){$Og=$f->_db->selectCollection($Q)->drop();if(!$Og['ok'])return
false;}return
true;}function
truncate_tables($S){global$f;foreach($S
as$Q){$Og=$f->_db->selectCollection($Q)->remove();if(!$Og['ok'])return
false;}return
true;}function
driver_config(){global$xf,$wf;return
array('possible_drivers'=>array("mongo","mongodb"),'jush'=>"mongo",'operators'=>$xf,'operator_regexp'=>$wf,'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),);}}$kc["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url,$_db;function
rootQuery($ag,$Db=array(),$Re='GET'){@ini_set('track_errors',1);$Zc=@file_get_contents("$this->_url/".ltrim($ag,'/'),false,stream_context_create(array('http'=>array('method'=>$Re,'content'=>$Db===null?$Db:json_encode($Db),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Zc){$this->error=$php_errormsg;return$Zc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error='Authentification échouée.'." $http_response_header[0]";return
false;}$I=json_decode($Zc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$Bb=get_defined_constants(true);foreach($Bb['json']as$D=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$D)){$this->error=$D;break;}}}}return$I;}function
query($ag,$Db=array(),$Re='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($ag,'/'),$Db,$Re);}function
connect($M,$V,$F){preg_match('~^(https?://)?(.*)~',$M,$C);$this->_url=($C[1]?$C[1]:"http://")."$V:$F@$C[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($i){$this->_db=$i;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($K);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$L,$Z,$sd,$Bf=array(),$z=1,$E=0,$pg=false){global$b;$Rb=array();$G="$Q/_search";if($L!=array("*"))$Rb["fields"]=$L;if($Bf){$xh=array();foreach($Bf
as$kb){$kb=preg_replace('~ DESC$~','',$kb,1,$Ib);$xh[]=($Ib?array($kb=>"desc"):$kb);}$Rb["sort"]=$xh;}if($z){$Rb["size"]=+$z;if($E)$Rb["from"]=($E*$z);}foreach($Z
as$X){list($kb,$uf,$X)=explode(" ",$X,3);if($kb=="_id")$Rb["query"]["ids"]["values"][]=$X;elseif($kb.$X!=""){$ci=array("term"=>array(($kb!=""?$kb:"_all")=>$X));if($uf=="=")$Rb["query"]["filtered"]["filter"]["and"][]=$ci;else$Rb["query"]["filtered"]["query"]["bool"]["must"][]=$ci;}}if($Rb["query"]&&!$Rb["query"]["filtered"]["query"]&&!$Rb["query"]["ids"])$Rb["query"]["filtered"]["query"]=array("match_all"=>array());$Fh=microtime(true);$eh=$this->_conn->query($G,$Rb);if($pg)echo$b->selectQuery("$G: ".json_encode($Rb),$Fh,!$eh);if(!$eh)return
false;$I=array();foreach($eh['hits']['hits']as$Ed){$J=array();if($L==array("*"))$J["_id"]=$Ed["_id"];$o=$Ed['_source'];if($L!=array("*")){$o=array();foreach($L
as$y)$o[$y]=$Ed['fields'][$y];}foreach($o
as$y=>$X){if($Rb["fields"])$X=$X[0];$J[$y]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($T,$Cg,$zg,$z=0,$kh="\n"){$Yf=preg_split('~ *= *~',$zg);if(count($Yf)==2){$t=trim($Yf[1]);$G="$T/$t";return$this->_conn->query($G,$Cg,'POST');}return
false;}function
insert($T,$Cg){$t="";$G="$T/$t";$Og=$this->_conn->query($G,$Cg,'POST');$this->_conn->last_id=$Og['_id'];return$Og['created'];}function
delete($T,$zg,$z=0){$Id=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Id[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$bb){$Yf=preg_split('~ *= *~',$bb);if(count($Yf)==2)$Id[]=trim($Yf[1]);}}$this->_conn->affected_rows=0;foreach($Id
as$t){$G="{$T}/{$t}";$Og=$this->_conn->query($G,'{}','DELETE');if(is_array($Og)&&$Og['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$f=new
Min_DB;list($M,$V,$F)=$b->credentials();if($F!=""&&$f->connect($M,$V,""))return'La base de données ne support pas les mots de passe';if($f->connect($M,$V,$F))return$f;return$f->error;}function
support($Vc){return
preg_match("~database|table|columns~",$Vc);}function
logged_user(){global$b;$Mb=$b->credentials();return$Mb[1];}function
get_databases(){global$f;$I=$f->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($k,$nb){}function
engines(){return
array();}function
count_tables($j){global$f;$I=array();$H=$f->query('_stats');if($H&&$H['indices']){$Qd=$H['indices'];foreach($Qd
as$Pd=>$Gh){$Od=$Gh['total']['indexing'];$I[$Pd]=$Od['index_total'];}}return$I;}function
tables_list(){global$f;if(min_version(6))return
array('_doc'=>'table');$I=$f->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$f->_db]["mappings"]),'table');return$I;}function
table_status($D="",$Uc=false){global$f;$eh=$f->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($eh){$S=$eh["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$I[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($D!=""&&$D==$Q["key"])return$I[$D];}}return$I;}function
error(){global$f;return
h($f->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$g=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$f;$Ae=array();if(min_version(6)){$H=$f->query("_mapping");if($H)$Ae=$H[$f->_db]['mappings']['properties'];}else{$H=$f->query("$Q/_mapping");if($H){$Ae=$H[$Q]['properties'];if(!$Ae)$Ae=$H[$f->_db]['mappings'][$Q]['properties'];}}$I=array();if($Ae){foreach($Ae
as$D=>$n){$I[$D]=array("field"=>$D,"full_type"=>$n["type"],"type"=>$n["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($n["properties"]){unset($I[$D]["privileges"]["insert"]);unset($I[$D]["privileges"]["update"]);}}}return$I;}function
foreign_keys($Q){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($n){}function
unconvert_field($n,$I){return$I;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($k){global$f;return$f->rootQuery(urlencode($k),null,'PUT');}function
drop_databases($j){global$f;return$f->rootQuery(urlencode(implode(',',$j)),array(),'DELETE');}function
alter_table($Q,$D,$o,$hd,$tb,$_c,$mb,$La,$Wf){global$f;$vg=array();foreach($o
as$Sc){$Xc=trim($Sc[1][0]);$Yc=trim($Sc[1][1]?$Sc[1][1]:"text");$vg[$Xc]=array('type'=>$Yc);}if(!empty($vg))$vg=array('properties'=>$vg);return$f->query("_mapping/{$D}",$vg,'PUT');}function
drop_tables($S){global$f;$I=true;foreach($S
as$Q)$I=$I&&$f->query(urlencode($Q),array(),'DELETE');return$I;}function
last_id(){global$f;return$f->last_id;}function
driver_config(){$U=array();$Jh=array();foreach(array('Nombres'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Date et heure'=>array("date"=>10),'Chaînes'=>array("string"=>65535,"text"=>65535),'Binaires'=>array("binary"=>255),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}return
array('possible_drivers'=>array("json + allow_url_fopen"),'jush'=>"elastic",'operators'=>array("=","query"),'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),'types'=>$U,'structured_types'=>$Jh,);}}class
Adminer{var$operators;function
name(){return"<a href='https://www.adminerevo.org/'".target_blank()." id='h1'>AdminerEvo</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($h=false){return
password_file($h);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($M){return
h($M);}function
database(){return
DB;}function
databases($fd=true){return
get_databases($fd);}function
schemas(){return
schemas();}function
queryTimeout(){return
2;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$p="adminer.css";if(file_exists($p))$I[]="$p?v=".crc32(file_get_contents($p));return$I;}function
loginForm(){global$kc;echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('driver','<tr><th>'.'Système'.'<td>',html_select("auth[driver]",$kc,DRIVER,"loginDriver(this);")."\n"),$this->loginFormField('server','<tr><th>'.'Serveur'.'<td>','<input name="auth[server]" value="'.h(SERVER).'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">'."\n"),$this->loginFormField('username','<tr><th>'.'Utilisateur'.'<td>','<input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username')); qs('#username').form['auth[driver]'].onchange();")),$this->loginFormField('password','<tr><th>'.'Mot de passe'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),$this->loginFormField('db','<tr><th>'.'Base de données'.'<td>','<input name="auth[db]" value="'.h($_GET["db"]).'" autocapitalize="off">'."\n"),"</table>\n","<p><input type='submit' value='".'Authentification'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Authentification permanente')."\n";}function
loginFormField($D,$Bd,$Y){return$Bd.$Y;}function
login($ze,$F){if($F=="")return
sprintf('Adminer ne supporte pas l\'accès aux bases de données sans mot de passe, <a href="https://www.adminer.org/en/password/"%s>plus d\'information</a>.',target_blank());return
true;}function
tableName($Qh){return
h($Qh["Name"]);}function
fieldName($n,$Bf=0){return'<span title="'.h($n["full_type"]).'">'.h($n["field"]).'</span>';}function
selectLinks($Qh,$N=""){global$x,$l;echo'<p class="links">';$wa=array("select"=>'Afficher les données');if(support("table")||support("indexes"))$wa["table"]='Afficher la structure';if(support("table")){if(is_view($Qh))$wa["view"]='Modifier une vue';else$wa["create"]='Modifier la table';}if($N!==null)$wa["edit"]='Nouvel élément';$D=$Qh["Name"];$A=[];foreach($wa
as$y=>$X)$A[]="<a href='".h(ME)."$y=".urlencode($D).($y=="edit"?$N:"")."'".bold(isset($_GET[$y])).">$X</a>";echo
generate_linksbar($A),doc_link(array($x=>$l->tableHelp($D)),"?"),"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Ph){return
array();}function
backwardKeysPrint($Oa,$J){}function
selectQuery($G,$Fh,$Tc=false){global$x,$l;if(!$Tc&&($ej=$l->warnings())){$t="warnings";$I=", <a href='#$t'>".'Avertissements'."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."<div id='$t' class='hidden'>\n$ej</div>\n";}$A=[(support("sql")?"<a href='".h(ME)."sql=".urlencode($G)."'>".'Modifier'."</a>":""),"<a href='#' class='copy-to-clipboard'>".'Copier dans le presse-papiers'."</a>",];return"<code class='jush-$x copy-to-clipboard'>".h(str_replace("\n"," ",$G))."</code> <span class='time'>(".format_time($Fh).")</span>".generate_linksbar($A);}function
sqlCommandQuery($G){return
shorten_utf8(trim($G),1000);}function
rowDescription($Q){return"";}function
rowDescriptions($K,$id){return$K;}function
selectLink($X,$n){}function
selectVal($X,$_,$n,$Jf){$I=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$n["type"])&&!preg_match("~var~",$n["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$n["type"])&&!is_utf8($X))$I="<i>".lang(array('%d octet','%d octets'),strlen($Jf))."</i>";if(preg_match('~json~',$n["type"]))$I="<code class='jush-js'>$I</code>";return($_?"<a href='".h($_)."'".(is_url($_)?target_blank():"").">$I</a>":$I);}function
editVal($X,$n){return$X;}function
tableStructurePrint($o){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".'Colonne'."<td>".'Type'.(support("comment")?"<td>".'Commentaire':"")."</thead>\n";foreach($o
as$n){echo"<tr".odd()."><th>".h($n["field"]),"<td><span title='".h($n["collation"])."'>".h($n["full_type"])."</span>",($n["null"]?" <i>NULL</i>":""),($n["auto_increment"]?" <i>".'Incrément automatique'."</i>":""),(isset($n["default"])?" <span title='".'Valeur par défaut'."'>[<b>".h($n["default"])."</b>]</span>":""),(support("comment")?"<td>".h($n["comment"]):""),"\n";}echo"</table>\n","</div>\n";}function
tableIndexesPrint($w){echo"<table cellspacing='0'>\n";foreach($w
as$D=>$v){ksort($v["columns"]);$pg=array();foreach($v["columns"]as$y=>$X)$pg[]="<i>".h($X)."</i>".($v["lengths"][$y]?"(".$v["lengths"][$y].")":"").($v["descs"][$y]?" DESC":"");echo"<tr title='".h($D)."'><th>$v[type]<td>".implode(", ",$pg)."\n";}echo"</table>\n";}function
selectColumnsPrint($L,$e){global$pd,$vd;print_fieldset("select",'Sélectionner',$L);$s=0;$L[""]=array();foreach($L
as$y=>$X){$X=$_GET["columns"][$y];$d=select_input(" name='columns[$s][col]'",$e,$X["col"],($y!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($pd||$vd?"<select name='columns[$s][fun]'>".optionlist(array(-1=>"")+array_filter(array('Fonctions'=>$pd,'Agrégation'=>$vd)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($y!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($d)":$d)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$e,$w){print_fieldset("search",'Rechercher',$Z);foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$v["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"</div>\n";}}$Za="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$s=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]'",$e,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".'n\'importe où'.")"),html_select("where[$s][op]",$this->operators,$X["op"],$Za),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $Za }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($Bf,$e,$w){print_fieldset("sort",'Trier',$Bf);$s=0;foreach((array)$_GET["order"]as$y=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]'",$e,$X,"selectFieldChange"),checkbox("desc[$s]",1,isset($_GET["desc"][$y]),'décroissant')."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]'",$e,"","selectAddRow"),checkbox("desc[$s]",1,false,'décroissant')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'Limite'."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($fi){if($fi!==null){echo"<fieldset><legend>".'Longueur du texte'."</legend><div>","<input type='number' name='text_length' class='size' value='".h($fi)."'>","</div></fieldset>\n";}}function
selectActionPrint($w){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Sélectionner'."'>"," <span id='noindex' title='".'Scan de toute la table'."'></span>","<script".nonce().">\n","var indexColumns = ";$e=array();foreach($w
as$v){$Qb=reset($v["columns"]);if($v["type"]!="FULLTEXT"&&$Qb)$e[$Qb]=1;}$e[""]=1;foreach($e
as$y=>$X)json_row($y);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($xc,$e){}function
selectColumnsProcess($e,$w){global$pd,$vd;$L=array();$sd=array();foreach((array)$_GET["columns"]as$y=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$pd)||in_array($X["fun"],$vd)))){$L[$y]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$vd))$sd[]=$L[$y];}}return
array($L,$sd);}function
selectSearchProcess($o,$w){global$f,$l;$I=array();foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"&&$_GET["fulltext"][$s]!="")$I[]="MATCH (".implode(", ",array_map('idf_escape',$v["columns"])).") AGAINST (".q($_GET["fulltext"][$s]).(isset($_GET["boolean"][$s])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$y=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$lg="";$wb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Ld=process_length($X["val"]);$wb.=" ".($Ld!=""?$Ld:"(NULL)");}elseif($X["op"]=="SQL")$wb=" $X[val]";elseif($X["op"]=="LIKE %%")$wb=" LIKE ".$this->processInput($o[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$wb=" ILIKE ".$this->processInput($o[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$lg="$X[op](".q($X["val"]).", ";$wb=")";}elseif(!preg_match('~NULL$~',$X["op"]))$wb.=" ".$this->processInput($o[$X["col"]],$X["val"]);if($X["col"]!="")$I[]=$lg.$l->convertSearch(idf_escape($X["col"]),$X,$o[$X["col"]]).$wb;else{$pb=array();foreach($o
as$D=>$n){if((preg_match('~^[-\d.'.(preg_match('~IN$~',$X["op"])?',':'').']+$~',$X["val"])||!preg_match('~'.number_type().'|bit~',$n["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$n["type"]))&&(!preg_match('~date|timestamp~',$n["type"])||preg_match('~^\d+-\d+-\d+~',$X["val"])))$pb[]=$lg.$l->convertSearch(idf_escape($D),$X,$n).$wb;}$I[]=($pb?"(".implode(" OR ",$pb).")":"1 = 0");}}}return$I;}function
selectOrderProcess($o,$w){$I=array();foreach((array)$_GET["order"]as$y=>$X){if($X!="")$I[]=(preg_match('~^((COUNT\(DISTINCT |[A-Z0-9_]+\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\)|COUNT\(\*\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$y])?" DESC":"");}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$id){return
false;}function
selectQueryBuild($L,$Z,$sd,$Bf,$z,$E){return"";}function
messageQuery($G,$gi,$Tc=false){global$x,$l;restart_session();$Cd=&get_session("queries");if(!$Cd[$_GET["db"]])$Cd[$_GET["db"]]=array();if(strlen($G)>1e6)$G=preg_replace('~[\x80-\xFF]+$~','',substr($G,0,1e6))."\n…";$Cd[$_GET["db"]][]=array($G,time(),$gi);$Ch="sql-".count($Cd[$_GET["db"]]);$I="<a href='#$Ch' class='toggle'>".'Requête SQL'."</a> <a href='#' class='copy-to-clipboard icon expand' data-expand-id='$Ch'></a>\n";if(!$Tc&&($ej=$l->warnings())){$t="warnings-".count($Cd[$_GET["db"]]);$I="<a href='#$t' class='toggle'>".'Avertissements'."</a>, $I<div id='$t' class='hidden'>\n$ej</div>\n";}$A=[];if(support("sql")){$A[]='<a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($Cd[$_GET["db"]])-1)).'">'.'Modifier'.'</a>';$A[]='<a href="#" class="copy-to-clipboard">'.'Copier dans le presse-papiers'.'</a>';}return" <span class='time'>".@date("H:i:s")."</span>"." $I<div id='$Ch' class='hidden'><pre><code class='jush-$x copy-to-clipboard'>".shorten_utf8($G,1000)."</code></pre>".($gi?" <span class='time'>($gi)</span>":'').generate_linksbar($A).'</div>';}function
editRowPrint($Q,$o,$J,$Li){}function
editFunctions($n){global$sc;$I=($n["null"]?"NULL/":"");$Li=isset($_GET["select"])||where($_GET);foreach($sc
as$y=>$pd){if(!$y||(!isset($_GET["call"])&&$Li)){foreach($pd
as$cg=>$X){if(!$cg||preg_match("~$cg~",$n["type"]))$I.="/$X";}}if($y&&!preg_match('~set|blob|bytea|raw|file|bool~',$n["type"]))$I.="/SQL";}if($n["auto_increment"]&&!$Li)$I='Incrément automatique';return
explode("/",$I);}function
editInput($Q,$n,$Ia,$Y){if($n["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ia value='-1' checked><i>".'original'."</i></label> ":"").($n["null"]?"<label><input type='radio'$Ia value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ia,$n,$Y,0);return"";}function
editHint($Q,$n,$Y){return"";}function
processInput($n,$Y,$r=""){if($r=="SQL")return$Y;$D=$n["field"];$I=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$I="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$I=$r;elseif(preg_match('~^([+-]|\|\|)$~',$r))$I=idf_escape($D)." $r $I";elseif(preg_match('~^[+-] interval$~',$r))$I=idf_escape($D)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$I);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$I="$r(".idf_escape($D).", $I)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$I="$r($I)";return
unconvert_field($n,$I);}function
dumpOutput(){$I=array('text'=>'ouvrir','file'=>'enregistrer');if(function_exists('gzencode'))$I['gz']='gzip';return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($k){}function
dumpTable($Q,$Kh,$ee=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Kh)dump_csv(array_keys(fields($Q)));}else{if($ee==2){$o=array();foreach(fields($Q)as$D=>$n)$o[]=idf_escape($D)." $n[full_type]";$h="CREATE TABLE ".table($Q)." (".implode(", ",$o).")";}else$h=create_sql($Q,$_POST["auto_increment"],$Kh);set_utf8mb4($h);if($Kh&&$h){if($Kh=="DROP+CREATE"||$ee==1)echo"DROP ".($ee==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($ee==1)$h=remove_definer($h);echo"$h;\n\n";}}}function
dumpData($Q,$Kh,$G){global$f,$x;$Ge=($x=="sqlite"?0:1048576);if($Kh){if($_POST["format"]=="sql"){if($Kh=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$o=fields($Q);}$H=$f->query($G,1);if($H){$Xd="";$Wa="";$je=array();$Mh="";$Wc=($Q!=''?'fetch_assoc':'fetch_row');while($J=$H->$Wc()){if(!$je){$Wi=array();foreach($J
as$X){$n=$H->fetch_field();$je[]=$n->name;$y=idf_escape($n->name);$Wi[]="$y = VALUES($y)";}$Mh=($Kh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Wi):"").";\n";}if($_POST["format"]!="sql"){if($Kh=="table"){dump_csv($je);$Kh="INSERT";}dump_csv($J);}else{if(!$Xd)$Xd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$je)).") VALUES";foreach($J
as$y=>$X){$n=$o[$y];$J[$y]=($X!==null?unconvert_field($n,preg_match(number_type(),$n["type"])&&!preg_match('~\[~',$n["full_type"])&&is_numeric($X)?$X:q(($X===false?0:$X))):"NULL");}$ah=($Ge?"\n":" ")."(".implode(",\t",$J).")";if(!$Wa)$Wa=$Xd.$ah;elseif(strlen($Wa)+4+strlen($ah)+strlen($Mh)<$Ge)$Wa.=",$ah";else{echo$Wa.$Mh;$Wa=$Xd.$ah;}}}if($Wa)echo$Wa.$Mh;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$f->error)."\n";}}function
dumpFilename($Hd){return
friendly_url($Hd!=""?$Hd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($Hd,$Ue=false){$Mf=$_POST["output"];$Oc=(preg_match('~sql~',$_POST["format"])?"sql":($Ue?"tar":"csv"));header("Content-Type: ".($Mf=="gz"?"application/x-gzip":($Oc=="tar"?"application/x-tar":($Oc=="sql"||$Mf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Mf=="gz")ob_start('ob_gzencode',1e6);return$Oc;}function
importServerPath(){return"adminer.sql";}function
homepage(){$A=[];if($_GET["ns"]==""&&support("database"))$A[]='<a href="'.h(ME).'database=">'.'Modifier la base de données'.'</a>';if(support("scheme"))$A[]="<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Modifier le schéma':'Créer un schéma')."</a>";if($_GET["ns"]!=="")$A[]='<a href="'.h(ME).'schema=">'.'Schéma de la base de données'.'</a>';if(support("privileges"))$A[]="<a href='".h(ME)."privileges='>".'Privilèges'."</a>";echo
generate_linksbar($A);return
true;}function
navigation($Te){global$ia,$x,$kc,$f;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
</h1>
';if($Te=="auth"){$Mf="";foreach((array)$_SESSION["pwds"]as$Yi=>$oh){foreach($oh
as$M=>$Ti){foreach($Ti
as$V=>$F){if($F!==null){$Wb=$_SESSION["db"][$Yi][$M][$V];foreach(($Wb?array_keys($Wb):array(""))as$k)$Mf.="<li><a href='".h(auth_url($Yi,$M,$V,$k))."'>($kc[$Yi]) ".h($V.($M!=""?"@".$this->serverName($M):"").($k!=""?" - $k":""))."</a>\n";}}}}if($Mf)echo"<ul id='logins'>\n$Mf</ul>\n".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");}else{$S=array();if($_GET["ns"]!==""&&!$Te&&DB!=""){$f->select_db(DB);$S=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.8.3");if(support("sql")){echo'<script',nonce(),'>
';if($S){$A=array();foreach($S
as$Q=>$T)$A[]=preg_quote($Q,'/');echo"var jushLinks = { $x: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$A).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$x;\n";}$nh=$f->server_info;echo'bodyLoad(\'',(is_object($f)?preg_replace('~^(\d\.?\d).*~s','\1',$nh):""),'\'',(preg_match('~MariaDB~',$nh)?", true":""),');
</script>
';}$this->databasesPrint($Te);$A=[];if(DB==""||!$Te){if(support("sql")){$A[]="<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".'Requête SQL'."</a>";$A[]="<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".'Importer'."</a>";}if(support("dump"))$A[]="<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Exporter'."</a>";}echo
generate_linksbar($A);if($_GET["ns"]!==""&&!$Te&&DB!=""){echo
generate_linksbar(['<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Créer une table'."</a>"]);if(!$S)echo"<p class='message'>".'Aucune table.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Te){global$b,$f;$j=$this->databases();if(DB&&$j&&!in_array(DB,$j))array_unshift($j,DB);echo'<form action="">
',"<table id='dbs'><tr><td width=1>";hidden_fields_get();$Ub=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<label title='".'base de données'."' for='menu_db'>".'BD'."</label>:</td><td>".($j?"<select name='db' id='menu_db'>".optionlist(array(""=>"")+$j,DB)."</select>$Ub":"<input name='db' id='menu_db' value='".h(DB)."' autocapitalize='off'>\n"),"</td></tr>";if(support("scheme")){if($Te!="db"&&DB!=""&&$f->select_db(DB)){echo"<tr><td><label for='menu_ns'>".'Schéma'.":</label></td>","<td><select name='ns' id='menu_ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Ub";if($_GET["ns"]!="")set_schema($_GET["ns"]);echo"</td></tr>";}}echo"<tr".($j?" class='hidden'":"")."><td colspan=2><input type='submit' value='".'Utiliser'."'></td></tr>\n","</table>";foreach(array("import","sql","schema","dump","privileges")as$X){if(isset($_GET[$X])){echo"<input type='hidden' name='$X' value=''>";break;}}}function
tablesPrint($S){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$Q=>$O){$D=$this->tableName($O);if($D!=""){echo'<li><a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select")." title='".'Afficher les données'."'>".'select'."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"],$_GET["select"])),(is_view($O)?"view":"structure"))." title='".'Afficher la structure'."'>$D</a>":"<span>$D</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);$kc=array("server"=>"MySQL")+$kc;if(!defined("DRIVER")){define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$F="",$i=null,$gg=null,$wh=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Fd,$gg)=explode(":",$M,2);$Eh=$b->connectSsl();if($Eh)$this->ssl_set($Eh['key'],$Eh['cert'],$Eh['ca'],'','');$I=@$this->real_connect(($M!=""?$Fd:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$i,(is_numeric($gg)?$gg:ini_get("mysqli.default_port")),(!is_numeric($gg)?$gg:$wh),($Eh?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$I;}function
set_charset($ab){if(parent::set_charset($ab))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $ab");}function
result($G,$n=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch_array();return$J[$n];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Désactiver %s ou activer %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($ab){if(function_exists('mysql_set_charset')){if(mysql_set_charset($ab,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $ab");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($i){return
mysql_select_db($i,$this->_link);}function
query($G,$Ei=false){$H=@($Ei?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$n=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$n);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$F){global$b;$_f=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Eh=$b->connectSsl();if($Eh){if(!empty($Eh['key']))$_f[PDO::MYSQL_ATTR_SSL_KEY]=$Eh['key'];if(!empty($Eh['cert']))$_f[PDO::MYSQL_ATTR_SSL_CERT]=$Eh['cert'];if(!empty($Eh['ca']))$_f[PDO::MYSQL_ATTR_SSL_CA]=$Eh['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$F,$_f);return
true;}function
set_charset($ab){$this->query("SET NAMES $ab");}function
select_db($i){return$this->query("USE ".idf_escape($i));}function
query($G,$Ei=false){$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,!$Ei);return
parent::query($G,$Ei);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$K,$ng){$e=array_keys(reset($K));$lg="INSERT INTO ".table($Q)." (".implode(", ",$e).") VALUES\n";$Wi=array();foreach($e
as$y)$Wi[$y]="$y = VALUES($y)";$Mh="\nON DUPLICATE KEY UPDATE ".implode(", ",$Wi);$Wi=array();$ve=0;foreach($K
as$N){$Y="(".implode(", ",$N).")";if($Wi&&(strlen($lg)+$ve+strlen($Y)+strlen($Mh)>1e6)){if(!queries($lg.implode(",\n",$Wi).$Mh))return
false;$Wi=array();$ve=0;}$Wi[]=$Y;$ve+=strlen($Y)+2;}return
queries($lg.implode(",\n",$Wi).$Mh);}function
slowQuery($G,$hi){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$hi FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$C))return"$C[1] /*+ MAX_EXECUTION_TIME(".($hi*1000).") */ $C[2]";}}function
convertSearch($u,$X,$n){return(preg_match('~char|text|enum|set~',$n["type"])&&!preg_match("~^utf8~",$n["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($D){$Be=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Be?"information-schema-$D-table/":str_replace("_","-",$D)."-table.html"));if(DB=="mysql")return($Be?"mysql$D-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Jh;$f=new
Min_DB;$Mb=$b->credentials();if($f->connect($Mb[0],$Mb[1],$Mb[2])){$f->set_charset(charset($f));$f->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$f)){$Jh['Chaînes'][]="json";$U["json"]=4294967295;}return$f;}$I=$f->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($ah=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$ah;return$I;}function
get_databases($fd){$I=get_session("dbs");if($I===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$I=($fd?slow_query($G):get_vals($G));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($G,$Z,$z,$jf=0,$kh=" "){return" $G$Z".($z!==null?$kh."LIMIT $z".($jf?" OFFSET $jf":""):"");}function
limit1($Q,$G,$Z,$kh="\n"){return
limit($G,$Z,1,0,$kh);}function
db_collation($k,$nb){global$f;$I=null;$h=$f->result("SHOW CREATE DATABASE ".idf_escape($k),1);if(preg_match('~ COLLATE ([^ ]+)~',$h,$C))$I=$C[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$h,$C))$I=$nb[$C[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$f;return$f->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($j){$I=array();foreach($j
as$k)$I[$k]=count(get_vals("SHOW TABLES IN ".idf_escape($k)));return$I;}function
table_status($D="",$Uc=false){$I=array();foreach(get_rows($Uc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$J){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$J["Type"],$C);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$C[1],"length"=>$C[2],"unsigned"=>ltrim($C[3].$C[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$C[1])?(preg_match('~text~',$C[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$J["Default"])):$J["Default"]):null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$C)?$C[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$J["Extra"]),);}return$I;}function
indexes($Q,$g=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$g)as$J){$D=$J["Key_name"];$I[$D]["type"]=($D=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$D]["columns"][]=$J["Column_name"];$I[$D]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$D]["descs"][]=null;}return$I;}function
foreign_keys($Q){global$f,$rf;static$cg='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$I=array();$Kb=$f->result("SHOW CREATE TABLE ".table($Q),1);if($Kb){preg_match_all("~CONSTRAINT ($cg) FOREIGN KEY ?\\(((?:$cg,? ?)+)\\) REFERENCES ($cg)(?:\\.($cg))? \\(((?:$cg,? ?)+)\\)(?: ON DELETE ($rf))?(?: ON UPDATE ($rf))?~",$Kb,$Ee,PREG_SET_ORDER);foreach($Ee
as$C){preg_match_all("~$cg~",$C[2],$yh);preg_match_all("~$cg~",$C[5],$Zh);$I[idf_unescape($C[1])]=array("db"=>idf_unescape($C[4]!=""?$C[3]:$C[4]),"table"=>idf_unescape($C[4]!=""?$C[4]:$C[3]),"source"=>array_map('idf_unescape',$yh[0]),"target"=>array_map('idf_unescape',$Zh[0]),"on_delete"=>($C[6]?$C[6]:"RESTRICT"),"on_update"=>($C[7]?$C[7]:"RESTRICT"),);}}return$I;}function
view($D){global$f;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$f->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$y=>$X)asort($I[$y]);return$I;}function
information_schema($k){return(min_version(5)&&$k=="information_schema")||(min_version(5.5)&&$k=="performance_schema");}function
error(){global$f;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$f->error));}function
create_database($k,$mb){return
queries("CREATE DATABASE ".idf_escape($k).($mb?" COLLATE ".q($mb):""));}function
drop_databases($j){$I=apply_queries("DROP DATABASE",$j,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($D,$mb){$I=false;if(create_database($D,$mb)){$S=array();$bj=array();foreach(tables_list()as$Q=>$T){if($T=='VIEW')$bj[]=$Q;else$S[]=$Q;}$I=(!$S&&!$bj)||move_tables($S,$bj,$D);drop_databases($I?array(DB):array());}return$I;}function
auto_increment(){$Ma=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Ma="";break;}if($v["type"]=="PRIMARY")$Ma=" UNIQUE";}}return" AUTO_INCREMENT$Ma";}function
alter_table($Q,$D,$o,$hd,$tb,$_c,$mb,$La,$Wf){$c=array();foreach($o
as$n)$c[]=($n[1]?($Q!=""?($n[0]!=""?"CHANGE ".idf_escape($n[0]):"ADD"):" ")." ".implode($n[1]).($Q!=""?$n[2]:""):"DROP ".idf_escape($n[0]));$c=array_merge($c,$hd);$O=($tb!==null?" COMMENT=".q($tb):"").($_c?" ENGINE=".q($_c):"").($mb?" COLLATE ".q($mb):"").($La!=""?" AUTO_INCREMENT=$La":"");if($Q=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)$O$Wf");if($Q!=$D)$c[]="RENAME TO ".table($D);if($O)$c[]=ltrim($O);return($c||$Wf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Wf):true);}function
alter_indexes($Q,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($bj){return
queries("DROP VIEW ".implode(", ",array_map('table',$bj)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$bj,$Zh){global$f;$Mg=array();foreach($S
as$Q)$Mg[]=table($Q)." TO ".idf_escape($Zh).".".table($Q);if(!$Mg||queries("RENAME TABLE ".implode(", ",$Mg))){$bc=array();foreach($bj
as$Q)$bc[table($Q)]=view($Q);$f->select_db($Zh);$k=idf_escape(DB);foreach($bc
as$D=>$aj){if(!queries("CREATE VIEW $D AS ".str_replace(" $k."," ",$aj["select"]))||!queries("DROP VIEW $k.$D"))return
false;}return
true;}return
false;}function
copy_tables($S,$bj,$Zh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$D=($Zh==DB?table("copy_$Q"):idf_escape($Zh).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $D"))||!queries("CREATE TABLE $D LIKE ".table($Q))||!queries("INSERT INTO $D SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J){$zi=$J["Trigger"];if(!queries("CREATE TRIGGER ".($Zh==DB?idf_escape("copy_$zi"):idf_escape($Zh).".".idf_escape($zi))." $J[Timing] $J[Event] ON $D FOR EACH ROW\n$J[Statement];"))return
false;}}foreach($bj
as$Q){$D=($Zh==DB?table("copy_$Q"):idf_escape($Zh).".".table($Q));$aj=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $D"))||!queries("CREATE VIEW $D AS $aj[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($K);}function
triggers($Q){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$T){global$f,$Bc,$Vd,$U;$Ca=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$zh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Di="((".implode("|",array_merge(array_keys($U),$Ca)).")\\b(?:\\s*\\(((?:[^'\")]|$Bc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$cg="$zh*(".($T=="FUNCTION"?"":$Vd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Di";$h=$f->result("SHOW CREATE $T ".idf_escape($D),2);preg_match("~\\(((?:$cg\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$Di\\s+":"")."(.*)~is",$h,$C);$o=array();preg_match_all("~$cg\\s*,?~is",$C[1],$Ee,PREG_SET_ORDER);foreach($Ee
as$Qf)$o[]=array("field"=>str_replace("``","`",$Qf[2]).$Qf[3],"type"=>strtolower($Qf[5]),"length"=>preg_replace_callback("~$Bc~s",'normalize_enum',$Qf[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Qf[8] $Qf[7]"))),"null"=>1,"full_type"=>$Qf[4],"inout"=>strtoupper($Qf[1]),"collation"=>strtolower($Qf[9]),);if($T!="FUNCTION")return
array("fields"=>$o,"definition"=>$C[11]);return
array("fields"=>$o,"returns"=>array("type"=>$C[12],"length"=>$C[13],"unsigned"=>$C[15],"collation"=>$C[16]),"definition"=>$C[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($D,$J){return
idf_escape($D);}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ID()");}function
explain($f,$G){return$f->query("EXPLAIN ".(min_version(5.1)&&!min_version(5.7)?"PARTITIONS ":"").$G);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($ch,$g=null){return
true;}function
create_sql($Q,$La,$Kh){global$f;$I=$f->result("SHOW CREATE TABLE ".table($Q),1);if(!$La)$I=preg_replace('~ AUTO_INCREMENT=\d+~','',$I);return$I;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($i){return"USE ".idf_escape($i);}function
trigger_sql($Q){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($n){if(preg_match("~binary~",$n["type"]))return"HEX(".idf_escape($n["field"]).")";if($n["type"]=="bit")return"BIN(".idf_escape($n["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$n["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($n["field"]).")";}function
unconvert_field($n,$I){if(preg_match("~binary~",$n["type"]))$I="UNHEX($I)";if($n["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$n["type"])){$lg=(min_version(8)?"ST_":"");$I=$lg."GeomFromText($I, $lg"."SRID($n[field]))";}return$I;}function
support($Vc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$Vc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$f;return$f->result("SELECT @@max_connections");}function
driver_config(){$U=array();$Jh=array();foreach(array('Nombres'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date et heure'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Chaînes'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Listes'=>array("enum"=>65535,"set"=>64),'Binaires'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Géométrie'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}return
array('possible_drivers'=>array("MySQLi","MySQL","PDO_MySQL"),'jush'=>"sql",'types'=>$U,'structured_types'=>$Jh,'unsigned'=>array("unsigned","zerofill","unsigned zerofill"),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("char_length","date","distinct","from_unixtime","unix_timestamp","lower","round","floor","ceil","sec_to_time","time_to_sec","upper"),'operator_regexp'=>'REGEXP','grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",)),);}}$xb=driver_config();$kg=$xb['possible_drivers'];$x=$xb['jush'];$U=$xb['types'];$Jh=$xb['structured_types'];$Ki=$xb['unsigned'];$xf=$xb['operators'];$wf=isset($xb['operator_regexp'])&&in_array($xb['operator_regexp'],$xf)?$xb['operator_regexp']:null;$pd=$xb['functions'];$vd=$xb['grouping'];$sc=$xb['edit_functions'];if($b->operators===null){$b->operators=$xf;$b->operator_regexp=$wf;}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.8.3";function
page_header($ji,$m="",$Va=array(),$ki=""){global$ca,$ia,$b,$kc,$x;page_headers();if(is_ajax()&&$m){page_messages($m);exit;}$li=$ji.($ki!=""?": $ki":"");$mi=strip_tags($li.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="fr" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$mi,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.8.3"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.8.3");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.3"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.3"),'">
';foreach($b->css()as$Ob){echo'<link rel="stylesheet" type="text/css" href="',h($Ob),'">
';}}echo'
<body class="ltr nojs">
';$p=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($p)&&filemtime($p)+86400>time()){$Zi=unserialize(file_get_contents($p));$wg="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Zi["version"],base64_decode($Zi["signature"]),$wg)==1)$_COOKIE["adminer_version"]=$Zi["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('Vous êtes hors ligne.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Va!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$kc[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=$b->serverName(SERVER);$M=($M!=""?$M:'Serveur');if($Va===false)echo"$M\n";else{echo"<a href='".h($_)."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Va)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Va)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Va
as$y=>$X){$dc=(is_array($X)?$X[1]:h($X));if($dc!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$dc</a> &raquo; ";}}echo"$ji\n";}}echo"<h2>$li</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($m);$j=&get_session("dbs");if(DB!=""&&$j&&!in_array(DB,$j,true))$j=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Nb){$Ad=array();foreach($Nb
as$y=>$X)$Ad[]="$y $X";header("Content-Security-Policy: ".implode("; ",$Ad));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$df;if(!$df)$df=base64_encode(rand_string());return$df;}function
page_messages($m){$Mi=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Qe=$_SESSION["messages"][$Mi];if($Qe){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Qe)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Mi]);}if($m)echo"<div class='error'>$m</div>\n";}function
page_footer($Te=""){global$b,$qi;echo'</div>

';if($Te!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Déconnexion" id="logout">
<input type="hidden" name="token" value="',$qi,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Te);echo'</div>
',script("setupSubmitHighlight(document);"),script("setupCopyToClipboard(document);"),"</body>\n</html>";}function
int32($We){while($We>=2147483648)$We-=4294967296;while($We<=-2147483649)$We+=4294967296;return(int)$We;}function
long2str($W,$dj){$ah='';foreach($W
as$X)$ah.=pack('V',$X);if($dj)return
substr($ah,0,end($W));return$ah;}function
str2long($ah,$dj){$W=array_values(unpack('V*',str_pad($ah,4*ceil(strlen($ah)/4),"\0")));if($dj)$W[]=strlen($ah);return$W;}function
xxtea_mx($pj,$oj,$Nh,$he){return
int32((($pj>>5&0x7FFFFFF)^$oj<<2)+(($oj>>3&0x1FFFFFFF)^$pj<<4))^int32(($Nh^$oj)+($he^$pj));}function
encrypt_string($Ih,$y){if($Ih=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Ih,true);$We=count($W)-1;$pj=$W[$We];$oj=$W[0];$xg=floor(6+52/($We+1));$Nh=0;while($xg-->0){$Nh=int32($Nh+0x9E3779B9);$rc=$Nh>>2&3;for($Of=0;$Of<$We;$Of++){$oj=$W[$Of+1];$Ve=xxtea_mx($pj,$oj,$Nh,$y[$Of&3^$rc]);$pj=int32($W[$Of]+$Ve);$W[$Of]=$pj;}$oj=$W[0];$Ve=xxtea_mx($pj,$oj,$Nh,$y[$Of&3^$rc]);$pj=int32($W[$We]+$Ve);$W[$We]=$pj;}return
long2str($W,false);}function
decrypt_string($Ih,$y){if($Ih=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Ih,false);$We=count($W)-1;$pj=$W[$We];$oj=$W[0];$xg=floor(6+52/($We+1));$Nh=int32($xg*0x9E3779B9);while($Nh){$rc=$Nh>>2&3;for($Of=$We;$Of>0;$Of--){$pj=$W[$Of-1];$Ve=xxtea_mx($pj,$oj,$Nh,$y[$Of&3^$rc]);$oj=int32($W[$Of]-$Ve);$W[$Of]=$oj;}$pj=$W[$We];$Ve=xxtea_mx($pj,$oj,$Nh,$y[$Of&3^$rc]);$oj=int32($W[0]-$Ve);$W[0]=$oj;$Nh=int32($Nh-0x9E3779B9);}return
long2str($W,true);}$f='';$_d=$_SESSION["token"];if(!$_d)$_SESSION["token"]=rand(1,1e6);$qi=get_token();$eg=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$eg[$y]=$X;}}function
add_invalid_login(){global$b;$nd=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$nd)return;$ae=unserialize(stream_get_contents($nd));$gi=time();if($ae){foreach($ae
as$be=>$X){if($X[0]<$gi)unset($ae[$be]);}}$Zd=&$ae[$b->bruteForceKey()];if(!$Zd)$Zd=array($gi+30*60,0);$Zd[1]++;file_write_unlock($nd,serialize($ae));}function
check_invalid_login(){global$b;$ae=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Zd=($ae?$ae[$b->bruteForceKey()]:array());$cf=($Zd[1]>29?$Zd[0]-time():0);if($cf>0)auth_error(lang(array('Trop de connexions échouées, essayez à nouveau dans %d minute.','Trop de connexions échouées, essayez à nouveau dans %d minutes.'),ceil($cf/60)));}$Ja=$_POST["auth"];if($Ja){session_regenerate_id();$Yi=$Ja["driver"];$M=$Ja["server"];$V=$Ja["username"];$F=(string)$Ja["password"];$k=$Ja["db"];set_password($Yi,$M,$V,$F);$_SESSION["db"][$Yi][$M][$V][$k]=true;if($Ja["permanent"]){$y=base64_encode($Yi)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($k);$qg=$b->permanentLogin(true);$eg[$y]="$y:".base64_encode($qg?encrypt_string($F,$qg):"");cookie("adminer_permanent",implode(" ",$eg));}if(count($_POST)==1||DRIVER!=$Yi||SERVER!=$M||$_GET["username"]!==$V||DB!=$k)redirect(auth_url($Yi,$M,$V,$k));}elseif($_POST["logout"]&&(!$_d||verify_token())){foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Au revoir !'.'.');}elseif($eg&&!$_SESSION["pwds"]){session_regenerate_id();$qg=$b->permanentLogin();foreach($eg
as$y=>$X){list(,$gb)=explode(":",$X);list($Yi,$M,$V,$k)=array_map('base64_decode',explode("-",$y));set_password($Yi,$M,$V,decrypt_string(base64_decode($gb),$qg));$_SESSION["db"][$Yi][$M][$V][$k]=true;}}function
unset_permanent(){global$eg;foreach($eg
as$y=>$X){list($Yi,$M,$V,$k)=array_map('base64_decode',explode("-",$y));if($Yi==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$k==DB)unset($eg[$y]);}cookie("adminer_permanent",implode(" ",$eg));}function
auth_error($m){global$b,$_d;$ph=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$ph]||$_GET[$ph])&&!$_d)$m='Session expirée, veuillez vous authentifier à nouveau.';else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$m.=($m?'<br>':'').sprintf('Le mot de passe a expiré. <a href="https://www.adminer.org/en/extension/"%s>Implémentez</a> la méthode %s afin de le rendre permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$ph]&&$_GET[$ph]&&ini_bool("session.use_only_cookies"))$m='Veuillez activer les sessions.';$Rf=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Rf["lifetime"]);page_header('Authentification',$m,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'Cette action sera exécutée après s\'être connecté avec les mêmes données de connexion.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('Extension introuvable',sprintf('Aucune des extensions PHP supportées (%s) n\'est disponible.',implode(", ",$kg)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Fd,$gg)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$gg,$C)&&($C[1]<1024||$C[1]>65535))auth_error('La connexion aux ports privilégiés n\'est pas autorisée.');check_invalid_login();$f=connect();$l=new
Min_Driver($f);}$ze=null;if(!is_object($f)||($ze=$b->login($_GET["username"],get_password()))!==true){$m=(is_string($f)?h($f):(is_string($ze)?$ze:'Authentification échouée.'));auth_error($m.(preg_match('~^ | $~',get_password())?'<br>'.'Il y a un espace dans le mot de passe entré qui pourrait en être la cause.':''));}if($_POST["logout"]&&$_d&&!verify_token()){page_header('Déconnexion','Token CSRF invalide. Veuillez renvoyer le formulaire.');page_footer("db");exit;}if($Ja&&$_POST["token"])$_POST["token"]=$qi;$m='';if($_POST){if(!verify_token()){$Ud="max_input_vars";$Ke=ini_get($Ud);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Ke||$X<$Ke)){$Ud=$y;$Ke=$X;}}}$m=(!$_POST["token"]&&$Ke?sprintf('Le nombre maximum de champs est dépassé. Veuillez augmenter %s.',"'$Ud'"):'Token CSRF invalide. Veuillez renvoyer le formulaire.'.' '.'Si vous n\'avez pas envoyé cette requête depuis Adminer, alors fermez cette page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$m=sprintf('Données POST trop grandes. Réduisez la taille des données ou augmentez la valeur de %s dans la configuration de PHP.',"'post_max_size'");if(isset($_GET["sql"]))$m.=' '.'Vous pouvez uploader un gros fichier SQL par FTP et ensuite l\'importer depuis le serveur.';}function
select($H,$g=null,$Ef=array(),$z=0){global$x;$A=array();$w=array();$e=array();$Ta=array();$U=array();$I=array();odd('');for($s=0;(!$z||$s<$z)&&($J=$H->fetch_row());$s++){if(!$s){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($ge=0;$ge<count($J);$ge++){$n=$H->fetch_field();$D=$n->name;$Df=$n->orgtable;$Cf=$n->orgname;$I[$n->table]=$Df;if($Ef&&$x=="sql")$A[$ge]=($D=="table"?"table=":($D=="possible_keys"?"indexes=":null));elseif($Df!=""){if(!isset($w[$Df])){$w[$Df]=array();foreach(indexes($Df,$g)as$v){if($v["type"]=="PRIMARY"){$w[$Df]=array_flip($v["columns"]);break;}}$e[$Df]=$w[$Df];}if(isset($e[$Df][$Cf])){unset($e[$Df][$Cf]);$w[$Df][$Cf]=$ge;$A[$ge]=$Df;}}if($n->charsetnr==63)$Ta[$ge]=true;$U[$ge]=$n->type;echo"<th".($Df!=""||$n->name!=$Cf?" title='".h(($Df!=""?"$Df.":"").$Cf)."'":"").">".h($D).($Ef?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($D),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$y=>$X){$_="";if(isset($A[$y])&&!$e[$A[$y]]){if($Ef&&$x=="sql"){$Q=$J[array_search("table=",$A)];$_=ME.$A[$y].urlencode($Ef[$Q]!=""?$Ef[$Q]:$Q);}else{$_=ME."edit=".urlencode($A[$y]);foreach($w[$A[$y]]as$kb=>$ge)$_.="&where".urlencode("[".bracket_escape($kb)."]")."=".urlencode($J[$ge]);}}elseif(is_url($X))$_=$X;if($X===null)$X="<i>NULL</i>";elseif($Ta[$y]&&!is_utf8($X))$X="<i>".lang(array('%d octet','%d octets'),strlen($X))."</i>";else{$X=h($X);if($U[$y]==254)$X="<code>$X</code>";}if($_)$X="<a href='".h($_)."'".(is_url($_)?target_blank():'').">$X</a>";echo"<td>$X";}}echo($s?"</table>\n</div>":"<p class='message'>".'Aucun résultat.')."\n";return$I;}function
referencable_primary($ih){$I=array();foreach(table_status('',true)as$Rh=>$Q){if($Rh!=$ih&&fk_support($Q)){foreach(fields($Rh)as$n){if($n["primary"]){if($I[$Rh]){unset($I[$Rh]);break;}$I[$Rh]=$n;}}}}return$I;}function
adminer_settings(){parse_str($_COOKIE["adminer_settings"],$rh);return$rh;}function
adminer_setting($y){$rh=adminer_settings();return$rh[$y];}function
set_adminer_settings($rh){return
cookie("adminer_settings",http_build_query($rh+adminer_settings()));}function
textarea($D,$Y,$K=10,$pb=80){global$x;echo"<textarea name='".h($D)."' rows='$K' cols='$pb' class='sqlarea jush-$x' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($y,$n,$nb,$jd=array(),$Rc=array()){global$Jh,$U,$Ki,$rf;$T=$n["type"];echo'<td><select name="',h($y),'[type]" class="type" aria-labelledby="label-type">';if($T&&!isset($U[$T])&&!isset($jd[$T])&&!in_array($T,$Rc))$Rc[]=$T;if($jd)$Jh['Clés étrangères']=$jd;echo
optionlist(array_merge($Rc,$Jh),$T),'</select><td><input name="',h($y),'[length]" value="',h($n["length"]),'" size="3"',(!$n["length"]&&preg_match('~var(char|binary)$~',$T)?" class='required'":"");echo' aria-labelledby="label-length"><td class="options">',"<select name='".h($y)."[collation]'".(preg_match('~(char|text|enum|set)$~',$T)?"":" class='hidden'").'><option value="">('.'interclassement'.')'.optionlist($nb,$n["collation"]).'</select>',($Ki?"<select name='".h($y)."[unsigned]'".(!$T||preg_match(number_type(),$T)?"":" class='hidden'").'><option>'.optionlist($Ki,$n["unsigned"]).'</select>':''),(isset($n['on_update'])?"<select name='".h($y)."[on_update]'".(preg_match('~timestamp|datetime~',$T)?"":" class='hidden'").'>'.optionlist(array(""=>"(".'ON UPDATE'.")","CURRENT_TIMESTAMP"),(preg_match('~^CURRENT_TIMESTAMP~i',$n["on_update"])?"CURRENT_TIMESTAMP":$n["on_update"])).'</select>':''),($jd?"<select name='".h($y)."[on_delete]'".(preg_match("~`~",$T)?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist(explode("|",$rf),$n["on_delete"])."</select> ":" ");}function
process_length($ve){global$Bc;return(preg_match("~^\\s*\\(?\\s*$Bc(?:\\s*,\\s*$Bc)*+\\s*\\)?\\s*\$~",$ve)&&preg_match_all("~$Bc~",$ve,$Ee)?"(".implode(",",$Ee[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$ve)));}function
process_type($n,$lb="COLLATE"){global$Ki;return" $n[type]".process_length($n["length"]).(preg_match(number_type(),$n["type"])&&in_array($n["unsigned"],$Ki)?" $n[unsigned]":"").(preg_match('~char|text|enum|set~',$n["type"])&&$n["collation"]?" $lb ".q($n["collation"]):"");}function
process_field($n,$Ci){return
array(idf_escape(trim($n["field"])),process_type($Ci),($n["null"]?" NULL":" NOT NULL"),default_value($n),(preg_match('~timestamp|datetime~',$n["type"])&&$n["on_update"]?" ON UPDATE $n[on_update]":""),(support("comment")&&$n["comment"]!=""?" COMMENT ".q($n["comment"]):""),($n["auto_increment"]?auto_increment():null),);}function
default_value($n){$Yb=$n["default"];return($Yb===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$n["type"])||preg_match('~^(?![a-z])~i',$Yb)?q($Yb):$Yb));}function
type_class($T){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$y=>$X){if(preg_match("~$y|$X~",$T))return" class='$y'";}}function
edit_fields($o,$nb,$T="TABLE",$jd=array()){global$Vd;$o=array_values($o);$Zb=(($_POST?$_POST["defaults"]:adminer_setting("defaults"))?"":" class='hidden'");$ub=(($_POST?$_POST["comments"]:adminer_setting("comments"))?"":" class='hidden'");echo'<thead><tr>
';if($T=="PROCEDURE"){echo'<td>';}echo'<th id="label-name">',($T=="TABLE"?'Nom de la colonne':'Nom du paramètre'),'<td id="label-type">Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">Longueur
<td>','Options';if($T=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="Incrément automatique">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default"',$Zb,'>Valeur par défaut
',(support("comment")?"<td id='label-comment'$ub>".'Commentaire':"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($o))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.3")."' alt='+' title='".'Ajouter le prochain'."'>".script("row_count = ".count($o).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($o
as$s=>$n){$s++;$Ff=$n[($_POST?"orig":"field")];$hc=(isset($_POST["add"][$s-1])||(isset($n["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$Ff=="");echo'<tr',($hc?"":" style='display: none;'"),'>
',($T=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$Vd),$n["inout"]):""),'<th>';if($hc){echo'<input name="fields[',$s,'][field]" value="',h($n["field"]),'" data-maxlength="64" autocapitalize="off" aria-labelledby="label-name">';}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($Ff),'">';edit_type("fields[$s]",$n,$nb,$jd);if($T=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$n["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($n["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td',$Zb,'>',checkbox("fields[$s][has_default]",1,$n["has_default"],"","","","label-default"),'<input name="fields[',$s,'][default]" value="',h($n["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td$ub><input name='fields[$s][comment]' value='".h($n["comment"])."' data-maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.3")."' alt='+' title='".'Ajouter le prochain'."'> "."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.8.3")."' alt='↑' title='".'Déplacer vers le haut'."'> "."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.8.3")."' alt='↓' title='".'Déplacer vers le bas'."'> ":""),($Ff==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.8.3")."' alt='x' title='".'Effacer'."'>":"");}}function
process_fields(&$o){$jf=0;if($_POST["up"]){$pe=0;foreach($o
as$y=>$n){if(key($_POST["up"])==$y){unset($o[$y]);array_splice($o,$pe,0,array($n));break;}if(isset($n["field"]))$pe=$jf;$jf++;}}elseif($_POST["down"]){$ld=false;foreach($o
as$y=>$n){if(isset($n["field"])&&$ld){unset($o[key($_POST["down"])]);array_splice($o,$jf,0,array($ld));break;}if(key($_POST["down"])==$y)$ld=$n;$jf++;}}elseif($_POST["add"]){$o=array_values($o);array_splice($o,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($C){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($C[0][0].$C[0][0],$C[0][0],substr($C[0],1,-1))),'\\'))."'";}function
grant($qd,$sg,$e,$qf){if(!$sg)return
true;if($sg==array("ALL PRIVILEGES","GRANT OPTION"))return($qd=="GRANT"?queries("$qd ALL PRIVILEGES$qf WITH GRANT OPTION"):queries("$qd ALL PRIVILEGES$qf")&&queries("$qd GRANT OPTION$qf"));return
queries("$qd ".preg_replace('~(GRANT OPTION)\([^)]*\)~','\1',implode("$e, ",$sg).$e).$qf);}function
drop_create($lc,$h,$mc,$di,$oc,$B,$Pe,$Ne,$Oe,$nf,$af){if($_POST["drop"])query_redirect($lc,$B,$Pe);elseif($nf=="")query_redirect($h,$B,$Oe);elseif($nf!=$af){$Lb=queries($h);queries_redirect($B,$Ne,$Lb&&queries($lc));if($Lb)queries($mc);}else
queries_redirect($B,$Ne,queries($di)&&queries($oc)&&queries($lc)&&queries($h));}function
create_trigger($qf,$J){global$x;$ii=" $J[Timing] $J[Event]".(preg_match('~ OF~',$J["Event"])?" $J[Of]":"");return"CREATE TRIGGER ".idf_escape($J["Trigger"]).($x=="mssql"?$qf.$ii:$ii.$qf).rtrim(" $J[Type]\n$J[Statement]",";").";";}function
create_routine($Wg,$J){global$Vd,$x;$N=array();$o=(array)$J["fields"];ksort($o);foreach($o
as$n){if($n["field"]!="")$N[]=(preg_match("~^($Vd)\$~",$n["inout"])?"$n[inout] ":"").idf_escape($n["field"]).process_type($n,"CHARACTER SET");}$ac=rtrim("\n$J[definition]",";");return"CREATE $Wg ".idf_escape(trim($J["name"]))." (".implode(", ",$N).")".(isset($_GET["function"])?" RETURNS".process_type($J["returns"],"CHARACTER SET"):"").($J["language"]?" LANGUAGE $J[language]":"").($x=="pgsql"?" AS ".q($ac):"$ac;");}function
remove_definer($G){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\1)',logged_user()).'`~','\1',$G);}function
format_foreign_key($q){global$rf;$k=$q["db"];$ef=$q["ns"];return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".($k!=""&&$k!=$_GET["db"]?idf_escape($k).".":"").($ef!=""&&$ef!=$_GET["ns"]?idf_escape($ef).".":"").table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($rf)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($rf)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($p,$ni){$I=pack("a100a8a8a8a12a12",$p,644,0,0,decoct($ni->size),decoct(time()));$fb=8*32;for($s=0;$s<strlen($I);$s++)$fb+=ord($I[$s]);$I.=sprintf("%06o",$fb)."\0 ";echo$I,str_repeat("\0",512-strlen($I));$ni->send();echo
str_repeat("\0",511-($ni->size+511)%512);}function
ini_bytes($Ud){$X=ini_get($Ud);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($bg,$ei="<sup>?</sup>"){global$x,$f;$nh=$f->server_info;$Zi=preg_replace('~^(\d\.?\d).*~s','\1',$nh);$Oi=array('sql'=>"https://dev.mysql.com/doc/refman/$Zi/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$Zi/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://www.oracle.com/pls/topic/lookup?ctx=db".preg_replace('~^.* (\d+)\.(\d+)\.\d+\.\d+\.\d+.*~s','\1\2',$nh)."&id=",);if(preg_match('~MariaDB~',$nh)){$Oi['sql']="https://mariadb.com/kb/en/library/";$bg['sql']=(isset($bg['mariadb'])?$bg['mariadb']:str_replace(".html","/",$bg['sql']));}return($bg[$x]?"<a href='".h($Oi[$x].$bg[$x])."'".target_blank().">$ei</a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($k){global$f;if(!$f->select_db($k))return"?";$I=0;foreach(table_status()as$R)$I+=$R["Data_length"]+$R["Index_length"];return
format_number($I);}function
set_utf8mb4($h){global$f;static$N=false;if(!$N&&preg_match('~\butf8mb4~i',$h)){$N=true;echo"SET NAMES ".charset($f).";\n\n";}}function
connect_error(){global$b,$f,$qi,$m,$kc;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header('Base de données'.": ".h(DB),'Base de données invalide.',true);}else{if($_POST["db"]&&!$m)queries_redirect(substr(ME,0,-1),'Les bases de données ont été supprimées.',drop_databases($_POST["db"]));page_header('Sélectionner la base de données',$m,false);$wa=['database'=>'Créer une base de données','privileges'=>'Privilèges','processlist'=>'Liste des processus','variables'=>'Variables','status'=>'Statut',];$A=[];foreach($wa
as$y=>$X){if(support($y))$A[]="<a href='".h(ME)."$y='>$X</a>";}echo
generate_linksbar($A),"<p>".sprintf('Version de %s : %s via l\'extension PHP %s',$kc[DRIVER],"<b>".h($f->server_info)."</b>","<b>$f->extension</b>")."\n","<p>".sprintf('Authentifié en tant que : %s',"<b>".h(logged_user())."</b>")."\n";$j=$b->databases();if($j){$dh=support("scheme");$nb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>":"")."<th>".'Base de données'." - <a href='".h(ME)."refresh=1'>".'Rafraîchir'."</a>"."<td>".'Interclassement'."<td>".'Tables'."<td>".'Taille'." - <a href='".h(ME)."dbsize=1'>".'Calcul'."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$j=($_GET["dbsize"]?count_tables($j):array_flip($j));foreach($j
as$k=>$S){$Vg=h(ME)."db=".urlencode($k);$t=h("Db-".$k);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$k,in_array($k,(array)$_POST["db"]),"","","",$t):""),"<th><a href='$Vg' id='$t'>".h($k)."</a>";$mb=h(db_collation($k,$nb));echo"<td>".(support("database")?"<a href='$Vg".($dh?"&amp;ns=":"")."&amp;database=' title='".'Modifier la base de données'."'>$mb</a>":$mb),"<td align='right'><a href='$Vg&amp;schema=' id='tables-".h($k)."' title='".'Schéma de la base de données'."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($k)."'>".($_GET["dbsize"]?db_size($k):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".'Sélectionnée(s)'." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".'Supprimer'."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$qi'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$f->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")){if(DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header('Schéma'.": ".h($_GET["ns"]),'Schéma invalide.',true);page_footer("ns");exit;}}}$rf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($Eb){$this->size+=strlen($Eb);fwrite($this->handler,$Eb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$Bc="'(?:''|[^'\\\\]|\\\\.)*'";$Vd="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$o=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$l->select($a,$L,array(where($_GET,$o)),$L);$J=($H?$H->fetch_row():array());echo$l->value($J[0],$o[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$o=fields($a);if(!$o)$m=error();$R=table_status1($a,true);$D=$b->tableName($R);page_header(($o&&is_view($R)?$R['Engine']=='materialized view'?'Vue matérialisée':'Vue':'Table').": ".($D!=""?$D:h($a)),$m);$b->selectLinks($R);$tb=$R["Comment"];if($tb!="")echo"<p class='nowrap'>".'Commentaire'.": ".h($tb)."\n";if($o)$b->tableStructurePrint($o);if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".'Index'."</h3>\n";$w=indexes($a);if($w)$b->tableIndexesPrint($w);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.'Modifier les index'."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".'Clés étrangères'."</h3>\n";$jd=foreign_keys($a);if($jd){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Cible'."<td>".'ON DELETE'."<td>".'ON UPDATE'."<td></thead>\n";foreach($jd
as$D=>$q){echo"<tr title='".h($D)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".h($q["on_delete"])."\n","<td>".h($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($D)).'">'.'Modifier'.'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.'Ajouter une clé étrangère'."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".'Déclencheurs'."</h3>\n";$Bi=triggers($a);if($Bi){echo"<table cellspacing='0'>\n";foreach($Bi
as$y=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($y)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($y))."'>".'Modifier'."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.'Ajouter un déclencheur'."</a>\n";}}elseif(isset($_GET["schema"])){page_header('Schéma de la base de données',"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Th=array();$Uh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$Ee,PREG_SET_ORDER);foreach($Ee
as$s=>$C){$Th[$C[1]]=array($C[2],$C[3]);$Uh[]="\n\t'".js_escape($C[1])."': [ $C[2], $C[3] ]";}$ri=0;$Qa=-1;$ch=array();$Hg=array();$te=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$hg=0;$ch[$Q]["fields"]=array();foreach(fields($Q)as$D=>$n){$hg+=1.25;$n["pos"]=$hg;$ch[$Q]["fields"][$D]=$n;}$ch[$Q]["pos"]=($Th[$Q]?$Th[$Q]:array($ri,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$re=$Qa;if($Th[$Q][1]||$Th[$X["table"]][1])$re=min(floatval($Th[$Q][1]),floatval($Th[$X["table"]][1]))-1;else$Qa-=.1;while($te[(string)$re])$re-=.0001;$ch[$Q]["references"][$X["table"]][(string)$re]=array($X["source"],$X["target"]);$Hg[$X["table"]][$Q][(string)$re]=$X["target"];$te[(string)$re]=true;}}$ri=max($ri,$ch[$Q]["pos"][0]+2.5+$hg);}echo'<div id="schema" style="height: ',$ri,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Uh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$ri,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($ch
as$D=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($D).'"><b>'.h($D)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($Q["fields"]as$n){$X='<span'.type_class($n["type"]).' title="'.h($n["full_type"].($n["null"]?" NULL":'')).'">'.h($n["field"]).'</span>';echo"<br>".($n["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$ai=>$Ig){foreach($Ig
as$re=>$Eg){$se=$re-$Th[$D][1];$s=0;foreach($Eg[0]as$yh)echo"\n<div class='references' title='".h($ai)."' id='refs$re-".($s++)."' style='left: $se"."em; top: ".$Q["fields"][$yh]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$se)."em;'></div></div>";}}foreach((array)$Hg[$D]as$ai=>$Ig){foreach($Ig
as$re=>$e){$se=$re-$Th[$D][1];$s=0;foreach($e
as$Zh)echo"\n<div class='references' title='".h($ai)."' id='refd$re-".($s++)."' style='left: $se"."em; top: ".$Q["fields"][$Zh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.8.3")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$se)."em;'></div></div>";}}echo"\n</div>\n";}foreach($ch
as$D=>$Q){foreach((array)$Q["references"]as$ai=>$Ig){foreach($Ig
as$re=>$Eg){$Se=$ri;$Ie=-10;foreach($Eg[0]as$y=>$yh){$ig=$Q["pos"][0]+$Q["fields"][$yh]["pos"];$jg=$ch[$ai]["pos"][0]+$ch[$ai]["fields"][$Eg[1][$y]]["pos"];$Se=min($Se,$ig,$jg);$Ie=max($Ie,$ig,$jg);}echo"<div class='references' id='refl$re' style='left: $re"."em; top: $Se"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Ie-$Se)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">Lien permanent</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$m){$Hb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$y)$Hb.="&$y=".urlencode($_POST[$y]);cookie("adminer_export",substr($Hb,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Oc=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$de=preg_match('~sql~',$_POST["format"]);if($de){echo"-- Adminer $ia ".$kc[DRIVER]." ".str_replace("\n"," ",$f->server_info)." dump\n\n";if($x=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
".($_POST["data_style"]?"SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$f->query("SET time_zone = '+00:00'");$f->query("SET sql_mode = ''");}}$Kh=$_POST["db_style"];$j=array(DB);if(DB==""){$j=$_POST["databases"];if(is_string($j))$j=explode("\n",rtrim(str_replace("\r","",$j),"\n"));}foreach((array)$j
as$k){$b->dumpDatabase($k);if($f->select_db($k)){if($de&&preg_match('~CREATE~',$Kh)&&($h=$f->result("SHOW CREATE DATABASE ".idf_escape($k),1))){set_utf8mb4($h);if($Kh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($k).";\n";echo"$h;\n";}if($de){if($Kh)echo
use_sql($k).";\n\n";$Lf="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Wg){foreach(get_rows("SHOW $Wg STATUS WHERE Db = ".q($k),null,"-- ")as$J){$h=remove_definer($f->result("SHOW CREATE $Wg ".idf_escape($J["Name"]),2));set_utf8mb4($h);$Lf.=($Kh!='DROP+CREATE'?"DROP $Wg IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$h;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$h=remove_definer($f->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3));set_utf8mb4($h);$Lf.=($Kh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$h;;\n\n";}}if($Lf)echo"DELIMITER ;;\n\n$Lf"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$bj=array();foreach(table_status('',true)as$D=>$R){$Q=(DB==""||in_array($D,(array)$_POST["tables"]));$Rb=(DB==""||in_array($D,(array)$_POST["data"]));if($Q||$Rb){if($Oc=="tar"){$ni=new
TmpFile;ob_start(array($ni,'write'),1e5);}$b->dumpTable($D,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$bj[]=$D;elseif($Rb){$o=fields($D);$b->dumpData($D,$_POST["data_style"],"SELECT *".convert_fields($o,$o)." FROM ".table($D));}if($de&&$_POST["triggers"]&&$Q&&($Bi=trigger_sql($D)))echo"\nDELIMITER ;;\n$Bi\nDELIMITER ;\n";if($Oc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$k/")."$D.csv",$ni);}elseif($de)echo"\n";}}if(function_exists('foreign_keys_sql')){foreach(table_status('',true)as$D=>$R){$Q=(DB==""||in_array($D,(array)$_POST["tables"]));if($Q&&!is_view($R))echo
foreign_keys_sql($D);}}foreach($bj
as$aj)$b->dumpTable($aj,$_POST["table_style"],1);if($Oc=="tar")echo
pack("x512");}}}if($de)echo"-- ".$f->result("SELECT NOW()")."\n";exit;}page_header('Exporter',$m,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
';$Vb=array('','USE','DROP+CREATE','CREATE');$Vh=array('','DROP+CREATE','CREATE');$Sb=array('','TRUNCATE+INSERT','INSERT');if($x=="sql")$Sb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$J);if(!$J)$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".'Sortie'."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".'Format'."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($x=="sqlite"?"":"<tr><th>".'Base de données'."<td>".html_select('db_style',$Vb,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],'Routines'):"").(support("event")?checkbox("events",1,$J["events"],'Évènements'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$Vh,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],'Incrément automatique').(support("trigger")?checkbox("triggers",1,$J["triggers"],'Déclencheurs'):""),"<tr><th>".'Données'."<td>".html_select('data_style',$Sb,$J["data_style"]),'</table>
<p><input type="submit" value="Exporter">
<input type="hidden" name="token" value="',$qi,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$mg=array();if(DB!=""){$db=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$db>".'Tables'."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".'Données'."<input type='checkbox' id='check-data'$db></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$bj="";$Wh=tables_list();foreach($Wh
as$D=>$T){$lg=preg_replace('~_.*~','',$D);$db=($a==""||$a==(substr($a,-1)=="%"?"$lg%":$D));$pg="<tr><td>".checkbox("tables[]",$D,$db,$D,"","block");if($T!==null&&!preg_match('~table~i',$T))$bj.="$pg\n";else
echo"$pg<td align='right'><label class='block'><span id='Rows-".h($D)."'></span>".checkbox("data[]",$D,$db)."</label>\n";$mg[$lg]++;}echo$bj;if($Wh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".'Base de données'."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$j=$b->databases();if($j){foreach($j
as$k){if(!information_schema($k)){$lg=preg_replace('~_.*~','',$k);echo"<tr><td>".checkbox("databases[]",$k,$a==""||$a=="$lg%",$k,"","block")."\n";$mg[$lg]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$bd=true;foreach($mg
as$y=>$X){if($y!=""&&$X>1){echo($bd?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$y%")."'>".h($y)."</a>";$bd=false;}}}elseif(isset($_GET["privileges"])){page_header('Privilèges');echo'<p class="links"><a href="'.h(ME).'user=">'.'Créer un utilisateur'."</a>";$H=$f->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$qd=$H;if(!$H)$H=$f->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($qd?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'Utilisateur'."<th>".'Serveur'."<th></thead>\n";while($J=$H->fetch_assoc())echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.'Modifier'."</a>\n";if(!$qd||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".'Modifier'."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$m&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$Dd=&get_session("queries");$Cd=&$Dd[DB];if(!$m&&$_POST["clear"]){$Cd=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?'Importer':'Requête SQL'),$m);if(!$m&&$_POST){$nd=false;if(!isset($_GET["import"]))$G=$_POST["query"];elseif($_POST["webfile"]){$Bh=$b->importServerPath();$nd=@fopen((file_exists($Bh)?$Bh:"compress.zlib://$Bh.gz"),"rb");$G=($nd?fread($nd,1e6):false);}else$G=get_file("sql_file",true);if(is_string($G)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));if($G!=""&&strlen($G)<1e6){$xg=$G.(preg_match("~;[ \t\r\n]*\$~",$G)?"":";");if(!$Cd||reset(end($Cd))!=$xg){restart_session();$Cd[]=array($xg,time());set_session("queries",$Dd);stop_session();}}$zh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$cc=";";$jf=0;$zc=true;$g=connect();if(is_object($g)&&DB!=""){$g->select_db(DB);if($_GET["ns"]!="")set_schema($_GET["ns"],$g);}$sb=0;$Dc=array();$Sf='[\'"'.($x=="sql"?'`#':($x=="sqlite"?'`[':($x=="mssql"?'[':''))).']|/\*|-- |$'.($x=="pgsql"?'|\$[^$]*\$':'');$si=microtime(true);parse_str($_COOKIE["adminer_export"],$ya);$qc=$b->dumpFormat();unset($qc["sql"]);while($G!=""){if(!$jf&&preg_match("~^$zh*+DELIMITER\\s+(\\S+)~i",$G,$C)){$cc=$C[1];$G=substr($G,strlen($C[0]));}else{preg_match('('.preg_quote($cc)."\\s*|$Sf)",$G,$C,PREG_OFFSET_CAPTURE,$jf);list($ld,$hg)=$C[0];if(!$ld&&$nd&&!feof($nd))$G.=fread($nd,1e5);else{if(!$ld&&rtrim($G)=="")break;$jf=$hg+strlen($ld);if($ld&&rtrim($ld)!=$cc){while(preg_match('('.($ld=='/*'?'\*/':($ld=='['?']':(preg_match('~^-- |^#~',$ld)?"\n":preg_quote($ld)."|\\\\."))).'|$)s',$G,$C,PREG_OFFSET_CAPTURE,$jf)){$ah=$C[0][0];if(!$ah&&$nd&&!feof($nd))$G.=fread($nd,1e5);else{$jf=$C[0][1]+strlen($ah);if($ah[0]!="\\")break;}}}else{$zc=false;$xg=substr($G,0,$hg);$sb++;$pg="<pre id='sql-$sb'><code class='jush-$x'>".$b->sqlCommandQuery($xg)."</code></pre>\n";$pg.=generate_linksbar(["<a href='#' class='copy-to-clipboard'>".'Copier dans le presse-papiers'."</a>"]);if($x=="sqlite"&&preg_match("~^$zh*+ATTACH\\b~i",$xg,$C)){echo$pg,"<p class='error'>".'Requêtes ATTACH ne sont pas supportées.'."\n";$Dc[]=" <a href='#sql-$sb'>$sb</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$pg;ob_flush();flush();}$Fh=microtime(true);if($f->multi_query($xg)&&is_object($g)&&preg_match("~^$zh*+USE\\b~i",$xg))$g->query($xg);do{$H=$f->store_result();if($f->error){echo($_POST["only_errors"]?$pg:""),"<p class='error'>".'Erreur dans la requête'.($f->errno?" ($f->errno)":"").": ".error()."\n";$Dc[]=" <a href='#sql-$sb'>$sb</a>";if($_POST["error_stops"])break
2;}else{$gi=" <span class='time'>(".format_time($Fh).")</span>".(strlen($xg)<1000?" <a href='".h(ME)."sql=".urlencode(trim($xg))."'>".'Modifier'."</a>":"");$_a=$f->affected_rows;$ej=($_POST["only_errors"]?"":$l->warnings());$fj="warnings-$sb";if($ej)$gi.=", <a href='#$fj'>".'Avertissements'."</a>".script("qsl('a').onclick = partial(toggle, '$fj');","");$Lc=null;$Mc="explain-$sb";if(is_object($H)){$z=$_POST["limit"];$Ef=select($H,$g,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$ff=$H->num_rows;echo"<p>".($ff?($z&&$ff>$z?sprintf('%d / ',$z):"").lang(array('%d ligne','%d lignes'),$ff):""),$gi;if($g&&preg_match("~^($zh|\\()*+SELECT\\b~i",$xg)&&($Lc=explain($g,$xg)))echo", <a href='#$Mc'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Mc');","");$t="export-$sb";echo", <a href='#$t'>".'Exporter'."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."<span id='$t' class='hidden'>: ".html_select("output",$b->dumpOutput(),$ya["output"])." ".html_select("format",$qc,$ya["format"])."<input type='hidden' name='query' value='".h($xg)."'>"." <input type='submit' name='export' value='".'Exporter'."'><input type='hidden' name='token' value='$qi'></span>\n"."</form>\n";}}else{if(preg_match("~^$zh*+(CREATE|DROP|ALTER)$zh++(DATABASE|SCHEMA)\\b~i",$xg)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($f->info)."'>".lang(array('Requête exécutée avec succès, %d ligne modifiée.','Requête exécutée avec succès, %d lignes modifiées.'),$_a)."$gi\n";}echo($ej?"<div id='$fj' class='hidden'>\n$ej</div>\n":"");if($Lc){echo"<div id='$Mc' class='hidden'>\n";select($Lc,$g,$Ef);echo"</div>\n";}}$Fh=microtime(true);}while($f->next_result());}$G=substr($G,$jf);$jf=0;}}}}if($zc)echo"<p class='message'>".'Aucune commande à exécuter.'."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(array('%d requête exécutée avec succès.','%d requêtes exécutées avec succès.'),$sb-count($Dc))," <span class='time'>(".format_time($si).")</span>\n";}elseif($Dc&&$sb>1)echo"<p class='error'>".'Erreur dans la requête'.": ".implode("",$Dc)."\n";}else
echo"<p class='error'>".upload_error($G)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Jc="<input type='submit' value='".'Exécuter'."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$xg=$_GET["sql"];if($_POST)$xg=$_POST["query"];elseif($_GET["history"]=="all")$xg=$Cd;elseif($_GET["history"]!="")$xg=$Cd[$_GET["history"]][0];echo"<p>";textarea("query",$xg,20);echo
script(($_POST?"":"qs('textarea').focus();\n")."qs('#form').onsubmit = partial(sqlSubmit, qs('#form'), '".js_escape(remove_from_uri("sql|limit|error_stops|only_errors|history"))."');"),"<p>$Jc\n",'Limiter les lignes'.": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".'Importer un fichier'."</legend><div>";$wd=(extension_loaded("zlib")?"[.gz]":"");echo(ini_bool("file_uploads")?"SQL$wd (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Jc":'L\'importation de fichier est désactivée.'),"</div></fieldset>\n";$Kd=$b->importServerPath();if($Kd){echo"<fieldset><legend>".'Depuis le serveur'."</legend><div>",sprintf('Fichier %s du serveur Web',"<code>".h($Kd)."$wd</code>"),' <input type="submit" name="webfile" value="'.'Exécuter le fichier'.'">',"</div></fieldset>\n";}echo"<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])||$_GET["error_stops"]),'Arrêter en cas d\'erreur')."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])||$_GET["only_errors"]),'Montrer seulement les erreurs')."\n","<input type='hidden' name='token' value='$qi'>\n";if(!isset($_GET["import"])&&$Cd){print_fieldset("history",'Historique',$_GET["history"]!="");for($X=end($Cd);$X;$X=prev($Cd)){$y=key($Cd);list($xg,$gi,$uc)=$X;echo'<a href="'.h(ME."sql=&history=$y").'" class="edit" title="'.'Modifier'.'">'.'Modifier'."</a>"." <span class='time' title='".@date('Y-m-d',$gi)."'>".@date("H:i:s",$gi)."</span>"." <code class='jush-$x'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$xg)))),80,"</code>").($uc?" <span class='time'>($uc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".'Effacer'."'>\n","<a href='".h(ME."sql=&history=all")."' class='edit-all' title='".'Tout modifier'."'>".'Tout modifier'."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$o=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$o):""):where($_GET,$o));$Li=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($o
as$D=>$n){if(!isset($n["privileges"][$Li?"update":"insert"])||$b->fieldName($n)==""||$n["generated"])unset($o[$D]);}if($_POST&&!$m&&!isset($_GET["select"])){$B=$_POST["referer"];if($_POST["insert"])$B=($Li?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$B))$B=ME."select=".urlencode($a);$w=indexes($a);$Gi=unique_array($_GET["where"],$w);$_g="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($B,'L\'élément a été supprimé.',$l->delete($a,$_g,!$Gi));else{$N=array();foreach($o
as$D=>$n){$X=process_input($n);if($X!==false&&$X!==null)$N[idf_escape($D)]=$X;}if($Li){if(!$N)redirect($B);queries_redirect($B,'L\'élément a été modifié.',$l->update($a,$N,$_g,!$Gi));if(is_ajax()){page_headers();page_messages($m);exit;}}else{$H=$l->insert($a,$N);$qe=($H?last_id():0);queries_redirect($B,sprintf('L\'élément%s a été inséré.',($qe?" $qe":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($o
as$D=>$n){if(isset($n["privileges"]["select"])){$Ga=convert_field($n);if($_POST["clone"]&&$n["auto_increment"])$Ga="''";if($x=="sql"&&preg_match("~enum|set~",$n["type"]))$Ga="1*".idf_escape($D);$L[]=($Ga?"$Ga AS ":"").idf_escape($D);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$l->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$m=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$o){if(!$Z){$H=$l->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($l->primary=>"");}if($J){foreach($J
as$y=>$X){if(!$Z)$J[$y]=null;$o[$y]=array("field"=>$y,"null"=>($y!=$l->primary),"auto_increment"=>($y==$l->primary));}}}edit_form($a,$o,$J,$Li);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Uf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$y)$Uf[$y]=$y;$Gg=referencable_primary($a);$jd=array();foreach($Gg
as$Rh=>$n)$jd[str_replace("`","``",$Rh)."`".str_replace("`","``",$n["field"])]=$Rh;$Hf=array();$R=array();if($a!=""){$Hf=fields($a);$R=table_status($a);if(!$R)$m='Aucune table.';}$J=$_POST;$J["fields"]=(array)$J["fields"];if($J["auto_increment_col"])$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;if($_POST)set_adminer_settings(array("comments"=>$_POST["comments"],"defaults"=>$_POST["defaults"]));if($_POST&&!process_fields($J["fields"])&&!$m){if($_POST["drop"])queries_redirect(substr(ME,0,-1),'La table a été effacée.',drop_tables(array($a)));else{$o=array();$Da=array();$Pi=false;$hd=array();$Gf=reset($Hf);$Ba=" FIRST";foreach($J["fields"]as$y=>$n){$q=$jd[$n["type"]];$Ci=($q!==null?$Gg[$q]:$n);if($n["field"]!=""){if(!$n["has_default"])$n["default"]=null;if($y==$J["auto_increment_col"])$n["auto_increment"]=true;$ug=process_field($n,$Ci);$Da[]=array($n["orig"],$ug,$Ba);if(!$Gf||$ug!=process_field($Gf,$Gf)){$o[]=array($n["orig"],$ug,$Ba);if($n["orig"]!=""||$Ba)$Pi=true;}if($q!==null)$hd[idf_escape($n["field"])]=($a!=""&&$x!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$jd[$n["type"]],'source'=>array($n["field"]),'target'=>array($Ci["field"]),'on_delete'=>$n["on_delete"],));$Ba=" AFTER ".idf_escape($n["field"]);}elseif($n["orig"]!=""){$Pi=true;$o[]=array($n["orig"]);}if($n["orig"]!=""){$Gf=next($Hf);if(!$Gf)$Ba="";}}$Wf="";if($Uf[$J["partition_by"]]){$Xf=array();if($J["partition_by"]=='RANGE'||$J["partition_by"]=='LIST'){foreach(array_filter($J["partition_names"])as$y=>$X){$Y=$J["partition_values"][$y];$Xf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($J["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Wf.="\nPARTITION BY $J[partition_by]($J[partition])".($Xf?" (".implode(",",$Xf)."\n)":($J["partitions"]?" PARTITIONS ".(+$J["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$Wf.="\nREMOVE PARTITIONING";$Me='La table a été modifiée.';if($a==""){cookie("adminer_engine",$J["Engine"]);$Me='La table a été créée.';}$D=trim($J["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($D),$Me,alter_table($a,$D,($x=="sqlite"&&($Pi||$hd)?$Da:$o),$hd,($J["Comment"]!=$R["Comment"]?$J["Comment"]:null),($J["Engine"]&&$J["Engine"]!=$R["Engine"]?$J["Engine"]:""),($J["Collation"]&&$J["Collation"]!=$R["Collation"]?$J["Collation"]:""),($J["Auto_increment"]!=""?number($J["Auto_increment"]):""),$Wf));}}page_header(($a!=""?'Modifier la table':'Créer une table'),$m,array("table"=>$a),h($a));if(!$_POST){$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($U["int"])?"int":(isset($U["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$J=$R;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"])$J["Auto_increment"]="";foreach($Hf
as$n){$n["has_default"]=isset($n["default"]);$J["fields"][]=$n;}if(support("partitioning")){$od="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$f->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $od ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$Xf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $od AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Xf[""]="";$J["partition_names"]=array_keys($Xf);$J["partition_values"]=array_values($Xf);}}}$nb=collations();$Ac=engines();foreach($Ac
as$_c){if(!strcasecmp($_c,$J["Engine"])){$J["Engine"]=$_c;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo'Nom de la table: <input name="name" data-maxlength="64" value="',h($J["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($Ac?"<select name='Engine'>".optionlist(array(""=>"(".'moteur'.")")+$Ac,$J["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($nb&&!preg_match("~sqlite|mssql~",$x)?html_select("Collation",array(""=>"(".'interclassement'.")")+$nb,$J["Collation"]):""),' <input type="submit" value="Enregistrer">
';}echo'
';if(support("columns")){echo'<div class="scrollable">
<table cellspacing="0" id="edit-fields" class="nowrap">
';edit_fields($J["fields"],$nb,"TABLE",$jd);echo'</table>
',script("editFields();"),'</div>
<p>
Incrément automatique: <input type="number" name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
',checkbox("defaults",1,($_POST?$_POST["defaults"]:adminer_setting("defaults")),'Valeurs par défaut',"columnShow(this.checked, 5)","jsonly");$vb=($_POST?$_POST["comments"]:adminer_setting("comments"));echo(support("comment")?checkbox("comments",1,$vb,'Commentaire',"editingCommentsClick(this, true);","jsonly").' '.(preg_match('~\n~',$J["Comment"])?"<textarea name='Comment' rows='2' cols='20'".($vb?"":" class='hidden'").">".h($J["Comment"])."</textarea>":'<input name="Comment" value="'.h($J["Comment"]).'" data-maxlength="'.(min_version(5.5)?2048:60).'"'.($vb?"":" class='hidden'").'>'):''),'<p>
<input type="submit" value="Enregistrer">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="Supprimer">',confirm(sprintf('Supprimer %s?',$a));}if(support("partitioning")){$Vf=preg_match('~RANGE|LIST~',$J["partition_by"]);print_fieldset("partition",'Partitionner par',$J["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Uf,$J["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($J["partition"]),'">)
Partitions: <input type="number" name="partitions" class="size',($Vf||!$J["partition_by"]?" hidden":""),'" value="',h($J["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Vf?"":" class='hidden'"),'>
<thead><tr><th>Nom de la partition<th>Valeurs</thead>
';foreach($J["partition_names"]as$y=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($y==count($J["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($J["partition_values"][$y]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Nd=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$R["Engine"]))$Nd[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$R["Engine"]))$Nd[]="SPATIAL";$w=indexes($a);$ng=array();if($x=="mongo"){$ng=$w["_id_"];unset($Nd[0]);unset($w["_id_"]);}$J=$_POST;if($_POST&&!$m&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($J["indexes"]as$v){$D=$v["name"];if(in_array($v["type"],$Nd)){$e=array();$we=array();$ec=array();$N=array();ksort($v["columns"]);foreach($v["columns"]as$y=>$d){if($d!=""){$ve=$v["lengths"][$y];$dc=$v["descs"][$y];$N[]=idf_escape($d).($ve?"(".(+$ve).")":"").($dc?" DESC":"");$e[]=$d;$we[]=($ve?$ve:null);$ec[]=$dc;}}if($e){$Kc=$w[$D];if($Kc){ksort($Kc["columns"]);ksort($Kc["lengths"]);ksort($Kc["descs"]);if($v["type"]==$Kc["type"]&&array_values($Kc["columns"])===$e&&(!$Kc["lengths"]||array_values($Kc["lengths"])===$we)&&array_values($Kc["descs"])===$ec){unset($w[$D]);continue;}}$c[]=array($v["type"],$D,$N);}}}foreach($w
as$D=>$Kc)$c[]=array($Kc["type"],$D,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),'Index modifiés.',alter_indexes($a,$c));}page_header('Index',$m,array("table"=>$a),h($a));$o=array_keys(fields($a));if($_POST["add"]){foreach($J["indexes"]as$y=>$v){if($v["columns"][count($v["columns"])]!="")$J["indexes"][$y]["columns"][]="";}$v=end($J["indexes"]);if($v["type"]||array_filter($v["columns"],'strlen'))$J["indexes"][]=array("columns"=>array(1=>""));}if(!$J){foreach($w
as$y=>$v){$w[$y]["name"]=$y;$w[$y]["columns"][]="";}$w[]=array("columns"=>array(1=>""));$J["indexes"]=$w;}echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">Type d\'index
<th><input type="submit" class="wayoff">Colonne (longueur)
<th id="label-name">Nom
<th><noscript>',"<input type='image' class='icon' name='add[0]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.3")."' alt='+' title='".'Ajouter le prochain'."'>",'</noscript>
</thead>
';if($ng){echo"<tr><td>PRIMARY<td>";foreach($ng["columns"]as$y=>$d){echo
select_input(" disabled",$o,$d),"<label><input disabled type='checkbox'>".'décroissant'."</label> ";}echo"<td><td>\n";}$ge=1;foreach($J["indexes"]as$v){if(!$_POST["drop_col"]||$ge!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$ge][type]",array(-1=>"")+$Nd,$v["type"],($ge==count($J["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($v["columns"]);$s=1;foreach($v["columns"]as$y=>$d){echo"<span>".select_input(" name='indexes[$ge][columns][$s]' title='".'Colonne'."'",($o?array_combine($o,$o):$o),$d,"partial(".($s==count($v["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($x=="sql"?"":$_GET["indexes"]."_")."')"),($x=="sql"||$x=="mssql"?"<input type='number' name='indexes[$ge][lengths][$s]' class='size' value='".h($v["lengths"][$y])."' title='".'Longueur'."'>":""),(support("descidx")?checkbox("indexes[$ge][descs][$s]",1,$v["descs"][$y],'décroissant'):"")," </span>";$s++;}echo"<td><input name='indexes[$ge][name]' value='".h($v["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$ge]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.8.3")."' alt='x' title='".'Effacer'."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$ge++;}echo'</table>
</div>
<p>
<input type="submit" value="Enregistrer">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["database"])){$J=$_POST;if($_POST&&!$m&&!isset($_POST["add_x"])){$D=trim($J["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'La base de données a été supprimée.',drop_databases(array(DB)));}elseif(DB!==$D){if(DB!=""){$_GET["db"]=$D;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($D),'La base de données a été renommée.',rename_database($D,$J["collation"]));}else{$j=explode("\n",str_replace("\r","",$D));$Lh=true;$pe="";foreach($j
as$k){if(count($j)==1||$k!=""){if(!create_database($k,$J["collation"]))$Lh=false;$pe=$k;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($pe),'La base de données a été créée.',$Lh);}}else{if(!$J["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($D).(preg_match('~^[a-z0-9_]+$~i',$J["collation"])?" COLLATE $J[collation]":""),substr(ME,0,-1),'La base de données a été modifiée.');}}page_header(DB!=""?'Modifier la base de données':'Créer une base de données',$m,array(),h(DB));$nb=collations();$D=DB;if($_POST)$D=$J["name"];elseif(DB!="")$J["collation"]=db_collation(DB,$nb);elseif($x=="sql"){foreach(get_vals("SHOW GRANTS")as$qd){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\.\*)?~',$qd,$C)&&$C[1]){$D=stripcslashes(idf_unescape("`$C[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($D,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($D).'</textarea><br>':'<input name="name" id="name" value="'.h($D).'" data-maxlength="64" autocapitalize="off">')."\n".($nb?html_select("collation",array(""=>"(".'interclassement'.")")+$nb,$J["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="Enregistrer">
';if(DB!="")echo"<input type='submit' name='drop' value='".'Supprimer'."'>".confirm(sprintf('Supprimer %s?',DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.3")."' alt='+' title='".'Ajouter le prochain'."'>\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["scheme"])){$J=$_POST;if($_POST&&!$m){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,'Le schéma a été supprimé.');else{$D=trim($J["name"]);$_.=urlencode($D);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($D),$_,'Le schéma a été créé.');elseif($_GET["ns"]!=$D)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($D),$_,'Le schéma a été modifié.');else
redirect($_);}}page_header($_GET["ns"]!=""?'Modifier le schéma':'Créer un schéma',$m);if(!$J)$J["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($J["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="Enregistrer">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".'Supprimer'."'>".confirm(sprintf('Supprimer %s?',$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header('Appeler'.": ".h($da),$m);$Wg=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Ld=array();$Lf=array();foreach($Wg["fields"]as$s=>$n){if(substr($n["inout"],-3)=="OUT")$Lf[$s]="@".idf_escape($n["field"])." AS ".idf_escape($n["field"]);if(!$n["inout"]||substr($n["inout"],0,2)=="IN")$Ld[]=$s;}if(!$m&&$_POST){$Ya=array();foreach($Wg["fields"]as$y=>$n){if(in_array($y,$Ld)){$X=process_input($n);if($X===false)$X="''";if(isset($Lf[$y]))$f->query("SET @".idf_escape($n["field"])." = $X");}$Ya[]=(isset($Lf[$y])?"@".idf_escape($n["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$Ya).")";$Fh=microtime(true);$H=$f->multi_query($G);$_a=$f->affected_rows;echo$b->selectQuery($G,$Fh,!$H);if(!$H)echo"<p class='error'>".error()."\n";else{$g=connect();if(is_object($g))$g->select_db(DB);do{$H=$f->store_result();if(is_object($H))select($H,$g);else
echo"<p class='message'>".lang(array('La routine a été exécutée, %d ligne modifiée.','La routine a été exécutée, %d lignes modifiées.'),$_a)." <span class='time'>".@date("H:i:s")."</span>\n";}while($f->next_result());if($Lf)select($f->query("SELECT ".implode(", ",$Lf)));}}echo'
<form action="" method="post">
';if($Ld){echo"<table cellspacing='0' class='layout'>\n";foreach($Ld
as$y){$n=$Wg["fields"][$y];$D=$n["field"];echo"<tr><th>".$b->fieldName($n);$Y=$_POST["fields"][$D];if($Y!=""){if($n["type"]=="enum")$Y=+$Y;if($n["type"]=="set")$Y=array_sum($Y);}input($n,$Y,(string)$_POST["function"][$D]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Appeler">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$D=$_GET["name"];$J=$_POST;if($_POST&&!$m&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$Me=($_POST["drop"]?'La clé étrangère a été effacée.':($D!=""?'La clé étrangère a été modifiée.':'La clé étrangère a été créée.'));$B=ME."table=".urlencode($a);if(!$_POST["drop"]){$J["source"]=array_filter($J["source"],'strlen');ksort($J["source"]);$Zh=array();foreach($J["source"]as$y=>$X)$Zh[$y]=$J["target"][$y];$J["target"]=$Zh;}if($x=="sqlite")queries_redirect($B,$Me,recreate_table($a,$a,array(),array(),array(" $D"=>($_POST["drop"]?"":" ".format_foreign_key($J)))));else{$c="ALTER TABLE ".table($a);$lc="\nDROP ".($x=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($D);if($_POST["drop"])query_redirect($c.$lc,$B,$Me);else{query_redirect($c.($D!=""?"$lc,":"")."\nADD".format_foreign_key($J),$B,$Me);$m='Les colonnes de source et de destination doivent être du même type, il doit y avoir un index sur les colonnes de destination et les données référencées doivent exister.'."<br>$m";}}}page_header('Clé étrangère',$m,array("table"=>$a),h($a));if($_POST){ksort($J["source"]);if($_POST["add"])$J["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$J["target"]=array();}elseif($D!=""){$jd=foreign_keys($a);$J=$jd[$D];$J["source"][]="";}else{$J["table"]=$a;$J["source"]=array("");}echo'
<form action="" method="post">
';$yh=array_keys(fields($a));if($J["db"]!="")$f->select_db($J["db"]);if($J["ns"]!="")set_schema($J["ns"]);$Fg=array_keys(array_filter(table_status('',true),'fk_support'));$Zh=array_keys(fields(in_array($J["table"],$Fg)?$J["table"]:reset($Fg)));$sf="this.form['change-js'].value = '1'; this.form.submit();";echo"<p>".'Table visée'.": ".html_select("table",$Fg,$J["table"],$sf)."\n";if($x=="pgsql")echo'Schéma'.": ".html_select("ns",$b->schemas(),$J["ns"]!=""?$J["ns"]:$_GET["ns"],$sf);elseif($x!="sqlite"){$Wb=array();foreach($b->databases()as$k){if(!information_schema($k))$Wb[]=$k;}echo'BD'.": ".html_select("db",$Wb,$J["db"]!=""?$J["db"]:$_GET["db"],$sf);}echo'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Modifier"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">Source<th id="label-target">Cible</thead>
';$ge=0;foreach($J["source"]as$y=>$X){echo"<tr>","<td>".html_select("source[".(+$y)."]",array(-1=>"")+$yh,$X,($ge==count($J["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$y)."]",$Zh,$J["target"][$y],1,"label-target");$ge++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+explode("|",$rf),$J["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+explode("|",$rf),$J["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"https://docs.oracle.com/cd/B19306_01/server.102/b14200/clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="Enregistrer">
<noscript><p><input type="submit" name="add" value="Ajouter une colonne"></noscript>
';if($D!=""){echo'<input type="submit" name="drop" value="Supprimer">',confirm(sprintf('Supprimer %s?',$D));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$J=$_POST;$If="VIEW";if($x=="pgsql"&&$a!=""){$O=table_status($a);$If=strtoupper($O["Engine"]);}if($_POST&&!$m){$D=trim($J["name"]);$Ga=" AS\n$J[select]";$B=ME."table=".urlencode($D);$Me='La vue a été modifiée.';$T=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$D&&$x!="sqlite"&&$T=="VIEW"&&$If=="VIEW")query_redirect(($x=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($D).$Ga,$B,$Me);else{$bi=$D."_adminer_".uniqid();drop_create("DROP $If ".table($a),"CREATE $T ".table($D).$Ga,"DROP $T ".table($D),"CREATE $T ".table($bi).$Ga,"DROP $T ".table($bi),($_POST["drop"]?substr(ME,0,-1):$B),'La vue a été effacée.',$Me,'La vue a été créée.',$a,$D);}}if(!$_POST&&$a!=""){$J=view($a);$J["name"]=$a;$J["materialized"]=($If!="VIEW");if(!$m)$m=error();}page_header(($a!=""?'Modifier une vue':'Créer une vue'),$m,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>Nom: <input name="name" value="',h($J["name"]),'" data-maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$J["materialized"],'Vue matérialisée'):""),'<p>';textarea("select",$J["select"]);echo'<p>
<input type="submit" value="Enregistrer">
';if($a!=""){echo'<input type="submit" name="drop" value="Supprimer">',confirm(sprintf('Supprimer %s?',$a));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Yd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Hh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$J=$_POST;if($_POST&&!$m){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'L\'évènement a été supprimé.');elseif(in_array($J["INTERVAL_FIELD"],$Yd)&&isset($Hh[$J["STATUS"]])){$bh="\nON SCHEDULE ".($J["INTERVAL_VALUE"]?"EVERY ".q($J["INTERVAL_VALUE"])." $J[INTERVAL_FIELD]".($J["STARTS"]?" STARTS ".q($J["STARTS"]):"").($J["ENDS"]?" ENDS ".q($J["ENDS"]):""):"AT ".q($J["STARTS"]))." ON COMPLETION".($J["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'L\'évènement a été modifié.':'L\'évènement a été créé.'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$bh.($aa!=$J["EVENT_NAME"]?"\nRENAME TO ".idf_escape($J["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($J["EVENT_NAME"]).$bh)."\n".$Hh[$J["STATUS"]]." COMMENT ".q($J["EVENT_COMMENT"]).rtrim(" DO\n$J[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'Modifier un évènement'.": ".h($aa):'Créer un évènement'),$m);if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Nom<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" data-maxlength="64" autocapitalize="off">
<tr><th title="datetime">Démarrer<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th title="datetime">Terminer<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>Chaque<td><input type="number" name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Yd,$J["INTERVAL_FIELD"]),'<tr><th>Statut<td>',html_select("STATUS",$Hh,$J["STATUS"]),'<tr><th>Commentaire<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" data-maxlength="64">
<tr><th><td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",'Conserver quand complété'),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Enregistrer">
';if($aa!=""){echo'<input type="submit" name="drop" value="Supprimer">',confirm(sprintf('Supprimer %s?',$aa));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Wg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$J=$_POST;$J["fields"]=(array)$J["fields"];if($_POST&&!process_fields($J["fields"])&&!$m){$Ff=routine($_GET["procedure"],$Wg);$bi="$J[name]_adminer_".uniqid();drop_create("DROP $Wg ".routine_id($da,$Ff),create_routine($Wg,$J),"DROP $Wg ".routine_id($J["name"],$J),create_routine($Wg,array("name"=>$bi)+$J),"DROP $Wg ".routine_id($bi,$J),substr(ME,0,-1),'La routine a été supprimée.','La routine a été modifiée.','La routine a été créée.',$da,$J["name"]);}page_header(($da!=""?(isset($_GET["function"])?'Modifier la fonction':'Modifier la procédure').": ".h($da):(isset($_GET["function"])?'Créer une fonction':'Créer une procédure')),$m);if(!$_POST&&$da!=""){$J=routine($_GET["procedure"],$Wg);$J["name"]=$da;}$nb=get_vals("SHOW CHARACTER SET");sort($nb);$Xg=routine_languages();echo'
<form action="" method="post" id="form">
<p>Nom: <input name="name" value="',h($J["name"]),'" data-maxlength="64" autocapitalize="off">
',($Xg?'Langue'.": ".html_select("language",$Xg,$J["language"])."\n":""),'<input type="submit" value="Enregistrer">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$nb,$Wg);if(isset($_GET["function"])){echo"<tr><td>".'Type de retour';edit_type("returns",$J["returns"],$nb,array(),($x=="pgsql"?array("void","trigger"):array()));}echo'</table>
',script("editFields();"),'</div>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="Enregistrer">
';if($da!=""){echo'<input type="submit" name="drop" value="Supprimer">',confirm(sprintf('Supprimer %s?',$da));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$J=$_POST;if($_POST&&!$m){$_=substr(ME,0,-1);$D=trim($J["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,'La séquence a été supprimée.');elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($D),$_,'La séquence a été créée.');elseif($fa!=$D)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($D),$_,'La séquence a été modifiée.');else
redirect($_);}page_header($fa!=""?'Modifier la séquence'.": ".h($fa):'Créer une séquence',$m);if(!$J)$J["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($J["name"]),'" autocapitalize="off">
<input type="submit" value="Enregistrer">
';if($fa!="")echo"<input type='submit' name='drop' value='".'Supprimer'."'>".confirm(sprintf('Supprimer %s?',$fa))."\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$J=$_POST;if($_POST&&!$m){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,'Le type a été supprimé.');else
query_redirect("CREATE TYPE ".idf_escape(trim($J["name"]))." $J[as]",$_,'Le type a été créé.');}page_header($ga!=""?'Modifier le type'.": ".h($ga):'Créer un type',$m);if(!$J)$J["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".'Supprimer'."'>".confirm(sprintf('Supprimer %s?',$ga))."\n";else{echo"<input name='name' value='".h($J['name'])."' autocapitalize='off'>\n";textarea("as",$J["as"]);echo"<p><input type='submit' value='".'Enregistrer'."'>\n";}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$D=$_GET["name"];$Ai=trigger_options();$J=(array)trigger($D,$a)+array("Trigger"=>$a."_bi");if($_POST){if(!$m&&in_array($_POST["Timing"],$Ai["Timing"])&&in_array($_POST["Event"],$Ai["Event"])&&in_array($_POST["Type"],$Ai["Type"])){$qf=" ON ".table($a);$lc="DROP TRIGGER ".idf_escape($D).($x=="pgsql"?$qf:"");$B=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($lc,$B,'Le déclencheur a été supprimé.');else{if($D!="")queries($lc);queries_redirect($B,($D!=""?'Le déclencheur a été modifié.':'Le déclencheur a été créé.'),queries(create_trigger($qf,$_POST)));if($D!="")queries(create_trigger($qf,$J+array("Type"=>reset($Ai["Type"]))));}}$J=$_POST;}page_header(($D!=""?'Modifier un déclencheur'.": ".h($D):'Ajouter un déclencheur'),$m,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0" class="layout">
<tr><th>Temps<td>',html_select("Timing",$Ai["Timing"],$J["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>Évènement<td>',html_select("Event",$Ai["Event"],$J["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$Ai["Event"])?" <input name='Of' value='".h($J["Of"])."' class='hidden'>":""),'<tr><th>Type<td>',html_select("Type",$Ai["Type"],$J["Type"]),'</table>
<p>Nom: <input name="Trigger" value="',h($J["Trigger"]),'" data-maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="Enregistrer">
';if($D!=""){echo'<input type="submit" name="drop" value="Supprimer">',confirm(sprintf('Supprimer %s?',$D));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$sg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$Fb)$sg[$Fb][$J["Privilege"]]=$J["Comment"];}$sg["Server Admin"]+=$sg["File access on server"];$sg["Databases"]["Create routine"]=$sg["Procedures"]["Create routine"];unset($sg["Procedures"]["Create routine"]);$sg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$sg["Columns"][$X]=$sg["Tables"][$X];unset($sg["Server Admin"]["Usage"]);foreach($sg["Tables"]as$y=>$X)unset($sg["Databases"][$y]);$Ze=array();if($_POST){foreach($_POST["objects"]as$y=>$X)$Ze[$X]=(array)$Ze[$X]+(array)$_POST["grants"][$y];}$rd=array();$of="";if(isset($_GET["host"])&&($H=$f->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$C)&&preg_match_all('~ *([^(,]*[^ ,(])( *\([^)]+\))?~',$C[1],$Ee,PREG_SET_ORDER)){foreach($Ee
as$X){if($X[1]!="USAGE")$rd["$C[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$J[0]))$rd["$C[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$C))$of=$C[1];}}if($_POST&&!$m){$pf=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $pf",ME."privileges=",'L\'utilisateur a été effacé.');else{$bf=q($_POST["user"])."@".q($_POST["host"]);$Zf=$_POST["pass"];if($Zf!=''&&!$_POST["hashed"]&&!min_version(8)){$Zf=$f->result("SELECT PASSWORD(".q($Zf).")");$m=!$Zf;}$Lb=false;if(!$m){if($pf!=$bf){$Lb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $bf IDENTIFIED BY ".(min_version(8)?"":"PASSWORD ").q($Zf));$m=!$Lb;}elseif($Zf!=$of)queries("SET PASSWORD FOR $bf = ".q($Zf));}if(!$m){$Tg=array();foreach($Ze
as$hf=>$qd){if(isset($_GET["grant"]))$qd=array_filter($qd);$qd=array_keys($qd);if(isset($_GET["grant"]))$Tg=array_diff(array_keys(array_filter($Ze[$hf],'strlen')),$qd);elseif($pf==$bf){$mf=array_keys((array)$rd[$hf]);$Tg=array_diff($mf,$qd);$qd=array_diff($qd,$mf);unset($rd[$hf]);}if(preg_match('~^(.+)\s*(\(.*\))?$~U',$hf,$C)&&(!grant("REVOKE",$Tg,$C[2]," ON $C[1] FROM $bf")||!grant("GRANT",$qd,$C[2]," ON $C[1] TO $bf"))){$m=true;break;}}}if(!$m&&isset($_GET["host"])){if($pf!=$bf)queries("DROP USER $pf");elseif(!isset($_GET["grant"])){foreach($rd
as$hf=>$Tg){if(preg_match('~^(.+)(\(.*\))?$~U',$hf,$C))grant("REVOKE",array_keys($Tg),$C[2]," ON $C[1] FROM $bf");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'L\'utilisateur a été modifié.':'L\'utilisateur a été créé.'),!$m);if($Lb)$f->query("DROP USER $bf");}}page_header((isset($_GET["host"])?'Utilisateur'.": ".h("$ha@$_GET[host]"):'Créer un utilisateur'),$m,array("privileges"=>array('','Privilèges')));if($_POST){$J=$_POST;$rd=$Ze;}else{$J=$_GET+array("host"=>$f->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$of;if($of!="")$J["hashed"]=true;$rd[(DB==""||$rd?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Serveur<td><input name="host" data-maxlength="60" value="',h($J["host"]),'" autocapitalize="off">
<tr><th>Utilisateur<td><input name="user" data-maxlength="80" value="',h($J["user"]),'" autocapitalize="off">
<tr><th>Mot de passe<td><input name="pass" id="pass" value="',h($J["pass"]),'" autocomplete="new-password">
';if(!$J["hashed"])echo
script("typePassword(qs('#pass'));");echo(min_version(8)?"":checkbox("hashed",1,$J["hashed"],'Haché',"typePassword(this.form['pass'], this.checked);")),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".'Privilèges'.doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($rd
as$hf=>$qd){echo'<th>'.($hf!="*.*"?"<input name='objects[$s]' value='".h($hf)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Serveur',"Databases"=>'Base de données',"Tables"=>'Table',"Columns"=>'Colonne',"Procedures"=>'Routine',)as$Fb=>$dc){foreach((array)$sg[$Fb]as$rg=>$tb){echo"<tr".odd()."><td".($dc?">$dc<td":" colspan='2'").' lang="en" title="'.h($tb).'">'.h($rg);$s=0;foreach($rd
as$hf=>$qd){$D="'grants[$s][".h(strtoupper($rg))."]'";$Y=$qd[strtoupper($rg)];if($Fb=="Server Admin"&&$hf!=(isset($rd["*.*"])?"*.*":".*"))echo"<td>";elseif(isset($_GET["grant"]))echo"<td><select name=$D><option><option value='1'".($Y?" selected":"").">".'Grant'."<option value='0'".($Y=="0"?" selected":"").">".'Revoke'."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$D value='1'".($Y?" checked":"").($rg=="All privileges"?" id='grants-$s-all'>":">".($rg=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$s-all'); };"))),"</label>";}$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="Enregistrer">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Supprimer">',confirm(sprintf('Supprimer %s?',"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")){if($_POST&&!$m){$le=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$le++;}queries_redirect(ME."processlist=",lang(array('%d processus a été arrêté.','%d processus ont été arrêtés.'),$le),$le||!$_POST["kill"]);}}page_header('Liste des processus',$m);echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$s=-1;foreach(process_list()as$s=>$J){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>":"");foreach($J
as$y=>$X)echo"<th>$y".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($y),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"REFRN30223",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J[$x=="sql"?"Id":"pid"],0):"");foreach($J
as$y=>$X)echo"<td>".(($x=="sql"&&$y=="Info"&&preg_match("~Query|Killed~",$J["Command"])&&$X!="")||($x=="pgsql"&&$y=="current_query"&&$X!="<IDLE>")||($x=="oracle"&&$y=="sql_text"&&$X!="")?"<code class='jush-$x'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.'Cloner'.'</a>':h($X));echo"\n";}echo'</table>
</div>
<p>
';if(support("kill")){echo($s+1)."/".sprintf('%d au total',max_connections()),"<p><input type='submit' value='".'Arrêter'."'>\n";}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$w=indexes($a);$o=fields($a);$jd=column_foreign_keys($a);$kf=$R["Oid"];parse_str($_COOKIE["adminer_import"],$za);$Ug=array();$e=array();$fi=null;foreach($o
as$y=>$n){$D=$b->fieldName($n);if(isset($n["privileges"]["select"])&&$D!=""){$e[$y]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($n))$fi=$b->selectLengthProcess();}$Ug+=$n["privileges"];}list($L,$sd)=$b->selectColumnsProcess($e,$w);$ce=count($sd)<count($L)||strstr($L[0],"DISTINCT");$Z=$b->selectSearchProcess($o,$w);$Bf=$b->selectOrderProcess($o,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Hi=>$J){$Ga=convert_field($o[key($J)]);$L=array($Ga?$Ga:idf_escape(key($J)));$Z[]=where_check($Hi,$o);$I=$l->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$ng=$Ji=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$ng=array_flip($v["columns"]);$Ji=($L?$ng:array());foreach($Ji
as$y=>$X){if(in_array(idf_escape($y),$L))unset($Ji[$y]);}break;}}if($kf&&!$ng){$ng=$Ji=array($kf=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($kf));}if($_POST&&!$m){$kj=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$eb=array();foreach($_POST["check"]as$bb)$eb[]=where_check($bb,$o);$kj[]="((".implode(") OR (",$eb)."))";}$kj=($kj?"\nWHERE ".implode(" AND ",$kj):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$od=($L?implode(", ",$L):"*").convert_fields($e,$o,$L)."\nFROM ".table($a);$ud=($sd&&$ce?"\nGROUP BY ".implode(", ",$sd):"").($Bf?"\nORDER BY ".implode(", ",$Bf):"");if(!is_array($_POST["check"])||$ng)$G="SELECT $od$kj$ud";else{$Fi=array();foreach($_POST["check"]as$X)$Fi[]="(SELECT".limit($od,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$o).$ud,1).")";$G=implode(" UNION ALL ",$Fi);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$jd)){if($_POST["save"]||$_POST["delete"]){$H=true;$_a=0;$N=array();if(!$_POST["delete"]){foreach($e
as$D=>$X){$X=process_input($o[$D]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($D)]=($X!==false?$X:idf_escape($D));}}if($_POST["delete"]||$N){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($ng&&is_array($_POST["check"]))||$ce){$H=($_POST["delete"]?$l->delete($a,$kj):($_POST["clone"]?queries("INSERT $G$kj"):$l->update($a,$N,$kj)));$_a=$f->affected_rows;}else{foreach((array)$_POST["check"]as$X){$gj="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$o);$H=($_POST["delete"]?$l->delete($a,$gj,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$gj)):$l->update($a,$N,$gj,1)));if(!$H)break;$_a+=$f->affected_rows;}}}$Me=lang(array('%d élément a été modifié.','%d éléments ont été modifiés.'),$_a);if($_POST["clone"]&&$H&&$_a==1){$qe=last_id();if($qe)$Me=sprintf('L\'élément%s a été inséré.'," $qe");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Me,$H);if(!$_POST["delete"]){edit_form($a,$o,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$m='Ctrl+cliquez sur une valeur pour la modifier.';else{$H=true;$_a=0;foreach($_POST["val"]as$Hi=>$J){$N=array();foreach($J
as$y=>$X){$y=bracket_escape($y,1);$N[idf_escape($y)]=(preg_match('~char|text~',$o[$y]["type"])||$X!=""?$b->processInput($o[$y],$X):"NULL");}$H=$l->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Hi,$o),!$ce&&!$ng," ");if(!$H)break;$_a+=$f->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d élément a été modifié.','%d éléments ont été modifiés.'),$_a),$H);}}elseif(!is_string($Zc=get_file("csv_file",true)))$m=upload_error($Zc);elseif(!preg_match('~~u',$Zc))$m='Les fichiers doivent être encodés en UTF-8.';else{cookie("adminer_import","output=".urlencode($za["output"])."&format=".urlencode($_POST["separator"]));$H=true;$pb=array_keys($o);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Zc,$Ee);$_a=count($Ee[0]);$l->begin();$kh=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($Ee[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$kh]*)$kh~",$X.$kh,$Fe);if(!$y&&!array_diff($Fe[1],$pb)){$pb=$Fe[1];$_a--;}else{$N=array();foreach($Fe[1]as$s=>$kb)$N[idf_escape($pb[$s])]=($kb==""&&$o[$pb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$kb))));$K[]=$N;}}$H=(!$K||$l->insertUpdate($a,$K,$ng));if($H)$H=$l->commit();queries_redirect(remove_from_uri("page"),lang(array('%d ligne a été importée.','%d lignes ont été importées.'),$_a),$H);$l->rollback();}}}$Rh=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header('Sélectionner'.": $Rh",$m);$N=null;if(isset($Ug["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($jd[$X["col"]]&&count($jd[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$e&&support("table"))echo"<p class='error'>".'Impossible de sélectionner la table'.($o?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$e);$b->selectSearchPrint($Z,$e,$w);$b->selectOrderPrint($Bf,$e,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($fi);$b->selectActionPrint($w);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$md=$f->result(count_rows($a,$Z,$ce,$sd));$E=floor(max(0,$md-1)/$z);}$fh=$L;$td=$sd;if(!$fh){$fh[]="*";$Gb=convert_fields($e,$o,$L);if($Gb)$fh[]=substr($Gb,2);}foreach($L
as$y=>$X){$n=$o[idf_unescape($X)];if($n&&($Ga=convert_field($n)))$fh[$y]="$Ga AS $X";}if(!$ce&&$Ji){foreach($Ji
as$y=>$X){$fh[]=idf_escape($y);if($td)$td[]=idf_escape($y);}}$H=$l->select($a,$fh,$Z,$td,$Bf,$z,$E,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$E)$H->seek($z*$E);$yc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($E&&$x=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$z!=""&&$sd&&$ce&&$x=="sql")$md=$f->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".'Aucun résultat.'."\n";else{$Pa=$b->backwardKeys($a,$Rh);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$sd&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."' title='".'Modification'."' class='edit-all'>".'Modification'."</a>");$Xe=array();$pd=array();reset($L);$Bg=1;foreach($K[0]as$y=>$X){if(!isset($Ji[$y])){$X=$_GET["columns"][key($L)];$n=$o[$L?($X?$X["col"]:current($L)):$y];$D=($n?$b->fieldName($n,$Bg):($X["fun"]?"*":$y));if($D!=""){$Bg++;$Xe[$y]=$D;$d=idf_escape($y);$Gd=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$dc="&desc%5B0%5D=1";echo"<th id='th[".h(bracket_escape($y))."]'>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Gd.($Bf[0]==$d||$Bf[0]==$y||(!$Bf&&$ce&&$sd[0]==$d)?$dc:'')).'">';echo
apply_sql_function($X["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($Gd.$dc)."' title='".'décroissant'."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Rechercher'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$pd[$y]=$X["fun"];next($L);}}$we=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$y=>$X)$we[$y]=max($we[$y],min(40,strlen(utf8_decode($X))));}}echo($Pa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$jd)as$We=>$J){$Gi=unique_array($K[$We],$w);if(!$Gi){$Gi=array();foreach($K[$We]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Gi[$y]=$X;}}$Hi="";foreach($Gi
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$o[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$o[$y]["collation"])?$y:"CONVERT($y USING ".charset($f).")").")";$X=md5($X);}$Hi.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X===false?"f":$X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$sd&&$L?"":"<td>".checkbox("check[]",substr($Hi,1),in_array(substr($Hi,1),(array)$_POST["check"])).($ce||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Hi)."' class='edit' title='".'modifier'."'>".'modifier'."</a>"));foreach($J
as$y=>$X){if(isset($Xe[$y])){$n=$o[$y];$X=$l->value($X,$n);if($X!=""&&(!isset($yc[$y])||$yc[$y]!=""))$yc[$y]=(is_mail($X)?$Xe[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$n["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Hi;if(!$_&&$X!==null){foreach((array)$jd[$y]as$q){if(count($jd[$y])==1||end($q["source"])==$y){$_="";foreach($q["source"]as$s=>$yh)$_.=where_link($s,$q["target"][$s],$K[$We][$yh]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if($q["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($q["ns"]),$_);if(count($q["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Gi))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Gi
as$he=>$W)$_.=where_link($s++,$he,$W);}$X=select_value($X,$_,$n,$fi);$t=h("val[$Hi][".bracket_escape($y)."]");$Y=$_POST["val"][$Hi][bracket_escape($y)];$tc=!is_array($J[$y])&&is_utf8($X)&&$K[$We][$y]==$J[$y]&&!$pd[$y];$ei=preg_match('~text|lob~',$n["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$tc)||$Y!==null){$xd=h($Y!==null?$Y:$J[$y]);echo">".($ei?"<textarea name='$t' cols='30' rows='".(substr_count($J[$y],"\n")+1)."'>$xd</textarea>":"<input name='$t' value='$xd' size='$we[$y]'>");}else{$_e=strpos($X,"<i>…</i>");echo" data-text='".($_e?2:($ei?1:0))."'".($tc?"":" data-warning='".h('Utilisez le lien "modifier" pour modifier cette valeur.')."'").">$X</td>";}}}if($Pa)echo"<td>";$b->backwardKeysPrint($Pa,$K[$We]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($K||$E){$Ic=true;if($_GET["page"]!="last"){if($z==""||(count($K)<$z&&($K||!$E)))$md=($E?$E*$z:0)+count($K);elseif($x!="sql"||!$ce){$md=($ce?false:found_rows($R,$Z));if($md<max(1e4,2*($E+1)*$z))$md=reset(slow_query(count_rows($a,$Z,$ce,$sd)));else$Ic=false;}}$Pf=($z!=""&&($md===false||$md>$z||$E));if($Pf){echo(($md===false?count($K)+1:$md-$E*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.'Charger plus de données'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".'Chargement'."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$E){if($Pf){$He=($md===false?$E+(count($K)>=$z?2:1):floor(($md-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" …":"");for($s=max(1,$E-4);$s<min($He,$E+5);$s++)echo
pagination($s,$E);if($He>0){echo($E+5<$He?" …":""),($Ic&&$md!==false?pagination($He,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$He'>".'dernière'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$E).($E>1?" …":""),($E?pagination($E,$E):""),($He>$E?pagination($E+1,$E).($He>$E+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Résultat entier'."</legend>";$ic=($Ic?"":"~ ").$md;echo
checkbox("all",1,0,($md!==false?($Ic?"":"~ ").lang(array('%d ligne','%d lignes'),$md):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$ic' : checked); selectCount('selected2', this.checked || !checked ? '$ic' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modification</legend><div>
<input type="submit" value="Enregistrer"',($_GET["modify"]?'':' title="'.'Ctrl+cliquez sur une valeur pour la modifier.'.'"'),'>
</div></fieldset>
<fieldset><legend>Sélectionnée(s) <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Modifier">
<input type="submit" name="clone" value="Cloner">
<input type="submit" name="delete" value="Effacer">',confirm(),'</div></fieldset>
';}$kd=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($kd['sql']);break;}}if($kd){print_fieldset("export",'Exporter'." <span id='selected2'></span>");$Mf=$b->dumpOutput();echo($Mf?html_select("output",$Mf,$za["output"])." ":""),html_select("format",$kd,$za["format"])," <input type='submit' name='export' value='".'Exporter'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($yc,'strlen'),$e);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Importer'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$za["format"],1);echo" <input type='submit' name='import' value='".'Importer'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$qi'>\n","</form>\n",(!$sd&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$O=isset($_GET["status"]);page_header($O?'Statut':'Variables');$Xi=($O?show_status():show_variables());if(!$Xi)echo"<p class='message'>".'Aucun résultat.'."\n";else{echo"<table cellspacing='0'>\n";foreach($Xi
as$y=>$X){echo"<tr>","<th><code class='jush-".$x.($O?"status":"set")."'>".h($y)."</code>","<td>".h($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Oh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$D=>$R){json_row("Comment-$D",h($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$y)json_row("$y-$D",h($R[$y]));foreach($Oh+array("Auto_increment"=>0,"Rows"=>0)as$y=>$X){if($R[$y]!=""){$X=format_number($R[$y]);json_row("$y-$D",($y=="Rows"&&$X&&$R["Engine"]==($x=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Oh[$y]))$Oh[$y]+=($R["Engine"]!="InnoDB"||$y!="Data_free"?$R[$y]:0);}elseif(array_key_exists($y,$R))json_row("$y-$D");}}}foreach($Oh
as$y=>$X)json_row("sum-$y",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$f->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$k=>$X){json_row("tables-$k",$X);json_row("size-$k",db_size($k));}json_row("");}exit;}else{$Xh=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Xh&&!$m&&!$_POST["search"]){$H=true;$Me="";if($x=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$H=truncate_tables($_POST["tables"]);$Me='Les tables ont été tronquées.';}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Me='Les tables ont été déplacées.';}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Me='Les tables ont été copiées.';}elseif($_POST["drop"]){if($_POST["views"])$H=drop_views($_POST["views"]);if($H&&$_POST["tables"])$H=drop_tables($_POST["tables"]);$Me='Les tables ont été effacées.';}elseif($x!="sql"){$H=($x=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Me='Les tables ont bien été optimisées.';}elseif(!$_POST["tables"])$Me='Aucune table.';elseif($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($J=$H->fetch_assoc())$Me.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$Me,$H);}page_header(($_GET["ns"]==""?'Base de données'.": ".h(DB):'Schéma'.": ".h($_GET["ns"])),$m,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".'Tables et vues'."</h3>\n";$Wh=tables_list();if(!$Wh)echo"<p class='message'>".'Aucune table.'."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".'Rechercher dans les tables'." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".'Rechercher'."'>\n";if($b->operator_regexp!==null){echo"<p><label><input type='checkbox' name='regexp' value='1'".(empty($_POST['regexp'])?'':' checked').'>'.'sous forme d\'expression régulière'.'</label>',doc_link(array('sql'=>'regexp.html','pgsql'=>'functions-matching.html#FUNCTIONS-POSIX-REGEXP'))."</p>\n";}echo"</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]=$b->operator_regexp===null||empty($_POST['regexp'])?"LIKE %%":$b->operator_regexp;search_tables();}}echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.'Table','<td>'.'Moteur'.doc_link(array('sql'=>'storage-engines.html')),'<td>'.'Interclassement'.doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.'Longueur des données'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT','oracle'=>'REFRN20286')),'<td>'.'Longueur de l\'index'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT')),'<td>'.'Espace inutilisé'.doc_link(array('sql'=>'show-table-status.html')),'<td>'.'Incrément automatique'.doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.'Lignes'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'catalog-pg-class.html#CATALOG-PG-CLASS','oracle'=>'REFRN20286')),(support("comment")?'<td>'.'Commentaire'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-info.html#FUNCTIONS-INFO-COMMENT-TABLE')):''),"</thead>\n";$S=0;foreach($Wh
as$D=>$T){$aj=($T!==null&&!preg_match('~table|sequence~i',$T));$t=h("Table-".$D);echo'<tr'.odd().'><td>'.checkbox(($aj?"views[]":"tables[]"),$D,in_array($D,$Xh,true),"","","",$t),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($D)."' title='".'Afficher la structure'."' id='$t'>".h($D).'</a>':h($D));if($aj){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($D).'" title="'.'Modifier une vue'.'">'.(preg_match('~materialized~i',$T)?'Vue matérialisée':'Vue').'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($D).'" title="'.'Afficher les données'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'Modifier la table'),"Index_length"=>array("indexes",'Modifier les index'),"Data_free"=>array("edit",'Nouvel élément'),"Auto_increment"=>array("auto_increment=1&create",'Modifier la table'),"Rows"=>array("select",'Afficher les données'),)as$y=>$_){$t=" id='$y-".h($D)."'";echo($_?"<td align='right'>".(support("table")||$y=="Rows"||(support("indexes")&&$y!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($D)."'$t title='$_[1]'>?</a>":"<span$t>?</span>"):"<td id='$y-".h($D)."'>");}$S++;}echo(support("comment")?"<td id='Comment-".h($D)."'>":"");}echo"<tr><td><th>".sprintf('%d au total',count($Wh)),"<td>".h($x=="sql"?$f->result("SELECT @@default_storage_engine"):""),"<td>".h(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$y)echo"<td align='right' id='sum-$y'>";echo"</table>\n","</div>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Ui="<input type='submit' value='".'Vide'."'> ".on_help("'VACUUM'");$yf="<input type='submit' name='optimize' value='".'Optimiser'."'> ".on_help($x=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".'Sélectionnée(s)'." <span id='selected'></span></legend><div>".($x=="sqlite"?$Ui:($x=="pgsql"?$Ui.$yf:($x=="sql"?"<input type='submit' value='".'Analyser'."'> ".on_help("'ANALYZE TABLE'").$yf."<input type='submit' name='check' value='".'Vérifier'."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".'Réparer'."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".'Tronquer'."'> ".on_help($x=="sqlite"?"'DELETE'":"'TRUNCATE".($x=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".'Supprimer'."'>".on_help("'DROP TABLE'").confirm()."\n";$j=(support("scheme")?$b->schemas():$b->databases());if(count($j)!=1&&$x!="sqlite"){$k=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Déplacer vers une autre base de données'.": ",($j?html_select("target",$j,$k):'<input name="target" value="'.h($k).'" autocapitalize="off">')," <input type='submit' name='move' value='".'Déplacer'."'>",(support("copy")?" <input type='submit' name='copy' value='".'Copier'."'> ".checkbox("overwrite",1,$_POST["overwrite"],'écraser'):""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")." }"),"<input type='hidden' name='token' value='$qi'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}$A=[];$A[]="<a href='".h(ME)."create='>".'Créer une table'."</a>";if(support("view"))$A[]="<a href='".h(ME)."view='>".'Créer une vue'."</a>";echo
generate_linksbar($A);if(support("routine")){echo"<h3 id='routines'>".'Routines'."</h3>\n";$Yg=routines();if($Yg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Nom'.'<td>'.'Type'.'<td>'.'Type de retour'."<td></thead>\n";odd('');foreach($Yg
as$J){$D=($J["SPECIFIC_NAME"]==$J["ROUTINE_NAME"]?"":"&name=".urlencode($J["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["SPECIFIC_NAME"]).$D).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["SPECIFIC_NAME"]).$D).'">'.'Modifier'."</a>";}echo"</table>\n";}$A=[];if(support('procedure'))$A[]="<a href='".h(ME)."procedure='>".'Créer une procédure'."</a>";$A[]="<a href='".h(ME)."function='>".'Créer une fonction'."</a>";echo
generate_linksbar($A);}if(support("sequence")){echo"<h3 id='sequences'>".'Séquences'."</h3>\n";$mh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($mh){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Nom'."</thead>\n";odd('');foreach($mh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo
generate_linksbar(["<a href='".h(ME)."sequence='>".'Créer une séquence'."</a>"]);}if(support("type")){echo"<h3 id='user-types'>".'Types utilisateur'."</h3>\n";$Si=types();if($Si){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Nom'."</thead>\n";odd('');foreach($Si
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo
generate_linksbar(["<a href='".h(ME)."type='>".'Créer un type'."</a>"]);}if(support("event")){echo"<h3 id='events'>".'Évènements'."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Nom'."<td>".'Horaire'."<td>".'Démarrer'."<td>".'Terminer'."<td></thead>\n";foreach($K
as$J){echo"<tr>","<th>".h($J["Name"]),"<td>".($J["Execute at"]?'À un moment précis'."<td>".$J["Execute at"]:'Chaque'." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]",'<td><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.'Modifier'.'</a>';}echo"</table>\n";$Gc=$f->result("SELECT @@event_scheduler");if($Gc&&$Gc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($Gc)."\n";}echo
generate_linksbar(["<a href='".h(ME)."event='>".'Créer un évènement'."</a>"]);}if($Wh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();
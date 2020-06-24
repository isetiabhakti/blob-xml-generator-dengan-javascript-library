<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="jumbotron">
<textarea id="myText" class="form-control" style="min-width: 100%" rows="20">
<?echo '<?xml version="1.0" encoding="UTF-8" ?>'?>
<rss version="2.0"
    xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:wp="http://wordpress.org/export/1.2/" >

    <channel>
        <wp:wxr_version>1.2</wp:wxr_version>
<? 
$time = date("Y-m-d h:i:s", strtotime(' -1 day'));

include_once('simple_html_dom.php');

$html[] = file_get_html('https://animasu.net/nonton-plunderer-episode-23/');
$html[] = file_get_html('https://animasu.net/nonton-plunderer-episode-22/');

// echo $html;die(); 

foreach($html as $html){//OP LOOP

$ret = $html->find('h1', 0);
$jdl = $ret->innertext;

$ret = $html->find('iframe', 0);
$vid = $ret->src;
$vid_url = $ret->src;
$vid_url = str_replace("?embed=true&amp;autoplay=true","",$vid_url);

$ret = $html->find('div[class=tb] > img', 0);
$img = $ret->getAttribute('data-src');

$ret = $html->find('meta[name=description]', 0);
$ret = $ret->content;
$ret_mod = str_replace("Animasu.NET","Ano-Boy BLOGSPOT",$ret); 
$ret_mod = str_replace("Animasu","Ano-Boy.Blogspot.com",$ret_mod); 
$ret_mod = str_replace("animasu","Ano-Boy.Blogspot.com",$ret_mod); 
$des = $ret_mod;

// echo $jdl;
// echo $vid;
// echo $vid_url;
// echo $img;
// echo $des;
// die();
?>
			<item>
            <title><?echo $jdl?></title>
            <dc:creator><![CDATA[admin]]></dc:creator>
            <description></description>
            <content:encoded><![CDATA[

<p class="video"><iframe SRC="<?echo $vid?>" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=100% HEIGHT=500 allowfullscreen></iframe></p>

<p class="guide">
<table style="width: 100%;">
	<td style="text-align: left;">
		<a href="<?echo '/search?q='.substr($jdl,0,22);?>"><button>&larr; Episode Sebelumnya</button></a>
	</td>
	<td style="text-align: right;">
		<a href="<?echo '/search?q='.substr($jdl,0,22);?>"><button>Episode Selanjutnya &rarr;</button></a>
	</td>
</table>
</p>

<hr/>

<p><marquee><strong>Jika Pemutar Video Error,</strong> Silahkan Download Video Dengan Menekan Tombol di Bawah Ini!</marquee></p>

<p style="text-align: center;"><a href="<?echo $vid_url?>"><button style="display: block; width: 100%; font-size:24px;cursor: pointer;">Download Video</button></a></p>

<hr/>

<p style="text-align: center;"><img class="sheva-box-image" width="30%" src="<?echo $img?>"/></p>

<hr/>

<div class="sheva-sinopsis"><mark>Deskripsi</mark><br/>
<?echo $des?>
</div>

<script>
var ID = document.title
console.log(ID)
</script>

			
			]]></content:encoded>
            <excerpt:encoded><![CDATA[]]></excerpt:encoded>
            <wp:post_date><?echo $time?></wp:post_date>
            <wp:status>publish</wp:status>
            <wp:post_type>post</wp:post_type>
        </item>



<?
} //END LOOP
?>
    </channel>
</rss>
</textarea><hr/>
<button class="btn btn-lg btn-block btn-primary" onclick="saveDynamicDataToFile();">Export</button>
<script>
var s = document.createElement('script');
s.type = 'text/javascript';
s.src = 'https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js';
document.body.appendChild(s);

function saveDynamicDataToFile() {

	var userInput = document.getElementById("myText").value;
	
	var blob = new Blob([userInput], { type: "text/plain;charset=utf-8" });
	saveAs(blob, "myWork.xml");
}
</script>

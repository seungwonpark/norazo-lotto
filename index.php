<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="노라조 로또 성적표">
<meta name="keywords" content="노라조,로또,복권,운수,사주,팔자,예측,점지,추천,번호,추천번호,대박">
<meta name="author" content="seungwonpark">
<title>노라조 로또 성적표</title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

th {
	border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
	color: red;
}

h1 {
	font-size: 5.0vw;
	margin: 0px;
}

h3 {
	font-weight: normal;
	font-size: 1.5vw;
	margin: 0px;
}
a {
	color: blue;
	text-decoration: none;
}
</style>
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>
</head>
<body>
	<div align="center">
		<h1> <b>노라조 로또 성적표</b> </font> </h1>
		<h3> 매주 로또 발표날짜(토 21:00)에 자동 갱신됩니다. <img src="https://circleci.com/gh/seungwonpark/norazo-lotto.svg?style=shield"> </h3>
	</div>
	<div align="right">
		<a href="https://github.com/seungwonpark/norazo-lotto" target="_blank">This project on GitHub</a>
	</div>
	<table>
		<tr>
			<th><font color="black">회차</font></th>
			<th><font color="black">날짜</font></th>
			<th colspan="6"><font color="black">번호</font></th>
			<th><font color="black">보너스</font></th>
			<th><font color="black">맞은 개수</font></th>
			<th><font color="black">비고</font></th>
		</tr>
		<tr>
			<td><i>MV</i></td>
			<td>2015-02-22</td>
			<td><i>5</i></td>
			<td><i>9</i></td>
			<td><i>15</i></td>
			<td><i>22</i></td>
			<td><i>26</i></td>
			<td><i>43</i></td>
			<td colspan="3"></td>
		</tr>
		<?php
			$nipalzaya = array(0, 5, 9, 15, 22, 26, 43);
			
			$boolarray = Array(false => 'false', true => 'true'); // Temporary tool for development
			
			$most_recent = file_get_contents('data/mostrecent.txt');
			
			echo "\r\n";
			for($lottoNo = 639; $lottoNo <= $most_recent; $lottoNo++){ // since 639
				echo "\t\t" . '<tr>' . "\r\n";
				echo "\t\t\t" . '<td>' . $lottoNo . '</td>' . "\r\n";
				$file = fopen("data/" . $lottoNo . ".csv", "r");
				$data = fgetcsv($file);
				echo "\t\t\t" . '<td>' . $data[0] . '</td>' . "\r\n";
				$correct = 0;
				for($i = 1;$i < 7;$i++){ // test for each numbers of result
					$isCorrect[$i] = false;
					for($j = 1;$j < 7;$j++){
						if($data[$i] == $nipalzaya[$j]){
							$isCorrect[$i] = true;
							break;
						}
					}
					if($isCorrect[$i] == true){
						echo "\t\t\t" . '<th>' . $data[$i] . '</th>' . "\r\n";
						$correct++;
					}
					else{
						echo "\t\t\t" . '<td>' . $data[$i] . '</td>' . "\r\n";
					}
				}
				
				$isBonus = false;
				for($j = 1;$j < 7;$j++){
					if($data[7] == $nipalzaya[$j]){
						$isBonus = true;
					}
				}
				if($isBonus == true){
					echo "\t\t\t" . '<th>' . $data[7] . '</th>' . "\r\n";
				}
				else{
					echo "\t\t\t" . '<td>' . $data[7] . '</td>' . "\r\n";
				}
				echo "\t\t\t" . '<td>' . $correct . '</td>' . "\r\n";
				
				$result = 0;
				
				switch ($correct){
					case 6:
						$result = 1;
						break;
					case 5:
						if($isBonus == true){
							$result = 2;	
						}
						else{
							$result = 3;
						}
						break;
					case 4:
						$result = 4;
						break;
					case 3:
						$result = 5;
						break;
				}
				
				if($result == 0){ // not won
					echo "\t\t\t" . '<td>' . '</td>' . "\r\n";
				}
				else{
					echo "\t\t\t" . '<td>' . $result . '등' . '</td>' . "\r\n";
				}
				echo "\t\t" . '</tr>' . "\r\n";
			}
		?>
	</table>
	<br>
	
	<div align="center">
		<a class="twitter-share-button" href="https://twitter.com/share">Tweet</a>
		<br>
		<br>
		<br>
		<img src="nipalzaya.png" width="80%">
		<br>
		<h3>위 MV 캡처이미지의 저작권은 노라조에게 있습니다. <a href="https://www.youtube.com/watch?v=s0UjELAUMjE">니팔자야 MV 링크</a> </h3>
	</div>
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101585306-1', 'auto');
  ga('send', 'pageview');

</script>
</html>

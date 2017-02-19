<?php
  echo '
	<div class="sub" onmouseenter="this.id=\'hhh\';coo()" onmouseleave="cooo();this.id=\'\'" ontouchstart="this.id=\'hhh\';coo()" ontouchend="cooo();this.id=\'\'">
	<div class="subkind">'.$kind[$row["ki"]].'</div>
		<p class="subtitle">'.$row["na"].'</p>
		<div class="sub-img">
		<p class="sub-im subp">'.$row["des"].'</p>
			<div>
			<img alt="'.$row["na"].'" src="'.$row['img'].'">
			</div>
			<div class="sub-info0">
			<div>
				<a target="_blank" href="'. SITEROOT .'redirect/ourl/'.$row["id"].'">مـشـاهدة <i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
				<p class="subp">'.$row["des"].'</p>
			</div>
			</div>
			<div class="sub-info">
			<div>
				<a target="_blank" href="'. SITEROOT .'redirect/furl/'.$row["id"].'"><i class="fa fa-download fa-lg" aria-hidden="true"></i> تـحـمـيـل</a>
				<p class="subp">'.$row["des"].'</p>
			</div>
			</div>
			<div class="subcats">';
	foreach ($cat as $key => $value) {
		echo "<span>".$category[$value]."</span>";
	}
	echo '</div>
		</div>
	</div>
  ';
?>
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="container-fluid">
	<div class="row">
		<div class="col-md-12">
<?php
foreach ($gaji as $gj) :
  if($gj->id==1){
  		$krg_min=$gj->min;
  		$krg_max=$gj->max;
  		
  }
  if($gj->id==2){
  		$ckp_min=$gj->min;
  		$ckp_max=$gj->max;
  }
  if($gj->id==3){
  		$lbh_min=$gj->min;
  		$lbh_max=$gj->max;
  }
endforeach;

foreach ($ipk as $ip) :
  if($ip->id==1){
  		$jlk_min=$ip->min;
  		$jlk_max=$ip->max;
  		
  }
  if($ip->id==2){
  		$myn_min=$ip->min;
  		$myn_max=$ip->max;
  }
  if($ip->id==3){
  		$bgs_min=$ip->min;
  		$bgs_max=$ip->max;
  }
endforeach;

// --------------------------------------START DEBUG-------------
$stats=array("none");
 $inputgaji=4800000;
 if($inputgaji<=$krg_max){
	array_push($stats,"kurang");
	}
if($inputgaji>=$ckp_min&&$inputgaji<=$ckp_max){
	array_push($stats,"cukup");
 	}
if($inputgaji>=$krg_max){
	array_push($stats,"lebih");
 	}

 // print_r($stats);

$skor = []; 
$label = [];
foreach ($stats as $ket) {
	if(strcmp($ket, "kurang")==0){
		// echo "<br>masukkan rumus kurang<br>";
		if($inputgaji>=$ckp_min&&$inputgaji<$krg_max){
			$skor[]=($krg_max-$inputgaji)/($krg_max-$ckp_min);
		}
		if($inputgaji<$ckp_min){
			$skor[]=1;
		}
		$label[]="rendah";
	}
	if(strcmp($ket, "cukup")==0){
		// echo "<br>masukkan rumus cukup<br>";
		if($inputgaji>$ckp_min&&$inputgaji<$krg_max){
			$skor[]=($inputgaji-$ckp_min)/($krg_max-$ckp_min);
		}

		if($inputgaji>=$krg_max&&$inputgaji<$lbh_min){
			$skor[]=1;
		}
		if($inputgaji>$lbh_min&&$inputgaji<$ckp_max){
			$skor[]=($ckp_max-$inputgaji)/($ckp_max-$lbh_min);
		}
		$label[]="sedang";
	}
	if(strcmp($ket, "lebih")==0){
		// echo "<br>masukkan rumus lebih<br>";
		if($inputgaji>=$lbh_min&&$inputgaji<$ckp_max){
			$skor[]=($inputgaji-$lbh_min)/($ckp_max-$lbh_min);
		}

		if($inputgaji>=$ckp_max){
			$skor[]=1;
		}
		$label[]="tinggi";
	}
}

//print_r($skor);
$stat=$skor[0];
$idxlabel=0;
foreach ($skor as $sc) {
	if ($sc>$stat) {
		$stat=$sc;
		$idxlabel=$idxlabel+1;
	}
}

// echo "maka nilai nya".$stat."dengan Keputusan = ".$label[$idxlabel];


// echo "<br>";
// echo $krg_min.'<br>';
// echo $krg_max.'<br>';
// echo $ckp_min.'<br>';
// echo $ckp_max.'<br>';
// echo $lbh_min.'<br>';
// echo $lbh_max.'<br>';
// -------------------------------END DEBUG -------------------
?>

			<div class="panel panel-primary">
				<div class="panel-heading">Data Mhs</div>
				<div class="panel-body">
					<div class="col-md-12" style="padding-bottom: 15px;">
						<a href="<?php echo base_url('home/formtambah'); ?>">
							<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button> 
						</a>
					</div>

					<div class="col-md-12" id="mhs">

						<div class="table-responsive">
							<table class="table table-bordered table-hover">
					
								<thead>
								
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Gaji</th>
										<th>IPK</th>
										<th>Keputusan Gaji</th>
										<th>Keputusan IPK</th>
											<th>Priority Ranked</th>
										<th>Action</th>
										
									</tr>
								</thead>
	<input class="search" placeholder="Search" />
 
     <button class="sort" data-sort="gaji">
    Sort by Gaji
  </button>	
   <button class="sort" data-sort="rank">
    Sort by rank
  </button>	
  			
 <tbody class="list">
<?php
$no = 1;
foreach($mhs as $db) : 
// inisial gaji
$stats=array("none");
 $inputgaji=$db->gaji;
 if($inputgaji<=$krg_max){
	array_push($stats,"kurang");
	}
if($inputgaji>=$ckp_min&&$inputgaji<=$ckp_max){
	array_push($stats,"cukup");
 	}
if($inputgaji>=$lbh_min){
	array_push($stats,"lebih");
 	}


$ipstats=array("none");
 $inputipk=$db->ipk;
 if($inputipk<=$jlk_max){
	array_push($ipstats,"jelek");
	}
if($inputipk>=$myn_min&&$inputipk<=$myn_max){
	array_push($ipstats,"mayan");
 	}
if($inputipk>=$bgs_min){
	array_push($ipstats,"bagus");
 	}

$skorip = []; 
$labelip = [];
foreach ($ipstats as $ipket) {
	
	if(strcmp($ipket, "jelek")==0){
		// echo "jelek";
		if($inputipk<$myn_min){
			$skorip[]=1;
		}
		// echo "<br>masukkan rumus kurang<br>";
		if($inputipk>=$myn_min&&$inputipk<$jlk_max){
			$skorip[]=($jlk_max-$inputipk)/($jlk_max-$myn_min);
		}
		
		$labelip[]="jelek";
	}
	if(strcmp($ipket, "mayan")==0){
		// echo "mayan";
		// echo "<br>masukkan rumus cukup<br>";
		if($inputipk>$myn_min&&$inputipk<$jlk_max){
			$skorip[]=($inputipk-$myn_min)/($jlk_max-$myn_min);
		}
		if($inputipk>$bgs_min&&$inputipk<$myn_max){
			$skorip[]=($myn_max-$inputipk)/($myn_max-$bgs_min);
		}
		$labelip[]="mayan";
	}
	if(strcmp($ipket, "bagus")==0){
		// echo "bagus";
		// echo "<br>masukkan rumus lebih<br>";
		if($inputipk>=$bgs_min&&$inputipk<$myn_max){
			$skorip[]=($inputipk-$bgs_min)/($myn_max-$bgs_min);
		}

		if($inputipk>=$myn_max&&$inputipk<=4){
			$skorip[]=1;
		}
		$labelip[]="bagus";
	}
}



 // print_r($stats);

$skor = []; 
$label = [];
foreach ($stats as $ket) {
	if(strcmp($ket, "kurang")==0){
		// echo "<br>masukkan rumus kurang<br>";
		if($inputgaji>=$ckp_min&&$inputgaji<$krg_max){
			$skor[]=($krg_max-$inputgaji)/($krg_max-$ckp_min);
		}
		if($inputgaji<$ckp_min){
			$skor[]=1;
		}
		$label[]="rendah";
	}
	if(strcmp($ket, "cukup")==0){
		// echo "<br>masukkan rumus cukup<br>";
		if($inputgaji>$ckp_min&&$inputgaji<=$krg_max){
			$skor[]=($inputgaji-$ckp_min)/($krg_max-$ckp_min);
		}

		if($inputgaji>$lbh_min&&$inputgaji<$ckp_max){
			$skor[]=($ckp_max-$inputgaji)/($ckp_max-$lbh_min);
		}
		$label[]="standar";
	}
	if(strcmp($ket, "lebih")==0){
		// echo "<br>masukkan rumus lebih<br>";
		if($inputgaji>=$lbh_min&&$inputgaji<$ckp_max){
			$skor[]=($inputgaji-$lbh_min)/($ckp_max-$lbh_min);
		}

		if($inputgaji>=$ckp_max){
			$skor[]=1;
		}
		$label[]="tinggi";
	}
}

$tampung=[];
$L_max=[];
$TL_max=[];
foreach ($rules as $rule) {
	// gabung label dari rules
	$rulestr=$rule->gaji.$rule->ip;
	// end
	for ($x = 0; $x <sizeof($skor); $x++) {
		// loopip
    	for ($i = 0; $i <sizeof($skorip); $i++) {
    // initial min skor salah satu
    $i_min=$skor[$x];

    // $n_gj=$skor[$x];
    // $n_ip=$skorip[$i];
    // // gabung label ip dan gaji dari hasil seleksi alam
   	$resstr=$label[$x].$labelip[$i];
    // cek jika ada yg cocok dgn rules
    if(strcmp($rulestr, $resstr)==0){

    	//echo $rulestr."dan".$resstr."=".$rule->keputusan."<br>";
    	// cek skor minimum antara gaji dna ipk
    	
    	if($i_min<$skorip){
    		$i_min=$skorip[$i];
    	}

    	if($rule->keputusan=='L'){
    		$L_max[]=$i_min;
    	}
    	if($rule->keputusan=='TL'){
    		$TL_max[]=$i_min;
    	}


    	// 
    	//echo $i_min;
    	break;
   	 		}
   	 		// end dengan rules
    	}
    	// end loop ip
	} 
}

if(!empty($TL_max)){
	$maxTL=(max($TL_max))*(20+30+40);
}else{
	$maxTL=0;
	$TL_max[]=0;
}


if(!empty($L_max)){
	$maxL=(max($L_max))*(80+90+100);
}else{
	$maxL=0;
	$L_max[]=0;
}

$pembilang=($maxTL+$maxL);
$rank=$pembilang/((max($TL_max)*3)+(max($L_max)*3));
//echo "rank = ".$rank;






// RULES



// print_r($skor);
// $stat=$skor[0];
// $idxlabel=0;
// foreach ($skor as $sc) {
// 	if ($sc>$stat) {
// 		$stat=$sc;
// 		$idxlabel=$idxlabel+1;
// 	}
// }

// echo "maka nilai nya".$stat."dengan Keputusan = ".$label[$idxlabel];


?>
	<tr>
	<td><?php echo $no; ?></td>
	<td class="nama"><?php echo $db->nama; ?></td>
	<td class="gaji"><?php echo $db->gaji; ?></td>
	<td class="ipk"><?php echo $db->ipk; ?></td>
	<td><?php  

	$idxlabel=0;
	
	foreach ($skor as $sc) {
			echo $skor[$idxlabel]." (".$label[$idxlabel].") ";
			$idxlabel=$idxlabel+1;

	}

	?></td>

	<td><?php  

	$idxlabel2=0;
	foreach ($skorip as $scip) {
			echo number_format((float)$skorip[$idxlabel2],2,'.','')." (".$labelip[$idxlabel2].") | ";
			$idxlabel2=$idxlabel2+1;
	}
	?></td>
<td class="rank"><?php echo $rank; ?></td>
	<td>
	<a href="<?php echo base_url('home/formedit/'.$db->id); ?>"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
	<a href="<?php echo base_url('home/hapusdata/'.$db->id); ?>" onclick="return confirm('Anda yakin hapus ?')"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></a>
	</td>
	</tr>
	<?php
	$no++;
	endforeach;
	?>
				


								</tbody>

							</table>
<ul class="pagination"></ul>

<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>	
<script type="text/javascript">
	var options = {
  valueNames: [ 'nama', 'ipk','gaji','rank' ],
  page: 10,
  pagination: true
};

var userList = new List('mhs', options);



</script>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	/*print_r($database);

	echo "<br> <br>";

	foreach ($database as $key => $value)
	{
		echo $key;
		echo $value->kdmobil;
	}

	echo "<br> <br>";

	$lol = 	[
			[
				'nama' => 'ardi',
				'kelas' => '2'
			],
			[
				'nama' => 'nesia',
				'kelas' => '3'
			]
			];

	print_r($lol);

	echo $lol['0']['nama'];

	echo "<br> <br>";

	foreach ($lol as $key => $value) 
	{
		echo $value['nama'];
	}

	echo "<br> <br>";

	$lol = 	['nama' => 'ardi', 'kelas' => '2'];

	foreach ($lol as $key => $value) 
	{
		echo $key;
		echo $value;
	} */
?> 

<?php
    if(!$usercheck)
    {
        header("Location: index.php");
    }
    $pdf=$_GET['id'];//echo$pdf;
	$newpdf=substr($pdf,-3);
	if($newpdf=="pdf"){
		echo'<embed src="';echo$pdf.'" width="100%" height="400" type="application/pdf"><hr>';
	}else{
		echo'<img src="';echo$pdf.'" alt="Problem Set" width="100%" height="100%" class="img-thumbnail">';
	}
		
	if (empty($_GET['contestID'])) {
    // no data passed by get
	}else
		$contestID=$_GET['contestID'];//echo$contestID;
	

?>

    
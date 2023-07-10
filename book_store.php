



<?php
// error_reporting('0');
   /*$arr = [
        'A'=>3,
        'B'=>3,
        'C'=>1,
        'D'=>1,
        'E'=>1,
    ];
	*/

    if(isset($_POST['subimt'])){
	echo "<pre>";
	
	$A = $_POST['A'];
	$B = $_POST['B'];
	$C = $_POST['C'];
	$D = $_POST['D'];
	$E = $_POST['E'];
	
	
	//print_r($B['B']);exit;
	if($A['A']==''){
		$A=[];
	}
	if($B['B']==''){
		$B=[];
	}
	if($C['C']==''){
		$C=[];
	}
	if($D['D']==''){
		$D=[];
	}if($E['E']==''){
		$E=[];
	}
	
	
	$arr = array_merge($A,$B,$C,$D,$E);
	//print_r(array_merge($A,$B,$C,$D,$E));
// exit;
	
	
    
    $grouped_items = [];


    while(count($arr)){

        $tmp_arr = [];

        foreach($arr as $type=>$qty){

            $tmp_arr[$type] = 1;

            $arr[$type]--;
            if($arr[$type] == 0){
                unset($arr[$type]);
            }


        }        

        $grouped_items[] = $tmp_arr;

    }


    $final_grouped_items = calc_price($grouped_items);
    
    echo "<pre>";
	
	//print_r($final_grouped_items);
	$sum = 0;
	foreach($final_grouped_items as $singarr){
		
       $sum+= array_sum($singarr);	
	
	// print_r(array_merge($singarr));
	}
	?>
<p style="font-size:20px;text-align:center;"><b>Total Price:</b><?php echo $sum;?></p>   
<?php
   //print_r("Total Price:".$sum);
    // print_r($final_grouped_items);

}
    function calc_price($grouped_items){

        $res = $grouped_items;

        
        foreach($res as $k=>$group){

            $discount = 0;

            if(count($group) == 2){
                $discount = 5;
            }else if(count($group) == 3){
                $discount = 10;
            }else if(count($group) == 4){
                $discount = 20;
            }else if(count($group) == 5){
                $discount = 25;
            }

            foreach($group as $type=>$qty){

                $group[$type] = ((100-$discount) / 100) * 8;

            }

            $res[$k]=$group;

        }

      //$res = array_sum($res[0]);
        
		
		return $res;
    }

?>


<main>
  <form action='' method='post'>
    <div>
      <label >Hindi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input  name='A[A]' type="number"  placeholder="Select Number Of Book" min="0" />
    </div>
    <div>
      <label >English</label>
      <input  name='B[B]' type="number"  placeholder="Select Number Of Book" min="0" />
    </div>
	<div>
      <label >Urdu</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input  name='C[C]' type="number"  placeholder="Select Number Of Book" min="0" />
    </div>
	<div>
      <label >Arabic</label>&nbsp;
      <input  name='D[D]' type="number"  placeholder="Select Number Of Book" min="0" />
    </div>
	<div>
      <label >Japanese</label>
      <input  name='E[E]' type="number"  placeholder="Select Number Of Book" min="0" />
    </div>
    
   
    
    <div class="full-width">
      <button style="margin-left: 360px;" type="submit" name='subimt'>Buy Now</button>
      
    </div>
  </form>
</main>

<style>
body {
  margin: 0;
  background-color: hsl(0, 0%, 98%);
  color: #333;
  font: 100% / normal sans-serif;
}

main {
  margin: 0 auto;
  padding: 4rem 0;
  width: 90%;
  max-width: 60rem;
}

form {
  box-sizing: border-box;
  padding: 2rem;
  border-radius: 1rem;
  background: #e6e6e6;
  border: 4px solid hsl(0deg 6.09% 71.49%);
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  
}

.full-width {
  grid-column: span 2;
}
</style>

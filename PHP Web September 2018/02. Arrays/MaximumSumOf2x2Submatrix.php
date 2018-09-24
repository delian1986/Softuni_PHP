<?php
list($rows,$cols)=explode(", ",readline());
$matrix=[];
$bestSquare=[];
$bestSum=PHP_INT_MIN;

for ($i=0;$i<$rows;$i++){
    $matrix[]=explode(", ",readline());
}

for ($row=0;$row<count($matrix)-1;$row++){
    for ($col=0;$col<count($matrix[0])-1;$col++){
        $currElement1=$matrix[$row][$col];
        $currElement2=$matrix[$row][$col+1];
        $currElement3=$matrix[$row+1][$col];
        $currElement4=$matrix[$row+1][$col+1];

        $currSum=$currElement1+$currElement2+$currElement3+$currElement4;
        if ($bestSum<$currSum){
            $bestSum=$currSum;
            $bestSquare=[];
            $bestSquare[]=[$currElement1,$currElement2];
            $bestSquare[]=[$currElement3,$currElement4];
        }
    }
}

echo implode(" ",$bestSquare[0]).PHP_EOL;
echo implode(" ",$bestSquare[1]).PHP_EOL;
echo $bestSum;

<?php
    $lost=0;
    $won=0;
    $total=0;
    $tied=0;

        $arr=array(1=>'Stone',2=>'Paper',3=>'Scissor');
        $user=$_REQUEST['choice'];
        $computer= rand(1,3);

        echo "Your Turn";
            if ($uscore==$cscore)
            {
                echo "tied";
                $tied++;
            }
            elseif($uscore=='2'&&$cscore=='3')
            {
                echo 'lost';
                $lost++;
            }
            elseif($uscore=='1' && $computer=='2')
            {
                echo 'lost';
                $lost++;
            }
            elseif($uscore=='2'&&$cscore=='1')
            {
                echo 'won';
                $won++;
            }
            elseif($uscore=='1'&&$cscore=='3')
            {
                echo 'won';
                $won++;
            }
            elseif($uscore=='3'&&$cscore=='2')
            {
                echo "won";
                $won++;
            }
            elseif($uscore=='3'&&$cscore=='1')
            {
                echo "lost";
                $lost++;
            }

            $total++;

  ?>  

<?php
# PHP Calendar (version 2.3), written by Keith Devens
# http://keithdevens.com/software/php_calendar
#  see example at http://keithdevens.com/weblog
# License: http://keithdevens.com/software/license

setlocale(LC_ALL, 'pt_BR', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array()){

    $meses['january'] = "janeiro";
    $meses['february'] = "fevereiro";
    $meses['march'] = "março";
    $meses['april'] = "abril";
    $meses['may'] = "maio";
    $meses['june'] = "junho";
    $meses['july'] = "julho";
    $meses['august'] = "agosto";
    $meses['september'] = "setembro";
    $meses['october'] = "outubro";
    $meses['november'] = "novembro";
    $meses['december'] = "dezembro";

    $meses['janeiro'] = "janeiro";
    $meses['fevereiro'] = "fevereiro";
    $meses['março'] = "março";
    $meses['abril'] = "abril";
    $meses['maio'] = "maio";
    $meses['junho'] = "junho";
    $meses['julho'] = "julho";
    $meses['agosto'] = "agosto";
    $meses['setembro'] = "setembro";
    $meses['outubro'] = "outubro";
    $meses['novembro'] = "novembro";
    $meses['dezembro'] = "dezembro";


    $dia_semana['Sun'] = "Dom";
    $dia_semana['Mon'] = "Seg";
    $dia_semana['Tue'] = "Ter";
    $dia_semana['Wed'] = "Qua";
    $dia_semana['Thu'] = "Qui";
    $dia_semana['Fri'] = "Sex";
    $dia_semana['Sat'] = "Sáb";

    $dia_semana['dom'] = "Dom";
    $dia_semana['seg'] = "Seg";
    $dia_semana['ter'] = "Ter";
    $dia_semana['qua'] = "Qua";
    $dia_semana['qui'] = "Qui";
    $dia_semana['sex'] = "Sex";
    $dia_semana['sáb'] = "Sáb";


    $first_of_month = gmmktime(0,0,0,$month,1,$year);

    $day_names = array(); 
    for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) 
        $day_names[$n] = gmstrftime('%A',$t); 

    list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
    $weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day

    $calendar = '<table class="calendar table">';

    $calendar .= "<tr>";
    $calendar .= "<th> Dom </th>";
    $calendar .= "<th> Seg </th>";
    $calendar .= "<th> Ter </th>";
    $calendar .= "<th> Qua </th>";
    $calendar .= "<th> Qui </th>";
    $calendar .= "<th> Sex </th>";
    $calendar .= "<th> Sáb </th>";
    $calendar .= "</tr>";
       
    if($weekday > 0){ 
        $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days
    }

    for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){

        if($weekday == 7){
            $weekday   = 0; #start a new week
            $calendar .= "</tr>\n<tr>";
        }

        $hoje = strtotime(date('Y-m-d'));
        $dia = strtotime($year.'-'.$month.'-'.$day);

        if ($hoje == $dia) {
            $class="hoje";
        }else{
            $class="";
        }

        if(isset($days[$day]) and is_array($days[$day])){

            @list($link, $classes, $content, $title) = $days[$day];

            //if(is_null($content))  $content  = $day;

            $dia = str_pad($day, 2, '0',  STR_PAD_LEFT);
            $mes = str_pad($month, 2, '0',  STR_PAD_LEFT);

            $calendar .= '<td class="'. $class .'">'.
                '<span class="dia">'. $day .'</span>'.
                $content
			.'</td>';
        }

        else{ 
            $dia = str_pad($day, 2, '0',  STR_PAD_LEFT);
            $mes = str_pad($month, 2, '0',  STR_PAD_LEFT);
            $calendar .= "<td class='$class'> <span class='dia'> $day </span> </td>";
        }
    }

    if($weekday != 7){ 
        $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days 
    }

    return $calendar."</tr>\n</table>\n";
}
?> 
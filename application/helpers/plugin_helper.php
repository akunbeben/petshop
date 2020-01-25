<?php

function rupiah($number){
	$output = "Rp " . number_format($number,2,',','.');
	return $output;
}

function FormatNoTrans($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "KP0000" . $num;
            break;
        case 2:
            $NoTrans = "KP000" . $num;
            break;
        case 3:
            $NoTrans = "KP00" . $num;
            break;
        case 4:
            $NoTrans = "KP0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function OtomatisID()
{
    $ci = &get_instance();
    $ci->db->from('sales');
    $result = $ci->db->get()->num_rows();
    return $result;
}
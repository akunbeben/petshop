<?php

function rupiah($number){
	$output = "Rp " . number_format($number,2,',','.');
	return $output;
}

function FormatNoTrans($num, $tipe)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "DOC/0000" . $num . $tipe . date('/d/m/Y');
            break;
        case 2:
            $NoTrans = "DOC/000" . $num . $tipe . date('/d/m/Y');
            break;
        case 3:
            $NoTrans = "DOC/00" . $num . $tipe . date('/d/m/Y');
            break;
        case 4:
            $NoTrans = "DOC/0" . $num . $tipe . date('/d/m/Y');
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function invAutoID()
{
    $ci = &get_instance();
    $ci->db->from('laporan');
    $ci->db->where('doc_type', 1);
    $result = $ci->db->get()->num_rows();
    return $result;
}

function stokAutoID()
{
    $ci = &get_instance();
    $ci->db->from('laporan');
    $ci->db->where('doc_type', 2);
    $result = $ci->db->get()->num_rows();
    return $result;
}

function dd($val)
{
    return var_dump($val);
    die;
}
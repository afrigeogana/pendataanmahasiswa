<?php 
    function rupiah($uang)
    {
        $uang= "Rp" . number_format($uang,0,",",".");
        return $uang;
    }
    function getNamaHari($tgl)
    {
        $arrHari = array("minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $namahari = date ("w", strtotime($tgl));
        return $arrHari[$namahari];
    }
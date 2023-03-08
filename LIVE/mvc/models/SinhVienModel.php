<?php
class SinhVienModel extends DB{
    public function GetSV() {
        // connect db, fb, mongo
        return "Nguyen Huu Hoang";
    }

    public function Tong($n, $m) {
        return $n + $m;
    }

    public function sinhvien() {
        $qr = "SELECT * FROM sinhvien";
        return mysqli_query($this->con, $qr);
    }
}
?>
<?php
class HalamanUjian extends Controller
{
    public function index()
    {
            $data['soal'] = $this->model('Halamanujian_Model')->getAllSoal();
            $data['jumlahUser'] = $this->model('Halamanujian_Model')->jumlahUser();
            $this->view('user/halamanujian',$data);
    }
    public function Nilai()
    {
        if(isset($_POST['kirim'])){
            //echo "<pre>";print_r($_POST);die;
            $score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
            for($i=1;$i<=$_POST["jmlsoal"];$i++){
                $nomor=$_POST["soal".$i];
                $jawaban=$_POST["jawab".$i];
                
                $cek=$this->model('Halamanujian_Model')->cekjawaban($nomor,$jawaban);
                if($cek["total_count"]){
                    $benar++;
                }else{
                    $salah++;
                }
            }
            $jumlah_soal=$_POST["jmlsoal"];
            $score = 100/$jumlah_soal*$benar;
            $hasil = number_format($score,1);
            echo $hasil;die;
        }
    }
}

<?php
class HalamanUjian extends Controller
{
    public function index($idtugas)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }else{
            $data['soal'] = $this->model('Halamanujian_Model')->getAllSoal($idtugas);
            $data['jumlahUser'] = $this->model('Halamanujian_Model')->jumlahSoal($idtugas);
            $this->view('user/halamanujian',$data);
        }
    }
    public function Nilai()
    {
        if(isset($_POST['kirim'])){
            //echo "<pre>";print_r($_POST);die;
            $score=0;
			$benar=0;
			$salah=0;
            for($i=1;$i<=$_POST["jmlsoal"];$i++){
                $nomor=$_POST["soal".$i];
                $jawaban=$_POST["jawab".$i];
                $idtugas=$_POST["idtugas"];
                
                $cek=$this->model('Halamanujian_Model')->cekjawaban($nomor,$jawaban,$idtugas);
                if($cek["total_count"]){
                    $benar++;
                }else{
                    $salah++;
                }
            }
            $jumlah_soal=$_POST["jmlsoal"];
            $score = 100/$jumlah_soal*$benar;
            $hasil = number_format($score,1);
            $this->model('Halamanujian_Model')->catatnilai($idtugas,$hasil);
            header('Location:'. BASEURL .'/home');
        }
    }
}

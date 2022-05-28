<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\FasilitasKamar;

class FasilitasKamarController extends BaseController
{
    public function index()
    {
        //
    }
    public function tampilfasilitaskamar()
    {
    if(!session()->get('sudahkahLogin')){

        return redirect()->to('/petugas');
        exit;
    }
    // cek apakah yang login bukan admin ?
    if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
    }
    $Datafasilitas = New FasilitasKamar;
    $data['ListFasilitaskamar'] = $Datafasilitas->findAll();
    return view('Fasilitaskamar/tampil-fasilitas-kamar',$data);
}
public function tambahfasilitaskamar(){
    if(!session()->get('sudahkahLogin')){
    return redirect()->to('/petugas');
    exit;
    }
    // cek apakah yang login bukan admin ?
    if(session()->get('level')!='admin'){
    return redirect()->to('/petugas/dashboard');
    exit;
    }
    return view('Fasilitaskamar/tambah-fasilitas-kamar');
    }
    public function simpanfasilitaskamar(){
        if(!session()->get('sudahkahLogin')){
        return redirect()->to('/petugas');
        exit;
    }
    // cek apakah yang login bukan admin ?
    if(session()->get('level')!='admin'){
    return redirect()->to('/petugas/dashboard');
    exit;
}
helper(['form']);
$upload = $this->request->getFile('txtInputFoto');
$upload->move(WRITEPATH . '../public/gambar/');
$Datafasilitas = New FasilitasKamar;
$datanya=[  'nama_fasilitas_kamar'=>$this->request->getPost('txtInputNama'),   
            'deskripsi'=>$this->request->getPost('txtInputDeskripsi'),
            'foto'=> $upload->getName()
        ];
            $Datafasilitas->insert($datanya);
            return redirect()->to('/fasilitas-kamar');
        }
        public function editFasilitasKamar($id_fasilitas_kamar){
            //cek sudahkah login?
            if(!session()->get('sudahkahLogin')){
                return redirect ()->to('/petugas/dashboard');
                exit;
            }
            //
            $Datafasilitas=New FasilitasKamar;
            
                $data['detailFasilitasKamar']=$Datafasilitas->where('id_fasilitas_kamar',$id_fasilitas_kamar)->findAll();
                return view('Fasilitaskamar/edit-fasilitas-kamar',$data);
                
        }
        public function updatefasilitaskamar(){
            // cek apakah sudah login
            if(!session()->get('sudahkahLogin')){
            return redirect()->to('/petugas');
            exit;
            }
            // cek apakah yang login bukan admin ?
            if(session()->get('level')!='admin'){
            return redirect()->to('/petugas/dashboard');
            exit;
            }
            $Datafasilitas = New FasilitasKamar;
            helper(['form']);
            $data=[
                'nama_fasilitas_kamar'=>$this->request->getPost('txtInputNama'), 
                'deskripsi'=>$this->request->getPost('txtInputDeskripsi'),
            ];
            $Datafasilitas->update($this->request->getPost('id_fasilitas_kamar'), $data);
            return redirect()->to('/fasilitas-kamar');
            }
            public function hapusfasilitaskamar($id_fasilitas_kamar){
                if(!session()->get('sudahkahLogin')){
                return redirect()->to('/petugas');
                exit;
            }
            // cek apakah yang login bukan admin ?
            if(session()->get('level')!='admin'){
                return redirect()->to('/petugas/dashboard');
                exit;
            }
            $Datafasilitas = New FasilitasKamar;
            $syarat=['id_fasilitas_kamar'=>$id_fasilitas_kamar];
            $infoFile=$Datafasilitas->where($syarat)->find();
            //Hapus Foto
            unlink('gambar/'.$infoFile[0]['foto']);
            //Hapus Data 
            $Datafasilitas->where('id_fasilitas_kamar',$id_fasilitas_kamar)->delete();
            return redirect()->to('/fasilitas-kamar');
        }     
        public function editfoto($id_fasilitas_kamar){
            // cek apakah sudah login ?
            if(!session()->get('sudahkahLogin')){
            return redirect()->to('/petugas');
            exit;
            }
            // cek apakah yang login bukan admin ?
            if(session()->get('level')!='admin'){
            return redirect()->to('/petugas/dashboard');
            exit;
            }
            // cek apakah yang login bukan admin ?
            if(session()->get('level')!='admin'){
            return redirect()->to('/petugas/dashboard');
            exit;
            }
            $Datafasilitas = New FasilitasKamar;
            $data['detailfasilitasKamar']=$Datafasilitas->where('id_fasilitas_kamar',$id_fasilitas_kamar)->findAll();
            return view('Fasilitaskamar/edit-foto',$data);
            }
            public function updatefoto(){
                if(!session()->get('sudahkahLogin')){
                    return redirect()->to('/petugas');
                    exit;
                }
                // cek apakah yang login bukan admin ?
                if(session()->get('level')!='admin'){
                    return redirect()->to('/petugas/dashboard');
                    exit;
                }
                helper(['form']);
                $Datafasilitas = New FasilitasKamar;
                $syarat = $this->request->getPost('foto');
                unlink('gambar/'.$syarat);
                $upload = $this->request->getFile('txtInputFoto');
                $upload->move(WRITEPATH . '../public/gambar/');
                $data = ['foto'=>$upload->getName()];
                $Datafasilitas->update($this->request->getPost('txtInputNo'),$data);
                return redirect()->to('/fasilitas-kamar');
            }
}
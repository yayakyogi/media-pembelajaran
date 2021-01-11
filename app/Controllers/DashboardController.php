<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MateriModel;

class DashboardController extends Controller
{
    public function index(){
        $model = new MateriModel();
        $data = $model->getMateri()->getResult();
        //$count = getCount($data);
        echo view('admin/index',['materi'=>$data]);
    }
    public function save(){
        // buat objek baru
        $model = new MateriModel();

        // tangkap file img dan materi
        $file_img    = $this->request->getFile('materi_img');
        $file_materi = $this->request->getFile('materi_file');
        
        // Validasi
        $validated = $this->validate([
            'materi_name' => [
                'rules' => 'required',
                'errors' => ['required' => 'Field nama materi tidak boleh kosong']
            ],
            'materi_img' => [
                'rules' => 'required',
                'mime_in[image/jpg,image/jpeg/image/png]',
                'errors' => [
                    'required' => 'Field tidak boleh kosong',
                    'mime_in' => 'Ektensi image thumbnail tidak diizinkan'
                ]
            ],
            'mataeri_file' => [
                'rules' => 'required',
                'mime_in[application/pdf,application/zip]',
                'errors' => [
                    'required' => 'Field tidak boleh kosong',
                    'mime_in' => 'Ektensi modul tidak diizinkan'
                ]
            ],
        ]);
        if(!$validated){
            session()->setFlashdata('message-error','Ada kesalahan saat mengupload data');
            return redirect()->to('/dashboard');
        }
        else{
            // dapatkan nama dari file img dan materi
            $materi_img  = $file_img->getName();
            $materi_file = $file_materi->getName();

            // simpan data ke dalam array
            $data = array(
                'materi_name' => $this->request->getPost('materi_name'),
                'materi_img'  => $materi_img,
                'materi_file' => $materi_file,
            );

            // pindahkan file yang ditangkap ke foler public
            $file_img->move(ROOTPATH.'public/upload-file/img-thumbnail',$materi_img);
            $file_materi->move(ROOTPATH.'public/upload-file/modul',$materi_file);

            // simpan data ke dalam model saveMateri
            $model->saveMateri($data);
            // tampilkan pesan sukses
            session()->setFlashdata('message','Data berhasul disimpan');
            // redirect lagi ke halaman route dashboard
            return redirect()->to('/dashboard');
        }
    }
    
    public function edit($id){
        $model = new MateriModel();
        $data['post'] = $model->where('materi_id',$id)->get()->getRowArray();
        return view('admin/edit-materi',$data);
    }
    public function update(){
        // include helper form
        helper(['form']);
        // membuat objek dari MateriModel
        $model = new MateriModel();
        // tagnkap data dari form
        $id = $this->request->getPost('materi_id');
        $file_img = $this->request->getFile('materi_img');
        $file_materi = $this->request->getFile('materi_file');
        // deklarasi variabel img dan moudl
        $img = "";
        $modul="";
        // isi variabel img dan modul dengan data file yang didapat dari form
        $img = $file_img->getName();
        $modul = $file_materi->getName();
        // Jika semua file kosong
       if($img=="" && $modul==""){
            // tampung data di array
            $data = array('materi_name' => $this->request->getPost('materi_name'));
            // memanggil fungsi updateMateri di model MateriModel
            $model->updateMateri($data,$id);
            // membuat pesan sukses di halaman dashboard
            session()->setFlashdata('message','Sukses mengubah data');
            // redirect lagi kehalaman dashboard
            return redirect()->to('/dashboard');
        }

        // Jika file img tidak kosong dan file modul kosong
        else if($img!="" && $modul==""){
            // memvalidasi terlebih dahulu data dari form sebelum di oleh database
            $validated = $this->validate([
                'materi_name' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Field nama materi tidak boleh kosong']
                ],
                'materi_img' => [
                    'mime_in[materi_img,image/jpg,image/jpeg,image/png]',
                    'errors' => ['mime_in' => 'Ektensi file di field Gambar Thumbnail tidak di dizinikan']
                ],
            ]);
            // Cek jika tidak sesuai dengan validasi
            if(!$validated){
                return view('admin/page-error',[
                    'validation' => $this->validator,
                    'id' => $id
                ]);
            }
            // Jika rule sesuai dengan validasi
            else{
                // Simpan data dari form ke dalam array
                $data = array(
                    'materi_name' => $this->request->getPost('materi_name'),
                    'materi_img' => $img
                );
                // Pindahkan file ke folder public
                $file_img->move(ROOTPATH.'public/upload-file/img-thumbnail',$img);
                // buat pesan sukses dengan session flash
                session()->setFlashdata('message','Sukses mengubah data');
                // panggil fungsi updateMateri yang ada di model MateriModel untuk menyimpan perubahan data di database
                $model->updateMateri($data,$id);
                // redirect lagi ke halaman dashboard
                return redirect()->to('/dashboard');
            }
        }

        // Jika file img kosong dan file modul tidak ksong
        else if($img=="" && $modul!=""){
            /*
             * PENJELASAN CODING SAMA SEPERTI DI ATAS HANYA BERBEDA FIELDNYA SAJA
             */
            $validated = $this->validate([
                'materi_name' => [
                    'rules' => 'required',
                    'errors' => ['required','Field nama materi tidak boleh kosong']
                ],
                'materi_file' => [
                    'mime_in[materi_file,application/pdf,application/zip]',
                    'errors' => ['mime_in'=>'Ekstensi file di field Modul tidak di disizinkan']
                ],
            ]);
            if(!$validated){
                return view('admin/page-error',[
                    'validation' => $this->validator,
                    'id' => $id
                ]);
            }
            else{
                $data = array(
                    'materi_name' => $this->request->getPost('materi_name'),
                    'materi_file' => $modul
                );
                $file_materi->move(ROOTPATH.'public/upload-file/modul',$modul);
                session()->setFlashdata('message','Sukses mengubah data');
                $model->updateMateri($data,$id);
                return redirect()->to('/dashboard');
            }
        }
        // Jika field img dan modul tidak kosong
        else{
            $validated = $this->validate([
                'materi_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Field nama materi tidak boleh kosong'
                    ]
                ],
                'materi_img' => [
                    'mime_in[materi_img,image/jpg,image/jpeg,image/png]',
                    'errors' => ['mime_in' => 'Ektensi file di field Gambar Thumbnail tidak di izinkan']
                ],
                'materi_file' => [
                    'mime_in[materi_file,application/zip,application/pdf]',
                    'errors' => ['mime_in' => 'Ektensi file di field Modul tidak di izinkan']
                ],
            ]);
            if(!$validated){
                // Kirim pesan error ke page error
                return view('admin/page-error',[
                    'validation' => $this->validator,
                    'id' => $id
                ]);
            }
            else{
               // echo "Validiasi Oke";
                $data = array(
                    'materi_name' => $this->request->getPost('materi_name'),
                    'materi_img' => $img,
                    'materi_file' => $modul
                );
                $file_img->move(ROOTPATH.'public/upload-file/img-thumbnail',$img);
                $file_materi->move(ROOTPATH.'public/upload-file/modul',$modul);
                session()->setFlashdata('message','Data berhasil di update');
                $model->updateMateri($data,$id);
                return redirect()->to('/dashboard');
            }
        }
    }
    public function delete(){
        $model = new MateriModel();
        $id = $this->request->getPost('materi_id');
        $model->deleteMateri($id);
        session()->setFlashdata('message','Data berhasil dihapus');
        return redirect()->to('/dashboard');
    }
}

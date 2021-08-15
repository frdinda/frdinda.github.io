<?php

namespace App\Controllers\Nomor;

use App\Controllers\BaseController;
use App\Models\SuratModel;
use App\Models\RevisiModel;
use App\Models\DynamicBagianModel;

class Home extends BaseController
{
    protected $suratModel;
    protected $revisiModel;
    protected $dynamicbagianModel;
    public function __construct()
    {
        $this->suratModel = new SuratModel();
        $this->revisiModel = new RevisiModel();
        $this->dynamicbagianModel = new DynamicBagianModel();
    }
    public function hari_ini()
    {
        $status_user = $this->session->status;
        $tanggal_hari_ini = date('Y-m-d');
        $day = strtotime($tanggal_hari_ini);
        $day = date('D', $day);
        if ($day == 'Sat' || $day == 'Sun') {
            if ($status_user != 'super' || $status_user != 'admin') {
                echo "<script>
                alert('Tidak Bisa Mengambil Nomor Surat Hari Sabtu dan Minggu');
                window.location.href='/pegawai';
                </script>";
            } else {
                echo "<script>
                alert('Tidak Bisa Mengambil Nomor Surat Hari Sabtu dan Minggu');
                window.location.href='/" . $status_user . "';
                </script>";
            }
        } else {
            $no_surat_terakhir = $this->suratModel->get_last_no_surat();
            $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'];
            $tanggal_surat_terakhir_kali = $this->suratModel->get_last_no_surat_ver();
            $kode_masalah = $this->dynamicbagianModel->get_all_kode_masalah();
            if (strtotime($tanggal_hari_ini) > strtotime($tanggal_surat_terakhir_kali['tanggal_surat'])) {
                $no_surat_terakhir = $no_surat_terakhir + 1;
                for ($i = 0; $i < 5; $i++) {
                    $this->suratModel->insert([
                        'no_surat' => $no_surat_terakhir,
                        'tanggal_surat' => $tanggal_surat_terakhir_kali['tanggal_surat'],
                        'tanggal_pengambilan' => $tanggal_surat_terakhir_kali['tanggal_surat']
                    ]);
                    $this->revisiModel->insert([
                        'no_surat' => $no_surat_terakhir
                    ]);
                    $no_surat_terakhir = $no_surat_terakhir + 1;
                    if ($i == 4) {
                        $this->suratModel->insert([
                            'no_surat' => $no_surat_terakhir,
                            'tanggal_surat' => $tanggal_hari_ini,
                            'tanggal_pengambilan' => $tanggal_hari_ini
                        ]);
                        $this->revisiModel->insert([
                            'no_surat' => $no_surat_terakhir
                        ]);
                    }
                }
                $no_surat_terakhir = $this->suratModel->get_last_surat($tanggal_hari_ini);
                if (is_null($no_surat_terakhir['kode_masalah'])) {
                    $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'];
                } else {
                    $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'] + 1;
                }
                $data = [
                    'nama' => $this->session->nama,
                    'status_user' => $this->session->status,
                    'ket_user' => $this->session->ket_user,
                    'user_id' => $this->session->user_id,
                    'page' => 'hari_ini',
                    'no_surat_terakhir' => $no_surat_terakhir,
                    'all_kode_masalah' => $kode_masalah
                ];
                // dd($no_surat_terakhir);
                if (isset($data['status_user'])) {
                    return view('nomor_surat/nomor_hari_ini', $data);
                } else {
                    echo "<script>
                    alert('Tolong Lakukan Login');
                    window.location.href='/';
                    </script>";
                }
            } else {
                $no_surat_terakhir = $this->suratModel->get_last_surat($tanggal_hari_ini);
                if (is_null($no_surat_terakhir['kode_masalah'])) {
                    $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'];
                } else {
                    $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'] + 1;
                }
                $data = [
                    'nama' => $this->session->nama,
                    'status_user' => $this->session->status,
                    'ket_user' => $this->session->ket_user,
                    'user_id' => $this->session->user_id,
                    'page' => 'hari_ini',
                    'no_surat_terakhir' => $no_surat_terakhir,
                    'all_kode_masalah' => $kode_masalah
                ];
                // dd($no_surat_terakhir);
                if (isset($data['status_user'])) {
                    return view('nomor_surat/nomor_hari_ini', $data);
                } else {
                    echo "<script>
                    alert('Tolong Lakukan Login');
                    window.location.href='/';
                    </script>";
                }
            }
        }
        // kalau sabtu minggu say no


        // nanti diubah
        // echo $status;
    }

    public function saveNomor()
    {
        $tanggal_hari_ini = date('Y-m-d');
        $no_surat_terakhir = $this->suratModel->get_last_surat($tanggal_hari_ini);
        $no_surat_awal = (int)$no_surat_terakhir['no_surat'] + 1;
        $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'] + 1;
        $kode_unit = $this->request->getVar('kode_unit');
        $kode_masalah = $this->request->getVar('kode_masalah');
        $masalah_substantif_1 = $this->request->getVar('masalah_substantif_1');
        $masalah_substantif_2 = $this->request->getVar('masalah_substantif_2');
        $tanggal_pengambilan = date('Y-m-d');
        $perihal = $this->request->getVar('perihal');
        $tanggal_surat_mundur = $this->request->getVar('tanggal_surat_mundur');
        $tanggal_surat = date('Y-m-d');
        $user_id = $this->session->user_id;
        $jumlah = $this->request->getVar('jumlah');
        $status_user = $this->session->status;
        $penomoran_surat = $kode_unit . "-" . $kode_masalah . "." . $masalah_substantif_1 . "." . $masalah_substantif_2 . ".";
        // dd($no_surat_terakhir);
        if ($status_user == "sbg" || $status_user == "admin" || $status_user == "super") {
            $nama_pegawai = $this->request->getVar('nama_pegawai');
        } else {
            $nama_pegawai = $this->session->nama;
        }
        $no_surat_terakhir = $this->suratModel->get_last_surat($tanggal_hari_ini);
        if (is_null($no_surat_terakhir['kode_masalah'])) {
            $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'];
            $this->suratModel->save([
                'no_surat' => $no_surat_terakhir,
                'kode_unit' => $kode_unit,
                'kode_masalah' => $kode_masalah,
                'masalah_substantif_1' => $masalah_substantif_1,
                'masalah_substantif_2' => $masalah_substantif_2,
                'perihal' => $perihal,
                'user_id' => $user_id,
                'nama_pegawai' => $nama_pegawai,
                'tanggal_surat' => $tanggal_surat,
                'tanggal_pengambilan' => $tanggal_pengambilan
            ]);
            $this->revisiModel->save([
                'no_surat' => $no_surat_terakhir,
                'tanggal_revisi' => "",
                'kode_unit_sblm' => $kode_unit,
                'kode_masalah_sblm' => $kode_masalah,
                'masalah_substantif_1_sblm' => $masalah_substantif_1,
                'masalah_substantif_2_sblm' => $masalah_substantif_2,
                'perihal_sblm' => $perihal,
                'nama_pegawai_sblm' => $nama_pegawai,
                'jenis_perubahan' => "Input Pertama",
                'user_id' => $user_id
            ]);
            $no_surat_awal = $no_surat_terakhir;
            $no_surat_terakhir = $no_surat_terakhir + 1;
            $jumlah = $jumlah - 1;
            for ($i = 0; $i < $jumlah; $i++) {
                $this->suratModel->insert([
                    'no_surat' => $no_surat_terakhir,
                    'kode_unit' => $kode_unit,
                    'kode_masalah' => $kode_masalah,
                    'masalah_substantif_1' => $masalah_substantif_1,
                    'masalah_substantif_2' => $masalah_substantif_2,
                    'perihal' => $perihal,
                    'user_id' => $user_id,
                    'nama_pegawai' => $nama_pegawai,
                    'tanggal_surat' => $tanggal_surat,
                    'tanggal_pengambilan' => $tanggal_pengambilan
                ]);
                $this->revisiModel->insert([
                    'no_surat' => $no_surat_terakhir,
                    'tanggal_revisi' => "",
                    'kode_unit_sblm' => $kode_unit,
                    'kode_masalah_sblm' => $kode_masalah,
                    'masalah_substantif_1_sblm' => $masalah_substantif_1,
                    'masalah_substantif_2_sblm' => $masalah_substantif_2,
                    'perihal_sblm' => $perihal,
                    'nama_pegawai_sblm' => $nama_pegawai,
                    'jenis_perubahan' => "Input Pertama",
                    'user_id' => $user_id
                ]);
                $no_surat_terakhir = $no_surat_terakhir + 1;
            }
        } else {
            $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'] + 1;
            for ($i = 0; $i < $jumlah; $i++) {
                $this->suratModel->insert([
                    'no_surat' => $no_surat_terakhir,
                    'kode_unit' => $kode_unit,
                    'kode_masalah' => $kode_masalah,
                    'masalah_substantif_1' => $masalah_substantif_1,
                    'masalah_substantif_2' => $masalah_substantif_2,
                    'perihal' => $perihal,
                    'user_id' => $user_id,
                    'nama_pegawai' => $nama_pegawai,
                    'tanggal_surat' => $tanggal_surat,
                    'tanggal_pengambilan' => $tanggal_pengambilan
                ]);
                $this->revisiModel->insert([
                    'no_surat' => $no_surat_terakhir,
                    'tanggal_revisi' => "",
                    'kode_unit_sblm' => $kode_unit,
                    'kode_masalah_sblm' => $kode_masalah,
                    'masalah_substantif_1_sblm' => $masalah_substantif_1,
                    'masalah_substantif_2_sblm' => $masalah_substantif_2,
                    'perihal_sblm' => $perihal,
                    'nama_pegawai_sblm' => $nama_pegawai,
                    'jenis_perubahan' => "Input Pertama",
                    'user_id' => $user_id
                ]);
                $no_surat_terakhir = $no_surat_terakhir + 1;
            }
        }

        // jadi nanti pake for sebanyak jumlah, masukin surat itu dengan no_surat yang nambah setiap kali
        // nanti kita buat aja semacam page detail gitu untuk ngasih resi kalau no surat lu segini yaaaa, memperjelas aja
        // dd($tanggal_pengambilan);
        $this->session->set('no_surat_awal', $no_surat_awal);
        $this->session->set('penomoran_surat', $penomoran_surat);
        $this->session->set('perihal', $perihal);
        $this->session->set('nama_pegawai', $nama_pegawai);
        $this->session->set('tanggal_surat', $tanggal_surat);
        $this->session->set('tanggal_pengambilan', $tanggal_pengambilan);
        $this->session->set('no_surat_terakhir', $no_surat_terakhir - 1);
        return redirect('nomor_hari_ini/resi');
    }
    public function resi()
    {
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'resi',
            'no_surat_awal' => $this->session->no_surat_awal,
            'penomoran_surat' => $this->session->penomoran_surat,
            'perihal' => $this->session->perihal,
            'nama_pegawai' => $this->session->nama_pegawai,
            'tanggal_surat' => $this->session->tanggal_surat,
            'tanggal_pengambilan' => $this->session->tanggal_pengambilan,
            'no_surat_terakhir' => $this->session->no_surat_terakhir
        ];
        // dd($no_surat_terakhir);
        if (isset($data['status_user'])) {
            return view('nomor_surat/resi', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
    }
    public function hapusSurat($no_surat)
    {
        $status_user = $this->session->status;
        $jenis_perubahan = "Delete";
        $tanggal_revisi = date('Y-m-d');
        $this->suratModel->save([
            'no_surat' => $no_surat,
            'kode_unit' => null,
            'kode_masalah' => null,
            'masalah_substantif_1' => null,
            'masalah_substantif_2' => null,
            'perihal' => null,
            'user_id' => null,
            'nama_pegawai' => null,
            'tanggal_pengambilan' => ""
        ]);
        $this->revisiModel->insert([
            'no_surat' => $no_surat,
            'tanggal_revisi' => $tanggal_revisi,
            'kode_unit_sblm' => null,
            'kode_masalah_sblm' => null,
            'masalah_substantif_1_sblm' => null,
            'masalah_substantif_2_sblm' => null,
            'perihal_sblm' => null,
            'nama_pegawai_sblm' => null,
            'jenis_perubahan' => $jenis_perubahan,
            'user_id' => $this->session->user_id
        ]);
        return redirect()->to('/' . $status_user);
    }
    public function UpdateSurat()
    {
        $no_surat = $this->request->getVar('no_surat');
        $surat = $this->suratModel->get_detail_surat($no_surat);
        $kode_unit = $this->request->getVar('kode_unit');
        $kode_masalah = $this->request->getVar('kode_masalah');
        $masalah_substantif_1 = $this->request->getVar('masalah_substantif_1');
        $masalah_substantif_2 = $this->request->getVar('masalah_substantif_2');
        $tanggal_revisi = date('Y-m-d');
        $perihal = $this->request->getVar('perihal');
        $jenis_perubahan = implode(", ", $this->request->getVar('jenis_perubahan'));
        $user_id = $this->session->user_id;
        $status_user = $this->session->status;
        if ($status_user == "sbg" || $status_user == "admin" || $status_user == "super") {
            $nama_pegawai = $this->request->getVar('nama_pegawai');
        } else {
            $nama_pegawai = $this->session->nama;
        }
        if ($surat['tanggal_pengambilan'] == 0000 - 00 - 00) {
            $this->suratModel->save([
                'no_surat' => $no_surat,
                'kode_unit' => $kode_unit,
                'kode_masalah' => $kode_masalah,
                'masalah_substantif_1' => $masalah_substantif_1,
                'masalah_substantif_2' => $masalah_substantif_2,
                'perihal' => $perihal,
                'user_id' => $user_id,
                'nama_pegawai' => $nama_pegawai,
                'tanggal_pengambilan' => $tanggal_revisi
            ]);
            $this->revisiModel->insert([
                'no_surat' => $no_surat,
                'tanggal_revisi' => $tanggal_revisi,
                'kode_unit_sblm' => $kode_unit,
                'kode_masalah_sblm' => $kode_masalah,
                'masalah_substantif_1_sblm' => $masalah_substantif_1,
                'masalah_substantif_2_sblm' => $masalah_substantif_2,
                'perihal_sblm' => $perihal,
                'nama_pegawai_sblm' => $nama_pegawai,
                'jenis_perubahan' => $jenis_perubahan,
                'user_id' => $user_id
            ]);
            return redirect()->to('/' . $status_user);
        } else {
            $this->suratModel->save([
                'no_surat' => $no_surat,
                'kode_unit' => $kode_unit,
                'kode_masalah' => $kode_masalah,
                'masalah_substantif_1' => $masalah_substantif_1,
                'masalah_substantif_2' => $masalah_substantif_2,
                'perihal' => $perihal,
                'user_id' => $user_id,
                'nama_pegawai' => $nama_pegawai
            ]);
            $this->revisiModel->insert([
                'no_surat' => $no_surat,
                'tanggal_revisi' => $tanggal_revisi,
                'kode_unit_sblm' => $kode_unit,
                'kode_masalah_sblm' => $kode_masalah,
                'masalah_substantif_1_sblm' => $masalah_substantif_1,
                'masalah_substantif_2_sblm' => $masalah_substantif_2,
                'perihal_sblm' => $perihal,
                'nama_pegawai_sblm' => $nama_pegawai,
                'jenis_perubahan' => $jenis_perubahan,
                'user_id' => $user_id
            ]);
            if ($status_user == 'super' || $status_user == 'admin') {
                return redirect()->to('/' . $status_user);
            } else {
                return redirect()->to('/pegawai');
            }
        }
    }

    public function hitung_mundur()
    {
        $kode_masalah = $this->dynamicbagianModel->get_all_kode_masalah();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'all_kode_masalah' => $kode_masalah,
            'page' => 'hitung_mundur'
        ];
        if (isset($data['status_user'])) {
            return view('nomor_surat/nomor_hitung_mundur_1', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
    }

    public function hitung_mundur_input()
    {
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'hitung_mundur'
        ];
        if (isset($data['status_user'])) {
            $tanggal_hitung_mundur = $this->request->getVar('tanggal_hitung_mundur');
            // tanya dulu disini dia sabtu minggu atau nggak?
            $nomor_mundur = $this->suratModel->get_nomor_mundur($tanggal_hitung_mundur);
            $kode_masalah = $this->dynamicbagianModel->get_all_kode_masalah();
            // nanti disini ada if, kalo ada nomor surat kosong dan kalo gaada nomor surat kosong
            $day = strtotime($tanggal_hitung_mundur);
            $day = date('D', $day);
            if ($day == 'Sat' || $day == 'Sun') {
                echo "<script>
                alert('Tidak Bisa Mengambil Nomor Surat Hari Sabtu dan Minggu');
                window.location.href='/nomor/hitung_mundur';
                </script>";
            } else {
                if (count($nomor_mundur) == 0) {
                    echo "<script>
                    alert('Tidak Ada Surat Kosong');
                    window.location.href='/nomor/hitung_mundur';
                    </script>";
                } else {
                    if (count($nomor_mundur) > 0) {
                        $nomor_kecil = min($nomor_mundur);
                        $nomor_kecil = (int)$nomor_kecil['no_surat'];
                        $data = [
                            'nama' => $this->session->nama,
                            'status_user' => $this->session->status,
                            'ket_user' => $this->session->ket_user,
                            'user_id' => $this->session->user_id,
                            'tanggal_surat' => $tanggal_hitung_mundur,
                            'nomor_mundur' => $nomor_mundur,
                            'jumlah_nomor_mundur' => count($nomor_mundur),
                            'nomor_kecil' => $nomor_kecil,
                            'all_kode_masalah' => $kode_masalah,
                            'page' => 'hitung_mundur'
                        ];
                        return view('nomor_surat/nomor_hitung_mundur_2', $data);
                    }
                }
            }
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
    }

    public function saveNomorMundur()
    {
        $tanggal_mundur = $this->request->getVar('tanggal_surat_mundur');
        $no_surat_mundur = $this->suratModel->get_nomor_mundur($tanggal_mundur);
        $kode_unit = $this->request->getVar('kode_unit');
        $kode_masalah = $this->request->getVar('kode_masalah');
        $masalah_substantif_1 = $this->request->getVar('masalah_substantif_1');
        $masalah_substantif_2 = $this->request->getVar('masalah_substantif_2');
        $tanggal_pengambilan = date('Y-m-d');
        $perihal = $this->request->getVar('perihal');
        $user_id = $this->session->user_id;
        $jumlah = $this->request->getVar('jumlah_surat_mundur');
        $penomoran_surat = $kode_unit . "-" . $kode_masalah . "." . $masalah_substantif_1 . "." . $masalah_substantif_2 . ".";
        $status_user = $this->session->status;

        if ($status_user == "sbg" || $status_user == "admin" || $status_user == "super") {
            $nama_pegawai = $this->request->getVar('nama_pegawai');
        } else {
            $nama_pegawai = $this->session->nama;
        }

        if ($jumlah <= count($no_surat_mundur)) {
            $no_surat_awal = min($no_surat_mundur);
            $no_surat_awal = (int)$no_surat_awal['no_surat'];
            $no_surat = $no_surat_awal;
            for ($i = 0; $i < $jumlah; $i++) {
                $this->suratModel->save([
                    'no_surat' => $no_surat,
                    'kode_unit' => $kode_unit,
                    'kode_masalah' => $kode_masalah,
                    'masalah_substantif_1' => $masalah_substantif_1,
                    'masalah_substantif_2' => $masalah_substantif_2,
                    'perihal' => $perihal,
                    'user_id' => $user_id,
                    'nama_pegawai' => $nama_pegawai,
                    'tanggal_pengambilan' => $tanggal_pengambilan
                ]);
                $this->revisiModel->save([
                    'no_surat' => $no_surat,
                    'tanggal_revisi' => $tanggal_pengambilan,
                    'kode_unit_sblm' => $kode_unit,
                    'kode_masalah_sblm' => $kode_masalah,
                    'masalah_substantif_1' => $masalah_substantif_1,
                    'masalah_substantif_2' => $masalah_substantif_2,
                    'perihal_sblm' => $perihal,
                    'nama_pegawai_sblm' => $nama_pegawai,
                    'jenis_perubahan' => "Input Pertama",
                    'user_id' => $user_id
                ]);
                $no_surat = $no_surat + 1;
            }
        } else {
            echo "<script>
                    alert('Surat Kosong telah Habis');
                    window.location.href='/nomor/hitung_mundur';
                    </script>";
        }
        $this->session->set('no_surat_awal', $no_surat_awal);
        $this->session->set('penomoran_surat', $penomoran_surat);
        $this->session->set('perihal', $perihal);
        $this->session->set('nama_pegawai', $nama_pegawai);
        $this->session->set('tanggal_surat', $tanggal_mundur);
        $this->session->set('tanggal_pengambilan', $tanggal_pengambilan);
        $this->session->set('no_surat_terakhir', $no_surat - 1);
        return redirect('nomor_hari_ini/resi');
    }

    public function edit_surat($no_surat)
    {
        $detail_surat = $this->suratModel->get_detail_surat($no_surat);
        $kode_masalah = $this->dynamicbagianModel->get_all_kode_masalah();
        $subs_1 = $this->dynamicbagianModel->get_all_masalah_subs_1($detail_surat['kode_masalah']);
        $subs_2 = $this->dynamicbagianModel->get_all_masalah_subs_2($detail_surat['kode_masalah'], $detail_surat['masalah_substantif_1']);
        // dd($detail_surat);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'edit_surat',
            'detail_surat' => $detail_surat,
            'all_kode_masalah' => $kode_masalah,
            'all_subs_1' => $subs_1,
            'all_subs_2' => $subs_2
        ];
        // dd($data['detail_surat']);
        if (isset($data['status_user'])) {
            return view('nomor_surat/edit_surat', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
    }
    public function getMasalahSubs1()
    {
        $kode_masalah = $this->request->getPost("id");
        $masalah_substantif_1 = $this->dynamicbagianModel->get_all_masalah_subs_1($kode_masalah);
        return $this->response->setJson($masalah_substantif_1);
    }
    public function getMasalahSubs2()
    {
        $masalah_substantif_1 = $this->request->getPost("id");
        $kode_masalah = $this->request->getPost("id_kode_masalah");
        $masalah_substantif_2 = $this->dynamicbagianModel->get_all_masalah_subs_2($kode_masalah, $masalah_substantif_1);
        return $this->response->setJson($masalah_substantif_2);
    }

    public function getSuratSearch()
    {
        $keyword = $this->request->getVar('search');
        $status_user = $this->session->status;
        $search = $this->suratModel->get_surat_search($keyword);
        if (isset($search)) {
            $this->session->set('search', $search);
            if ($status_user == 'super') {
                return redirect()->to('/super/search');
            } else if ($status_user == 'admin') {
                return redirect()->to('/admin/search');
            } else {
                return redirect()->to('/pegawai/search');
            }
        } else {
            if ($status_user == 'super') {
                $status = 'super';
            } else if ($status_user == 'admin') {
                $status = 'admin';
            } else {
                $status = 'pegawai';
            }
            echo "<script>
            alert('Tidak Ditemukan');
            window.location.href='/" . $status . "';
            </script>";
        }
    }
}

<div class="jumbotron">
    <h1 class="display-4">Welcome Back!</h1>
    <p class="lead">Any moment worth to write for??</p>
    <button type="button" class="btn btn-primary btn-lg btn-dark ModalTambah" data-toggle="modal" data-target="#ModalInput">
        Write
    </button>
</div>

<!-- <php $tanggal = date("d-m-yy"); echo $tanggal; ?> -->

<!-- Modal -->
<div class="modal fade" id="ModalInput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Something To Change</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL;?>/journal/ubah_data" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="judul">Title</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="form-group">
                        <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" overflow-y="scroll"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
                </form>
        </div>
    </div>
</div>

<div class="accordion" id="accordionExample">
    <?php $i=0; foreach($data['journal'] as $journal): $i++;?>
        <div class="card">
            <div class="card-header" id="heading<?= $i;?>">
                <h2 class="mb-0" color="dark">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?= $i;?>" aria-expanded="false" aria-controls="collapse<?= $i;?>">
                        <h5>
                            <?php
                                $tanggal = $journal['tanggal_input'];
                                $tanggal = explode('-', $tanggal);
                                $bulan = array('Januari', 'Februari', 'Maret', 'April','Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                $angka_bulan = str_split($tanggal[1]);
                                if($angka_bulan[0] == '0'){
                                    $a = $angka_bulan[1];
                                    $nama_bulan = $bulan[$a-1];
                                }else{
                                    $a = $tanggal[1];
                                    $nama_bulan = $bulan[$a-1];
                                }
                                echo $tanggal[2]. ' ' .$nama_bulan. ', ' .$tanggal[0]. ' : " '.$journal['judul'].' "';
                            ?>
                        </h5>
                    </button>
                </h2>
            </div>
            <div id="collapse<?= $i;?>" class="collapse" aria-labelledby="heading<?= $i;?>" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        <?= $journal['isi'];?>
                    </p>
                    <br>
                    <!-- gamau jalan -->
                    <button type="button" class="btn btn-secondary btn-sm ModalUbah" data-toggle="modal" data-target="#ModalInput" data-id="<?=$journal['id'];?>">Edit</button>
                    <a role="button" class="btn btn-secondary btn-sm HapusData" href="<?= BASEURL;?>/journal/hapus_data/<?= $journal['id'];?>" onClick="return confirm ('yakin?');">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<div class="page-content">
    <div class="row chat-wrapper">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row position-relative">
                        <div class="col-lg-12 chat-content">
                            <div class="chat-header border-bottom pb-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="lead-text"><?= session_get('type') == 3 ? 'Pakar' : $konsultasi->nama_lengkap ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-body ps ps--active-y" style="height: 50vh;">
                                <ul class="messages">
                                    <input type="hidden" name="id" id="id_konsultasi" value="<?= $id_konsultasi ?>">
                                    <li class="message-item <?= session_get('type') == 3 ? 'me' : 'friend' ?>">
                                        <div class="content">
                                            <div class="message">
                                                <div class="bubble">
                                                    <p><?= $konsultasi->pertanyaan ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php foreach($jawaban as $row) : ?>
                                        <?php if(session_get('type') == 3) : ?>
                                        <li class="message-item <?= $row['pakar'] == 1 ? 'friend' : 'me' ?>">
                                            <div class="content">
                                                <div class="message">
                                                    <div class="bubble">
                                                        <p><?= $row['jawaban'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php else : ?>
                                        <li class="message-item <?= $row['pakar'] == 1 ? 'me' : 'friend' ?>">
                                            <div class="content">
                                                <div class="message">
                                                    <div class="bubble">
                                                        <p><?= $row['jawaban'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <li class="message-item me wrapper-chat" style="display: none;">
                                        <div class="content">
                                            <div class="message">
                                                <div class="bubble">
                                                    <p id="after-pesan"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 293px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 98px;"></div>
                                </div>
                            </div>
                            <div class="chat-footer d-flex">
                                <form class="search-form flex-grow mr-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control rounded-pill" id="pesan" placeholder="Ketik pesan disini...">
                                    </div>
                                </form>
                                <div>
                                    <button type="button" class="btn btn-primary btn-icon rounded-circle" id="kirim">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                            <line x1="22" y1="2" x2="11" y2="13"></line>
                                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= asset('assets/js/chat.js') ?>"></script>
<script>
    $(document).ready(function(){
        $('#kirim').click(function(e){
            e.preventDefault();
            var pesan = $('#pesan').val();
            var id_konsultasi = $('#id_konsultasi').val();
            $.ajax({
                url: '<?= base_url('konsultasi/prosesJawaban') ?>',
                type: 'POST',
                data: {pesan: pesan, id_konsultasi: id_konsultasi},
                success: function(data){
                    let response = JSON.parse(data);
                    let pesan = response.pesan;
                    $('#pesan').val('');
                    $('.wrapper-chat').show();
                    $('#after-pesan').html(pesan);
                }
            });
        });
    });
</script>
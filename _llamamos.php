<div class="panel__general">
    <div class="modal__previo">
        <div class="contenido__previo" id="panel__previo">
            <div class="icon__telefono">
                <figure>
                    <img src="contenido/img/icon_tele.png" alt="">
                </figure>
            </div>
            <div class="div__cerrar">
                <span class="cerrar">X</span>
            </div>
            <div class="header__previo">
                <?= t('recibe'); ?>
            </div>
            <div class="contenedor__botton">
                <button class="button__previo" id="open__llamamos"><?= t('te_llamamos'); ?></button>
            </div>
            <div class="footer__previo">
                <?= t('texto_contactanos'); ?>
            </div>
            <div class="contenedor__botton">
                <button class="button__footer" id="button__contacto"><?= t('btn_contacto'); ?></button>
            </div>
        </div>
    </div>
    <div class="contenedor__llamamos">
        <div class="pop__llamamos">
            <div class="llamamos__top">
                <div class="top__cerrar cerrar">

                </div>
            </div>
            <div class="llamamos__bottom">
                <?php
                if (isset($_POST['send_contacto'])) {
                    $emailFrom = "p.sanchezflores@transreformsl.com";
                    $emailTo = "p.sanchezflores@transreformsl.com";
                    $subject = " | SOLICITAR PRESUPUESTO";

                    $nombres = strip_tags($_POST['nombres']);
                    $telefono = strip_tags($_POST['telefono']);
                    $email = strip_tags($_POST['email']);

                    $body = "Nombres y Apellidos: " . $nombres . "\n";
                    $body .= "Teléfono: " . $telefono . "\n";
                    $body .= "E-mail: " . $email . "\n";


                    $headers = "From: " . $emailFrom . "\n";
                    $headers .= "Reply-To:" . $email . "\n";

                    $success = mail($emailTo, $subject, $body, $headers);
                    if ($success) {
                        print '<div class="PanelConfirmacionPrincipal">
                                <img src="contenido/img/ok.png" alt="Todo bien...!!!" class="imgFullWidthPrin">
                                <p class="no_rptapOne">Gracias por contactar con nosotros. A la brevedad posible estaremos en contacto con Ud.</p>
                                <a href="index.php"><button class="llamamos__button">Regresar Atrás</button></a>
                            </div>';
                    } else {
                        print '<div class="PanelConfirmacionPrincipal">
                                <img src="contenido/img/salio_mal.png" alt="Algo salio mal!!!" class="imgFullWidthPrin">
                                <p class="no_rptapTwo">Algo salio mal, por favor ponganse en contacto por otro medio.</p>
                                <a href="index.php">
                                <button class="llamamos__button">Regresar Atrás</button></a>
                            </div>';
                    }
                } else {
                ?>
                    <header>
                        <h4>"<?= t('titulo_panel_dos'); ?>"</h4>
                    </header>
                    <p><?= t('parrafo_panel_dos'); ?></p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" id="nombres" name="nombres" placeholder="<?= t('nombre_apellido'); ?>" required>
                        <input type="number" id="telefono" name="telefono" placeholder="<?= t('numero_telefono'); ?>" required>
                        <input type="mail" id="mail" name="email" placeholder="<?= t('correo_electronico'); ?>" required>
                        <div class="input__politica">
                            <input type="checkbox" name="acepto" id="checka">
                            <label for="acepto" class="texto__acepto"><?= t('terminos_parte_uno'); ?><a href="politica-privacidad.php" class="politica"><?= t('terminos_parte_dos'); ?></a></label>
                        </div>
                        <span class="activar__check"><?= t('seleccionar_check'); ?></span>
                        <button id="send_contacto_a" name="send_contacto" class="llamamos__button" disabled><?= t('enviar_cotizacion'); ?></button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="modal__final">
        <div class="panel__final" id="panel__final">
            <header>
                <p><?= t('titulo_panel_tres'); ?></p>
                <span class="cerrar">X</span>
            </header>
            <div class="panel__fill">
                <figure><img src="contenido/img/place.png" alt=""></figure>
                <span><?= t('calle'); ?> 17-21, <?= t('codigo_postal'); ?>: 08028- Barcelona</span>
            </div>
            <div class="panel__fill">
                <figure><img src="contenido/img/mobile1.png" alt=""></figure>
                <span><a href="tel:(+34)625931805">(+34)625931805</a></span>
            </div>
            <div class="panel__fill">
                <figure><img src="contenido/img/phone.png" alt=""></figure>
                <span><a href="tel:(+34)934913862">(+34)934913862</a></span>
            </div>
            <div class="panel__fill">
                <figure><img src="contenido/img/whats.png" alt=""></figure>
                <span><a href="tel:(+34)620450030">(+34)620450030</a></span>
            </div>
            <div class="panel__fill">
                <figure><img src="contenido/img/mail.png" alt=""></figure>
                <span class="panel__mail">informes@transreformsl.com</span>
            </div>
            <footer class="footer__button">
                <button id="button__atras"><?= t('btn_atras'); ?></button>
            </footer>
        </div>
    </div>
</div>
<script>
    let secondPop = $('.pop__llamamos');
    let buttonAbrir = $('#open__llamamos');
    let checkButton = $('#checka');
    let buttonEnviar = $('#send_contacto_a');
    let removerAll = $('.cerrar');
    let buttonContacto = $('#button__contacto');
    let panelPrevio = $('#panel__previo');
    let panelFinal = $('#panel__final');
    let buttonAtras = $('#button__atras');

    removerAll.click(function() {
        $('.panel__general').remove();
    });

    buttonAbrir.click(function() {
        secondPop.addClass('add__class');
        $('.modal__previo').remove();
    });

    buttonContacto.click(function() {
        panelFinal.addClass('active__panel__final');
        panelPrevio.removeClass('contenido__previo');
        panelPrevio.addClass('cerrando__previo');
        $('.icon__telefono').addClass('ocultar')
    });

    buttonAtras.click(function() {
        panelPrevio.removeClass('cerrando__previo');
        panelPrevio.addClass('contenido__previo');
        panelFinal.removeClass('active__panel__final');
        panelFinal.addClass('panel__final');
        $('.icon__telefono').removeClass('ocultar')
    });

    // checkButton.change(function() {
    //     if (checkButton.attr('checked')) {
    //         // Hacer algo si el checkbox ha sido seleccionado
    //         alert('sss')
    //     } else {

    //     }
    // });
    checkButton.change(function() {
        if (this.checked) {
            buttonEnviar.removeAttr('disabled');
        } else {
            buttonEnviar.attr('disabled','disabled');
        }
    });
</script>
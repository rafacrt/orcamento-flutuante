<?php
/*
Plugin Name: Plugin Flutuante de Orçamento
Description: Adiciona um botão flutuante no lado direito inferior com formulário de orçamento.
Version: 1.0
Author: Rafael Medeiros
*/

// Adicione o HTML do bssssssssssssssssssssssssssssssssssssssssssssssssssotão flutuante
function add_floating_button_html() {
    ?>
    <div class="floating-button-container">
        <button id="openForm" class="btn btn-primary">Faça um orçamento</button>
        <div id="formContainer" style="display: none;">
            <?php echo do_shortcode('[contact-form-7 id="123" title="Orçamento"]'); ?>
        </div>
    </div>
    <style>
        .floating-button-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }
    </style>
    <script>
        jQuery(document).ready(function ($) {
            $('#openForm').click(function () {
                $('#formContainer').toggle('fast');
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'add_floating_button_html');

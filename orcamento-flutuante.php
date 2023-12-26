<?php
/*
Plugin Name: Plugin Flutuante de Orçamento
Description: Adiciona um botão flutuante no lado direito inferior com formulário de orçamento.
Version: 2.4
Author: Rafael Medeiros
*/

// Adicione o HTML do botão flutuante
function add_floating_button_html() {
    ?>
    <style>
        /* Estilos personalizados para o botão */
        .floating-button-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }

        .floating-button-container button {
            background-color: #c20f1a;
            border-radius: 15px;
            color: #fff;
			width: fit-content;
    		margin-bottom: 20px;
        }

        /* Estilos para o formulário */
        #formContainer {
            border: 1px solid #ddd; /* Adiciona uma borda suave ao redor do formulário */
            border-radius: 10px; /* Borda suave */
            padding: 20px;
            background-color: #f5f5f5; /* Fundo cinza claro para os inputs */
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 998; /* Um nível abaixo do botão flutuante */
        }

        /* Estilos para os inputs do formulário */
        #formContainer input[type="text"] {
            background-color: #ccc;
            color: #000; /* Cor do texto do input */
        }
		
		#formContainer .wpcf7-form input[type="email"] {
            background-color: #ccc!important;
            color: #000!important;
        }

        /* Estilos para o botão quando o formulário está aberto */
        #openForm.active {
            background-color: #c20f1a;
        }
		
		/* Estilos para o placeholder */
        #formContainer ::placeholder {
            color: #000; /* Cor do texto do placeholder */
        }
		
		#formContainer input[type="submit"] {
    	    background-color: #ccc;
			width: 100%;
		}
		
    </style>

    <div class="floating-button-container">
        <button id="openForm" class="btn btn-primary">Faça um orçamento</button>
        <div id="formContainer">
            <button id="closeForm" class="btn btn-secondary" style="float: right;">X</button>
            <?php echo do_shortcode('[contact-form-7 id="244b9e1" title="Flutuante"]'); ?>
        </div>
    </div>

    <script>
        jQuery(document).ready(function ($) {
            $('#openForm').click(function () {
                $('#formContainer').toggle('fast');
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    $(this).text('X');
                } else {
                    $(this).text('Faça um orçamento');
                }
            });

            $('#closeForm').click(function () {
                $('#formContainer').hide('fast');
                $('#openForm').removeClass('active').text('Faça um orçamento');
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'add_floating_button_html');

<?php

add_filter( 'pt-ocdi/import_files',      'techmarket_ocdi_import_files' );
add_action( 'pt-ocdi/after_import',      'techmarket_ocdi_after_import_setup' );
add_filter( 'pt-ocdi/plugin_intro_text', 'techmarket_ocdi_modify_intro_text' );
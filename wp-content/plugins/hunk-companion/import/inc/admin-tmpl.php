<?php
/**
 * TMPL - Single Demo Preview
 *
 */
?>
<div class="wrap" id="themehunk-site-library-admin">

	<div id="themehunk-site-library-filters" class="wp-filter hide-if-no-js">

		<div class="section-left">

			<!-- All Filters -->
			<div class="filter-count" style="display:none;">
				<span class="count"></span>
			</div>
			<div class="filters-wrap">
				<div id="th-demo-list">

					
				</div>			
			</div>
		</div> <!-- Section Left -->

		<div class="section-right">
			<div class="filters-wrap">
				<div id="themehunk-site-library-category"></div>
					<a href='#'   class="themehunk-site-key-link activated"><?php _e(ucfirst($TextDomain),'themehunk-site-library'); ?></a>
			</div>
			<div class="search-form" style="display:none;">
				<label class="screen-reader-text" for="wp-filter-search-input"><?php _e( 'Search Sites', 'themehunk-site-library' ); ?> </label>
				<input placeholder="<?php _e( 'Search Sites...', 'themehunk-site-library' ); ?>" type="search" aria-describedby="live-search-desc" id="wp-filter-search-input" class="wp-filter-search">
			</div>

		</div>

	</div>

	<?php do_action( 'themehunk_site_library_before_site_grid' ); ?>

	<div class="theme-browser rendered">
		<div id="themehunk-site-library" class="themes wp-clearfix"></div>
	</div>

	<div class="select-page-builder">
		<div class="note-wrap">
		<!-- 	<h3>
				<span class="up-arrow dashicons dashicons-editor-break"></span>
				<div class="note">'Select Your themehunk Demo', 'themehunk-site-library' ); ?></div>
			</h3>
 -->		</div>
		<!--img-->
	</div>

	<div class="spinner-wrap">
	</div>

	<?php do_action( 'themehunk_site_library_after_site_grid' ); ?>
<div class='themehunk-site-library-theme-preview'></div>

</div>


<?php
/**
 * TMPL - Single Demo Preview
 */
?>

<script type="text/template" id="tmpl-themehunk-list-template">
	<select id='zsl-demo-type' class="cs-select cs-skin-elastic zsl-demo-type">

	<# for ( key in data.list ) { #>
		<option value="{{key}}" data-class="builder-{{key}}">{{{data.list[key]}}}</option>
			<# } #>
			<option value="gutenberg" data-class="builder-gutenberg">Gutenberg</option>
			<option value="pagelayer" data-class="builder-pagelayer">Pagelayer</option>
			<option value="brizy" data-class="builder-brizy">Brizy</option>
 				</select>
</script>




<script type="text/template" id="tmpl-themehunk-template">
	<ul class="">
	<# for ( key in data.themehunk ) { #>
        <?php if ( is_plugin_active( 'th-shop-mania-pro/th-shop-mania-pro.php' ) ) { ?>

    <li  style="width:300px;" class="themehunkdemo themes demo_{{{data.themehunk[key].type}}}" slug="{{{data.themehunk[key].slug}}}" demo_type ="free" themehunk_template ="{{{data.themehunk[key].template}}}" api ="{{{data.themehunk[key].demo_api}}}" themehunk_import="{{{data.themehunk[key].import_url}}}" themehunk_demo="{{{data.themehunk[key].demo_url}}}" cate="{{{data.themehunk[key].category}}}" thumb="{{{data.themehunk[key].thumb}}}" plugins='<# for( keys in data.themehunk[key].plugins) { #>{"slug":"{{{data.themehunk[key].plugins[keys].slug}}}", "init":"{{{data.themehunk[key].plugins[keys].init}}}","name":"{{{data.themehunk[key].plugins[keys].name}}}"},<# } #>'>
        
    <?php } else{ ?>
            <li  style="width:300px;" class="themehunkdemo themes demo_{{{data.themehunk[key].type}}}" slug="{{{data.themehunk[key].slug}}}" demo_type ="{{{data.themehunk[key].type}}}" themehunk_template ="{{{data.themehunk[key].template}}}" api ="{{{data.themehunk[key].demo_api}}}" themehunk_import="{{{data.themehunk[key].import_url}}}" themehunk_demo="{{{data.themehunk[key].demo_url}}}" cate="{{{data.themehunk[key].category}}}" thumb="{{{data.themehunk[key].thumb}}}" plugins='<# for( keys in data.themehunk[key].plugins) { #>{"slug":"{{{data.themehunk[key].plugins[keys].slug}}}", "init":"{{{data.themehunk[key].plugins[keys].init}}}","name":"{{{data.themehunk[key].plugins[keys].name}}}"},<# } #>'>

        <?php } ?>
	<a><img style="width:300px;" src="{{{data.themehunk[key].thumb}}}"></a>
		<div class="themehunk-site-library-container">
			<h3 class="theme-name" id="themehunk-theme-name"> {{{data.themehunk[key].template}}} </h3>
			<div class="theme-actions">
				<button class="button preview install-theme-preview">Preview</button>
			</div>
		</div>
	</li>
			<# } #>
</ul>
</script>


<!-- site demo , install plugins and import demo -->
 <script type="text/template" id="tmpl-demo-template">
  <div class="themehunk-sites-preview theme-install-overlay wp-full-overlay expanded" style="display: block;">
  		<div class="wp-full-overlay-sidebar">
  			<div class="wp-full-overlay-header" data-required-plugins="{{data.required_plugins}}" data-demo-api="{{{data.demo_api}}}" data-demo-slug="{{{data.slug}}}">
  				<button class="close-full-overlay"><span class="screen-reader-text"><?php esc_html_e( 'Close', 'themehunk-site-library' ); ?></span></button>

				<button class="previous-theme"><span class="screen-reader-text"><?php esc_html_e( 'Previous', 'themehunk-site-library' ); ?></span></button>

				<button class="next-theme"><span class="screen-reader-text"><?php esc_html_e( 'Next', 'themehunk-site-library' ); ?></span></button>

				<a class="button hide-if-no-customize themehunk-demo-import" href="#" data-import="disabled"><?php esc_html_e( 'Install Plugins', 'themehunk-site-library' ); ?></a>
			</div>

			<div class="wp-full-overlay-sidebar-content">
				<div class="install-theme-info">

					<!-- <span class="site-type {{{data.themehunk_demo_type}}}">{{{data.themehunk_demo_type}}}</span> -->
					<h3 class="theme-name">{{{data.demo_name}}}</h3>
					<# if ( data.screenshot.length ) { #>
						<img class="theme-screenshot" src="{{{data.screenshot}}}" alt="">
					<# } #>

					<div class="theme-details">
						<!-- {{{data.content}}} -->
					</div>
					<a href="#" class="theme-details-read-more"><?php _e( '', 'themehunk-site-library' ); ?></a>

					<div class="required-plugins-wrap">
						<h4><?php _e( 'Required Plugins', 'themehunk-site-library' ); ?> </h4>
							<div class="required-plugins">
								<div class="spinner-wrap">
									<span class="spinner is-active"></span>
								</div>
							<!-- <# for ( keys in data.required_plugins) { #>
								

							<div class="plugin-card  		plugin-card-{{{data.required_plugins[keys].slug}}}" data-slug="so-widgets-bundle" data-init="{{{data.required_plugins[keys].init}}}">	
							<span class="title">{{{data.required_plugins[keys].name}}}</span>	

							<button class="button install-now" data-init="{{{data.required_plugins[keys].init}}}" data-slug="{{{data.required_plugins[keys].slug}}}" data-name="{{{data.required_plugins[keys].name}}}">Install Now	</button>

							</div>


								<# } #> -->

						</div>
					</div>
				</div>
				<div class="wp-full-overlay-footer">
				<div class="footer-import-button-wrap">
					<a class="button button-hero hide-if-no-customize themehunk-demo-import" href="#" data-import="disabled">
						<?php esc_html_e( 'Install Plugins', 'themehunk-site-library' ); ?>
					</a>
				</div>

				<button type="button" class="collapse-sidebar button" aria-expanded="true"
						aria-label="Collapse Sidebar">
					<span class="collapse-sidebar-arrow"></span>
					<span class="collapse-sidebar-label"><?php esc_html_e( 'Collapse', 'themehunk-site-library' ); ?></span>
				</button>

				<div class="devices-wrapper">
					<div class="devices">
						<button type="button" class="preview-desktop active" aria-pressed="true" data-device="desktop">
							<span class="screen-reader-text"><?php _e( 'Enter desktop preview mode', 'themehunk-site-library' ); ?></span>
						</button>
						<button type="button" class="preview-tablet" aria-pressed="false" data-device="tablet">
							<span class="screen-reader-text"><?php _e( 'Enter tablet preview mode', 'themehunk-site-library' ); ?></span>
						</button>
						<button type="button" class="preview-mobile" aria-pressed="false" data-device="mobile">
							<span class="screen-reader-text"><?php _e( 'Enter mobile preview mode', 'themehunk-site-library' ); ?></span>
						</button>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="wp-full-overlay-main">
			<iframe src="{{{data.demo_url}}}" title="<?php esc_attr_e( 'Preview', 'themehunk-site-library' ); ?>"></iframe>
		</div>
  </div>
</script>
<?php
wp_print_admin_notice_templates();
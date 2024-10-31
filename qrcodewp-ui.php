<?php

function magnqrcode_show_ui_settings_page()
{
	$categories = get_categories();
	?>
		<div class="wrap">
		
			<div class="magn_cols">
				
				<div class="magn_col_right metabox-holder" id="poststuff">
			
					<div class="postbox">
						<div class="handlediv">
							<br/>
						</div>
						<h3 class="hndle"><span>Magn QR Code for WordPress</span></h3>
						<div class="inside">
							<div class="field">
								<h4>Author</h4>
								<p>Julian Magnone<br/>
								<a href="mailto:julianmagnone@gmail.com">julianmagnone@gmail.com</a>
								</p>
							</div>
							<div class="field">
								<h4>Resources</h4>
								<p>FPPT.com</p>
								<p>
								<div class="qrcode_res">
									<a href="http://fppt.com" target="_blank"><img src="https://chart.googleapis.com/chart?cht=qr&chl=http://fppt.com/&chs=100x100" /></a>
								</div>
								</p>
								<p>Want to appear here? Contact me.</p>
							</div>
							<div class="field">
								<h4>Support</h4>
								<p>Support future development of this plugin by donating here.</p>
								<div>
									<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
									<input type="hidden" name="cmd" value="_s-xclick">
									<input type="hidden" name="hosted_button_id" value="VVE9SYHSM38FY">
									<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
									<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
									</form>
								</div>
							</div>
						</div>
					
					</div>
				
				</div> <!-- end magn right -->
				
				<div class="magn_col_left">
				
					<h2>Magn QR Code</h2>
					<p>QR Code settings for WordPress. Magn QR Code helps you to embed 2D or QR codes into WordPress posts. This plugin uses Google API to retrieve a QR Code image.</p>
				
					<div class="postbox" id="poststuff">
						<div class="handlediv">
							<br/>
						</div>
						<h3 class="hndle"><span>General Settings</span></h3>
							
						<div class="inside">
							<form name="magnqrcode_options" method="POST" action="options.php">
								<?php //wp_nonce_field('update-options'); ?>
								<?php settings_fields( 'magnqrcode-settings-group' ); ?>
								<input type="hidden" name="magnqrcode_form_action" value="save">
								
								<div>Default href: <input style="width:300px" type="text" id="magnqrcode_default_href" name="magnqrcode_default_href" value="<?php echo get_option('magnqrcode_default_href', '') ?>" > </div>
									
									<br/>
								
								<div>Default Width: <input type="text" id="magnqrcode_default_width" name="magnqrcode_default_width" value="<?php echo get_option('magnqrcode_default_width', '200') ?>" > </div>
								<div>Default Height: <input type="text" id="magnqrcode_default_height" name="magnqrcode_default_height" value="<?php echo get_option('magnqrcode_default_height', '200') ?>" > </div>
								
								
								<p class="submit">
									<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
								</p>
							</form>
						</div>
						
						

					</div>
					
					<p></p>
					<h3>Instructions:</h3>
					<p>Use this shortcode <code>[qrcode href=""]</code> to embed a QR code in your posts. Additionally you can specify width and height.</p>
					
					<h3>Examples:</h3>
					<p><code>[qrcode href="http://fppt.com"]</code> will insert a QR with the default size 200x200.</p>
					<p><code>[qrcode href="http://fppt.com" width="300" height="300"]</code> will insert a bigger QR code.</p>
					
					
					
					
				</div> <!-- magn col left-->
				
			</div>
				
				
		</div><!-- end wrap-->
	<?
} // end wpsync_show_ui_settings_page



/* End */

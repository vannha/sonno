<?php

/**
 * SpyroPress Dashboard
 *
 * Dashboard contains Latest News, Theme Info, Lates Tweets, etc.
 *
 */

global $spyropress;
?>

<div class="wrap spyropress-wrap">
	
    <?php get_spyropress_badge(); ?>
    <h1><?php echo esc_html( $spyropress->theme_name ).' '.esc_html__( 'Dashboard', 'sonno' ); ?></h1>
    <div class="teaser-text">
		<?php _e( 'Thank you for using ThemeSquared. ThemeSquared will improve your overall web publishing experience.', 'sonno' ); ?>
	</div>
	<div class="clear"></div>
	<div id="dashboard-widgets" class="metabox-holder columns-2">
		<div id="postbox-container-1" class="postbox-container">
			<div id="dashboard_theme_info" class="postbox">
				<h3 class="hndle">
                    <?php _e( 'Theme Info', 'sonno'); ?>
				</h3>
				<div class="inside">
					<ul>
						<li>
							<?php _e( 'Framework Version:', 'sonno'); ?>
							<strong>
								<?php echo spyropress_get_version(); ?>
							</strong>
						</li>
                        <li>
							<?php _e( 'Product Version:', 'sonno'); ?>
							<strong>
								<?php echo esc_html( $spyropress->theme_version ); ?>
							</strong>
						</li>
						<li>
							<?php _e( 'Product Support:', 'sonno'); ?>
							<?php get_support_forum_link(); ?>
						</li>
					</ul>
					<br class="clear"/>
				</div>
			</div>
		</div>
		<div id="postbox-container-2" class="postbox-container">
			<div id="dashboard_spyropress_changelog" class="postbox">
				<h3 class="hndle">
					<?php _e( 'Theme Changelog', 'sonno'); ?>
				</h3>
				<div class="inside">
						<br class="clear"/>
						<p><b>Version 1.0.6</b></br>
&nbsp;&nbsp;&nbsp;<b>Bug Removed</b></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (We have removed all notified issues and make it compatible with latest version of WordPress )<br/>
						<p><b>Version 1.0.5</b></br>
                            &nbsp;&nbsp;&nbsp;<b>Bug Removed</b></br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (We have removed all notified issues and make it compatible with latest version of WordPress)<br/>
<p><b>Version 1.0.4</b></br>
                            &nbsp;&nbsp;&nbsp;<b>TWEAKS</b></br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Demo contents updated)<br/>
<p><b>Version 1.0.3</b></br>
                            &nbsp;&nbsp;&nbsp;<b>Bug Removed</b></br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Twitter Aouth issue Fix)<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (DropDown Menu Feature Added)<br/>
							
							</p>

						</p><hr/>
<p><b>Version 1.0.2</b></br>
                            &nbsp;&nbsp;&nbsp;<b>Bug Removed</b></br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Portfolio Compatibility with WordPress 4.4 issue Fix)<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Favicon Feature Added)<br/>
							
							</p>

						</p><hr/>

<p><b>Version 1.0.1</b></br>
                            &nbsp;&nbsp;&nbsp;<b>Bug Removed</b></br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Twitter Feed issue Fix)<br/>
							
							</p>

						</p><hr/>

<p><b>Initial Version 1.0.0</b></br>
                                &nbsp;&nbsp;&nbsp;<b>Theme Released</b>
				</p><br class="clear"/>
				</div>
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
</div>
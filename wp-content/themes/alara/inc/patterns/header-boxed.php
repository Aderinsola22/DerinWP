<?php
return array(
			'title'         => __( 'Header Boxed', 'alara' ),
			'categories'    => array( 'alara-headers-boxed', 'alara-new' ),
			'blockTypes'    => array( 'core/template-part/header' ),
			'viewportWidth' => 1440,
			'content'       => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"1em","bottom":"1em"}}},"className":"site-header","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull site-header" style="padding-top:1em;padding-bottom:1em">

	<!-- wp:group {"backgroundColor":"foreground","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
	<div class="wp-block-group has-foreground-background-color has-background">

		<!-- wp:group {"className":"site-branding"} -->
		<div class="wp-block-group site-branding">

			<!-- wp:group {"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:group -->
				<div class="wp-block-group">
					<!-- wp:site-logo {"width":85} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group -->
				<div class="wp-block-group">
					<!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"className":"is-style-links-plain"} /-->
					<!-- wp:site-tagline {"textColor":"background","className":"is-style-no-block-gap"} /-->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"textColor":"background","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} -->
			<!-- wp:page-list /-->
		<!-- /wp:navigation -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"className":"is-style-no-block-gap"} -->
	<div class="wp-block-group is-style-no-block-gap" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">

		<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":"0px"}}} -->
		<div class="wp-block-columns is-not-stacked-on-mobile">

			<!-- wp:column {"style":{"spacing":{"padding":{"top":"5px","right":"5px","bottom":"5px","left":"5px"}}},"backgroundColor":"primary"} -->
			<div class="wp-block-column has-primary-background-color has-background" style="padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px"></div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"top":"5px","right":"5px","bottom":"5px","left":"5px"}}},"backgroundColor":"tertiary"} -->
			<div class="wp-block-column has-tertiary-background-color has-background" style="padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px"></div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"top":"5px","right":"5px","bottom":"5px","left":"5px"}}},"backgroundColor":"quaternary"} -->
			<div class="wp-block-column has-quaternary-background-color has-background" style="padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px"></div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->',
);

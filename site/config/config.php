<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,
    'hooks'=> [
		'kirbytext:after' => function ( $text ) {
			if ( strlen( $text ) > 0 ) {
				// Get current page host
				// (he attributes will only be set for external links)
				$site_host = parse_url( site()->url() )['host'];

				// Convert $text to DOM tree
				$dom = new DomDocument();
				$dom->loadHTML( $text );

				// Loop over all anchor elements
				foreach ( $dom->getElementsByTagName( 'a' ) as $link_el ) {
					// Parse link address
					$link_href = $link_el->getAttribute( 'href' );
					$link_parts = parse_url( $link_href );

					if (
						$link_parts &&
						isset( $link_parts['host'] ) &&
						isset( $link_parts['scheme'] )
					) {
						$link_host = $link_parts['host'];
						$link_scheme = $link_parts['scheme'];

						// Only continue if the link is external
						if (
							in_array( $link_scheme, [ 'http', 'https' ] ) &&
							$link_host !== $site_host
						) {
							// Create string of old link (to find and replace it later)
							$link_str = $dom->saveHTML( $link_el );

							// Add link attributes
							$link_el->setAttribute( 'rel', 'noopener noreferrer' );
							$link_el->setAttribute( 'target', '_blank' );

							// Create new link string
							$new_link_str = $dom->saveHTML( $link_el );

							// replace old link with new link in $text
							$text = str_replace( $link_str, $new_link_str, $text );
						}
					}
				}
			}       
			
			return $text;
		}
	]
];

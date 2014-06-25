<?php
	define( '_CODENAME', 'PhotoshelterAPI'); 
	define( '_VERSION', '1.0.8'); 
	define( '_URL', 'https://github.com/golchha21/PhotoshelterAPI');
	error_reporting(E_ERROR);
	
	class PHOTOSHELTER {
		
		// CURL timeout
		private $timeout 	= 5;
		// Photoshelter URL (to be set by the constructor)
		private $url 		= '';
		// CURL Useragent
		private $useragent 	= 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13';
		// Photoshelter URL regex
		private $regex 		= '/([a-zA-Z0-9]*).photoshelter.com/';

		// Constructor
		function __construct( $args ) {
			extract($args);
			if(isset($username)){
				$this->url 		= "http://$username.photoshelter.com";
			}
			if(isset($url) && empty($this->url) && isValidURL($url)){
				$this->url 		= "http://$url/";
			}
			$this->regex		= ( isset( $regex ) && !empty( $regex ) ? $regex : $this->regex );
			$this->timeout		= ( isset( $timeout ) && $timeout > $this->timeout ? $timeout : $this->timeout );
			$this->useragent	= ( isset( $useragent ) && !empty( $useragent ) ? $useragent : $this->useragent );
		}
		
		// Returns the Photoshelter Gallery as an array or structured list so as to produce a photogallery
		function listGallery( $array = false, $c_in_t = true, $wrap = '<ul class="thumbnails">%s</ul>', $i_wrap = '<li class="span2">%s</li>', $t_wrap = '<div class="thumbnail">%s</div>', $c_wrap = '<div class="caption">%s</div>' ) {
			$return = '';
			$gallerys = $this->getDataFromUrl( "$this->url/gallery-list/?feed=json" );
			if( $gallerys ) {
				$gallerys = json_decode( $gallerys );
				$gallerys = $gallerys->gl;
				if( $array ) {
					foreach( $gallerys as $album ) {
						if( $album->A_MODE=='PUB' ) {
							$images['_id'] 			= $album->G_ID;
							$images['_name']		= $album->G_NAME;
							$images['_desc']		= $album->G_DESCRIPTION;
							$images['_image'] 		= $album->I_ID;
							$images['_count'] 		= $album->NUM_IMAGES;
							$images['_created'] 	= $album->G_CTIME;
							$images['_modified']	= $album->G_MTIME;
						}
						$return[] = $images;
					}
				} else {
					foreach ( $gallerys as $album ) {
						if( $album->A_MODE=='PUB' ) {
							$caption 	= vsprintf( $c_wrap, $album->G_NAME );
							if( $c_in_t ) {
								$thumbnail 	= vsprintf( $t_wrap, '<img src="http://cdn.c.photoshelter.com/img-get/' . $album->I_ID . '" >' . $caption);
								$return		.= vsprintf( $i_wrap, '<a href="?gid=' . $album->G_ID . '">' . $thumbnail .'</a>' );
							} else {
								$thumbnail 	= vsprintf( $t_wrap, '<img src="http://cdn.c.photoshelter.com/img-get/' . $album->I_ID . '" >' );
								$return		.= vsprintf( $i_wrap, '<a href="?gid=' . $album->G_ID . '">' . $thumbnail . $caption .'</a>' );
							}
						}
					}		
					$return = vsprintf( $wrap, $return );
				}
			}
			return $return;
		}
		
		// Returns the Photoshelter Gallery as a list or an array w/, w/o count.
		function listGalleryNames( $array = false, $count = true, $target = true ) {
			$return = '';
			$gallerys = $this->getDataFromUrl( "$this->url/gallery-list/?feed=json" );
			if( $gallerys ) {
				$gallerys = json_decode( $gallerys );
				$gallerys = $gallerys->gl;
				if( $array ) {
					foreach( $gallerys as $album ) {
						if( $album->A_MODE=='PUB' ) {
							$images['_id'] 			= $album->G_ID;
							$images['_name']		= $album->G_NAME;
							$images['_desc']		= $album->G_DESCRIPTION;
							$images['_image'] 		= $album->I_ID;
							$images['_count'] 		= $album->NUM_IMAGES;
							$images['_created'] 	= $album->G_CTIME;
							$images['_modified']	= $album->G_MTIME;
						}
						$return[] = $images;
					}
				} else {
					$return .= '<ul>';
					foreach ( $gallerys as $album ) {
						if( $album->A_MODE=='PUB' ) {
							if( $count ) {
								$_target = ' target="_blank" ';
								$return .= '<li><a' . ( $target ? $_target : ' ' ) . 'href="?gid=' . $album->G_ID . '">' . $album->G_NAME .   ' (' . $album->NUM_IMAGES . ')</a><br>' . $album->G_DESCRIPTION . '</li>';
							} else {
								$return .= '<li><a' . ( $target ? $_target : ' ' ) . 'href="?gid=' . $album->G_ID . '">' . $album->G_NAME . '</a></li>';
							}
						}
					}
					$return .= '</ul>';
				}
			}
			return $return;
		}
			
		// Returns the user details form the rss feed.
		function userDetail() {
			$return = false;
			$xml = $this->getDataFromUrl("$this->url/?feed=rss");
			if( $xml ) {
				$xml = simplexml_load_string($xml);
				$return['_title']	= (string)$xml->channel->title;
				$return['_link']	= (string)$xml->channel->link;
				$return['_updated']	= date('M d, Y',strtotime((string)$xml->channel->pubDate));
			}
			return $return;
		}
		
		// Gets the content from the URL
		function getDataFromUrl( $url ) {
			$return = false;
			if ( ini_get('allow_url_fopen') ) {
				$return = file_get_contents($url);
			} elseif ( extension_loaded( 'curl' ) ) {
				$ch = curl_init();
				curl_setopt( $ch, CURLOPT_URL, $url );
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
				curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $this->timeout );
				curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
				curl_setopt( $ch, CURLOPT_USERAGENT, $this->useragent );
				$return = curl_exec( $ch );
				curl_close( $ch );
			}
			return $return;
		}
		
		// Return whether the url is valid photoshelter url or not.
		private function isValidURL( $url )	{
			return preg_match($this->regex, $url);
		}
		
		// Prints the content supplied with <pre> tags
		function putPre( $data ) {
			echo '<pre class="prettyprint linenums">';
			print_r( $data );
			echo '</pre>';
		}
	}
?>

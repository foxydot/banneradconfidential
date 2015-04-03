<?php return array(


/* Theme Admin Menu */
"menu" => array(
    array("id"    => "1",
          "name"  => "General"),
    
    array("id"    => "2",
          "name"  => "Homepage"),
          
	array("id"    => "7",
          "name"  => "Banners"),
),

/* Theme Admin Options */
"id1" => array(
    array("type"  => "preheader",
          "name"  => "Theme Settings"),

	 array("name"  => "Logo Image",
          "desc"  => "Upload a custom logo image for your site, or you can specify an image URL directly.",
          "id"    => "misc_logo_path",
          "std"   => "",
          "type"  => "upload"),

    array("name"  => "Favicon URL",
          "desc"  => "Upload a favicon image (16&times;16px).",
          "id"    => "misc_favicon",
          "std"   => "",
          "type"  => "upload"),
          
    array("name"  => "Custom Feed URL",
          "desc"  => "Example: <strong>http://feeds.feedburner.com/wpzoom</strong>",
          "id"    => "misc_feedburner",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Display Social Icons in Top Menu",
          "desc"  => "Leave this checked if you want to display the social icons in the header.",
          "id"    => "social_icons_show",
          "std"   => "on",
          "type"  => "checkbox"), 
 
    array("name"  => "Twitter URL",
          "desc"  => "Example: <strong>http://twitter.com/wpzoom</strong>",
          "id"    => "social_icons_twitter",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Facebook URL",
          "desc"  => "Example: <strong>http://www.facebook.com/wpzoom</strong>",
          "id"    => "social_icons_facebook",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Linkedin URL",
          "desc"  => "Example: <strong>http://twitter.com/wpzoom</strong>",
          "id"    => "social_icons_linkedin",
          "std"   => "",
          "type"  => "text"),
          
    array("name"  => "Flickr URL",
          "desc"  => "Example: <strong>http://twitter.com/wpzoom</strong>",
          "id"    => "social_icons_flickr",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Picasa URL",
          "desc"  => "Example: <strong>http://twitter.com/wpzoom</strong>",
          "id"    => "social_icons_picasa",
          "std"   => "",
          "type"  => "text"),
          
    array("name"  => "Skype ID",
          "desc"  => "Example: username",
          "id"    => "social_icons_skype",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Vimeo URL",
          "desc"  => "Example: <strong>http://twitter.com/wpzoom</strong>",
          "id"    => "social_icons_vimeo",
          "std"   => "",
          "type"  => "text"),
          
    array("name"  => "Youtube URL",
          "desc"  => "Example: <strong>http://twitter.com/wpzoom</strong>",
          "id"    => "social_icons_youtube",
          "std"   => "",
          "type"  => "text"),

 	array("type"  => "preheader",
          "name"  => "Global Menu Options"),

    array("name"  => "Show top menu",
          "id"    => "menu_top_show",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show top secondary menu",
          "id"    => "menu_top_secondary_show",
          "std"   => "on",
          "type"  => "checkbox"),

 	array("type"  => "preheader",
          "name"  => "Posts Archives Options"),
          
    array("name"  => "Excerpt length",
          "desc"  => "Default: <strong>25</strong> (words)",
          "id"    => "excerpt_length",
          "std"   => "25",
          "type"  => "text"),

    array("name"  => "Show Date/time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "display_date",
          "std"   => "on",
          "type"  => "checkbox"),  

	array("type"  => "preheader",
          "name"  => "Single Post Options"),
          
	array("name"  => "Show Date/time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "post_date",
          "std"   => "on",
          "type"  => "checkbox"),  
          
    array("name"  => "Show Category",
          "id"    => "post_category",
          "std"   => "off",
          "type"  => "checkbox"), 
          
    array("name"  => "Show Left Column",
          "desc"  => "You can completely disable the left narrow column in single posts.",
          "id"    => "post_metabar",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show Related Posts",
          "desc"  => "Display 5 most recent posts in the same category as the active post.",
		  "id"    => "post_related",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show Author Profile",
          "desc"  => "You can edit your profile on this <a href='profile.php' target='_blank'>page</a>.",
          "id"    => "post_author",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Tags",
          "id"    => "post_tags",
          "std"   => "on",
          "type"  => "checkbox"),
          
	array("name"  => "Show Social Buttons",
          "id"    => "post_share",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show Comments",
          "id"    => "post_comments",
          "std"   => "on",
          "type"  => "checkbox"),

	array("type"  => "preheader",
          "name"  => "Single Page Options"),
          
    array("name"  => "Show Comments",
          "id"    => "page_comments",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show Left Column",
          "id"    => "page_comments",
          "std"   => "on",
          "type"  => "checkbox"),

),

"id2" => array(          

	array("type"  => "preheader",
          "name"  => "Homepage Settings"),

	array("name"  => "Display Recent Posts",
          "id"    => "recent_part_enable",
          "std"   => "on",
          "type"  => "checkbox"),
 
    array("name"  => "Recent Posts Color",
          "desc"  => "Choose the color for the background of the category title",
          "id"    => "recent_posts_color",
          "options" => array('Blue','Blue2','Blue3','Dark','Green','Grey','Grey2','Pink','Purple','Red'),
          "std"   => "Blue",
          "type"  => "select"),
 
	array("name"  => "Exclude categories",
          "desc"  => "Exclude categories from appearing in the Recent Posts block.",
          "id"    => "recent_part_exclude",
          "std"   => "",
          "type"  => "select-category-multi"),

	array("name"  => "Display Featured Posts",
          "desc"  => "Display featured posts at the top of the Homepage.<br />If you have troubles displaying posts in this section, please <a href='http://www.wpzoom.com/documentation/splendid/#featured' target='_blank'>read the documentation</a>.",
          "id"    => "featured_enable",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Hide Featured Posts in Recent Posts?",
          "desc"  => "You can use this option if you want to hide posts which are featured on front page from the Recent Posts block, to avoid duplication.",
          "id"    => "hide_featured",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Featured Posts Color",
          "desc"  => "Choose the color for the background of the category title",
          "id"    => "featured_posts_color",
          "options" => array('Blue','Blue2','Blue3','Dark','Green','Grey','Grey2','Pink','Purple','Red'),
          "std"   => "Blue",
          "type"  => "select"),

	array("name"  => "Number of posts to display",
          "desc"  => "Choose how many featured posts should be displayed.",
          "id"    => "featured_number",
          "std"   => "4",
          "type"  => "text"),

	array("name"  => "Autoplay (auto-scroll)",
          "desc"  => "Do you want to auto-scroll the slides? If yes, set the time in seconds. Ex: 5 (5 seconds). Leave 0 to disable autoplay.",
          "id"    => "featured_posts_autoplay",
          "std"   => "5",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Promoted Category"),

	array("name"  => "Display Promoted Category",
          "desc"  => "Do you want to display the promoted category on the homepage?",
          "id"    => "promoted_category_display",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Promoted Category",
          "desc"  => "Select the promoted category.",
          "id"    => "promoted_category",
          "std"   => "",
          "type"  => "select-category"),

    array("name"  => "Promoted Category Color",
          "desc"  => "Choose the color for the background of the category title",
          "id"    => "promoted_category_color",
          "options" => array('Blue','Blue2','Blue3','Dark','Green','Grey','Grey2','Pink','Purple','Red'),
          "std"   => "Blue",
          "type"  => "select"),

	array("name"  => "Number of posts to display",
          "desc"  => "Choose how many posts should be displayed.",
          "id"    => "promoted_number",
          "std"   => "3",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Promoted Wide Category"),

	array("name"  => "Display Promoted Wide Category",
          "desc"  => "Do you want to display the promoted wide category on the homepage?",
          "id"    => "promoted_wide_category_display",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Promoted Wide Category",
          "desc"  => "Select the promoted wide category.",
          "id"    => "promoted_wide_category",
          "std"   => "",
          "type"  => "select-category"),

    array("name"  => "Promoted Wide Category Color",
          "desc"  => "Choose the color for the background of the category title",
          "id"    => "promoted_wide_category_color",
          "options" => array('Blue','Blue2','Blue3','Dark','Green','Grey','Grey2','Pink','Purple','Red'),
          "std"   => "Blue",
          "type"  => "select"),

	array("name"  => "Number of posts to display",
          "desc"  => "Choose how many posts should be displayed.",
          "id"    => "promoted_wide_number",
          "std"   => "6",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Twitter Box"),

	array("name"  => "Display the most recent tweet",
          "id"    => "twitter_enable",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Twitter Username",
          "desc"  => "Example: wpzoom",
          "id"    => "twitter_account",
          "std"   => "wpzoom",
          "type"  => "text"),
    ),

"id7" => array(

	array("type"  => "preheader",
          "name"  => "Header Ad"),
          
	array("name"  => "Enable ad in header, to the right of the site logo.",
          "id"    => "banner_header_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_header_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_header",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_header_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_header_alt",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Sidebar Top Ad"),
          
	array("name"  => "Enable ad in sidebar, before menu and widgets",
          "id"    => "banner_sidebar_top_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_sidebar_top_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_sidebar_top",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_sidebar_top_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_sidebar_top_alt",
          "type"  => "text"),
          
          
	array("type"  => "preheader",
          "name"  => "Sidebar Bottom Ad"),
          
	array("name"  => "Enable ad in sidebar, after menu and widgets",
          "id"    => "banner_sidebar_bottom_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_sidebar_bottom_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_sidebar_bottom",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_sidebar_bottom_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_sidebar_bottom_alt",
          "type"  => "text"),

)

/* end return */);
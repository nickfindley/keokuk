wp.domReady( function() {
    var deny_blocks = [
        // // 'paragraph',
        // // 'image',
        // // 'heading',
        // 'gallery',
        // // 'list',
        // // 'quote',
        // // 'shortcode',
        // 'archives',
        // // 'audio',
        // 'button',
        // 'buttons',
        // 'calendar',
        // 'categories',
        // // 'code',
        // // 'columns',
        // // 'column',
        // 'cover',
        // 'embed',
        // // 'file',
        // // 'group',
        // 'freeform',
        // // 'html',
        // 'media-text',
        // 'latest-comments',
        // 'latest-posts',
        // 'missing',
        // // 'more',
        // 'nextpage',
        // 'preformatted',
        // 'pullquote',
        // 'rss',
        // 'search',
        // // 'separator',
        // 'block',
        // 'social-links',
        // 'social-link',
        // 'spacer',
        // 'subhead',
        // // 'table',
        // 'tag-cloud',
        // 'text-columns',
        // 'verse',
        // 'video',
        'amazon-kindle',
        'animoto',
        'cloudup',
        'collegehumor',
        'crowdsignal',
        'dailymotion',
        'facebook',
        'flickr',
        'imgur',
        'instagram',
        'issuu',
        'kickstarter',
        'meetup-com',
        'mixcloud',
        'reddit',
        'reverbnation',
        'screencast',
        'scribd',
        'slideshare',
        'smugmug',
        'soundcloud',
        'speaker-deck',
        // 'spotify',
        'ted',
        'tiktok',
        'tumblr',
        // 'twitter',
        'videopress',
        //'vimeo'
        'wordpress',
        'wordpress-tv',
        //'youtube'
    ];

    for (var i = deny_blocks.length - 1; i >= 0; i--) {
        wp.blocks.unregisterBlockVariation('core/embed', deny_blocks[i]);
        console.log(deny_blocks[i]);
    }

    wp.blocks.unregisterBlockType('core/archives');
    wp.blocks.unregisterBlockType('core/buttons');
    wp.blocks.unregisterBlockType('core/calendar');
    wp.blocks.unregisterBlockType('core/categories');
    wp.blocks.unregisterBlockType('core/cover');
    wp.blocks.unregisterBlockType('core/latest-comments');
    wp.blocks.unregisterBlockType('core/latest-posts');
    wp.blocks.unregisterBlockType('core/media-text');
    wp.blocks.unregisterBlockType('core/nextpage');
    wp.blocks.unregisterBlockType('core/pullquote');
    wp.blocks.unregisterBlockType('core/rss');
    wp.blocks.unregisterBlockType('core/search');
    wp.blocks.unregisterBlockType('core/social-link');
    wp.blocks.unregisterBlockType('core/social-links');
    wp.blocks.unregisterBlockType('core/spacer');
    wp.blocks.unregisterBlockType('core/tag-cloud');
    wp.blocks.unregisterBlockType('core/verse');
} );
<?php
$functions_dir = get_template_directory() . '/functions/';

require $functions_dir . 'archive-title.php';
require $functions_dir . 'broadcast.php';
// require $functions_dir . 'deny-blocks.php';
require $functions_dir . 'excerpt.php';
require $functions_dir . 'multisite-widgets.php';
require $functions_dir . 'oxford-categories.php';
require $functions_dir . 'pagination.php';
require $functions_dir . 'places.php';
require $functions_dir . 'posted-on.php';
require $functions_dir . 'scripts.php';
require $functions_dir . 'setup.php';
require $functions_dir . 'sharing-links.php';
require $functions_dir . 'updated.php';
require $functions_dir . 'widgets-init.php';

require $functions_dir . 'utilities/autoversion.php';
require $functions_dir . 'utilities/format-phone.php';
require $functions_dir . 'utilities/get-primary-taxonomy-term.php';
require $functions_dir . 'utilities/hex-to-rgb.php';
require $functions_dir . 'utilities/temp-column.php';

require $functions_dir . 'acf/options.php';
require $functions_dir . 'acf/options/options-places-settings.php';
require $functions_dir . 'acf/options/options-subsite-menu.php';

require $functions_dir . 'acf/chartjs.php';
require $functions_dir . 'acf/chartjs-bar.php';
require $functions_dir . 'acf/chartjs-line.php';
require $functions_dir . 'acf/flickity-events.php';
require $functions_dir . 'acf/follow.php';
require $functions_dir . 'acf/masonry.php';
require $functions_dir . 'acf/masonry-container.php';
require $functions_dir . 'acf/news.php';

require $functions_dir . 'events-calendar/default-blocks.php';
require $functions_dir . 'events-calendar/month-links.php';
require $functions_dir . 'events-calendar/events-calendar-scripts.php';

require $functions_dir . 'forminator/forminator-scripts.php';

require $functions_dir . 'gtranslate/gtranslate-scripts.php';
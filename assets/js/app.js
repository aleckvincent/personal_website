/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

 

// any CSS you import will output into a single css file (app.css in this case)
require('../css/bootstrap.min.css')
require('../css/normalize.css')
require('../css/transition-animation.css')
require('../css/owl.carousel.css')
require('../css/jquery.mCustomScrollbar.min.css')
require('../css/magnific-popup.css')
require('../css/animate.css')

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
 import $ from 'jquery';
 import 'jquery-mousewheel';
 import 'modernizr';
require('./theme/modernizr.custom.js')
require('./theme/bootstrap.min.js')
require('./theme/imagesloaded.pkgd.min.js')
require('./theme/jquery.hoverdir.js')
require('./theme/jquery.shuffle.min.js')
require('./theme/jquery.magnific-popup.min.js')
require('./theme/masonry.pkgd.min.js')
require('./theme/owl.carousel.min.js')
require('./theme/page-transition.js')
require('./theme/validator.js')
require('./theme/jquery.mCustomScrollbar.concat.min.js')
require('./theme/tilt.jquery.min.js')
require('./theme/main.js')
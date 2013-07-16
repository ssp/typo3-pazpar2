<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "pazpar2".
 *
 * Auto generated 17-07-2013 01:29
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'pazpar2',
	'description' => 'Interface for Index Data’s pazpar2 metasearch middleware',
	'category' => 'plugin',
	'version' => '3.0.0',
	'state' => 'beta',
	'author' => 'Sven-S. Porst',
	'author_email' => 'porst@sub.uni-goettingen.de',
	'author_company' => 'Göttingen State and University Library, Germany http://www.sub.uni-goettingen.de',
	'constraints' => array(
		'depends' => array(
			'php' => '5.3.0-0.0.0',
			'typo3' => '4.5.3-0.0.0',
			'extbase' => '1.3.0-0.0.0',
			'fluid' => '1.3.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'typo3' => '4.7.1-0.0.0',
			't3jquery' => '1.8.0-0.0.0',
			'nkwgok' => '2.2.0-0.0.0',
		),
	),
	'dependencies' => 'extbase,fluid',
	'conflicts' => '',
	'suggests' => 't3jquery,nkwgok',
	'priority' => '',
	'loadOrder' => '',
	'shy' => '',
	'module' => '',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'_md5_values_when_last_written' => 'a:154:{s:12:"ext_icon.gif";s:4:"4a8e";s:17:"ext_localconf.php";s:4:"2864";s:14:"ext_tables.php";s:4:"9f53";s:15:"README.markdown";s:4:"6fc1";s:12:"t3jquery.txt";s:4:"6acc";s:40:"Classes/Controller/Pazpar2Controller.php";s:4:"c2b5";s:54:"Classes/Controller/Pazpar2neuerwerbungenController.php";s:4:"1c52";s:52:"Classes/Controller/Pazpar2serviceproxyController.php";s:4:"d1ff";s:46:"Classes/Domain/Model/Pazpar2neuerwerbungen.php";s:4:"894e";s:30:"Classes/Domain/Model/Query.php";s:4:"543f";s:37:"Classes/Domain/Model/QueryPazpar2.php";s:4:"d104";s:42:"Classes/Domain/Model/QueryServiceProxy.php";s:4:"3333";s:28:"Classes/Service/Flexform.php";s:4:"4a0e";s:40:"Classes/ViewHelpers/ResultViewHelper.php";s:4:"2cd4";s:35:"Configuration/FlexForms/Pazpar2.xml";s:4:"0117";s:38:"Configuration/TypoScript/constants.txt";s:4:"1712";s:34:"Configuration/TypoScript/setup.txt";s:4:"2555";s:49:"Resources/Private/Language/locallang-flexform.xml";s:4:"2927";s:40:"Resources/Private/Language/locallang.xml";s:4:"d771";s:37:"Resources/Private/Layouts/Layout.html";s:4:"654c";s:36:"Resources/Private/Partials/form.html";s:4:"ccfd";s:60:"Resources/Private/Partials/neuerwerbungen-form-fieldset.html";s:4:"1769";s:51:"Resources/Private/Partials/neuerwerbungen-form.html";s:4:"69a6";s:39:"Resources/Private/Partials/results.html";s:4:"485e";s:46:"Resources/Private/Templates/Pazpar2/Index.html";s:4:"709f";s:60:"Resources/Private/Templates/Pazpar2neuerwerbungen/Index.html";s:4:"672f";s:58:"Resources/Private/Templates/Pazpar2serviceproxy/Index.html";s:4:"709f";s:39:"Resources/Private/XSL/pz2-to-bibtex.xsl";s:4:"7416";s:36:"Resources/Private/XSL/pz2-to-ris.xsl";s:4:"0a90";s:43:"Resources/Public/convert-pazpar2-record.php";s:4:"9b4f";s:38:"Resources/Public/pz2-neuerwerbungen.js";s:4:"b6c3";s:50:"Resources/Public/pz2-client/button_shade_large.png";s:4:"d68e";s:56:"Resources/Public/pz2-client/button_shade_large_click.png";s:4:"04e0";s:50:"Resources/Public/pz2-client/button_shade_small.png";s:4:"c15c";s:56:"Resources/Public/pz2-client/button_shade_small_click.png";s:4:"ae7a";s:34:"Resources/Public/pz2-client/mk2.js";s:4:"73b9";s:41:"Resources/Public/pz2-client/pz2-client.js";s:4:"30c9";s:47:"Resources/Public/pz2-client/pz2-media-icons.png";s:4:"220c";s:50:"Resources/Public/pz2-client/pz2-neuerwerbungen.css";s:4:"a89f";s:49:"Resources/Public/pz2-client/pz2-neuerwerbungen.js";s:4:"8361";s:35:"Resources/Public/pz2-client/pz2.css";s:4:"c69e";s:34:"Resources/Public/pz2-client/pz2.js";s:4:"f568";s:43:"Resources/Public/pz2-client/README.markdown";s:4:"5da4";s:64:"Resources/Public/pz2-client/converter/convert-pazpar2-record.php";s:4:"0eda";s:55:"Resources/Public/pz2-client/converter/pz2-to-bibtex.xsl";s:4:"7416";s:52:"Resources/Public/pz2-client/converter/pz2-to-ris.xsl";s:4:"0a90";s:82:"Resources/Public/pz2-client/converter/test-records/location-article-goescholar.xml";s:4:"f8f7";s:71:"Resources/Public/pz2-client/converter/test-records/location-article.xml";s:4:"5dc7";s:73:"Resources/Public/pz2-client/converter/test-records/location-book-mega.xml";s:4:"9553";s:68:"Resources/Public/pz2-client/converter/test-records/location-book.xml";s:4:"28fa";s:39:"Resources/Public/pz2-client/flot/API.md";s:4:"086f";s:47:"Resources/Public/pz2-client/flot/component.json";s:4:"582e";s:48:"Resources/Public/pz2-client/flot/CONTRIBUTING.md";s:4:"54d8";s:44:"Resources/Public/pz2-client/flot/excanvas.js";s:4:"e5b3";s:48:"Resources/Public/pz2-client/flot/excanvas.min.js";s:4:"ee9e";s:39:"Resources/Public/pz2-client/flot/FAQ.md";s:4:"4106";s:49:"Resources/Public/pz2-client/flot/flot.jquery.json";s:4:"8ca6";s:55:"Resources/Public/pz2-client/flot/jquery.colorhelpers.js";s:4:"c4cf";s:54:"Resources/Public/pz2-client/flot/jquery.flot.canvas.js";s:4:"db75";s:58:"Resources/Public/pz2-client/flot/jquery.flot.categories.js";s:4:"c52f";s:57:"Resources/Public/pz2-client/flot/jquery.flot.crosshair.js";s:4:"bd7b";s:57:"Resources/Public/pz2-client/flot/jquery.flot.errorbars.js";s:4:"d70d";s:59:"Resources/Public/pz2-client/flot/jquery.flot.fillbetween.js";s:4:"1331";s:53:"Resources/Public/pz2-client/flot/jquery.flot.image.js";s:4:"b2c0";s:47:"Resources/Public/pz2-client/flot/jquery.flot.js";s:4:"9832";s:56:"Resources/Public/pz2-client/flot/jquery.flot.navigate.js";s:4:"9b2c";s:51:"Resources/Public/pz2-client/flot/jquery.flot.pie.js";s:4:"4614";s:54:"Resources/Public/pz2-client/flot/jquery.flot.resize.js";s:4:"db13";s:57:"Resources/Public/pz2-client/flot/jquery.flot.selection.js";s:4:"21c9";s:53:"Resources/Public/pz2-client/flot/jquery.flot.stack.js";s:4:"aec4";s:54:"Resources/Public/pz2-client/flot/jquery.flot.symbol.js";s:4:"4c56";s:57:"Resources/Public/pz2-client/flot/jquery.flot.threshold.js";s:4:"0c66";s:52:"Resources/Public/pz2-client/flot/jquery.flot.time.js";s:4:"601e";s:42:"Resources/Public/pz2-client/flot/jquery.js";s:4:"2073";s:44:"Resources/Public/pz2-client/flot/LICENSE.txt";s:4:"fe1e";s:41:"Resources/Public/pz2-client/flot/Makefile";s:4:"fe71";s:40:"Resources/Public/pz2-client/flot/NEWS.md";s:4:"cb5b";s:45:"Resources/Public/pz2-client/flot/package.json";s:4:"c048";s:43:"Resources/Public/pz2-client/flot/PLUGINS.md";s:4:"edc1";s:42:"Resources/Public/pz2-client/flot/README.md";s:4:"ab6b";s:56:"Resources/Public/pz2-client/flot/examples/background.png";s:4:"a855";s:59:"Resources/Public/pz2-client/flot/examples/basic-canvas.html";s:4:"6145";s:54:"Resources/Public/pz2-client/flot/examples/examples.css";s:4:"c6da";s:52:"Resources/Public/pz2-client/flot/examples/index.html";s:4:"bcf9";s:72:"Resources/Public/pz2-client/flot/examples/ajax/data-eu-gdp-growth-1.json";s:4:"02c7";s:72:"Resources/Public/pz2-client/flot/examples/ajax/data-eu-gdp-growth-2.json";s:4:"0419";s:72:"Resources/Public/pz2-client/flot/examples/ajax/data-eu-gdp-growth-3.json";s:4:"aedd";s:72:"Resources/Public/pz2-client/flot/examples/ajax/data-eu-gdp-growth-4.json";s:4:"b310";s:72:"Resources/Public/pz2-client/flot/examples/ajax/data-eu-gdp-growth-5.json";s:4:"3af6";s:70:"Resources/Public/pz2-client/flot/examples/ajax/data-eu-gdp-growth.json";s:4:"3af6";s:73:"Resources/Public/pz2-client/flot/examples/ajax/data-japan-gdp-growth.json";s:4:"10cc";s:71:"Resources/Public/pz2-client/flot/examples/ajax/data-usa-gdp-growth.json";s:4:"27c9";s:57:"Resources/Public/pz2-client/flot/examples/ajax/index.html";s:4:"c08b";s:63:"Resources/Public/pz2-client/flot/examples/annotating/index.html";s:4:"cfef";s:69:"Resources/Public/pz2-client/flot/examples/axes-interacting/index.html";s:4:"ee08";s:66:"Resources/Public/pz2-client/flot/examples/axes-multiple/index.html";s:4:"119e";s:62:"Resources/Public/pz2-client/flot/examples/axes-time/index.html";s:4:"51e8";s:65:"Resources/Public/pz2-client/flot/examples/axes-time-zones/date.js";s:4:"3dfa";s:68:"Resources/Public/pz2-client/flot/examples/axes-time-zones/index.html";s:4:"1165";s:67:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/africa";s:4:"e529";s:71:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/antarctica";s:4:"cd9d";s:65:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/asia";s:4:"5590";s:72:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/australasia";s:4:"80e0";s:69:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/backward";s:4:"f3e0";s:69:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/etcetera";s:4:"edc4";s:67:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/europe";s:4:"7d42";s:68:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/factory";s:4:"50aa";s:72:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/iso3166.tab";s:4:"fa8b";s:72:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/leapseconds";s:4:"63c9";s:73:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/northamerica";s:4:"279f";s:71:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/pacificnew";s:4:"3d10";s:68:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/solar87";s:4:"5606";s:68:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/solar88";s:4:"b5cd";s:68:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/solar89";s:4:"0ad9";s:73:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/southamerica";s:4:"4fb9";s:68:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/systemv";s:4:"7aaa";s:74:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/yearistype.sh";s:4:"d4c6";s:69:"Resources/Public/pz2-client/flot/examples/axes-time-zones/tz/zone.tab";s:4:"5ce8";s:66:"Resources/Public/pz2-client/flot/examples/basic-options/index.html";s:4:"299a";s:64:"Resources/Public/pz2-client/flot/examples/basic-usage/index.html";s:4:"9ffc";s:59:"Resources/Public/pz2-client/flot/examples/canvas/index.html";s:4:"3418";s:63:"Resources/Public/pz2-client/flot/examples/categories/index.html";s:4:"900c";s:74:"Resources/Public/pz2-client/flot/examples/image/hs-2004-27-a-large-web.jpg";s:4:"f5f0";s:58:"Resources/Public/pz2-client/flot/examples/image/index.html";s:4:"c2ae";s:64:"Resources/Public/pz2-client/flot/examples/interacting/index.html";s:4:"2688";s:65:"Resources/Public/pz2-client/flot/examples/navigate/arrow-down.gif";s:4:"7e3c";s:65:"Resources/Public/pz2-client/flot/examples/navigate/arrow-left.gif";s:4:"2d72";s:66:"Resources/Public/pz2-client/flot/examples/navigate/arrow-right.gif";s:4:"4aa8";s:63:"Resources/Public/pz2-client/flot/examples/navigate/arrow-up.gif";s:4:"1df1";s:61:"Resources/Public/pz2-client/flot/examples/navigate/index.html";s:4:"771d";s:64:"Resources/Public/pz2-client/flot/examples/percentiles/index.html";s:4:"279d";s:61:"Resources/Public/pz2-client/flot/examples/realtime/index.html";s:4:"267b";s:59:"Resources/Public/pz2-client/flot/examples/resize/index.html";s:4:"5308";s:62:"Resources/Public/pz2-client/flot/examples/selection/index.html";s:4:"f849";s:69:"Resources/Public/pz2-client/flot/examples/series-errorbars/index.html";s:4:"e07b";s:63:"Resources/Public/pz2-client/flot/examples/series-pie/index.html";s:4:"2815";s:66:"Resources/Public/pz2-client/flot/examples/series-toggle/index.html";s:4:"b92f";s:65:"Resources/Public/pz2-client/flot/examples/series-types/index.html";s:4:"4b1e";s:76:"Resources/Public/pz2-client/flot/examples/shared/jquery-ui/jquery-ui.min.css";s:4:"c882";s:75:"Resources/Public/pz2-client/flot/examples/shared/jquery-ui/jquery-ui.min.js";s:4:"36cf";s:61:"Resources/Public/pz2-client/flot/examples/stacking/index.html";s:4:"37b8";s:60:"Resources/Public/pz2-client/flot/examples/symbols/index.html";s:4:"4bd6";s:62:"Resources/Public/pz2-client/flot/examples/threshold/index.html";s:4:"4eb4";s:61:"Resources/Public/pz2-client/flot/examples/tracking/index.html";s:4:"2a5c";s:61:"Resources/Public/pz2-client/flot/examples/visitors/index.html";s:4:"9be2";s:60:"Resources/Public/pz2-client/flot/examples/zooming/index.html";s:4:"8bb9";s:14:"doc/manual.sxw";s:4:"8cb0";s:12:"doc/Setup.md";s:4:"a13c";s:37:"doc/images/45-Add-Content-Element.png";s:4:"626c";s:36:"doc/images/45-Add-General-Plugin.png";s:4:"d62b";s:39:"doc/images/45-Add-Template-Includes.png";s:4:"582d";s:30:"doc/images/45-Add-Template.png";s:4:"5775";s:35:"doc/images/45-Install-Extension.png";s:4:"aa3d";s:31:"doc/images/45-Select-Plugin.png";s:4:"d5fa";}',
);

?>
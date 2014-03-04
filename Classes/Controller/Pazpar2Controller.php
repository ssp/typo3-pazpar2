<?php
/*******************************************************************************
 * Copyright notice
 *
 * Copyright (C) 2010-2014 by Sven-S. Porst <ssp-web@earthlingsoft.net>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 ******************************************************************************/


/**
 * Pazpar2Controller.php
 *
 * Provides the main controller for pazpar2 plug-in.
 *
 * @author Sven-S. Porst <ssp-web@earthlingsoft.net>
 */



/**
 * pazpar2 controller for the pazpar2 extension.
 */
class Tx_Pazpar2_Controller_Pazpar2Controller extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Query object handling the pazpar2 logic.
	 * @var Tx_Pazpar2_Domain_Model_Query
	 */
	protected $query;



	/**
	 * Returns the path of the pazpar2 service on the server or NULL.
	 *
	 * @return String|NULL
	 */
	protected function getPazpar2Path () {
		return $this->conf['pazpar2Path'];
	}


	
	/**
	 * @return Tx_Pazpar2_Domain_Model_Query
	 */
	protected function createQuery () {
		$query = t3lib_div::makeInstance('Tx_Pazpar2_Domain_Model_QueryPazpar2');
		$query->setPazpar2Path($this->getPazpar2Path());
		$query->setServiceName($this->conf['serviceID']);
		return $query;
	}



	/**
	 * Initialiser
	 *
	 * @return void
	 */
	public function initializeAction () {
		foreach ( $this->settings as $key => $value ) {
			// Transfer settings to conf
			$this->conf[$key] = $value;
			
			if (strpos($key, 'Path') !== False) {
				// Let TYPO3 try to process path settings as a path, so we can
				// use EXT: in the paths.
				$processedPath = $GLOBALS['TSFE']->tmpl->getFileName($value);
				if ($processedPath) {
					$this->conf[$key] = $processedPath;
				}
			}
		}

		if ( $this->settings['flexformOverride'] ) {
			$this->conf = array_merge($this->conf, $this->conf['flexformOverride']);
		}

		$this->query = $this->createQuery();
		$this->query->setQueryFromArguments($this->request->getArguments());
	}



	/**
	 * Index:
	 * 1. Prepare the page for the JS and CSS files needed.
	 * 2. Get parameters and run the query. Display results if there are any.
	 *
	 * @return void
	 */
	public function indexAction () {
		$this->addResourcesToHead();
		$arguments = $this->request->getArguments();
		$this->view->assign('arguments', $arguments);
		$this->view->assign('extended', $arguments['extended']);
		$this->view->assign('query', $this->query);
		if (array_key_exists('useJS', $arguments) && $arguments['useJS'] !== 'yes') {
			$this->query->setSortOrder($this->determineSortCriteria($arguments));
			$this->query->run();
		}
		$this->view->assign('conf', $this->conf);
	}



	/**
	 * Determine which sort criteria to use and return them as an array whose
	 *	elements are arrays with two elements: 'fieldName' and 'direction'.
	 * @param Array $arguments
	 * @return Array
	 */
	private function determineSortCriteria ($arguments) {
		$sortCriteria = Array();
		
		if (array_key_exists('sort', $arguments)) {
			// Sort order has been set by select on the page.
			$criteria = explode(',', $arguments['sort']);
			foreach ($criteria as $criterion) {
				$parts = explode(':', $criterion);
				if (count($parts) === 2) {
					$sortCriteria[] = Array (
						'fieldName' => $parts[0],
						'direction' => $parts[1]
					);
				}
			}
		}
		else {
			$sortCriteria[] = array('fieldName' => 'relevance', 'direction' => '0');
		}
		
		return $sortCriteria;
	}



	/**
	 * Helper: Inserts pazpar2 headers into page.
	 *
	 * @return void
	 */
	protected function addResourcesToHead () {
		// Add pazpar2.css to <head>.
		$cssTag = new Tx_Fluid_Core_ViewHelper_TagBuilder('link');
		$cssTag->addAttribute('rel', 'stylesheet');
		$cssTag->addAttribute('type', 'text/css');
		$cssTag->addAttribute('href', $this->conf['CSSPath']);
		$cssTag->addAttribute('media', 'all');
		$this->response->addAdditionalHeaderData( $cssTag->render() );

		$this->view->assign('serviceConfiguration', $this->configuration());
		$this->view->assign('localisationOverrides', $this->localisationOverrides());
	}



	/**
	 * Returns variables for the service configuration.
	 *
	 * @return void
	 */
	protected function serviceConfiguration () {
		$serviceConfiguration = array();
		$serviceConfiguration['serviceID'] = $this->conf['serviceID'];
		if ($this->getPazpar2Path()) {
			$serviceConfiguration['pazpar2Path'] = $this->getPazpar2Path();
		}
		
		return $serviceConfiguration;
	}



	/**
	 * Return an array with the configuration options for pz2-client.js.
	 * It needs to be inserted in the page as JavaScript after pz2-client.js is
	 * loaded to override the pre-set values.
	 *
	 * @return array
	 */
	protected function configuration () {
		$configuration = $this->serviceConfiguration();

		$configuration = array_merge($configuration, array(
			'useGoogleBooks' => ($this->conf['useGoogleBooks'] == TRUE),
			'useMaps' => ($this->conf['useMaps'] == TRUE),
			'useZDB' => ($this->conf['useZDB'] == TRUE),
			'ZDBUseClientIP' => ($this->conf['ZDBIP'] == FALSE),
			'usePazpar2Facets' => ($this->conf['usePazpar2Facets'] == TRUE),
			'useHistogramForYearFacets' => ($this->conf['useHistogramForYearFacets'] == TRUE),
			'provideCOinSExport' => ($this->conf['provideCOinSExport'] == TRUE),
			'showExportLinksForEachLocation' => ($this->conf['showExportLinksForEachLocation'] == TRUE),
			'showKVKLink' => ($this->conf['showKVKLink'] == TRUE),
			'showOpenURLLink' => ($this->conf['showOpenURLLink'] == TRUE),
			'useKeywords' => ($this->conf['useKeywords'] == TRUE),
			'historyItems' => (int)$this->conf['historyItems'],
			'addHistoryLink' => ($this->conf['addHistoryLink'] == TRUE),
			'useClipboard' => ($this->conf['useClipboard'] == TRUE),
			'addClipboardLink' => ($this->conf['addClipboardLink'] == TRUE),
			'highlightSearchTerms' => ($this->conf['highlightSearchTerms'] == TRUE)
		));

		// Use flexformOverride array to overwrite settings from the flexform.
		// Needed to allow everything from TypoScript without need for the flexform.
		if ($this->conf['flexformOverride'] && is_array($this->conf['flexformOverride'])) {
			$configuration = array_merge($configuration, $this->conf['flexformOverride']);
		}

		if (array_key_exists('exportFormats', $this->conf)) {
			$exportFormats = Array();
			foreach ($this->conf['exportFormats'] as $format => $value) {
				if ($value) {
					$exportFormats[] = $format;
				}
			}
			$configuration['exportFormats'] = $exportFormats;
		}

		if ($this->conf['siteName']) {
			$configuration['siteName'] = $this->conf['siteName'];
		}
		if ($this->conf['sortOrder']) {
			$configuration['displaySort'] = array_values(array_filter($this->conf['sortOrder']));
		}
		if ($this->conf['termLists']) {
			$configuration['termLists'] = $this->conf['termLists'];
		}
		if ($this->conf['autocompleteURLs']) {
			$configuration['autocompleteURLs'] = $this->conf['autocompleteURLs'];
		}

		return $configuration;
	}



	/**
	 * Returns an array with localisation information for the strings overriden
	 * in TypoScript.
	 * This is used to overwrite the JavaScript localisation.
	 *
	 * @return array
	 */
	private function localisationOverrides () {
				// Write custom localisations to pz2-client.js‚Äô localisation array
		$localisationOverrides = array();
		if (t3lib_utility_VersionNumber::convertVersionNumberToInteger(TYPO3_version) < 6000000) {
			// TYPO3 4: read from TSFE (ugly)
			$GLOBALSlocalisationOverrides = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_pazpar2.']['_LOCAL_LANG.'];
			// Keys in this arrays have a trailing ¬ª.¬´, e.g. ¬ªen.¬´: remove it.
			foreach ($GLOBALSlocalisationOverrides as $languageCode => $dictionary) {
				$localisationOverrides[substr_replace($languageCode, '', -1)] = $dictionary;
			}
		}
		else {
			// TYPO3 6+: use configuration manager
			$configFramework = $this->configurationManager->getConfiguration(TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK, 'pazpar2');
			$localisationOverrides = $configFramework['_LOCAL_LANG'];
		}

		return $localisationOverrides;
	}

}

?>

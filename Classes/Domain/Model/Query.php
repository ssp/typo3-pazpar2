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
 * Query.php
 *
 * Query model class.
 *
 * @author Sven-S. Porst <porst@sub-uni-goettingen.de>
 */



/**
 * Query model object.
 */
class Tx_Pazpar2_Domain_Model_Query extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Search query parts.
	 * 
	 * @var string|NULL
	 */
	protected $queryString = NULL;
	protected $querySwitchFulltext = NULL;
	protected $queryStringTitle = NULL;
	protected $querySwitchJournalOnly = NULL;
	protected $queryStringPerson = NULL;
	protected $queryStringKeyword = NULL;
	protected $queryStringDate = NULL;

	/**
	 * @return string|NULL
	 */
	public function getQueryString () { return $this->queryString; }
	public function getQuerySwitchFulltext () { return $this->querySwitchFulltext; }
	public function getQueryStringTitle () { return $this->queryStringTitle; }
	public function getQuerySwitchJournalOnly () { return $this->querySwitchJournalOnly; }
	public function getQueryStringPerson () { return $this->queryStringPerson; }
	public function getQueryStringKeyword () { return $this->queryStringKeyword; }
	public function getQueryStringDate () { return $this->queryStringDate; }



	/**
	 * Setter for the main query string.
	 * 
	 * @param string $newQueryString 
	 */
	public function setQueryString ($newQueryString) { 
		$this->queryString = $newQueryString;
	}



	/**
	 * Array containing the sort conditions to use. Each of its elements
	 *	is an array with the fields:
	 *  'fieldName' - a string containing the name of the pazpar2 field to sort by
	 *  'direction' - 1 (ascending) or 0 (descending)
	 *
	 * @var Array
	 */
	protected $sortOrder = Array();

	public function getSortOrder () { return $this->sortOrder; }
	public function setSortOrder ($newSortOrder) { $this->sortOrder = $newSortOrder; }



	/**
	 * The maximal number of results to fetch from pazpar2.
	 *
	 * @var int
	 */
	protected $maximumResults = 1000;

	/**
	 * @return int
	 */
	public function getMaximumResults () {
		return $this->maximumResults;
	}



	/**
	 * Set search query elements from the request’s arguments array.
	 * 
	 * @param array $newArguments 
	 */
	public function setQueryFromArguments ($newArguments) {
		$this->setQueryString(trim($newArguments['queryString']));
		$this->querySwitchFulltext = ($newArguments['querySwitchFulltext'] != '');
		$this->queryStringTitle = trim($newArguments['queryStringTitle']);
		$this->querySwitchJournalOnly = ($newArguments['querySwitchJournalOnly'] != '');
		$this->queryStringPerson = trim($newArguments['queryStringPerson']);
		$this->queryStringKeyword = trim($newArguments['queryStringKeyword']);
		$this->queryStringDate = trim($newArguments['queryStringDate']);
		if ($newArguments['maximumResults']) {
			$this->maximumResults = (int)$newArguments['maximumResults'];
		}
	}



	/**
	 * Absolute path of the pazpar2 service on the host.
	 *
	 * @var string
	 */
	protected $pazpar2Path = '/pazpar2/search.pz2';

	/**
	 * @return string
	 */
	public function getPazpar2Path () {
		return $this->pazpar2Path;
	}

	/**
	 * @param string $newPazpar2Path
	 * @return void
	 */
	public function setPazpar2Path ($newPazpar2Path) {
		$this->pazpar2Path = $newPazpar2Path;
	}


	
	/**
	 * Service name to run the query on.
	 *
	 * @var string|NULL
	 */
	protected $serviceName = NULL;

	/**
	 * @return string
	 */
	public function getServiceName () {
		return $this->serviceName;
	}

	/**
	 * @param string $newServiceName
	 * @return void
	 */
	public function setServiceName ($newServiceName) {
		$this->serviceName = $newServiceName;
	}



	/**
	 * Name of the institution proving database access (as determined by
	 * the pazpar2-access.php proxy service).
	 *
	 * @var string|NULL $institutionName
	 */
	protected $institutionName = NULL;

	/**
	 * @return string|NULL
	 */
	protected function getInstitutionName () {
		return $this->institutionName;
	}

	/**
	 * @param string $newInstitutionName
	 */
	protected function setInstitutionName ($newInstitutionName) {
		$this->institutionName = $newInstitutionName;
	}



	/**
	 * FALSE by default, TRUE when the Query finished running.
	 *
	 * @var Boolean
	 */
	protected $didRun = FALSE;

	/**
	 * @return Boolean
	 */
	public function getDidRun () {
		return $this->didRun;
	}

	/**
	 * @param Boolean $newDidRun
	 */
	protected function setDidRun ($newDidRun) {
		$this->didRun = $newDidRun;
	}



	/**
	 * Indicates whether all targets in the service are active (as determined
	 * by the pazpar2-access.php proxy service).
	 *
	 * @var Boolean|NULL
	 */
	protected $allTargetsActive;

	/**
	 * @return Boolean|NULL
	 */
	public function getAllTargetsActive () {
		return $this->allTargetsActive;
	}

	/**
	 * @param Boolean $newAllTargetsActive
	 */
	protected function setAllTargetsActive ($newAllTargetsActive) {
		$this->allTargetsActive = $newAllTargetsActive;
	}


	
	/**
	 * URL of the pazpar2 service used.
	 * 
	 * @var string|NULL
	 */
	protected $pazpar2BaseURL;

	/**
	 * Return URL of pazpar2 service.
	 * If it is not set, return default URL on localhost.
	 *
	 * @return string
	 */
	public function getPazpar2BaseURL () {
		$URL = 'http://' . t3lib_div::getIndpEnv(HTTP_HOST) . $this->getPazpar2Path();
		if ($this->pazpar2BaseURL) {
			$URL = $this->pazpar2BaseURL;
		}
		return $URL;
	}

	/**
	 * Setter for pazpar2BaseURL variable.
	 * 
	 * @param string|NULL $newPazpar2BaseURL
	 * @return void
	 */
	public function setPazpar2BaseURL ($newPazpar2BaseURL) {
		$this->pazpar2BaseURL = $newPazpar2BaseURL;
	}



	/**
	 * Array holding the latest stat reply received from pazpar2 while waiting
	 * for the queries to finish.
	 * 
	 * @var array
	 */
	private $latestStatReply = array();

	/**
	 * @return array
	 */
	public function getLatestStatReply () {
		return $this->latestStatReply;
	}



	/**
	 * Array holding the search results after they are downloaded.
	 * The array's element can be displayed by the View Helper class
	 * Tx_Pazpar2_ViewHelpers_ResultViewHelper.
	 *
	 * @var array
	 */
	private $results = array();

	/**
	 * @return array
	 */
	public function getResults () {
		return $this->results;
	}



	/**
	 * The total number of results (including the ones that could not be fetched.
	 *
	 * @var integer
	 */
	private $totalResultCount;

	/**
	 * @return integer
	 */
	public function getTotalResultCount () {
		return $this->totalResultCount;
	}

	/**
	 * @param integer $newTotalResultCount
	 */
	protected function setTotalResultCount ($newTotalResultCount) {
		$this->totalResultCount = $newTotalResultCount;
	}



	/**
	 * VARIABLES FOR INTERNAL USE
	 */
	
	/**
	 * Stores state of query.
	 * @var Boolean
	 */
	protected $queryIsRunning;

	/**
	 * Stores time the current query was started.
	 * @var int
	 */
	protected $queryStartTime;



	/**
	 * Creates pazpar2 search string for the given index name and query term.
	 * Adds an 'indexName=' after and/not/or to allow logical operations in
	 * the fields of extended search.
	 *
	 * @param string $indexName
	 * @param string $searchString
	 * @return string
	 */
	protected function createSearchString ($indexName, $searchString) {
		$search = '(' . $indexName . '=' . $searchString . ')';
		$search = str_replace(' and ', ' and ' . $indexName . '=', $search);
		$search = str_replace(' not ', ' not ' . $indexName . '=', $search);
		$search = str_replace(' or ', ' or ' . $indexName . '=', $search);
		
		return $search;
	}



	/**
	 * Returns the full query string to send to pazpar2.
	 * 
	 * @return string
	 */
	protected function fullQueryString () {
		$queryParts = Array();

		// Main search can be default search or full text search.
		if ($this->queryString) {
			if (!$this->querySwitchFulltext) {
				$queryParts[] = $this->queryString;
			}
			else {
				$queryParts[] = $this->createSearchString('fulltext', $this->queryString);
			}
			
		}
		// Title search can be proper title or journal title depending on the switch.
		if ($this->queryStringTitle) {
			if (!$this->querySwitchJournalOnly) {
				$queryParts[] = $this->createSearchString('title', $this->queryStringTitle);
			}
			else {
				$queryParts[] = $this->createSearchString('journal', $this->queryStringTitle);
			}
		}
		// Person search is a phrase search.
		if ($this->queryStringPerson) {
			$myQueryStringPerson = preg_replace('/^[\s"]*/', '', $this->queryStringPerson);
			$myQueryStringPerson = preg_replace('/[\s"]*$/', '', $myQueryStringPerson);
			$queryParts[] = $this->createSearchString('person', '"' . $myQueryStringPerson . '"');
		}
		if ($this->queryStringKeyword) {
			$queryParts[] = $this->createSearchString('subject', $this->queryStringKeyword);
		}
		if ($this->queryStringDate) {
			$queryParts[] = $this->createSearchString('date', $this->queryStringDate);
		}

		$query = implode(' and ', $queryParts);
		$query = str_replace('*', '?', $query);
		return $query;
	}



	/**
	 * Returns URL to initialise pazpar2.
	 * If $serviceName has been set up, that service is used.
	 *
	 * @return string
	 */
	protected function pazpar2InitURL () {
		$URL = $this->getPazpar2BaseURL() . '?command=init';
		if ($this->getServiceName() != NULL) {
			$URL .= '&service=' . urlencode($this->getServiceName());
		}

		return $URL;
	}



	/**
	 * Returns URL for pazpar2 search command.
	 *
	 * @return string
	 */
	protected function pazpar2SearchURL () {
		$URL = $this->getPazpar2BaseURL() . '?command=search';
		$URL .= '&query=' . urlencode($this->fullQueryString());

		return $URL;
	}



	/**
	 * Returns URL for pazpar2 status command.
	 *
	 * @return string
	 */
	protected function pazpar2StatURL () {
		return $this->getPazpar2BaseURL() . '?command=stat';
	}



	/**
	 * Returns URL for downloading pazpar2 results.
	 * The parameters can be used to give the the start record
	 * as well as the number of records required.
	 * 
	 * TYPO3 typically starts running into out of memory errors when fetching
	 * around 1000 records in one go with a 128MB memory limit for PHP.
	 *
	 * @param int $start index of first record to retrieve (optional, default: 0)
	 * @param int $num number of records to retrieve (optional, default: 500)
	 * @return string 
	 */
	protected function pazpar2ShowURL ($start=0, $num=500) {
		$URL = $this->getPazpar2BaseURL() . '?command=show';
		$URL .= '&query=' . urlencode($this->fullQueryString());
		$URL .= '&start=' . $start . '&num=' . $num;
		$URL .= '&sort=' . urlencode($this->sortOrderString());
		$URL .= '&block=1'; // unclear how this is advantagous but the JS client adds it
		return $URL;
	}



	/**
	 * Returns a string encoding the sort order formatted for use by pazpar2.
	 *
	 * @return string
	 */
	protected function sortOrderString () {
		$sortOrderComponents = Array();
		foreach ($this->getSortOrder() as $sortCriterion) {
			$sortOrderComponents[] = $sortCriterion['fieldName'] . ':' . $sortCriterion['direction'];
		}
		$sortOrderString = implode(',', $sortOrderComponents);

		return $sortOrderString;
	}



	/**
	 * Returns the content loaded from the given URL.
	 *
	 * @param string $URL to fetch
	 * @return string
	 */
	protected function fetchURL ($URL) {
		return t3lib_div::getURL($URL);
	}



	/**
	 * Initialise pazpar2/Service Proxy.
	 * To be implemented in subclasses.
	 *
	 * @return boolean TRUE when initialisation was successful.
	 */
	protected function initialiseSession () {
		return FALSE;
	}



	/**
	 * Start a pazpar2 Query.
	 * Requires $pazpar2SessionID to be set.
	 */
	protected function startQuery () {
		$sessionOK = $this->initialiseSession();
		if ($sessionOK) {
			$searchReplyString = $this->fetchURL($this->pazpar2SearchURL());
			$searchReply = t3lib_div::xml2array($searchReplyString);

			if ($searchReply) {
				$status = $searchReply['status'];
				if ($status === 'OK') {
					$this->queryIsRunning = TRUE;
				}
				else {
					t3lib_div::devLog('pazpar2 search command status is not "OK" but "' . $status . '"', 'pazpar2', 3);
				}
			}
			else {
				t3lib_div::devLog('could not parse pazpar2 search reply', 'pazpar2', 3);
			}
		}
	}

	

	/**
	 * Checks whether the query is done.
	 * Requires a session to be established.
	 *
	 * @param int $count return by reference the current number of results
	 * @return boolean TRUE when query has finished, FALSE otherwise
	 */
	protected function queryIsDone () {
		$result = FALSE;

		$statReplyString = $this->fetchURL($this->pazpar2StatURL());
		$this->latestStatReply = t3lib_div::xml2array($statReplyString);

		if ($this->latestStatReply) {
			// The progress variable is a string representing a number between
			// 0.00 and 1.00. 
			// Casting it to int gives 0 as long as the value is < 1.
			$progress = (int)$this->latestStatReply['progress'];
			$result = ($progress === 1);
			if ($result === TRUE) {
				// We are done: note that and get the record count.
				$this->setDidRun(TRUE);
				$this->setTotalResultCount($this->latestStatReply['hits']);
			}
		}
		else {
			t3lib_div::devLog('could not parse pazpar2 stat reply', 'pazpar2', 3);
		}

		return $result;
	}



	/**
	 * Attempts to extract dates from $record and returns an array
	 * containing numbers from the 'date' fields as integers.
	 *
	 * @param Array $record location or full pazpar2 record
	 * @return Array of integers
	 */
	protected function extractNewestDates ($record) {
		$result = Array();

		if (array_key_exists('md-date', $record['ch'])) {
			foreach($record['ch']['md-date'] as $date) {
				$dateParts = preg_match_all('/[0-9]{4}/', $date['values'][0], $matches, PREG_SET_ORDER);
				if ($matches && count($matches) > 0 ) {
					$parsedDate = $matches[count($matches)-1][0];
					if (is_numeric($parsedDate)) {
						$result[] = (int)$parsedDate;
					}
				}
			}
		}

		return $result;
	}


	
	/**
	 * Auxiliary sort function for sorting records and locations based
	 * on their 'date' field with the newest item being first and undefined
	 * dates last.
	 *
	 * @param Array $a location or full pazpar2 record
	 * @param Array $b location or full pazpar2 record
	 * @return integer
	 */
	protected function yearSort($a, $b) {
		$aDates = $this->extractNewestDates($a);
		$bDates = $this->extractNewestDates($b);

		if (count($aDates) > 0 && count($bDates) > 0) {
			return $bDates[0] - $aDates[0];
		}
		else if (count($aDates) > 0 && count($bDates) === 0) {
			return -1;
		}
		else if (count($aDates) === 0 && count($bDates) > 0) {
			return 1;
		}
		else {
			return 0;
		}
	}



	/**
	 * Fetches results from pazpar2.
	 * Requires an established session.
	 *
	 * Stores the results in $results and the total result count in $totalResultCount.
	 */
	protected function fetchResults () {
		$maxResults = $this->getMaximumResults(); // limit results
		if (count($this->conf['exportFormats']) > 0) {
			// limit results even more if we are creating export data
			$maxResults = $maxResults / (count($this->conf['exportFormats']) + 1);
		}
		$recordsToFetch = 350;
		$firstRecord = 0;

		// get records in chunks of $recordsToFetch to avoid running out of memory
		// in t3lib_div::xml2tree. We seem to typically need ~100KB per record (?).
		while ($firstRecord < $maxResults) {
			$recordsToFetchNow = min(Array($recordsToFetch, $maxResults - $firstRecord));
			$showReplyString = $this->fetchURL($this->pazpar2ShowURL($firstRecord, $recordsToFetchNow));
			$firstRecord += $recordsToFetchNow;

			// need xml2tree here as xml2array fails when dealing with arrays of tags with the same name
			$showReplyTree = t3lib_div::xml2tree($showReplyString);
			$showReply = $showReplyTree['show'][0]['ch'];
			if ($showReply) {
				$status = $showReply['status'][0]['values'][0];
				if ($status == 'OK') {
					$this->queryIsRunning = FALSE;
					$hits = $showReply['hit'];

					if ($hits) {
						foreach ($hits as $hit) {
							$myHit = $hit['ch'];
							$key = $myHit['recid'][0]['values'][0];

							// Make sure the 'medium' field exists by setting it to 'other' if necessary.
							if (!array_key_exists('md-medium', $myHit)) {
								$myHit['md-medium'] = Array(0 => Array('values' => Array(0 => 'other')));
							}

							// If there is no title information but series information, use the
							// first series field for the title.
							if (!(array_key_exists('md-title', $myHit) || array_key_exists('md-multivolume-title', $myHit))
									&& array_key_exists('md-series-title', $myHit)) {
								$myHit['md-multivolume-title'] = Array($myHit['md-series-title'][0]);
							}

							// Sort the location array to have the newest item first
							usort($myHit['location'], Array($this, 'yearSort'));

							$this->results[$key] = $myHit;
						}
					}
				}
				else {
					t3lib_div::devLog('pazpar2 show reply status is not "OK" but "' . $status . '"', 'pazpar2', 3);
				}
			}
			else {
				t3lib_div::devLog('could not parse pazpar2 show reply', 'pazpar2', 3);
			}
		}
	}



	/**
	 * Public function to run the pazpar2 query.
	 * If the query string is empty, don’t do anything.
	 * 
	 * The results of the query are available via getResults() after this function returns.
	 */
	public function run () {
		if ($this->fullQueryString() !== '') {
			$this->startQuery();
			// Fetching results can take a while. Increase our time limit.
			$maximumTime = 60;
			set_time_limit($maximumTime + 5);

			while (($this->queryIsRunning) && (time() - $this->queryStartTime < $maximumTime)) {
				sleep(2);
				if ($this->queryIsDone()) {
					break;
				}
			}

			$this->fetchResults();
		}
	}

}

?>

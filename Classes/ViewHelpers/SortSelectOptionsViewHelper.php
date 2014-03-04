<?php
/*******************************************************************************
 * Copyright notice
 *
 * Copyright 2014 Sven-S. Porst <ssp-web@earthlingsoft.net>
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
 * View Helper to return an array suitable for populating a f:form.select’
 * options from the passed sort configuration from TypoScript.
 */
class Tx_Pazpar2_ViewHelpers_SortSelectOptionsViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {


	/**
	 * Registers own arguments.
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('configuration', 'array', 'Sort configuration from TypoScript', TRUE);
	}


	/**
	 * @return string
	 */
	public function render() {
		$selectOptions = array();

		foreach ($this->arguments['configuration'] as $sortConfiguration) {
			$pz2SortComponents = array();
			foreach ($sortConfiguration['order'] as $sortItem) {
				$direction = ($sortItem['direction'] === 'descending' ? 0 : 1);
				$pz2SortComponents[] = $sortItem['fieldName'] . ':' . $direction;
			}
			$pz2SortString = implode(',', $pz2SortComponents);

			$localisedLabel = Tx_Extbase_Utility_Localization::translate('sort-' . $sortConfiguration['id'] , 'Pazpar2');

			$selectOptions[$pz2SortString] = $localisedLabel;
		}

		return $selectOptions;
	}

}

?>

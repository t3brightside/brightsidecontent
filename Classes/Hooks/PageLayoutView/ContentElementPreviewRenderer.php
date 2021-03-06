<?php
namespace Brightside\Brightsidecontent\Hooks\PageLayoutView;

use \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use \TYPO3\CMS\Backend\View\PageLayoutView;

class ContentElementPreviewRenderer implements PageLayoutViewDrawItemHookInterface {
	 /**
     * Preprocesses the preview rendering of a content element of type "textmedia"
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionality
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     *
     * @return void
     */

	 public function preProcess(PageLayoutView &$parentObject, &$drawItem, &$headerContent, &$itemContent, array &$row) {
		if ($row['CType'] === 'brightsidegallery') {
			if ($row['assets']) {
                $itemContent .= $parentObject->linkEditContent($parentObject->getThumbCodeUnlinked($row, 'tt_content', 'assets'), $row);
                $fileReferences = \TYPO3\CMS\Backend\Utility\BackendUtility::resolveFileReferences('tt_content', 'assets', $row);
                if (!empty($fileReferences)) {
                    $linkedContent = '';
                    $itemContent .= $parentObject->linkEditContent($linkedContent, $row);
                    unset($linkedContent);
                }
            }
			$itemContent .= '<ul style="margin: 0; margin-top: 0.5em; padding: 0.2em 1.4em;">';
    		$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText('Template: ' . $row['tx_brightsidecontent_template']), $row) . '</li>';
			if ($row['tx_brightsidecontent_showtitle'] === 1) {
				$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText('Show titles: yes'), $row) . '</li>';
			}
			if ($row['tx_brightsidecontent_showdesc'] === 1) {
				$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText('Show descriptions: yes'), $row) . '</li>';
			}
			$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText('Thumbnail crop: ' . $row['tx_brightsidecontent_cropratiothumb']), $row) . '</li>';
			if ($row['image_zoom'] === 1) {
				$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText('Click-enlarge: yes'), $row) . '</li>';
			}
			if ($row['image_zoom'] === 1) {
				$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText('Click-enlarge crop: ' . $row['tx_brightsidecontent_cropratiozoom']), $row) . '</li>';
			}
			$itemContent .= '</ul>';
			$drawItem = FALSE;
		}
		if ($row['CType'] === 'brightsideslide') {
			$itemContent .= '' . $parentObject->linkEditContent($parentObject->renderText('' . $row['subheader']), $row) . '<br />';
			$itemContent .= '' . $parentObject->linkEditContent($parentObject->renderText('' . $row['bodytext']), $row) . '<br />';
			if ($row['assets']) {
                $itemContent .= $parentObject->linkEditContent($parentObject->getThumbCodeUnlinked($row, 'tt_content', 'assets'), $row);
                $fileReferences = \TYPO3\CMS\Backend\Utility\BackendUtility::resolveFileReferences('tt_content', 'assets', $row);
                if (!empty($fileReferences)) {
                    $linkedContent = '';
                    $itemContent .= $parentObject->linkEditContent($linkedContent, $row);
                    unset($linkedContent);
                }
            }
			$drawItem = FALSE;
		}
		if ($row['CType'] === 'brightsidedownloads') {
			if ($row['media']) {
                $itemContent .= $parentObject->linkEditContent($parentObject->getThumbCodeUnlinked($row, 'tt_content', 'media'), $row);
                $fileReferences = \TYPO3\CMS\Backend\Utility\BackendUtility::resolveFileReferences('tt_content', 'media', $row);
                if (!empty($fileReferences)) {
                    $linkedContent = '';
                    $itemContent .= $parentObject->linkEditContent($linkedContent, $row);
                    unset($linkedContent);
                }
            }
			$drawItem = FALSE;
		}
	}
}

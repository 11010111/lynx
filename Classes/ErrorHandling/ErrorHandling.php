<?php

namespace Swe\Lynx\ErrorHandling;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Error\PageErrorHandler\PageErrorHandlerInterface;
use TYPO3\CMS\Core\Exception;
use TYPO3\CMS\Core\Exception\SiteNotFoundException;
use TYPO3\CMS\Core\Http\RedirectResponse;
use TYPO3\CMS\Core\Http\Uri;
use TYPO3\CMS\Core\Site\Entity\Site;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class ErrorHandling
 * to show a login page (in fitting language) and redirect to page after login
 * @noinspection PhpUnused
 */
class ErrorHandling implements PageErrorHandlerInterface
{

    /**
     * @var ServerRequestInterface
     */
    protected ServerRequestInterface $request;

    /**
     * @param ServerRequestInterface $request
     * @param string $message
     * @param array $reasons
     * @return ResponseInterface
     * @throws SiteNotFoundException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    public function handlePageError(ServerRequestInterface $request, string $message, array $reasons = []): ResponseInterface
    {
        $this->request = $request;
        return new RedirectResponse($this->getLoginUrl(), 302);
    }

    /**
     * @return string
     * @throws SiteNotFoundException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    protected function getLoginUrl(): string
    {
        /** @var Site $site */
        $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
        $pageLoginUid = 1;

        try {
            $pageLoginUid = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('lynx', 'pageLoginUid');
        } catch (Exception $exception) {
            // Error
        }

        $site = $siteFinder->getSiteByPageId($pageLoginUid);
        /** @var Uri $uri */
        $uri = $site->getRouter()->generateUri(
            $pageLoginUid,
            [
                '_language' => $this->getLanguageIdentifier(),
                'redirect_url' => $this->request->getUri()->__toString()
            ]
        );
        return $uri->__toString();
    }

    /**
     * @return int
     */
    protected function getLanguageIdentifier(): int
    {
        /** @var SiteLanguage $language */
        $language = $this->request->getAttribute('language');
        return $language->getLanguageId();
    }

}

<?php

namespace Ttree\JsonStore\Manager\Controller\Module\Management;

use Ttree\JsonStore\Service\DocumentTypeManager;
use Ttree\JsonStore\Service\StoreService;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Neos\Controller\Module\AbstractModuleController;

/**
 * @Flow\Scope("singleton")
 */
class JsonStoreController extends AbstractModuleController
{
    /**
     * @var StoreService
     * @Flow\Inject
     */
    protected $store;

    /**
     * @var DocumentTypeManager
     * @Flow\Inject
     */
    protected $documentTypeManager;

    /**
     * @var array
     * @Flow\InjectConfiguration(path="documentTypes")
     */
    protected $configuration;

    public function indexAction()
    {
        $this->view->assign('documentTypes', $this->configuration);
    }

    /**
     * @param string $type
     */
    public function listAction($type)
    {
        $this->view->assign('numberOfDocuments', $this->store->count($type));
        $this->view->assign('configuration', $this->configuration[$type]);
        $this->view->assign('documents', $this->store->findByType($type));
    }
}

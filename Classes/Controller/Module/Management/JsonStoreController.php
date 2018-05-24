<?php
namespace Ttree\JsonStore\Manager\Controller\Module\Management;

use Neos\Flow\Annotations as Flow;
use Neos\Neos\Controller\Module\AbstractModuleController;
use Ttree\JsonStore\Service\StoreService;

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

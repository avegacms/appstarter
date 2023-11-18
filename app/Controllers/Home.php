<?php

namespace App\Controllers;

use AvegaCms\Controllers\AvegaCmsFrontendController;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class Home extends AvegaCmsFrontendController
{
    protected string $metaType = 'content';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return ResponseInterface
     * @throws ReflectionException
     */
    public function index(): ResponseInterface
    {
        return $this->render([], 'content/main');
    }
}

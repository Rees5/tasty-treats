<?php

namespace Igniter\Api\ApiResources;

use Igniter\Api\Classes\ApiController;

/**
 * Reviews API Controller
 */
class Reviews extends ApiController
{
    public $restConfig = [
        'actions' => [
            'index' => [
                'pageLimit' => 20,
            ],
            'store' => [],
            'show' => [],
            'update' => [],
            'destroy' => [],
        ],
        'model' => \Admin\Models\Reviews_model::class,
        'transformer' => \Igniter\Api\ApiResources\Transformers\ReviewTransformer::class,
        'authorization' => ['index:users', 'store:users', 'show:users', 'update:admin', 'destroy:admin'],
    ];

    protected $requiredAbilities = ['reviews:*'];
}

<?php
/**
 * Created by PhpStorm.
 * User: amopi
 * Date: 2017-01-17
 * Time: 16:41
 */

namespace Amopi\Mlib\Http\Views;

use Symfony\Component\HttpFoundation\Request;

interface ResponseRendererResolverInterface
{
    /**
     * @param Request $request
     *
     * @return ResponseRendererInterface
     */
    public function resolveRequest(Request $request);
}

<?php
/**
 * Created by PhpStorm.
 * User: amopi
 * Date: 2017-01-17
 * Time: 16:48
 */

namespace Amopi\Mlib\Http\Views;

use Amopi\Mlib\Http\ErrorHandlers\WrappedExceptionInfo;
use Amopi\Mlib\Http\SilexKernel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JsonApiRenderer implements ResponseRendererInterface
{
    
    /**
     * @param mixed       $result
     * @param SilexKernel $silexKernel
     *
     * @return Response
     */
    public function renderOnSuccess($result, SilexKernel $silexKernel)
    {
        if (!is_array($result)) {
            $result = ['result' => $result];
        }
        
        return new JsonResponse($result);
    }
    
    /**
     * @param WrappedExceptionInfo $exceptionInfo
     * @param SilexKernel          $silexKernel
     *
     * @return Response
     */
    public function renderOnException(WrappedExceptionInfo $exceptionInfo, SilexKernel $silexKernel)
    {
        return new JsonResponse(
            $exceptionInfo,
            $exceptionInfo->getCode()
        );
    }
}

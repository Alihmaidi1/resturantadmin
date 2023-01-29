<?php

namespace App\GraphQL\Directives;

use App\Exceptions\CustomException;
use App\Models\resturant;
use Closure;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldMiddleware;

final class MiddlewareDirective extends BaseDirective implements FieldMiddleware
{
    // TODO implement the directive https://lighthouse-php.com/master/custom-directives/getting-started.html

    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
directive @middleware on FIELD_DEFINITION
GRAPHQL;
    }

    /**
     * Wrap around the final field resolver.
     *
     * @param  \Nuwave\Lighthouse\Schema\Values\FieldValue  $fieldValue
     * @param  \Closure  $next
     * @return \Nuwave\Lighthouse\Schema\Values\FieldValue
     */
    public function handleField(FieldValue $fieldValue, Closure $next)
    {

        $value=$this->directiveArgValue("value");
        $host = request()->host();
        if(($value=="system"&&config("global.resturant_id")=="")||($value=="tenant"&&config("global.resturant_id")!="")){

            return $next($fieldValue);


        }else{


            throw new CustomException(trans("admin.your tenant or domain is not correct"));


        }
    }
}

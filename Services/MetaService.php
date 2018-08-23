<?php
/**
 * Created by PhpStorm.
 * User: Silvio Leite
 * Date: 22/08/2018
 * Time: 19:33
 */

namespace LaravelPWA\Services;


class MetaService
{
    public function render()
    {
        return "<?php \$config = (new \LaravelPWA\Services\ManifestService)->generate(); echo \$__env->make( 'laravelpwa::meta' , ['config' => \$config])->render(); ?>";
    }

}